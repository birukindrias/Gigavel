<?php

namespace App\app\Http\Controllers;

use App\config\App;

class UserController extends App
{
    public function __construct() {
        $this->view('index');
}
function index() {
    $this->view('index');
}
}
