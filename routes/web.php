<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeFormController;
use App\Http\Controllers\AdminFormController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/employee/form/{code}', [EmployeeFormController::class, 'show'])->name('employee.form');
Route::post('/employee/store/{code}', [EmployeeFormController::class, 'store'])->name('employee.store');
Route::post('/employee/save-draft/{code}', [EmployeeFormController::class, 'saveDraft'])->name('employee.save-draft');
Route::get('/admin/forms/create', [AdminFormController::class, 'create'])->name('admin.forms.create');
Route::post('/admin/forms/store', [AdminFormController::class, 'store'])->name('admin.forms.store');
Route::get('/admin/forms', [AdminFormController::class, 'index'])->name('admin.forms.index');
Route::get('/admin/forms/{id}/{mode}', [AdminFormController::class, 'view'])->name('admin.forms.view');
