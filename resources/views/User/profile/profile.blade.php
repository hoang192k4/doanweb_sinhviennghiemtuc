@extends('layouts.layouts_user')
@section('title', 'Trang cá nhân')
@section('content')
    <div class="container_css" style="padding: 0px 10px;">
        <div class="profile">
            <div class="row_profile">
                @include('user.profile.sidebar')
                <div class="col_profile" style="width: 79%;">
                    <div class="item_profile" style="text-align: center;font-weight: bold;font-size: 20px;">
                        Hồ
                        sơ của bạn</div>
                    <hr style="margin-left: 20px ;">
                    <div class="col_profile_2">
                        <div class="col_profile_second_1" style="width: 70%;">
                            <div class="information_profile">
                                <form class="form_groud" method="" action="">
                                    <div class="form_item">
                                        <label for="username">Tài khoản:</label>
                                        <input type="text" id="username" name="username" value="nguyenthuyanhthu"
                                            style="width:250px;">
                                    </div>
                                    <div class="form_item">
                                        <label for="fullname">Họ và tên:</label>
                                        <input type="text" id="fullname" name="fullname" value="Nguyễn Thùy Anh Thư"
                                            style="width:250px;">
                                    </div>
                                    <div class="form_item">
                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email" style="width:250px;"
                                            value="0306221078@caothang.edu.vn" style="margin-left: 5px;">
                                    </div>
                                    <div class="form_item">
                                        <label for="phone">Số điện thoại:</label>
                                        <input type="tel" id="phone" name="phone" value="0123456789"
                                            style="width:250px;">
                                    </div>
                                    <div class="form_item">
                                        <label style="margin-top: 0px;">Giới tính:</label>
                                        <div>
                                            <input type="radio" name="gender" value="male"> Nam
                                            <input type="radio" name="gender" value="female" checked
                                                style="margin-left: 10px;"> Nữ
                                        </div>
                                    </div>
                                    <div class="form_item">
                                        <label for="birthday">Ngày sinh:</label>
                                        <input type="date" id="birthday" name="birthday" value="2004-03-12"
                                            style="width:250px;">
                                    </div>
                                    <button type="submit" value="saveProfile"class="submit">Lưu</button>
                                </form>
                            </div>
                        </div>
                        <div class="col_profile_second_2" style="width: 29%;">
                            <div class="change_image">
                                <div class="image-container">
                                    <img src="download.jpg" alt="name">
                                </div>
                                <button type="submit" value="saveImage">Đổi ảnh</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
