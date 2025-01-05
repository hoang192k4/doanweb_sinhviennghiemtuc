<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminProductVariantController;
use App\Http\Controllers\AdminBrandController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\AdminContactController;

use App\Http\Controllers\HomeController;



Route::controller(UserController::class)->group(function () {
    Route::get('/gioithieu', "GioiThieu")->name('user.blog');
    Route::get('/contact', "LienHe")->name('user.contact');
    Route::get('/shoppingcart', "GioHang")->name('user.shoppingcart');
    Route::get('/', "index")->name('user.index');

    Route::get('seach/{slug}/{id?}', "TimKiemSanPhamFH")->name('timkiemsanpham');
    Route::get('seach', "TimKiemTheoTuKhoa")->name('timkiemtheotukhoa');

});

Route::get('/detail', function () {
    return view('user.pages.detail');
});

Route::get('/search', function () {
    return view('user.pages.search');
});
Route::get('/blog', function () {
    return view('user.pages.blog');
});
Route::get('/changepassword', function () {
    return view('user.profile.changepassword');
});
Route::get('/lienhe', function () {
    return view('user.pages.contact');
});
Route::get('/giohang', function () {
    return view('user.profile.shoppingcart');
});
Route::get('/thanhtoan', function () {
    return view('user.profile.payment');
});
Route::get('/admin/category', function () {
    return view('admin.category.category');
});
Route::get('/admin/editcategory', function () {
    return view('admin.category.editcategory');
});
Route::get('/admin/addbrand', function () {
    return view('admin.category.addbrand');
});
Route::get('/admin/editbrand', function () {
    return view('admin.category.editbrand');
});
Route::get('/admin/addcategory', function () {
    return view('admin.category.addcategory');
});
Route::get('/admin/comment', function () {
    return view('admin.pages.review');
});

//Route profile
Route::get('/trangcanhan', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/trangcanhan/editInfo', [ProfileController::class, 'editInfo'])->name('profile.editInfo');
Route::post('/trangcanhan/editImage', [ProfileController::class, 'editImage'])->name('profile.editImage');
Route::get('/lichsudonhang', function () {
    return view('user.profile.order_history');
});
Route::get('/sanphamyeuthich', function () {
    return view('user.profile.favourite_product');
});
Route::get('/lichsudanhgia', function () {
    return view('user.profile.review_history');
});

//Route dashboard
Route::get('/admin', function () {
    return view('admin.pages.index');
});
Route::post('/admin/editWebsite', [AdminController::class, 'editWebsite'])->name('admin.editWebsite');
Route::post('/admin/editLogo', [AdminController::class, 'editLogo'])->name('admin.editLogo');

//Route quan ly don hang
Route::get('/admin/order', function () {
    return view('admin.pages.order');
});
Route::post('/admin/updateChuanBi/{id}', [AdminOrderController::class, 'updateChuanBi'])->name('admin.updateChuanBi');
Route::post('/admin/updateVanChuyen/{id}', [AdminOrderController::class, 'updateVanChuyen'])->name('admin.updateVanChuyen');


Route::get('/admin/statistical', function () {
    return view('admin.pages.statistical');
});

//Route quan ly san pham
Route::get('/admin/product/active/{id}', [AdminProductController::class, 'active'])->name('admin.product.active');
Route::get('/admin/product/deactive/{id}', [AdminProductController::class, 'deactive'])->name('admin.product.deactive');
Route::get('/admin/proudct/list-product-unapproved', [AdminProductController::class, 'getListProductsUnapproved'])->name('admin.product.unapproved');
Route::get('/admin/product/search', [AdminProductController::class, 'search'])->name('admin.product.search');
Route::get('/admin/product/filter', [AdminProductController::class, 'filter'])->name('admin.product.filter');
Route::get('/admin/product-variant/{id}', [AdminProductVariantController::class, 'index'])->name('admin.product_variant.index');
Route::get('/admin/product-variant-hidden/{id}', [AdminProductVariantController::class, 'showListVariantsHide'])->name('product_variant_hide');
Route::PUT('/admin/product-variant/active/{id}', [AdminProductVariantController::class, 'active']);
Route::post('/admin/product/is_isset', [AdminProductController::class, 'isIssetProduct']);
Route::resource('/admin/product-variant', AdminProductVariantController::class)->except(['index']);
Route::resource('/admin/product', AdminProductController::class);

//Route quan ly thuong hieu
Route::get('/admin/brand/filter/{opt}', [AdminBrandController::class, 'filter']);


//Route quan li lien he

Route::get('/admin/contact', [AdminContactController::class, 'showListContacts'])->name('admin.contact');
Route::delete('/admin/contact/delete/{id}', [AdminContactController::class, 'deleteContact'])->name('admin.contact.delete');

