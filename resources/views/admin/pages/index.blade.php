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
                    <img src="" alt="icon">
                </div>
                <div class="number">
                    <p class="num">2</p>
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
                    <img src="" alt="icon">
                </div>
                <div class="number">
                    <p class="num">20</p>
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
                    <img src="" alt="icon">
                </div>
                <div class="number">
                    <p class="num">20</p>
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
                    <img src="" alt="icon">
                </div>
                <div class="number">
                    <p class="num">2</p>
                    <p>Thống kê</p>
                </div>
            </div>
            <div class="go">
                <a href="">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="count">
            <div class="see">
                <div class="icon">
                    <img src="" alt="icon">
                </div>
                <div class="number">
                    <p class="num">20</p>
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
                    <img src="" alt="icon">
                </div>
                <div class="number">
                    <p class="num">20</p>
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
