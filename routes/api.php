<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix("users")->group(function () {
    // POST: http://localhost:8000/api/users
    Route::post("/", [App\Http\Controllers\UserController::class, 'store']);
    // GET: http://localhost:8000/api/users
    Route::get("/", [App\Http\Controllers\UserController::class, 'index']);
    // GET: http://localhost:8000/api/users/{user}
    Route::get("/{user}", [App\Http\Controllers\UserController::class, 'show']);
    // PATCH: http://localhost:8000/api/users/{user}
    Route::patch("/{user}", [App\Http\Controllers\UserController::class, 'update']);
    // DELETE: http://localhost:8000/api/users/{user}
    Route::delete("/{user}", [App\Http\Controllers\UserController::class, 'destroy']);
});

// POST: http://localhost:8000/api/login
Route::post("/login", [App\Http\Controllers\AuthController::class, 'login']);