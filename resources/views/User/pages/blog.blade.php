@extends('layouts.layouts_user')
@section('title', 'Trang giới thiệu')
@section('content')
    <style>
        .technology_search {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 12px;
        }
        .technology_search > form {
            width: 30%;
            display: flex;
            align-items: center;
        }
        .technology_search > form > input{
            border: none;
            padding: 5px 2px 5px 10px;
            outline: none;
            width: 300px;
            background-color: white;
            border-bottom-left-radius: 15px;
            border-top-left-radius: 15px;
        }
        .technology_search > form > button {
            padding:5px 10px 5px 0;
            border : none;
            background-color:white;
            border-bottom-right-radius: 15px;
            border-top-right-radius: 15px;
        }
    </style>
    <div class="container_css" style="padding:10px;">
        <div class="content">
            <div class="header_content">
                <h3>Chào mừng Quý khách!</h3>
                <h4>Sinh Viên Nghiêm Túc Shop</h4>
                <p>Kinh doanh: Điện Thoại, Máy Tính Bảng, Laptop</p>
                <p>Địa chỉ: 65 Huỳnh Thúc Kháng, P. Bến Nghé, Quận 1, TP. Hồ Chí Minh, Việt Nam</p>
                <p>Chân thành cảm ơn và mong được phục vụ Quý khách!</p>
            </div>
            <div class="body_content">
                <div class="intro_content">
                    <p>Bạn muốn trải nghiệm công nghệ mới nâng cao hiệu quả và giải trí? Bạn đang tìm kiếm một sản
                        phẩm
                        thông minh đáp ứng được
                        mọi nhu cầu của bạn nhưng không biết tìm ở đâu? Đừng lo hãy đến với chúng tôi. Sinh viên
                        nghiêm
                        túc Shop – nơi hội tụ
                        các sản phẩm công nghệ hiện đại với giá cả phải chăng. Chúng tôi cung cấp đa dạng từ các
                        dòng
                        điện thoại, máy tính đến
                        laptop với chất lượng cao đáp ứng được mọi nhu cầu làm việc, học tập, giải trí của mọi
                        người.
                        Tất cả sản phẩm đều được
                        chọn lọc kỹ càng, đảm bảo chất lượng được trao đến tay khách hàng. Dịch vụ bên chúng tôi hỗ
                        trợ
                        mua hàng trực tuyến với
                        giao diện thân thiện, đơn giản giúp việc mua hàng nhanh chóng chỉ với vài lần nhấp chọn. Còn
                        chần chờ gì mà không đến
                        với Sinh viên nghiêm túc Shop hoặc truy cập website để khám phá thêm nhiều sản phẩm thú vị.
                    </p>
                    <br>
                    <p style="text-align: center;">Sinh viên nghiêm túc – Đáp ứng mọi nhu cầu công nghệ của bạn.</p>
                </div>
                <div class="table_content">
                    <h4 style="padding: 10px 0px; text-align: center; background-color: rgb(22, 66, 60); color: white;">
                        Chính sách hoàn
                        trả</h4>
                    <div class="table_content_privacy">
                        <table>
                            <tr>
                                <th style="text-align:center; border : 1px solid black">Loại sản phẩm</th>
                                <th style="text-align:center ; border : 1px solid black">Trả hàng miễn phí</th>
                                <th style="text-align:center ; border : 1px solid black">Quy định trả hàng</th>
                            </tr>
                            <tr>
                                <td>Điện thoại</td>
                                <td>Trong 7 ngày</td>
                                <td>
                                    Trả hàng trong 7 ngày kể từ khi nhận hàng, miễn phí.<br>
                                    Có video, hình ảnh đủ 6 mặt khi mở hàng.<br>
                                    Mô tả chi tiết trạng thái, lỗi của sản phẩm.<br>
                                </td>
                            </tr>
                            <tr>
                                <td>Laptop</td>
                                <td>Trong 7 ngày</td>
                                <td>
                                    Trả hàng trong 7 ngày kể từ khi nhận hàng, miễn phí.<br>
                                    Có video, hình ảnh đủ 6 mặt khi mở hàng.<br>
                                    Mô tả chi tiết trạng thái, lỗi của sản phẩm.<br>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="footer_table_content">
                        <h5><u>Điều kiện trả hàng:</u></h5>
                        <div>
                            <p>Máy: Hỏng hoặc không đúng với mô tả sản phẩm.</p>
                            <p>Phụ kiện : Không đầy đủ, nguyên vẹn.</p>
                            <p>Tài khoản: Máy đã được đăng xuất khỏi tất cả các tài khoản như: iCloud, Google </p>
                        </div>
                    </div>
                </div>
                <hr style="margin-top: 15px;">
                <div class="technology">
                    <div class="technology_search technology_news">
                        <h4 style="margin-bottom:0">Tin công nghệ</h4>
                        <form class="search_blog" action="" method="GET">
                            <input type="search" placeholder="Tìm kiếm bài viết">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="technology_content">
                        <div class="row_news">
                            <div class="col_news">
                                <img src="/images/16pro.jpg" alt="Image 1">
                                <p class="mt-3">Trường ĐH Sư phạm, ĐH Huế đăng cai tổ chức hội thảo khoa học quốc
                                    gia về công nghệ thông tin (CNTT)</p>
                            </div>
                            <div class="col_news">
                                <img src="/images/16pro.jpg" alt="Image 1">
                                <p class="mt-3">Thay đổi tiêu chuẩn chủ nhiệm đề tài khoa học và công nghệ cấp bộ
                                </p>
                            </div>
                            <div class="col_news">
                                <img src="/images/16pro.jpg" alt="Image 1">
                                <p class="mt-3">Thay đổi tiêu chuẩn chủ nhiệm đề tài khoa học và công nghệ cấp bộ
                                </p>
                            </div>
                            <div class="col_news">
                                <img src="/images/16pro.jpg" alt="Image 1">
                                <p class="mt-3">Thay đổi tiêu chuẩn chủ nhiệm đề tài khoa học và công nghệ cấp bộ
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
