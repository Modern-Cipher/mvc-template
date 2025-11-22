<?php
namespace App\Core;

class App {
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();

        // 1. Controller
        if (isset($url[0])) {
            $urlController = ucfirst($url[0]) . 'Controller';
            if (file_exists(__DIR__ . '/../Controllers/' . $urlController . '.php')) {
                $this->controller = $urlController;
                unset($url[0]);
            }
        }

        require_once __DIR__ . '/../Controllers/' . $this->controller . '.php';
        $controllerClass = "App\\Controllers\\" . $this->controller;
        $this->controller = new $controllerClass;

        // 2. Method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // 3. Params
        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}