<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminContactController extends Controller
{
    public function hienThiLienHe(){
        $danhSachLienHe=Contact::all();
        return view('admin.pages.contact')->with('danhSachLienHe',$danhSachLienHe);
    }
    public function chucNangXoaLienHe(string $id){
        Contact::where('id',$id)->delete();
        return redirect()->route('admin.pages.contact');
    }
}
