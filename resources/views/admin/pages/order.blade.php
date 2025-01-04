@extends('layouts.layouts_admin')
@section('title', 'Trang quản lý đơn hàng')
@section('content')
<div class="content" id="donhang">
    <div class="head">
        <div class="title">Quản Lý Đơn Hàng</div>
        <button><i class="fa-regular fa-file-excel"></i> Xuất file</button>
        <div class="search">
            <input>
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>
    <div class="separator_x"></div>
    <div class="tabs">
        <div class="active">Chuẩn bị</div>
        <div>Vận chuyển</div>
        <div>Thành công</div>
        <div>Trả hàng</div>
        <div>Đã hủy</div>
    </div>
    <div class="table" id="chuanbi">
        <table>
            @isset($chuanBiDonHangs)
            <thead>
                <tr>
                    <th style="width: 48px;">ID</th>
                    <th>Order code</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>total price</th>
                    <th style="width: 48px;">Xong</th>
                    <th style="width: 48px;">Hủy</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($chuanBiDonHangs as $donHang)
                <tr>
                    <td style="text-align: center;">{{$donHang->id}}</td>
                    <td>{{$donHang->order_code}}</td>
                    <td>{{$donHang->full_name}}</td>
                    <td>{{$donHang->phone}}</td>
                    <td>{{$donHang->address}}</td>
                    <td>{{$donHang->total_price}}</td>
                    <td style="text-align: center;"><a href=""><i class="fa-solid fa-check"></i></a></td>
                    <td style="text-align: center;"><a onclick="popup('huy')"><i class="fa-solid fa-x"></i></a></td>
                </tr>
                @endforeach

            </tbody>
            @endisset
        </table>
    </div>
    <div class="table" id="vanchuyen" style="display: none;">
        <table>
            @isset($vanChuyenDonHangs)
            <thead>
                <tr>
                    <th style="width: 48px;">ID</th>
                    <th>Order code</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>total price</th>
                    <th style="width: 48px;">Xong</th>
                    <th style="width: 48px;">Hủy</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vanChuyenDonHangs as $donHang)
                <tr>
                    
                    <td style="text-align: center;">{{$donHang->id}}</td>
                    <td>{{$donHang->order_code}}</td>
                    <td>{{$donHang->full_name}}</td>
                    <td>{{$donHang->phone}}</td>
                    <td>{{$donHang->address}}</td>
                    <td>{{$donHang->total_price}}</td>
                    <td style="text-align: center;"><a href=""><i class="fa-solid fa-check"></i></a></td>
                    <td style="text-align: center;"><a onclick="popup('huy')"><i class="fa-solid fa-x"></i></a></td>
                </tr>                                    
                @endforeach
                {{-- <tr>
                    <td style="text-align: center;">2</td>
                    <td>Anh Thư</td>
                    <td style="text-align: center;"><a href=""><i class="fa-solid fa-check"></i></a></td>
                    <td style="text-align: center;"><a onclick="popup('huy')"><i class="fa-solid fa-x"></i></a></td>
                </tr> --}}
            </tbody>
            @endisset
        </table>
    </div>
    <div class="table" id="thanhcong" style="display: none;">
        <table>
            @isset($giaoHangThanhCong)
            <thead>
                <tr>
                    <th style="width: 48px;">ID</th>
                    <th>Order code</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>total price</th>
                    <th style="width: 48px;">Xong</th>
                    <th style="width: 48px;">Hủy</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($giaoHangThanhCong as $donHang)
                <tr>
                    
                    <td style="text-align: center;">{{$donHang->id}}</td>
                    <td>{{$donHang->order_code}}</td>
                    <td>{{$donHang->full_name}}</td>
                    <td>{{$donHang->phone}}</td>
                    <td>{{$donHang->address}}</td>
                    <td>{{$donHang->total_price}}</td>
                    <td style="text-align: center;"><a href=""><i class="fa-solid fa-check"></i></a></td>
                    <td style="text-align: center;"><a onclick="popup('huy')"><i class="fa-solid fa-x"></i></a></td>
                </tr>                                    
                @endforeach
            </tbody>
            @endisset
        </table>
    </div>
    <div class="table" id="trahang" style="display: none;">
        <table>
            <thead>
                <tr>
                    <th style="width: 48px;">ID</th>
                    <th>Name</th>
                    <th style="width: 48px;">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;">1</td>
                    <td>Nguyễn Thùy</td>
                    <td style="text-align: center;"><a onclick="popup('xoa')"><i class="fa-solid fa-x"></i></a></td>
                </tr>
                <tr>
                    <td style="text-align: center;">2</td>
                    <td>Anh Thư</td>
                    <td style="text-align: center;"><a onclick="popup('xoa')"><i class="fa-solid fa-x"></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="table" id="dahuy" style="display: none;">
        <table>
            <thead>
                <tr>
                    <th style="width: 48px;">ID</th>
                    <th>Name</th>
                    <th style="width: 48px;">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;">1</td>
                    <td>Nguyễn Thùy</td>
                    <td style="text-align: center;"><a onclick="popup('xoa')"><i class="fa-solid fa-x"></i></a></td>
                </tr>
                <tr>
                    <td style="text-align: center;">2</td>
                    <td>Anh Thư</td>
                    <td style="text-align: center;"><a onclick="popup('xoa')"><i class="fa-solid fa-x"></i></a></td>
                </tr>
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
            <button onclick="submit()">Submit</button>
            <button onclick="cancel('huy')">Cancel</button>
        </div>
    </div>
    <div class="popup_admin" id="popupxoa">
        <h3 style="color: white;">Bạn có thật sự muốn xóa đơn hàng ... ?</h3>
        <p style="color: white;">* Đơn hàng bị xóa sẽ không thể khôi phục nữa *</p>
        <div class="g-recaptcha" data-sitekey="6LcK2IwqAAAAAEvD9EBnJT6kQd6KBrAC7NyGUzWT"></div>
        <p id="alert"></p>
        <div class="button">
            <button onclick="submit()">Submit</button>
            <button onclick="cancel('xoa')">Cancel</button>
        </div>
    </div>
</div>
@endsection
