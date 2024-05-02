<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LoginController extends Controller
{
    public function create(): View
    {
        return View("login");
    }

}
