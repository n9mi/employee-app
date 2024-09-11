<?php

use App\Http\Controllers\Web\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ EmployeeController::class, 'index'] )
    ->name('employee');
Route::get('/create', [ EmployeeController::class, 'create'] )
    ->name('employee.create');
Route::post('/', [ EmployeeController::class, 'store'] )
    ->name('employee.store');
