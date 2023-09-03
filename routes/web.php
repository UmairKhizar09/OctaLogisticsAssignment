<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;

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

//To get to the form Page
Route::get('/form',[User::class,'index']);

Route::post('/form',[User::class,'store']);

//For Testing Database Connection
Route::get('/conn',function()
{
    return view('test');
});


