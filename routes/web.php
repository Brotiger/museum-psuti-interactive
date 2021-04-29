<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/employees_list', [EmployeeController::class, "employees_list"])->name('employees_list');
Route::get('/no_information', function(){
    return view('no_information');
})->name('no_information');

Route::get('/employee_more/university/{id}', [EmployeeController::class, "employee_more"])->name('employee_more');