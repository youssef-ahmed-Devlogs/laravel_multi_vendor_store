<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function login()
    {
        return view('dashboard.auth.login');
    }
}
