<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\PortofolioPage;
use App\Models\PortofolioProject;
use Illuminate\Http\Request;

class PortofolioPageController extends Controller
{
    public function index()

    {
        $banner= PortofolioPage::latest()->first();
        $projects = PortofolioProject::latest()->get();
        return view('gigan.frontend.portofolio', compact('banner', 'projects'));
    }
}
