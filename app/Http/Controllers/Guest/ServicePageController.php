<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\ServiceMessage;
use App\Models\ServicePage;
use Illuminate\Http\Request;

class ServicePageController extends Controller
{
    public function index()
    {
        $banner = ServicePage::whereNotNull('banner_title')->first();
        $services = ServicePage::whereNull('banner_title')->get();

        return view('gigan.frontend.services', compact('banner','services'));
    }

    public function contact(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'message'=>'required|string',
        ]);

        // Simpan ke satu row banner, bisa dipisah ke table service_messages juga
        ServiceMessage::create($data);

        return back()->with('success','Pesan berhasil dikirim!');
    }
}
