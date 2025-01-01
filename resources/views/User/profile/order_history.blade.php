@extends('layouts.layouts_user')
@section('title', 'Lịch sử đơn hàng')
@section('content')
    <div class="container_css order">
        <div class="order_history">
            <div class="row_order_history">
                <div class="col_order_history" style="width: 20%;">
                    <div class="col_order_history_1">
                        <div class="item"><a href="testtrangcanhan.html"><i class="fas fa-user"></i>Thông tin cá
                                nhân</a></div>
                        <div class="item"><a href="TrangLichSuDonHang.html"><i class="fas fa-box"></i>Lịch sử đơn
                                hàng</a></div>
                        <div class="item"><a href="trangsanphamyeuthich.html"><i class="fas fa-gift"></i>Sản phẩm
                                yêu thích</a></div>
                        <div class="item"><a href="trangsanphamdanhgia.html"><i class="fas fa-gifts"></i>Sản phẩm đã
                                đánh giá</a></div>
                        <div class="item"><a href="TrangDoiMatKhau.html"><i class="fas fa-unlock-alt"></i>Đổi mật
                                khẩu</a></div>
                    </div>
                </div>
                <div class="col_order_history" style="padding-left: 20px;width: 79%;">
                    <div class="col_order_history_2">
                        <div class="tab">
                            <button class="tablinks"><a href="">Tất cả</a></button>
                            <button class="tablinks"><a href="">Chờ thanh toán</a></button>
                            <button class="tablinks"><a href="">Dang chuẩn bị</a></button>
                            <button class="tablinks"><a href="">Đang giao</a></button>
                            <button class="tablinks"><a href="">Hoàn thành</a></button>
                            <button class="tablinks"><a href="">Đã hủy</a></button>
                            <button class="tablinks"><a href="">Trả hàng/Hoàn tiền</a></button>
                        </div>
                        <form class="search_form" action="" method="" style="margin-bottom: 10px;">
                            <input class="search_form_item" name="search_form_item" type="search"
                                placeholder="Bạn có thể tìm kiếm theo Id hoặc tên sản phẩm" aria-label="Search"
                                style="width: 90%;outline:none">
                            <button class="search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                        <div class="order_table" style="margin-top: 20px;">
                            <div class="header_order_table">
                                <div class="table_item">Mã đơn hàng: #CB001</div>
                                <div class="table_item" style="text-align: right;">Hoàn thành</div>
                            </div>
                            <div class="body_order_table">
                                <div class="table_item" style="padding-left: 5px;"><img src="download.jpg" width="100px"
                                        alt="doremon"></div>
                                <div class="table_item" style="width: 85%;font-size: 16px;">
                                    <div>Laptop MSI Katana 15 B13VEK-252VN i7-13620H | 8GB | 512GB | RTX 4050
                                        6GB|15.6' FHD 144Hz</div>
                                    <div style="opacity: 0.7;font-size: 14px;">Loại sẩn phẩm</div>
                                    <div style="font-size: 14px;">Số lượng</div>
                                </div>
                            </div>
                            <div class="footer_order_table">
                                <div class="table_item">Thành tiền:<span style="font-size: 25px;">19000</span>đ
                                </div>
                                <button class="rattingBtn" onclick="showPopup()">Đánh giá</button>
                            </div>
                        </div>
                        <div class="order_table" style="margin-top: 20px;">
                            <div class="header_order_table">
                                <div class="table_item">Mã đơn hàng: #CB001</div>
                                <div class="table_item" style="text-align: right;">Trạng thái</div>
                            </div>
                            <div class="body_order_table">
                                <div class="table_item" style="padding-left: 5px;"><img src="download.jpg" width="100px"
                                        alt="doremon"></div>
                                <div class="table_item" style="width: 85%;font-size: 16px;">
                                    <div>Laptop MSI Katana 15 B13VEK-252VN i7-13620H | 8GB | 512GB | RTX 4050
                                        6GB|15.6' FHD 144Hz</div>
                                    <div style="opacity: 0.7;font-size: 14px;">Loại sản phẩm</div>
                                    <div style="font-size: 14px;">Số lượng</div>
                                </div>
                            </div>
                            <div class="body_order_table">
                                <div class="table_item" style="padding-left: 5px;"><img src="download.jpg" width="100px"
                                        alt="doremon"></div>
                                <div class="table_item" style="width: 85%;font-size: 16px;">
                                    <div>Laptop MSI Katana 15 B13VEK-252VN i7-13620H | 8GB | 512GB | RTX 4050
                                        6GB|15.6' FHD 144Hz</div>
                                    <div style="opacity: 0.7;font-size: 14px;">Loại sản phẩm</div>
                                    <div style="font-size: 14px;">Số lượng</div>
                                </div>
                            </div>
                            <div class="body_order_table">
                                <div class="table_item" style="padding-left: 5px;"><img src="download.jpg"
                                        width="100px" alt="doremon"></div>
                                <div class="table_item" style="width: 85%;font-size: 16px;">
                                    <div>Laptop MSI Katana 15 B13VEK-252VN i7-13620H | 8GB | 512GB | RTX 4050
                                        6GB|15.6' FHD 144Hz</div>
                                    <div style="opacity: 0.7;font-size: 14px;">Loại sản phẩm</div>
                                    <div style="font-size: 14px;">Số lượng</div>
                                </div>
                            </div>
                            <div class="footer_order_table">
                                <div class="table_item">Thành tiền:<span style="font-size: 25px;">19000</span>đ
                                </div>
                                <button class="rattingBtn" onclick="showPopup()">Hủy đơn hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- popup đánh giá -->
        <div id="popup_order_history" class="popup_order_history">
            <div class="popup_content">
                <span class="close_popup_rating">&times;</span>
                <div class="popup_table">
                    <form class="popup_form" action="" method="">
                        <div class="table_item" style="padding-left: 5px;"><img src="/images/1.jpg" width="100px"
                                alt="MSI">
                        </div>
                        <div class="table_item" id="table_item" style="width: 85%;font-size: 16px;">
                            <div>Laptop MSI Katana 15 B13VEK-252VN i7-13620H | 8GB | 512GB | RTX 4050
                                6GB|15.6' FHD 144Hz</div>
                            <div style="opacity: 0.7;font-size: 14px;">Laptop MSI</div>
                            <div style="font-size: 14px;">x1</div>
                            <div style="font-size: 14px;">Giá: 32 990 000</div>
                            <div class="star-ratting">
                                <input type="hidden" name="point" id="point">
                                <label for="star5" class="fas fa-star point" data-id="1"></label>
                                <label for="star4" class="fas fa-star point" data-id="2"></label>
                                <label for="star3" class="fas fa-star point" data-id="3"></label>
                                <label for="star2" class="fas fa-star point" data-id="4"></label>
                                <label for="star1" class="fas fa-star point" data-id="5"></label>
                            </div>
                            <textarea name="feedback" style="padding:5px 7px" id="" placeholder="Nhập ý kiến của bạn..."></textarea>
                            <button type="submit" style="padding: 5px 20px;">Đánh giá</button>
                        </div>
                    </form>
                    <form class="popup_form" action="" method="">
                        <div class="table_item" style="padding-left: 5px;"><img src="/images/1.jpg" width="100px"
                                alt="MSI">
                        </div>
                        <div class="table_item" id="table_item" style="width: 85%;font-size: 16px;">
                            <div>Laptop MSI Katana 15 B13VEK-252VN i7-13620H | 8GB | 512GB | RTX 4050
                                6GB|15.6' FHD 144Hz</div>
                            <div style="opacity: 0.7;font-size: 14px;">Laptop MSI</div>
                            <div style="font-size: 14px;">x1</div>
                            <div style="font-size: 14px;">Giá: 32 990 000</div>
                            <div class="star-ratting">
                                <input type="hidden" name="point" id="point">
                                <label for="star5" class="fas fa-star point" data-id="1"></label>
                                <label for="star4" class="fas fa-star point" data-id="2"></label>
                                <label for="star3" class="fas fa-star point" data-id="3"></label>
                                <label for="star2" class="fas fa-star point" data-id="4"></label>
                                <label for="star1" class="fas fa-star point" data-id="5"></label>
                            </div>
                            <textarea name="feedback" style="padding:5px 7px" id="" placeholder="Nhập ý kiến của bạn..."></textarea>
                            <button type="submit" style="padding: 5px 20px;">Đánh giá</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function showPopup() {
            const popup_order_history = document.getElementById("popup_order_history");
            const closeBtn = document.querySelector(".close_popup_rating");
            const submitButton = document.getElementById("submit");
            popup_order_history.style.display = "block";

            // Khi nhấn vào dấu "x", ẩn popup
            closeBtn.onclick = function() {
                popup_order_history.style.display = "none";
            }
        }

        // Khi nhấn ra ngoài popup, ẩn popup
        window.onclick = function(event) {
            if (event.target === popup_order_history) {
                popup_order_history.style.display = "none";
            }
        }

        //Khi nhấn số sao 
        const form_rating = document.querySelectorAll('.popup_form  ')

        form_rating.forEach((item) => {
            const divpopup = item.querySelectorAll('#table_item');
            divpopup.forEach(elementdiv => {
                const rating = elementdiv.querySelectorAll('.star-ratting');
                rating.forEach(elementrating => {
                    const label_start = elementrating.querySelectorAll('label');
                    label_start.forEach((p) => {

                        p.onclick = () => {
                            for (let i = 0; i <= 4; i++) {
                                label_start[i].style.color = "black";
                            }
                            for (let i = 0; i < p.dataset.id; i++) {
                                if (label_start[i].style.color !== "red")
                                    label_start[i].style.color = "red";
                                else {
                                    label_start[i].style.color = "black";
                                }
                            }
                            const pointInput = document.getElementById('point');
                            pointInput.value = p.dataset.id;
                            console.log(p.dataset.id);
                        }
                    })
                })
            })

        });
    </script>
@endsection
