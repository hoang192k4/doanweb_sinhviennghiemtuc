<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AdminController extends Controller
{
    public function editWebsite(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'facebook' => 'required|url|max:255',
            'youtube' => 'required|url|max:255',
            'phone' => 'required|string|max:10',
            'email' => 'required|email|max:255',
            'address' => 'required|string',
        ]);
        $about = About::first();
        $about->name = $request->input('name');
        $about->facebook = $request->input('facebook');
        $about->youtube = $request->input('youtube');
        $about->phone = $request->input('phone');
        $about->email = $request->input('email');
        $about->address = $request->input('address');
        $about->save();
        return redirect()->back();
    }
    public function editLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = 'logo.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $about = About::first();
            $about->logo = $filename;
            $about->save();
            return redirect()->back();
        }
    }
}
