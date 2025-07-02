<?php
// ip-checker.php - Main endpoint for IP, location, and VPN status

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *"); // Optional for frontend JS access

require_once __DIR__ . '/utils.php';
require_once __DIR__ . '/services/geoapi.php';
require_once __DIR__ . '/services/vpncheck.php';

// Get the user's IP
$ip = getUserIP();

// Get location info
$geo = getGeoData($ip);

// Get VPN/proxy detection
$vpn = checkVPNProxy($ip);

// Combine response
$response = [
    'ip' => $ip,
    'location' => $geo,
    'vpn_info' => $vpn
];

echo json_encode($response, JSON_PRETTY_PRINT);
?>
