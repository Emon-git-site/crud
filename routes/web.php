<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

/*
|---------------------------------------------------------------------------------
|
| Here is where you can regist---------------
| Web Routes
|----------------------------------------------------er web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::post('employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
Route::get('employee/delete/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete');
    

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
