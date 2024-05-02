<?php

declare(strict_types=1);

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get("/login", [LoginController::class, "create"])->name("login");
