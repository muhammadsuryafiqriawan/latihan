<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function index(){
        return "Selamat Belajar laravel Framework 10";
    }
    public function ambilfile(){
        return view('ambilfile');
    }
}
