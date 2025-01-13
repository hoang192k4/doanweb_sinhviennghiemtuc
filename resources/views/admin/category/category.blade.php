@extends('layouts.layouts_admin')
@section('title', 'Trang quản lý danh mục')
@section('active', 'active')
<style>
    #categoryForm>button {
        background-color: rgb(19, 93, 102);
        color: rgb(255, 255, 255);
        text-align: center;
        padding: 8px;
        width: 70px;
        margin-bottom: 12px;
        border-radius: 4px;
        float: right;
        margin-right: 10px;
        margin-top: 1px;
    }

    .filter {
        margin-top: 3px;
        margin-right: 5px;
        padding: 7px 30px;
        border-radius: 5px;
    }
</style>
@section('content')
    <div class="content" id="danhmuc">
        <div class="head">
            <div class="title">Quản Lý Danh Mục</div>
            <button><a href="{{ route('admin.category.addCategory') }}"><i class="fa-solid fa-plus"></i> Danh Mục
                </a></button>
            <button><a href="{{ route('admin.addbrand.index') }}"><i class="fa-solid fa-plus"></i> Thương hiệu</a></button>
            <div class="search">
                <form action="{{ route('admin.category.searchCategory') }}" method="GET">
                    <input name="keySearchCategory">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
        <div class="separator_x"></div>
        <form action="{{ route('filter.category', ['id' => 'all']) }}" method="GET">
            <select name="categoryFilter" id="categoryFilter">
                <option value="all">Tất cả</option>
                @foreach ($danhSachDanhMucLoc as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <button class="filter" style="float: inline-end;" type="submit">Lọc</button>
        </form>
        @if (session('message'))
            <h1>hello</h1>
            <div class="alert alert-warning">
                {{ session('message') }}
            </div>
        @endif
        <table>
            <thead>
                <tr>
                    <th style="width: 48px;">ID</th>
                    <th>Name</th>
                    <th style="width: 48px;">Sửa</th>
                    <th style="width: 48px;">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($danhSachDanhMuc as $item)
                    <tr>
                        <td style="text-align: center;">{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td style="text-align: center;"><a
                                href="{{ route('admin.category.editCategory', ['id' => $item->id]) }}"><i
                                    class="fa-solid fa-check"></i></a></td>
                        <td style="text-align: center;">
                            <a onclick="popup('dm', {{ $item->id }})" data-id="{{ $item->id }}">
                                <i class="fa-solid fa-x"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="popup_admin" id="popupdm">
            <h3 style="color: white;">Bạn có thật sự muốn xóa danh mục ... ?</h3>
            <p style="color: white;">* Danh mục bị xóa sẽ không thể khôi phục nữa *</p>
            <p id="alert"></p>



            <div class="button">
                <button id="deleteBtn">Đồng ý </button>
                <button onclick="cancel('dm')">Hủy</button>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function popup(action, id) {
            console.log('ID nhận được:', id);

            // Hiển thị popup
            const popupElement = document.getElementById('popupdm');
            popupElement.style.display = 'block';

            // Lưu ID vào nút "Đồng ý"
            const deleteButton = document.getElementById('deleteBtn');
            deleteButton.setAttribute('data-id', id);
        }
        document.getElementById('deleteBtn').addEventListener('click', function() {
            const categoryId = this.getAttribute('data-id');


            fetch(`/admin/deletecategory/${categoryId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        alert('Xóa danh mục thành công');
                        window.location.href = '/admin/category';
                    } else {
                        alert('Đã có lỗi xảy ra');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
@endsection
