@extends('layouts.layouts_admin')
@section('title', 'Trang thêm danh mục')
@section('active', 'active')
<style>
    .btn-goback>button>a {
        color: white;
    }

    #inputContainer .form-control {
        margin-bottom: 5px;
    }
</style>
@section('content')
    <div class="separator"></div>
    <div class="content">
        <div class="head">
            <div class="title">Thêm danh mục</div>
        </div>
        <div class="btn-goback">
            <button type="button"><a href="{{ route('admin.category') }}">&laquo; Trở lại</a></button>
        </div>
        <div class="separator_x">
            @if (session('message'))
                <script>
                    alertify.success("{{ session('message') }}");
                </script>
            @endif
            <div class="row">
                <form action="{{ route('admin.category.storecategory') }}" method="POST" id="formAddCategory">
                    <div class="form-group">
                        <div class="col">
                            <label>Tên danh mục:</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="nameCategory" name="nameCategory">
                            @error('nameCategory')
                                <span class="text-danger" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label> Thông số kĩ thuật: </label>
                        </div>
                        <div class="col">
                            <button id="btn_addSpecifications" type="button"> Thêm thông số kĩ thuật</button>
                        </div>
                        <div class="col" id="inputContainer">
                            @error('nameSpecifications')
                                <span class="text-danger" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="btn-goback">
                        @csrf
                        <button>Xác nhận thêm</button>
                        <button>Hủy</button>
                    </div>
                </form>
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
                                        href="{{ route('admin.category.editcategory', ['id' => $item->id]) }}"><i
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
                <div class="pagination">
                    <a href="{{ $danhSachDanhMuc->previousPageUrl() }}"><i class="fa-solid fa-chevron-left"></i></a>
                    @if ($danhSachDanhMuc->currentPage() - 1 != 0)
                        <a
                            href="{{ $danhSachDanhMuc->previousPageUrl() }}">{{ $danhSachDanhMuc->currentPage() - 1 }}</i></a>
                    @endif
                    <a href="{{ $danhSachDanhMuc->currentPage() }}" class="active">
                        {{ $danhSachDanhMuc->currentPage() }}</a>
                    @if ($danhSachDanhMuc->currentPage() != $danhSachDanhMuc->lastPage())
                        <a href="{{ $danhSachDanhMuc->nextPageUrl() }}">{{ $danhSachDanhMuc->currentPage() + 1 }}</a>
                    @endif
                    <a href="{{ $danhSachDanhMuc->nextPageUrl() }}"><i class="fa-solid fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        const btnAddSpecifications = document.getElementById('btn_addSpecifications');
        const inputContainer = document.getElementById('inputContainer');

        btnAddSpecifications.addEventListener('click', function() {
            const newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.className = 'form-control';
            newInput.name = 'nameSpecifications[]';
            newInput.placeholder = 'Nhập thông số kĩ thuật';

            // Thêm ô input mới vào container
            inputContainer.appendChild(newInput);
        });
        // });
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
                        window.location.href = '/admin/addcategory';
                    } else {
                        alert('Đã có lỗi xảy ra: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
@endsection
