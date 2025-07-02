<?php
// geoapi.php - Fetch IP geolocation using ipinfo.io

require_once __DIR__ . '/../utils.php';

// Paste your ipinfo.io token here
const IPINFO_TOKEN = 'dbf71d55879503';

function getGeoData($ip = null) {
    if ($ip === null) {
        $ip = getUserIP();
    }

    $url = "https://ipinfo.io/{$ip}/json?token=" . IPINFO_TOKEN;

    $response = @file_get_contents($url);
    if ($response === FALSE) {
        return [
            'error' => true,
            'message' => 'Unable to fetch IP info'
        ];
    }

    $data = json_decode($response, true);

    if (!isset($data['ip'])) {
        return [
            'error' => true,
            'message' => 'Invalid response from ipinfo.io'
        ];
    }

    $loc = explode(',', $data['loc'] ?? ','); // Get lat/lon

    return [
        'error' => false,
        'ip' => $data['ip'] ?? '',
        'city' => $data['city'] ?? 'N/A',
        'region' => $data['region'] ?? 'N/A',
        'country' => $data['country'] ?? 'N/A',
        'latitude' => $loc[0] ?? 'N/A',
        'longitude' => $loc[1] ?? 'N/A',
        'org' => $data['org'] ?? 'N/A'
    ];
}
?>
