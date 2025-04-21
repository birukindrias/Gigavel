<?php

namespace App\config;

use App\app\Http\Controllers\UserController;
use App\config\Route;
use PDO;
use ReflectionClass;

class App
{
    public string $layout = 'app';

    public array $routes;
    private $host = "localhost";
    private $db_name = "sile";
    private $username = "l";
    private $password = "l";
    private $conn;
    public Database $db;
     public static $app;
    public function __construct()
    {
        self::$app = $this;
        
      $this->router();
      $this->db= new Database();
      $this->env('h');
      echo $_ENV['DB_USERNAME'];    
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
    public function db()  {
        
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            // Set error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
// create migraton table
// on migrate check if the class names are exist in it
// dont migrate if exist not migarte
// orm for manuplating data
        return $this->conn;
    }
    public function migrate() {
        $path = dirname(__DIR__) . '/database/Migrations/';

        $writtenMigrations = array_filter(scandir($path),fn($file)=>pathinfo($file,PATHINFO_EXTENSION)=== "php");
        $existing = this->createMigration;
        $this->createMigrationsTable();
        $migrate= array_diff($writtenMigrations,$existing);
        

        foreach ($migrate as $migration) {
        $pdo->conn->query("INSERT migrations(name) value('$migration')");
        }
    }
   public function createMigrationsTable() {
      $conn->query->exc("IF migrations DONT EXIST CREATE TABLE migrations(name)")  ;
      
      return $conn->query->exc("SELECT * FROM migrations") ; 
    }
    public function env($key,$val = null) {
      #scan dir 
      #get the env
      #find it from there 
      #and to set it set it from there 
      # code...
      $path = dirname(__DIR__).'/.env';
            /*var_dump(file_get_contents($env)*/
            /*);*/
    
    if (!file_exists($path)) {
        throw new Exception(".env file not found at: $path");
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        // Skip comments
        if (str_starts_with(trim($line), '#')) continue;

        [$key, $value] = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);

        // Remove surrounding quotes if present
        $value = trim($value, '"\'');

        putenv("$key=$value");
        $_ENV[$key] = $value;
        // $_SERVER[$key] = $value;
    }}
}
