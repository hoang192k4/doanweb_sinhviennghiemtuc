@extends('layouts.layouts_user')
@section('title', 'Trang chi tiết sản phẩm')
@section('content')
    @php
        $seach = DB::table('products')
            ->join('brands', 'brand_id', '=', 'brands.id')
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select(
                'products.name as product',
                'categories.name as category',
                'brands.name as brand',
                'categories.slug',
            )
            ->where('products.slug', $slug)
            ->first();
        if (Auth::check()) {
            $yeuthich = DB::table('like_products')
                ->where('product_id', $thongTinSanPham->id)
                ->where('user_id', Auth::user()->id)
                ->count();
        }

    @endphp
    <div style="background-color: rgb(241, 240, 241);">
        <div class="container_css product_detail_top_url">
            <ul>

                @if ($seach)
                    <li><a href="{{ route('user.index') }}">Trang chủ</a></li>
                    <li><a href="{{ route('timkiemsanpham', ['slug' => $seach->slug]) }}">{{ $seach->category }}</a></li>
                    <!-- Truy xuất đúng tên trường -->
                    <li><a
                            href="{{ route('timkiemsanpham', ['slug' => $seach->slug, 'id' => $seach->brand]) }}">{{ $seach->brand }}</a>
                    </li>
                    <li><a href="{{ route('detail', $slug) }}">{{ $seach->product }}</a></li>
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
                        @php
                            $index = 0;
                        @endphp
                        @foreach ($danhSachAnh as $anh)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ asset('images/' . $anh->image) }}" class="d-block" alt="Lỗi hiển thị">
                            </div>
                            @php
                                $index++;
                            @endphp
                        @endforeach
                        @foreach ($danhSachAnhVariant as $anh)
                            <div class="carousel-item" id="{{ $anh->id }}">
                                <img src="{{ asset('images/' . $anh->image) }}" class="d-block" alt="Lỗi hiển thị">
                            </div>
                            @php
                                $index++;
                            @endphp
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
                <div class="product_detail_left_img" style="border-radius: 5px;">
                    @php
                        $index_2 = 0;
                    @endphp
                    @foreach ($danhSachAnh as $anh)
                        <div>
                            <img id="img" src="{{ asset('images/' . $anh->image) }}" alt="Lỗi hiển thị"
                                type="button" class="{{ $index_2 === 0 ? 'active' : '' }}"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index_2 }}"
                                aria-label="Slide {{ $index_2 + 1 }}">
                        </div>
                        @php
                            $index_2++;
                        @endphp
                    @endforeach
                    @foreach ($danhSachAnhVariant as $anh)
                        <div>
                            <img id="{{ $anh->id }}" src="{{ asset('images/' . $anh->image) }}" alt="Lỗi hiển thị"
                                type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="{{ $index_2 }}" aria-label="Slide {{ $index_2 + 1 }}">
                        </div>
                        @php
                            $index_2++;
                        @endphp
                    @endforeach
                </div>
            </div>
            <div class="product_detail_right">
                <div class="product_detail_right_interact">
                    @auth
                        @if (Auth::user()->role == 'KH')
                            <p id="button_like"
                                onclick="CapNhatYeuThich('{{ $thongTinSanPham->id }}','{{ Auth::user()->id }}')"
                                style="color: {{ $yeuthich == 1 ? 'red' : 'grey' }}"><i class="fas fa-heart"
                                    id="icon_like"></i>Yêu thích
                            </p>
                        @endif
                    @endauth
                    <p><i class="fas fa-thumbs-up"></i><span id="number_like">{{ $luotThichSanPham }}</span> lượt thích</p>
                    <p><i class="fas fa-eye"></i>{{ $thongTinSanPham->views }}</p>
                </div>
                <h4>{{ $thongTinSanPham->name }}</h4>
                @if (isset($mauSanPham[0]))
                    <div class="product_detail_right_price">
                        <p>Giá bán: <Span> <span
                                    id="price">{{ number_format($mauSanPham[0]->price, 0, ',', '.') }}</span>
                                <sup>đ</sup></Span></p>
                        <h5 id="status">{{ $mauSanPham[0]->stock > 0 ? '(Còn hàng)' : '(Hết hàng)' }}</h5>
                    </div>
                    <h5 style="margin-bottom: 0; font-weight: 100; color: #a7a7a7;">Dung lượng</h5>
                    <div class="product_detail_right_ram">
                        @foreach ($danhSachBoNho as $index => $boNho)
                            <button class="{{ $index == 0 ? 'color_active' : '' }}"
                                onclick="DanhSachMau('{{ Route('LayMauSanPhamTheoBoNho', ['slug' => $slug, 'internal_memory' => $boNho->internal_memory]) }}',this)">
                                <span>{{ $boNho->internal_memory }}</span>
                                {{-- <p> {{ number_format($boNho->price, 0, ',', '.') }}<sup>đ</sup></p> --}}
                            </button>
                        @endforeach
                    </div>
                    <h5 style="margin-top:10px; font-weight: 100;color:#a7a7a7">Màu sắc</h5>
                    <div class="product_detail_right_color" id="product_detail_right_color">
                        @foreach ($mauSanPham as $index => $mau)
                            <button class="{{ $index == 0 ? 'color_active' : '' }}"
                                onclick="LayThongTinSanPhamTheoMau('{{ $slug }}','{{ $mau->internal_memory }}','{{ $mau->color }}',this)">
                                <img src="{{ asset('images/' . $mau->image) }}" alt="Lỗi hiển thị">
                                <span>
                                    <p>{{ $mau->color }}</p>
                                    <span> {{ number_format($mau->price, 0, ',', '.') }}<sup>đ</sup></span>
                                </span>
                            </button>
                        @endforeach
                    </div>
                    <div class="product_detail_right_quantity">
                        <p>Cửa hàng hiện có <span id="stock">{{ $mauSanPham[0]->stock }}</span> sản phẩm</p>
                        <div>
                            <button id="button_minus_value" data-id="{{ $mauSanPham[0]->id }}"
                                onclick="minus(this.dataset.id)"><i class="fas fa-minus"></i></button>
                            <input type="text" id="number_input" min="1" value="1">
                            <button id="button_plus_value" data-id="{{ $mauSanPham[0]->id }}"
                                onclick="plus(this.dataset.id)"><i class="fas fa-plus"></i></button>
                        </div>
                        <span style="color:red" id="quantity-limit"></span>
                    </div>
                @endif
                <div class="product_detail_right_buy">
                    <div><button id="buy-now" data-id="@if(isset($mauSanPham[0])){{ $mauSanPham[0]->id}}@endif"
                            onclick="buyNow(this.dataset.id)">Mua ngay</button></div>
                    <div><button id="add-to-cart" onclick="addToCart(this.dataset.id)"
                            data-id="@if (isset($mauSanPham[0])){{ $mauSanPham[0]->id }}@endif">
                            Thêm giỏ hàng<i class="fas fa-cart-plus" style="margin-left:5px;"></i></button></div>
                </div>
            </div>
        </div>
        <div class="product_detail detail_bottom">
            <div class="product_detail_bottom_left">

                <div class="product_detail_bottom_left_rating">
                    <div>
                        <a href="">
                            <p>{{ number_format($diemDanhGia, 1) }} / 5</p>
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
                        <button onclick="loadRating(0,{{ $thongTinSanPham->id }},this)" class="click_active_border">Tất
                            cả</button>
                        <button onclick="loadRating(5,{{ $thongTinSanPham->id }},this)">5 sao </button>
                        <button onclick="loadRating(4,{{ $thongTinSanPham->id }},this)">4 sao </button>
                        <button onclick="loadRating(3,{{ $thongTinSanPham->id }},this)">3 sao </button>
                        <button onclick="loadRating(2,{{ $thongTinSanPham->id }},this)">2 sao </button>
                        <button onclick="loadRating(1,{{ $thongTinSanPham->id }},this)">1 sao </button>
                    </div>
                </div>

                <div>
                    <div class="product_detail_bottom_left_comments" id="ratings">
                        @php
                            $index = 0;
                        @endphp
                        @foreach ($danhSachDanhGia as $danhGia)
                            <div class="product_detail_bottom_left_comment">
                                <div>
                                    <button>
                                        <img src="{{ asset('images/' . $danhGia->user->image) }}" alt="">
                                    </button>
                                    <div>
                                        {{ $danhGia->user->full_name }}
                                        <p>
                                            @for ($i = 0; $i < $danhGia->point; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                        </p>
                                    </div>
                                    <p><i class="fas fa-clock"></i> {{ $danhGia->created_at }}</p>
                                </div>
                                <div>
                                    <p style="color:#C7C7C7">
                                        {{ $danhGia->color }} | {{ $danhGia->internal_memory }}
                                    </p>
                                    <p>{{ $danhGia->content }}</p>
                                    <div>
                                        @foreach ($danhGia->image_ratings as $image)
                                            <img src="{{ asset('images/' . $image->image) }}" alt="">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @php
                                $index++;
                            @endphp
                            @if ($index == 2)
                            @break
                        @endif
                    @endforeach
                </div>

                @if (count($danhSachDanhGia) > 2)
                    <button onclick="showPopup()" class="button">Xem thêm</button>
                @endif


            </div>
            <div class="product_detail_bottom_left_desription">
                <h6>Mô tả sản phẩm</h6>
                <p>{{ $thongTinSanPham->description }}</p>
            </div>
        </div>

        <div class="product_detail_bottom_right">
            <h4><a href="">Thông Số Kỹ Thuật</a></h4>
            <ul>
                @foreach ($thongSoKiThuatSanPham as $thongSo)
                    <li>
                        <div> {{ $thongSo->category_specification->name }}</div>
                        <div>{{ $thongSo->value }}</div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
{{-- popup đánh giá  --}}
<div id="popup_order_history" class="popup_order_history">
    <div class="popup_content">
        <span class="close_popup_rating">&times;</span>
        <div class="popup_table" id="popup_table">
            <div class="product_detail_bottom_left_comments" id ="ratings">
                @foreach ($danhSachDanhGia as $danhGia)
                    <div class="product_detail_bottom_left_comment">
                        <div>
                            <button><img src="{{ asset('images/' . $danhGia->user->image) }}" alt=""></button>
                            <div> {{ $danhGia->user->full_name }}
                                <p>
                                    @for ($i = 0; $i < $danhGia->point; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </p>
                            </div>
                            <p><i class="fas fa-clock"></i> {{ $danhGia->created_at }}</p>
                        </div>
                        <div>
                            <p style="color:#C7C7C7"> {{ $danhGia->color }}|{{ $danhGia->internal_memory }}</p>
                            <p> {{ $danhGia->content }}</p>
                            <div>

                                @foreach ($danhGia->image_ratings as $image)
                                    <img src="{{ asset('images/' . $image->image) }}" alt="">
                                @endforeach

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Sản phẩm tương tự -->
<section class="container_css product_best_seller">
    <h4>SẢN PHẨM TƯƠNG TỰ </h4>
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
                            <a href="{{ route('detail', [$sanPhamTuongTu[$i]->slug]) }}"><img
                                    src="{{ asset('images/' . $sanPhamTuongTu[$i]->image) }}"
                                    alt="Lỗi hiển thị"></a>
                            <div class="product_best_seller_item_info">
                                <ul>
                                    <li><a
                                            href="{{ route('detail', [$sanPhamTuongTu[$i]->slug]) }}">{{ $sanPhamTuongTu[$i]->name }}</a>
                                    </li>
                                    <li>{{ number_format($sanPhamTuongTu[$i]->price, 0, ',', '.') }}<sup>đ</sup>
                                    </li>
                                    <li>{{ $sanPhamTuongTu[$i]->rating }} <i class="fas fa-star"></i></li>
                                    <li>
                                        <button onclick="buyNowSame('{{ $sanPhamTuongTu[$i]->variants }}')">Mua
                                            ngay</button>
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
                    @for ($i = 4; $i < count($sanPhamTuongTu); $i++)
                        @if ($i > 7)
                        @break
                    @endif
                    <div class="product_best_seller_item">
                        <a href="{{ route('detail', [$sanPhamTuongTu[$i]->slug]) }}"><img
                                src="{{ asset('images/' . $sanPhamTuongTu[$i]->image) }}"
                                alt="Lỗi hiển thị"></a>
                        <div class="product_best_seller_item_info">
                            <ul>
                                <li><a
                                        href="{{ route('detail', [$sanPhamTuongTu[$i]->slug]) }}">{{ $sanPhamTuongTu[$i]->name }}</a>
                                </li>
                                <li>{{ number_format($sanPhamTuongTu[$i]->price, 0, ',', '.') }}<sup>đ</sup>
                                </li>
                                <li>{{ $sanPhamTuongTu[$i]->rating }} <i class="fas fa-star"></i></li>
                                <li>
                                    <button onclick="buyNowSame('{{ $sanPhamTuongTu[$i]->variants }}')">Mua
                                        ngay</button>
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
    function loadRating(sao, id, btn) {
        const button_rating = document.querySelectorAll('#button_rating button');
        if (button_rating) {
            button_rating.forEach((element) => {
                element.classList.remove('click_active_border')
            });
        }
        btn.classList.add('click_active_border')
        $.ajax({
                method: "GET",
                url: `/get-rating/${id}/${sao}`
            })
            .done((data) => {
                console.log(data);
                const content = data.data.map((item) => {
                    const images = item.images.split(','); // Tách chuỗi ảnh thành một mảng
                    return `
                <div class="product_detail_bottom_left_comment">
                    <div>
                        <button><img src="/images/${item.user_image}" alt=""></button>
                        <div> ${item.full_name}
                            <p>
                                 ${(() => {
                                    let stars = '';
                                    for (let i = 0; i < item.point; i++) {
                                        stars += '<i class="fas fa-star"></i>';
                                    }
                                    return stars;
                                })()}
                            </p>
                        </div>
                        <p><i class="fas fa-clock"></i> ${item.created_at}</p>
                    </div>
                    <div>
                        <p style="color:#C7C7C7">${item.color} | ${item.internal_memory}</p>
                        <p>${item.content}</p>
                        <div>
                            ${images.map(image => `<img src="/images/${image}" alt="">`).join('')}
                        </div>
                    </div>

                </div>
            `;
                }).join('');
                // Chèn nội dung vào container trong HTML
                ratings = document.getElementById('ratings').innerHTML = content;
                if (data.data.length === 0) {
                    document.getElementById('ratings').innerHTML = ` <h4> Hiện tại chưa có đánh giá !</h4> `
                }
            });
    }
</script>
<script>
    function addToCart(id) {
        const quantity = $('#number_input').val().trim();
        $.ajax({
                method: "GET",
                url: `/add-to-cart/${id.trim()}/${quantity}`
            }).done((data) => {
                if (data.success == true) {
                    $('#cart-quantity').text(`${data.cart.totalQuantity}`);
                    alertify.success(data.message);
                } else {
                    alertify.alert(data.message);
                }

            })
            .fail((data) => {
                alertify.alert('Hiện tại sản phẩm này chưa thể thêm vào giỏ hàng!')
            })
    }

    function buyNow(variantId) {
        const quantity = parseInt($('#number_input').val().trim());
        $.ajax({
                method: "GET",
                url: `/admin/check-stock-variant/${variantId.trim()}`
            })
            .done((data) => {
                if (data < quantity) {
                    alertify.alert('Thông báo', 'Sản phẩm không đủ số lượng!');
                } else {
                    $.ajax({
                        method: "POST",
                        url: '/order/buy-now',
                        data: {
                            id: variantId,
                            quantity,
                            _token: '{{ csrf_token() }}'
                        }
                    }).done((data) => {
                        if(data.success===1){
                            window.location.href = data.url;
                        }else{
                            alertify.alert('Vui lòng đăng nhập để mua ngay');
                        }

                    })
                    .fail((data)=>{
                        console.log(data);
                    })

                }
            })
    }
</script>
<script>
    const input_number = document.getElementById('number_input');

    checkStock(
        @if (isset($mauSanPham[0]))
            {{ $mauSanPham[0]->id }}
        @endif , 1);
    input_number.addEventListener('keyup', function(event) {
        // Loại bỏ tất cả các ký tự không phải là số
        if (isNaN(this.value) || this.value === "" || this.value == "0") {
            this.value = "";
        } else {
            const id = parseInt(document.getElementById('add-to-cart').dataset.id);
            checkStock(id, parseInt(input_number.value));
        }
    });

    function minus(variantId) {
        if (parseInt(input_number.value) === 1) {
            $('#button_minus_value').attr('disabled', true);
            if (parseInt(input_number.value) < 0)
                input_number.value = 0;
        }
        parseInt(input_number.value) > 0 && parseInt(input_number.value) < 2 ? input_number.value = 1 :
            input_number.value = parseInt(input_number.value) - 1;
        checkStock(variantId, parseInt(input_number.value));
    }

    function plus(variantId) {
        input_number.value = parseInt(input_number.value) + 1;
        checkStock(variantId, parseInt(input_number.value));
    };

    function checkStock(variant_id, quantity) {
        $.ajax({
                method: "GET",
                url: `/admin/check-stock-variant/${variant_id}`
            })
            .done((data) => {
                if (data <= quantity) {
                    $('#quantity-limit').text('Số lượng đã đạt giới hạn');
                    $('#number_input').val(data);
                    $('#button_plus_value').attr('disabled', true);

                    if (parseInt($('#number_input').val()) <= 0) {
                        $('#number_input').val(1);
                    }
                } else {
                    $('#button_plus_value').attr('disabled', false);
                    $('#quantity-limit').text('');
                }
            })
    }
</script>
<script>
    function buyNowSame(variantId) {
        const quantity = 1;
        $.ajax({
                method: "GET",
                url: `/admin/check-stock-variant/${variantId.trim()}`
            })
            .done((data) => {
                if (data < quantity) {
                    alertify.alert('Thông báo', 'Sản phẩm không đủ số lượng!');
                } else {
                    $.ajax({
                        method: "POST",
                        url: '/order/buy-now',
                        data: {
                            id: variantId,
                            quantity,
                            _token: '{{ csrf_token() }}'
                        }
                    }).done((data) => {
                        if(data.success===1){
                            window.location.href = data.url;
                        }else{
                            alertify.alert('Vui lòng đăng nhập để mua ngay');
                        }

                    })
                    .fail((data)=>{
                        console.log(data);
                    })

                }
            })
    }
</script>
{{-- long --}}
<script>
    function LayThongTinSanPhamTheoMau(slug, internal_memory, color, btn) {
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
            url: `/detail/${slug}/${internal_memory}/${color}`,
            data: "data",
            dataType: "json",
            success: function(response) {
                $('#stock').text(response.stock);
                const price = new Intl.NumberFormat('de-DE').format(response.price);
                if (response.stock > 0) {
                    $('#status').text('(Còn hàng)');
                } else {
                    $('#status').text('(Hết hàng)');
                }
                $('#price').text(price);
                checkStock(response.variant_id, parseInt($('#number_input').val()));
                const variantElement = document.getElementById(`anh_${response.variant_id}`);
                document.getElementById('add-to-cart').dataset.id = `${response.variant_id}`;
                document.getElementById('buy-now').dataset.id = `${response.variant_id}`;
                document.getElementById('button_plus_value').dataset.id = `${response.variant_id}`;
                document.getElementById('button_minus_value').dataset.id = `${response.variant_id}`;
                const active = document.querySelectorAll('.carousel-item');
                active.forEach(item => item.classList.remove('active'));
                document.getElementById(`${response.variant_id}`).classList.add('active');
            }
        });
    }

    function DanhSachMau(url, btn) {
        const button_color = document.querySelectorAll('.product_detail_right_ram button')
        if (button_color) {
            button_color.forEach(element => {
                {
                    button_color.forEach(btn => btn.classList.remove('color_active'));
                }
            })
        }
        btn.classList.add('color_active');

        $.ajax({
                method: "GET",
                url: url,
            })
            .done((danhSachMau) => {
                const thongTin = danhSachMau.map((mau, index) => {
                    const formatprice = new Intl.NumberFormat('de-DE').format(mau.price);
                    return `    <button class="${index === 0 ? 'color_active' : ''}" onclick="LayThongTinSanPhamTheoMau('${mau.slug}','${mau.internal_memory}','${mau.color}',this)" >
                                    <img src="{{ asset('images/${mau.image}') }}" alt="Lỗi hiển thị">
                                    <span>
                                        <p >${mau.color}</p>
                                        <span>${formatprice}<sup>đ</sup></span>
                                    </span>
                                </button>
                            `;
                });
                const list = document.getElementById('product_detail_right_color');
                list.innerHTML = thongTin.join('');
                checkStock(danhSachMau[0].id, parseInt($('#number_input').val()));
                document.getElementById('price').innerHTML = Intl.NumberFormat('de-DE').format(danhSachMau[0]
                    .price);
                document.getElementById('stock').innerHTML = danhSachMau[0].stock;
                document.getElementById('add-to-cart').dataset.id = danhSachMau[0].id;
                document.getElementById('buy-now').dataset.id = danhSachMau[0].id;
                document.getElementById('button_plus_value').dataset.id = `${danhSachMau[0].id}`;
                document.getElementById('button_minus_value').dataset.id = `${danhSachMau[0].id}`;

            });
    }
