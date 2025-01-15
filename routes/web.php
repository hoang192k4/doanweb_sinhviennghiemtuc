<?php

use App\Http\Controllers\AdminStaticController;
use App\Http\Middleware\AdminRoleMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminProductVariantController;
use App\Http\Controllers\AdminBrandController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::controller(UserController::class)->group(function () {
    Route::get('/gioithieu', "GioiThieu")->name('user.blog');
    Route::get('/gioithieu/timkiem', 'timKiemBaiVietTheoTuKhoa')->name('searchBlog');
    Route::get('/contact', "LienHe")->name('user.contact');
    Route::post('/addContact', 'addContact');
    Route::get('/', "index")->name('user.index');
    Route::get('seach/{slug}/{id?}', "TimKiemSanPhamFH")->name('timkiemsanpham');
    Route::get('seach', "TimKiemTheoTuKhoa")->name('timkiemtheotukhoa');
    Route::post('/dangky', "DangKy")->name('dangky');
    Route::post('/dangnhap', "DangNhap")->name('dangnhap');
    Route::get('/logout', "Logout")->name('logout');
    Route::get('detail/{slug}', "ChiTietSanPham")->name("detail");
    Route::get('detail/{slug}/{internal_memory}', "LayMauSanPhamTheoBoNho")->name("LayMauSanPhamTheoBoNho");
    Route::get('detail/{slug}/{internal_memory}/{color}', "LayThongTinSanPhamTheoMau")->name("LayThongTinSanPhamTheoMau");
    Route::post('/addContact',  'addContact');
    Route::get('/yeuthich/{sampham}/{user}',  'CapNhapSanPhamYeuThich')->name("SanPhamYeuThich");
    Route::get('/get/{user}/{code}',  'GetDanhSachDanhGia');
    Route::post('/them-danh-gia', 'ThemDanhGia');
});

Route::controller(CartController::class)->group(function () {
    Route::get('/shopping-cart', "index")->name('user.shoppingcart');
    Route::get('/add-to-cart/{id}/{quantity}', "addToCart")->name('cart.add');
    Route::get('/cart-delete-item/{id}', 'deleteItemCart')->name('cart.delete_item');
    Route::get('/cart-delete-all', 'deleteAllItem');
    Route::get('/cart-minus-one-variant/{id}', 'minusOnQuantity');
});

Route::get('/admin/check-stock-variant/{id}', [AdminProductVariantController::class, 'checkStock']);
//Phân quyền quản lý và nhân viên
Route::middleware(['role:QL,NV'])->group(function () {
    //Route profile
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/editProfile', [AdminController::class, 'editProfile'])->middleware(AdminRoleMiddleware::class)->name('admin.editProfile');
    Route::post('/admin/editAvatar', [AdminController::class, 'editAvatar'])->middleware(AdminRoleMiddleware::class)->name('admin.editAvatar');
    Route::get('/admin/changepw', [AdminController::class, 'changepw'])->name('admin.changepw');
    Route::post('/checkpw', [AdminController::class, 'IsPasswordChange'])->name('profile.checkpw');
    Route::post('/changepw', [AdminController::class, 'UpdatePassword'])->name('profile.changepw');

    //Route dashboard
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/editWebsite', [AdminController::class, 'editWebsite'])->middleware(AdminRoleMiddleware::class)->name('admin.editWebsite');
    Route::post('/admin/editLogo', [AdminController::class, 'editLogo'])->middleware(AdminRoleMiddleware::class)->name('admin.editLogo');

    //Route quan ly don hang
    Route::get('/admin/order', [AdminOrderController::class, 'index'])->name('admin.order');
    Route::get('/admin/updateChuanBi/{id}', [AdminOrderController::class, 'updateChuanBi'])->name('admin.updateChuanBi');
    Route::get('/admin/updateVanChuyen/{id}', [AdminOrderController::class, 'updateVanChuyen'])->name('admin.updateVanChuyen');
    Route::post('/admin/order/delete/{id}', [AdminOrderController::class, 'deleteOrder'])->name('order.delete');
    Route::post('/admin/order/cancel/{id}', [AdminOrderController::class, 'cancelOrder'])->name('order.cancel');

    //Route quan li thong ke
    Route::get('/admin/static', [AdminStaticController::class, 'index'])->name('admin.static');

    Route::get('/admin/category-specification/{id}', [AdminCategoryController::class, 'loadCategorySpecification']);

    //Route quan ly san pham
    Route::get('/admin/product/active/{id}', [AdminProductController::class, 'active'])->middleware(AdminRoleMiddleware::class)->name('admin.product.active');
    Route::get('/admin/product/deactive/{id}', [AdminProductController::class, 'deactive'])->middleware(AdminRoleMiddleware::class)->name('admin.product.deactive');
    Route::get('/admin/product/search', [AdminProductController::class, 'search'])->name('admin.product.search');
    Route::get('/admin/proudct/list-product-unapproved', [AdminProductController::class, 'getListProductsUnapproved'])->middleware(AdminRoleMiddleware::class)->name('admin.product.unapproved');
    Route::get('/admin/product/filter', [AdminProductController::class, 'filter'])->name('admin.product.filter');
    Route::get('/admin/product-variant/{id}', [AdminProductVariantController::class, 'index'])->name('admin.product_variant.index');
    Route::get('/admin/product-variant-hidden/{id}', [AdminProductVariantController::class, 'showListVariantsHide'])->name('product_variant_hide');
    Route::PUT('/admin/product-variant/active/{id}', [AdminProductVariantController::class, 'active'])->middleware(AdminRoleMiddleware::class);
    Route::post('/admin/product/is_isset', [AdminProductController::class, 'isIssetProduct']);

    Route::resource('/admin/product-variant', AdminProductVariantController::class)->except(['index']);
    Route::resource('/admin/product', AdminProductController::class);

    //Route quan ly thuong hieu
    Route::get('/admin/brand/filter/{opt}', [AdminBrandController::class, 'filter']);

    //Route quan li lien he
    Route::get('/admin/contact', [AdminContactController::class, 'showListContacts'])->name('admin.contact');
    Route::delete('/admin/contact/delete/{id}', [AdminContactController::class, 'deleteContact'])->name('contact.delete');
    Route::get('/admin/contact/update/{id}', [AdminContactController::class, 'updateContact'])->name('contact.update');


    //quản lý đánh giá
    Route::get('/admin/review', [AdminReviewController::class, 'showListReviews'])->name('admin.review');
    Route::delete('/admin/review/delete/{id}', [AdminReviewController::class, 'deleteReviews'])->name('admin.review.delete');
});


