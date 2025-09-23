<?php

namespace App\Http\Controllers\AdminGigan;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Page;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        $banners = Banner::with('page')->get();
        return view('gigan.admin.banner.index', compact('banners', 'pages'));
    }

    public function create()
    {
        $pages = Page::all();
        return view('gigan.admin.banner.create', compact('pages'));
    }

    public function store(Request $request)
    {
        $data  = $request->validate([
            'page_id'=>'required|exists:pages,id',
            'title'=>'nullable|string|max:225',
            'subtitle'=>'nullable|string|max:225',
            'image'=>'required|image|mimes:jpg,jpeg,png|max:5120'
        ]);

        $data['image_path'] = $request->file('image')->store('banners', 'public');
        Banner::create($data);

        return redirect()->route('admin.gigan.banner.index')->with('success', 'Banner Created');
    }

    public function edit(Banner $banner)
    {
        $pages = Page::all();
        return view('gigan.admin.banner.edit', compact('pages', 'banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $data = $request->validate([
            'page_id'=>'required|exists:pages,id',
            'title'=>'nullable|string|max:225',
            'subtitle'=>'nullable|string|max:225',
            'image'=>'nullable|image|mimes:jpg,jpeg,png|max:5120'
        ]);

        if($request->hasFile('image')){
            $data ['image_path'] = $request->file('image')->store('banners', 'public');
        }

        $banner->update($data);

        return redirect()->route('admin.gigan.banner.index')->with('success', 'Banner Updated');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('admin.gigan.banner.index')->with('success', 'Banner Deleted!');
    }
}
