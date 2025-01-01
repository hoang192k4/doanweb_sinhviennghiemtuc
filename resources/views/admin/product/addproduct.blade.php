@extends('layouts.layouts_admin')
@section('title', 'Trang thêm sản phẩm')
@section('content')
    <div class="separator"></div>
    <div class="content">
        <div class="head">
            <div class="title">Thêm sản phẩm</div>
        </div>
        <div class="btn-goback">
            <button type="button">&laquo; Trở lại</button>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="" id="formAddProduct" class="form-product">
                            <div class=" form-groups">
                                <div class="form-group-product">
                                    <div class="col"><label>Tên sản phẩm:</label></div>
                                    <div class="col"><input type="text" class="form-control" id="nameProduct"></div>
                                </div>
                                <div class="form-group-product">
                                    <div class="col"><label>Mô tả:</label></div>
                                    <textarea name="Decription"></textarea>
                                </div>
                                <div class="form-group-product">
                                    <div>
                                        <div class="col"><label>Danh mục:</label></div>
                                        <div class="col">
                                            <select>
                                                <option value="">Điện thoại</option>
                                                <option value="">Laptop</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="col"><label>Thương hiệu:</label></div>
                                        <div class="col">
                                            <select>
                                                <option value="">iPhone</option>
                                                <option value="">SamSung</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-product">
                                    <div class="col">
                                        <label>Hình ảnh:</label>
                                    </div>
                                    <div class="col">
                                        <img src="" alt="error">
                                        <input type="file" class="form-control" style="background-color:white" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class=" form-groups">
                                <div class=" form-group-product">
                                    <div class="col">
                                        <label>Màu sắc</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="colorProduct">
                                    </div>
                                </div>
                                <div class=" form-group-product">
                                    <div class="col">
                                        <label>Dung lượng</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="storageProduct">
                                    </div>
                                </div>
                                <div class=" form-group-product">
                                    <div class="col">
                                        <label>Số lượng</label>
                                    </div>
                                    <div class="col">
                                        <input type="number" class="form-control" name="amountProduct">
                                    </div>
                                </div>
                                <div class=" form-group-product">
                                    <div class="col"><label>Giá tiền</label></div>
                                    <div class="col">
                                        <input type="number" class="form-control" name="priceProduct">
                                    </div>

                                </div>
                                <div class="form-group-product">
                                    <div class="col"><label>Trạng thái:</label></div>
                                    <div class="col">
                                        <select name="status" class="form-control">
                                            <option value="status-1">status 1</option>
                                            <option value="status-2">status 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-goback button-product">
                                <button type="button">Xác nhận</button>
                                <button type="button">Hủy</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
