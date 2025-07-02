<?php
// vpncheck.php - Detect VPN, proxy, and Tor usage

require_once __DIR__ . '/../utils.php';

// Replace with your own API key from ipqualityscore.com
const IPQS_API_KEY = 'I30zyHx52XkbIbquEHiKGwHF7NZCPyvX';

function checkVPNProxy($ip = null) {
    if ($ip === null) {
        $ip = getUserIP();
    }

    $url = "https://ipqualityscore.com/api/json/ip/" . IPQS_API_KEY . "/" . urlencode($ip);

    $response = @file_get_contents($url);
    if ($response === FALSE) {
        return [
            'error' => true,
            'message' => 'Unable to fetch VPN data'
        ];
    }

    $data = json_decode($response, true);

    if (!isset($data['proxy'])) {
        return [
            'error' => true,
            'message' => 'Invalid VPN response'
        ];
    }

    return [
        'error' => false,
        'vpn' => $data['vpn'] ?? false,
        'proxy' => $data['proxy'] ?? false,
        'tor' => $data['tor'] ?? false,
        'isp' => $data['ISP'] ?? '',
        'organization' => $data['organization'] ?? '',
        'connection_type' => $data['connection_type'] ?? '',
        'risk_score' => $data['fraud_score'] ?? 0
    ];
}
?>
