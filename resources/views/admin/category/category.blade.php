@extends('layouts.layouts_admin')
@section('title', 'Trang quản lý danh mục')
@section('content')
<div class="content" id="danhmuc">
    <div class="head">
        <div class="title">Quản Lý Danh Mục</div>
        <button><a href=""><i class="fa-solid fa-plus"></i> Phân loại</a></button>
        <button><a href=""><i class="fa-solid fa-plus"></i> Thương hiệu</a></button>
        <div class="search">
            <form>
                <input>
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
    <div class="separator_x"></div>
    <select>
        <option value="">Tất cả</option>
        <option value="">Điện thoại</option>
        <option value="">Laptop</option>
    </select>
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
                <td style="text-align: center;"><a onclick="popup('dm')"><i class="fa-solid fa-x"></i></a>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">2</td>
                <td>Anh Thư</td>
                <td style="text-align: center;"><a href=""><i class="fa-solid fa-check"></i></a></td>
                <td style="text-align: center;"><a onclick="popup('dm')"><i class="fa-solid fa-x"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="pagination">
        <a href="#" class="active"><i class="fa-solid fa-chevron-left"></i></a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">...</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#" class="active"><i class="fa-solid fa-chevron-right"></i></a>
    </div>
    <div class="popup_admin" id="popupdm">
        <h3 style="color: white;">Bạn có thật sự muốn xóa danh mục ... ?</h3>
        <p style="color: white;">* Danh mục bị xóa sẽ không thể khôi phục nữa *</p>
        <div class="g-recaptcha" data-sitekey="6LcK2IwqAAAAAEvD9EBnJT6kQd6KBrAC7NyGUzWT"></div>
        <p id="alert"></p>
        <div class="button">
            <button onclick="submit()">Submit</button>
            <button onclick="cancel('dm')">Cancel</button>
        </div>
    </div>
</div>
@endsection
