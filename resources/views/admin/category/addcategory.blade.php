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
                {{-- {{ $danhSachDanhMuc->links() }} --}}
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
    </script>
@endsection
