<?php
// utils.php - Utility functions used across backend

// Function to get real IP address of the user
function getUserIP() {
    $ip = '';

    // Check for shared internet/ISP IP
    if (!empty($_SERVER['HTTP_CLIENT_IP']) && validateIP($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    // Check for IPs passing through proxies
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        foreach ($ipList as $ipEntry) {
            $ipEntry = trim($ipEntry);
            if (validateIP($ipEntry)) {
                $ip = $ipEntry;
                break;
            }
        }
    }
    // Default: remote address
    elseif (!empty($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
}

// Validate IP format
function validateIP($ip) {
    return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE | FILTER_FLAG_NO_PRIV_RANGE) !== false;
}
?>
