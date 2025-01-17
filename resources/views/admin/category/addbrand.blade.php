@extends('layouts.layouts_admin')
@section('title', 'Trang thêm thương hiệu')
@section('active-category', 'active')
<style>
    .btn-goback>button>a {
        color: white;
    }
</style>
@section('content')
    <div class="separator"></div>
    <div class="content">
        <div class="head">
            <div class="title">Thêm thương hiệu</div>
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
                <form action="{{ route('admin.category.storebrand') }}" method="POST" id="formAddCategory"
                    class="form-category">
                    <div class="form-group">
                        <div class="col">
                            <label>Tên thương hiệu:</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="nameBrand" name="nameBrand">
                            @error('nameBrand')
                                <span class="text-danger" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="file" name="imageBrand" id="imageBrand">
                            @error('imageBrand')
                                <span class="text-danger" style="color:red">{{ $message }}</span>
                            @enderror
                            <img id="previewImage" src="" alt="Hình ảnh sản phẩm" width="100px" height="100px">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <label>Tên phân loại:</label>
                        </div>
                        <div class="col">
                            <select name="nameCategory" class="form-control">
                                @foreach ($danhSachDanhMuc as $item)
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
                        <button type="button" id="cancelButton">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        const imageBrand = document.getElementById('imageBrand');
        let previewImage = document.getElementById('previewImage');

        imageBrand.onchange = (evt) => {
            const [file] = imageBrand.files;
            if (file) {
                previewImage.src = URL.createObjectURL(file);
            }
        }

        document.getElementById('cancelButton').addEventListener('click', function() {
            document.getElementById('nameBrand').value = '';
            document.getElementById('imageBrand').value = '';
            document.getElementById('previewImage').src = '';
        });
    </script>
@endsection
