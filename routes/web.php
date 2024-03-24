<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'postes' => \App\Http\Controllers\PosteController::class,
    'depts' => \App\Http\Controllers\DeptController::class,
    'employees' => \App\Http\Controllers\EmployeeController::class,
    'talents' => \App\Http\Controllers\TalentController::class,
    'conges' => \App\Http\Controllers\CongesController::class,
]);
Route::get('/profile/edit/{token}', [UserController::class,'editProfile'])->name('profile.edit');
Route::put('/profile/update/{token}', [UserController::class,'updateProfile'])->name('profile.update');

