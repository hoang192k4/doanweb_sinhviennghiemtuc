@extends('layouts.layouts_admin')
@section('title', 'Trang quản lý đánh giá')
@section('active-review', 'active')
@section('content')
    <div class="content" id="danhgia">
        <div class="head">
            <div class="title">Quản Lý Đánh Giá</div>
            <div class="search">
                <form>
                    <input type="text" name="key" id="key">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
        <div class="separator_x"></div>
        <select id="point" name="point">
            <option value="">Tất cả</option>
            <option value="5">5 sao</option>
            <option value="4">4 sao</option>
            <option value="3">3 sao</option>
            <option value="2">2 sao</option>
            <option value="1">1 sao</option>
        </select>
        <div>
            <table>
                <thead>
                    <tr>
                        <th style="width: 48px;">ID</th>
                        <th>User name</th>
                        <th>Content</th>
                        <th>Product</th>
                        <th>Date</th>
                        <th>Point</th>
                        <th style="width: 48px;">Xóa</th>
                    </tr>
                </thead>
                <tbody id="review-list">
                    @foreach ($listReview as $review)
                        <tr id="review-{{ $review->id }}">
                            <td style="text-align: center;">{{ $review->id }}</td>
                            <td>{{ App\Models\User::find($review->user_id)->full_name }}</td>
                            <td>{{ $review->content }}</td>
                            <td>{{ App\Models\Product::find($review->product_id)->name }}
                                ({{ $review->color }} | {{ $review->internal_memory }})
                            </td>
                            <td>{{ $review->created_at }}</td>
                            <td>{{ $review->point }}</td>
                            <td style="text-align: center;">
                                <button class="cursor" style="background-color: white;color:rgb(19, 93, 102)"
                                    onclick="showDeletePopup({{ $review->id }},'{{ App\Models\User::find($review->user_id)->full_name }}')"><i
                                        class="fa-regular fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- <div class="pagination">
            <a href="#" class="active"><i class="fa-solid fa-chevron-left"></i></a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">...</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#" class="active"><i class="fa-solid fa-chevron-right"></i></a>
        </div> --}}
        <div class="popup_admin" id="popupdg">
            <h3 style="color: white;">Bạn có thật sự muốn xóa đánh giá ... ?</h3>
            <p style="color: white;">* Đánh giá bị xóa sẽ không thể khôi phục nữa *</p>
            <div class="g-recaptcha" data-sitekey="6LcK2IwqAAAAAEvD9EBnJT6kQd6KBrAC7NyGUzWT"></div>
            <p id="alert"></p>
            <div class="button">
                <button onclick="deleteReviews(this.dataset.id)">Submit</button>
                <button onclick="cancel('dg')">Cancel</button>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function showDeletePopup(id, full_name) {
            let popup = document.getElementById('popupdg');
            popup.children[0].textContent = `Bạn có thật sự muốn xóa đánh giá của khách hàng ${full_name} ?`;
            popup.children[4].children[0].dataset.id = id;
            popup.style.display = "block";
        }

        function deleteReviews(id) {
            $.ajax({
                    type: "POST",
                    url: `/admin/review/delete/${id}`,
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'delete'
                    }
                })
                .done((data) => {
                    alertify.alert('Thông báo', data.message);
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                })
            document.getElementById('popupdg').style.display = "none";
        }
    </script>
    <script>
        //select thay đổi
        $(document).ready(function() {
            $('#point').on('change', function() {
                const point = $(this).val(); // Lấy số sao từ dropdown

                $.ajax({
                    url: "{{ route('admin.point.review') }}", // Route xử lý AJAX
                    method: "GET",
                    data: {
                        point: point
                    },
                    success: function(response) {
                        $('#review-list').html(''); // Xóa nội dung cũ

                        if (response.review.length > 0) {
                            response.review.forEach(function(review) {
                                $('#review-list').append(`
                            <tr id="review-{{ $review->id }}">
                                <td style="text-align: center;">{{ $review->id }}</td>
                                <td>{{ App\Models\User::find($review->user_id)->full_name }}</td>
                                <td>{{ $review->content }}</td>
                                <td>{{ App\Models\Product::find($review->product_id)->name }}
                                    ({{ $review->color }} | {{ $review->internal_memory }})
                                </td>
                                <td>{{ $review->created_at }}</td>
                                <td>{{ $review->point }}</td>
                                <td style="text-align: center;">
                                    <button class="cursor" style="background-color: white;color:rgb(19, 93, 102)"
                                        onclick="showDeletePopup({{ $review->id }},'{{ App\Models\User::find($review->user_id)->full_name }}')"><i
                                            class="fa-regular fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                            `);
                            });
                        } else {
                            $('#review-list').html('<li>Không có bài đánh giá nào.</li>');
                        }
                    },
                   
                });
            });
        });
    </script>
@endsection
