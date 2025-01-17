@extends('layouts.layouts_admin')
@section('title', 'Trang quản lý thống kê')
@section('active', 'active')
{{-- <style>
    .statistic_type {
        display: flex;
        flex-direction: column;
        margin-bottom: 5px;
    }

    .statistic_input {
        margin-bottom: 3px
    }

    .statistic_input .select {
        display: flex;
        justify-content: flex-start;
    }

    button {
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
</style> --}}
@section('content')
    <div class="content" id="thongke">
        <div class="head">
            <div class="title">Quản Lý Thống Kê</div>
            <button><a href=""><i class="fa-regular fa-file-excel"></i> Xuất file</a></button>

        </div>
        <div class="separator_x"></div>
        <div class="chart">
            <h2 style="text-align: center">Thống kê doanh thu</h2>
            <canvas id="sumChart" width="400" height="200"></canvas>
            <h2 style="text-align: center">Thống kê lượt mua</h2>
            <canvas id="countChart" width="400" height="200"></canvas>
        </div>
        <form action="{{ route('admin.statistic') }}" method="GET" class="statistic_type">
            <select name="statistic_type" id="statistic_type" class="select">
                <option value="">Chọn loại thống kê</option>
                <option value="year">Theo năm</option>
                <option value="month">Theo tháng</option>
            </select>

            <div id="year_input" class="statistic_input" style="display: none;float:inline-end">
                <input type="number" name="year" id="year" value="{{ date('Y') }}" min="2000"
                    max="{{ date('Y') }}" style="width:130px">
            </div>

            <div id="month_input" class="statistic_input" style="display: none;">
                <select name="month" id="month">
                    @for ($m = 1; $m <= 12; $m++)
                        <option value="{{ $m }}">{{ $m }}</option>
                    @endfor
                </select>
            </div>

            <button type="submit" style="padding: 10px; margin 5px;" id="btnChon"> Chọn</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let chart1;
        let chart2;

        // Lấy nút và thêm sự kiện click
        const button = document.getElementById('btnChon');
        button.addEventListener('click', function() {
            console.log('đã chọn'); // Ghi log khi nút được click
        });

        document.addEventListener('DOMContentLoaded', function() {
            const statisticTypeSelect = document.getElementById('statistic_type');
            const yearInput = document.getElementById('year_input');
            const monthInput = document.getElementById('month_input');
            const yearInputField = document.getElementById('year');

            // Lắng nghe sự kiện thay đổi của select
            statisticTypeSelect.addEventListener('change', function() {
                const selectedValue = this.value;

                // Ẩn tất cả các trường nhập liệu
                yearInput.style.display = 'none';
                monthInput.style.display = 'none';

                if (selectedValue === 'year') {
                    yearInput.style.display = 'block';
                    monthInput.value = "";
                } else if (selectedValue === 'month') {
                    monthInput.style.display = 'block';
                    yearInputField.value = "{{ date('Y') }}";
                }
            });

            document.querySelector('form').addEventListener('submit', function(event) {
                event.preventDefault(); // Ngăn chặn form gửi đi để xử lý trước

                const selectedValue = document.getElementById('statistic_type').value;
                const yearInputValue = document.getElementById('year').value;
                const monthInputValue = document.getElementById('month').value;

                // Gọi API để lấy dữ liệu thống kê
                fetch(
                        `/your-api-endpoint?year=${yearInputValue}&month=${monthInputValue}&statistic_type=${selectedValue}`
                    )
                    .then(response => response.json())
                    .then(data => {
                        const sum = data.sum;
                        const count = data.count;

                        // Tạo dữ liệu cho biểu đồ doanh thu
                        let sumData;
                        if (selectedValue === 'year') {
                            sumData = {
                                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5',
                                    'Tháng 6',
                                    'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11',
                                    'Tháng 12'
                                ],
                                datasets: [{
                                    label: 'Doanh thu năm ' + yearInputValue + ' (VNĐ)',
                                    data: sum, // Dữ liệu doanh thu theo năm
                                    backgroundColor: 'rgba(19, 93, 102, 0.5)',
                                    borderColor: 'rgba(19, 93, 102, 1)',
                                    borderWidth: 1
                                }]
                            };
                        } else if (selectedValue === 'month') {
                            sumData = {
                                labels: ['Tuần 1', 'Tuần 2', 'Tuần 3', 'Tuần 4'],
                                datasets: [{
                                    label: 'Doanh thu tháng ' + monthInputValue + ' (VNĐ)',
                                    data: sum, // Dữ liệu doanh thu theo tháng
                                    backgroundColor: 'rgba(19, 93, 102, 0.5)',
                                    borderColor: 'rgba(19, 93, 102, 1)',
                                    borderWidth: 1
                                }]
                            };
                        } else {
                            alert('Vui lòng chọn loại thống kê!');
                            return; // Ngăn chặn việc tạo biểu đồ nếu không có lựa chọn
                        }

                        // Hủy biểu đồ cũ nếu đã tồn tại
                        if (chart1) {
                            chart1.destroy();
                        }

                        // Tạo biểu đồ mới cho doanh thu
                        chart1 = new Chart(sumChart, {
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

                        // Tạo dữ liệu cho biểu đồ lượt mua
                        let countData;
                        if (selectedValue === 'year') {
                            countData = {
                                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5',
                                    'Tháng 6',
                                    'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11',
                                    'Tháng 12'
                                ],
                                datasets: [{
                                    label: 'Lượt mua năm ' + yearInputValue,
                                    data: count, // Dữ liệu lượt mua theo năm
                                    backgroundColor: 'rgba(19, 93, 102, 0.5)',
                                    borderColor: 'rgba(19, 93, 102, 1)',
                                    borderWidth: 1
                                }]
                            };
                        } else if (selectedValue === 'month') {
                            countData = {
                                labels: ['Tuần 1', 'Tuần 2', 'Tuần 3', 'Tuần 4'],
                                datasets: [{
                                    label: 'Lượt mua tháng ' + monthInputValue,
                                    data: count, // Dữ liệu lượt mua theo tháng
                                    backgroundColor: 'rgba(19, 93, 102, 0.5)',
                                    borderColor: 'rgba(19, 93, 102, 1)',
                                    borderWidth: 1
                                }]
                            };
                        } else {
                            alert('Vui lòng chọn loại thống kê!');
                            return; // Ngăn chặn việc tạo biểu đồ nếu không có lựa chọn
                        }

                        // Hủy biểu đồ cũ nếu đã tồn tại
                        if (chart2) {
                            chart2.destroy();
                        }

                        // Tạo biểu đồ mới cho lượt mua
                        chart2 = new Chart(countChart, {
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
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            });
        });
    </script>

@endsection
