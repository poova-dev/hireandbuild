<?php
/**
 * [CLIENT NAME] - Admin Authentication Guard
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';

function check_admin_auth(): array {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (empty($_SESSION['admin_user'])) {
        header('Location: login.php');
        exit;
    }

    return $_SESSION['admin_user'];
}

function is_admin_logged_in(): bool {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return !empty($_SESSION['admin_user']);
}
