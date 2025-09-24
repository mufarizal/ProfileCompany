<?php

namespace App\Http\Controllers\AdminGigan;

use App\Http\Controllers\Controller;
use App\Models\ServicePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicePage1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // INDEX ADMIN
    public function index()
    {
        $services = ServicePage::whereNull('banner_title')->get(); // hanya services
        $banner = ServicePage::whereNotNull('banner_title')->first(); // banner halaman
        return view('gigan.admin.services.index', compact('services','banner'));
    }

    // CREATE SERVICE
    public function create()
    {
        return view('gigan.admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
            'icon'=>'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        if($request->hasFile('icon')){
            $data['icon'] = $request->file('icon')->store('services', 'public');
        }

        ServicePage::create($data);
        return redirect()->route('admin.gigan.services.index')->with('success','Service Created Successfully!');
    }

    // EDIT SERVICE
    public function edit(ServicePage $service)
    {
        return view('gigan.admin.services.edit', compact('service'));
    }

    public function update(Request $request, ServicePage $service)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
            'icon'=>'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        if($request->hasFile('icon')){
            if($service->icon && Storage::disk('public')->exists($service->icon)){
                Storage::disk('public')->delete($service->icon);
            }
            $data['icon'] = $request->file('icon')->store('services', 'public');
        }

        $service->update($data);
        return redirect()->route('admin.gigan.services.index')->with('success','Service Updated Successfully!');
    }

    public function destroy(ServicePage $service)
    {
        if($service->icon && Storage::disk('public')->exists($service->icon)){
            Storage::disk('public')->delete($service->icon);
        }
        $service->delete();
        return back()->with('success','Service Deleted Successfully!');
    }

    // UPDATE BANNER
    public function updateBanner(Request $request, ServicePage $banner)
    {
        $data = $request->validate([
            'banner_title'=>'nullable|string|max:255',
            'banner_subtitle'=>'nullable|string|max:255',
            'banner_image'=>'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        if($request->hasFile('banner_image')){
            if($banner->banner_image && Storage::disk('public')->exists($banner->banner_image)){
                Storage::disk('public')->delete($banner->banner_image);
            }
            $data['banner_image'] = $request->file('banner_image')->store('services/banners','public');
        }

        $banner->update($data);
        return back()->with('success','Banner Updated Successfully!');
    }

    // PESAN PENGUNJUNG
    public function messages()
    {
        $requests = ServicePage::whereNotNull('message')->latest()->paginate(20);
        return view('gigan.admin.services.message', compact('requests'));
    }
}
