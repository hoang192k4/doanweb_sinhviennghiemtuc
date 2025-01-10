<div class="menu">
    <div class="@yield('active-dashboard')"><a href="{{route('admin.index')}}">Trang Dashboard</a></div>
    <div class="@yield('active-category')"><a href="">Quản lý Danh mục</a></div>
    <div class="@yield('active-product')"><a href="{{route('product.index')}}">Quản lý Sản phẩm</a></div>
    <div class="@yield('active-order')"><a href="{{route('admin.order')}}">Quản lý Đơn hàng</a></div>
    <div class="@yield('active')"><a href="">Quản lý Thống kê</a></div>
    <div class="@yield('active-review')"><a href="{{route('admin.review')}}">Quản lý Đánh giá</a></div>
    <div class="@yield('active-contact')"><a href="{{route('admin.contact')}}">Quản lý Liên hệ</a></div>
</div>
