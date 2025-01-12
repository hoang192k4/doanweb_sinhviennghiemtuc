@extends('layouts.layouts_user')
@section('title', 'Trang chủ')
@section('content')
    <!-- slideshow -->
    <section class="container_css main_slideshow">
        <div class="main_slideshow_left">
            <div id="carouselExampleControls" class="carousel carousel-success slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href=""><img src="images/banner1.png" class="d-block w-100" style="height: 305px"
                                alt="Lỗi hiển thị"></a>
                    </div>
                    <div class="carousel-item">
                        <a href=""><img src="images/banner2.png" class="d-block w-100" style="height: 305px;"
                                alt="Lỗi hiển thị"></a>
                    </div>
                    <div class="carousel-item">
                        <a href=""><img src="images/banner3.png" class="d-block w-100" style="height: 305px;"
                                alt="Lỗi hiển thị"></a>
                    </div>
                    <div class="carousel-item">
                        <a href=""><img src="images/banner4.png" class="d-block w-100" style="height: 305px;"
                                alt="Lỗi hiển thị"></a>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="main_slideshow_right">
            <div class="main_slideshow_right_items">
                <div class="main_slideshow_right_item">
                    <div class="main_slideshow_right_item_img">
                        <a href=""><img src="images/slider_right1.png" alt="Lỗi hiển thị"></a>
                    </div>
                    <div class="main_slideshow_right_item_img">
                        <a href=""><img src="images/slide_right_2.png" alt="Lỗi hiển thị"></a>
                    </div>
                    <div class="main_slideshow_right_item_img">
                        <a href=""><img src="images/slider_right3.png" alt="Lỗi hiển thị"></a>
                    </div>
                    <div class="main_slideshow_right_item_img">
                        <a href=""><img src="images/slider_right4.png" alt="Lỗi hiển thị"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Thương hiệu -->
    <section class="container_css main_branch ">
        <h4>THƯƠNG HIỆU NỔI BẬT</h4>
        <div class="list_branch">
            @foreach ($thuongHieu as $item)
                <a href="{{ route('timkiemsanpham', ['slug' => $item->name]) }}"><img
                        src="{{ asset('images/' . $item->image) }}" alt="Lỗi hiển thị"></a>
            @endforeach
        </div>
    </section>

    <!-- Điện thoại bán chạy -->
    <section class="container_css product_best_seller">
        <h4>ĐIỆN THOẠI NỔI BẬT NHẤT</h4>
        <div id="carouselExampleInterval" class="carousel slide carousel-dark" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <div class="product_best_seller_items">
                        @if (isset($danhSachDTHot))
                            @for ($i = 0; $i < count($danhSachDTHot); $i++)
                                @if ($i > 3)
                                @break
                            @endif
                            <div class="product_best_seller_item">
                                <a href="{{ route('detail', [$danhSachDTHot[$i]->slug]) }}"><img
                                        src="{{ asset('images/' . $danhSachDTHot[$i]->image) }}" alt="Lỗi hiển thị"></a>
                                <div class="product_best_seller_item_info">
                                    <ul>
                                        <li><a
                                                href="{{ route('detail', [$danhSachDTHot[$i]->slug]) }}">{{ $danhSachDTHot[$i]->name }}</a>
                                        </li>
                                        <li>{{ number_format($danhSachDTHot[$i]->price, 0, ',', '.') }}<sup>đ</sup>
                                        </li>
                                        <li>{{ $danhSachDTHot[$i]->rating }} <i class="fas fa-star"></i></li>
                                        <li>
                                            <a href=""><button>Mua ngay</button></a>
                                            <div><a href=""><i class="fas fa-cart-plus"></i></a></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endfor
                    @endif
                </div>
            </div>
            @if (isset($danhSachDTHot) && count($danhSachDTHot) > 4)
                <div class="carousel-item" data-bs-interval="2000">
                    <div class="product_best_seller_items">
                        @for ($i = 4; $i < count($danhSachDTHot); $i++)
                            <div class="product_best_seller_item">
                                <a href="{{ route('detail', [$danhSachDTHot[$i]->slug]) }}"><img
                                        src="{{ asset('images/' . $danhSachDTHot[$i]->image) }}"
                                        alt="Lỗi hiển thị"></a>
                                <div class="product_best_seller_item_info">
                                    <ul>
                                        <li><a
                                                href="{{ route('detail', [$danhSachDTHot[$i]->slug]) }}">{{ $danhSachDTHot[$i]->name }}</a>
                                        </li>
                                        <li>{{ number_format($danhSachDTHot[$i]->price, 0, ',', '.') }}<sup>đ</sup>
                                        </li>
                                        <li>{{ $danhSachDTHot[$i]->rating }} <i class="fas fa-star"></i></li>
                                        <li>
                                            <a href=""><button>Mua ngay</button></a>
                                            <div><a href=""><i class="fas fa-cart-plus"></i></a></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            @else
        </div>
        @endif
    </div>
