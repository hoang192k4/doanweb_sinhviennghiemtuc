@extends('layouts.layouts_admin')
@section('title', 'Trang cập nhật sản phẩm')
@section('active-product','active')
@section('content')
    <div class="separator"></div>
    <div class="content">
        <div class="head">
            <div class="title">Sửa sản phẩm</div>
        </div>
        <div class="btn-goback">
            <a href="{{route('product.index')}}" type="button"> <button>&laquo; Trở lại</button></a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div> @if (session('msg'))
                            <p id="message" style="display: block; color: green;">{{ session('msg') }}</p>
                        @endif</div>
                        <form action="{{route('product.update',[$sanPham])}}" method="POST" id="formAddProduct" class="form-product" enctype="multipart/form-data">

                            <div class=" form-groups">
                                <div class="form-group-product">
                                    <input type="hidden" name="id" value="{{$sanPham->id}}">
                                    <div class="col"><label>Tên sản phẩm:</label></div>
                                    <div class="col"><input type="text" class="form-control" id="name"
                                            name="name" value="{{ $sanPham->name }}"></div>
                                    @error('name')
                                        <span class="text-danger" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group-product">
                                    <div class="col"><label>Mô tả:</label></div>
                                    <textarea name="description">{{ $sanPham->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group-product">
                                    <div>
                                        <div class="col"><label>Danh mục:</label></div>
                                        <div class="col">
                                            <select name="category" onchange="loadBrands(this)">
                                                @foreach ($danhSachPhanLoai as $phanLoai)
                                                    <option value="{{ $phanLoai->id }}"
                                                        @if ($phanLoai->id == $sanPham->brand->category->id) {{ 'selected' }} @endif>
                                                        {{ $phanLoai->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="col"><label>Thương hiệu:</label></div>
                                        <div class="col">
                                            <select name="brand" id="brands">
                                                @foreach ($danhSachThuongHieu as $thuongHieu)
                                                    <option value="{{ $thuongHieu->id }}"
                                                        @if ($sanPham->brand_id == $thuongHieu->id) {{ 'selected' }} @endif>
                                                        {{ $thuongHieu->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-product">
                                    <div class="col">
                                        <label>Hình ảnh:</label>
                                    </div>
                                    <div> <button type="button" data-idx={{count($sanPham->image_products)}} onclick="addImage(this)">Thêm hình ảnh</button>
                                    </div>
                                    @for ($i = 0; $i < count($sanPham->image_products);$i++)
                                        <div class="col" id="image-products" >
                                            <img id="output-{{$i+1}}" style="witdh: 70px; height: 70px" src="{{asset('/images/'.$sanPham->image_products[$i]->image)}}"/>
                                            <input type="file" data-index={{$i+1}} onchange="loadFile(event,this)"
                                                class="form-control" style="background-color:white" name="image[{{$i}}]">
                                            <input type="hidden" name="image_id[{{$i}}]" value="{{$sanPham->image_products[$i]->id}}">
                                        </div>

                                        @error('image')
                                            <span class="text-danger" style="color:red">{{ $message }}</span>
                                        @enderror
                                    @endfor



                                </div>
                            </div>
                            <div class="form-groups">
                                <div class=" form-group-product">
                                    <div class="col">
                                        <label>Màn hình</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="display"
                                            value="{{ $sanPham->product_specification->display }}">
                                        @error('display')
                                            <div class="text-danger" style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" form-group-product">
                                    <div class="col">
                                        <label>Công nghệ màn hình</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="technic_screen"
                                            value="{{ $sanPham->product_specification->technic_screen }}">
                                        @error('technic_screen')
                                            <div class="text-danger" style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" form-group-product">
                                    <div class="col">
                                        <label>Độ phân giải</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="resolution"
                                            value="{{ $sanPham->product_specification->resolution }}">
                                        @error('resolution')
                                            <div class="text-danger" style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" form-group-product">
                                    <div class="col"><label>Chipset</label></div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="chipset"
                                            value="{{ $sanPham->product_specification->chipset }}">
                                        @error('chipset')
                                            <div class="text-danger" style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" form-group-product">
                                    <div class="col"><label>Ram</label></div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="ram"
                                            value="{{ $sanPham->product_specification->ram }}">
                                        @error('ram')
                                            <div class="text-danger" style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" form-group-product">
                                    <div class="col"><label>Camera</label></div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="camera"
                                            value="{{ $sanPham->product_specification->camera }}">
                                        @error('camera')
                                            <div class="text-danger" style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" form-group-product">
                                    <div class="col"><label>Hệ điều hành</label></div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="os"
                                            value="{{ $sanPham->product_specification->operating_system }}">
                                        @error('os')
                                            <div class="text-danger" style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" form-group-product">
                                    <div class="col"><label>Kích thước sản phẩm</label></div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="size"
                                            value="{{ $sanPham->product_specification->size }}">
                                        @error('size')
                                            <div class="text-danger" style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" form-group-product">
                                    <div class="col"><label>Ngày ra mắt</label></div>
                                    <div class="col">
                                        <input type="date" class="form-control" name="launch_time"
                                            value="{{ $sanPham->product_specification->launch_time }}">
                                        @error('launch_time')
                                            <div class="text-danger" style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            @csrf
                            @method('put')
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
        function loadBrands(category) {
            const opt = category.value;
            $.ajax({
                    method: "GET",
                    url: `/admin/brand/filter/${opt}`
                })
                .done((data) => {
                    const brands = data.map((brand) => {
                        return `<option value="${brand.id}">${brand.name}</option>`;
                    });
                    const brandsHtml = document.getElementById('brands');
                    brandsHtml.innerHTML = brands.join('');
                })
        }
    </script>
     <script>
        function addImage(btn){
            let idx = Number(++btn.dataset.idx);
            const image = `<div class="col">
                                        <img id="output-${idx}" />
                                        <input type="file" data-index=${idx} onchange="loadFile(event,this)" class="form-control"
                                            style="background-color:white" name="image[${idx-1}]">
                                        <input type="hidden" name="image_id[${idx-1}]" value="-1">
                            </div>`;
            document.getElementById('image-products').insertAdjacentHTML('afterend',image);
        }
    </script>
     <script>
        var loadFile = function(event,img) {
            const idx = img.dataset.index;
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output-'+idx);
                output.src = reader.result;
                output.style.width = "150px";
                output.style.height = "150px";
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
        <script>
            const message = document.getElementById('message');
            if(message!==null){
                setTimeout(() => {
                message.style.display = 'none';
            }, 3000);
            }
            function notification() {
            setTimeout(() => {
                message.style.display = 'none';
            }, 3000);
        }
        </script>
@endsection
