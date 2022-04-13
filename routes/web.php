<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
//Route::get('',function(){
//    return view('welcome');
//});

Route::get('',[PagesController::class, 'index']);
Route::get('/about',[PagesController::class, 'about']);
Route::get('/services',[PagesController::class, 'services']);

//Route::get('login', function() {
//    return view('login');
//});
//
//Route::get('register',function(){
//
//    return view('register');
//});
//
//Route::get('/about',function(){
//
//    return view('pages.about');
//});
//
//Route::get('/users/{id}',function($id){
//
//    return 'this is the user '. $id;
//});
