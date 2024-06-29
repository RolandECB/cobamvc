<?php

class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // Check if $url is null or not set
        if ($url === null) {
            // Handle case where URL parameter is not provided
            // For example, redirect to a default controller or show an error page
            // You can customize this behavior based on your application's needs
            // Here's a basic example:
            $this->loadDefaultController();
            return;
        }
        
        // Controller
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // Run controller method and pass parameters if any
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        } else {
            return null; // Handle case where URL parameter is not set
        }
    }

    // Example method to load default controller
    protected function loadDefaultController()
    {
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        $this->controller->index(); // Assuming 'index' is the default method
    }
}
