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
                    @if (session('buy-now') == null)
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
                                            <p>{{ number_format($item['variant_info']->price, 0, ',', '.') }}<sup>đ</sup>
                                            </p>
                                        </div>
                                        <div>
                                            <h6>{{ $item['variant_info']->color }}
                                                {{ $item['variant_info']->internal_memory }}
                                            </h6>
                                            <p>x{{ $item['quantity'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @else
                        <div class="payment_product">
                            <a href=""><img src="{{ asset('images/' . session('buy-now')['variant_info']->image) }}"
                                    alt="Lỗi hiển thị"></a>
                            <div>
                                <div>
                                    <a href="">
                                        <h6>{{ session('buy-now')['product_info']->name }}</h6>
                                    </a>
                                    <p>{{ number_format(session('buy-now')['variant_info']->price, 0, ',', '.') }}<sup>đ</sup>
                                    </p>
                                </div>
                                <div>
                                    <h6>{{ session('buy-now')['variant_info']->color }}
                                        {{ session('buy-now')['variant_info']->internal_memory }}
                                    </h6>
                                    <p>x{{ session('buy-now')['quantity'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="payment_action">
                    <div class="voucher_payment">
                        <input type="text" placeholder="Mã giảm giá" id="voucher-code">
                        <button type="button" id="btn-submit-voucher">Áp dụng</button>
                    </div>
                    <div class="payment_action_temporary">
                        <div>
                            <p>Tạm tính </p>
                            <p>
                                @if (session('buy-now') == null)
                                    {{ number_format(session('cart')->totalPrice, 0, ',', '.') }}
                                @else
                                    {{ number_format(session('buy-now')['totalPrice'], 0, ',', '.') }}
                                @endif
                                <sup>đ</sup>
                            </p>
                        </div>
                        <div>
                            <p>Phí vận chuyển </p>
                            <p>--</p>
                        </div>
                        <div>
                            <p>Giảm giá</p>
                            <p><span id="discount">0</span><sup>đ</sup></p>
                            <input type="hidden" name="voucher" id="voucher">
                        </div>
                    </div>
                    <div class="total_price">
                        <p>Tổng cộng </p>
                        <p><span>VNĐ </span><span id="total-price">
                                @if (session('buy-now') == null)
                                    {{ number_format(session('cart')->totalPrice, 0, ',', '.') }}
                                @else
                                    {{ number_format(session('buy-now')['totalPrice'], 0, ',', '.') }}
                                @endif
                            </span>
                            <sup>đ</sup>
                        </p>
                    </div>
                </div>
            </div>
            <div class="payment_right">
                <form action="/completePayment" class="form_payment" method="POST">
                    @csrf
                    <h4>Thông tin giao hàng</h4>
                    <div class="profile_payment">
                        <input type="text" name="full_name" id="full_name_payment"
                            value="{{ Auth()->user()->full_name }}" placeholder="Họ và tên">
                        <div class="alert_error_validate" id="full_name_payment_error"></div>
                        <div>
                            <input type="email" name="email" id="email_payment" required placeholder="Email"
                                value="{{ Auth()->user()->email }}">
                            <input type="tel" name="phone" placeholder="Số điện thoại" required id="phone_payment"
                                value="{{ Auth()->user()->phone }}">

                        </div>
                        <div>
                            <div class="alert_error_validate" id="email_payment_error">
                            </div>
                            <div class="alert_error_validate" id="phone_payment_error">
                            </div>

                        </div>
                        <input id="address"type="text" placeholder="Địa chỉ - Số nhà, tên Đường" required name="address"
                            value="">
                        <div class="alert_error_validate" id="address_payment_error">
                        </div>
                        <div class="css_select_div">
                            <select class="css_select" id="provinces" name="provinces" title="Chọn Tỉnh Thành"
                                onchange=hadelChangeProvince(this)>
                                <option required value="">Tỉnh Thành</option>
                            </select>
                            <select class="css_select" id="districts" name="districts" title="Chọn Quận Huyện"
                                onchange=hadelChangeDistrict(this)>
                                <option required value="">Quận Huyện</option>
                            </select>
                            <select class="css_select" id="wards" name="wards" title="Chọn Phường Xã"
                                onchange="handleChangePosition(this)">
                                <option required value="">Phường Xã</option>
                            </select>
                        </div>
                        <div class="css_select_div">
                            <div class="alert_error_validate" id="provinces_error">

                            </div>
                            <div class="alert_error_validate" id="districts_error">

                            </div>
                            <div class="alert_error_validate" id="wards_error">
                            </div>
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
                                            <p>Ngân hàng : SACOMBANK</p>
                                            <p>Số tài khoản : 060277266401</p>
                                            <p>Chủ tài khoản : NGUYEN THUY ANH THU</p>
                                            <p>Nội dung chuyển khoản: {{ $code }}</p>

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
        localStorage.removeItem("province");
        localStorage.removeItem("district");
        localStorage.removeItem("ward");
        let selectedProvinceName = "";
        let selectedDistrictName = "";
        let selectedWardName = "";

        fetch('https://esgoo.net/api-tinhthanh/1/0.htm')
            .then(response => response.json())
            .then(data => {
                let provinces = data.data;
                if (provinces !== undefined) {
                    provinces.map(item => document.getElementById('provinces').innerHTML +=
                        `<option value="${item.id}">${item.name}</option>`);
                }
            });

        function hadelChangeProvince(provinceId) {
            selectedProvinceName = provinceId.options[provinceId.selectedIndex].text;
            localStorage.setItem("province", selectedProvinceName);
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
            let selectedDistrictName = districtId.options[districtId.selectedIndex].text;
            localStorage.setItem("district", selectedDistrictName);

            fetch(`https://esgoo.net/api-tinhthanh/3/${districtId.value}.htm`)
                .then(response => response.json())
                .then(data => {
                    let wards = data.data;
                    document.getElementById('wards').innerHTML = '<option value="">Phường xã</option>';
                    if (wards !== undefined) {
                        wards.map(item => document.getElementById('wards').innerHTML +=
                            `<option value="${item.id}">${item.full_name}</option>`);
                    }
                });
        }

        function handleChangePosition(ward) {
            let selectedWardName = ward.options[ward.selectedIndex].text;
            localStorage.setItem("ward", selectedWardName);
        }

        function order() {
            try {
                const data = {
                    full_name: $('#full_name_payment').val(),
                    email: $('#email_payment').val(),
                    phone: $('#phone_payment').val(),
                    address: $('#address').val(),
                    provinces: localStorage.getItem('province'),
                    districts: localStorage.getItem('district'),
                    wards: localStorage.getItem('ward'),
                    voucher: $('#voucher').val(),
                    method: $('input[name="method_payment"]:checked').val(),
                    code: {{ $code }},
                    _token: '{{ csrf_token() }}'
                }
                $.ajax({
                        method: "POST",
                        url: '/payment',
                        data: data
                    })
                    .fail((response) => {
                        let errors = response.responseJSON.errors; // Lấy danh sách lỗi
                        if (errors.full_name !== undefined) {
                            $('#full_name_payment_error').text(errors.full_name);
                            $('#full_name_payment').focus();
                        }
                        if (errors.phone !== undefined) {
                            $('#phone_payment_error').text(errors.phone);
                            $('#phone_payment').focus();
                        }
                        if (errors.email !== undefined) {
                            $('#email_payment_error').text(errors.email);
                            $('#email_payment').focus();
                        }
                        if (errors.address !== undefined) {
                            $('#address_payment_error').text(errors.address);
                            $('#address_payment').focus();
                        }
                        if (errors.provinces !== undefined) {
                            $('#provinces_error').text(errors.provinces);
                            $('#provinces').focus();
                        }
                        if (errors.districts !== undefined) {
                            $('#districts_error').text(errors.districts);
                            $('#districts').focus();
                        }
                        if (errors.wards !== undefined) {
                            $('#wards_error').text(errors.wards);
                            $('#wards').focus();
                        }
                    })
                    .done((data) => {
                        console.log(data);
                        if (data.success == 1) {

                            alertify.confirm('Thông báo', data.message, function() {
                                window.location.href = data.url
                            }, function() {
                                window.location.href = data.url
                            })
                        } else {
                            alertify.confirm('Thông báo', data.message, function() {
                                window.location.href = data.url
                            }, function() {
                                window.location.href = data.url
                            })
                        }

                    });
            } catch (errors) {
                console.log(errors);
            }
        }


        const fullName = document.getElementById('full_name_payment');
        fullName.addEventListener('input', () => {
            $('#full_name_payment_error').text('');
        })
        const email = document.getElementById('email_payment');
        email.addEventListener('input', () => {
            $('#email_payment_error').text('');
        })
        const phone = document.getElementById('phone_payment');
        phone.addEventListener('input', () => {
            $('#phone_payment_error').text('');
        })
        const address = document.getElementById('address');
        address.addEventListener('input', () => {
            $('#address_payment_error').text('');
        })
        const provinces = document.getElementById('provinces');
        provinces.addEventListener('input', () => {
            $('#provinces_error').text('');
        })
        const districts = document.getElementById('districts');
        provinces.addEventListener('input', () => {
            $('#districts_error').text('');
        })
        const wards = document.getElementById('wards');
        provinces.addEventListener('input', () => {
            $('#wards_error').text('');
        })
    </script>
    <script>
        const btn = document.getElementById('btn-submit-voucher');
        btn.addEventListener('click', (event) => {
            const code = $('#voucher-code').val().trim();

            $.ajax({
                method: "POST",
                url: '/add-voucher',
                data: {
                    _token: '{{ csrf_token() }}',
                    orderValue: @if (session('buy-now') == null)
                        {{ session('cart')->totalPrice }}
                    @else
                        {{ session('buy-now')['totalPrice'] }}
                    @endif ,
                    code
                }
            }).done((data) => {
                if (data.success === 1) {
                    alertify.success(data.message);
                    $('#discount').text(new Intl.NumberFormat('vi-VN').format(data.voucher.discount_value));
                    $('#total-price').text(new Intl.NumberFormat('vi-VN').format(parseInt(
                        @if (session('buy-now') == null)
                            {{ session('cart')->totalPrice }}
                        @else
                            session('buy-now')['totalPrice']
                        @endif ) - data.voucher.discount_value));
                    $('#voucher').val(data.voucher.id);
                    totalPrice = parseInt(
                        @if (session('buy-now') == null)
                            {{ session('cart')->totalPrice }}
                        @else
                            session('buy-now')['totalPrice']
                        @endif ) - data.voucher.discount_value;
                } else {
                    alertify.error(data.message);
                }
            })
        })
    </script>
@endsection
