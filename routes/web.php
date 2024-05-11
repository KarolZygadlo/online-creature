<?php

declare(strict_types=1);

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OcrController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function (): void {
    Route::get("/", [LoginController::class, "create"])->name("home");
    Route::post("/login", [LoginController::class, "store"])->name("login");
    Route::get("/form", [FormController::class, "index"])->name("form");
    Route::post("/process", [FormController::class, "process"])->name("process");
});

Route::get("/test", [OcrController::class, "test"]);
Route::get("/ocr/getResult/{processId}/{type}", [OcrController::class, "getResult"]);


Route::middleware("auth")->group(function (): void {
    Route::get("/dashboard", DashboardController::class)->name("dashboard");
});
