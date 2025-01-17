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
            <h2 style="text-align: center">Thống kê</h2>
            <div class="panel-body">
                <div id="chart_doanhthu" style="height: 250px; border:1px solid black; margin-bottom:10px"></div>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('admin.statistic') }}" method="POST" class="statistic_type" id="statisticForm">
                @csrf
                <select name="statistic_type" id="statistic_type" class=" statistic_type form-control">
                    <option>Thống kê</option>
                    <option value="7ngay">7 ngày</option>
                    <option value="thangnay">Tháng này</option>
                    <option value="thangtruoc">Tháng trước</option>
                    <option value="365ngay">1 năm</option>
                </select>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            motnam()
            var chart = new Morris.Bar({
                element: 'chart_doanhthu',
                parseTime: false,
                hideHover: 'auto',
                resize: true,
                barColors: ['rgb(22,66,60)', 'black'],
                xkey: 'created_at',
                ykeys: ['total_price', 'total_quantity_product', 'total_quantity_revenue', ],
                labels: ['Tổng tiền sản phẩm', 'Tổng số lượng', 'Tổng thành tiền', ],
            });

            $('#statistic_type').change(function() {
                var element = $(this).val();

                $.ajax({
                    url: "{{ url('/admin/statistic') }}",
                    method: "POST",
                    data: {
                        statistic_type: element,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        console.log(data.chart_data);
                        chart.setData(data.chart_data);

                    }
                });
            })

            function motnam() {
                $.ajax({
                    url: "{{ url('/admin/statistic') }}",
                    method: "POST",
                    data: {
                        statistic_type: '365ngay',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        chart.setData(data.chart_data);
                    }
                });
            }
        });
    </script>
@endsection
