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
                    <div class="product_search_list_right_item">
                        <a href=""><img src="images/iphone-15-promax.jpg" alt="Lỗi hiển thị"></a>
                        <div class="product_search_list_item_info">
                            <ul>
                                <li><a href="">iPhone 15 Pro Max</a></li>
                                <li>16.000.000 <sup>đ</sup></li>
                                <li>4.5 <i class="fas fa-star"></i></li>
                                <li>
                                    <a href=""><button>Mua ngay</button></a>
                                    <div><a href=""><i class="fas fa-cart-plus"></i></a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product_search_list_right_item">
                        <a href=""><img src="images/16pro.jpg" alt="Lỗi hiển thị"></a>
                        <div class="product_search_list_item_info">
                            <ul>
                                <li><a href="">iPhone 16 Pro</a></li>
                                <li>16.000.000 <sup>đ</sup></li>
                                <li>4.5 <i class="fas fa-star"></i></li>
                                <li>
                                    <a href=""><button>Mua ngay</button></a>
                                    <div><a href=""><i class="fas fa-cart-plus"></i></a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product_search_list_right_item">
                        <a href=""><img src="images/oppo-find-x8-black-thumb-600x600.jpg" alt="Lỗi hiển thị"></a>
                        <div class="product_search_list_item_info">
                            <ul>
                                <li><a href="">Điện thoại OPPO Find X8 5G 12GB/512GB</a></li>
                                <li>16.000.000 <sup>đ</sup></li>
                                <li>4.5 <i class="fas fa-star"></i></li>
                                <li>
                                    <a href=""><button>Mua ngay</button></a>
                                    <div><a href=""><i class="fas fa-cart-plus"></i></a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product_search_list_right_item">
                        <a href=""><img src="images/oppo-find-x8-pro-white-thumb-600x600.jpg" alt="Lỗi hiển thị"></a>
                        <div class="product_search_list_item_info">
                            <ul>
                                <li><a href="">OPPO Find X8 Pro5G 16GB/512GB</a></li>
                                <li>16.000.000 <sup>đ</sup></li>
                                <li>4.5 <i class="fas fa-star"></i></li>
                                <li>
                                    <a href=""><button>Mua ngay</button></a>
                                    <div><a href=""><i class="fas fa-cart-plus"></i></a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product_search_list_right_item">
                        <a href=""><img src="images//tufgamming.jpg" alt="Lỗi hiển thị"></a>
                        <div class="product_search_list_item_info">
                            <ul>
                                <li><a href="">Asus Gaming TUF Dash F15 FX517ZC i55 12450H (HN077W)</a></li>
                                <li>16.000.000 <sup>đ</sup></li>
                                <li>4.5 <i class="fas fa-star"></i></li>
                                <li>
                                    <a href=""><button>Mua ngay</button></a>
                                    <div><a href=""><i class="fas fa-cart-plus"></i></a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product_search_list_right_item">
                        <a href=""><img src="images/asus_vivobook.jpg" alt="Lỗi hiển thị"></a>
                        <div class="product_search_list_item_info">
                            <ul>
                                <li><a href="">Asus Vivobook 14X OLED A1403Za i5 12500H (KM065W)</a></li>
                                <li>16.000.000 <sup>đ</sup></li>
                                <li>4.5 <i class="fas fa-star"></i></li>
                                <li>
                                    <a href=""><button>Mua ngay</button></a>
                                    <div><a href=""><i class="fas fa-cart-plus"></i></a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product_search_list_right_item">
                        <a href=""><img src="images//tufgamming.jpg" alt="Lỗi hiển thị"></a>
                        <div class="product_search_list_item_info">
                            <ul>
                                <li><a href="">Asus Gaming TUF Dash F15 FX517ZC i55 12450H (HN077W)</a></li>
                                <li>16.000.000 <sup>đ</sup></li>
                                <li>4.5 <i class="fas fa-star"></i></li>
                                <li>
                                    <a href=""><button>Mua ngay</button></a>
                                    <div><a href=""><i class="fas fa-cart-plus"></i></a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
