<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('HomePage');
Route::get('/employee', [MainController::class, 'create_form'])->name('NewEmployee_Form');
Route::post('/employee', [MainController::class, 'create'])->name('NewEmployee');

Route::get('/editEmployee/{id}', [MainController::class, 'edit_employee_form'])->name('editEmployee_form');
Route::post('/editEmployee/{id}', [MainController::class, 'edit_employee_save'])->name('editEmployee_save');

Route::get('/trashEmployee/{id}', [MainController::class, 'trash_employee_save'])->name('trashEmployee');

Route::get('/trashEmployee/', [MainController::class, 'trash_employee'])->name('Trash_Employee');

Route::get('/trashEmployee/Restore/{id}', [MainController::class, 'trash_employee_restore'])->name('trash_employee_restore');
Route::get('/trashEmployee/Delete/{id}', [MainController::class, 'trash_employee_delete'])->name('trash_employee_delete');
