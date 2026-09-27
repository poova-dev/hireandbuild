<?php
/**
 * [CLIENT NAME] - API Endpoint: Book Free On-Site Plot Inspection
 */

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(['success' => false, 'message' => 'Invalid request method.'], 405);
}

$input = json_decode(file_get_contents('php://input'), true);
if (!is_array($input)) {
    $input = $_POST;
}

$name     = trim($input['name'] ?? $input['client_name'] ?? '');
$phone    = trim($input['phone'] ?? $input['client_phone'] ?? '');
$email    = trim($input['email'] ?? $input['client_email'] ?? '');
$address  = trim($input['address'] ?? $input['plot_address'] ?? '');
$date     = trim($input['date'] ?? $input['preferred_date'] ?? date('Y-m-d', strtotime('+1 day')));
$slot     = trim($input['slot'] ?? $input['time_slot'] ?? 'Morning (10:00 AM - 1:00 PM)');
$notes    = trim($input['notes'] ?? '');

if (empty($name)) {
    json_response(['success' => false, 'message' => 'Please enter your full name.'], 422);
}

$cleanPhone = preg_replace('/[^0-9]/', '', $phone);
if (strlen($cleanPhone) < 10) {
    json_response(['success' => false, 'message' => 'Please enter a valid 10-digit phone number.'], 422);
}

$db = get_db();
$visitId = null;

if ($db) {
    try {
        // Also insert into leads
        $stmtLead = $db->prepare("
            INSERT INTO leads (full_name, phone, email, plot_location, requirement_type, source_page, status)
            VALUES (:name, :phone, :email, :address, 'Free Site Visit', 'Site Visit Booking Modal', 'site_visit_scheduled')
        ");
        $stmtLead->execute([
            ':name'    => $name,
            ':phone'   => $phone,
            ':email'   => $email ?: null,
            ':address' => $address
        ]);
        $leadId = $db->lastInsertId();

        $stmtVisit = $db->prepare("
            INSERT INTO site_visits (lead_id, client_name, client_phone, client_email, plot_address, preferred_date, preferred_time_slot, notes)
            VALUES (:lead_id, :name, :phone, :email, :address, :date, :slot, :notes)
        ");
        $stmtVisit->execute([
            ':lead_id' => $leadId,
            ':name'    => $name,
            ':phone'   => $phone,
            ':email'   => $email ?: null,
            ':address' => $address,
            ':date'    => $date,
            ':slot'    => $slot,
            ':notes'   => $notes ?: null
        ]);
        $visitId = $db->lastInsertId();
    } catch (Exception $e) {
        error_log("[Site Visit Save Error] " . $e->getMessage());
    }
}

json_response([
    'success'  => true,
    'visit_id' => $visitId,
    'message'  => 'Your Free Site Visit has been scheduled! Our site engineer will coordinate with you before arriving.'
]);
