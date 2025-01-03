@extends('layouts.layouts_user')
@section('title', 'Trang sản phẩm yêu thích')
@section('content')
    <div class="container_css" style="padding: 0px 10px;">
        <div class="favourite_product">
            <div class="row_favourite_product">
                @include('user.profile.sidebar')
                <div class="col_favourite_product" style="padding-left: 20px; width: 79%;">
                    <div class="col_favourite_product_2">
                        <form class="search_form" action="" method="" style="margin-bottom: 10px;">
                            <input class="search_form_item" name="search_form_item" type="search"
                                placeholder="Bạn có thể tìm kiếm theo Id hoặc tên sản phẩm" aria-label="Search"
                                style="width: 90%;">
                            <button class="search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                        <div class="favourite_product_table" style="margin-top: 20px; width: 100%;">
                            <div class="header_favourite_product_table">
                                <div class="table_item">Mã sản phẩm: #CB031</div>
                                <div class="table_item" style="text-align: right;"></div>
                            </div>
                            <div class="body_favourite_product_table">
                                <div class="table_item" style="padding-left: 5px;"><img src="/images/1.jpg" width="100px"
                                        alt="MSI"></div>
                                <div class="table_item" style="width: 85%;font-size: 16px;">
                                    <div>Laptop MSI Katana 15 B13VEK-252VN i7-13620H | 8GB | 512GB | RTX 4050
                                        6GB|15.6' FHD 144Hz</div>
                                    <div style="opacity: 0.7;font-size: 14px;">Laptop MSI</div>
                                    <div style="font-size: 14px;">x1</div>
                                    <div style="font-size: 14px;">Giá: 32 990 000</div>
                                    <div style="font-size: 14px;color:#ee4d2d"> 4.5<i style="margin-left:5px" class="fas fa-star"></i>
                                    </div>
                                    <button><a href="">Hủy yêu thích</a></button>
                                </div>
                            </div>
                        </div>
                        <div class="favourite_product_table" style="margin-top: 20px; width: 100%;">
                            <div class="header_favourite_product_table">
                                <div class="table_item">Mã sản phẩm: #CB035</div>
                                <div class="table_item" style="text-align: right;"></div>
                            </div>
                            <div class="body_favourite_product_table">
                                <div class="table_item" style="padding-left: 5px;"><img src="images/asus.jpg" width="100px"
                                        alt="Asus"></div>
                                <div class="table_item" style="width: 85%;font-size: 16px;">
                                    <div>Laptop MSI Katana 15 B13VEK-252VN i7-13620H | 8GB | 512GB | RTX 4050
                                        6GB|15.6' FHD 144Hz</div>
                                    <div style="opacity: 0.7;font-size: 14px;">Laptop MSI</div>
                                    <div style="font-size: 14px;">x1</div>
                                    <div style="font-size: 14px;">Giá: 32 990 000</div>
                                    <div style="font-size: 14px;color:#ee4d2d"> 4.5<i style="margin-left:5px" class="fas fa-star"></i>
                                    </div>
                                    <button><a href="">Hủy yêu thích</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
