@extends('layouts.layouts_admin')
@section('title', 'Trang Dashboard')
@section('content')
<div class="content" id="dashboard">
    <div class="head">
        <div class="title">Đổi mật khẩu</div>
        <button><a href="{{route('admin.profile')}}">&laquo; Trở lại</a></button>
    </div>
    <div class="separator_x"></div>
    <div class="area">
        <div class="infor" style="width: 100%;">
            <form action="{{ route('admin.editProfile') }}" method="POST">
                @csrf
                <div>
                    <p>Mật khẩu cũ : </p><input type="password" name="username" style="width: 78%;">
                </div>
                <div>
                    <p>Mật khẩu mới : </p><input type="password" name="fullname" style="width: 78%;">
                </div>
                <div>
                    <p>Nhập lại mật khẩu mới : </p><input type="password" name="email" style="width: 78%;">
                </div>
                <button type="submit">Đổi mật khẩu</button>
            </form>
        </div>
    </div>
</div>
@endsection