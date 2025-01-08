@extends('layouts.layouts_user')
@section('title', 'Trang cá nhân')
@section('content')
<div class="container_css" style="padding: 0px 10px;">
    <div class="profile">
        <div class="row_profile">
            @include('user.profile.sidebar')
            <div class="col_profile" style="width: 79%;">
                <div class="item_profile" style="text-align: center;font-weight: bold;font-size: 20px;">
                    Hồ sơ của bạn</div>
                <hr style="margin-left: 20px ;">
                <div class="col_profile_2">
                    <div class="col_profile_second_1" style="width: 70%;">
                        <div class="information_profile">
                            <form class="form_groud" method="POST" action="{{ route('profile.editInfo') }}">
                                @csrf
                                <div class="form_item">
                                    <label for="username">Tài khoản:</label>
                                    <input type="text" id="username" name="username" value="{{$user->username}}"
                                        style="width:250px;">
                                </div>
                                <div class="form_item">
                                    <label for="fullname">Họ và tên:</label>
                                    <input type="text" id="fullname" name="fullname" value="{{$user->full_name}}"
                                        style="width:250px;">
                                </div>
                                <div class="form_item">
                                    <label for="email">Email:</label>
                                    <input type="email" id="email" name="email" style="width:250px;"
                                        value="{{$user->email}}" style="margin-left: 5px;">
                                </div>
                                <div class="form_item">
                                    <label for="phone">Số điện thoại:</label>
                                    <input type="tel" id="phone" name="phone" value="{{$user->phone}}"
                                        style="width:250px;">
                                </div>
                                <div class="form_item">
                                    <label style="margin-top: 0px;">Giới tính:</label>
                                    <div>
                                        <input type="radio" name="gender" value="male" {{($user->gender == 'Nam') ? 'checked' : ''}}> Nam
                                        <input type="radio" name="gender" value="female" {{($user->gender == 'Nữ') ? 'checked' : ''}} style="margin-left: 10px;"> Nữ
                                    </div>
                                </div>
                                <div class="form_item">
                                    <label for="birthday">Ngày sinh:</label>
                                    <input type="date" id="birthday" name="birthday" value="{{$user->date_of_birth}}"
                                        style="width:250px;">
                                </div>
                                <button type="submit" class="submit">Lưu</button>
                            </form>
                        </div>
                    </div>
                    <div class="col_profile_second_2" style="width: 29%;">
                        <div class="change_image">
                            <div class="image-container">
                                <img id="imagePreview" style="width: 100%; margin-bottom: 5px;" src="{{ asset('images/' . $user->image) }}" alt="image">
                                <form action="{{ route('profile.editImage') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input id="imageInput" type="file" name="image">
                                    <button type="submit">Đổi ảnh</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
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