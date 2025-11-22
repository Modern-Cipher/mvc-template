<?php
namespace App\Core;

use PDO;

class Config {
    private static $settings = [];

    public static function load(Database $dbConnection) {
        $pdo = $dbConnection->connect();
        // Check if table exists first to avoid errors on fresh install
        try {
            $stmt = $pdo->query("SELECT setting_key, setting_value FROM system_settings");
            if ($stmt) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    self::$settings[$row['setting_key']] = $row['setting_value'];
                }
            }
        } catch (\Exception $e) {
            // Table might not exist yet
        }
    }

    public static function get($key) {
        return self::$settings[$key] ?? null;
    }
}