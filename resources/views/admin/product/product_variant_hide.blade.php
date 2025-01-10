@extends('layouts.layouts_admin')
@section('title', 'Trang quản lí các biến thể')
@section('active-product','active')
@section('content')
    <div class="separator">
    </div>
    <div class="content">
        <div class="head">
            <div class="title"> Quản lí biến thể bị ẩn</div>
            <button><a href="{{route('product_variant_hide',[$product->id])}}"><i class="fa-solid fa-lock"></i></i>Biến thể bị ẩn</a></button>
        </div>
        <div class="btn-goback">
            <a href="{{ route('admin.product_variant.index',[$product->id]) }}" type="button"> <button>&laquo; Trở lại</button></a>
        </div>
        <div class="row">
            <div>
                <button type="button" class="cursor" onclick="addVariant()">Thêm biến thể</button>
            </div>

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">

                        @if(count($danhSachBienThe)==0)
                            <p style="text-align: center;font-size:25px">Không có variant của sản phẩm {{$product->name}} bị ẩn!!!</p>
                        @else
                        <table>
                            <thead>
                                <th>#</th>
                                <th>Màu sắc</th>
                                <th>Dung lượng</th>
                                <th>Giá</th>
                                <th>Tồn kho</th>
                                <th>Hình ảnh</th>
                                <th>Cập nhật</th>
                                <th>Hiển thị</th>
                            </thead>
                            <tbody id="table-variants">
                                @foreach ($danhSachBienThe as $bienTheId => $bienThe)
                                    <form action="{{route('product-variant.update',[$bienThe])}}" method="POST" id="formAddProduct" class="form-product"
                                        enctype="multipart/form-data">
                                        <tr id="variant-{{$bienThe->id}}">
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
                                            <td style="text-align:center"> <i class="fa-regular fa-eye cursor" onclick="showVariantHiddenForm({{$bienThe->id}})" ></i> </td>
                                        </tr>

                                    </form>
                                @endforeach
                            </tbody>
                        </table>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup_admin" id="variant-popup">
        <h3 style="color: white;" id="variant-text">Bạn có thật sự muốn hiển thị sản phẩm ... ?</h3>
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
        function showVariantHiddenForm(id){
            document.getElementById('submit-hidden').dataset.id = id;
            document.getElementById('variant-text').textContent = `Bạn thật sự muốn hiển thị variant ${id}?`;
            document.getElementById('variant-popup').style.display = "block";
        }
        function submitHideVariant(id){
            $.ajax({
                method:"POST",
                url:`/admin/product-variant/active/${id}`,
                data:{
                    _token: '{{csrf_token()}}',
                    _method:'put'
                }

            })
            .done((data)=>{
                const row = document.getElementById(`variant-${id}`);
                row.parentNode.removeChild(row);
                alertify.alert(data);
            })
            document.getElementById('variant-popup').style.display = "none";
        }
        function cancel(){
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
     <script>
        @if(session('msg'))
            alertify.alert('{{session('msg')}}');
        @endif
    </script>
@endsection
@section('css')
    <style>
        .input-variant {
            width: 50px;
        }
    </style>
@endsection
