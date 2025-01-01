@extends('layouts.layouts_user')
@section('title', 'Lịch sử đánh giá')
@section('content')
<div class="container_css" style="padding: 0px 10px;">
    <div class="ratting">
        <div class="row_ratting">
          @include('user.profile.sidebar')
            <div class="col_ratting" style="padding-left: 20px; width: 79%;">
                <div class="col_ratting_2">
                    <div class="tab">
                        <button class="tablinks" onclick="">Tất cả</button>
                        <button class="tablinks" onclick="">5 sao</button>
                        <button class="tablinks" onclick="">4 sao</button>
                        <button class=" tablinks" onclick="">3 sao</button>
                        <button class="tablinks" onclick="">2 sao</button>
                        <button class="tablinks" onclick="">1 sao</button>
                        <button class="tablinks" onclick="">Chưa đánh giá</button>
                    </div>
                    <form class="search_form" action="" method="" style="margin-bottom: 10px;">
                        <input class="search_form_item" name="search_form_item" type="search"
                            placeholder="Bạn có thể tìm kiếm theo Id hoặc tên sản phẩm" aria-label="Search"
                            style="width: 90%; outline:none">
                        <button class="search" type="submit"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <div class="ratting_table" style="margin-top: 20px; width: 100%;">
                        <div class="header_ratting_table">
                            <div class="table_item">Mã đơn hàng: #CB001</div>
                            <div class="table_item" style="text-align: right;">Đã đánh giá</div>
                        </div>
                        <div class="body_ratting_table">
                            <div class="table_item" style="padding-left: 5px;"><img src="download.jpg"
                                    width="100px" alt="doremon"></div>
                            <div class="table_item" style="width: 85%;font-size: 16px;">
                                <div>Laptop MSI Katana 15 B13VEK-252VN i7-13620H | 8GB | 512GB | RTX 4050
                                    6GB|15.6' FHD 144Hz</div>
                                <div style="opacity: 0.7;font-size: 14px;">Loại sản phẩm</div>
                                <div style="font-size: 14px;">Số lượng</div>
                            </div>
                        </div>
                        <div class="footer_ratting_table">
                            <div class="footer_ratting_content">Mài mài mài mài mài mài mài mài mài mài mài mài
                                mài mài mài mài mài mài mài mài
                            </div>
                        </div>
                    </div>
                    <div class="ratting_table" style="margin-top: 20px; width: 100%;">
                        <div class="header_ratting_table">
                            <div class="table_item">Mã đơn hàng: #CB001</div>
                            <div class="table_item" style="text-align: right;">Đã đánh giá</div>
                        </div>
                        <div class="body_ratting_table">
                            <div class="table_item" style="padding-left: 5px;"><img src="download.jpg"
                                    width="100px" alt="doremon"></div>
                            <div class="table_item" style="width: 85%;font-size: 16px;">
                                <div>Laptop MSI Katana 15 B13VEK-252VN i7-13620H | 8GB | 512GB | RTX 4050
                                    6GB|15.6' FHD 144Hz</div>
                                <div style="opacity: 0.7;font-size: 14px;">Loại sẩn phẩm</div>
                                <div style="font-size: 14px;">Số lượng</div>
                            </div>
                        </div>
                        <div class="footer_ratting_table">
                            <div class="footer_ratting_content">Không có nội dung
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
