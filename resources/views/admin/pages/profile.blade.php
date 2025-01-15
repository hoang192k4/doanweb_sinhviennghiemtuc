@extends('layouts.layouts_admin')
@section('title', 'Trang Dashboard')
@section('content')
<div class="content" id="dashboard">
    <div class="head">
        <div class="title">Thông Tin Cá Nhân</div>
        <button><a href="{{route('admin.changepw')}}"><i class="fa-solid fa-lock"></i> Đổi mật khẩu</a></button>
    </div>
    <div class="separator_x"></div>
    <div class="area">
        <div class="infor">
            <form action="{{ route('admin.editProfile') }}" method="POST">
                @csrf
                <div>
                    <p>Tài khoản : </p><input name="username" value="{{$user->username}}">
                </div>
                <div>
                    <p>Họ và tên : </p><input name="fullname" value="{{$user->full_name}}">
                </div>
                <div>
                    <p>Email : </p><input name="email" value="{{$user->email}}">
                </div>
                <div>
                    <p>Số điện thoại : </p><input name="phone" value="{{$user->phone}}">
                </div>
                <div style="justify-content: start;">
                    <p>Giới tính :
                        <input type="radio" name="gender" value="male" {{($user->gender == 'Nam') ? 'checked' : ''}}
                            style="width: 15px; margin-left: 55px;"> Nam
                        <input type="radio" name="gender" value="female" {{($user->gender == 'Nữ') ? 'checked' : ''}}
                            style="width: 15px; margin-left: 55px;"> Nữ
                    </p>

                </div>
                <div>
                    <p>Ngày sinh : </p><input type="date" name="birthday" value="{{$user->date_of_birth}}">
                </div>
                <button type="submit">Lưu thông tin</button>
            </form>
        </div>
        <div class="separator"></div>
        <div class="avatar">
            <div>
                <img id="imagePreview" src="{{ asset('images/' . $user->image) }}" alt="Image">
            </div>
            <form action="{{ route('admin.editAvatar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input id="imageInput" type="file" name="image">
                <button type="submit">Đổi ảnh đại diện</button>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('imageInput').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('imagePreview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection