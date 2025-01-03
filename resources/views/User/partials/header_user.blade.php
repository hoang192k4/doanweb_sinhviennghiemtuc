<header>
    @php
        $danhSachDanhMuc = DB::table('categories')->select('categories.name','categories.slug','categories.id')->get();
        $lienKetWebsite = DB::table('about')->select('about.logo')->first();
    @endphp
    <nav class="container_css navbar navbar-top">
        <div>
            <ul>
                <li><a href="{{route('user.blog')}}">Giới thiệu</a></li>
                <li><a href="{{route('user.contact')}}">Liên hệ</a></li>
            </ul>
        </div>
        <div>
            <ul>
                <li><a href="" onclick="handleLogin(event)"><i class="far fa-user-circle"
                            style="margin-right:5px"></i>Đăng nhập</a></li>
            </ul>
        </div>
    </nav>
    <nav class="container_css navbar navbar-bottom">
        <div class="navbar_item_first">
            <div>
                <a href="{{route('user.index')}}" style="font-size: 14px; color: rgb(233, 239, 236);"><img src="{{$lienKetWebsite->logo}}"
                        alt="Lỗi hiển thị"></a>
            </div>
            <ul>
                <li><a href="{{route('user.index')}}">Trang chủ</a></li>
                <li>Danh mục<i class="fas fa-angle-down" style="margin-left:5px"></i>
                    <ul class="popup popup__category">
                        @foreach( $danhSachDanhMuc as $category)
                        <li class="thuong__hieu"><a href="{{ route('timkiemsanpham', ['slug' => $category->slug])}}">{{ $category->name }}</a> <i
                            class="fas fa-angle-right"></i>
                            <ul class="popup popup__thuonghieu">
                                @foreach (DB::table('brands')->select('brands.name')
                                ->join('categories','brands.category_id','=','categories.id')
                                ->where('categories.id',$category->id)->get() as $brand)
                                <li><a href="{{ route('timkiemsanpham', ['slug' => $category->slug ,'id' => $brand->name ])}}">{{ $brand->name }}</a></li>
                            @endforeach
                            </ul>
                        </li>
                        @endforeach
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
                    @foreach( $danhSachDanhMuc as $category)
                    <li class="popup__category__ml__tl"><a href="{{ route('timkiemsanpham', ['slug' => $category->slug])}}">{{ $category->name }}</a></li>
                    @endforeach
                    <li><a href="{{ route('user.blog') }}">Giới Thiệu</a></li>
                    <li><a href="{{ route('user.contact') }}">Liên Hệ</a></li>
                    <li><a href="" onclick="handleLogin(event)"><i class="far fa-user-circle"
                                style="margin-right:5px"></i>Đăng nhập</a></li>
                    
                </ul>
            </nav>
            <ul>
                <li>
                    <form action="" method="GET">
                        <input type="search" placeholder="Tìm kiếm...">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                </li>
                <li class="cart__header_desktop"><a href="{{ route('user.shoppingcart') }}"><i class="fas fa-shopping-cart"
                            style="margin-right:5px"><span class="number_cart">0</span></i>Giỏ hàng</a></li>
                <li class="cart__header_mb_tl"><a href="{{ route('user.shoppingcart') }}"><i class="fas fa-shopping-cart"><span
                                class="number_cart_mb_tl">0</span></i></a></li>
            </ul>
        </div>
    </nav>

</header>
