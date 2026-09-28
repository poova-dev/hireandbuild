<?php
/**
 * Replica Architects & Builders - API Endpoint: Store Construction Calculator Estimates
 * Accepts detailed calculation states from calculator.js
 */

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(['success' => false, 'message' => 'Invalid request method. Only POST is allowed.'], 405);
}

$input = json_decode(file_get_contents('php://input'), true);
if (!is_array($input)) {
    $input = $_POST;
}

$clientName   = trim($input['client_name'] ?? $input['name'] ?? '');
$clientPhone  = trim($input['client_phone'] ?? $input['phone'] ?? '');
$clientEmail  = trim($input['client_email'] ?? $input['email'] ?? '');
$plotArea     = floatval($input['plot_area'] ?? 800);
$builtupFloor = floatval($input['builtup_per_floor'] ?? 800);
$parkingArea  = floatval($input['parking_area'] ?? 0);
$floorsConfig = trim($input['floors_config'] ?? 'G+3');
$floorsCount  = intval($input['floors_count'] ?? 4);
$packageTier  = trim($input['package_tier'] ?? 'Premium');
$packageRate  = floatval($input['package_rate'] ?? 2649);
$totalBuiltup = floatval($input['total_builtup'] ?? 3200);
$baseCost     = floatval($input['base_cost'] ?? 8476800);
$parkingCost  = floatval($input['parking_cost'] ?? 0);
$addonsList   = is_array($input['addons'] ?? null) ? json_encode($input['addons']) : ($input['addons'] ?? '[]');
$addonsTotal  = floatval($input['addons_total'] ?? 0);
$grandTotal   = floatval($input['grand_total'] ?? 8476800);
$duration     = intval($input['duration_months'] ?? 18);
$monthlyEmi   = floatval($input['monthly_emi'] ?? 0);
$monthlyOutflow = floatval($input['monthly_outflow'] ?? 0);

$db = get_db();
$estimateId = null;

if ($db) {
    try {
        // If client details are provided, also insert into leads
        $leadId = null;
        if (!empty($clientName) && !empty($clientPhone)) {
            $stmtLead = $db->prepare("
                INSERT INTO leads (full_name, phone, email, plot_location, plot_area_sqft, package_interest, requirement_type, source_page)
                VALUES (:name, :phone, :email, 'Pattukkottai', :area, :pkg, 'Calculator Estimate', 'Cost Calculator Wizard')
            ");
            $stmtLead->execute([
                ':name'  => $clientName,
                ':phone' => $clientPhone,
                ':email' => $clientEmail ?: null,
                ':area'  => intval($plotArea),
                ':pkg'   => $packageTier . " (₹" . number_format($packageRate) . "/sq.ft)"
            ]);
            $leadId = $db->lastInsertId();
        }

        $stmtEst = $db->prepare("
            INSERT INTO estimates (
                lead_id, client_name, client_phone, client_email, plot_area_sqft,
                builtup_per_floor_sqft, car_parking_sqft, floors_config, floors_count,
                package_tier, package_rate_per_sqft, total_builtup_area_sqft, base_cost,
                parking_cost, addons_json, addons_total_cost, grand_total_cost,
                duration_months, monthly_emi_20yr, monthly_outflow
            ) VALUES (
                :lead_id, :name, :phone, :email, :plot_area,
                :builtup, :parking, :floors_config, :floors_count,
                :package_tier, :package_rate, :total_builtup, :base_cost,
                :parking_cost, :addons_json, :addons_total, :grand_total,
                :duration, :emi, :outflow
            )
        ");

        $stmtEst->execute([
            ':lead_id'        => $leadId,
            ':name'           => $clientName ?: null,
            ':phone'          => $clientPhone ?: null,
            ':email'          => $clientEmail ?: null,
            ':plot_area'      => $plotArea,
            ':builtup'        => $builtupFloor,
            ':parking'        => $parkingArea,
            ':floors_config'  => $floorsConfig,
            ':floors_count'   => $floorsCount,
            ':package_tier'   => $packageTier,
            ':package_rate'   => $packageRate,
            ':total_builtup'  => $totalBuiltup,
            ':base_cost'      => $baseCost,
            ':parking_cost'   => $parkingCost,
            ':addons_json'    => $addonsList,
            ':addons_total'   => $addonsTotal,
            ':grand_total'    => $grandTotal,
            ':duration'       => $duration,
            ':emi'            => $monthlyEmi,
            ':outflow'        => $monthlyOutflow
        ]);

        $estimateId = $db->lastInsertId();
    } catch (Exception $e) {
        error_log("[Estimate Save Error] " . $e->getMessage());
    }
}

json_response([
    'success'     => true,
    'estimate_id' => $estimateId,
    'grand_total' => $grandTotal,
    'message'     => 'Estimate saved successfully.'
]);
