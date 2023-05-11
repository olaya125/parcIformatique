<?php

use App\Http\Controllers\backend\MaterialController;
use App\Http\Controllers\GraphController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//User Management



Route::get('/all-user', [App\Http\Controllers\backend\UserController::class, 'AllUser'])->name('alluser');
Route::get('/all-user-material', [App\Http\Controllers\backend\UserController::class, 'AllUserMaterial'])->name('allusermaterial');
Route::get('/add-user-index',[App\Http\Controllers\backend\UserController::class, 'AllUserIndex'])->name('AllUserIndex');
Route::post('/insert-user',[App\Http\Controllers\backend\UserController::class, 'InsertUser'])->name('insertuser');
Route::get('/edit-user/{id}', [App\Http\Controllers\backend\UserController::class, 'EditUser'])->name('Edituser');
Route::post('/update-user/{id}', [App\Http\Controllers\backend\UserController::class, 'UpdateUser'])->name('Updateuser');
Route::get('/delete-user/{id}', [App\Http\Controllers\backend\UserController::class, 'DeleteUser'])->name('Deleteuser');
Route::get('/view-type', [App\Http\Controllers\backend\UserController::class, 'AllType'])->name('alltype');
Route::post('/add-type', [App\Http\Controllers\backend\UserController::class, 'AddType'])->name('addtype');
Route::get('/delete-type/{id}', [App\Http\Controllers\backend\UserController::class, 'DeleteType'])->name('deletetype');
Route::get('/show-map',[App\Http\Controllers\backend\GraphController::class,'ShowMap'])->name('showmap');
