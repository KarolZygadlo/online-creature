<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function create(): View
    {
        return View("login");
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->only("email", "password");

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route("dashboard");
        }

        return back()->withErrors([
            "email" => "The provided credentials do not match our records.",
        ]);
    }
}
