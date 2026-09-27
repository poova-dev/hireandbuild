<?php
/**
 * HireAndBuild - Core Functions & Global Helpers
 */

// Initialize Session if not active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ------------------------------------------------------------------------
// Site & Business Constants
// ------------------------------------------------------------------------
if (!defined('SITE_NAME')) define('SITE_NAME', 'HireAndBuild');
if (!defined('SITE_TAGLINE')) define('SITE_TAGLINE', 'Construction Company in Chennai | 15-Yr Warranty');
if (!defined('SITE_PHONE')) define('SITE_PHONE', '+91 72004 72008');
if (!defined('SITE_PHONE_RAW')) define('SITE_PHONE_RAW', '+917200472008');
if (!defined('SITE_WHATSAPP')) define('SITE_WHATSAPP', '917200472008');
if (!defined('SITE_EMAIL')) define('SITE_EMAIL', 'info@hireandbuild.com');
if (!defined('SITE_ADDRESS')) define('SITE_ADDRESS', 'Chennai, Tamil Nadu, India');
if (!defined('STARTING_PRICE')) define('STARTING_PRICE', '₹1,999/sq.ft');

// Confirmed Metrics from Source
if (!defined('METRIC_HOMES_DELIVERED')) define('METRIC_HOMES_DELIVERED', '400+');
if (!defined('METRIC_ACTIVE_PROJECTS')) define('METRIC_ACTIVE_PROJECTS', '75+');
if (!defined('METRIC_QUALITY_CHECKS')) define('METRIC_QUALITY_CHECKS', '350+');
if (!defined('METRIC_SQFT_COMPLETED')) define('METRIC_SQFT_COMPLETED', '2,50,000+');
if (!defined('METRIC_WARRANTY_YEARS')) define('METRIC_WARRANTY_YEARS', '15');

// Base URL helper
function site_url(string $path = ''): string {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)) ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
    $base = rtrim($protocol . $host . ($scriptDir === '/' ? '' : $scriptDir), '/');
    return $base . '/' . ltrim($path, '/');
}

// Asset URL helper
function asset_url(string $path = ''): string {
    return site_url('assets/' . ltrim($path, '/'));
}

// Input sanitizer for security
function sanitize_input($data) {
    if (is_array($data)) {
        return array_map('sanitize_input', $data);
    }
    return htmlspecialchars(stripslashes(trim((string)$data)), ENT_QUOTES, 'UTF-8');
}

// Format numbers in Indian numbering system
function format_inr($amount): string {
    $amount = (string)$amount;
    $len = strlen($amount);
    if ($len <= 3) {
        return '₹' . $amount;
    }
    $last3 = substr($amount, -3);
    $rest = substr($amount, 0, $len - 3);
    $rest = preg_replace('/\B(?=(\d{2})+(?!\d))/', ',', $rest);
    return '₹' . $rest . ',' . $last3;
}

// CSRF token generation
function csrf_token(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// CSRF token verification
function verify_csrf_token(?string $token): bool {
    return !empty($token) && isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Standardized JSON response helper
function json_response(array $data, int $statusCode = 200): void {
    http_response_code($statusCode);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    exit;
}
