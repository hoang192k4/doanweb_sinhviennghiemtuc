@extends('layouts.layouts_admin')
@section('title', 'Trang quản lý danh mục')
@section('active-category', 'active')
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
            <button><a href="{{ route('admin.category.addcategory') }}"> Danh Mục
                </a></button>
            <button><a href="{{ route('admin.category.addbrand') }}"><i class="fa-solid fa-plus"></i> Thương hiệu</a></button>
            <div class="search">
                <form action="{{ route('admin.category.searchbrand') }}" method="GET">
                    <input name="keySearchBrand">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
        <div class="separator_x"></div>
        <form id="filterForm">
            <select name="categoryFilter" id="categoryFilter">
                <option value="all">Tất cả</option>
                @foreach ($danhSachDanhMucLoc as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </form>
        @if ($danhSachThuongHieu->isEmpty())
            @if (isset($message))
                <div class="alert alert-warning" style="font-size: 20px">
                    {{ $message }}
                </div>
            @endif
        @else
            <table>
                <thead>
                    <tr>
                        <th style="width: 48px;">ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th style="width: 48px;">Sửa</th>
                        <th style="width: 48px;">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($danhSachThuongHieu as $item)
                        <tr>
                            <td style="text-align: center;">{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->image }}</td>
                            <td style="text-align: center;"><a
                                    href="{{ route('admin.category.editbrand', ['id' => $item->id]) }}"><i
                                        class="fa-regular fa-pen-to-square"></i></a></td>
                            <td style="text-align: center;">
                                <a onclick="popup('delete', {{ $item->id }})" data-id="{{ $item->id }}">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        {{ $danhSachThuongHieu->links() }}
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
            const brandId = this.getAttribute('data-id');

            fetch(`/admin/deletebrand/${brandId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    return response.json().then(data => {
                        return {
                            ok: response.ok,
                            data: data
                        }; // Trả về một đối tượng chứa cả ok và data
                    });
                })
                .then(({
                    ok,
                    data
                }) => {
                    if (ok) {
                        alertify.success(data.message);
                        window.location.href = '/admin/category';
                    } else {
                        alert('Đã có lỗi xảy ra: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });

        document.getElementById('categoryFilter').addEventListener('change', function() {
            const categoryId = this.value;

            fetch(`{{ route('filter.category', ['id' => 'all']) }}?categoryFilter=${categoryId}`)
                .then(response => response.json())
                .then(data => {
                    // Cập nhật bảng với dữ liệu mới
                    const tbody = document.querySelector('table tbody');
                    tbody.innerHTML = ''; // Xóa nội dung cũ

                    if (data.length === 0) {
                        tbody.innerHTML =
                            '<tr><td colspan="5" style="text-align: center;">Không có danh mục nào để hiển thị.</td></tr>';
                    } else {
                        data.forEach(item => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                            <td style="text-align: center;">${item.id}</td>
                            <td>${item.name}</td>
                            <td>${item.image}</td>
                            <td style="text-align: center;">
                                <a href="/admin/category/edit/${item.id}"><i class="fa-solid fa-check"></i></a>
                            </td>
                            <td style="text-align: center;">
                                <a onclick="popup('dm', ${item.id})" data-id="${item.id}">
                                    <i class="fa-solid fa-x"></i>
                                </a>
                            </td>
                        `;
                            tbody.appendChild(row);
                        });
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
@endsection
