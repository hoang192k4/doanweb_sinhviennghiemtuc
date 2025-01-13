@extends('layouts.layouts_admin')
@section('title', 'Trang cập nhật danh mục')
@section('active', 'active')
<style>
    .btn-goback>button>a {
        color: white;
    }
</style>
@section('content')
    <div class="separator"></div>
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    <div class="content">
        <div class="head">
            <div class="title">Sửa phân loại</div>
        </div>
        <div class="btn-goback">
            <button type="button" class="btn-height"><a href="{{ route('admin.category') }}">&laquo; Trở lại</a></button>
        </div>
        <div class="separator_x">
            <div class="row">
                <form action="{{ route('admin.category.updateCategory', ['id' => $danhMucTimKiem->id]) }}" method="POST"
                    id="formAddCategory" class="form-category">
                    <div class="form-group">
                        <div class="col">
                            <label>Tên phân loại:</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="nameCategory" name="nameCategory"
                                value="{{ $danhMucTimKiem->name }}">
                        </div>
                        <div class="col">
                            @foreach ($thongSoKyThuat as $item)
                                <input type="text" class="form-control" id="nameSpecification" name="nameSpecification[]"
                                    style="margin-bottom:5px" value="{{ $item->name }}">
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <label>Trạng thái:</label>
                        </div>
                        <div class="col">
                            <select name="status" class="form-control">
                                <option value="1">Hiện</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                    </div>
                    @csrf
                    <div class="btn-goback">
                        <button type="submit">Xác nhận</button>
                        <button>Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
