@extends('layouts.layouts_admin')
@section('title', 'Trang thêm sản phẩm')
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
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" id="formAddProduct"
                class="form-product">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col">
                            <div class=" form-groups">
                                <div class="form-group-product">
                                    <div class="col"><label>Tên sản phẩm:</label></div>
                                    <div class="col"><input type="text" class="form-control" id="name"
                                            name="name"></div>
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
                                            <select name="category" onchange="loadBrands(this)">
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
                                    <div> <button type="button" data-idx=1 onclick="addImage(this)">Thêm hình ảnh</button> </div>
                                    <div class="col" id="image-products">
                                        <img id="output-1" />
                                        <input type="file" data-index=1 onchange="loadFile(event,this)" class="form-control"
                                            style="background-color:white" name="image[0]">
                                    </div>
                                    @error('image')
                                        <span class="text-danger" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-groups">
                                <div class=" form-group-product">
                                    <div class="col">
                                        <label>Màn hình</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="display">
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
                                        <input type="text" class="form-control" name="technic_screen">
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
                                        <input type="text" class="form-control" name="resolution">
                                        @error('resolution')
                                            <div class="text-danger" style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" form-group-product">
                                    <div class="col"><label>Chipset</label></div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="chipset">
                                        @error('chipset')
                                            <div class="text-danger" style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" form-group-product">
                                    <div class="col"><label>Ram</label></div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="ram">
                                        @error('ram')
                                            <div class="text-danger" style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" form-group-product">
                                    <div class="col"><label>Camera</label></div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="camera">
                                        @error('camera')
                                            <div class="text-danger" style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" form-group-product">
                                    <div class="col"><label>Hệ điều hành</label></div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="os">
                                        @error('os')
                                            <div class="text-danger" style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" form-group-product">
                                    <div class="col"><label>Kích thước sản phẩm</label></div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="size">
                                        @error('size')
                                            <div class="text-danger" style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" form-group-product">
                                    <div class="col"><label>Ngày ra mắt</label></div>
                                    <div class="col">
                                        <input type="date" class="form-control" name="launch_time">
                                        @error('launch_time')
                                            <div class="text-danger" style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            @csrf
                        </div>
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
        function loadBrands(category){
            const opt = category.value;
            $.ajax({
                method: "GET",
                url:`/admin/brand/filter/${opt}`
            })
            .done((data)=>{
                const brands = data.map((brand)=>{
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
                            </div>`;
            document.getElementById('image-products').insertAdjacentHTML('beforeend',image);
        }
    </script>
@endsection
