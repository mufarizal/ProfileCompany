<?php

namespace App\Http\Controllers\AdminGigan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('gigan.admin.dashboard');
    }
}
