@extends('layouts.layouts_user')
@section('title', 'Trang giỏ hàng')
@section('content')
    <div class="shopping_cart container_css">
        <div class="shopping_cart_main">
            <div class="shopping_cart_items">
                <div class="shopping_cart_item">
                    <div class="cart_item_img">
                        <a href=""><img src="images/16pro.jpg" alt=""></a>
                    </div>
                    <div class="cart_item_info">
                        <div class="cart_item_info_top">
                            <h4>Iphone 16 Pro Max</h4>
                            <button><i class="fas fa-trash"></i></button>
                        </div>
                        <p>Titan, 256GB</p>
                        <div class="cart_item_info_bottom">
                            <div>33.000.000 <sup>đ</sup></div>
                            <div>
                                <button class="minus amount"><i class="fas fa-minus"></i></button>
                                <input class="amount" type="text" value="1" min="1">
                                <button class="plus amount"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shopping_cart_item">
                    <div class="cart_item_img">
                        <a href=""><img src="images/tufgamming.jpg" alt=""></a>
                    </div>
                    <div class="cart_item_info">
                        <div class="cart_item_info_top">
                            <h4>Asus Gaming TUF Dash F15 FX517ZC i55 12450H (HN077W)</h4>
                            <button><i class="fas fa-trash"></i></button>
                        </div>
                        <p>Bạc, 256GB</p>
                        <div class="cart_item_info_bottom">
                            <div>16.000.000 <sup>đ</sup></div>
                            <div>
                                <button class="minus amount"><i class="fas fa-minus"></i></button>
                                <input class="amount" type="text" value="1" min="1">
                                <button class="plus amount"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shopping_cart_item">
                    <div class="cart_item_img">
                        <a href=""><img src="images/16pro.jpg" alt=""></a>
                    </div>
                    <div class="cart_item_info">
                        <div class="cart_item_info_top">
                            <h4>Iphone 16 Pro Max</h4>
                            <button><i class="fas fa-trash"></i></button>
                        </div>
                        <p>Titan, 256GB</p>
                        <div class="cart_item_info_bottom">
                            <div>33.000.000 <sup>đ</sup></div>
                            <div>
                                <button class="minus amount"><i class="fas fa-minus"></i></button>
                                <input class="amount" type="text" value="1" min="1">
                                <button class="plus amount"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shopping_cart_bottom">
                <div class="shopping_cart_bottom_left">
                    <button>xóa tất cả</button>
                </div>
                <div class="shopping_cart_bottom_right_voucher">
                {{--     <div class="shopping_cart_bottom_voucher">
                        <div class="shopping_cart_voucher_discount">
                            <input type="text" placeholder="Điền mã giảm giá của bạn!">
                            <button>Sử dụng</button>
                        </div>
                        <div class="shopping_cart_voucher_discount_bottom">
                            <h5>Giảm giá</h5>
                            <p>-5.000.000 <sup>đ</sup></p>
                        </div>
                    </div> --}}
                    <div class="shopping_cart_bottom_price">
                        <h4>Tổng cộng</h4>
                        <p>55.000.000 <sup>đ</sup></p>
                        <button><a href="">Thanh toán</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
