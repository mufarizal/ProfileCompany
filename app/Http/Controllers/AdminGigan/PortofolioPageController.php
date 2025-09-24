<?php

namespace App\Http\Controllers\AdminGigan;

use App\Http\Controllers\Controller;
use App\Models\PortofolioPage;
use App\Models\PortofolioProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioPageController extends Controller
{
    public function index()
    {
        $banner = PortofolioPage::first();
        $projects = PortofolioProject::latest()->get();

        return view('gigan.admin.portofolio.index', compact('banner', 'projects'));
    }

    public function updateBanner(Request $request)
    {
        $data =  $request->validate([
            'banner_title'=>'nullable|string|max:255',
            'banner_subtitle'=>'nullable|string|max:255',
            'banner_image'=>'nullable|image|mimes:jpg,jpeg,png|max:5120'
        ]);

        $banner = PortofolioPage::firstOrCreate([]);

        if($request->hasFile('banner_image')){
            if($banner->banner_image && Storage::disk('public')->exists($banner->banner_image)){
                Storage::disk('public')->delete($banner->banner_image);
            }
            $data['banner_image'] = $request->file('banner_image')->store('portofolio/banners', 'public');
        }

        $banner->update($data);

        return back()->with('success', 'Banner Updated Successfully!');
    }

    public function createProject()
    {
        return view('gigan.admin.portofolio.create');
    }

    public function storeProject(Request $request)
    {
        $data = $request->validate([
            'title'=>'nullable|string|max:255',
            'subtitle'=>'nullable|string',
            'image'=>'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $data['portofolio_page_id'] = PortofolioPage::first()->id ?? PortofolioPage::create([])->id;

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('portofolio/projects', 'public');
        }

        PortofolioProject::create($data);
        return redirect()->route('admin.gigan.portfolio.index')->with('success', 'Projects SuccessFully Created!');
    }

    public function editProject(PortofolioProject $project)
    {
        return view('gigan.admin.portofolio.edit', compact('project'));
    }

    public function updateProject(Request $request, PortofolioProject $project)
    {
        $data = $request->validate([
            'title'=>'nullable|string|max:255',
            'description'=>'nullable|string',
            'image'=>'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

         if($request->hasFile('image')){
            if($project->image && Storage::disk('public')->exists($project->image)){
                Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('portofolio/project$projects', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.gigan.portfolio.index')->with('success', 'Projects SuccessFully Updated!');
    }


    public function destroyProject(PortofolioProject $project)
    {
        if($project->image && Storage::disk('public')->exists($project->image)){
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();
        return back()->with('success', 'Project SuccessFully Deleted!');
    }
}
