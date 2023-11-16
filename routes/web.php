<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UserController;
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

//Home
Route::get('/', [HomeController::class, 'getMain'])->name('home');
Route::get('/home', [HomeController::class, 'getMain']);


//Users
Route::get('/all_users', [UserController::class, 'getUsers'])->name('users');
Route::get('/add_user', [UserController::class,'addUser'])->name('add_users');
Route::post('/store_user', [UserController::class,'storeUser'])->name('storeUser');
Route::get('/view_user/{id}', [UserController::class,'viewUser'])->name('view_users');
Route::get('/delete_user/{id}', [UserController::class,'deleteUser'])->name('delete_user');

//Tasks
Route::get('/all_tasks', [TasksController::class,'getTasks'])->name('all_tasks')->middleware('auth');
Route::post('/store_task', [TasksController::class,'storeTask'])->name('storeTask');
Route::get('/view_task/{id}', [TasksController::class,'viewTask'])->name('view_task');
Route::get('/add_task', [TasksController::class,'addTask'])->name('add_tasks');
Route::get('/delete_task/{id}', [TasksController::class,'deleteTask'])->name('delete_task');
Route::post('/update_task', [TasksController::class,'updateTask'])->name('tasks_update');

//Gifts
Route::get('/all_gifts', [GiftController::class,'getGifts'])->name('all_gifts');
Route::post('/store_gift', [GiftController::class,'storeGift'])->name('storeGift');
Route::get('/view_gift/{id}', [GiftController::class,'viewGift'])->name('view_gift');
Route::get('/add_gift', [GiftController::class,'addGift'])->name('add_gifts');
Route::get('/delete_gift/{id}', [GiftController::class,'deleteGift'])->name('delete_gift');
Route::post('/update_gift', [GiftController::class,'updateGift'])->name('gift_update');

//Dashboard
Route::get('/dashboard', [DashboardController::class,'getDashboard'])->name('dashboard')->middleware('auth');

Route::fallback(function () {return view('fallback.fallback');});
