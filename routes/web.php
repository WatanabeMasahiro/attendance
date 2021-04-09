<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;

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


Route::get('/', [AttendanceController::class, 'indexGet']);
Route::post('/', [AttendanceController::class, 'indexPost']);

Route::get('attendance', [AttendanceController::class, 'attendanceGet']);
Route::post('/attendance', [AttendanceController::class, 'attendancePost']);

Route::get('pass_page', [AttendanceController::class, 'pass_pageGet']);
Route::post('/pass_page', [AttendanceController::class, 'pass_pagePost']);

Route::get('staff_register', [AttendanceController::class, 'staff_registerGet']);
Route::post('/staff_register', [AttendanceController::class, 'staff_registerPost']);

Route::get('onsite_register', [AttendanceController::class, 'onsite_registerGet']);
Route::post('/onsite_register', [AttendanceController::class, 'onsite_registerPost']);

Route::get('pagepass_change', [AttendanceController::class, 'pagepass_changeGet']);
Route::post('/pagepass_change', [AttendanceController::class, 'pagepass_changePost']);


// Auth::routes();


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
