@extends('layouts.layouts_admin')
@section('title', 'Trang cập nhật sản phẩm')
@section('active-product', 'active')
@section('content')
    <div class="separator"></div>
    <div class="content">
        <div class="head">
            <div class="title">Sửa sản phẩm</div>
        </div>
        <div class="btn-goback">
            <a href="{{ route('product.index') }}" type="button"> <button>&laquo; Trở lại</button></a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div> </div>
                        <form action="{{ route('product.update', [$sanPham]) }}" method="POST" id="formAddProduct"
                            class="form-product" enctype="multipart/form-data">

                            <div class=" form-groups">
                                <div class="form-group-product">
                                    <input type="hidden" name="id" value="{{ $sanPham->id }}">
                                    <div class="col"><label>Tên sản phẩm:</label></div>
                                    <div class="col"><input type="text" class="form-control" id="name"
                                            name="name" value="{{ $sanPham->name }}" required
                                            oninvalid="this.setCustomValidity('Vui lòng nhập tên sản phẩm')"></div>
                                    @error('name')
                                        <span class="text-danger" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group-product">
                                    <div class="col"><label>Mô tả:</label></div>
                                    <textarea name="description" required>{{ $sanPham->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group-product">
                                    <div>
                                        <div class="col"><label>Danh mục:</label></div>
                                        <div class="col">
                                            <select name="category" onchange="loadBrandAndCategorySpe(this)" disabled>
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
                                    <div> <button type="button" data-idx={{ count($sanPham->image_products) }}
                                            onclick="addImage(this)">Thêm hình ảnh</button>
                                    </div>
                                    @for ($i = 0; $i < count($sanPham->image_products); $i++)
                                        <div class="col" id="image-products">
                                            <img id="output-{{ $i + 1 }}" style="witdh: 70px; height: 70px"
                                                src="{{ asset('/images/' . $sanPham->image_products[$i]->image) }}" />
                                            <input type="file" data-index={{ $i + 1 }}
                                                onchange="loadFile(event,this)" class="form-control"
                                                style="background-color:white" name="image[{{ $i }}]">
                                            <input type="hidden" name="image_id[{{ $i }}]"
                                                value="{{ $sanPham->image_products[$i]->id }}">
                                        </div>

                                        @error('image')
                                            <span class="text-danger" style="color:red">{{ $message }}</span>
                                        @enderror
                                    @endfor
                                </div>
                            </div>
                            <div class="form-groups" id="category-specification">
                                @foreach ($sanPham->product_specification as $index => $specification)
                                    <div class=" form-group-product">
                                        <div class="col">
                                            <label>{{ $specification->category_specification->name }}</label>
                                        </div>
                                        <div class="col">
                                            <input type="hidden" name="specification[{{ $index }}]"
                                                value="{{ $specification->id }}">
                                            <input type="text" class="form-control" name="value[{{ $index }}]"
                                                value="{{ $specification->value }}" required>
                                        </div>
                                    </div>
                                @endforeach
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
        function loadBrandAndCategorySpe(category) {
            loadCategorySpecification(category);
            loadBrands(category);
        }

        function loadCategorySpecification(category) {
            const opt = category.value;
            let idx = 0;
            $.ajax({
                    method: "GET",
                    url: `/admin/category-specification/${opt}`
                })
                .done((data) => {
                    const categorySpecifications = data.map((spe) => {

                        return `<div class=" form-group-product">
                                <div class="col">
                                    <label>${spe.name}</label>
                                </div>
                                <div class="col">
                                    <input type="hidden" name="specification[${idx}]" value="${spe.id}">
                                    <input type="text" class="form-control" name="value[${idx++}]" required>
                                </div>
                            </div>`;
                    });

                    const categorySpe = document.getElementById('category-specification');
                    categorySpe.innerHTML = categorySpecifications.join('');
                })
        }

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
        function addImage(btn) {
            let idx = Number(++btn.dataset.idx);
            const image = `<div class="col">
                                        <img id="output-${idx}" />
                                        <input type="file" data-index=${idx} onchange="loadFile(event,this)" class="form-control"
                                            style="background-color:white" name="image[${idx-1}] required">
                                        <input type="hidden" name="image_id[${idx-1}]" value="-1">
                            </div>`;
            document.getElementById('image-products').insertAdjacentHTML('afterend', image);
        }
    </script>
    <script>
        var loadFile = function(event, img) {
            const idx = img.dataset.index;
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output-' + idx);
                output.src = reader.result;
                output.style.width = "150px";
                output.style.height = "150px";
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
    <script>
        const message = document.getElementById('message');
        if (message !== null) {
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
    <script>
        @if (session('msg'))
            alertify.alert('Thông báo','{{ session('msg') }}');
        @endif
    </script>
    <script>
        @if ($errors->any())
            alertify.alert('Thông báo','Vui lòng nhập đầy đủ các trường!');
        @endif
    </script>
@endsection
