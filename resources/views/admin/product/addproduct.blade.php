@extends('layouts.layouts_admin')
@section('title', 'Trang thêm sản phẩm')
@section('active-product', 'active')
@section('content')
    <div class="separator"></div>
    <div class="content">
        <div class="head">
            <div class="title">Thêm sản phẩm</div>
        </div>
        <div class="btn-goback">
            <a href="{{ route('product.index') }}"><button type="button"> &laquo; Trở lại</button></a>
        </div>
        <div class="row">
            <div class="col-lg-8">

                <div class="row">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data"
                        id="formAddProduct" class="form-product">
                        <div class="col">
                            <div class="form-groups">
                                <div class="form-group-product">
                                    <div class="col"><label>Tên sản phẩm:</label></div>
                                    <div class="col"><input type="text" onkeyup="checkProduct(this.value)"
                                            class="form-control" id="name" name="name" required></div>
                                    <span id="isset-product"></span>
                                    @error('name')
                                        <span class="text-danger" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group-product">
                                    <div class="col"><label>Mô tả:</label></div>
                                    <textarea name="description" required></textarea>
                                    @error('description')
                                        <span class="text-danger" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group-product">
                                    <div>
                                        <div class="col"><label>Danh mục:</label></div>
                                        <div class="col">
                                            <select name="category" onchange="loadBrandAndCategorySpe(this)">
                                                @foreach ($danhSachPhanLoai as $phanLoai)
                                                    <option value="{{ $phanLoai->id }}">{{ $phanLoai->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="col"><label>Thương hiệu:</label></div>
                                        <div class="col">
                                            <select name="brand" id="brands">
                                                @foreach ($danhSachThuongHieu as $thuongHieu)
                                                    <option value="{{ $thuongHieu->id }}">{{ $thuongHieu->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-product">
                                    <div class="col">
                                        <label>Hình ảnh:</label>
                                    </div>
                                    <div> <button type="button" data-idx=1 onclick="addImage(this)">Thêm hình ảnh</button>
                                    </div>
                                    <div class="col" id="image-products">
                                        <img id="output-1" />
                                        <input type="file" data-index=1 onchange="loadFile(event,this)"
                                            class="form-control" style="background-color:white" name="image[0]" required>
                                    </div>
                                    @error('image')
                                        <span class="text-danger" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-groups" id="category-specification">
                                @foreach ($danhSachThongTinKyThuat as $index => $thongTinKyThuat)
                                    <div class=" form-group-product">
                                        <div class="col">
                                            <label>{{ $thongTinKyThuat->name }}</label>
                                        </div>
                                        <div class="col">
                                            <input type="hidden" name="specification[{{ $index }}]"
                                                value="{{ $thongTinKyThuat->id }}">
                                            <input type="text" class="form-control" name="value[{{ $index }}]" required>

                                        </div>
                                    </div>
                                @endforeach
                                {{-- Hiển thị xong --}}

                            </div>
                            <div class="row">
                                <p>Thêm các biến thể</p>
                                <div>
                                    <button type="button" data-index=0 onclick="addVariant(this)">Thêm biến thể</button>
                                </div>
                                <div id="variants">
                                    <div>
                                        <p>Biến thể 1</p>
                                        <span>
                                            Màu sắc
                                            <input type="text" name="variants[0][color]" required>
                                        </span>
                                        <span>
                                            Dung lượng
                                            <input type="text" name="variants[0][internal_memory]" required>
                                        </span>
                                        <span>
                                            Giá
                                            <input type="number" min="0" name="variants[0][price]" required>
                                        </span>
                                        <div>
                                            <span>
                                                Số lượng
                                                <input type="number" min="0" name="variants[0][stock]" required>
                                            </span>
                                            <span>
                                                Hình ảnh
                                                <input type="file" name="variants[0][image_variant]" required>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                                @csrf
                            </div>
                            <div class="btn-goback button-product">
                                <button type="submit">Xác nhận</button>
                                <button type="button">Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@section('script')
    <script>
        function checkProduct(name) {
            let issetSpan = document.getElementById('isset-product');
            name = name.trim();
            if (name === "") {
                issetSpan.style.color = "red";
                issetSpan.textContent = "Tên sản phẩm không được bỏ trống";
            } else {
                $.ajax({
                    method: "POST",
                    url: '/admin/product/is_isset',
                    data: {
                        name,
                        _token: '{{ csrf_token() }}',
                    }
                }).done((data) => {

                    if (data == 0) {
                        issetSpan.style.color = "green";
                        issetSpan.textContent = "Tên sản phẩm hợp lệ!";
                    } else {
                        issetSpan.style.color = "red";
                        issetSpan.textContent = "Tên sản phẩm đã tồn tại!";
                    }
                })
            }

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
        function notification() {
            setTimeout(() => {
                message.style.display = 'none';
            }, 3000);
        }
    </script>

    <script>
        function addVariant(btn) {
            btn.dataset.index++;
            const variants = document.getElementById('variants');
            const variant = `<div>
                            <p> Biến thể ${Number(btn.dataset.index)+1}</p>
                            <span>
                                Màu sắc
                                <input type="text" name="variants[${Number(btn.dataset.index)}][color]" required>
                            </span>
                            <span>
                                Dung lượng
                                <input type="text" name="variants[${Number(btn.dataset.index)}][internal_memory]" required>
                            </span>
                            <span>
                                Giá
                                <input type="number" min="0" name="variants[${Number(btn.dataset.index)}][price]" required>
                            </span>
                            <div>
                                <span>
                                    Số lượng
                                    <input type="number" min="0" name="variants[${Number(btn.dataset.index)}][stock]" required>
                                </span>
                                <span>
                                    Hình ảnh
                                    <input type="file" name="variants[${Number(btn.dataset.index)}][image_variant]" required>
                                </span>
                            </div>

                        </div>`;
            variants.insertAdjacentHTML('beforeend', variant);
        }
    </script>
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
                                            style="background-color:white" name="image[${idx-1}]" required>
                            </div>`;
            document.getElementById('image-products').insertAdjacentHTML('beforeend', image);
        }
    </script>
    <script>
        @if ($errors->any())
            alertify.alert('Thông báo','Vui lòng nhập đầy đủ các trường!');
        @endif
    </script>
    <script>
            const input = document.getElementById("name");
            input.addEventListener("invalid", function () {
            input.setCustomValidity("Vui lòng nhập tên sản phẩm vào đây!");
            input.addEventListener("input", function () {
            input.setCustomValidity("");
        });
        });
    </script>
@endsection