</script>
<script>
    function CapNhatYeuThich(sanpham, user) {
        $.ajax({
            type: "GET",
            url: `/yeuthich/${sanpham}/${user}`,
            data: "data",
            dataType: "json",
            success: function(response) {
                if (response.status == 1) {
                    alertify.success(
                        `Thêm sản phẩm ${response.tenSanPham[0].name} vào danh sách yêu thích thành công `
                    );
                    $("#button_like").css("color", "red");
                    $("#number_like").text(response.luotThich + 1);
                } else {
                    alertify.error(
                        `Bỏ sản phẩm ${response.tenSanPham[0].name} ra khỏi danh sách yêu thích thành công `
                    );
                    $("#button_like").css("color", "grey");
                    $("#number_like").text(response.luotThich - 1); // Giảm số nếu bỏ thích
                }
            }
        });
    }
</script>
<script>
    function showPopup() {
        const popupOrderHistory = document.getElementById("popup_order_history");
        if (!popupOrderHistory) {
            console.error("Popup element not found!");
            return;
        }
        const closeBtn = document.querySelector(".close_popup_rating");
        if (!closeBtn) {
            console.error("Close button element not found!");
            return;
        }

        popupOrderHistory.style.display = "block";


        closeBtn.onclick = function() {
            popupOrderHistory.style.display = "none";
        };

        window.onclick = function(event) {
            if (event.target === popupOrderHistory) {
                popupOrderHistory.style.display = "none";
            }
        };
    }
</script>


@endsection
