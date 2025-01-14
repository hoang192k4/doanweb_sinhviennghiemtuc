@extends('layouts.layouts_admin')
@section('title', 'Trang quản lý liên hệ')
@section('active-contact', 'active')
@section('content')
    <div class="content" id="lienhe">
        <div class="head">
            <div class="title">Quản Lý Liên Hệ</div>
            <div class="search">
                <form>
                    <input>
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
        <div class="separator_x"></div>
        <div class="tabs">
            <div class="active">Chưa liên hệ</div>
            <div>Đã liên hệ</div>
        </div>
        <div class="table" id="chualh">
            <table>
                <thead>
                    <tr>
                        <th style="width: 48px;">ID</th>
                        <th>Họ tên</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th style="width: 48px;">Xong</th>
                        <th style="width: 48px;">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($danhSachLienHeChuaDuyet as $lienHe)
                        <tr>
                            <td style="text-align: center;">{{ $lienHe->id }} </td>
                            <td> {{ $lienHe->name }} </td>
                            <td> {{ $lienHe->phone }} </td>
                            <td>{{ $lienHe->email }} </td>
                            <td>{{ $lienHe->title }} </td>
                            <td>{{ $lienHe->content }} </td>
                            <td style="text-align: center;">
                                <a href="{{ route('contact.update', ['id' => $lienHe->id]) }}">
                                    <i class="fa-solid fa-check"></i>
                                </a>
                            </td>
                            <td style="text-align: center;"><button class="cursor" style="background-color: white;color:rgb(19, 93, 102)";
                                    onclick="showDeletePopup('{{ $lienHe->name }}',{{ $lienHe->id }})"><i
                                        class="fa-solid fa-x"></i></button></td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
        <div class="table" id="dalh" style="display: none;">
            <table>
                <thead>
                    <tr>
                        <th style="width: 48px;">ID</th>
                        <th>Họ tên</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th style="width: 48px;">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($danhSachLienHeDaDuyet as $lienHe)
                        <tr>
                            <td style="text-align: center;">{{ $lienHe->id }} </td>
                            <td> {{ $lienHe->name }} </td>
                            <td> {{ $lienHe->phone }} </td>
                            <td>{{ $lienHe->email }} </td>
                            <td>{{ $lienHe->title }} </td>
                            <td>{{ $lienHe->content }} </td>
                            <td style="text-align: center;">
                                <button class="cursor" style="background-color: white;color:rgb(19, 93, 102)" onclick="showDeletePopup('{{ $lienHe->name }}',{{ $lienHe->id }})"><i
                                        class="fa-solid fa-x"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination">
            <a href="#" class="active"><i class="fa-solid fa-chevron-left"></i></a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">...</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#" class="active"><i class="fa-solid fa-chevron-right"></i></a>
        </div>
        <div class="popup_admin" id="popuplh">
            <h3 style="color: white;">Bạn có thật sự muốn xóa liên hệ ... ?</h3>
            <p style="color: white;">* Liên hệ bị xóa sẽ không thể khôi phục nữa *</p>
            <div class="g-recaptcha" data-sitekey="6LdQrbAqAAAAAFciB1k-MQlHVnAcuVQIRPZHZHvF"></div>
            <p id="alert"></p>
            <div class="button">
                <button onclick="deleteContact(this.dataset.id)">Submit</button>
                <button onclick="cancel('lh')">Cancel</button>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function showDeletePopup(name, id) {
            let popup = document.getElementById('popuplh');
            popup.children[0].textContent = `Bạn có thật sự muốn xóa liên hệ ${name} ?`;
            popup.children[4].children[0].dataset.id = id;
            popup.style.display = "block";
        }

        function deleteContact(id) {
            $.ajax({
                    method: "POST",
                    url: `/admin/contact/delete/${id}`,
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'delete'
                    }
                })
                .done((data) => {
                    console.log(data);
                    alertify.alert('Thông báo',data.message);
                    setTimeout(()=>{
                        location.reload();
                    },1500);
                })
            document.getElementById('popuplh').style.display = "none";
        }
    </script>
@endsection
