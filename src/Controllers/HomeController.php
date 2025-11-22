<?php
namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller {
    public function index() {
        // I-load ang view na 'home/index' at magpasa ng data
        $this->view('home/index', ['title' => 'Welcome to MVC']);
    }
}