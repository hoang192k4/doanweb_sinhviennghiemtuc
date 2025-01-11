@extends('layouts.layouts_admin')
@section('title', 'Trang cập nhật thương hiệu')
@section('active','active')
@section('content')
    <div class="separator"></div>
    <div class="content">
        <div class="head">
            <div class="title">Sua thương hiệu</div>
        </div>
        <div class="btn-goback">
            <button type="button">&laquo; Trở lại</button>
        </div>
        <div class="separator_x">
            <div class="row">
                <form action="" id="formAddCategory" class="form-category">
                    <div class="form-group">
                        <div class="col">
                            <label>Tên thương hiệu:</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="nameCategory">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <label>Tên phân loại:</label>
                        </div>
                        <div class="col">
                            <select name="status" class="form-control">
                                <option value="status-1">Laptop</option>
                                <option value="status-2">SmartPhone</option>
                                <option value="status-2">PC</option>
                                <option value="status-2">Phu kien</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <label>Trạng thái:</label>
                        </div>
                        <div class="col">
                            <select name="status" class="form-control">
                                <option value="status-1">status 1</option>
                                <option value="status-2">status 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="btn-goback">
                        <button type="submit">Xác nhận thêm</button>
                        <button>Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
