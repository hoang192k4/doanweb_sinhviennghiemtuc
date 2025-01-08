@extends('layouts.layouts_user')
@section('title', 'Trang chi tiết sản phẩm')
@section('content')
    <div style="background-color: rgb(241, 240, 241);">
        <div class="container_css product_detail_top_url">
            <ul>
                <li><a href="">Trang chủ</a></li>
                <li><a href="">iphone</a></li>
                <li><a href="">iPhone 16 Series</a></li>
                <li><a href="">iPhone 16 Pro 256GB - Chính hãng VN/A</a></li>
            </ul>
        </div>
    </div>
    <!-- Chi tiết sản phẩm -->
    <section class="container_css" style="padding:10px;">
        <div class="product_detail">
            <div class="product_detail_left">
                <div id="carouselExampleIndicators" class="carousel slide carousel-dark" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/images/detail1.png" class="d-block" alt="Lỗi hiển thị">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/detail2.png" class="d-block" alt="Lỗi hiển thị">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/detail3.png" class="d-block" alt="Lỗi hiển thị">
                        </div>
                        <div class="carousel-item">
                            <img src="images/detail4.png" class="d-block" alt="Lỗi hiển thị">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="product_detail_left_img">
                    <div>
                        <img id="img" src="/images/detail1.png" alt="Lỗi hiển thị" type="button"
                            data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1">
                    </div>
                    <div>
                        <img id="img" src="/images/detail2.png" alt="Lỗi hiển thị" type="button"
                            data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2">
                    </div>
                    <div>
                        <img id="img" src="/images/detail3.png" alt="Lỗi hiển thị" type="button"
                            data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3">
                    </div>
                    <div>
                        <img id="img" src="/images/detail4.png" alt="Lỗi hiển thị" type="button"
                            data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4">
                    </div>
                </div>
            </div>

            <div class="product_detail_right">
                <div class="product_detail_right_interact">
                    <p id="button_like"><i class="fas fa-heart" id="icon_like"></i>Yêu thích
                    </p>
                    <p><i class="fas fa-thumbs-up"></i>50 lượt thích</p>
                    <p><i class="fas fa-eye"></i>100 lượt xem</p>
                </div>
                <h4>iPhone 16 Pro 256GB - Chính hãng VN/A</h4>
                <div class="product_detail_right_price">
                    <p>Giá bán: <Span>27,990,000 <sup>đ</sup></Span></p>
                    <h5>( Còn hàng )</h5>
                </div>
                <h5 style="margin-bottom: 0; font-weight: 100; color: #a7a7a7;">Dung lượng</h5>
                <div class="product_detail_right_ram">
                    <button class="color_active">
                        <span>128GB</span>
                        <p>27,990,000 <sup>đ</sup></p>
                    </button>
                    <button>
                        <span>258GB</span>
                        <p>29,990,000 <sup>đ</sup></p>
                    </button>
                    <button>
                        <span>512GB</span>
                        <p>32,990,000 <sup>đ</sup></p>
                    </button>
                    <button>
                        <span>1TB</span>
                        <p>37,990,000 <sup>đ</sup></p>
                    </button>
                </div>
                <h5 style="margin-top:10px; font-weight: 100;color:#a7a7a7">Màu sắc</h5>
                <div class="product_detail_right_color">

                    <button class="color_active">
                        <img src="images/iphone-15-promax.jpg" alt="Lỗi hiển thị">
                        <span>
                            <p>Hồng</p>
                            <span>27,990,000 <sup>đ</sup></span>
                        </span>
                    </button>
                    <button>
                        <img src="images/16pro.jpg" alt="Lỗi hiển thị">
                        <span>
                            <p>Gold</p>
                            <span>27,990,000 <sup>đ</sup></span>
                        </span>
                    </button>
                    <button>
                        <img src="images/iphone16den.jpg" alt="Lỗi hiển thị">
                        <span>
                            <p>Đen</p>
                            <span>27,990,000 <sup>đ</sup></span>
                        </span>
                    </button>
                    <button>
                        <img src="images/iphone16titan.jpg" alt="Lỗi hiển thị">
                        <span>
                            <p>Titan</p>
                            <span>27,990,000 <sup>đ</sup></span>
                        </span>
                    </button>
                </div>
                <div class="product_detail_right_quantity">
                    <p>Cửa hàng hiện có 500 sản phẩm</p>
                    <div>
                        <button id="button_minus_value"><i class="fas fa-minus"></i></button>
                        <input type="text" id="number_input" value="1">
                        <button id="button_plus_value"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="product_detail_right_buy">
                    <div><button>Mua ngay</button></div>
                    <div><button>Thêm giỏ hàng<i class="fas fa-cart-plus" style="margin-left:5px;"></i></button></div>
                </div>
            </div>
        </div>
        <div class="product_detail detail_bottom">
            <div class="product_detail_bottom_left">
                <div class="product_detail_bottom_left_rating">
                    <div>
                        <a href="">
                            <p>4.9 / 5</p>
                            <p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </p>
                        </a>
                    </div>
                    <div id="button_rating">
                        <button class="click_active_border">Tất cả</button>
                        <button>5 sao (248)</button>
                        <button>4 sao (515)</button>
                        <button>3 sao (211)</button>
                        <button>2 sao (85)</button>
                        <button>1 sao (3)</button>
                    </div>
                </div>
                <div class="product_detail_bottom_left_comments">
                    <div class="product_detail_bottom_left_comment">
                        <div>
                            <button><img src="images/user_commet1.jpg" alt=""></button>
                            <div>Nguyễn Thùy Anh thư
                                <p>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </p>
                            </div>
                            <p><i class="fas fa-clock"></i>11/29/2024 11:11</p>
                        </div>
                        <div>
                            <p>Điện thoại khá đẹp tôi sẽ quay lại mua nữa</p>
                            <div>
                                <img src="images/detail2.png" alt="">
                                <img src="images/detail3.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="product_detail_bottom_left_comment">
                        <div>
                            <button><img src="images/user_comment2.jpg" alt=""></button>
                            <div>Nguyễn Quốc Đô
                                <p>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </p>
                            </div>
                            <p><i class="fas fa-clock"></i>11/29/2024 11:11</p>
                        </div>
                        <div>
                            <p>Giao hàng nhanh.Shipper tận tình, shop khá uy tính tôi sẽ giới thiệu cho bạn tôi để có thể
                                mua ủng hộ shop nhiều hơn</p>
                            <div>
                                <img src="images/detail2.png" alt="">
                                <img src="images/detail3.png" alt="">
                            </div>
                        </div>
                    </div>
                    <button>Xem thêm</button>
                </div>
                <div class="product_detail_bottom_left_desription">
                    <h6>Mô tả sản phẩm</h6>
                    <p>iPhone 16 Pro là một trong những sản phẩm được Apple gửi gắm niềm tin và nhiều cải tiến mới trong sự
                        kiện công nghệ It’s Glow Time 2024. Bên cạnh những điểm mới về mẫu mã, iPhone 16 Pro còn được nâng
                        cấp so với phiên bản iPhone 15 Pro đi trước ở các thông số về chip, camera… Trong bài viết này, Minh
                        Tuấn Mobile sẽ tổng hợp các thông tin về giá bán, cấu hình, so sánh và đánh giá của iPhone 16 Pro để
                        bạn có thể quyết định có nên mua hay không.</p>
                </div>
            </div>

            <div class="product_detail_bottom_right">
                <h4><a href="">Thông Số Kỹ Thuật</a></h4>
                <ul>
                    <li>
                        <div>Kích thước màn hình</div>
                        <div>6.1 inches</div>
                    </li>
                    <li>
                        <div>Công nghệ màn hình</div>
                        <div>Super Retina XDR OLED</div>
                    </li>
                    <li>
                        <div>Độ phân giải</div>
                        <div>2556 x 1179 pixels</div>
                    </li>
                    <li>
                        <div>Chipset</div>
                        <div>Apple A18</div>
                    </li>
                    <li>
                        <div>RAM</div>
                        <div>8GB</div>
                    </li>
                    <li>
                        <div>Camera</div>
                        <div>Chính 48 MP & Phụ 12 MP</div>
                    </li>
                    <li>
                        <div>Hệ điều hành</div>
                        <div>IOS 18</div>
                    </li>
                    <li>
                        <div>Kích thước</div>
                        <div>147.6 x 71.6 x 7.8 mm</div>
                    </li>
                    <li>
                        <div>Thời điểm ra mắt</div>
                        <div>09/2024</div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Sản phẩm tương tự -->
    <section class="container_css product_best_seller">
        <h4>Sản phẩm tương tự</h4>
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
@endsection
@section('script')

    <script>
        function addToCart()
        {
            
        }
    </script>
@endsection
