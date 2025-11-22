<?php
// Load Composer Autoload
require_once __DIR__ . '/../vendor/autoload.php';

// Load Environment Variables (.env)
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

use App\Core\App;
use App\Core\Database;
use App\Core\Config;
use App\Core\Timezone;

// 1. Connect & Load Settings
$db = new Database();
Config::load($db);
Timezone::set($db);

// 2. Start App
$app = new App();