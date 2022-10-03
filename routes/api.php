<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

/*-               REFACTORED
    uses AND todos ROUTES WITH 'Route::apiResources' 
    CALLS ALL 'routes' WITHOUT 'create and edit' 
-*/
// MAKE SURE YOU SPELL "Route::apiResources" PLURAL WITH A 's' apiResources not apiResource
Route::apiResources([
    'users' => UserController::class,
    'todos' => TodoController::class,
]);

/*- authors AND books ORIGINAL ROUTES-*/

// Route::get('/todos', [TodoController::class, 'index']);
// Route::get('/todos/{todo}', [TodoController::class, 'show']);
// Route::put('/todos/{todo}', [TodoController::class, 'update']);
// Route::patch('/todos/{todo}', [TodoController::class, 'update']);
// Route::post('/todos', [TodoController::class, 'store']);
// Route::delete('/todos/{todo}', [TodoController::class, 'destroy']);

// Route::get('/users', [UserController::class, 'index']);
// Route::get('/users/{user}', [UserController::class, 'show']);
// Route::put('/users/{user}', [UserController::class, 'update']);
// Route::patch('/users/{user}', [UserController::class, 'update']);
// Route::post('/users', [UserController::class, 'store']);
// Route::delete('/users/{user}', [UserController::class, 'destroy']);
