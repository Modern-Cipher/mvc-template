<?php
// 1. START SESSION AGAD (Pinaka-unang line dapat)
// Dahil dito, available na ang $_SESSION sa lahat ng Controllers mo.
session_start(); 

// Load Composer Autoload
require_once __DIR__ . '/../vendor/autoload.php';

// Load Environment Variables (.env)
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

use App\Core\App;
use App\Core\Database;
use App\Core\Config;
use App\Core\Timezone;

// 2. Connect & Load Settings
$db = new Database();
Config::load($db);
Timezone::set($db);

// 3. Start App
$app = new App();