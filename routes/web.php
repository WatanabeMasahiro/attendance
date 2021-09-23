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

// Route::get('remarks_change', [AttendanceController::class, 'remarks_changeGet'])->middleware('auth');
// Route::post('/remarks_change', [AttendanceController::class, 'remarks_changePost'])->middleware('auth');

Route::get('attendance', [AttendanceController::class, 'attendanceGet'])->middleware('auth');
Route::post('/attendance', [AttendanceController::class, 'attendancePost'])->middleware('auth');

Route::get('staff_register', [AttendanceController::class, 'staff_registerGet'])->middleware('auth');
Route::post('/staff_register', [AttendanceController::class, 'staff_registerPost'])->middleware('auth');

Route::get('onsite_register', [AttendanceController::class, 'onsite_registerGet'])->middleware('auth');
Route::post('/onsite_register', [AttendanceController::class, 'onsite_registerPost'])->middleware('auth');

Route::get('info_change', [AttendanceController::class, 'info_changeGet'])->middleware('auth');
Route::post('/info_change', [AttendanceController::class, 'info_changePost'])->middleware('auth');

Route::get('withdrawal', [AttendanceController::class, 'withdrawalGet'])->middleware('auth');
Route::post('/withdrawal', [AttendanceController::class, 'withdrawalPost'])->middleware('auth');

Route::get('content_update_delete', [AttendanceController::class, 'content_update_deleteGet'])->middleware('auth');
Route::post('/content_update_delete', [AttendanceController::class, 'content_update_deletePost'])->middleware('auth');

Route::get('staff_update_delete', [AttendanceController::class, 'staff_update_deleteGet'])->middleware('auth');
Route::post('/staff_update_delete', [AttendanceController::class, 'staff_update_deletePost'])->middleware('auth');

Route::get('onsite_update_delete', [AttendanceController::class, 'onsite_update_deleteGet'])->middleware('auth');
Route::post('/onsite_update_delete', [AttendanceController::class, 'onsite_update_deletePost'])->middleware('auth');

Route::get('pagepass', [AttendanceController::class, 'pagepass_sessionGet'])->middleware('auth');
Route::post('/pagepass', [AttendanceController::class, 'pagepass_sessionPost'])->middleware('auth');


Auth::routes();


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('error/{code}', function ($code) {
//     abort($code);
//   });
