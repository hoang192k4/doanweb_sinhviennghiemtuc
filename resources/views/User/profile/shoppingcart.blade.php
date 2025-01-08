@extends('layouts.layouts_user')
@section('title', 'Trang giỏ hàng')
@section('content')
    <div class="shopping_cart container_css">
        @if (session('cart') == null)
            <h3 style="height:150px; text-align:center; margin-top:69px">Giỏ hàng chưa có sản phẩm</h3>
        @else
            <div class="shopping_cart_main">
                <div class="shopping_cart_items">
                    @foreach (session('cart')->listProductVariants as $item)
                        <div class="shopping_cart_item">
                            <div class="cart_item_img">
                                <a href=""><img src="{{ asset('images/' . $item['variant_info']->image) }}"
                                        alt=""></a>
                            </div>
                            <div class="cart_item_info">
                                <div class="cart_item_info_top">
                                    <h4>{{ $item['product_info']->name }}</h4>
                                    <button><i class="fas fa-trash"></i></button>
                                </div>
                                <p>{{ $item['variant_info']->color }}, {{ $item['variant_info']->internal_memory }}</p>
                                <div class="cart_item_info_bottom">
                                    <div>{{ number_format($item['variant_info']->price) }} <sup>đ</sup></div>
                                    <input type="text" value="{{ $item['price'] }}">
                                    <div>
                                        <button class="minus amount"><i class="fas fa-minus"></i></button>
                                        <input class="amount" type="text" min="1" value="{{ $item['quantity'] }}">
                                        <button class="plus amount"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
                            <input type="text" value="{{ session('cart')->totalQuantity }}">
                            <h4>Tổng cộng</h4>
                            <p> {{ number_format(session('cart')->totalPrice) }}<sup>đ</sup></p>
                            <button><a href="">Thanh toán</a></button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
