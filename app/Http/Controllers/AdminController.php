<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AdminController extends Controller
{
    public function editWebsite(Request $request)
    {
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
}
