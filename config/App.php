<?php

namespace App\config;

use App\app\Http\Controllers\UserController;

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
        $this->routes = [
            ['/hi' => [UserController::class, 'index']],
            // ['/h' => 'hi']

        ];
        $uri = $_SERVER["REQUEST_URI"];
        foreach ($this->routes as $route) {
            if ($route[$uri]) {
                if (!class_exists($route[$uri][0])) {
                    echo 'class doesnt exist';
                    return;
                }
                $controller_class =  new  $route[$uri][0];
                $f = $route[$uri][1];
                if (!function_exists($controller_class->$f())) {
                    return 'functionn doesnt exist';
                }
                $controller_class->$f();
            } else {
                return $this->view('404');
            }
        }
    }
    function view($page, $data = [] ?? null)
    {

        // var_dump( $this->getLayout());
        // var_dump( $this->getPage($page));

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
