<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function AdminDashboardPage()
    {
        
        return view('dashboard.pages.dashboard');
    }

}
