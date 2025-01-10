@extends('layouts.layouts_admin')
@section('title', 'Trang quản lý thống kê')
@section('active', 'active')
@section('content')
<div class="content" id="thongke">
    <div class="head">
        <div class="title">Quản Lý Thống Kê</div>
        <button><a href=""><i class="fa-regular fa-file-excel"></i> Xuất file</a></button>
    </div>
    <div class="separator_x"></div>
    <div class="chart">

    </div>
</div>
@endsection
