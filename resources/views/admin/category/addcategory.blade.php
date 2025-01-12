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
                        <div class="col">
                            <label> Thông số kĩ thuật: </label>
                        </div>
                        <div class="col">
                            <button id="btn_addSpecifications" type="button"> Thêm thông số kĩ thuật</button>
                        </div>
                        <div class="col" id="inputContainer">
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
