<header>
    <nav class="container_css navbar navbar-top">
        <div>
            <ul>
                <li><a href="">Giới thiệu</a></li>
                <li><a href="">Liên hệ</a></li>
            </ul>
        </div>
        <div>
            <ul>
                <li><a href=""  onclick="handleLogin(event)"><i class="far fa-user-circle" style="margin-right:5px"></i>Đăng nhập</a></li>
            </ul>
        </div>
    </nav>
    <nav class="container_css navbar navbar-bottom">
        <div class="navbar_item_first">
            <div>
                <a href="" style="font-size: 14px; color: rgb(233, 239, 236);"><img src=""
                        alt="Lỗi hiển thị"></a>
            </div>
            <ul>
                <li><a href="">Trang chủ</a></li>
                <li>Danh mục<i class="fas fa-angle-down" style="margin-left:5px"></i>
                    <ul class="popup popup__category">
                        <li class="thuong__hieu"><a href="">Điện thoại</a><i class="fas fa-angle-right"></i>
                            <ul class="popup popup__thuonghieu">
                               <li><a href="">SamSung</a></li>
                               <li><a href="">Apple</a></li>
                               <li><a href="">Oppo</a></li>
                            </ul>
                        </li>
                        <li class="thuong__hieu"><a href="">LapTop</a><i class="fas fa-angle-right"></i>
                            <ul class="popup popup__thuonghieu">
                                <li><a href="">Asus</a></li>
                                <li><a href="">MSI</a></li>
                                <li><a href="">Lenovo</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="navbar_item_second">
            <input type="checkbox" hidden id="checkbox_hidden" class="checkbox_input_hidden">
            <label for="checkbox_hidden"><span class="menu-icon"><i class="fas fa-bars"></i></span></label>
            <!-- Navbar hidden moblie tablet -->
            <nav class="navbar_hidden_mb_tl">
                <label for="checkbox_hidden"><i class="fas fa-times"></i></label>
                <ul>
                    <li><a href="">Trang chủ</a></li>
                    <li id="show__category">Danh mục<i class="fas fa-angle-down" style="margin-left:20px"></i></li>
                    <li class="popup__category__ml__tl"><a href="">Điện thoại</a></li>
                    <li class="popup__category__ml__tl"><a href="">LapTop</a></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href=""  onclick="handleLogin(event)"><i class="far fa-user-circle" style="margin-right:5px"></i>Đăng nhập</a></li>
                </ul>
            </nav>
            <ul>
                <li>
                    <form action="" method="GET">
                        <input type="search" placeholder="Tìm kiếm...">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                </li>
                <li class="cart__header_desktop"><a href=""><i class="fas fa-shopping-cart"
                            style="margin-right:5px"><span class="number_cart">0</span></i>Giỏ hàng</a></li>
                <li class="cart__header_mb_tl"><a href=""><i class="fas fa-shopping-cart"><span
                                class="number_cart_mb_tl">0</span></i></a></li>
            </ul>
        </div>
    </nav>

</header>