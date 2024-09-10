<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    #---- load dashboard index page ---#
    public function index()
    {
        return view('pages.dashboard');
    }
}
