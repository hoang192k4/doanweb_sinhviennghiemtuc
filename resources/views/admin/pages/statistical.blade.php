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
        <h2 style="text-align: center;">Thống kê doanh thu</h2>
        <canvas id="sumChart" width="400" height="200"></canvas>
        <h2 style="text-align: center;">Thống kê lượt mua</h2>
        <canvas id="countChart" width="400" height="200"></canvas>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const sumChart = document.getElementById('sumChart').getContext('2d');
    const sum = @json($sum);

    const sumData = {
        labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        datasets: [{
            label: 'Doanh thu năm 2024 (VNĐ)',
            data: sum,
            backgroundColor: 'rgb(19, 93, 102)',
        }]
    };

    const chart1 = new Chart(sumChart, {
        type: 'bar',
        data: sumData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const countChart = document.getElementById('countChart').getContext('2d');
    const count = @json($count);

    const countData = {
        labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        datasets: [{
            label: 'Lượt mua năm 2024 (VNĐ)',
            data: count,
            backgroundColor: 'rgb(19, 93, 102)',
        }]
    };

    const chart2 = new Chart(countChart, {
        type: 'bar',
        data: countData,
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