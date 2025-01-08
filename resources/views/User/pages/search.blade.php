@extends('layouts.layouts_user')
@section('title', 'Trang tìm kiếm')
@section('content')
    @php
        $danhSachDanhMuc = DB::table('categories')->where('status', 1)->select('name', 'slug', 'id')->get();
        $danhSachThuongHieu = DB::table('brands')->where('status', 1)->select('name')->get();
    @endphp
    <section class="container_css product_searchs">
        <div class="product_search_lists">
            <div class="product_search_list_left">
                <div>
                    <h5><i class="fas fa-filter" style="margin-right: 5px;"></i>Bộ lọc tìm kiếm</h5>
                    <div class="product_search product_search_list_category">
                        <p>Danh mục<i class="fas fa-sort-down"></i></p>
                        <div class="product_search_list_category_popup">
                            @foreach ($danhSachDanhMuc as $danhMuc)
                                <a href="{{ route('timkiemsanpham', ['slug' => $danhMuc->slug]) }}">{{ $danhMuc->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="product_search product_search_list_branch">
                        <p>Thương hiệu<i class="fas fa-sort-down"></i></p>
                        <div class="product_search_list_branch_popup">
                            @foreach ($danhSachDanhMuc as $danhMuc)
                                <p>{{ $danhMuc->name }}</p>
                                @foreach (DB::table('brands')->select('brands.name')->join('categories', 'brands.category_id', '=', 'categories.id')->where('categories.id', $danhMuc->id)->get() as $brand)
                                    <a
                                        href="{{ route('timkiemsanpham', ['slug' => $danhMuc->slug, 'id' => $brand->name]) }}">{{ $brand->name }}</a>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    <div class="product_search product_search_list_price">
                        <p>Mức giá</p>
                        <div class="product_search_list_price_popup">
                            <button onclick="SeachProduct()" class="active_price">Tất cả</button>
                            <button onclick="SeachProduct(0,2000000)">Dưới 2 triệu</button>
                            <button onclick="SeachProduct(2000000,4000000)">Từ 2 đến 4 triệu</button>
                            <button onclick="SeachProduct(4000000,8000000)">Từ 4 đến 8 triệu</button>
                            <button onclick="SeachProduct(8000000,15000000)">Từ 8 đến 15 triệu</button>
                            <button onclick="SeachProduct(15000000)">Trên 15 triệu</button>
                            {{-- <div>
                                <p>Hoặc nhập mức giá phù hợp</p>
                                <div class="price_about">
                                    <input type="text" placeholder="2.000.000đ" onblur="handelBlur(this)">~<input
                                        type="text"placeholder="5.000.000đ" onblur="handelBlur(this)">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_search_list_right">
                <div class="product_search_list_right_items">
                    @if (isset($danhSachSanPham) && $danhSachSanPham->isNotEmpty())
                        @foreach ($danhSachSanPham as $item)
                            <div class="product_search_list_right_item">
                                <a href=""><img src="{{ asset('images/' . $item->image) }}" alt="Lỗi hiển thị"></a>
                                <div class="product_search_list_item_info">
                                    <ul>
                                        <li><a href="">{{ $item->name }}</a></li>
                                        <li class = "price">{{ number_format($item->price, 0, ',', '.') }}<sup>đ</sup></li>
                                        <li>{{ $item->rating }} <i class="fas fa-star"></i></li>
                                        <li>
                                            <a href=""><button>Mua ngay</button></a>
                                            <div><a href=""><i class="fas fa-cart-plus"></i></a></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                </div>
                <div class="page" id="page"></div>

                 @else
                <div style="color: black; text-align:center; width:100%; margin-top:10px">
                    <h5>Không có sản phẩm tương tự</h5>
                </div>
                @endif
            </div>
        </div>
        </div>
    </section>
@endsection

