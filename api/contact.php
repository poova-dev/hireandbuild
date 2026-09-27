<?php
/**
 * [CLIENT NAME] - API Endpoint: Contact / Free Estimate Lead Submission
 * Accepts POST requests (AJAX / JSON / FormData)
 */

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(['success' => false, 'message' => 'Invalid request method. Only POST is allowed.'], 405);
}

// Support both JSON body and standard multipart/form-data
$input = json_decode(file_get_contents('php://input'), true);
if (!is_array($input)) {
    $input = $_POST;
}

$name = trim($input['name'] ?? $input['full_name'] ?? '');
$phone = trim($input['phone'] ?? '');
$email = trim($input['email'] ?? '');
$location = trim($input['location'] ?? $input['plot_location'] ?? '');
$area = isset($input['area']) ? intval($input['area']) : (isset($input['plot_area']) ? intval($input['plot_area']) : null);
$notes = trim($input['notes'] ?? $input['message'] ?? '');
$source = trim($input['source'] ?? $input['source_page'] ?? 'Contact / Lead Form');

// Validation
if (empty($name)) {
    json_response(['success' => false, 'message' => 'Please enter your full name.'], 422);
}

// Clean phone digits
$cleanPhone = preg_replace('/[^0-9]/', '', $phone);
if (strlen($cleanPhone) < 10) {
    json_response(['success' => false, 'message' => 'Please enter a valid 10-digit phone number.'], 422);
}

if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    json_response(['success' => false, 'message' => 'Please enter a valid email address.'], 422);
}

// Save to Database if connected
$db = get_db();
$leadId = null;

if ($db) {
    try {
        $stmt = $db->prepare("
            INSERT INTO leads (full_name, phone, email, plot_location, plot_area_sqft, notes, source_page, ip_address, user_agent)
            VALUES (:name, :phone, :email, :location, :area, :notes, :source, :ip, :ua)
        ");

        $stmt->execute([
            ':name'     => $name,
            ':phone'    => $phone,
            ':email'    => $email ?: null,
            ':location' => $location ?: null,
            ':area'     => $area ?: null,
            ':notes'    => $notes ?: null,
            ':source'   => $source,
            ':ip'       => $_SERVER['REMOTE_ADDR'] ?? null,
            ':ua'       => substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 255)
        ]);

        $leadId = $db->lastInsertId();
    } catch (Exception $e) {
        error_log("[Lead Save Error] " . $e->getMessage());
        // Fall through to still return success to the client
    }
}

json_response([
    'success' => true,
    'lead_id' => $leadId,
    'message' => 'Thank you! Your request has been received. Our senior engineer will call you within 24 hours.'
]);
