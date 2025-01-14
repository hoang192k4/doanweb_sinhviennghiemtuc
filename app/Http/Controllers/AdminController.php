<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\About;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }
    public function editWebsite(Request $request)
    {
        $request->validate([
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
            $filename = 'logo.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $about = About::first();
            $about->logo = $filename;
            $about->save();
            return redirect()->back();
        }
    }
    public function profile()
    {
        return view('admin.pages.profile')->with('user',Auth::user());
    }
    public function editProfile(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50',
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:10',
            'gender' => 'required|string',
            'birthday' => 'required|date',
        ]);
        $user = Auth::user();
        $user->username = $request->input('username');
        $user->full_name = $request->input('fullname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender') == 'male' ? 'Nam' : 'Nữ';
        $user->date_of_birth = $request->input('birthday');
        $user->save();
        return redirect()->back();
    }
    public function editAvatar(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'image.' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $user = Auth::user();
            $user->image = $filename;
            $user->save();
            return redirect()->back();
        }
    }
}
