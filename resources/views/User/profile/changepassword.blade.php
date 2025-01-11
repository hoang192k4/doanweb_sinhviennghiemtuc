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
                            <p class="form_notice" style="font-weight: 900;margin-bottom:12px;">
                                Nhập mật khẩu hiện tại
                            </p>
                            <div class="field"><input id="oldpassword" name="oldpassword" type="password"
                                    placeholder="Nhập mật khẩu hiện tại" required="required" class="group_item"
                                    onkeyup="hidden_icon_changepwd(this)" onblur="handleIsPwd()">

                                <span class="hide_pwd_change" onclick="handleType(this)"><i
                                        class="fas fa-eye-slash"></i></span>
                            </div>
                            <div class="alert_error_validate" style="margin-left:8px" id="oldpassword_error"></div>
                        </div>
                        <div class="change_password_form">
                            <p class="form_notice" style="font-weight: 900;margin-bottom: 12px;">
                                Nhập mật khẩu mới
                            </p>
                            <div class="field"><input id="newPassword" name="newPassword" type="password"
                                    placeholder="Nhập mật khẩu mới" required="required" class="group_item"
                                    onkeyup="hidden_icon_changepwd(this)">
                                <span class="hide_pwd_change" onclick="handleType(this)"><i
                                        class="fas fa-eye-slash"></i></span>
                            </div>
                            <div class="alert_error_validate" style="margin-left:8px" id="newPassword_error"></div>
                            <div class="field" style="margin:12px 0">
                                <input id="confirmNewPassword" name="confirmNewPassword" type="password"
                                    placeholder="Xác nhận mật khẩu mới" required="required" class="group_item"
                                    onkeyup="hidden_icon_changepwd(this)">
                                <span class="hide_pwd_change" onclick="handleType(this)"><i
                                        class="fas fa-eye-slash"></i></span>
                            </div>
                            <div class="alert_error_validate" style="margin-left:8px" id="confirmNewPassword_error"></div>
                        </div>
                        <button class="saveChangePassword" onclick="submitChange()">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        //change password
        function hidden_icon_changepwd(element) {
            const parent = element.parentElement;
            const icon = parent.querySelector('.hide_pwd_change');
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

        function handleIsPwd() {
            $('#oldpassword_error').text('')
            if ($('#oldpassword').val().trim() !== '') {
                $.ajax({
                    'url': "{{ route('profile.ispassword') }}",
                    'type': "POST",
                    'data': {
                        _token: "{{ csrf_token() }}",
                        oldpassword: $('#oldpassword').val()
                    },
                    error: function(xhr) {
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            $('#oldpassword_error').text(xhr.responseJSON.error);
                        }
                    }
                }, )
            }
        }

        function submitChange() {
            $('#newPassword_error').text('');
            $('#confirmNewPassword_error').text('');
            if ($('#newPassword').val() !== $('#confirmNewPassword').val()) {
                $('#confirmNewPassword_error').text('Mật khẩu không trùng khớp');
                return;
            }
            $.ajax({
                'url': "{{ route('profile.submitchange')}}",
                'type':"POST",
                'data':{
                    _token: "{{ csrf_token() }}",
                    oldpassword: $('#oldpassword').val(),
                    newPassword:$('#newPassword').val(),
                },
                success:function(res){
                    $('#oldpassword').val(''),
                    $('#newPassword').val(''),
                    $('#confirmNewPassword').val('') ;
                    const element= document.querySelectorAll('.hide_pwd_change');
                    element.forEach(element => {
                        element.style.display = "none";
                    });
                     alertify.success(res.success);
                },
                error: function(xhr){
                    const error = xhr.responseJSON.errors;
                    if(error.oldpassword)
                    $('#oldpassword_error').text(error.oldpassword);
                    if(error.newPassword)
                    $('#newPassword_error').text(error.newPassword);
                }
            })
        }
    </script>
@endsection
