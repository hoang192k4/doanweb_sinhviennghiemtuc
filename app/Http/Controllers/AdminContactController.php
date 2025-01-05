<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class AdminContactController extends Controller
{
    //
    public function showListContacts(){
        $danhSachLienHeChuaDuyet = Contact::where('status',0)->get();
        $danhSachLienHeDaDuyet = Contact::where('status',1)->get();
        return view('admin.pages.contact',['danhSachLienHeChuaDuyet'=>$danhSachLienHeChuaDuyet,'danhSachLienHeDaDuyet'=>$danhSachLienHeDaDuyet]);
    }
    public function deleteContact($id){
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return view('admin.pages.contact')->with('liên hệ của'.$contact->name.'đã xóa thành công');
    }
    public function updateContact($id){
        Contact::where('id',$id)->update(['status'=>0]);
        return back()->with('liên hệ đã được hiển thị ở mục đã liên hệ');
    }
}
