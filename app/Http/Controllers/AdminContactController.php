<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ValidateAddContact;

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
        Contact::where('id',$id)->update(['status'=>1]);
        return back()->with('liên hệ đã được hiển thị ở mục đã liên hệ');
    }
    public function addContact(Request $req)
    {
        $validate=$req->validate([
            'name'=>'required|max:50',//bắt buộc nhập, chỉ đc ký từ thường và hoa và chỉ nhập đc 50 ký tự
            'email'=>'required|email|max:255',
            'phone'=>'required|digits:10',
            'title'=>'required|max:255',
            'content'=>'required',
        ],[
            'name.required'=>'không được trống',
                'name.max' =>'tối đa chỉ 50 ký tự',
                'email.required' => 'Trường email là bắt buộc.',
                'email.email' => 'Địa chỉ email không hợp lệ.',
                'email.max' => 'Email không được vượt quá 255 ký tự.',

                'phone.required'=>'không được bỏ trống',
                'phone.digits'=>'chỉ đc nhập 10 ký tự số',
                'title.required'=>'không được bỏ trống',
                'title.max'=>'tối đã 255 ký tự',
                
                'content.required'=>'không được bỏ trống',
        ]);
       
        $data = new Contact();
        $data->id=$req['id'];
        $data->name=$req['name'];
        $data->title=$req['title'];
        $data->content=$req['content'];
        $data->email=$req['email'];
        $data->phone=$req['phone'];
        $data->save();
        return redirect()->route('user.contact')->with('msg','Gửi liên hệ thành công!');
    }
}
