<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarouselItemsController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\PromptController;
use App\Http\Controllers\UserController;

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
Route::controller(AuthController::class)->group(function () {
    Route::post('/login',   'login')->name('user.login');
    Route::post('/logout',  'logout');
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CarouselItemsController::class)->group(function () {
    Route::get('/carousel',         'index');
    Route::get('/carousel/{id}',    'show');
    Route::post('/carousel',        'store');
    Route::put('/carousel/{id}',    'update');
    Route::delete('/carousel/{id}', 'destroy');
});

// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/{id}',[UserController::class, 'show']);
// Route::post('/user',[UserController::class, 'store'])->name('user.store');
// Route::put('/user/{id}',[UserController::class, 'update'])->name('user.update');
// Route::put('/user/email/{id}',[UserController::class, 'email'])->name('user.email');
// Route::put('/user/password/{id}',[UserController::class, 'password'])->name('user.password');
// Route::delete('/user/{id}',[UserController::class, 'destroy']);

Route::get('/student', [StudentController::class, 'index']);
Route::get('/student/{id}',[StudentController::class, 'show']);
Route::post('/student',[StudentController::class, 'store']);
Route::put('/student/{id}',[StudentController::class, 'update']);
Route::delete('/student/{id}',[StudentController::class, 'destroy']);

Route::get('/prompts', [PromptController::class, 'index']);
Route::get('/prompts/{id}',[PromptController::class, 'show']);
Route::post('/prompts',[PromptController::class, 'store']);
Route::delete('/prompts/{id}',[PromptController::class, 'destroy']);




