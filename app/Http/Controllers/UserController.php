<?php

namespace App\app\Http\Controllers;

use App\config\App;
use App\config\Route;

class UserController extends App
{
    public function __construct()
    {
        // $this->view('index');
    }
    #[Route('GET', '/')]

    function index()
    {
        $this->view('index');
    }
}
