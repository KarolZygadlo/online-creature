<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class FormController extends Controller
{
    public function index(): View
    {
        return view("form");
    }

    public function process(): View
    {
        return view("components.code", [
            "code" => json_encode([
                "name" => "John Doe",
                "email" => "john@example.com",
                "phone" => "1234567890",
                "message" => "Hello, World!",
            ], JSON_PRETTY_PRINT),
        ]);
    }
}
