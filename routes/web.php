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


Route::get('/', [AttendanceController::class, 'indexGet'])->middleware('auth');
// Route::post('/', [AttendanceController::class, 'indexPost']);

Route::get('attendance', [AttendanceController::class, 'attendanceGet'])->middleware('auth');
Route::post('/attendance', [AttendanceController::class, 'attendancePost'])->middleware('auth');

Route::get('staff_register', [AttendanceController::class, 'staff_registerGet'])->middleware('auth');
Route::post('/staff_register', [AttendanceController::class, 'staff_registerPost'])->middleware('auth');

Route::get('onsite_register', [AttendanceController::class, 'onsite_registerGet'])->middleware('auth');
Route::post('/onsite_register', [AttendanceController::class, 'onsite_registerPost'])->middleware('auth');

Route::get('info_change', [AttendanceController::class, 'info_changeGet'])->middleware('auth');
Route::post('/info_change', [AttendanceController::class, 'info_changePost'])->middleware('auth');

// Route::get('pagepass', [AttendanceController::class, 'pagepassGet']);
// Route::post('/pagepass', [AttendanceController::class, 'pagepassPost']);

Route::get('withdrawal', [AttendanceController::class, 'withdrawalGet'])->middleware('auth');
Route::post('/withdrawal', [AttendanceController::class, 'withdrawalPost'])->middleware('auth');



// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
