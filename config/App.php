<?php

namespace App\config;

use App\app\Http\Controllers\UserController;
use App\config\Route;
use ReflectionClass;

class App
{
    public string $layout = 'app';

    public array $routes;
    public function __construct()
    {
        $this->router();
    }
    function router()
    {



        $routes = [];

        // 1. Set your controller folder and base namespace
        $controllerDir = __DIR__ . '/../app/Http/Controllers';
        $baseNamespace = 'App\\app\\Http\\Controllers\\';
        
        // 2. Scan all PHP files in the controller folder
        $controllerFiles = glob("$controllerDir/*.php");
        
        foreach ($controllerFiles as $file) {
            require_once $file;
        
            $className = $baseNamespace . basename($file, '.php');
        
            if (!class_exists($className)) continue;
        
            $ref = new ReflectionClass($className);
        
            foreach ($ref->getMethods() as $method) {
                foreach ($method->getAttributes(Route::class) as $attr) {
                    $route = $attr->newInstance();
                    $key = "{$route->method}:{$route->path}";
                    $routes[$key] = [$className, $method->getName()];
                }
            }
        }
        
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $key = "$method:$uri";

        if (isset($routes[$key])) {
            [$class, $methodName] = $routes[$key];
            $controller = new $class();
            echo $controller->$methodName();
        } else {
            http_response_code(404);
            return $this->view('404');
        }

    }
    function view($page, $data = [] ?? null)
    {


        if (file_exists(dirname(__DIR__) . '/resources/views/' . $page . '.php')) {
            // echo 'yes';
            // exit;
            echo str_replace('{content}', $this->getPage($page), $this->getLayout()); // PHP is executed ✅
            return;
        } else {
            $this->view('404');
            return;
        }
    }
    public function getLayout()
    {
        ob_start();
        include_once dirname(__DIR__) . '/resources/views/layout/' . $this->layout . '.php';
        return ob_get_clean();
    }
    public function getPage($page)
    {
        // var_dump(dirname(__DIR__) . '/resources/views/' . $page . '.php');
        // exit;

        ob_start();
        include_once dirname(__DIR__) . '/resources/views/' . $page . '.php';
        return ob_get_clean();
    }
}
