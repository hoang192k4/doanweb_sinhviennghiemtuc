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
                    <div class="payment_product">
                        <a href=""><img src="./images/tufgamming.jpg" alt="Lỗi hiển thị"></a>
                        <div>
                            <div>
                                <a href="">
                                    <h6>Laptop msi</h6>
                                </a>
                                <p>15.000.000 <sup>đ</sup></p>
                            </div>
                            <div>
                                <h6>Đen 256GB</h6>
                                <p>x1</p>
                            </div>
                        </div>
                    </div>
                    <div class="payment_product">
                        <a href=""><img src="./images/16pro.jpg" alt="Lỗi hiển thị"></a>
                        <div>
                            <div>
                                <a href="">
                                    <h6>iphone 16 pro</h6>
                                </a>
                                <p>35.000.000 <sup>đ</sup></p>
                            </div>
                            <div>
                                <h6>Đen 256GB</h6>
                                <p>x1</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="payment_action">
                    <form class="voucher_payment" action="" method="get">
                        <input type="text" placeholder="Mã giảm giá">
                        <button type="submit">Áp dụng</button>
                    </form>
                    <div class="payment_action_temporary">
                        <div>
                            <p>Tạm tính </p>
                            <p>50.000.000 <sup>đ</sup></p>
                        </div>
                        <div>
                            <p>Phí vận chuyển </p>
                            <p>--</p>
                        </div>
                        <div>
                            <p>Giảm giá</p>
                            <p>2.000.000 <sup>đ</sup></p>
                        </div>
                    </div>
                    <div class="total_price">
                        <p>Tổng cộng </p>
                        <p><span>VNĐ </span>48.000.000 <sup>đ</sup></p>
                    </div>
                </div>
            </div>
            <div class="payment_right">
                <div class="logo_payment"><img src="" alt="Lỗi hiển thị"></div>
                <h4>Thông tin giao hàng</h4>
                <div class="profile_payment">
                    <input type="text" placeholder="Họ và tên">
                    <div>
                        <input type="email" placeholder="Email">
                        <input type="tel" placeholder="Số điện thoại">
                    </div>
                    <input type="text" placeholder="Địa chỉ - Số nhà, tên Đường">
                    <div class="css_select_div">
                        <select class="css_select" id="provinces" name="provinces" title="Chọn Tỉnh Thành"
                            onchange=hadelChangeProvince(this)>
                            <option value="">Tỉnh Thành</option>
                        </select>
                        <select class="css_select" id="districts" name="districts" title="Chọn Quận Huyện"
                            onchange=hadelChangeDistrict(this)>
                            <option value="">Quận Huyện</option>
                        </select>
                        <select class="css_select" id="wards" name="wards" title="Chọn Phường Xã">
                            <option value="">Phường Xã</option>
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
                                    <td style="width: 10%;"><input type="radio" style="font-size: 14px;" checked
                                            name="method_payment" value="COD"></td>
                                    <td style="width: 10%;"><img src="./images/iconcod.jpg" alt="Lỗi"
                                            style="height: 35px"></td>
                                    <td>
                                        <h6>Thanh toán khi nhận hàng (COD)</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 10%;"><input type="radio"
                                            style="font-size: 14px; "name="method_payment" value="Banking"></td>
                                    <td style="width: 10%;"><img src="./images/iconbanking.jpg" alt="Lỗi"
                                            style="height: 35px"></td>
                                    <td>
                                        <h6>Chuyển khoản qua ngân hàng (Banking)</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <p>Thông tin thanh toán của Sinh Viên Nghiêm Túc</p>
                                        <p>Ngân hàng : TECKCOMBANK</p>
                                        <p>Số tài khoản : 999999999</p>
                                        <p>Chủ tài khoản : NGUYEN THUY ANH THU</p>
                                        <p style="margin-top: 8px;">Nội dung chuyển khoản : Số điện thoại đặt hàng + Mã đơn
                                            hàng</p>
                                        <p>(Sẽ có nội dung mẫu sau khi hoàn tất đơn hàng)</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <button id="payment_order">Hoàn tất đơn hàng</button>
            </div>
        </div>
    </div>
@endsection
