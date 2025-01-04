@extends('layouts.layouts_user')
@section('title', 'Trang chủ')
@section('content')
    <!-- slideshow -->
    <section class="container_css main_slideshow">
        <div class="main_slideshow_left">
            <div id="carouselExampleControls" class="carousel carousel-success slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href=""><img src="images/banner1.png" class="d-block w-100" style="height: 305px"
                                alt="Lỗi hiển thị"></a>
                    </div>
                    <div class="carousel-item">
                        <a href=""><img src="images/banner2.png" class="d-block w-100" style="height: 305px;"
                                alt="Lỗi hiển thị"></a>
                    </div>
                    <div class="carousel-item">
                        <a href=""><img src="images/banner3.png" class="d-block w-100" style="height: 305px;"
                                alt="Lỗi hiển thị"></a>
                    </div>
                    <div class="carousel-item">
                        <a href=""><img src="images/banner4.png" class="d-block w-100" style="height: 305px;"
                                alt="Lỗi hiển thị"></a>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="main_slideshow_right">
            <div class="main_slideshow_right_items">
                <div class="main_slideshow_right_item">
                    <div class="main_slideshow_right_item_img">
                        <a href=""><img src="images/slider_right1.png" alt="Lỗi hiển thị"></a>
                    </div>
                    <div class="main_slideshow_right_item_img">
                        <a href=""><img src="images/slide_right_2.png" alt="Lỗi hiển thị"></a>
                    </div>
                    <div class="main_slideshow_right_item_img">
                        <a href=""><img src="images/slider_right3.png" alt="Lỗi hiển thị"></a>
                    </div>
                    <div class="main_slideshow_right_item_img">
                        <a href=""><img src="images/slider_right4.png" alt="Lỗi hiển thị"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Thương hiệu -->
    <section class="container_css main_branch ">
        <h4>THƯƠNG HIỆU NỔI BẬT</h4>
        <div class="list_branch">
            <a href=""><img
                    src="https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/tmp/catalog/product/f/r/frame_59.png"
                    alt="Lỗi hiển thị"></a>
            <a href=""><img
                    src="https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/tmp/catalog/product/f/r/frame_60.png"
                    alt="Lỗi hiển thị"></a>
            <a href=""><img
                    src="https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/tmp/catalog/product/f/r/frame_61.png"
                    alt="Lỗi hiển thị"></a>
            <a href=""><img
                    src="https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/tmp/catalog/product/f/r/frame_62.png"
                    alt="Lỗi hiển thị"></a>
            <a href=""><img
                    src="https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/tmp/catalog/product/f/r/frame_63.png"
                    alt="Lỗi hiển thị"></a>
            <a href=""><img
                    src="https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/wysiwyg/Icon/brand_logo/macbook.png"
                    alt="Lỗi hiển thị"></a>
            <a href=""><img
                    src="https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/wysiwyg/Icon/brand_logo/Lenovo.png"
                    alt="Lỗi hiển thị"></a>
            <a href=""><img
                    src="https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/wysiwyg/Icon/brand_logo/MSI.png"
                    alt="Lỗi hiển thị"></a>
            <a href=""><img
                    src="https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/tmp/catalog/product/f/r/frame_67.png"
                    alt="Lỗi hiển thị"></a>
            <a href=""><img
                    src="https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/wysiwyg/Icon/brand_logo/Dell.png"
                    alt="Lỗi hiển thị"></a>
        </div>
    </section>

    <!-- Điện thoại bán chạy -->
    <section class="container_css product_best_seller">
        <h4>ĐIỆN THOẠI NỔI BẬT NHẤT</h4>
        <div id="carouselExampleInterval" class="carousel slide carousel-dark" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <div class="product_best_seller_items">
                        <div class="product_best_seller_item">
                            <a href=""><img src="images/iphone-15-promax.jpg" alt="Lỗi hiển thị"></a>
                            <div class="product_best_seller_item_info">
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
                        <div class="product_best_seller_item">
                            <a href=""><img src="images/16pro.jpg" alt="Lỗi hiển thị"></a>
                            <div class="product_best_seller_item_info">
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
                        <div class="product_best_seller_item">
                            <a href=""><img src="images/samsung_galaxy_s23_blue.png" alt="Lỗi hiển thị"></a>
                            <div class="product_best_seller_item_info">
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
                        <div class="product_best_seller_item">
                            <a href=""><img src="images/samsung_galaxy_s23_black.png" alt="Lỗi hiển thị"></a>
                            <div class="product_best_seller_item_info">
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
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <div class="product_best_seller_items">
                        <div class="product_best_seller_item">
                            <a href=""><img src="images/iphone-15-promax.jpg" alt="Lỗi hiển thị"></a>
                            <div class="product_best_seller_item_info">
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
                        <div class="product_best_seller_item">
                            <a href=""><img src="images/16pro.jpg" alt="Lỗi hiển thị"></a>
                            <div class="product_best_seller_item_info">
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
                        <div class="product_best_seller_item">
                            <a href=""><img src="images/oppo-find-x8-black-thumb-600x600.jpg"
                                    alt="Lỗi hiển thị"></a>
                            <div class="product_best_seller_item_info">
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
                        <div class="product_best_seller_item">
                            <a href=""><img src="images/oppo-find-x8-pro-white-thumb-600x600.jpg"
                                    alt="Lỗi hiển thị"></a>
                            <div class="product_best_seller_item_info">
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
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>


    <!-- Laptop mới nhất -->
    <section class="container_css product_lt_new">
        <h4>LAPTOP MỚI NHẤT</h4>
        <div id="carouselExampleControlsNoTouching" class="carousel slide carousel-dark" data-bs-touch="false"
            data-bs-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="product_lt_new_items">
                        <div class="product_lt_new_item">
                            <a href=""><img src="images/tufgamming.jpg" alt="Lỗi hiển thị"></a>
                            <div class="product_lt_new_item_info">
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
                        <div class="product_lt_new_item">
                            <a href=""><img src="images/asus_vivobook.jpg" alt="Lỗi hiển thị"></a>
                            <div class="product_lt_new_item_info">
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
                        <div class="product_lt_new_item">
                            <a href=""><img src="images//tufgamming.jpg" alt="Lỗi hiển thị"></a>
                            <div class="product_lt_new_item_info">
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
                        <div class="product_lt_new_item">
                            <a href=""><img src="images/asus_vivobook.jpg" alt="Lỗi hiển thị"></a>
                            <div class="product_lt_new_item_info">
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
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="product_lt_new_items">
                        <div class="product_lt_new_item">
                            <a href=""><img src="images//tufgamming.jpg" alt="Lỗi hiển thị"></a>
                            <div class="product_lt_new_item_info">
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
                        <div class="product_lt_new_item">
                            <a href=""><img src="images/asus_vivobook.jpg" alt="Lỗi hiển thị"></a>
                            <div class="product_lt_new_item_info">
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
                        <div class="product_lt_new_item">
                            <a href=""><img src="images//tufgamming.jpg" alt="Lỗi hiển thị"></a>
                            <div class="product_lt_new_item_info">
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
                        <div class="product_lt_new_item">
                            <a href=""><img src="images/asus_vivobook.jpg" alt="Lỗi hiển thị"></a>
                            <div class="product_lt_new_item_info">
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
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    {{-- Hiển thị thông tin dịch vụ bán hàng, vận chuyển --}}
    <section class="container_css service">
        <div class="service_items">
            <div class="service_item">
                <div class="item_icon"><i class="fas fa-truck"></i></div>
                <div class="item_text">
                    <h6>MIỄN PHÍ VẬN CHUYỂN</h6>
                    <p>100% trách nhiệm về vận chuyển</p>
                </div>
            </div>
            <div class="service_item">
                <div class="item_icon"><i class="fas fa-money-bill-alt"></i></div>
                <div class="item_text">
                    <h6>THANH TOÁN KHI NHẬN ĐƯỢC HÀNG</h6>
                </div>
            </div>
            <div class="service_item">
                <div class="item_icon"><i class="fas fa-undo-alt"></i></div>
                <div class="item_text">
                    <h6>ĐỔI TRẢ TRONG 7 NGÀY</h6>
                    <p>1 đổi 1 nếu lỗi nằm ở shop</p>
                </div>
            </div>
            <div class="service_item">
                <div class="item_icon"><i class="far fa-clock"></i></div>
                <div class="item_text">
                    <h6>MỞ CỬA CẢ TUẦN</h6>
                    <p>7:00 giờ sáng đến 20:00 tối</p>
                </div>
            </div>
        </div>
    </section>
@endsection