//Phân quyền quản lý
Route::middleware(['role:QL'])->group(function () {});



//Phân quyền quản lý , nhân viên và khách hàng
Route::middleware(['role:QL,NV,KH'])->group(function () {});

//phân quyền khách hàng
Route::middleware(['role:KH'])->group(function () {
    //xác nhận đặt hàng và thanh toán
    Route::controller(OrderController::class)->group(function () {
        Route::get('/payment', 'index')->name('user.payment');
        Route::post('/payment', 'completePayment')->name('complete-payment');
        Route::post('/add-voucher', 'addVoucher')->name('user.addvoucher');
    });

    Route::post('/order/buy-now', [CartController::class, 'buyNow'])->name('buynow');

    //Route profile
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/trangcanhan', 'index')->name('profile.index');
        Route::post('/trangcanhan/editInfo', 'editInfo')->name('profile.editInfo');
        Route::post('/trangcanhan/editImage', 'editImage')->name('profile.editImage');
        Route::get('/lichsudonhang', 'order_history')->name('profile.order_history');
        Route::put('/lichsudonhang/cancel/{id}', 'cancel')->name('profile.cancel');
        Route::get('/sanphamyeuthich', 'favourite_product')->name('profile.favourite_product');
        Route::get('/sanphamyeuthich/unLike/{id}', 'unLike')->name('profile.unLike');
        Route::get('/lichsudanhgia', 'review_history')->name('profile.review_history');
        Route::get('/doimatkhau', 'ChangePwd')->name('profile.changepassword');
        Route::post('/kiemtrapassword', 'IsPasswordChange')->name('profile.ispassword');
        Route::post('/submitchange', 'UpdatePassword')->name('profile.submitchange');
    });
});

//Route quan li danh mục
Route::controller(AdminCategoryController::class)->group(
    function () {
        Route::get('/admin/addcategory', [AdminCategoryController::class, 'addCategory'])->name('admin.category.addcategory');
        Route::post('/admin/addcategory/store', [AdminCategoryController::class, 'storeCategory'])->name('admin.category.storecategory');
        Route::get('/admin/editcategory/{id}', [AdminCategoryController::class, 'editCategory'])->name('admin.category.editcategory');
        Route::post('/admin/updatecategory//{id}', [AdminCategoryController::class, 'updateCategory'])->name('admin.category.updatecategory');
        Route::get('/admin/filter-category/{id}', [AdminCategoryController::class, 'filterCategory'])->name('filter.category');
        Route::delete('/admin/deletecategory/{id}', [AdminCategoryController::class, 'deleteCategory'])->name('admin.delete.category');
    }
);

//Route quan li danh mục con
Route::controller(AdminBrandController::class)->group(
    function () {
        Route::get('/admin/category', [AdminBrandController::class, 'getListBrand'])->name('admin.category');
        Route::get('/admin/addbrand', [AdminBrandController::class, 'addBrand'])->name('admin.category.addbrand');
        Route::post('/admin/brandStore', [AdminBrandController::class, 'storeBrand'])->name('admin.category.storebrand');
        Route::get('/admin/editbrand/{id}', [AdminBrandController::class, 'editBrand'])->name('admin.category.editbrand');
        Route::post('/admin/updatebrand/{id}', [AdminBrandController::class, 'updateBrand'])->name('admin.category.updatebrand');
        Route::delete('/admin/deletebrand/{id}', [AdminBrandController::class, 'deleteBrand'])->name('admin.brand.delete');
        Route::get('/admin/searchbrand', [AdminBrandController::class, 'searchBrand'])->name('admin.category.searchbrand');
    }
);
