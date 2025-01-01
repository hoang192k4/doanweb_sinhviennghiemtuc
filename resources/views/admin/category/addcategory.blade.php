@extends('layouts.layouts_admin')
@section('title', 'Trang thêm danh mục')
@section('content')
    <div class="separator"></div>
    <div class="content">
        <div class="head">
            <div class="title">Thêm phân loại</div>
        </div>
        <div class="btn-goback">
            <button type="button">&laquo; Trở lại</button>
        </div>
        <div class="separator_x">
            <div class="row">
                <form action="" id="formAddCategory">
                    <div class="form-group">
                        <div class="col">
                            <label>Tên phân loại:</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="nameCategory">
                        </div>
                    </div>
                    <div class="btn-goback">
                        <button>Xác nhận thêm</button>
                        <button>Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
