@extends('layouts.layouts_admin')
@section('title', 'Trang thêm danh mục')
@section('active', 'active')
<style>
    .btn-goback>button>a {
        color: white;
    }
</style>
@section('content')
    <div class="separator"></div>
    <div class="content">
        <div class="head">
            <div class="title">Thêm phân loại</div>
        </div>
        <div class="btn-goback">
            <button type="button"><a href="{{ route('admin.category') }}">&laquo; Trở lại</a></button>
        </div>
        <div class="separator_x">
            @if (session('msg'))
                <div class="alert alert-success">
                    {{ session('msg') }}
                </div>
            @endif
            <div class="row">
                <form action="{{ route('admin.category.store') }}" method="POST" id="formAddCategory">
                    <div class="form-group">
                        <div class="col">
                            <label>Tên phân loại:</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="nameCategory" name="nameCategory">
                            @if ($errors->has('nameCategory'))
                                <span class="text-danger">{{ $errors->first('nameCategory') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="btn-goback">
                        @csrf
                        <button>Xác nhận thêm</button>
                        <button>Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
