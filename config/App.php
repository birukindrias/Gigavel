<?php

namespace App\config;

use App\app\Http\Controllers\UserController;

class App
{
    public array $routes;
    public function __construct()
    {
        $this->router();
    }
    function router()
    {
        $this->routes = [
            ['/hia' => [UserController::class, 'index']],
            // ['/h' => 'hi']

        ];
        $uri = $_SERVER["REQUEST_URI"];
        foreach ($this->routes as $route) {
            if ($route[$uri]) {
                if (!class_exists($route[$uri][0])) {
                    echo 'class doesnt exist';
                    return ;
                }
                $controller_class =  new  $route[$uri][0];
                $f = $route[$uri][1];
                if (!function_exists($controller_class->$f())) {
                    return 'functionn doesnt exist';
                }
                $controller_class->$f();
            }else {
                echo 'route dosnt found';
            }
        }
    }
    function render()
    {
        // $dir = scandir(__DIR__.'/../resources/views/');
        // foreach ($dir as $page) {

        // }
        $template_name = $_GET['page'] ?? 'default';
        $template_dir = dirname(__DIR__) . '/resources/views/components/';

        // Sanitize input
        $template_name = basename($template_name);

        // Determine full path
        $php_file = $template_dir . $template_name . '.php';
        $html_file = $template_dir . $template_name . '.html';

        ob_start();

        if (file_exists($php_file)) {
            include $php_file; // PHP is executed ✅
        } elseif (file_exists($html_file)) {
            include $html_file; // Still allow HTML with PHP inside ✅
        } else {
            echo "<h1>404 - Page not found</h1>";
        }

        echo ob_get_clean();
    }
}
