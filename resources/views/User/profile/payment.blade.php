@extends('layouts.layouts_user')
@section('title', 'Thanh toán')
@section('content')
    <div class="popup_payment">
        <div class="overflow_payment"></div>
        <div class="popup_payment_base payment_cod">
            <p><i class="fas fa-times"></i></p>
            <h4>Xác nhận đơn hàng - COD</h4>
            <div>
                <p>Đơn hàng của bạn đã được ghi nhận</p>
                <p>Cảm ơn bạn đã tin tưởng mua hàng tại Sinh Viên Nghiêm Túc shop</p>
            </div>
            <div>
                <button><a href="">Xem chi tiết đơn hàng</a></button>
                <button><a href="">Tiếp tục mua sắm</a></button>
            </div>
        </div>
        <div class="popup_payment_base payment_banking">
            <p><i class="fas fa-times"></i></p>
            <h4>Xác nhận đơn hàng - Banking</h4>
            <div>
                <p>Đơn hàng của bạn đã được ghi nhận</p>
                <p>Cảm ơn bạn đã tin tưởng mua hàng tại Sinh Viên Nghiêm Túc shop</p>
                <div class="content_banking">
                    <p>Nội dung chuyển khoản : 0123456789 HD001</p>
                    <p>Đơn hàng sẽ tự động hủy nếu chưa thanh toán trong vòng 3 ngày</p>
                </div>
            </div>
            <div>
                <button><a href="">Xem chi tiết đơn hàng</a></button>
                <button><a href="">Tiếp tục mua sắm</a></button>
            </div>
        </div>
    </div>
    <div class="payments container_css">
        <div class="payment">
            <div class="payment_left">
                <div class="payment_products">
                    @if (session('cart') != null)
                        @foreach (session('cart')->listProductVariants as $item)
                            <div class="payment_product">
                                <a href=""><img src="{{ asset('images/' . $item['variant_info']->image) }}"
                                        alt="Lỗi hiển thị"></a>
                                <div>
                                    <div>
                                        <a href="">
                                            <h6>{{ $item['product_info']->name }}</h6>
                                        </a>
                                        <p>{{ $item['variant_info']->price }}<sup>đ</sup></p>
                                    </div>
                                    <div>
                                        <h6>{{ $item['variant_info']->color }} {{ $item['variant_info']->internal_memory }}
                                        </h6>
                                        <p>x{{ $item['quantity'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="payment_action">
                    <form class="voucher_payment" action="" method="get">
                        <input type="text" placeholder="Mã giảm giá">
                        <button type="submit">Áp dụng</button>
                    </form>
                    <div class="payment_action_temporary">
                        <div>
                            <p>Tạm tính </p>
                            <p> {{ number_format(session('cart')->totalPrice) }}<sup>đ</sup></p>
                        </div>
                        <div>
                            <p>Phí vận chuyển </p>
                            <p>--</p>
                        </div>
                        <div>
                            <p>Giảm giá</p>
                            <p>0<sup>đ</sup></p>
                        </div>
                    </div>
                    <div class="total_price">
                        <p>Tổng cộng </p>
                        <p><span>VNĐ </span> {{ number_format(session('cart')->totalPrice) }} <sup>đ</sup></p>
                    </div>
                </div>
            </div>
            <div class="payment_right">
                <form action="/completePayment" class="form_payment" method="POST">
                    <div class="logo_payment"><img src="" alt="Lỗi hiển thị"></div>
                    <h4>Thông tin giao hàng</h4>
                    <div class="profile_payment">
                        <input type="text" name="full_name" id="full_name_payment" required
                            value="@isset($orderPayment){{ $orderPayment->full_name }} @endisset"
                            placeholder="Họ và tên">
                        <div class="alert_error_validate" id="full_name_payment_error">
                           
                        </div>

                        <div>
                            <input type="email" name="email" id="email_payment" required placeholder="Email"
                                value="@isset($orderPayment){{ $orderPayment->full_name }} @endisset">
                            <div class="alert_error_validate" id="email_payment_error">
                               
                            </div>

                            <input type="tel" name="phone" placeholder="Số điện thoại" required id="phone-payment"
                                value="@isset($orderPayment){{ $orderPayment->full_name }} @endisset">
                            <div class="alert_error_validate" id="phone_payment_error">
                               
                            </div>

                        </div>
                        <input id="address"type="text" placeholder="Địa chỉ - Số nhà, tên Đường" required name="address"
                            value="@isset($orderPayment){{ $orderPayment->address }} @endisset">
                        <div class="css_select_div">
                            <select class="css_select" id="provinces" name="provinces" title="Chọn Tỉnh Thành"
                                onchange=hadelChangeProvince(this)>
                                <option required value="">Tỉnh Thành</option>
                            </select>
                            <select class="css_select" id="districts" name="districts" title="Chọn Quận Huyện"
                                onchange=hadelChangeDistrict(this)>
                                <option required value="">Quận Huyện</option>
                            </select>
                            <select class="css_select" id="wards" name="wards" title="Chọn Phường Xã">
                                <option required value="">Phường Xã</option>
                            </select>
                        </div>
                        <div class="method_payment">
                            <table>
                                <tbody>
                                    <tr>
                                        <td colspan="3">
                                            <h6>Phương thức thanh toán</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;"><input id="cod"type="radio" style="font-size: 14px;"
                                                checked name="method_payment" value="COD"></td>
                                        <td style="width: 10%;"><img src="./images/iconcod.jpg" alt="Lỗi"
                                                style="height: 35px"></td>
                                        <td>
                                            <label for="cod" style="font-weight:500">Thanh toán khi nhận hàng
                                                (COD)</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;"><input type="radio" style="font-size: 14px;"
                                                id="method_payment"name="method_payment" value="banking"></td>
                                        <td style="width: 10%;"><img src="./images/iconbanking.jpg" alt="Lỗi"
                                                style="height: 35px"></td>
                                        <td>
                                            <label for="method_payment" style="font-weight:500">Chuyển khoản qua ngân hàng
                                                (Banking)</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <p>Thông tin thanh toán của Sinh Viên Nghiêm Túc</p>
                                            <p>Ngân hàng : TECKCOMBANK</p>
                                            <p>Số tài khoản : 999999999</p>
                                            <p>Chủ tài khoản : NGUYEN THUY ANH THU</p>
                                            <p style="margin-top: 8px;">Nội dung chuyển khoản : Số điện thoại đặt hàng + Mã
                                                đơn
                                                hàng</p>
                                            <p>(Sẽ có nội dung mẫu sau khi hoàn tất đơn hàng)</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
                <button type="button" id="" onclick="order()"> Hoàn tất đơn hàng</button>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        fetch('https://esgoo.net/api-tinhthanh/1/0.htm')
            .then(response => response.json())
            .then(data => {
                let provinces = data.data;
                if (provinces !== undefined) {
                    provinces.map(item => document.getElementById('provinces').innerHTML +=
                        `<option value="${item.id}">${item.full_name}</option>`);
                }
            });

        function hadelChangeProvince(provinceId) {
            fetch(`https://esgoo.net/api-tinhthanh/2/${provinceId.value}.htm`)
                .then(response => response.json())
                .then(data => {
                    let districts = data.data;
                    document.getElementById('districts').innerHTML = '<option value="">Quận Huyện</option>';
                    document.getElementById('wards').innerHTML = '<option value="">Phường xã</option>';
                    if (districts !== undefined) {
                        districts.map(item => document.getElementById('districts').innerHTML +=
                            `<option value="${item.id}">${item.full_name}</option>`);
                    }
                });

        }

        function hadelChangeDistrict(districtId) {
            fetch(`https://esgoo.net/api-tinhthanh/3/${districtId.value}.htm`)
                .then(response => response.json())
                .then(data => {
                    let wards = data.data;
                    document.getElementById('wards').innerHTML = '<option value="">Phường xã</option>';
                    if (wards !== undefined) {
                        wards.map(item => document.getElementById('wards').innerHTML +=
                            `<option value="${item.code}">${item.full_name}</option>`);
                    }
                });
        }
    </script>
    <script>
        // function order() {
        //     const data = {
        //         full_name: $('#full_name_payment').val(),
        //         email: $('#email_payment').val(),
        //         phone: $('#phone-payment').val(),
        //         address: $('#address').val(),
        //         _token:'{{csrf_token()}}'
        //     }
        //     $.ajax({
        //         method: "POST",
        //         url: '/payment',
        //         data: data
        //     })
        //     .done((data) => console.log(data))
        //     .fail((data){
        //         if(data.status===422){
        //             let errors = data.responseJSON.errors; // Lấy danh sách lỗi
        //         }
        //     })
        // }
    </script>
@endsection
