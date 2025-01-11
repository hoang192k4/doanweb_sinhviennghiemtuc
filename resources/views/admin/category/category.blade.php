@extends('layouts.layouts_admin')
@section('title', 'Trang quản lý danh mục')
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
</style>
@section('content')
    <div class="content" id="danhmuc">
        <div class="head">
            <div class="title">Quản Lý Danh Mục</div>
            <button><a href="{{ route('admin.category.addCategory') }}"><i class="fa-solid fa-plus"></i> Phân
                    loại</a></button>
            <button><a href="{{ route('admin.addbrand.index') }}"><i class="fa-solid fa-plus"></i> Thương hiệu</a></button>
            <div class="search">
                <form action="{{ route('admin.category.searchCategory') }}" method="GET">
                    <input name="keySearchCategory">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
        <div class="separator_x"></div>
        <form action="{{ route('admin.category.searchCategory') }}" method="GET" id="categoryForm">

            <select name="categoryFilter" onchange="filter()">
                <option value="all">Tất cả</option>
                @foreach ($danhSachDanhMuc as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <button type="submit">Lọc</button>
        </form>
        @if (session('message'))
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
                        <td style="text-align: center;"><a onclick="popup('dm')"><i class="fa-solid fa-x"></i></a>
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
        <div class="popup_admin" id="popupdm">
            <h3 style="color: white;">Bạn có thật sự muốn xóa danh mục ... ?</h3>
            <p style="color: white;">* Danh mục bị xóa sẽ không thể khôi phục nữa *</p>
            <div class="g-recaptcha" data-sitekey="6LcK2IwqAAAAAEvD9EBnJT6kQd6KBrAC7NyGUzWT"></div>
            <p id="alert"></p>
            <div class="button">
                <button onclick="submit()">Submit</button>
                <button onclick="cancel('dm')">Cancel</button>
            </div>
        </div>
    </div>
@endsection
<script>
    function filter() {
        document.getElementbyId('categoryForm').submit();
    }
</script>
