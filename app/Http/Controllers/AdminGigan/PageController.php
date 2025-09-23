<?php

namespace App\Http\Controllers\AdminGigan;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('gigan.admin.pages.index', compact('pages'));
    }

    public function edit(Page $page)
    {
        return view('gigan.admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255'
        ]);

        $page->update($data);
        return redirect()->route('admin.gigan.pages.index')->with('success', 'Pages Updated Successfully!');
    }
}
