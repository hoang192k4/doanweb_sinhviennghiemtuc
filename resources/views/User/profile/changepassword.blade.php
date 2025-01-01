@extends('layouts.layouts_user')
@section('title', 'Đổi mật khẩu')
@section('content')
    <div class="container_css" style="padding: 0px 10px;">
        <div class="change_password">
            <div class="row_change_password">
              {{-- sidebar --}}
              @include('user.profile.sidebar')
              {{-- sidebar --}}
                <div class="col_change_password" style="width: 75%;">
                    <div class="col_change_password_2">
                        <div class="top_nav" style="font-size: 25px; margin-bottom: 50px;font-weight: 900;">Tạo mật
                            khẩu mới</div>
                        <div class="change_password_form">
                            <p class="form_notice" style="font-weight: 900;margin-bottom: 20px;">
                                Nhập mật khẩu hiện tại
                            </p>
                            <div class="field"><input id="password" name="password" type="password"
                                    placeholder="Nhập mật khẩu hiện tại" required="required" class="group_item">
                            </div>
                        </div>
                        <div class="change_password_form">
                            <p class="form_notice" style="font-weight: 900;margin-bottom: 15px;">
                                Tạo mật khẩu mới
                            </p>
                            <div class="field"><input id="newPassword" name="newPassword" type="password"
                                    placeholder="Nhập mật khẩu mới" required="required" class="group_item">
                                <p class="item_description"
                                    style="opacity: 0.5;margin-left: 10px;font-size: 13px;font-style: italic;margin-bottom: 15px;">
                                    Mật khẩu tối
                                    thiểu 6 ký tự, có ít
                                    nhất 1 chữ và 1 số.
                                </p>
                            </div>
                            <div class="field"><input id="confirmNewPassword" name="confirmNewPassword" type="password"
                                    placeholder="Nhập lại mật khẩu mới" required="required" class="group_item">
                            </div>
                        </div>
                        <button class="saveChangePassword">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
