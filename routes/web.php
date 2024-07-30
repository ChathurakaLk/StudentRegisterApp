<?php

use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;

//home
Route::get('/', [studentController::class, 'index'])->name('student.index');

//store create
Route::get('/student/create', [studentController::class, 'create'])->name('student.create');
Route::post('/student/store', [studentController::class, 'store'])->name('student.store');

//update show
Route::get('student/show/{id}', [studentController::class, 'show'])->name('student.show');
Route::get('student/edit/{id}', [studentController::class, 'edit'])->name('student.edit');
Route::put('student/update/{id}', [studentController::class, 'update'])->name('student.update');

//delete
Route::delete('student/deleteConfirm/{id}', [studentController::class, 'ConfirmDelete'])->name('student.deleteConfirm');
Route::get('student/delete/{id}', [studentController::class, 'destroy'])->name('student.delete');

//payments
Route::get('student/payments/{id}', [studentController::class, 'paymentsShow'])->name('student.paymentsShow');
Route::post('student/payments/{id}', [studentController::class, 'paymentsSave'])->name('student.paymentsSave');
