@extends('layouts.layouts_admin')
@section('title', 'Trang quản lý sản phẩm duyệt')
@section('content')
    <div class="separator"></div>
    <div class="content">
        <div class="head">
            <div class="title">Duyệt Sản Phẩm</div>
            <button><a href="all.html"><i class="fa-solid fa-arrow-left"></i>
                    Trở về</a></button>
            <button><i class="fa-solid fa-plus"></i> Thêm</button>
            <div class="search">
                <input>
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
        <div class="separator_x"></div>
        <select>
            <option value="">Tất cả</option>
            <option value="">Điện thoại</option>
            <option value="">Laptop</option>
        </select>
        <div class="tabs">
            <div class="active">Chờ duyệt</div>
            <div>Tạm ẩn</div>
        </div>
        <div class="table" id="choduyet">
            <table>
                <thead>
                    <tr>
                        <th style="width: 48px;">ID</th>
                        <th>Name</th>
                        <th style="width: 48px;">Duyệt</th>
                        <th style="width: 48px;">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: center;">1</td>
                        <td>Nguyễn Thùy</td>
                        <td style="text-align: center;"><a href=""><i class="fa-solid fa-check"></i></a></td>
                        <td style="text-align: center;"><a onclick="popup('duyet')"><i class="fa-solid fa-x"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">2</td>
                        <td>Anh Thư</td>
                        <td style="text-align: center;"><a href=""><i class="fa-solid fa-check"></i></a></td>
                        <td style="text-align: center;"><a onclick="popup('duyet')"><i class="fa-solid fa-x"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table" id="taman" style="display: none;">
            <table>
                <thead>
                    <tr>
                        <th style="width: 48px;">ID</th>
                        <th>Name</th>
                        <th style="width: 48px;">Hiện</th>
                        <th style="width: 48px;">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: center;">1</td>
                        <td>Nguyễn Thùy</td>
                        <td style="text-align: center;"><a href=""><i class="fa-solid fa-check"></i></a></td>
                        <td style="text-align: center;"><a onclick="popup('duyet')"><i class="fa-solid fa-x"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">2</td>
                        <td>Anh Thư</td>
                        <td style="text-align: center;"><a href=""><i class="fa-solid fa-check"></i></a></td>
                        <td style="text-align: center;"><a onclick="popup('duyet')"><i class="fa-solid fa-x"></i></a>
                        </td>
                    </tr>
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
        <div class="popup_admin" id="popupduyet">
            <h3 style="color: white;">Bạn có thật sự muốn xóa sản phẩm ... ?</h3>
            <p style="color: white;">* Sản phẩm bị xóa sẽ không thể khôi phục nữa *</p>
            <div class="g-recaptcha" data-sitekey="6LcK2IwqAAAAAEvD9EBnJT6kQd6KBrAC7NyGUzWT"></div>
            <p id="alert"></p>
            <div class="button">
                <button onclick="submit()">Submit</button>
                <button onclick="cancel('duyet')">Cancel</button>
            </div>
        </div>
    </div>
@endsection
