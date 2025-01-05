@extends('layouts.layouts_admin')
@section('title', 'Trang quản lí các biến thể')
@section('content')
    <div class="separator">
    </div>
    <div class="content">
        <div class="head">
            <div class="title"> Quản lí biến thể</div>
        </div>
        <div class="btn-goback">
            <a href="{{ route('product.index') }}" type="button"> <button>&laquo; Trở lại</button></a>
        </div>
        <div class="row">
            <div>
                <button type="button" class="cursor" onclick="addVariant()">Thêm biến thể</button>
            </div>

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            @if (session('msg'))
                                <p id="msg" style="display: block; color: green;">{{ session('msg') }}</p>
                            @endif
                        </div>

                        <table>
                            <thead>
                                <th>#</th>
                                <th>Màu sắc</th>
                                <th>Dung lượng</th>
                                <th>Giá</th>
                                <th>Tồn kho</th>
                                <th>Hình ảnh</th>
                                <th>Cập nhật</th>
                                <th>Xóa</th>
                            </thead>
                            <tbody id="table-variants">
                                @foreach ($danhSachBienThe as $bienTheId => $bienThe)
                                    <form action="{{route('product-variant.update',[$bienThe])}}" method="POST" id="formAddProduct" class="form-product"
                                        enctype="multipart/form-data">
                                        <tr>
                                            @csrf
                                            @method('put')
                                            <td>{{ $bienThe->id }}</td>
                                            <td> <input class="input-variant" type="text" value="{{ $bienThe->color }}" name="color">
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
                                            <td style="text-align:center"> <i class="fa-solid fa-x"></i> </td>
                                        </tr>

                                    </form>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
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

        function addVariant() {
            const variant = ` <tr>
                                            <td>{{ $bienThe->id }}</td>
                                            <td> <input class="input-variant" type="text" value=""></td>
                                            <td> <input class="input-variant" type="text" value=""></td>
                                            <td> <input class="input-variant" type="number" min="0" value=""></td>
                                            <td> <input class="input-variant" type="number" min="0" value=""></td>
                                            <td><img style="max-width:50px;"src="" alt=""> <input type="file" class="input-variant"></td>
                                            <td><button>Cập nhật</button> </td>
                                            <td style="text-align:center"> <i class="fa-solid fa-x"></i> </td>
                                        </tr>`;
            document.getElementById('table-variants').insertAdjacentHTML('afterend', variant);
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
    </script>
@endsection
@section('css')
    <style>
        .input-variant {
            width: 50px;
        }
    </style>
@endsection
