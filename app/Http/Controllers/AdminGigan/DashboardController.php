<?php

namespace App\Http\Controllers\AdminGigan;

use App\Http\Controllers\Controller;
use App\Models\LandingPage;
use App\Models\Partner;
use App\Models\PortofolioPage;
use App\Models\PortofolioProject;
use App\Models\ServiceMessage;
use App\Models\ServicePage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPartners   = Partner::count();
        $totalServices   = ServicePage::count();
        $totalMessages   = ServiceMessage::count();
        $totalProjects   = PortofolioProject::count();
        $portfolioBanner = PortofolioPage::count(); // biasanya cuma 1
        $landingPages    = LandingPage::count();   // section atau setting

        return view('gigan.admin.dashboard', compact(
            'totalPartners',
            'totalServices',
            'totalMessages',
            'totalProjects',
            'portfolioBanner',
            'landingPages'
        ));
    }
}
