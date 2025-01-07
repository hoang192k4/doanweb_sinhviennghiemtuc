@extends('layouts.layouts_admin')
@section('title', 'Trang quản lý đơn hàng')
@section('content')
    <div class="content" id="donhang">
        <div class="head">
            <div class="title">Quản Lý Đơn Hàng</div>
            <button><i class="fa-regular fa-file-excel"></i> Xuất file</button>
        </div>
        <div class="separator_x"></div>
        <div class="tabs">
            <div class="active">Chuẩn bị</div>
            <div>Vận chuyển</div>
            <div>Thành công</div>
            <div>Đã hủy</div>
            <div>Trả hàng</div>
        </div>
        <div class="table" id="chuanbi">
            <table>
                <thead>
                    <tr>
                        <th style="width: 48px;">ID</th>
                        <th>Order code</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th style="width: 48px;">Xong</th>
                        <th style="width: 48px;">Hủy</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Order::whereIn('order_status_id', [1, 2, 3])->get() as $order)
                        <tr>
                            <td style="text-align: center;">{{ $order->id }}</td>
                            <td style="text-align: center;">{{ $order->order_code }}</td>
                            <td>{{ $order->full_name }}</td>
                            <td style="text-align: center;">{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td style="text-align: center;">{{ $order->total_price }}</td>
                            <td style="text-align: center;">
                                {{ App\Models\PaymentMethod::find($order->payment_method)->name_method }}
                            </td>
                            <td style="text-align: center;">
                                <button
                                    style="background-color: rgb(255, 255, 255); color: rgb(19, 93, 102); font-size: 16px; padding: 0px;"
                                    class="btnChuanBi" data-id="{{ $order->id }}">
                                    <i class="fa-solid fa-check"></i>
                                </button>
                            </td>
                            <td style="text-align: center;">
                                <button onclick="showCancelPopup('{{ $order->full_name }}',{{ $order->id }})"><i
                                        class="fa-solid fa-x"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="table" id="vanchuyen" style="display: none;">
            <table>
                <thead>
                    <tr>
                        <th style="width: 48px;">ID</th>
                        <th>Order code</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th style="width: 48px;">Xong</th>
                        <th style="width: 48px;">Hủy</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Order::whereIn('order_status_id', [4, 5])->get() as $order)
                        <tr>
                            <td style="text-align: center;">{{ $order->id }}</td>
                            <td style="text-align: center;">{{ $order->order_code }}</td>
                            <td>{{ $order->full_name }}</td>
                            <td style="text-align: center;">{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td style="text-align: center;">{{ $order->total_price }}</td>
                            <td style="text-align: center;">
                                {{ App\Models\PaymentMethod::find($order->payment_method)->name_method }}
                            </td>
                            <td style="text-align: center;">
                                <button
                                    style="background-color: rgb(255, 255, 255); color: rgb(19, 93, 102); font-size: 16px; padding: 0px;"
                                    class="btnVanChuyen" data-id="{{ $order->id }}">
                                    <i class="fa-solid fa-check"></i>
                                </button>
                            </td>
                            <td style="text-align: center;">
                                <button onclick="showCancelPopup('{{ $order->full_name }}',{{ $order->id }})"><i
                                        class="fa-solid fa-x"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="table" id="thanhcong" style="display: none;">
            <table>
                <thead>
                    <tr>
                        <th style="width: 48px;">ID</th>
                        <th>Order code</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th style="width: 48px;">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Order::where('order_status_id', 6)->get() as $order)
                        <tr>
                            <td style="text-align: center;">{{ $order->id }}</td>
                            <td style="text-align: center;">{{ $order->order_code }}</td>
                            <td>{{ $order->full_name }}</td>
                            <td style="text-align: center;">{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td style="text-align: center;">{{ $order->total_price }}</td>
                            <td style="text-align: center;">
                                {{ App\Models\PaymentMethod::find($order->payment_method)->name_method }}
                            </td>
                            <td style="text-align: center;">
                                <button onclick="showDeletePopup('{{ $order->full_name }}',{{ $order->id }})"><i
                                        class="fa-solid fa-x"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="table" id="dahuy" style="display: none;">
            <table>
                <thead>
                    <tr>
                        <th style="width: 48px;">ID</th>
                        <th>Order code</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th style="width: 48px;">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Order::where('order_status_id', 7)->get() as $order)
                        <tr>
                            <td style="text-align: center;">{{ $order->id }}</td>
                            <td style="text-align: center;">{{ $order->order_code }}</td>
                            <td>{{ $order->full_name }}</td>
                            <td style="text-align: center;">{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td style="text-align: center;">{{ $order->total_price }}</td>
                            <td style="text-align: center;">
                                {{ App\Models\PaymentMethod::find($order->payment_method)->name_method }}
                            </td>
                            <td style="text-align: center;">
                                <button onclick="showDeletePopup('{{ $order->full_name }}',{{ $order->id }})"><i
                                        class="fa-solid fa-x"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="table" id="trahang" style="display: none;">
            <table>
                <thead>
                    <tr>
                        <th style="width: 48px;">ID</th>
                        <th>Order code</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th style="width: 48px;">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Order::where('order_status_id', 8)->get() as $order)
                        <tr>
                            <td style="text-align: center;">{{ $order->id }}</td>
                            <td style="text-align: center;">{{ $order->order_code }}</td>
                            <td>{{ $order->full_name }}</td>
                            <td style="text-align: center;">{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td style="text-align: center;">{{ $order->total_price }}</td>
                            <td style="text-align: center;">
                                {{ App\Models\PaymentMethod::find($order->payment_method)->name_method }}
                            </td>
                            <td style="text-align: center;">
                                <button onclick="showDeletePopup({{ $order->full_name }},{{ $order->id }})"><i
                                        class="fa-solid fa-x"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination">
            <a href="#" class="active"><i class="fa-solid fa-chevron-left"></i></a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">...</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#" class="active"><i class="fa-solid fa-chevron-right"></i></a>
        </div>
        <div class="popup_admin" id="popuphuy">
            <h3 style="color: white;">Bạn có thật sự muốn hủy đơn hàng ... ?</h3>
            <p style="color: white;">* Đơn hàng bị hủy sẽ không thể khôi phục nữa *</p>
            <div class="g-recaptcha" data-sitekey="6LcK2IwqAAAAAEvD9EBnJT6kQd6KBrAC7NyGUzWT"></div>
            <p id="alert"></p>
            <div class="button">
                <button onclick="cancelOrder(this.dataset.id)">Submit</button>
                <button onclick="cancel('huy')">Cancel</button>
            </div>
        </div>
        <div class="popup_admin" id="popupxoa">
            <h3 style="color: white;">Bạn có thật sự muốn xóa đơn hàng ... ?</h3>
            <p style="color: white;">* Đơn hàng bị xóa sẽ không thể khôi phục nữa *</p>
            <div class="g-recaptcha" data-sitekey="6LcK2IwqAAAAAEvD9EBnJT6kQd6KBrAC7NyGUzWT"></div>
            <p id="alert"></p>
            <div class="button">
                <button onclick="deleteOrder(this.dataset.id)">Submit</button>
                <button onclick="cancel('xoa')">Cancel</button>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btnChuanBi').on('click', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '/admin/updateChuanBi/' + id,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert(response.message);
                    },
                    error: function(xhr) {
                        alert('Có lỗi xảy ra: ' + xhr.responseText);
                    }
                });
            });
        });
        $(document).ready(function() {
            $('.btnVanChuyen').on('click', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '/admin/updateVanChuyen/' + id,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert(response.message);
                    },
                    error: function(xhr) {
                        alert('Có lỗi xảy ra: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>

@endsection
@section('script')

    <script>
        function showDeletePopup(full_name, id) {
            let popup = document.getElementById('popupxoa');
            popup.children[0].textContent = `Bạn có thật sự muốn ẩn đơn hàng của khách hàng ${full_name} ?`;
            popup.children[4].children[0].dataset.id = id;
            popup.style.display = "block";
        }

        function deleteOrder(id) {
            $.ajax({
                    type: "POST",
                    url: `admin/order/delete/${id}`,
                    data: {
                        _token: '{{ csrf_token() }}',

                    }
                })
                .done((data) => {
                    alert(data);
                    location.reload();
                })
                document.getElementById('popupxoa').style.display = "none";
        }
        
    </script>
    <script>
        function showCancelPopup(full_name, id) {
            let popup = document.getElementById('popuphuy');
            popup.children[0].textContent = `Bạn có thật sự muốn hủy đơn hàng của khách hàng ${full_name} ?`;
            popup.children[4].children[0].dataset.id = id;
            popup.style.display = "block";
        }
        function cancelOrder(id) {
            $.ajax({
                    method: "POST",
                    url: `admin/order/cancel/${id}`,
                    data: {
                        _token: '{{ csrf_token() }}',
                    }
                })
                .done((data) => {
                    alert(data);
                    location.reload();
                })
            document.getElementById('popuphuy').style.display = "none";
        }
    </script>
@endsection
