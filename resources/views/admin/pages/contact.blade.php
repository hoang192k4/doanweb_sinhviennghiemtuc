@extends('layouts.layouts_admin')
@section('title', 'Trang quản lý liên hệ')
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
                    <th>Name</th>
                    <th style="width: 48px;">Xong</th>
                    <th style="width: 48px;">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;">1</td>
                    <td>Nguyễn Thùy</td>
                    <td style="text-align: center;"><a href=""><i class="fa-solid fa-check"></i></a></td>
                    <td style="text-align: center;"><a onclick="popup('lh')"><i
                                class="fa-solid fa-x"></i></a></td>
                </tr>
                <tr>
                    <td style="text-align: center;">2</td>
                    <td>Anh Thư</td>
                    <td style="text-align: center;"><a href=""><i class="fa-solid fa-check"></i></a></td>
                    <td style="text-align: center;"><a onclick="popup('lh')"><i
                                class="fa-solid fa-x"></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="table" id="dalh" style="display: none;">
        <table>
            <thead>
                <tr>
                    <th style="width: 48px;">ID</th>
                    <th>Name</th>
                    <th style="width: 48px;">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;">1</td>
                    <td>Nguyễn Thùy</td>
                    <td style="text-align: center;"><a onclick="popup('lh')"><i
                                class="fa-solid fa-x"></i></a></td>
                </tr>
                <tr>
                    <td style="text-align: center;">2</td>
                    <td>Anh Thư</td>
                    <td style="text-align: center;"><a onclick="popup('lh')"><i
                                class="fa-solid fa-x"></i></a></td>
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
    <div class="popup_admin" id="popuplh">
        <h3 style="color: white;">Bạn có thật sự muốn xóa liên hệ ... ?</h3>
        <p style="color: white;">* Liên hệ bị xóa sẽ không thể khôi phục nữa *</p>
        <div class="g-recaptcha" data-sitekey="6LcK2IwqAAAAAEvD9EBnJT6kQd6KBrAC7NyGUzWT"></div>
        <p id="alert"></p>
        <div class="button">
            <button onclick="submit()">Submit</button>
            <button onclick="cancel('lh')">Cancel</button>
        </div>
    </div>
</div>
@endsection
