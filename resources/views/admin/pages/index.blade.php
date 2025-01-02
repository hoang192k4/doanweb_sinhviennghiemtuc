@extends('layouts.layouts_admin')
@section('title', 'Trang Dashboard')
@section('content')
<div class="content" id="dashboard">
    <div class="head">
        <div class="title">Trang Dashboard</div>
    </div>
    <div class="separator_x"></div>
    <div class="static">
        <div class="count">
            <div class="see">
                <div class="icon">
                    <img src="/images/icondanhmuc.png" alt="icon">
                </div>
                <div class="number">
                    <p class="num">{{count(App\Models\Category::all())}}</p>
                    <p>Danh mục</p>
                </div>
            </div>
            <div class="go">
                <a href="">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="count">
            <div class="see">
                <div class="icon">
                    <img src="/images/iconsanpham.png" alt="icon">
                </div>
                <div class="number">
                    <p class="num">{{count(App\Models\Product::all())}}</p>
                    <p>Sản phẩm</p>
                </div>
            </div>
            <div class="go">
                <a href="">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="count">
            <div class="see">
                <div class="icon">
                    <img src="/images/icondonhang.png" alt="icon">
                </div>
                <div class="number">
                    <p class="num">{{count(App\Models\Order::all())}}</p>
                    <p>Đơn hàng</p>
                </div>
            </div>
            <div class="go">
                <a href="">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="static">
        <div class="count">
            <div class="see">
                <div class="icon">
                    <img src="/images/iconthuonghieu.png" alt="icon">
                </div>
                <div class="number">
                    <p class="num">{{count(App\Models\Brand::all())}}</p>
                    <p>Thương hiệu</p>
                </div>
            </div>
            <div class="go">
                <a href="">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="count">
            <div class="see">
                <div class="icon">
                    <img src="/images/icondanhgia.png" alt="icon">
                </div>
                <div class="number">
                    <p class="num">{{count(App\Models\Rating::all())}}</p>
                    <p>Đánh giá</p>
                </div>
            </div>
            <div class="go">
                <a href="">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="count">
            <div class="see">
                <div class="icon">
                    <img src="/images/iconlienhe.png" alt="icon">
                </div>
                <div class="number">
                    <p class="num">{{count(App\Models\Contact::all())}}</p>
                    <p>Liên hệ</p>
                </div>
            </div>
            <div class="go">
                <a href="">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="separator_x"></div>
    <div class="area">
        <div class="infor">
            <form>
                <div>
                    <p>Địa chỉ : </p><input>
                </div>
                <div>
                    <p>Số điện thoại : </p><input>
                </div>
                <div>
                    <p>Email : </p><input>
                </div>
                <button type="submit">Lưu thông tin</button>
            </form>
        </div>
        <div class="separator"></div>
        <div class="avatar">
            <div>
                <img src="" alt="Logo">
            </div>
            <form>
                <input type="file">
                <button type="submit">Đổi logo</button>
            </form>
        </div>
    </div>
</div>
@endsection
