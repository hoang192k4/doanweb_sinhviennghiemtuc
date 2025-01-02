@extends('layouts.layouts_admin')
@section('title', 'Trang quản lý sản phẩm')
@section('content')
    <div class="content" id="sanpham">
        <div class="head">
            <div class="title">Quản Lý Sản Phẩm</div>
            <button><a href="{{ route('product.create') }}"><i class="fa-solid fa-plus"></i> Thêm</a></button>
            <button><a href="ql_sanpham_duyet.html"><i class="fa-solid fa-check-to-slot"></i> Duyệt</a></button>
            <div class="search">
                <form action="{{ route('admin.product.search') }}">
                    <input type="text" name="key" id="key">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
        <div class="separator_x">
            @if (session('msg'))
                <p id="message" style="display: block; color: green;">{{ session('msg') }}</p>
            @endif
        </div>
        <select onchange="findProduct(this)">
            <option value="all">Tất cả</option>
            <option value="dien-thoai">Điện thoại</option>
            <option value="laptop">Laptop</option>
        </select>
        <table>
            <thead>
                <tr>
                    <th style="width: 48px;">ID</th>
                    <th>Tên sản phẩm</th>
                    <th style="width: 48px;">Sửa</th>
                    <th style="width: 48px;">Ẩn</th>
                </tr>
            </thead>
            <tbody id="table">
                @foreach ($danhSachSanPham as $sanPham)
                    <tr>
                        <td style="text-align: center;"> {{ $sanPham->id }}</td>
                        <td>{{ $sanPham->name }}</td>
                        <td style="text-align: center;"><a href="{{ route('product.edit', ['product' => $sanPham->id]) }}"><i
                                    class="fa-regular fa-pen-to-square"></i></a>
                        </td>
                        <td style="text-align: center;"><a onclick="popup('sp')"><i class="fa-regular fa-trash-can"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            <a href="#" class="active"><i class="fa-solid fa-chevron-left"></i></a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">...</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#" class="active"><i class="fa-solid fa-chevron-right"></i></a>
        </div>
        <div class="popup_admin" id="popupsp">
            <h3 style="color: white;">Bạn có thật sự muốn ẩn sản phẩm ... ?</h3>
            <div class="g-recaptcha" data-sitekey="6LcK2IwqAAAAAEvD9EBnJT6kQd6KBrAC7NyGUzWT"></div>
            <p id="alert"></p>
            <div class="button">
                <button onclick="submit()">Submit</button>
                <button onclick="cancel('sp')">Cancel</button>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        const message = document.getElementById('message');
        setTimeout(() => {
            message.style.display = 'none';
        }, 3000);
    </script>
    <script>
        function findProduct(opt) {
            const key = document.getElementById('key').value;
            $.ajax({
                    method: "GET",
                    url: `/admin/product/filter?opt=${opt.value}`
                })
                .done((danhSachSanPham) => {
                    const table = document.getElementById('table');
                    const danhSach = danhSachSanPham.map((sanpham) => {
                        return ` <tr>
                        <td style="text-align: center;"> ${sanpham.id} </td>
                        <td> ${sanpham.name}</td>
                        <td style="text-align: center;"><a href="/admin/product/${sanpham.id}/edit"><i class="fa-regular fa-pen-to-square"></i></a>
                        </td>
                        <td style="text-align: center;"><a onclick="popup('sp')"><i class="fa-regular fa-trash-can"></i></a>
                        </td>
                    </tr>`
                    });
                    table.innerHTML = danhSach.join('');
                })
        }
    </script>
@endsection
