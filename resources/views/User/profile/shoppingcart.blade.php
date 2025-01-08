@extends('layouts.layouts_user')
@section('title', 'Trang giỏ hàng')
@section('content')
    <div class="shopping_cart container_css">
        @if (session('cart') == null)
            <h3 style="height:150px; text-align:center; margin-top:69px">Giỏ hàng chưa có sản phẩm</h3>
        @else
            <div class="shopping_cart_main" id="cart-main">
                <div class="shopping_cart_items" id="list-product-variant">
                    @foreach (session('cart')->listProductVariants as $item)
                        <div id="variant-{{ $item['variant_info']->id }}" class="shopping_cart_item">
                            <div class="cart_item_img">
                                <a href=""><img src="{{ asset('images/' . $item['variant_info']->image) }}"
                                        alt=""></a>
                            </div>
                            <div class="cart_item_info">
                                <div class="cart_item_info_top">
                                    <h4>{{ $item['product_info']->name }}</h4>
                                    <button data-id="{{ $item['variant_info']->id }}"
                                        onclick="deleteItemCart(this.dataset.id)"><i class="fas fa-trash"></i></button>
                                </div>
                                <p>{{ $item['variant_info']->color }}, {{ $item['variant_info']->internal_memory }}</p>
                                <div class="cart_item_info_bottom">
                                    <div>{{ number_format($item['variant_info']->price) }} <sup>đ</sup></div>
                                    <div>
                                        <button class="minus amount"
                                            onclick="minusOneQuantity({{ $item['variant_info']->id }})"><i
                                                class="fas fa-minus"></i></button>
                                        <input class="amount" disabled type="text" min="1"
                                            value="{{ $item['quantity'] }}"
                                            id="quantity-variant-{{ $item['variant_info']->id }}">
                                        <button class="plus amount"
                                            onclick="addOneQuantity({{ $item['variant_info']->id }})"><i
                                                class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="shopping_cart_bottom" id="cart-bottom">
                    <div class="shopping_cart_bottom_left">
                        <button onclick="deleteAll()">xóa tất cả</button>
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
                            <p id="total-price"> {{ number_format(session('cart')->totalPrice) }}<sup>đ</sup></p>
                            <button><a href="">Thanh toán</a></button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
@section('script')
    <script>
        //xóa một sản phẩm
        function deleteItemCart(id) {
            $.ajax({
                method: "GET",
                url: `/cart-delete-item/${id}`
            }).done((data) => {
                alertify.success(data.message);
                $(`#list-product-variant #variant-${id}`).remove();
                if ($('#list-product-variant').children().length == 0)
                    afterDeleteAll();
                else
                    $(`#total-price`).text(formatNumber(data.cart.totalPrice)).append($('<sup>').text('đ'));
            })
        }
        //xóa tất cả sản phẩm
        function deleteAll() {
            $.ajax({
                method: "GET",
                url: `/cart-delete-all`
            }).done((data) => {
                alertify.success(data);
                $('#list-product-variant').empty();
                afterDeleteAll();
            })
        }
        //xử lý giao diện khi xóa sản phẩm
        function afterDeleteAll() {
            $('#cart-main #cart-bottom').remove();
            $('#list-product-variant')
                .append($('<h3>')
                    .text('Giỏ hàng chưa có sản phẩm')
                    .css({
                        height: '150px',
                        textAlign: 'center',
                        marginTop: '69px'
                    }));
        }

        function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        }
        //Thêm số lượng là một khi nhấn nút +
        function addOneQuantity(id) {
            $(`#quantity-variant-${id}`).val(parseInt($(`#quantity-variant-${id}`).val()) + 1);
            $.ajax({
                    method: "GET",
                    url: `/add-to-cart/${id}/1`
                })
                .done((data) => {
                    $('#total-price').text(formatNumber(data.cart.totalPrice)).append($('<sup>').text('đ'));
                });
        }
        //Trừ một số lượng khi nhấn nút -
        function minusOneQuantity(id) {
            if ($(`#quantity-variant-${id}`).val() > 1){
                $(`#quantity-variant-${id}`).val(parseInt($(`#quantity-variant-${id}`).val()) - 1);
                $.ajax({
                        method: "GET",
                        url: `/cart-minus-one-variant/${id}`
                    })
                    .done((data) => {
                        console.log(data)
                        $('#total-price').text(formatNumber(data.cart.totalPrice)).append($('<sup>').text('đ'));
                    });
            }
        }
    </script>
@endsection
