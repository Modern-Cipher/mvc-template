<?php
namespace App\Core;

use DateTime;
use DateTimeZone;

class Timezone {
    public static function set(Database $dbConnection) {
        $timezone_string = Config::get('app_timezone') ?? 'UTC';
        date_default_timezone_set($timezone_string);

        $now = new DateTime('now', new DateTimeZone($timezone_string));
        $mins = $now->getOffset() / 60;
        $sgn = ($mins < 0 ? -1 : 1);
        $mins = abs($mins);
        $hrs = floor($mins / 60);
        $mins -= $hrs * 60;
        $offset = sprintf('%+d:%02d', $hrs * $sgn, $mins);

        $pdo = $dbConnection->connect();
        $pdo->exec("SET time_zone='$offset';");
    }
}