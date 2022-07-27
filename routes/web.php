<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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

Route::get('/', [ProductController::class,'prod']);
Route::get('/user', [UserController::class,'user']);
Route::get('/logAdmin', [UserController::class,'logAdmin']);
Route::post('/LoginAdmin', [UserController::class,'LoginAdmin']);
Route::post('/added',[UserController::class, 'editPic']);
Route::post('/updateuser',[UserController::class, 'updateuser']);
Route::post('/createPro', [ProductController::class,'createPro']);
Route::get('delete/id/{id}', [ProductController::class, 'deletePro']);
Route::put('/update/id/{id}', [ProductController::class, 'updatePro']);


Route::get('/crud',[ProductController::class, 'crud']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\UserController::class, 'user'])->name('home');



