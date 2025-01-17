@extends('layouts.layouts_user')
@section('title', 'Lịch sử đơn hàng')
@section('active_order_history' ,'active_button')
@section('content')
    <div class="container_css order">
        <div class="order_history">
            <div class="row_order_history">
                {{-- sidebar --}}
                @include('user.profile.sidebar')
                {{-- sidebar --}}
                <div class="col_order_history" style="padding-left: 20px;width: 79%;">
                    <div class="col_order_history_2">
                        <div class="tab">
                            <button class="tablinks active_tab">Tất cả</button>
                            <button class="tablinks">Chờ thanh toán</button>
                            <button class="tablinks">Đang chuẩn bị</button>
                            <button class="tablinks">Đang giao</button>
                            <button class="tablinks">Hoàn thành</button>
                            <button class="tablinks">Đã hủy</button>
                            <button class="tablinks">Trả hàng/Hoàn tiền</button>
                        </div>
                        <div class="history" id="all">
                            @if (count($orders) > 0)
                                @foreach ($orders as $order)
                                    <div class="order_table" style="margin-top: 20px;">
                                        <div class="header_order_table">
                                            <div class="table_item">Mã đơn hàng: #{{ $order->order_code }}</div>
                                            <div class="table_item" style="text-align: right;">
                                                {{ App\Models\OrderStatus::find($order->order_status_id)->name }}
                                            </div>
                                        </div>
                                        @foreach (App\Models\OrderItem::where('order_id', $order->id)->get() as $item)
                                            <div class="body_order_table">
                                                <div class="table_item" style="padding-left: 5px;"> <a href="{{route('detail',['slug'=>$item->slug_product])}}"><img src="@if(App\Models\ProductVariant::find($item->product_variant_id)==null) {{asset('images/product-not-available.webp')}} @else {{ asset('images/' . App\Models\ProductVariant::find($item->product_variant_id)->image) }} @endif" width="100px" alt="image"></a> </div>
                                                <div class="table_item" style="width: 85%;font-size: 16px;">
                                                    <div>{{ $item->name_product }}</div>
                                                    <div style="opacity: 0.7;font-size: 14px;">{{ $item->color }} -
                                                        {{ $item->internal_memory }}
                                                    </div>
                                                    <div>{{ number_format($item->price, 0, ',', '.') }}<sup>đ</sup></div>
                                                    <div style="font-size: 14px;">Số lượng: {{ $item->quantity }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="footer_order_table">
                                            <div class="table_item">Thành tiền:<span
                                                    style="font-size: 25px;">{{ number_format($order->total_price, 0, ',', '.') }}</span><sup>đ</sup>
                                            </div>
                                            @if (in_array($order->order_status_id, [1, 2]))
                                                <form action="{{ route('profile.cancel', ['id' => $order->id]) }}"
                                                    method="POST" onsubmit="return confirmCancelOrder(event)">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="rattingBtn">Hủy đơn hàng</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h5>Bạn chưa mua sản phẩm nào</h5>
                            @endif
                        </div>
                        <div class="history" id="thanhtoan" style="display: none;">
                            @if (count($orders->where('order_status_id', 1)) > 0)
                                @foreach ($orders->where('order_status_id', 1) as $order)
                                    <div class="order_table" style="margin-top: 20px;">
                                        <div class="header_order_table">
                                            <div class="table_item">Mã đơn hàng: #{{ $order->order_code }}</div>
                                            <div class="table_item" style="text-align: right;">
                                                {{ App\Models\OrderStatus::find($order->order_status_id)->name }}
                                            </div>
                                        </div>
                                        @foreach (App\Models\OrderItem::where('order_id', $order->id)->get() as $item)
                                            <div class="body_order_table">
                                                <div class="table_item" style="padding-left: 5px;"> <a href="{{route('detail',['slug'=>$item->slug_product])}}"><img src="@if(App\Models\ProductVariant::find($item->product_variant_id)==null) {{asset('images/product-not-available.webp')}} @else {{ asset('images/' . App\Models\ProductVariant::find($item->product_variant_id)->image) }} @endif" width="100px" alt="image"></a> </div>
                                                <div class="table_item" style="width: 85%;font-size: 16px;">
                                                    <div>{{ $item->name_product }}</div>
                                                    <div style="opacity: 0.7;font-size: 14px;">{{ $item->color }} -
                                                        {{ $item->internal_memory }}
                                                    </div>
                                                    <div>{{ number_format($item->price, 0, ',', '.') }}<sup>đ</sup></div>
                                                    <div style="font-size: 14px;">Số lượng: {{ $item->quantity }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="footer_order_table">
                                            <div class="table_item">Thành tiền:<span
                                                    style="font-size: 25px;">{{ number_format($order->total_price, 0, ',', '.') }}</span><sup>đ</sup>
                                            </div>
                                            <div>
                                                <span> <button type="button" class="rattingBtn" onclick="showPayment({{$order->order_code}})"> Thanh toán </button></span>
                                                <span><form action="{{ route('profile.cancel', ['id' => $order->id]) }}"
                                                    method="POST" onsubmit="return confirmCancelOrder(event)">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="rattingBtn">Hủy đơn hàng</button>
                                                </form></span>

                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h5>Bạn không có đơn hàng nào chờ thanh toán</h5>
                            @endif
                        </div>
                        <div class="history" id="chuanbi" style="display: none;">
                            @if (count($orders->whereIn('order_status_id', [2, 3])) > 0)
                                @foreach ($orders->whereIn('order_status_id', [2, 3]) as $order)
                                    <div class="order_table" style="margin-top: 20px;">
                                        <div class="header_order_table">
                                            <div class="table_item">Mã đơn hàng: #{{ $order->order_code }}</div>
                                            <div class="table_item" style="text-align: right;">
                                                {{ App\Models\OrderStatus::find($order->order_status_id)->name }}
                                            </div>
                                        </div>
                                        @foreach (App\Models\OrderItem::where('order_id', $order->id)->get() as $item)
                                            <div class="body_order_table">
                                                <div class="table_item" style="padding-left: 5px;"> <a href="{{route('detail',['slug'=>$item->slug_product])}}"><img src="@if(App\Models\ProductVariant::find($item->product_variant_id)==null) {{asset('images/product-not-available.webp')}} @else {{ asset('images/' . App\Models\ProductVariant::find($item->product_variant_id)->image) }} @endif" width="100px" alt="image"></a> </div>
                                                <div class="table_item" style="width: 85%;font-size: 16px;">
                                                    <div>{{ $item->name_product }}</div>
                                                    <div style="opacity: 0.7;font-size: 14px;">{{ $item->color }} -
                                                        {{ $item->internal_memory }}
                                                    </div>
                                                    <div>{{ number_format($item->price, 0, ',', '.') }}<sup>đ</sup></div>
                                                    <div style="font-size: 14px;">Số lượng: {{ $item->quantity }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="footer_order_table">
                                            <div class="table_item">Thành tiền:<span
                                                    style="font-size: 25px;">{{ number_format($order->total_price, 0, ',', '.') }}</span><sup>đ</sup>
                                            </div>
                                            @if ($order->order_status_id == 2)
                                                <form action="{{ route('profile.cancel', ['id' => $order->id]) }}"
                                                    method="POST" onsubmit="return confirmCancelOrder(event)">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="rattingBtn">Hủy đơn hàng</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h5>Bạn không có đơn hàng nào đang chuẩn bị</h5>
                            @endif
                        </div>
                        <div class="history" id="danggiao" style="display: none;">
                            @if (count($orders->whereIn('order_status_id', [4, 5])) > 0)
                                @foreach ($orders->whereIn('order_status_id', [4, 5]) as $order)
                                    <div class="order_table" style="margin-top: 20px;">
                                        <div class="header_order_table">
                                            <div class="table_item">Mã đơn hàng: #{{ $order->order_code }}</div>
                                            <div class="table_item" style="text-align: right;">
                                                {{ App\Models\OrderStatus::find($order->order_status_id)->name }}
                                            </div>
                                        </div>
                                        @foreach (App\Models\OrderItem::where('order_id', $order->id)->get() as $item)
                                            <div class="body_order_table">
                                                <div class="table_item" style="padding-left: 5px;"> <a href="{{route('detail',['slug'=>$item->slug_product])}}"><img src="@if(App\Models\ProductVariant::find($item->product_variant_id)==null) {{asset('images/product-not-available.webp')}} @else {{ asset('images/' . App\Models\ProductVariant::find($item->product_variant_id)->image) }} @endif" width="100px" alt="image"></a> </div>
                                                <div class="table_item" style="width: 85%;font-size: 16px;">
                                                    <div>{{ $item->name_product }}</div>
                                                    <div style="opacity: 0.7;font-size: 14px;">{{ $item->color }} -
                                                        {{ $item->internal_memory }}
                                                    </div>
                                                    <div>{{ number_format($item->price, 0, ',', '.') }}<sup>đ</sup></div>
                                                    <div style="font-size: 14px;">Số lượng: {{ $item->quantity }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="footer_order_table">
                                            <div class="table_item">Thành tiền:<span
                                                    style="font-size: 25px;">{{ number_format($order->total_price, 0, ',', '.') }}</span><sup>đ</sup>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h5>Bạn không có đơn hàng nào đang giao</h5>
                            @endif
                        </div>
                        <div class="history" id="hoanthanh" style="display: none;">
                            @if (count($orders->where('order_status_id', 6)) > 0)
                                @foreach ($orders->where('order_status_id', 6) as $order)
                                    <div class="order_table" style="margin-top: 20px;">
                                        <div class="header_order_table">
                                            <div class="table_item">Mã đơn hàng: #{{ $order->order_code }}</div>
                                            <div class="table_item" style="text-align: right;">
                                                {{ App\Models\OrderStatus::find($order->order_status_id)->name }}
                                            </div>
                                        </div>
                                        @foreach (App\Models\OrderItem::where('order_id', $order->id)->get() as $item)
                                            <div class="body_order_table">
                                                <div class="table_item" style="padding-left: 5px;"> <a href="{{route('detail',['slug'=>$item->slug_product])}}"><img src="@if(App\Models\ProductVariant::find($item->product_variant_id)==null) {{asset('images/product-not-available.webp')}} @else {{ asset('images/' . App\Models\ProductVariant::find($item->product_variant_id)->image) }} @endif" width="100px" alt="image"></a> </div>
                                                <div class="table_item" style="width: 85%;font-size: 16px;">
                                                    <div>{{ $item->name_product }}</div>
                                                    <div style="opacity: 0.7;font-size: 14px;">{{ $item->color }} -
                                                        {{ $item->internal_memory }}
                                                    </div>
                                                    <div>{{ number_format($item->price, 0, ',', '.') }}<sup>đ</sup></div>
                                                    <div style="font-size: 14px;">Số lượng: {{ $item->quantity }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="footer_order_table">
                                            <div class="table_item">Thành tiền:<span
                                                    style="font-size: 25px;">{{ number_format($order->total_price, 0, ',', '.') }}</span><sup>đ</sup>
                                            </div>
                                            <button
                                                onclick="showPopup('{{ Auth::user()->id }}','{{ $order->order_code }}')">Đánh
                                                Giá</button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h5>Bạn không có đơn hàng nào hoàn thành</h5>
                            @endif
                        </div>
                        <div class="history" id="dahuy" style="display: none;">
                            @if (count($orders->where('order_status_id', 7)) > 0)
                                @foreach ($orders->where('order_status_id', 7) as $order)
                                    <div class="order_table" style="margin-top: 20px;">
                                        <div class="header_order_table">
                                            <div class="table_item">Mã đơn hàng: #{{ $order->order_code }}</div>
                                            <div class="table_item" style="text-align: right;">
                                                {{ App\Models\OrderStatus::find($order->order_status_id)->name }}
                                            </div>
                                        </div>
                                        @foreach (App\Models\OrderItem::where('order_id', $order->id)->get() as $item)
                                            <div class="body_order_table">
                                                <div class="table_item" style="padding-left: 5px;"> <a href="{{route('detail',['slug'=>$item->slug_product])}}"><img src="@if(App\Models\ProductVariant::find($item->product_variant_id)==null) {{asset('images/product-not-available.webp')}} @else {{ asset('images/' . App\Models\ProductVariant::find($item->product_variant_id)->image) }} @endif" width="100px" alt="image"></a> </div>
                                                <div class="table_item" style="width: 85%;font-size: 16px;">
                                                    <div>{{ $item->name_product }}</div>
                                                    <div style="opacity: 0.7;font-size: 14px;">{{ $item->color }} -
                                                        {{ $item->internal_memory }}
                                                    </div>
                                                    <div>{{ number_format($item->price, 0, ',', '.') }}<sup>đ</sup></div>
                                                    <div style="font-size: 14px;">Số lượng: {{ $item->quantity }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="footer_order_table">
                                            <div class="table_item">Thành tiền:<span
                                                    style="font-size: 25px;">{{ number_format($order->total_price, 0, ',', '.') }}</span><sup>đ</sup>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h5>Bạn không có đơn hàng nào đã hủy</h5>
                            @endif
                        </div>
                        <div class="history" id="trahang" style="display: none;">
                            @if (count($orders->where('order_status_id', 8)) > 0)
                                @foreach ($orders->where('order_status_id', 8) as $order)
                                    <div class="order_table" style="margin-top: 20px;">
                                        <div class="header_order_table">
                                            <div class="table_item">Mã đơn hàng: #{{ $order->order_code }}</div>
                                            <div class="table_item" style="text-align: right;">
                                                {{ App\Models\OrderStatus::find($order->order_status_id)->name }}
                                            </div>
                                        </div>
                                        @foreach (App\Models\OrderItem::where('order_id', $order->id)->get() as $item)
                                            <div class="body_order_table">
                                                <div class="table_item" style="padding-left: 5px;"> <a href="{{route('detail',['slug'=>$item->slug_product])}}"><img src="@if(App\Models\ProductVariant::find($item->product_variant_id)==null) {{asset('images/product-not-available.webp')}} @else {{ asset('images/' . App\Models\ProductVariant::find($item->product_variant_id)->image) }} @endif" width="100px" alt="image"></a> </div>
                                                <div class="table_item" style="width: 85%;font-size: 16px;">
                                                    <div>{{ $item->name_product }}</div>
                                                    <div style="opacity: 0.7;font-size: 14px;">{{ $item->color }} -
                                                        {{ $item->internal_memory }}
                                                    </div>
                                                    <div>{{ number_format($item->price, 0, ',', '.') }}<sup>đ</sup></div>
                                                    <div style="font-size: 14px;">Số lượng: {{ $item->quantity }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="footer_order_table">
                                            <div class="table_item">Thành tiền:<span
                                                    style="font-size: 25px;">{{ number_format($order->total_price, 0, ',', '.') }}</span><sup>đ</sup>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h5>Bạn không có đơn hàng nào trả hàng</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- popup đánh giá -->
            <div id="popup_order_history" class="popup_order_history">
                <div class="popup_content">
                    <span class="close_popup_rating">&times;</span>
                    <div class="popup_table" id="popup_table">
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script>
            function showPayment(code){
                alertify.alert('Thông báo thanh toán','Vui lòng thanh toán đơn hàng! <br> Ngân hàng: Sacombank <br> Số tài khoản: 060277266401 <br> Chủ tài khoản: NGUYEN THUY ANH THU <br> Nội dung chuyển khoản: ' + code);
            }
        </script>
        <script>
            function confirmCancelOrder(event) {
                event.preventDefault();
                alertify.confirm('Thông báo', 'Bạn có thật sự muốn hủy đơn hàng không?', function(isConfirmed) {
                    if (isConfirmed) {
                        event.target.submit();
                    }
                }, function() {
                    alertify.error('Hủy đơn hàng thất bại')
                });
            }

            function showPopup(user, code) {
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

                // Fetch data using AJAX
                $.ajax({
                        method: "GET",
                        url: `/get/${user}/${code}`,
                    })
                    .done((danhSach) => {
                        const popupTable = document.getElementById('popup_table');
                        if (!popupTable) {
                            console.error("Popup table element not found!");
                            return;
                        }

                        const content = danhSach.map((item) => {
                            const formatPrice = new Intl.NumberFormat('de-DE').format(item.price);
                            const formatTotal = new Intl.NumberFormat('de-DE').format(item.price * item.quantity);

                            return `
                        <div class="popup_form" id="popup_form_${item.product_variant_id}">
                            <div class="table_item" style="padding-left: 5px;">
                                <img src="/images/${item.image}" width="100px" alt="${item.name_product}">
                            </div>
                            <div class="table_item" style="width: 85%; font-size: 16px;">
                                <div>
                                    <span>${item.name_product}</span> |
                                    <span>${item.internal_memory}</span> |
                                    <span>${item.color}</span>
                                </div>
                                <div style="opacity: 0.7; font-size: 14px;">Thương hiệu: <span>${item.name}</span></div>
                                <div style="font-size: 14px;">Số lượng: <span>${item.quantity}</span></div>
                                <div style="font-size: 14px;font-weight:400">Giá: ${formatPrice}</div>
                                <div style="font-size: 16px;font-weight:600">Tổng Tiền: ${formatTotal}</div>
                                <div class="star-rating">
                                   <input type="hidden" name="${item.product_variant_id}_point" value="5">
                                    <div class="star-ratting">
                                        ${[...Array(5)].map((_, i) =>
                                            `<label style="color:red; font-size:16px"  class="fa-solid fa-star point" data-id="${i+1}"></label>`
                                        ).join('')}
                                    </div>
                                </div>
                                <div class="col">
                                    <label>Hình ảnh:</label>
                                </div>
                                <div>
                                    <button type="button" data-idx="1" style="border:none; background-color:rgb(22,66,60);color:white;padding:3px 8px; border-radius:5px" onclick="addImage('${item.product_variant_id}', this)">Thêm hình ảnh</button>
                                </div>
                                <div class="col" id="image-products-${item.product_variant_id}">
                                    <img id="${item.product_variant_id}-1" />
                                    <input type="file" data-index="1" onchange="loadFile('${item.product_variant_id}', event, this)" class="form-control input_${item.product_variant_id}" name="${item.product_variant_id}_image[0]" required>
                                </div>
                                <textarea style ="outline:none; padding:5px;margin-top:5px;border:1px solid #C7C7C7" name="${item.product_variant_id}_content" style="padding: 5px 7px;" placeholder="Nhập ý kiến của bạn..."></textarea>

                                <p  id="${item.product_variant_id}_content"></p>
                                <button type="button" onclick="ratings('${item.product_variant_id}', '${item.internal_memory}', '${item.color}')" style="padding: 8px 30px;border:none; background-color:rgb(22,66,60);color:white;border-radius:5px">Đánh giá</button>

                            </div>
                        </div>`;
                        });

                        popupTable.innerHTML = content.join('');
                        selectStar();

                    });

                closeBtn.onclick = function() {
                    popupOrderHistory.style.display = "none";
                };

                window.onclick = function(event) {
                    if (event.target === popupOrderHistory) {
                        popupOrderHistory.style.display = "none";
                    }
                };
            }

            function selectStar() {
                document.querySelectorAll('.star-rating').forEach(rating => {
                    const labels = Array.from(rating.querySelectorAll('.point'));
                    const reversedLabels = [...labels].reverse();
                    reversedLabels.forEach((label, index) => {
                        label.addEventListener('click', () => {
                            reversedLabels.forEach((l, i) => {
                                l.style.color = i <= index ? "red" : "black";
                            });
                            const hiddenInput = rating.querySelector('input[type="hidden"]');
                            if (hiddenInput) {
                                hiddenInput.value = index + 1;
                                console.log(hiddenInput);
                            }
                        });
                    });
                });
            }

            // Gọi hàm khởi tạo sao khi trang được tải
            document.addEventListener('DOMContentLoaded', initializeStarRating);

            function addImage(id, btn) {
                if (!btn.dataset.idx) btn.dataset.idx = 0;
                const idx = ++btn.dataset.idx;
                if(idx <=5 ){
                    const imageContainer = document.getElementById(`image-products-${id}`);
                    const newImageInput = `
                    <div class="col">
                        <img id="${id}-${idx}" />
                        <input type="file" data-index="${idx}" onchange="loadFile('${id}', event, this)" class="form-control input_${id}" name="${id}_image[${idx - 1}]" required>
                    </div>`;
                    imageContainer.insertAdjacentHTML('beforeend', newImageInput);
                }
                else{
                    alertify.error("Bạn chỉ có thể thêm tối đa 5 hình ảnh trong 1 bình luận");
                }

            }

            function loadFile(id, event, img) {
                if (!event.target.files || !event.target.files[0]) {
                    console.error("No file selected!");
                    return;
                }

                const idx = img.dataset.index;
                const output = document.getElementById(`${id}-${idx}`);
                if (!output) {
                    console.error(`Output image element (${id}-${idx}) not found!`);
                    return;
                }

                const reader = new FileReader();
                reader.onload = function() {
                    output.src = reader.result;
                    output.style.width = "120px";
                    output.style.padding = "10px 0";
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>
        <script>
        function ratings(id, internal_memory, color) {
            const textarea = document.querySelector(`textarea[name="${id}_content"]`);
            const content = textarea.value;
            const hiddenInput = document.querySelector(`input[name="${id}_point"]`);
            const pointValue = hiddenInput.value;
            const total_input = document.querySelectorAll( `input.input_${id}`);
            let formData = new FormData();
            for(let i=0;i<total_input.length;i++){
                const img = total_input[i];
                if(img.type ==="file" && img.files.length>0){
                    const load_image = img.files[0];
                    formData.append('file[]', load_image);
                }

            }
            formData.append('id', id);
            formData.append('internal_memory', internal_memory);
            formData.append('color', color);
            formData.append('content', content);
            formData.append('point', pointValue);

            formData.append('_token', '{{ csrf_token() }}'); // CSRF token

            $.ajax({
                url: `/them-danh-gia`,
                method: 'POST',
                data: formData, // Gửi FormData
                processData: false, // Không xử lý dữ liệu
                contentType: false, // Không thiết lập kiểu Content-Type
                success: function(response) {
                    alertify.success(
                        `Thêm đánh giá sản phẩm ${response.tenSanPham} | ${response.boNho} | ${response.mau} thành công`
                    );
                    $('#popup_form_' + id).remove();
                    if($('#popup_table').children().length === 0)
                {
                    $('#popup_order_history').hide();
                }
                },
                error: function(xhr, status, error) {
                            if (xhr.status === 422 && xhr.responseJSON) {
                    const errors = xhr.responseJSON.errors;

                    // Hiển thị từng lỗi qua Alertify
                    for (const [field, messages] of Object.entries(errors)) {
                        messages.forEach(message => {
                            alertify.error(message); // Thông báo lỗi
                        });
                    }
                } else {
                    alertify.error('Đã xảy ra lỗi không xác định. Vui lòng thử lại.');
                }
                }
            });
        }
        </script>
    @endsection
