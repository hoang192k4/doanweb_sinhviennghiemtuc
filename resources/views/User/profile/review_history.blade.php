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
                        <button class="tablinks">Tất cả</button>
                        <button class="tablinks">5 sao</button>
                        <button class="tablinks">4 sao</button>
                        <button class="tablinks">3 sao</button>
                        <button class="tablinks">2 sao</button>
                        <button class="tablinks">1 sao</button>
                    </div>
                    <div class="rating" id="all">
                        @foreach ($reviews as $review)
                            <div class="ratting_table" style="margin-top: 20px; width: 100%;">
                                <div class="header_ratting_table">
                                    <div class="table_item">{{$review->created_at}}</div>
                                </div>
                                <div class="body_ratting_table">
                                    <div class="table_item" style="padding-left: 5px;"><img
                                            src="{{ asset('images/' . App\Models\ImageProduct::where('product_id', $review->product_id)->first()->image) }}"
                                            width="100px" alt="image"></div>
                                    <div class="table_item" style="width: 85%;font-size: 16px;">
                                        <div>{{App\Models\Product::find($review->product_id)->name}}</div>
                                        <div style="opacity: 0.7;font-size: 14px;">
                                            {{App\Models\Category::find(App\Models\Brand::find(App\Models\Product::find($review->product_id)->brand_id)->category_id)->name}}
                                            {{App\Models\Brand::find(App\Models\Product::find($review->product_id)->brand_id)->name}}
                                        </div>
                                        <div style="font-size: 14px;color:#ee4d2d"> {{$review->point}}<i
                                                style="margin-left:5px" class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer_ratting_table">
                                    <div class="footer_ratting_content">
                                        {{$review->content ? $review->content : 'Không có nội dung'}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="rating" id="5sao" style="display: none;">
                        @foreach ($reviews->where('point', 5.0) as $review)
                            <div class="ratting_table" style="margin-top: 20px; width: 100%;">
                                <div class="header_ratting_table">
                                    <div class="table_item">{{$review->created_at}}</div>
                                </div>
                                <div class="body_ratting_table">
                                    <div class="table_item" style="padding-left: 5px;"><img
                                            src="{{ asset('images/' . App\Models\ImageProduct::where('product_id', $review->product_id)->first()->image) }}"
                                            width="100px" alt="image"></div>
                                    <div class="table_item" style="width: 85%;font-size: 16px;">
                                        <div>{{App\Models\Product::find($review->product_id)->name}}</div>
                                        <div style="opacity: 0.7;font-size: 14px;">
                                            {{App\Models\Category::find(App\Models\Brand::find(App\Models\Product::find($review->product_id)->brand_id)->category_id)->name}}
                                            {{App\Models\Brand::find(App\Models\Product::find($review->product_id)->brand_id)->name}}
                                        </div>
                                        <div style="font-size: 14px;color:#ee4d2d"> {{$review->point}}<i
                                                style="margin-left:5px" class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer_ratting_table">
                                    <div class="footer_ratting_content">
                                        {{$review->content ? $review->content : 'Không có nội dung'}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="rating" id="4sao" style="display: none;">
                        @foreach ($reviews->where('point', 4.0) as $review)
                            <div class="ratting_table" style="margin-top: 20px; width: 100%;">
                                <div class="header_ratting_table">
                                    <div class="table_item">{{$review->created_at}}</div>
                                </div>
                                <div class="body_ratting_table">
                                    <div class="table_item" style="padding-left: 5px;"><img
                                            src="{{ asset('images/' . App\Models\ImageProduct::where('product_id', $review->product_id)->first()->image) }}"
                                            width="100px" alt="image"></div>
                                    <div class="table_item" style="width: 85%;font-size: 16px;">
                                        <div>{{App\Models\Product::find($review->product_id)->name}}</div>
                                        <div style="opacity: 0.7;font-size: 14px;">
                                            {{App\Models\Category::find(App\Models\Brand::find(App\Models\Product::find($review->product_id)->brand_id)->category_id)->name}}
                                            {{App\Models\Brand::find(App\Models\Product::find($review->product_id)->brand_id)->name}}
                                        </div>
                                        <div style="font-size: 14px;color:#ee4d2d"> {{$review->point}}<i
                                                style="margin-left:5px" class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer_ratting_table">
                                    <div class="footer_ratting_content">
                                        {{$review->content ? $review->content : 'Không có nội dung'}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="rating" id="3sao" style="display: none;">
                        @foreach ($reviews->where('point', 3.0) as $review)
                            <div class="ratting_table" style="margin-top: 20px; width: 100%;">
                                <div class="header_ratting_table">
                                    <div class="table_item">{{$review->created_at}}</div>
                                </div>
                                <div class="body_ratting_table">
                                    <div class="table_item" style="padding-left: 5px;"><img
                                            src="{{ asset('images/' . App\Models\ImageProduct::where('product_id', $review->product_id)->first()->image) }}"
                                            width="100px" alt="image"></div>
                                    <div class="table_item" style="width: 85%;font-size: 16px;">
                                        <div>{{App\Models\Product::find($review->product_id)->name}}</div>
                                        <div style="opacity: 0.7;font-size: 14px;">
                                            {{App\Models\Category::find(App\Models\Brand::find(App\Models\Product::find($review->product_id)->brand_id)->category_id)->name}}
                                            {{App\Models\Brand::find(App\Models\Product::find($review->product_id)->brand_id)->name}}
                                        </div>
                                        <div style="font-size: 14px;color:#ee4d2d"> {{$review->point}}<i
                                                style="margin-left:5px" class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer_ratting_table">
                                    <div class="footer_ratting_content">
                                        {{$review->content ? $review->content : 'Không có nội dung'}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="rating" id="2sao" style="display: none;">
                        @foreach ($reviews->where('point', 2.0) as $review)
                            <div class="ratting_table" style="margin-top: 20px; width: 100%;">
                                <div class="header_ratting_table">
                                    <div class="table_item">{{$review->created_at}}</div>
                                </div>
                                <div class="body_ratting_table">
                                    <div class="table_item" style="padding-left: 5px;"><img
                                            src="{{ asset('images/' . App\Models\ImageProduct::where('product_id', $review->product_id)->first()->image) }}"
                                            width="100px" alt="image"></div>
                                    <div class="table_item" style="width: 85%;font-size: 16px;">
                                        <div>{{App\Models\Product::find($review->product_id)->name}}</div>
                                        <div style="opacity: 0.7;font-size: 14px;">
                                            {{App\Models\Category::find(App\Models\Brand::find(App\Models\Product::find($review->product_id)->brand_id)->category_id)->name}}
                                            {{App\Models\Brand::find(App\Models\Product::find($review->product_id)->brand_id)->name}}
                                        </div>
                                        <div style="font-size: 14px;color:#ee4d2d"> {{$review->point}}<i
                                                style="margin-left:5px" class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer_ratting_table">
                                    <div class="footer_ratting_content">
                                        {{$review->content ? $review->content : 'Không có nội dung'}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="rating" id="1sao" style="display: none;">
                        @foreach ($reviews->where('point', 1.0) as $review)
                            <div class="ratting_table" style="margin-top: 20px; width: 100%;">
                                <div class="header_ratting_table">
                                    <div class="table_item">{{$review->created_at}}</div>
                                </div>
                                <div class="body_ratting_table">
                                    <div class="table_item" style="padding-left: 5px;"><img
                                            src="{{ asset('images/' . App\Models\ImageProduct::where('product_id', $review->product_id)->first()->image) }}"
                                            width="100px" alt="image"></div>
                                    <div class="table_item" style="width: 85%;font-size: 16px;">
                                        <div>{{App\Models\Product::find($review->product_id)->name}}</div>
                                        <div style="opacity: 0.7;font-size: 14px;">
                                            {{App\Models\Category::find(App\Models\Brand::find(App\Models\Product::find($review->product_id)->brand_id)->category_id)->name}}
                                            {{App\Models\Brand::find(App\Models\Product::find($review->product_id)->brand_id)->name}}
                                        </div>
                                        <div style="font-size: 14px;color:#ee4d2d"> {{$review->point}}<i
                                                style="margin-left:5px" class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer_ratting_table">
                                    <div class="footer_ratting_content">
                                        {{$review->content ? $review->content : 'Không có nội dung'}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection