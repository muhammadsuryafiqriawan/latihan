<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\HtmlController;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

route::get('helloworld', [HelloWorldController::class, 'index']);
route::get('ambilfile', [HelloWorldController::class, 'ambilfile']);
route::get('getlorem', [HtmlController::class, 'getlorem']);

Route::view('getform', 'latihan.getform');

Route::view('gettabel', 'latihan.gettabel');

Route::resource('products', ProductController::class);

