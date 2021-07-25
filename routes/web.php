<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\GraduateController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TimeLineController;
use App\Http\Controllers\PageController;

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

Route::get('/graduates/{name}', [GraduateController::class, "graduates_list"])->name('graduates_list');

Route::get('/no_information', function(){
    return view('no_information');
})->name('no_information');

Route::prefix('/employees/{name}')->group(function(){
    Route::get('/{post?}', [EmployeeController::class, "employees_list"])->name('employees_list');
    Route::get('/more/{id?}', [EmployeeController::class, "employee_more"])->name('employee_more');
});

Route::prefix('/units/{name}')->group(function(){
    Route::get('', [UnitController::class, "units_list"])->name('units_list');
    Route::get('/more/{id?}', [UnitController::class, 'unit_more'])->name('unit_more');
});

Route::prefix('/events/{name}')->group(function(){
    Route::get('', [EventController::class, "events_list"])->name('events_list');
    Route::get('/more/{id?}', [EventController::class, 'event_more'])->name('event_more');
});

Route::get('/time_line/{name}', [TimeLineController::class, "index"])->name('time_line');

Route::get('/museum_3d', function(){
    return view("museum3D");
})->name('museum_3d');

Route::get('/page/{alias}', [PageController::class, "index"])->name('page');