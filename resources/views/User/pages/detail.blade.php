@extends('layouts.layouts_user')
@section('title', 'Trang chi tiết sản phẩm')
@section('content')
    @php
       $seach = DB::table('products')
        ->join('brands','brand_id','=','brands.id')
        ->join('categories','category_id','=','categories.id')
        ->select('products.name as product','categories.name as category','brands.name as brand','categories.slug')
        ->where('products.slug',$slug)
        ->first();
    @endphp

        <div style="background-color: rgb(241, 240, 241);">
            <div class="container_css product_detail_top_url">
                <ul>
                    @if($seach)
                        <li><a href="">Trang chủ</a></li>
                        <li><a href="{{ route('timkiemsanpham', ['slug' =>$seach->slug]) }}">{{ $seach->category }}</a></li> <!-- Truy xuất đúng tên trường -->
                        <li><a href="{{ route('timkiemsanpham', ['slug' =>$seach->slug,'id'=>$seach->brand]) }}">{{ $seach->brand }}</a></li>
                        <li><a href="{{route('detail',$slug)}}">{{ $seach->product }}</a></li>
                    @endif
                </ul>
            </div>
        </div>
    <!-- Chi tiết sản phẩm -->
    <section class="container_css" style="padding:10px;">
        <div class="product_detail">
            <div class="product_detail_left">
                <div id="carouselExampleIndicators" class="carousel slide carousel-dark" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($danhSachAnh as $index => $anh)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ asset('images/' . $anh->image) }}" class="d-block" alt="Lỗi hiển thị">
                            </div>
                        @endforeach

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="product_detail_left_img" style="border-radius: 5px  ">
                    @foreach ($danhSachAnh as $index => $anh)
                            <div>
                                <img id="img" src="{{ asset('images/' . $anh->image) }}"alt="Lỗi hiển thị" type="button" class="{{ $index === 0 ? 'active' : '' }}"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$index}}" aria-label="Slide {{$index+1}}">
                            </div>
                        @endforeach
                    <div>
                    </div>
                </div>
            </div>

            <div class="product_detail_right">
                <div class="product_detail_right_interact">
                    @auth
                        <p id="button_like"><i class="fas fa-heart" id="icon_like"></i>Yêu thích
                        </p>
                    @endauth
                    <p id="button_like"><i class="fas fa-heart" id="icon_like"></i>Yêu thích
                    </p>
                    <p><i class="fas fa-thumbs-up"></i>{{$luotThichSanPham}} lượt thích</p>
                    <p><i class="fas fa-eye"></i>{{$thongTinSanPham->views}}</p>
                </div>
                <h4>{{$thongTinSanPham->name}}</h4>
                <div class="product_detail_right_price">
                    <p>Giá bán: <Span id="price"> {{ number_format($mauSanPham[0]->price, 0, ',', '.') }}<sup>đ</sup></Span></p>
                    <h5 id="status">{{$mauSanPham[0]->stock > 0 ?'(Còn hàng)':'(Hết hàng)'}}</h5>
                </div>
                <h5 style="margin-bottom: 0; font-weight: 100; color: #a7a7a7;">Dung lượng</h5>
                <div class="product_detail_right_ram">
                    @foreach ($danhSachBoNho as $index => $boNho)
                        <a href="{{route("ChiTietSanPhamTheoBoNho",['slug'=>$slug,'internal_memory'=>$boNho->internal_memory])}}" class="{{$index == 0 ? "color_active":''}}">
                            <span>{{$boNho->internal_memory}}</span>
                            <p> {{ number_format($boNho->price, 0, ',', '.') }}<sup>đ</sup></p>
                        </a>
                    @endforeach
                </div>
                <h5 style="margin-top:10px; font-weight: 100;color:#a7a7a7">Màu sắc</h5>
                <div class="product_detail_right_color">
                    @foreach ( $mauSanPham as $index => $mau)
                    <button onclick="LayThongTinSanPhamTheoMau('{{route('LayThongTinSanPhamTheoMau',['slug'=>$slug,'internal_memory'=>$mau->internal_memory,'color'=>$mau->color])}}',this)" class="{{$index == 0 ? 'color_active':''}}">
                        <img src="{{asset('images/'.$mau->image)}}" alt="Lỗi hiển thị">
                        <span>
                            <p>{{$mau->color}}</p>
                            <span> {{ number_format($mau->price, 0, ',', '.') }}<sup>đ</sup></span>
                        </span>
                    </button>
                    @endforeach
                </div>
                <div class="product_detail_right_quantity">
                    <p>Cửa hàng hiện có <span id="stock">{{$mauSanPham[0]->stock}}</span> sản phẩm</p>
                    <div>
                        <button id="button_minus_value"><i class="fas fa-minus"></i></button>
                        <input type="text" id="number_input" min="1" value="1">
                        <button id="button_plus_value"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="product_detail_right_buy">
                    <div><button>Mua ngay</button></div>
                    <div><button id="add-to-cart" onclick="addToCart(this.dataset.id)" data-id="{{$mauSanPham[0]->id}}"> Thêm giỏ hàng<i class="fas fa-cart-plus" style="margin-left:5px;"></i></button></div>
                </div>
            </div>
        </div>
        <div class="product_detail detail_bottom">
            <div class="product_detail_bottom_left">
                <div class="product_detail_bottom_left_rating">
                    <div>
                        <a href="">
                            <p>4.9 / 5</p>
                            <p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </p>
                        </a>
                    </div>
                    <div id="button_rating">
                        <button class="click_active_border">Tất cả</button>
                        <button>5 sao (248)</button>
                        <button>4 sao (515)</button>
                        <button>3 sao (211)</button>
                        <button>2 sao (85)</button>
                        <button>1 sao (3)</button>
                    </div>
                </div>
                <div class="product_detail_bottom_left_comments">
                    <div class="product_detail_bottom_left_comment">
                        <div>
                            <button><img src="images/user_commet1.jpg" alt=""></button>
                            <div>Nguyễn Thùy Anh thư
                                <p>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </p>
                            </div>
                            <p><i class="fas fa-clock"></i>11/29/2024 11:11</p>
                        </div>
                        <div>
                            <p>Điện thoại khá đẹp tôi sẽ quay lại mua nữa</p>
                            <div>
                                <img src="images/detail2.png" alt="">
                                <img src="images/detail3.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="product_detail_bottom_left_comment">
                        <div>
                            <button><img src="images/user_comment2.jpg" alt=""></button>
                            <div>Nguyễn Quốc Đô
                                <p>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </p>
                            </div>
                            <p><i class="fas fa-clock"></i>11/29/2024 11:11</p>
                        </div>
                        <div>
                            <p>Giao hàng nhanh.Shipper tận tình, shop khá uy tính tôi sẽ giới thiệu cho bạn tôi để có thể
                                mua ủng hộ shop nhiều hơn</p>
                            <div>
                                <img src="images/detail2.png" alt="">
                                <img src="images/detail3.png" alt="">
                            </div>
                        </div>
                    </div>
                    <button>Xem thêm</button>
                </div>
                <div class="product_detail_bottom_left_desription">
                    <h6>Mô tả sản phẩm</h6>
                    <p>{{$thongTinSanPham->description}}</p>
                </div>
            </div>

            <div class="product_detail_bottom_right">
                <h4><a href="">Thông Số Kỹ Thuật</a></h4>
                <ul>
                    <li>
                        <div>Kích thước màn hình</div>
                        <div>{{$thongSoKiThuatSanPham->display}}</div>
                    </li>
                    <li>
                        <div>Công nghệ màn hình</div>
                        <div>{{$thongSoKiThuatSanPham->technic_screen}}</div>
                    </li>
                    <li>
                        <div>Độ phân giải</div>
                        <div>{{$thongSoKiThuatSanPham->resolution}}</div>
                    </li>
                    <li>
                        <div>Chipset</div>
                        <div>{{$thongSoKiThuatSanPham->chipset}}</div>
                    </li>
                    <li>
                        <div>RAM</div>
                        <div>{{$thongSoKiThuatSanPham->ram}}</div>
                    </li>
                    <li>
                        <div>Camera</div>
                        <div>{{$thongSoKiThuatSanPham->camera}}</div>
                    </li>
                    <li>
                        <div>Hệ điều hành</div>
                        <div>{{$thongSoKiThuatSanPham->operating_system}}</div>
                    </li>
                    <li>
                        <div>Kích thước</div>
                        <div>{{$thongSoKiThuatSanPham->size}}</div>
                    </li>
                    <li>
                        <div>Thời điểm ra mắt</div>
                        <div>{{date("d-m-Y", strtotime($thongSoKiThuatSanPham->launch_time))}}</div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Sản phẩm tương tự -->
    <section class="container_css product_best_seller">
        <h4>ĐIỆN THOẠI NỔI BẬT NHẤT</h4>
        <div id="carouselExampleInterval" class="carousel slide carousel-dark" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <div class="product_best_seller_items">

                        @if (isset($sanPhamTuongTu))
                            @for ($i = 0; $i < count($sanPhamTuongTu); $i++)
                                @if ($i > 3)
                                @break
                            @endif
                            <div class="product_best_seller_item">
                                <a href="{{route('detail',[$sanPhamTuongTu[$i]->slug])}}"><img src="{{ asset('images/' . $sanPhamTuongTu[$i]->image) }}"
                                        alt="Lỗi hiển thị"></a>
                                <div class="product_best_seller_item_info">
                                    <ul>
                                        <li><a href="{{route('detail',[$sanPhamTuongTu[$i]->slug])}}">{{ $sanPhamTuongTu[$i]->name }}</a></li>
                                        <li>{{ number_format($sanPhamTuongTu[$i]->price, 0, ',', '.') }}<sup>đ</sup>
                                        </li>
                                        <li>{{ $sanPhamTuongTu[$i]->rating }} <i class="fas fa-star"></i></li>
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
            @if (isset($sanPhamTuongTu) && count($sanPhamTuongTu) > 4)
                <div class="carousel-item" data-bs-interval="2000">
                    <div class="product_best_seller_items">
                        @for ($i = 4; $i < 8; $i++)
                            <div class="product_best_seller_item">
                                <a href="{{route('detail',[$sanPhamTuongTu[$i]->slug])}}"><img src="{{ asset('images/' . $sanPhamTuongTu[$i]->image) }}"
                                        alt="Lỗi hiển thị"></a>
                                <div class="product_best_seller_item_info">
                                    <ul>
                                        <li><a href="{{route('detail',[$sanPhamTuongTu[$i]->slug])}}">{{ $sanPhamTuongTu[$i]->name }}</a></li>
                                        <li>{{ number_format($sanPhamTuongTu[$i]->price, 0, ',', '.') }}<sup>đ</sup>
                                        </li>
                                        <li>{{ $sanPhamTuongTu[$i]->rating }} <i class="fas fa-star"></i></li>
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
@endsection
@section('script')
    <script>
        function addToCart(id)
        {
            const quantity = $('#number_input').val();
            $.ajax({
                method:"GET",
                url:`/add-to-cart/${id}/${quantity}`
            }).done((data)=>{
                $('#cart-quantity').text(`${data.cart.totalQuantity}`);
                alertify.success(data.message);
            })
        }
    </script>
    <script>
        document.getElementById('number_input').addEventListener('change', function() {
            const stock = document.getElementById('stock').value

        });
        function LayThongTinSanPhamTheoMau(url,btn)
        {
            const button_color = document.querySelectorAll('.product_detail_right_color button')
            if (button_color) {
                button_color.forEach(element => {
                    {
                        button_color.forEach(btn => btn.classList.remove('color_active'));
                    }
                })
            }
            btn.classList.add('color_active');
            $.ajax({
                type: "GET",
                url: url,
                data: "data",
                dataType: "json",
                success: function (response) {
                    $('#stock').text(response.stock);
                    const price = new Intl.NumberFormat('de-DE').format(response.price);
                    if(response.stock>0){
                        $('#status').text('(Còn hàng)');
                    }
                    else{
                        $('#status').text('(Hết hàng)');
                    }
                    $('#price').text(price);
                    //$('.carousel-item.active img.d-block').attr('src', '/image/'.response.image);

                    document.getElementById('add-to-cart').dataset.id=`${response.variant_id}`;
                }
            });
        }
    </script>
@endsection
