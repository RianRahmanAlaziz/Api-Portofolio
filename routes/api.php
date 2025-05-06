<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutmeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyprojectController;
use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Bagian Page
Route::get('/home', [HomeController::class, 'api']);
Route::get('/aboutme', [AboutmeController::class, 'api']);
Route::get('/project', [MyprojectController::class, 'api']);
Route::get('/contact', [ContactController::class, 'api']);


Route::get('/projects', [ProjectController::class, 'api']);
Route::get('/category', [CategoryController::class, 'api']);
Route::get('/about', [AboutController::class, 'api']);
Route::get('/experience', [ExperienceController::class, 'api']);
Route::get('/education', [EducationController::class, 'api']);
