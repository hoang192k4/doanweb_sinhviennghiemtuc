@extends('layouts.layouts_admin')
@section('title', 'Trang quản lý sản phẩm')
@section('active-product', 'active')
@section('content')
    <div class="content" id="sanpham">
        <div class="head">
            <div class="title">Quản Lý Sản Phẩm</div>
            <button><a href="{{ route('product.create') }}"><i class="fa-solid fa-plus"></i> Thêm</a></button>
            <button><a href="{{ route('admin.product.unapproved') }}"><i class="fa-solid fa-check-to-slot"></i>
                    Duyệt</a></button>
            <div class="search">
                <form action="{{ route('admin.product.search') }}">
                    <input type="text" name="key" id="key">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
        <div class="separator_x">

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
                    <th style="width: 55px;">Variants</th>
                    <th style="width: 48px;">Sửa</th>
                    <th style="width: 48px;">Ẩn</th>
                </tr>
            </thead>
            <tbody id="table">

                @foreach ($danhSachSanPham as $sanPham)

                    <tr id="product-{{ $sanPham->id }}">
                        <td style="text-align: center;"> {{ $sanPham->id }}</td>
                        <td>{{ $sanPham->name }}</td>
                        <td style="text-align: center;"> <a
                                href="{{ route('admin.product_variant.index', [$sanPham->id]) }}"> <i
                                    class="fa-solid fa-code"></i></a> </td>
                        <td style="text-align: center;"><a
                                href="{{ route('product.edit', ['product' => $sanPham->id]) }}"><i
                                    class="fa-regular fa-pen-to-square"></i></a>
                        </td>
                        <td style="text-align: center;"><a onclick="showPopupProduct({id:{{$sanPham->id}},name:'{{$sanPham->name}}'})" class="cursor"><i
                                    class="fa-regular fa-trash-can"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            <a href="{{$danhSachSanPham->previousPageUrl()}}"><i class="fa-solid fa-chevron-left"></i></a>
            @if($danhSachSanPham->currentPage()-1!=0) <a href="{{$danhSachSanPham->previousPageUrl()}}">{{$danhSachSanPham->currentPage()-1}}</i></a> @endif
            <a href="{{$danhSachSanPham->currentPage()}}" class="active"> {{$danhSachSanPham->currentPage()}}</a>
            @if($danhSachSanPham->currentPage()!= $danhSachSanPham->lastPage())<a href="{{$danhSachSanPham->nextPageUrl()}}">{{$danhSachSanPham->currentPage() + 1}}</a> @endif
            <a href="{{$danhSachSanPham->nextPageUrl()}}"><i class="fa-solid fa-chevron-right"></i></a>
        </div>
        <div class="popup_admin" id="popupsp">
            <h3 style="color: white;">Bạn có thật sự muốn ẩn sản phẩm ... ?</h3>
            <div class="g-recaptcha" data-sitekey="6LcK2IwqAAAAAEvD9EBnJT6kQd6KBrAC7NyGUzWT"></div>
            <p id="alert"></p>
            <div class="button">
                <button onclick="submitHideProduct(this.dataset.id)">Submit</button>
                <button onclick="cancel('sp')">Cancel</button>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function showPopupProduct(product) {

            const popupProduct = document.getElementById('popupsp');
            popupProduct.children[0].textContent = `Bạn có thật sự muốn ẩn sản phẩm ${product.name}?`;
            popupProduct.children[3].children[0].dataset.id = product.id;
            popupProduct.style.display = 'block';
        }

        function submitHideProduct(id) {
            document.getElementById('popupsp').style.display = "none";
            $.ajax({
                    method: "GET",
                    url: `/admin/product/deactive/${id}`
                })
                .done((data) => {
                    const row = document.getElementById(`product-${id}`);
                    let table = row.parentNode;
                    table.removeChild(row);

                    alertify
                        .alert("Thông báo",data);
                })
        }
    </script>

    <script>
        function findProduct(opt) {
            const key = document.getElementById('key').value;
            $.ajax({
                    method: "GET",
                    url: `/admin/product/filter?opt=${opt.value}`
                })
                .done((danhSachSanPham) => {
                    console.log(danhSachSanPham);

                    const table = document.getElementById('table');
                    const danhSach = danhSachSanPham.map((sanpham) => {

                        return ` <tr id="product-${sanpham.id}">
                        <td style="text-align: center;"> ${sanpham.id} </td>
                        <td> ${sanpham.name}</td>
                        <td style="text-align: center;"> <a href="{{ route('admin.product_variant.index', [$sanPham->id]) }}"> <i class="fa-solid fa-code"></i></a> </td>
                        <td style="text-align: center;"><a href="/admin/product/${sanpham.id}/edit"><i class="fa-regular fa-pen-to-square"></i></a>
                        </td>
                        <td style="text-align: center;"><a class="cursor" onclick='showPopupProduct({"id":${sanpham.id},"name":"${sanpham.name}"})'><i class="fa-regular fa-trash-can"></i></a>
                        </td>
                    </tr>`
                    });
                    table.innerHTML = danhSach.join('');
                })
        }
    </script>

    <script>
        @if (session('msg'))

            alertify
                .alert("Thông báo","{{ session('msg') }}" );
        @endif
    </script>
@endsection
