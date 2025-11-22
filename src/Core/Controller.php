<?php
namespace App\Core;

class Controller {
    public function view($view, $data = []) {
        if (file_exists(__DIR__ . '/../Views/' . $view . '.php')) {
            extract($data);
            require_once __DIR__ . '/../Views/' . $view . '.php';
        } else {
            die("View does not exist.");
        }
    }
}