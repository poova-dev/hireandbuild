<?php
/**
 * [CLIENT NAME] - Core Configuration File
 * Compatible with Local XAMPP, Apache, and Hostinger Production Environments
 */

// Prevent direct access
if (!defined('APP_ROOT')) {
    define('APP_ROOT', dirname(__DIR__));
}

// Session Initialization
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Error reporting (Adjust for production)
if (isset($_SERVER['SERVER_NAME']) && in_array($_SERVER['SERVER_NAME'], ['localhost', '127.0.0.1'])) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    error_reporting(0);
}

// ------------------------------------------------------------------------
// Database Credentials
// ------------------------------------------------------------------------
// Default settings work seamlessly out-of-the-box on standard XAMPP.
// For Hostinger: replace with your MySQL Database, Username & Password.
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_PORT', getenv('DB_PORT') ?: '3306');
define('DB_NAME', getenv('DB_NAME') ?: 'clientname_construction');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');

// ------------------------------------------------------------------------
// Business & Site Constants
// ------------------------------------------------------------------------
define('SITE_NAME', '[CLIENT NAME]');
define('SITE_TAGLINE', 'Best Turnkey House Construction Company in Chennai');
define('SITE_PHONE', '+91 72004 72008');
define('SITE_PHONE_RAW', '+917200472008');
define('SITE_WHATSAPP', '917200472008');
define('SITE_EMAIL', 'info@clientname.com');
define('SITE_ADDRESS', 'No. 42, Velachery Main Road, Guindy, Chennai, Tamil Nadu 600032');
define('WARRANTY_YEARS', '15');
define('HOMES_DELIVERED', '400+');
define('ACTIVE_PROJECTS', '75+');
define('QUALITY_CHECKS', '350+');
define('SQFT_COMPLETED', '2,50,000+');

// Base URL detection
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)) ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
$baseUrl = rtrim($protocol . $host . ($scriptDir === '/' ? '' : $scriptDir), '/');
define('SITE_URL', getenv('SITE_URL') ?: $baseUrl);

// ------------------------------------------------------------------------
// Cloudinary / Asset Helper
// ------------------------------------------------------------------------
define('CLOUDINARY_CLOUD_NAME', getenv('CLOUDINARY_CLOUD_NAME') ?: '');

function get_asset_url($path) {
    return ltrim($path, '/');
}

function get_image_url($localPath, $cloudinaryPublicId = '') {
    if (!empty(CLOUDINARY_CLOUD_NAME) && !empty($cloudinaryPublicId)) {
        return "https://res.cloudinary.com/" . CLOUDINARY_CLOUD_NAME . "/image/upload/f_auto,q_auto/" . $cloudinaryPublicId;
    }
    return $localPath;
}

// ------------------------------------------------------------------------
// Security & Utilities
// ------------------------------------------------------------------------
function sanitize_input($data) {
    if (is_array($data)) {
        return array_map('sanitize_input', $data);
    }
    return htmlspecialchars(stripslashes(trim($data)), ENT_QUOTES, 'UTF-8');
}

function json_response($data, $statusCode = 200) {
    http_response_code($statusCode);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    exit;
}

function csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf_token($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
