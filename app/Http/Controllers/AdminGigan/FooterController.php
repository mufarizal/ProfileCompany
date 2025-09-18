<?php

namespace App\Http\Controllers\AdminGigan;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function edit()
    {
        $footer = Footer::first();
        return view('gigan.admin.footer.edit', compact('footer'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'company_name'=>'nullable|string',
            'address'=>'nullable|string',
            'phone'=>'nullable|string',
            'email'=>'nullable|string',
            'instagram'=>'nullable|string',
        ]);

        Footer::updateOrCreate(['id'=>1], $data);
        return back()->with('success', 'Footer Update Success!');
    }
}
