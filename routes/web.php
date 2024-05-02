<?php

declare(strict_types=1);

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function (): void {
    Route::get("/", [LoginController::class, "create"])->name("home");
    Route::post("/login", [LoginController::class, "store"])->name("login");
});

Route::middleware("auth")->group(function (): void {
    Route::get("/dashboard", DashboardController::class)->name("dashboard");
});
