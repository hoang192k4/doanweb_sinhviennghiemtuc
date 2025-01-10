@extends('layouts.layouts_admin')
@section('title', 'Trang quản lý sản phẩm duyệt')
@section('active-product','active')
@section('content')
    <div class="separator"></div>
    <div class="content">
        <div class="head">
            <div class="title">Duyệt Sản Phẩm</div>
            <button><a href="{{ route('product.index') }}"><i class="fa-solid fa-arrow-left"></i>
                    Trở về</a></button>
            <button> <a href="{{ route('product.create') }}"> <i class="fa-solid fa-plus"></i> Thêm </a></button>
            <div class="search">
                <input>
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
        <div class="separator_x"></div>
        <select>
            <option value="">Tất cả</option>
            <option value="">Điện thoại</option>
            <option value="">Laptop</option>
        </select>
        <div class="tabs">
            <div class="active">Chờ duyệt</div>
            <div>Tạm ẩn</div>
        </div>

        <div class="table" id="choduyet">
            @if(isset($danhSachSanPham)&& count($danhSachSanPham)>0)
            <table>
                <thead>
                    <tr>
                        <th style="width: 48px;">ID</th>
                        <th>Tên sản phẩm</th>
                        <th style="width: 48px;">Duyệt</th>
                        <th style="width: 55px;">Variants</th>
                        <th style="width: 48px;">Chi tiết</th>
                        <th style="width: 48px;">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($danhSachSanPham as $sanPham)
                        <tr>
                            <td style="text-align: center;">{{ $sanPham->id }}</td>
                            <td> {{ $sanPham->name }}</td>
                            <td style="text-align: center;"><a
                                    href="{{ route('admin.product.active', ['id' => $sanPham->id]) }}"><i
                                        class="fa-solid fa-check"></i></a></td>
                            <td style="text-align: center;"> <a
                                    href="{{ route('product_variant_hide', [$sanPham->id]) }}"> <i
                                        class="fa-solid fa-code"></i></a> </td>
                            <td style="text-align: center;"><a
                                    href="{{ route('product.edit', ['product' => $sanPham->id]) }}"><i
                                        class="fa-regular fa-pen-to-square"></i></a>
                            </td>
                            <td style="text-align: center;"><button class="cursor"
                                    style="background-color: white;color:rgb(19, 93, 102)"
                                    onclick="showPopupDelete({{ $sanPham }})"><i class="fa-solid fa-x"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <p style="text-align: center;font-size:25px">Không có sản phẩm chờ duyệt!!!</p>
            @endif
        </div>
        <div class="table" id="taman" style="display: none;">
            @if(isset($danhSachSanPhamBiAn) && count($danhSachSanPhamBiAn)>0)
            <table>
                <thead>
                    <tr>
                        <th style="width: 48px;">ID</th>
                        <th>Tên sản phẩm</th>
                        <th style="width: 48px;">Hiển thị</th>
                        <th style="width: 55px;">Variants</th>
                        <th style="width: 48px;">Chi tiết</th>
                        <th style="width: 48px;">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($danhSachSanPhamBiAn as $sanPham)
                    <tr>
                        <td style="text-align: center;">{{ $sanPham->id }}</td>
                        <td> {{ $sanPham->name }}</td>
                        <td style="text-align: center;"><a
                                href="{{ route('admin.product.active', ['id' => $sanPham->id]) }}"><i
                                    class="fa-solid fa-check"></i></a></td>
                        <td style="text-align: center;"> <a
                                href="{{ route('product_variant_hide', [$sanPham->id]) }}"> <i
                                    class="fa-solid fa-code"></i></a> </td>
                        <td style="text-align: center;"><a
                                href="{{ route('product.edit', ['product' => $sanPham->id]) }}"><i
                                    class="fa-regular fa-pen-to-square"></i></a>
                        </td>
                        <td style="text-align: center;"><button class="cursor"
                                style="background-color: white;color:rgb(19, 93, 102)"
                                onclick="showPopupDelete({{ $sanPham }})"><i class="fa-solid fa-x"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        @else
            <p style="text-align: center;font-size:25px">Không có sản phẩm bị ẩn</p>
        @endif
        <div class="popup_admin" id="popupduyet">
            <h3 style="color: white;">Bạn có thật sự muốn xóa sản phẩm ... ?</h3>
            <p style="color: white;">* Sản phẩm bị xóa sẽ không thể khôi phục nữa *</p>
            <div class="g-recaptcha" data-sitekey="6LcK2IwqAAAAAEvD9EBnJT6kQd6KBrAC7NyGUzWT"></div>
            <p id="alert"></p>
            <div class="button">
                <button class="cursor" onclick="submitDelete(this.dataset.id)">Submit</button>
                <button class="cursor" onclick="cancel('duyet')">Cancel</button>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function showPopupDelete(product) {
            let popupDelete = document.getElementById('popupduyet');
            popupDelete.children[0].textContent = `Bạn có thật sự muốn xóa sản phẩm ${product.name} ?`;
            popupDelete.children[4].children[0].dataset.id = product.id;
            popupDelete.style.display = "block";
        }

        function submitDelete(id) {
            $.ajax({
                    method: "POST",
                    url: `/admin/product/${id}`,
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'delete'
                    }
                })
                .done((data) => {
                    alertify.success(data);
                    setTimeout(()=>{
                        window.location.reload();
                    },1000)
                })

            document.getElementById('popupduyet').style.display = "none";
        }
    </script>
    <script>
        const message = document.getElementById('message');
        if (message !== null) {
            setTimeout(() => {
                message.style.display = 'none';
            }, 3000);
        }
    </script>
    <script>
        @if (session('msg'))
            alertify.success('{{ session('msg') }}');
        @endif
    </script>
@endsection
@section('css')
    <style>

    </style>

@endsection
