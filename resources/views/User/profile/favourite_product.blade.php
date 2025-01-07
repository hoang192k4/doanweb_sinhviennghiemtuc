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
                    @foreach ($products as $product)
                        <div class="favourite_product_table" style="margin-top: 20px; width: 100%;">
                            <div class="header_favourite_product_table">
                                <div class="table_item">Mã sản phẩm: #CB031</div>
                                <div class="table_item" style="text-align: right;"></div>
                            </div>
                            <div class="body_favourite_product_table">
                                <div class="table_item" style="padding-left: 5px;"><img src="/images/1.jpg" width="100px"
                                        alt="MSI"></div>
                                <div class="table_item" style="width: 85%;font-size: 16px;">
                                    <div>{{$product->name}}</div>
                                    <div style="opacity: 0.7;font-size: 14px;">
                                        {{App\Models\Category::find(App\Models\Brand::find($product->brand_id)->category_id)->name}}
                                        {{App\Models\Brand::find($product->brand_id)->name}}
                                    </div>
                                    <div style="font-size: 14px;color:#ee4d2d"> {{$product->rating}}<i
                                            style="margin-left:5px" class="fas fa-star"></i>
                                    </div>
                                    <button><a href="{{route('profile.unLike', ['id' => $product->id])}}">Hủy yêu thích</a></button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection