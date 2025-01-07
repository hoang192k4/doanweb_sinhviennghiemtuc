@extends('layouts.layouts_admin')
@section('title', 'Trang quản lí các biến thể')
@section('content')
    <div class="separator">
    </div>
    <div class="content">
        <div class="head">
            <div class="title"> Quản lí biến thể</div>
            <button><a href="{{ route('product_variant_hide', [$product->id]) }}"><i
                        class="fa-solid fa-lock"></i></i>Biến thể bị ẩn</a></button>
        </div>
        <div class="btn-goback">
            <a href="{{ route('product.index') }}" type="button"> <button>&laquo; Trở lại</button></a>
        </div>
        <div class="row">
            <div>
                <button type="button" class="cursor" data-id=0 id="btn-add"onclick="addVariant(this.dataset.id)">Thêm
                    biến thể</button>
            </div>

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            @if (session('msg'))
                                <p id="msg" style="display: block; color: green;">{{ session('msg') }}</p>
                            @endif
                        </div>
                        @if(isset($danhSachBienThe) && count($danhSachBienThe)>0)
                        <table>
                            <thead>
                                <th>#</th>
                                <th>Màu sắc</th>
                                <th>Dung lượng</th>
                                <th>Giá</th>
                                <th>Tồn kho</th>
                                <th>Hình ảnh</th>
                                <th colspan="2">Thao tác</th>
                            </thead>
                            <tbody id="table-variants">
                                @foreach ($danhSachBienThe as $bienTheId => $bienThe)
                                    <form action="{{ route('product-variant.update', [$bienThe]) }}" method="POST"
                                        id="formAddProduct" class="form-product" enctype="multipart/form-data">
                                        <tr id="variant-{{ $bienThe->id }}">
                                            @csrf
                                            @method('put')
                                            <td>{{ $bienThe->id }}</td>
                                            <td> <input class="input-variant" type="text" value="{{ $bienThe->color }}"
                                                    name="color">
                                            </td>
                                            <td> <input class="input-variant" type="text"
                                                    value="{{ $bienThe->internal_memory }}" name="internal_memory"></td>
                                            <td> <input style="width: 75px"type="number" min="0"
                                                    value="{{ $bienThe->price }}" name="price"></td>
                                            <td> <input class="input-variant" type="number" min="0"
                                                    value="{{ $bienThe->stock }}" name="stock"></td>
                                            <td><img id="image-{{ $bienTheId }}"
                                                    style="max-width:50px;"src="{{ asset('images/' . $bienThe->image) }}"
                                                    alt=""> <input type="file"
                                                    onchange="reviewImage(event,'image-{{ $bienTheId }}')"
                                                    class="input-variant" name="image">
                                            </td>

                                            <td><button>Cập nhật</button> </td>
                                            <td style="text-align:center"> <i class="fa-solid fa-x cursor"
                                                    onclick="showVariantHiddenForm({{ $bienThe->id }})"></i> </td>
                                        </tr>

                                    </form>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p style="text-align: center;font-size:25px">Không có variant của sản phẩm {{$product->name}} được hiển thị!!!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup_admin" id="variant-popup">
        <h3 style="color: white;" id="variant-text">Bạn có thật sự muốn ẩn sản phẩm ... ?</h3>
        <div class="g-recaptcha" data-sitekey="6LcK2IwqAAAAAEvD9EBnJT6kQd6KBrAC7NyGUzWT"></div>
        <p id="alert"></p>
        <div class="button">
            <button id="submit-hidden" onclick="submitHideVariant(this.dataset.id)">Đồng ý</button>
            <button onclick="cancel()" class="cursor">Hủy</button>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function showVariantHiddenForm(id) {
            document.getElementById('submit-hidden').dataset.id = id;
            document.getElementById('variant-text').textContent = `Bạn thật sự muốn ẩn variant ${id}?`;
            document.getElementById('variant-popup').style.display = "block";
        }

        function submitHideVariant(id) {
            $.ajax({
                    method: "POST",
                    url: `/admin/product-variant/${id}`,
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'delete'
                    }

                })
                .done((data) => {
                    const row = document.getElementById(`variant-${id}`);
                    row.parentNode.removeChild(row);
                    alert(data);
                })
            document.getElementById('variant-popup').style.display = "none";
        }

        function cancel() {
            document.getElementById('variant-popup').style.display = "none";
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
        const msg = document.getElementById('msg');
        if (msg !== null) {
            setTimeout(() => {
                msg.style.display = 'none';
            }, 3000);
        }

        function notification() {
            setTimeout(() => {
                msg.style.display = 'none';
            }, 3000);
        }

        function addVariant(id) {
            id++;
            const variant = `  <form action="{{ route('product-variant.store') }}" method="POST" id="formAddProduct" class="form-product" enctype="multipart/form-data">
                                        <tr>
                                                <td>@csrf</td>
                                                <td> <input class="input-variant" type="text" value="" id="color-${id}" name="color"></td>
                                                <td> <input class="input-variant" type="text" value="" id="internal_memory-${id}" name="internal_memory"></td>
                                                <td> <input class="input-variant" type="number" min="0" id="price-${id}" value="" name="price"></td>
                                                <td> <input class="input-variant" type="number" min="0" id="stock-${id}" value="" name="stock"></td>
                                                <td><img id="image"style="max-width:50px;"src="" alt=""> <input type="file" class="input-variant" name="image" id="image-input-${id}" onchange="reviewImage(event,'image');"></td>
                                                <td  colspan="2"><button type="submit" class="cursor" data-id="${id}"onclick="addVariantProduct(this.dataset.id)">Thêm</button> </td>

                                        </tr>
                             </form> `;
            document.getElementById('btn-add').dataset.id = id;
            document.getElementById('table-variants').insertAdjacentHTML('beforeend', variant);
        }


        function reviewImage(event, id) {
            let reader = new FileReader();
            reader.onload = function() {
                let output = document.getElementById(id);
                output.src = reader.result;
                output.style.width = "50px";
                output.style.height = "50px";
            };
            reader.readAsDataURL(event.target.files[0]);
        }


        function addVariantProduct(id) {
            const color = document.getElementById(`color-${id}`).value;
            const price = document.getElementById(`price-${id}`).value;
            const stock = document.getElementById(`stock-${id}`).value;
            const internalMemory = document.getElementById(`internal_memory-${id}`).value;
            const fileUpload = document.getElementById(`image-input-${id}`);
            fileUpload.addEventListener('change',(event)=>{
                const images = event.target.images;
            })
            $.ajax({
                method: "POST",
                url: '/admin/product-variant',
                data: {
                    _token: '{{ csrf_token() }}',
                    color,
                    price,
                    stock,
                    internal_memory: internalMemory,
                    product_id: '{{$product->id}}',
                }
            }).done((data)=>{
                alert(`Thêm thành công variant có id là ${data.id}! Trạng thái variant đang ẩn!!`);
                location.reload();
            })

        }
    </script>
@endsection
@section('css')
    <style>
        .input-variant {
            width: 50px;
        }
    </style>
@endsection
