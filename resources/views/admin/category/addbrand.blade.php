@extends('layouts.layouts_admin')
@section('title', 'Trang thêm thương hiệu')
@section('content')
    <div class="separator"></div>
    <div class="content">
        <div class="head">
            <div class="title">Thêm thương hiệu</div>
        </div>
        <div class="btn-goback">
            <button type="button">&laquo; Trở lại</button>
        </div>
        <div class="separator_x">
            <div class="row">
                @if (session('msg'))
                    <div class="alert alert-success">
                        {{ session('msg') }}
                    </div>
                @endif
                <form action="{{ route('admin.addbrand.store') }}" method="POST" id="formAddCategory" class="form-category">
                    <div class="form-group">
                        <div class="col">
                            <label>Tên thương hiệu:</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="nameBrand" name="nameBrand">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <label>Tên phân loại:</label>
                        </div>
                        <div class="col">
                            <select name="nameCategory" class="form-control">
                                @foreach ($danhSachTenDanhMuc as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>

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
                    <div class="btn-goback">
                        @csrf
                        <button type="submit">Xác nhận thêm</button>
                        <button>Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
