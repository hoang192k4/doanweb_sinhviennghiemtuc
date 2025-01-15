@extends('layouts.layouts_admin')
@section('title', 'Trang Dashboard')
@section('content')
    <div class="content" id="dashboard">
        <div class="head">
            <div class="title">Đổi mật khẩu</div>
            <button><a href="{{ route('admin.profile') }}">&laquo; Trở lại</a></button>
        </div>
        <div class="separator_x"></div>
        <div class="area">
            <div class="infor" style="width: 100%;">
                <form action="" method="POST">
                    @csrf
                    <div>
                        <p>Mật khẩu cũ : </p><input type="text" name="ol_pwd_admin" id="ol_pwd_admin"
                            style="width: 75%; margin-top:0" onkeyup="handleIsPwdAdmin()"
                            placeholder="Nhập mật khẩu hiện tại...">
                    </div>
                    <div class="alert_error_validate" id="ol_pwd_admin_error"></div>
                    <div class="changepwd_admin">
                        <p>Mật khẩu mới : </p><input type="password" name="new_pwd_admin" style="width: 75%;"
                          id="new_pwd_admin"  onkeyup="hidden_icon_changepwd_admin(this)" placeholder="Nhập mật khẩu mới...">
                        <span class="hide_pwd_change_admin" onclick="handleType(this)"><i
                                class="fas fa-eye-slash"></i></span>
                    </div>
                    <div class="alert_error_validate" id="new_pwd_admin_error"></div>
                    <div class="changepwd_admin">
                        <p>Nhập lại mật khẩu mới : </p><input type="password" name="cf_pwd_admin" style="width: 75%;"
                          id="cf_pwd_admin"  onkeyup="hidden_icon_changepwd_admin(this)" placeholder="Xác nhận mật khẩu">
                        <span class="hide_pwd_change_admin" onclick="handleType(this)"><i
                                class="fas fa-eye-slash"></i></span>
                    </div>
                    <div class="alert_error_validate" id="cf_pwd_admin_error"></div>
                    <button type="button" onclick="submitChangeAdmin()">Đổi mật khẩu</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        //change password
        function hidden_icon_changepwd_admin(element) {
            const parent = element.parentElement;
            const icon = parent.querySelector('.hide_pwd_change_admin');
            if (element.value.trim() !== '')
                icon.style.display = "block";
            else
                icon.style.display = "none";
        }

        function handleType(element) {
            const parent = element.parentElement;
            const input = parent.querySelector('input');
            const i = element.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                i.classList.remove('fa-eye-slash');
                i.classList.add('fa-eye');
            } else {
                input.type = 'password';
                i.classList.remove('fa-eye');
                i.classList.add('fa-eye-slash');
            }
        }

        function handleIsPwdAdmin() {
            $('#ol_pwd_admin_error').text('')
            if ($('#ol_pwd_admin').val().trim() !== '') {
                $.ajax({
                    'url': "{{ route('profile.checkpw') }}",
                    'type': "POST",
                    'data': {
                        _token: "{{ csrf_token() }}",
                        oldpassword: $('#ol_pwd_admin').val()
                    },
                    success: function(response) {
                        if (response) {
                            $('#ol_pwd_admin_error').text(response.success);
                            $('#ol_pwd_admin_error').css('color', 'green');
                        }
                    },
                    error: function(xhr) {
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            $('#ol_pwd_admin_error').css('color', 'red');
                            $('#ol_pwd_admin_error').text(xhr.responseJSON.error);
                        }
                    }
                }, )
            }
        }

        function submitChangeAdmin() {
            $('#new_pwd_admin_error').text('');
            $('#cf_pwd_admin_error').text('');
            if ($('#new_pwd_admin').val() !== $('#cf_pwd_admin').val()) {
                $('#cf_pwd_admin_error').text('Mật khẩu không trùng khớp');
                return;
            }
            $('#cf_pwd_admin_error').text('');
            if ($('#ol_pwd_admin_error').text() === 'Mật khẩu hiện tại không đúng') {
                alertify.error('Sai mật khẩu Vui lòng nhập lại mật khẩu của bạn!');
                return;
            }
            $.ajax({
                'url': "{{ route('profile.changepw') }}",
                'type': "POST",
                'data': {
                    _token: "{{ csrf_token() }}",
                    oldpassword: $('#ol_pwd_admin').val(),
                    newPassword: $('#new_pwd_admin').val(),
                },
                success: function(res) {
                    $('#ol_pwd_admin').val('');
                    $('#new_pwd_admin').val('');
                    $('#cf_pwd_admin').val('');
                    $('#ol_pwd_admin_error').text('');
                    const element = document.querySelectorAll('.hide_pwd_change');
                    element.forEach(element => {
                        element.style.display = "none";
                    });
                    alertify.success(res.success);
                },
                error: function(xhr) {
                    const error = xhr.responseJSON.errors;
                    if (error.oldpassword) {
                        $('#ol_pwd_admin_error').text(error.oldpassword);
                        $('#ol_pwd_admin_error').css('color', 'red');
                    };
                    if (error.newPassword)
                        $('#new_pwd_admin_error').text(error.newPassword);
                }
            })
        }
    </script>
@stop
