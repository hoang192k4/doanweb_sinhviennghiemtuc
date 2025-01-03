@extends('layouts.layouts_user')
@section('title', 'Trang tìm kiếm')
@section('content')
    <section class="container_css product_searchs">
        <div class="product_search_lists">
            <div class="product_search_list_left">
                <div>
                    <h5><i class="fas fa-filter" style="margin-right: 5px;"></i>Bộ lọc tìm kiếm</h5>
                    <div class="product_search product_search_list_category">
                        <p>Danh mục<i class="fas fa-sort-down"></i></p>
                        <div class="product_search_list_category_popup">
                            <a href="">Laptop</a>
                            <a href="">Điện thoại</a>
                        </div>
                    </div>
                    <div class="product_search product_search_list_branch">
                        <p>Thương hiệu<i class="fas fa-sort-down"></i></p>
                        <div class="product_search_list_branch_popup">
                            <p>Điện thoại</p>
                            <a href="">Samsung</a>
                            <a href="">Apple</a>
                            <a href="">Oppo</a>
                            <p>Laptop</p>
                            <a href="">Asus</a>
                            <a href="">MSI</a>
                            <a href="">Lenovo</a>
                        </div>
                    </div>
                    <div class="product_search product_search_list_price">
                        <p>Mức giá</p>
                        <div class="product_search_list_price_popup">
                            <button class="active_price">Tất cả</button>
                            <button>Dưới 2 triệu</button>
                            <button>Từ 2 đến 4 triệu</button>
                            <button>Từ 4 đến 8 triệu</button>
                            <button>Từ 8 đến 15 triệu</button>
                            <button>Trên 15 triệu</button>
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
                                <a href=""><img src="{{asset('images/'.$item->image)}}" alt="Lỗi hiển thị"></a>
                                <div class="product_search_list_item_info">
                                    <ul>
                                        <li><a href="">{{ $item->name }}</a></li>
                                        <li>{{ number_format($item->price, 0, ',', '.') }}<sup>đ</sup></li>
                                        <li>{{ $item->rating }} <i class="fas fa-star"></i></li>
                                        <li>
                                            <a href=""><button>Mua ngay</button></a>
                                            <div><a href=""><i class="fas fa-cart-plus"></i></a></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    @else
                    <h5>Không có sản phẩm tương tự</h5>
                    @endif
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
