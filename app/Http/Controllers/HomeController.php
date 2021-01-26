<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController{

    public function construct(){

    }

    public function index(){
        return view("home.cashier");
    }

    public function list(){
        return view("home.list");
    }
}