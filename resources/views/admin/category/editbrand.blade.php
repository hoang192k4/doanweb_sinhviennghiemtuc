@extends('layouts.layouts_admin')
@section('title', 'Trang cập nhật thương hiệu')

{{-- ai chỉ viết style kiểu vầy dị --}}
<style>
    .btn-goback>button>a {
        color: white;
    }
</style>

@section('active-category','active')
@section('content')
    <div class="separator"></div>
    <div class="content">
        <div class="head">
            <div class="title">Sửa thương hiệu</div>
        </div>
        <div class="btn-goback">
            <button type="button"><a href="{{ route('admin.category') }}"> &laquo; Trở lại</a></button>
        </div>
        <div class="separator_x">
            <div class="row">
                <form action="{{ route('admin.category.updatebrand', ['id' => $thuongHieuTimKiem->id]) }}" method="POST"
                    id="formAddCategory" class="form-category">
                    <div class="form-group">
                        <div class="col">
                            <label>Tên thương hiệu:</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="nameBrand" name="nameBrand"
                                value="{{ $thuongHieuTimKiem->name }}">

                            @error('nameBrand')
                                <span class="text-danger" style="color:red">{{ $message }}</span>
                            @enderror
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
                    <div class="form-group">
                        <div class="col"
                            style=" display: flex;justify-content: space-between;  align-items:flex-start  ;">
                            <img id="previewImage" src="{{ asset('/images/' . $thuongHieuTimKiem->image) }}"
                                alt="Hình ảnh sản phẩm" width="100px" height="100px">
                            @error('imageBrand')
                                <span class="text-danger" style="color:red">{{ $message }}</span>
                            @enderror
                            <input type="file" name="imageBrand" id="imageBrand" accept="image/*"
                                onchange="loadFile(event)">
                        </div>
                        <p>{{ $thuongHieuTimKiem->image }}</p>
                    </div>
                    <div class="btn-goback">
                        @csrf
                        <button type="submit">Xác nhận thêm</button>
                        <button type="button" id="cancelButton">Hủy</button>
                    </div>
                </form>
                @if (session('message'))
                    <script>
                        alertify.success("{{ session('message') }}");
                    </script>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        const imageBrand = document.getElementById('imageBrand');
        let previewImage = document.getElementById('previewImage');

        //preview ảnh khi thêm
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

        //preview khi cập nhật
        function loadFile(event) {
            const preview = document.getElementById('previewImage');
            preview.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
