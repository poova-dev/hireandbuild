<?php
/**
 * [CLIENT NAME] - PDO Database Connection Manager
 */

require_once __DIR__ . '/config.php';

class Database {
    private static ?PDO $instance = null;
    private static bool $connectionAttempted = false;

    public static function getConnection(): ?PDO {
        if (self::$instance !== null) {
            return self::$instance;
        }

        if (self::$connectionAttempted) {
            return null;
        }

        self::$connectionAttempted = true;

        try {
            $dsn = sprintf(
                "mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4",
                DB_HOST,
                DB_PORT,
                DB_NAME
            );

            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
            ];

            self::$instance = new PDO($dsn, DB_USER, DB_PASS, $options);
            return self::$instance;
        } catch (PDOException $e) {
            error_log("[Database Connection Error] " . $e->getMessage());
            return null;
        }
    }

    public static function isConnected(): bool {
        return self::getConnection() !== null;
    }
}

function get_db(): ?PDO {
    return Database::getConnection();
}
