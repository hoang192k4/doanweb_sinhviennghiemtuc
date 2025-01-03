<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::controller(UserController::class)->group(function(){
    Route::get('/gioithieu',"GioiThieu")->name('user.blog');
    Route::get('/contact',"LienHe")->name('user.contact');
    Route::get('/shoppingcart',"GioHang")->name('user.shoppingcart');    
    Route::get('/',"index")->name('user.index');
    Route::get('/{slug}/{id?}',"TimKiemSanPhamFH")->name('timkiemsanpham');
});
Route::get('/detail', function(){
    return view('user.pages.detail');
});

Route::get('/search', function(){
    return view('user.pages.search');
});
Route::get('/blog', function(){
    return view('user.pages.blog');
});

Route::get('/changepassword', function(){
    return view('user.profile.changepassword');
});
Route::get('/lichsudonhang', function(){
    return view('user.profile.order_history');
});
Route::get('/lienhe', function(){
    return view('user.pages.contact');
});
Route::get('/trangcanhan', function(){
    return view('user.profile.profile');
});
Route::get('/lichsudanhgia', function(){
    return view('user.profile.review_history');
});
Route::get('/sanphamyeuthich', function(){
    return view('user.profile.favourite_product');
});
Route::get('/giohang', function(){
    return view('user.profile.shoppingcart');
});
Route::get('/thanhtoan', function(){
    return view('user.profile.payment');
});
Route::get('/admin/index',function(){
    return view('admin.pages.index');
});
Route::get('/admin/category',function(){
    return view('admin.category.category');
});
Route::get('/admin/editcategory',function(){
    return view('admin.category.editcategory');
});
Route::get('/admin/addbrand',function(){
    return view('admin.category.addbrand');
});
Route::get('/admin/editbrand',function(){
    return view('admin.category.editbrand');
});
Route::get('/admin/addcategory',function(){
    return view('admin.category.addcategory');
});
Route::get('/admin/comment',function(){
    return view('admin.pages.review');
});
Route::get('/admin/order',function(){
    return view('admin.pages.order');
});
Route::get('/admin/contact',function(){
    return view('admin.pages.contact');
});

Route::get('/admin/approved',function(){
    return view('admin.pages.product_approved');
});
Route::get('/admin/product',function(){
    return view('admin.product.product');
});
Route::get('/admin/addproduct',function(){
    return view('admin.product.addproduct');
});
Route::get('/admin/editproduct',function(){
    return view('admin.product.editproduct');
});
Route::get('/admin/statistical',function(){
    return view('admin.pages.statistical');
});
