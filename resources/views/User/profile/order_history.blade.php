@extends('layouts.layouts_user')
@section('title', 'Lịch sử đơn hàng')
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
                            <button class="tablinks">Tất cả</button>
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
                                                <div class="table_item" style="padding-left: 5px;"><img
                                                        src="{{ asset('images/' . App\Models\ProductVariant::find($item->product_variant_id)->image) }}"
                                                        width="100px" alt="image"></div>
                                                <div class="table_item" style="width: 85%;font-size: 16px;">
                                                    <div>{{ $item->name_product }}</div>
                                                    <div style="opacity: 0.7;font-size: 14px;">{{ $item->color }} -
                                                        {{ $item->internal_memory }}
                                                    </div>
                                                    <div>{{ $item->price }}đ</div>
                                                    <div style="font-size: 14px;">Số lượng: {{ $item->quantity }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="footer_order_table">
                                            <div>
                                                <button
                                                    onclick="showPopup('{{ Auth::user()->id }}','{{ $order->order_code }}')">Đánh
                                                    Giá</button>
                                            </div>
                                            <div class="table_item">Thành tiền:<span
                                                    style="font-size: 25px;">{{ $order->total_price }}</span>đ
                                            </div>
                                            @if (in_array($order->order_status_id, [1, 2]))
                                                <button class="rattingBtn" onclick=""><a
                                                        href="{{ route('profile.cancel', ['id' => $order->id]) }}">Hủy đơn
                                                        hàng</a></button>
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
                                                <div class="table_item" style="padding-left: 5px;"><img
                                                        src="{{ asset('images/' . App\Models\ProductVariant::find($item->product_variant_id)->image) }}"
                                                        width="100px" alt="image"></div>
                                                <div class="table_item" style="width: 85%;font-size: 16px;">
                                                    <div>{{ $item->name_product }}</div>
                                                    <div style="opacity: 0.7;font-size: 14px;">{{ $item->color }} -
                                                        {{ $item->internal_memory }}
                                                    </div>
                                                    <div>{{ $item->price }}đ</div>
                                                    <div style="font-size: 14px;">Số lượng: {{ $item->quantity }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="footer_order_table">
                                            <div class="table_item">Thành tiền:<span
                                                    style="font-size: 25px;">{{ $order->total_price }}</span>đ
                                            </div>
                                            <button class="rattingBtn" onclick=""><a
                                                    href="{{ route('profile.cancel', ['id' => $order->id]) }}">Hủy đơn
                                                    hàng</a></button>
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
                                                <div class="table_item" style="padding-left: 5px;"><img
                                                        src="{{ asset('images/' . App\Models\ProductVariant::find($item->product_variant_id)->image) }}"
                                                        width="100px" alt="image"></div>
                                                <div class="table_item" style="width: 85%;font-size: 16px;">
                                                    <div>{{ $item->name_product }}</div>
                                                    <div style="opacity: 0.7;font-size: 14px;">{{ $item->color }} -
                                                        {{ $item->internal_memory }}
                                                    </div>
                                                    <div>{{ $item->price }}đ</div>
                                                    <div style="font-size: 14px;">Số lượng: {{ $item->quantity }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="footer_order_table">
                                            <div class="table_item">Thành tiền:<span
                                                    style="font-size: 25px;">{{ $order->total_price }}</span>đ
                                            </div>
                                            @if ($order->order_status_id == 2)
                                                <button class="rattingBtn" onclick=""><a
                                                        href="{{ route('profile.cancel', ['id' => $order->id]) }}">Hủy đơn
                                                        hàng</a></button>
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
                                                <div class="table_item" style="padding-left: 5px;"><img
                                                        src="{{ asset('images/' . App\Models\ProductVariant::find($item->product_variant_id)->image) }}"
                                                        width="100px" alt="image"></div>
                                                <div class="table_item" style="width: 85%;font-size: 16px;">
                                                    <div>{{ $item->name_product }}</div>
                                                    <div style="opacity: 0.7;font-size: 14px;">{{ $item->color }} -
                                                        {{ $item->internal_memory }}
                                                    </div>
                                                    <div>{{ $item->price }}đ</div>
                                                    <div style="font-size: 14px;">Số lượng: {{ $item->quantity }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="footer_order_table">
                                            <div class="table_item">Thành tiền:<span
                                                    style="font-size: 25px;">{{ $order->total_price }}</span>đ
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
                                                <div class="table_item" style="padding-left: 5px;"><img
                                                        src="{{ asset('images/' . App\Models\ProductVariant::find($item->product_variant_id)->image) }}"
                                                        width="100px" alt="image"></div>
                                                <div class="table_item" style="width: 85%;font-size: 16px;">
                                                    <div>{{ $item->name_product }}</div>
                                                    <div style="opacity: 0.7;font-size: 14px;">{{ $item->color }} -
                                                        {{ $item->internal_memory }}
                                                    </div>
                                                    <div>{{ $item->price }}đ</div>
                                                    <div style="font-size: 14px;">Số lượng: {{ $item->quantity }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="footer_order_table">
                                            <div class="table_item">Thành tiền:<span
                                                    style="font-size: 25px;">{{ $order->total_price }}</span>đ
                                            </div>
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
                                                <div class="table_item" style="padding-left: 5px;"><img
                                                        src="{{ asset('images/' . App\Models\ProductVariant::find($item->product_variant_id)->image) }}"
                                                        width="100px" alt="image"></div>
                                                <div class="table_item" style="width: 85%;font-size: 16px;">
                                                    <div>{{ $item->name_product }}</div>
                                                    <div style="opacity: 0.7;font-size: 14px;">{{ $item->color }} -
                                                        {{ $item->internal_memory }}
                                                    </div>
                                                    <div>{{ $item->price }}đ</div>
                                                    <div style="font-size: 14px;">Số lượng: {{ $item->quantity }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="footer_order_table">
                                            <div class="table_item">Thành tiền:<span
                                                    style="font-size: 25px;">{{ $order->total_price }}</span>đ
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
                                                <div class="table_item" style="padding-left: 5px;"><img
                                                        src="{{ asset('images/' . App\Models\ProductVariant::find($item->product_variant_id)->image) }}"
                                                        width="100px" alt="image"></div>
                                                <div class="table_item" style="width: 85%;font-size: 16px;">
                                                    <div>{{ $item->name_product }}</div>
                                                    <div style="opacity: 0.7;font-size: 14px;">{{ $item->color }} -
                                                        {{ $item->internal_memory }}
                                                    </div>
                                                    <div>{{ $item->price }}đ</div>
                                                    <div style="font-size: 14px;">Số lượng: {{ $item->quantity }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="footer_order_table">
                                            <div class="table_item">Thành tiền:<span
                                                    style="font-size: 25px;">{{ $order->total_price }}</span>đ
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
                    <div class="popup_table" id="test">

                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script>
            function showPopup(user, code) {

                const popup_order_history = document.getElementById("popup_order_history");
                const closeBtn = document.querySelector(".close_popup_rating");
                popup_order_history.style.display = "block";
                $.ajax({
                        method: "GET",
                        url: `/get/${user}/${code}`,
                    })
                    .done((danhSach) => {
                        const thongTin = danhSach.map((item) => {
                            const formatprice = new Intl.NumberFormat('de-DE').format(item.price);
                            const formatTotal = new Intl.NumberFormat('de-DE').format(item.price);

                            return `
                <div class="popup_form" >
                        <div class="table_item" style="padding-left: 5px;">
                            <img src="/images/${item.image}" width="100px" alt="">
                        </div>
                        <div class="table_item" id="table_item" style="width: 85%; font-size: 16px;">
                            <div>
                                <span>${item.name_product}</span> |
                                <span>${item.internal_memory}</span> |
                                <span>${item.color}</span>
                            </div>
                            <div style="opacity: 0.7; font-size: 14px;">Thương hiệu :  <span>${item.name}</span></div>
                            <div style="font-size: 14px;">x<span>${item.quantity}</span></div>
                            <div style="font-size: 14px;">Giá: ${formatprice}</div>
                            <div style="font-size: 14px;">Tổng Tiền: ${formatTotal}</div>
                            <div class="star-ratting" >
                                <input type="hidden" name="${item.product_variant_id}_point" >
                                <label for="star5"  class="fas fa-star point" data-id="1"></label>
                                <label for="star4"  class="fas fa-star point" data-id="2"></label>
                                <label for="star3"  class="fas fa-star point" data-id="3"></label>
                                <label for="star2"  class="fas fa-star point" data-id="4"></label>
                                <label for="star1" class="fas fa-star point" data-id="5"></label>
                            </div>
                            <div class="col">
                                        <label>Hình ảnh:</label>
                                    </div>
                                    <div> <button type="button" data-idx=1 onclick="addImage('${item.product_variant_id}',this)">Thêm hình ảnh</button>
                                    </div>
                                    <div class="col" id="image-products">
                                        <img id="${item.product_variant_id}-1" />
                                        <input type="file" data-index=1 onchange="loadFile('${item.product_variant_id}',event,this)"
                                            class="form-control" style="background-color:white" name="${item.product_variant_id}_image[0]" required>
                                    </div>
                            <textarea name="${item.product_variant_id}_content" style="padding: 5px 7px;" placeholder="Nhập ý kiến của bạn..."></textarea>
                            <button type="submit" style="padding: 5px 20px;">Đánh giá</button>
                        </div>
                </div>`;
                        });

                        // Cập nhật nội dung popup
                        const list = document.getElementById('test');
                        list.innerHTML = thongTin.join('');
                        selectStar();
                        loadFile();
                    });
                    //   Khi nhấn vào dấu "x", ẩn popup
                        closeBtn.onclick = function () {
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
        function selectStar(){

            const form_rating = document.querySelectorAll('.popup_form');
            console.log(form_rating);
            form_rating.forEach((item) => {
                console.log(item);
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
        }
        </script>
        <script>
            function addImage(id,btn) {
                let idx = Number(++btn.dataset.idx);
                const image = `<div class="col">
                                            <img id="${id}+'-'+${idx}" />
                                            <input type="file" data-index=${idx} onchange="loadFile(event,this)" class="form-control"
                                                style="background-color:white" name="${id}_image[${idx-1}]" required>
                                </div>`;
                document.getElementById('image-products').insertAdjacentHTML('beforeend', image);
            }
        </script>
        <script>
            var loadFile = function(event, img) {
                const idx = img.dataset.index;
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById('output-' + idx);
                    output.src = reader.result;
                    output.style.width = "150px";
                    output.style.height = "150px";
                };
                reader.readAsDataURL(event.target.files[0]);
            };
        </script>

    @endsection
