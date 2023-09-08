<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create()
    {
        return inertia('Auth/Login');
    }

    // Create user session
    public function store()
    {
    }

    // Logout function
    public function destroy()
    {
    }
}
