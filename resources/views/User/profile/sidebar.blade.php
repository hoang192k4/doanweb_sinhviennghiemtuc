<div class="col_change_password" style="width:20%;">
        <div class="col_change_password_1">
                <div class="item @yield('active_profile')"><a href="{{route('profile.index')}}"><i class="fas fa-user"></i>Thông tin cá nhân</a></div>
                <div class="item @yield('active_order_history')"><a href="{{route('profile.order_history')}}"><i class="fas fa-box"></i>Lịch sử đơn hàng</a></div>
                <div class="item @yield('active_favourite_product')"><a href="{{route('profile.favourite_product')}}"><i class="fas fa-gift"></i>Sản phẩm yêu thích</a></div>
                <div class="item @yield('active_review_history')"><a href="{{route('profile.review_history')}}"><i class="fas fa-gifts"></i>Sản phẩm đã đánh giá</a></div>
                <div class="item @yield('active_changepassword')"><a href="{{route('profile.changepassword')}}"><i class="fas fa-unlock-alt"></i>Đổi mật khẩu</a></div>
        </div>
</div>