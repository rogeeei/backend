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

//Public API
Route::post('/login',[AuthController::class,'login'])->name('user.login');
Route::post('/user',[UserController::class, 'store'])->name('user.store');


//Private API
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout',[AuthController::class,'logout']);


    Route::controller(CarouselItemsController::class)->group(function () {
        Route::get('/carousel',         'index');
        Route::get('/carousel/{id}',    'show');
        Route::post('/carousel',        'store');
        Route::put('/carousel/{id}',    'update');
        Route::delete('/carousel/{id}', 'destroy');
    });

    Route::controller(UserController::class)->group(function () {
    Route::get('/user',                    'index');
    Route::get('/user/{id}',                'show');
    Route::put('/user/{id}',                'update')->name('user.update');
    Route::put('/user/email/{id}',          'email')->name('user.email');
    Route::put('/user/password/{id}',       'password')->name('user.password');
    Route::delete('/user/{id}',             'destroy');

    });
});


Route::get('/student', [StudentController::class, 'index']);
Route::get('/student/{id}',[StudentController::class, 'show']);
Route::post('/student',[StudentController::class, 'store']);
Route::put('/student/{id}',[StudentController::class, 'update']);
Route::delete('/student/{id}',[StudentController::class, 'destroy']);

Route::get('/prompts', [PromptController::class, 'index']);
Route::get('/prompts/{id}',[PromptController::class, 'show']);
Route::post('/prompts',[PromptController::class, 'store']);
Route::delete('/prompts/{id}',[PromptController::class, 'destroy']);




