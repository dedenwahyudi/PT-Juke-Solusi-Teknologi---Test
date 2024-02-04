<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/login_user', [LoginController::class, 'login_user'])->name('login_user');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register_user', [LoginController::class, 'register_user'])->name('register_user');
Route::get('/administrator', [LoginController::class, 'administrator'])->name('administrator')->middleware('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
Route::get('/add_new_employee', [EmployeeController::class, 'create'])->name('add_new_employee');
Route::post('/save_employee_data', [EmployeeController::class, 'store'])->name('save_employee_data');
Route::get('/edit_employee_data/{id}', [EmployeeController::class, 'edit'])->name('edit_employee_data');
Route::post('/update_employee_data/{id}', [EmployeeController::class, 'update'])->name('update_employee_data');
Route::get('/delete_employee_data/{id}', [EmployeeController::class, 'destroy'])->name('delete_employee_data');
Route::get('/print_employee_data', [EmployeeController::class, 'print_employee_data'])->name('print_employee_data');
Route::get('/employee_data/search', [EmployeeController::class, 'search'])->name('employee_data.search');
Route::put('/update_employee_data/{id}', [EmployeeController::class, 'updateEmployee'])->name('update_employee');
