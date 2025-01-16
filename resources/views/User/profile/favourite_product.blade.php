@extends('layouts.layouts_user')
@section('title', 'Trang sản phẩm yêu thích')
@section('active_favourite_product', 'active_button')
@section('content')
<div class="container_css" style="padding: 0px 10px;">
    <div class="favourite_product">
        <div class="row_favourite_product">
            @include('user.profile.sidebar')
            <div class="col_favourite_product" style="padding-left: 20px; width: 79%;">
                <div class="col_favourite_product_2">
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <div class="favourite_product_table" style="margin-top: 20px; width: 100%;">
                                <div class="header_favourite_product_table">
                                    <div class="table_item" style="height: 30px;"></div>
                                </div>
                                <div class="body_favourite_product_table">
                                    <div class="table_item" style="padding-left: 5px;"><img
                                            src="{{ asset('images/' . App\Models\ImageProduct::where('product_id', $product->id)->first()->image) }}"
                                            width="100px" alt="image"></div>
                                    <div class="table_item" style="width: 85%;font-size: 16px;">
                                        <div>{{$product->name}}</div>
                                        <div style="opacity: 0.7;font-size: 14px;">
                                            {{App\Models\Category::find(App\Models\Brand::find($product->brand_id)->category_id)->name}}
                                            {{App\Models\Brand::find($product->brand_id)->name}}
                                        </div>
                                        <div style="font-size: 14px;color:#ee4d2d"> {{$product->rating}}<i
                                                style="margin-left:5px" class="fas fa-star"></i>
                                        </div>
                                        <button><a href="{{route('profile.unLike', ['id' => $product->id])}}">Hủy yêu
                                                thích</a></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h5>Bạn chưa yêu thích sản phẩm nào</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection