<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutmeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyprojectController;
use App\Http\Controllers\ProjectController;
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

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'index')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
});

Route::get('/dashboard/project/checkslug', [ProjectController::class, 'checkslug']);

Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/home', HomeController::class);
    Route::resource('/aboutme', AboutmeController::class);
    Route::resource('/myproject', MyprojectController::class);
    Route::resource('/contact', ContactController::class);

    Route::resource('/project', ProjectController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/about', AboutController::class);
    Route::resource('/education', EducationController::class);
    Route::resource('/experience', ExperienceController::class);
});
