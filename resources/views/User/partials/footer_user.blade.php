<footer>
    @php
         $lienKetWebsite = DB::table('about')->first();
         $danhSachDanhMuc = DB::table('categories')->select('categories.name','categories.slug')->get();
         $danhSachPhanLoai = DB::table('brands')->select('brands.name')->distinct()->groupBy('brands.name')->take(6)->get();
    @endphp
    <div class="footer_top container_css">
        <div class="footer_top_left_items">
            <div class="footer_top_item">
                <p style="text-align: center;padding:0 0 10px 0;font-size: 20px; font-weight: bold;">Thanh Toán</p>
                <div style=" display: flex; justify-content: space-around;">
                    <img style="width: 80px; background-color: rgb(233, 239, 236); padding: 5px;"
                        src="{{asset('/images/d4bbea4570b93bfd5fc652ca82a262a8.png')}}" alt="Lỗi hiển thị">
                    <img style="width: 85px; background-color: rgb(233, 239, 236); padding: 2px;" src="{{asset('/images/cod.png')}}"
                        alt="Lỗi hiển thị">
                </div>
                <p style="text-align: center; padding:10px 0;font-size: 20px; font-weight: bold;">Đơn vị vận chuyển
                </p>
                <div class="footer_bottom_logastic"
                    style="display: flex; justify-content: space-around;flex-wrap: wrap;">
                    <div>
                        <img style="width: 90px;" src="{{asset('images/spx.png')}}" alt="Lỗi hiển thị">
                        <img style="width: 90px;" src="{{asset('/images/jt.png')}}" alt="Lỗi hiển thị">
                    </div>
                    <div class="footer_bottom_logastic_item" style="margin-top: 5px;">
                        <img style="width: 90px;" src="{{asset('/images/be.png')}}" alt="Lỗi hiển thị">
                        <img style="width: 90px;" src="{{asset('/images/alo.png')}}" alt="Lỗi hiển thị">
                    </div>
                </div>
            </div>
            <div class="footer_top_item">
                <p style="text-align: center;font-size: 20px; font-weight: bold;">Kết nối với chúng tôi</p>
                <ul>
                    <li><a href="{{$lienKetWebsite->facebook}}"><i class="fab fa-facebook"></i>Facebook</a>
                    </li>
                    <li><a href="{{$lienKetWebsite->youtube}}"><i class="fab fa-youtube"></i>Youtube</a></li>
                </ul>
            </div>
            <div class="footer_top_item">
                <p style="text-align: center;font-size: 20px; font-weight: bold;">Danh mục sản phẩm</p>
                <ul>
                    @foreach ($danhSachDanhMuc as $item)
                        <li><a href="{{ route('timkiemsanpham', ['slug' => $item->slug])}}"><i
                                    class="fas fa-{{ $item->name == 'Điện Thoại' ? 'mobile' : strtolower($item->name) }}"></i>{{ $item->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="footer_top_item">
                <p style="text-align: center;font-size: 19px; font-weight: bold;">Thương hiệu bán chạy</p>
                <ul>
                    @foreach ($danhSachPhanLoai as $item)
                        <li><a href="{{ route('timkiemsanpham', ['slug' => $item->name])}}"><i class="fas fa-angle-right"></i>{{ $item->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="footer_top_right">
            <div class="footer_top_logo">
                <a href=""><img src="{{asset('images/'.$lienKetWebsite->logo)}}" style="max-width: 100px;" alt="Lỗi hiển thị"></a>
            </div>
            <div class="footer_top_slogan">
                <a href="">Slogan</a>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <p>Địa chỉ: {{ $lienKetWebsite->address }} - Số điện thoại: {{ $lienKetWebsite->phone }} -
            Email : {{ $lienKetWebsite->email }}</p>
        <p>Chịu trách nhiệm nội dung bởi Nguyễn Thùy Anh Thư, Nguyễn Ngọc Hoàng, Nguyễn Quốc Đô, Đặng Khánh Đông,
            Nguyễn Trường Giang, Phan Thành Long</p>
        <p>©2024 - Bản quyền thuộc về {{ $lienKetWebsite->name }}</p>
    </div>
</footer>
