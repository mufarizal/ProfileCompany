<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\LandingPage;
use App\Models\PortofolioProject;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil LandingPage pertama beserta relasi partners
        $landingPage = LandingPage::with('partners')->first();
        $projects = PortofolioProject::latest()->take(3)->get();
        return view('gigan.frontend.landingpage', compact('landingPage', 'projects'));
    }
}
