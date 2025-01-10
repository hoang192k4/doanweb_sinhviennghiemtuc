@extends('layouts.layouts_user')
@section('title', 'Lịch sử đơn hàng')
@section('content')
<div class="container_css order">
    <div class="order_history">
        <div class="row_order_history">
            <div class="col_order_history" style="width: 20%;">
                <div class="col_order_history_1">
                    <div class="item"><a href="{{route('profile.index')}}"><i class="fas fa-user"></i>Thông tin cá
                            nhân</a></div>
                    <div class="item"><a href="{{route('profile.order_history')}}"><i class="fas fa-box"></i>Lịch sử đơn
                            hàng</a></div>
                    <div class="item"><a href="{{route('profile.favourite_product')}}"><i class="fas fa-gift"></i>Sản
                            phẩm yêu thích</a></div>
                    <div class="item"><a href="{{route('profile.review_history')}}"><i class="fas fa-gifts"></i>Sản phẩm
                            đã đánh giá</a></div>
                    <div class="item"><a href="TrangDoiMatKhau.html"><i class="fas fa-unlock-alt"></i>Đổi mật khẩu</a>
                    </div>
                </div>
            </div>
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
                                        <div class="table_item">Mã đơn hàng: #{{$order->order_code}}</div>
                                        <div class="table_item" style="text-align: right;">
                                            {{App\Models\OrderStatus::find($order->order_status_id)->name}}
                                        </div>
                                    </div>
                                    @foreach (App\Models\OrderItem::where('order_id', $order->id)->get() as $item)
                                        <div class="body_order_table">
                                            <div class="table_item" style="padding-left: 5px;"><img
                                                    src="{{asset('images/' . App\Models\ProductVariant::find($item->product_variant_id)->image)}}"
                                                    width="100px" alt="image"></div>
                                            <div class="table_item" style="width: 85%;font-size: 16px;">
                                                <div>{{$item->name_product}}</div>
                                                <div style="opacity: 0.7;font-size: 14px;">{{$item->color}} -
                                                    {{$item->internal_memory}}
                                                </div>
                                                <div>{{$item->price}}đ</div>
                                                <div style="font-size: 14px;">Số lượng: {{$item->quantity}}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="footer_order_table">
                                        <div class="table_item">Thành tiền:<span
                                                style="font-size: 25px;">{{$order->total_price}}</span>đ
                                        </div>
                                        @if (in_array($order->order_status_id, [1, 2, 3]))
                                            <button class="rattingBtn" onclick="showPopup()">Hủy đơn hàng</button>
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
                                        <div class="table_item">Mã đơn hàng: #{{$order->order_code}}</div>
                                        <div class="table_item" style="text-align: right;">
                                            {{App\Models\OrderStatus::find($order->order_status_id)->name}}
                                        </div>
                                    </div>
                                    @foreach (App\Models\OrderItem::where('order_id', $order->id)->get() as $item)
                                        <div class="body_order_table">
                                            <div class="table_item" style="padding-left: 5px;"><img
                                                    src="{{asset('images/' . App\Models\ProductVariant::find($item->product_variant_id)->image)}}"
                                                    width="100px" alt="image"></div>
                                            <div class="table_item" style="width: 85%;font-size: 16px;">
                                                <div>{{$item->name_product}}</div>
                                                <div style="opacity: 0.7;font-size: 14px;">{{$item->color}} -
                                                    {{$item->internal_memory}}
                                                </div>
                                                <div>{{$item->price}}đ</div>
                                                <div style="font-size: 14px;">Số lượng: {{$item->quantity}}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="footer_order_table">
                                        <div class="table_item">Thành tiền:<span
                                                style="font-size: 25px;">{{$order->total_price}}</span>đ
                                        </div>
                                        <button class="rattingBtn" onclick="showPopup()">Hủy đơn hàng</button>
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
                                        <div class="table_item">Mã đơn hàng: #{{$order->order_code}}</div>
                                        <div class="table_item" style="text-align: right;">
                                            {{App\Models\OrderStatus::find($order->order_status_id)->name}}
                                        </div>
                                    </div>
                                    @foreach (App\Models\OrderItem::where('order_id', $order->id)->get() as $item)
                                        <div class="body_order_table">
                                            <div class="table_item" style="padding-left: 5px;"><img
                                                    src="{{asset('images/' . App\Models\ProductVariant::find($item->product_variant_id)->image)}}"
                                                    width="100px" alt="image"></div>
                                            <div class="table_item" style="width: 85%;font-size: 16px;">
                                                <div>{{$item->name_product}}</div>
                                                <div style="opacity: 0.7;font-size: 14px;">{{$item->color}} -
                                                    {{$item->internal_memory}}
                                                </div>
                                                <div>{{$item->price}}đ</div>
                                                <div style="font-size: 14px;">Số lượng: {{$item->quantity}}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="footer_order_table">
                                        <div class="table_item">Thành tiền:<span
                                                style="font-size: 25px;">{{$order->total_price}}</span>đ
                                        </div>
                                        <button class="rattingBtn" onclick="showPopup()">Hủy đơn hàng</button>
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
                                        <div class="table_item">Mã đơn hàng: #{{$order->order_code}}</div>
                                        <div class="table_item" style="text-align: right;">
                                            {{App\Models\OrderStatus::find($order->order_status_id)->name}}
                                        </div>
                                    </div>
                                    @foreach (App\Models\OrderItem::where('order_id', $order->id)->get() as $item)
                                        <div class="body_order_table">
                                            <div class="table_item" style="padding-left: 5px;"><img
                                                    src="{{asset('images/' . App\Models\ProductVariant::find($item->product_variant_id)->image)}}"
                                                    width="100px" alt="image"></div>
                                            <div class="table_item" style="width: 85%;font-size: 16px;">
                                                <div>{{$item->name_product}}</div>
                                                <div style="opacity: 0.7;font-size: 14px;">{{$item->color}} -
                                                    {{$item->internal_memory}}
                                                </div>
                                                <div>{{$item->price}}đ</div>
                                                <div style="font-size: 14px;">Số lượng: {{$item->quantity}}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="footer_order_table">
                                        <div class="table_item">Thành tiền:<span
                                                style="font-size: 25px;">{{$order->total_price}}</span>đ
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
                                        <div class="table_item">Mã đơn hàng: #{{$order->order_code}}</div>
                                        <div class="table_item" style="text-align: right;">
                                            {{App\Models\OrderStatus::find($order->order_status_id)->name}}
                                        </div>
                                    </div>
                                    @foreach (App\Models\OrderItem::where('order_id', $order->id)->get() as $item)
                                        <div class="body_order_table">
                                            <div class="table_item" style="padding-left: 5px;"><img
                                                    src="{{asset('images/' . App\Models\ProductVariant::find($item->product_variant_id)->image)}}"
                                                    width="100px" alt="image"></div>
                                            <div class="table_item" style="width: 85%;font-size: 16px;">
                                                <div>{{$item->name_product}}</div>
                                                <div style="opacity: 0.7;font-size: 14px;">{{$item->color}} -
                                                    {{$item->internal_memory}}
                                                </div>
                                                <div>{{$item->price}}đ</div>
                                                <div style="font-size: 14px;">Số lượng: {{$item->quantity}}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="footer_order_table">
                                        <div class="table_item">Thành tiền:<span
                                                style="font-size: 25px;">{{$order->total_price}}</span>đ
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
                                        <div class="table_item">Mã đơn hàng: #{{$order->order_code}}</div>
                                        <div class="table_item" style="text-align: right;">
                                            {{App\Models\OrderStatus::find($order->order_status_id)->name}}
                                        </div>
                                    </div>
                                    @foreach (App\Models\OrderItem::where('order_id', $order->id)->get() as $item)
                                        <div class="body_order_table">
                                            <div class="table_item" style="padding-left: 5px;"><img
                                                    src="{{asset('images/' . App\Models\ProductVariant::find($item->product_variant_id)->image)}}"
                                                    width="100px" alt="image"></div>
                                            <div class="table_item" style="width: 85%;font-size: 16px;">
                                                <div>{{$item->name_product}}</div>
                                                <div style="opacity: 0.7;font-size: 14px;">{{$item->color}} -
                                                    {{$item->internal_memory}}
                                                </div>
                                                <div>{{$item->price}}đ</div>
                                                <div style="font-size: 14px;">Số lượng: {{$item->quantity}}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="footer_order_table">
                                        <div class="table_item">Thành tiền:<span
                                                style="font-size: 25px;">{{$order->total_price}}</span>đ
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
                                        <div class="table_item">Mã đơn hàng: #{{$order->order_code}}</div>
                                        <div class="table_item" style="text-align: right;">
                                            {{App\Models\OrderStatus::find($order->order_status_id)->name}}
                                        </div>
                                    </div>
                                    @foreach (App\Models\OrderItem::where('order_id', $order->id)->get() as $item)
                                        <div class="body_order_table">
                                            <div class="table_item" style="padding-left: 5px;"><img
                                                    src="{{asset('images/' . App\Models\ProductVariant::find($item->product_variant_id)->image)}}"
                                                    width="100px" alt="image"></div>
                                            <div class="table_item" style="width: 85%;font-size: 16px;">
                                                <div>{{$item->name_product}}</div>
                                                <div style="opacity: 0.7;font-size: 14px;">{{$item->color}} -
                                                    {{$item->internal_memory}}
                                                </div>
                                                <div>{{$item->price}}đ</div>
                                                <div style="font-size: 14px;">Số lượng: {{$item->quantity}}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="footer_order_table">
                                        <div class="table_item">Thành tiền:<span
                                                style="font-size: 25px;">{{$order->total_price}}</span>đ
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
                <div class="popup_table">
                    <form class="popup_form" action="" method="">
                        <div class="table_item" style="padding-left: 5px;"><img src="/images/1.jpg" width="100px"
                                alt="MSI">
                        </div>
                        <div class="table_item" id="table_item" style="width: 85%;font-size: 16px;">
                            <div>Laptop MSI Katana 15 B13VEK-252VN i7-13620H | 8GB | 512GB | RTX 4050
                                6GB|15.6' FHD 144Hz</div>
                            <div style="opacity: 0.7;font-size: 14px;">Laptop MSI</div>
                            <div style="font-size: 14px;">x1</div>
                            <div style="font-size: 14px;">Giá: 32 990 000</div>
                            <div class="star-ratting">
                                <input type="hidden" name="point" id="point">
                                <label for="star5" class="fas fa-star point" data-id="1"></label>
                                <label for="star4" class="fas fa-star point" data-id="2"></label>
                                <label for="star3" class="fas fa-star point" data-id="3"></label>
                                <label for="star2" class="fas fa-star point" data-id="4"></label>
                                <label for="star1" class="fas fa-star point" data-id="5"></label>
                            </div>
                            <textarea name="feedback" style="padding:5px 7px" id=""
                                placeholder="Nhập ý kiến của bạn..."></textarea>
                            <button type="submit" style="padding: 5px 20px;">Đánh giá</button>
                        </div>
                    </form>
                    <form class="popup_form" action="" method="">
                        <div class="table_item" style="padding-left: 5px;"><img src="/images/1.jpg" width="100px"
                                alt="MSI">
                        </div>
                        <div class="table_item" id="table_item" style="width: 85%;font-size: 16px;">
                            <div>Laptop MSI Katana 15 B13VEK-252VN i7-13620H | 8GB | 512GB | RTX 4050
                                6GB|15.6' FHD 144Hz</div>
                            <div style="opacity: 0.7;font-size: 14px;">Laptop MSI</div>
                            <div style="font-size: 14px;">x1</div>
                            <div style="font-size: 14px;">Giá: 32 990 000</div>
                            <div class="star-ratting">
                                <input type="hidden" name="point" id="point">
                                <label for="star5" class="fas fa-star point" data-id="1"></label>
                                <label for="star4" class="fas fa-star point" data-id="2"></label>
                                <label for="star3" class="fas fa-star point" data-id="3"></label>
                                <label for="star2" class="fas fa-star point" data-id="4"></label>
                                <label for="star1" class="fas fa-star point" data-id="5"></label>
                            </div>
                            <textarea name="feedback" style="padding:5px 7px" id=""
                                placeholder="Nhập ý kiến của bạn..."></textarea>
                            <button type="submit" style="padding: 5px 20px;">Đánh giá</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script>
        function showPopup() {
            const popup_order_history = document.getElementById("popup_order_history");
            const closeBtn = document.querySelector(".close_popup_rating");
            const submitButton = document.getElementById("submit");
            popup_order_history.style.display = "block";

            // Khi nhấn vào dấu "x", ẩn popup
            closeBtn.onclick = function () {
                popup_order_history.style.display = "none";
            }
        }

        // Khi nhấn ra ngoài popup, ẩn popup
        window.onclick = function (event) {
            if (event.target === popup_order_history) {
                popup_order_history.style.display = "none";
            }
        }

        //Khi nhấn số sao
        const form_rating = document.querySelectorAll('.popup_form  ')

        form_rating.forEach((item) => {
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
    </script>
    @endsection