@extends('layouts.layouts_admin')
@section('title', 'Trang thêm sản phẩm')
@section('content')
    <div class="separator"></div>
    <div class="content">
        <div class="head">
            <div class="title">Thêm sản phẩm</div>
        </div>
        <div class="btn-goback">
            <button type="button">&laquo; Trở lại</button>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">

                        <form action="{{route('product.store')}}" method="POST" id="formAddProduct" class="form-product">
                            <div class=" form-groups">
                                <div class="form-group-product">
                                    <div class="col"><label>Tên sản phẩm:</label></div>
                                    <div class="col"><input type="text" class="form-control" id="name" name="name"></div>
                                    @error('name')
                                        <span class="text-danger" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group-product">
                                    <div class="col"><label>Mô tả:</label></div>
                                    <textarea name="description"></textarea>
                                    @error('description')
                                        <span class="text-danger" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group-product">
                                    <div>
                                        <div class="col"><label>Danh mục:</label></div>
                                        <div class="col">
                                            <select name="category">
                                                @foreach ( $danhSachPhanLoai as $phanLoai )
                                                    <option value="{{$phanLoai->id}}">{{$phanLoai->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="col"><label>Thương hiệu:</label></div>
                                        <div class="col">
                                            <select name="brand">
                                                @foreach ( $danhSachThuongHieu as $thuongHieu )
                                                    <option value="{{$thuongHieu->id}}">{{$thuongHieu->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-product">
                                    <div class="col">
                                        <label>Hình ảnh:</label>
                                    </div>
                                    <div class="col">
                                        <img id="output"/>
                                        <input type="file" onchange="loadFile(event)" class="form-control" style="background-color:white" name="image">
                                    </div>
                                    @error('image')
                                        <span class="text-danger" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class=" form-groups">

                            </div>
                            @csrf
                            <div class="btn-goback button-product">
                                <button type="submit">Xác nhận</button>
                                <button type="button">Hủy</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    var loadFile = function(event) {
      var reader = new FileReader();
      reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
        output.style.width = "150px";
        output.style.height = "150px";
      };
      reader.readAsDataURL(event.target.files[0]);
    };
  </script>
  <script>
    function notification(){
        setTimeout(() => {
        message.style.display = 'none';
    }, 3000);
    }

  </script>
@endsection