</section>



<!-- Laptop mới nhất -->
<section class="container_css product_lt_new">
    <h4>LAPTOP MỚI NHẤT</h4>
    <div id="carouselExampleControlsNoTouching" class="carousel slide carousel-dark" data-bs-touch="false"
        data-bs-interval="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="product_lt_new_items">
                    @if (isset($danhSachLapTopMoi))
                        @for ($i = 0; $i < count($danhSachLapTopMoi); $i++)
                            @if ($i > 3)
                            @break
                        @endif
                        <div class="product_lt_new_item">
                            <a href="{{ route('detail', [$danhSachLapTopMoi[$i]->slug]) }}"><img
                                    src="{{ asset('images/' . $danhSachLapTopMoi[$i]->image) }} "
                                    alt="Lỗi hiển thị"></a>
                            <div class="product_lt_new_item_info">
                                <ul>
                                    <li><a href="">{{ $danhSachLapTopMoi[$i]->name }}</a></li>
                                    <li>{{ number_format($danhSachLapTopMoi[$i]->price, 0, ',', '.') }}
                                        <sup>đ</sup>
                                    </li>
                                    <li>{{ $danhSachLapTopMoi[$i]->rating }}<i class="fas fa-star"></i></li>
                                    <li>
                                        <a href=""><button>Mua ngay</button></a>
                                        <div><a href=""><i class="fas fa-cart-plus"></i></a></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
        </div>
        @if (isset($danhSachLapTopMoi) && count($danhSachLapTopMoi) > 4)
            <div class="carousel-item">
                <div class="product_lt_new_items">
                    @for ($i = 4; $i < count($danhSachLapTopMoi); $i++)
                        <div class="product_lt_new_item">
                            <a href=""><img src="{{ asset('images/' . $danhSachLapTopMoi[$i]->image) }} "
                                    alt="Lỗi hiển thị"></a>
                            <div class="product_lt_new_item_info">
                                <ul>
                                    <li><a href="">{{ $danhSachLapTopMoi[$i]->name }}</a></li>
                                    <li>{{ number_format($danhSachLapTopMoi[$i]->price, 0, ',', '.') }}
                                        <sup>đ</sup>
                                    </li>
                                    <li>{{ $danhSachLapTopMoi[$i]->rating }}<i class="fas fa-star"></i></li>
                                    <li>
                                        <a href=""><button>Mua ngay</button></a>
                                        <div><a href=""><i class="fas fa-cart-plus"></i></a></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <button class="carousel-control-prev" type="button"
                data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button"
                data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        @else
    </div>
    @endif
</div>
</section>
{{-- Hiển thị thông tin dịch vụ bán hàng, vận chuyển --}}
@include('user.partials.service')
@guest
@if (session('error'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            handleLoginAuth();
        });
    </script>
@endif
@endguest
@endsection
