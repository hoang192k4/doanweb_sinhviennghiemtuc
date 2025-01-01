<div class="login_user">
    <div class="overflow_hidden_login"></div>
    <div class="login login_register">
        <h2>ĐĂNG NHẬP</h2>
        <form action="" >
            <div class="form_ground">
                <input type="email" name="email_login" id="email_login" placeholder="Nhập email của bạn..">
                <span><i class="fas fa-envelope"></i></span>
            </div>
            <div class="form_ground">
                <input type="password" name="password_login" id="password_login" placeholder="Nhập password của bạn...">
                <span id="hide_pwd"><i class="fas fa-eye-slash"></i></span>
                <span id="lock_pwd"><i class="fas fa-lock"></i></span>
            </div>
            <div class="action">
                <button type="button" onclick="handleRegister()">Đăng ký</button>
                <button type="submit">Đăng nhập</button>
            </div>
        </form>
    </div>
    <div class="register login_register">
        <h2>ĐĂNG KÝ</h2>
        <form action="" >
            <div class="form_ground">
                <input type="text" name="name" id="name_register" placeholder="Nhập tên của bạn..">
                <span><i class="fas fa-user"></i></span>
            </div>
            <div class="form_ground">
                <input type="text" name="phone" id="phone_register" placeholder="Nhập số điện thoại của bạn..">
                <span><i class="fas fa-phone"></i></span>
            </div>
            <div class="form_ground">
                <input type="email" name="email_register" id="email_register" placeholder="Nhập email của bạn..">
                <span><i class="fas fa-envelope"></i></span>
            </div>
            <div class="form_ground">
                <input type="password" name="password_register" id="password_register" placeholder="Nhập password của bạn...">
                <span id="hide_pwd_register"><i class="fas fa-eye-slash"></i></span>
                <span id="lock_pwd_register"><i class="fas fa-lock"></i></span>
            </div>
            <div class="form_ground">
                <input type="password" name="pwd_comfirm" id="pwd_comfirm" placeholder="Xác nhận password của bạn...">
                <span id="hide_pwd_cf_register"><i class="fas fa-eye-slash"></i></span>
                <span id="lock_pwd_cf_register"><i class="fas fa-lock"></i></span>
            </div>
            <div class="action">
                <button type="button" onclick="handleTargetLogin()">Đăng nhập</button>
                <button type="submit">Đăng ký</button>
            </div>
        </form>
    </div>
</div>