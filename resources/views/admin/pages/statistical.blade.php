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
        <canvas id="chart" width="400" height="200"></canvas>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chart').getContext('2d');
    const monthly = @json($monthly);

    const data = {
        labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        datasets: [{
            label: 'Doanh thu năm 2024 (VNĐ)',
            data: monthly,
            backgroundColor: 'rgb(19, 93, 102)',
        }]
    };

    const chart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection