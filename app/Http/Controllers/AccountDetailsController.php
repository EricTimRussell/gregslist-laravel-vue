<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountDetailsController extends Controller
{
    public function index()
    {
        return inertia('Account/Index');
    }
}
