<?php

namespace App\Http\Controllers\AdminGigan;

use App\Http\Controllers\Controller;
use App\Models\LandingPage;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class LandingPage_PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $landingPage = LandingPage::with('partners')->first();
        return view('gigan.admin.landingpage.index',compact('landingPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function edit(LandingPage $landingPage)
    {
        return view('gigan.admin.landingpage.edit', compact('landingPage'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request, LandingPage $landingPage)
    {
        $request->validate([
            'about_title'=>'nullable|string|max:255',
            'about_description'=>'nullable|string',
            'about_image'=>'nullable|image|mimes:jpg,jpeg,png',
            'visi'=>'nullable|string',
            'misi'=>'nullable|string',
            'banner_image'=>'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'banner_title'=>'nullable|string|max:255',
            'banner_subtitle'=>'nullable|string|max:255',
        ]);

        $data = $request->all();

    // About image
    if($request->hasFile('about_image')){
        if($landingPage->about_image && Storage::disk('public')->exists($landingPage->about_image)){
            Storage::disk('public')->delete($landingPage->about_image);
        }
        $data['about_image'] = $request->file('about_image')->store('landing_pages', 'public');
    }

    // Banner image
    if($request->hasFile('banner_image')){
        if($landingPage->banner_image && Storage::disk('public')->exists($landingPage->banner_image)){
            Storage::disk('public')->delete($landingPage->banner_image);
        }
        $data['banner_image'] = $request->file('banner_image')->store('banners', 'public');
    }

    $landingPage->update($data);

        return redirect()->route('admin.gigan.landing-pages.index')->with('success', 'Landing Page Ready Use');
    }

    /**
     * Display the specified resource.
     */
    public function storePartner(Request $request, LandingPage $landingPage)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'image'=>'nullable|image|mimes:jpg,jpeg,png',
            'website'=>'nullable|url',
        ]);

        $data = $request->all();
        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('partners', 'public');
        }

        $landingPage->partners()->create($data);
        return back()->with('success', 'Your Partner Success Created!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updatePartner(Request $request, Partner $partner)
    {
        $request -> validate([
            'name'=>'required|string|max:255',
            'image'=>'nullable|image|mimes:jpg,jpeg,png',
            'website'=>'nullable|url',
        ]);

        $data = $request->all();
        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('partners', 'public');
        }

        $partner->update($data);

        return back()->with('success', 'Partner Updated Successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function destroyPartner(Partner $partner)
    {
        $partner->delete();
        return back()->with('success', 'Partner Deleted Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */

}
