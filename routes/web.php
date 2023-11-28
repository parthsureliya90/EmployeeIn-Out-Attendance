<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/employee', [App\Http\Controllers\EmployeesController::class, 'index'])->name('employee');
Route::get('/employee-create', [App\Http\Controllers\EmployeesController::class, 'create'])->name('emp_create');
Route::post('/employee-store', [App\Http\Controllers\EmployeesController::class, 'store'])->name('emp_store');
Route::get('/employee-edit/{id}', [App\Http\Controllers\EmployeesController::class, 'edit'])->name('emp_edit');
Route::post('/employee-update', [App\Http\Controllers\EmployeesController::class, 'update'])->name('emp_update');
Route::get('/employee-destroy/{id}', [App\Http\Controllers\EmployeesController::class, 'destroy'])->name('emp_destroy');




Route::get('/attendance/{status?}', [App\Http\Controllers\AttendancesController::class, 'index'])->name('attendance');



Route::get('/attendance-log/{id}/{status}', [App\Http\Controllers\AttendancesLogController::class, 'store'])->name('attendance_log_store');
