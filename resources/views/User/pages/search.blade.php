@extends('layouts.layouts_user')
@section('title', 'Trang tìm kiếm')
@section('content')
    @php
        $danhSachDanhMuc = DB::table('categories')->where('status', 1)->select('name', 'slug', 'id')->get();
        $danhSachThuongHieu = DB::table('brands')->where('status', 1)->select('name')->get();
    @endphp
    <section class="container_css product_searchs">
        <div class="product_search_lists">
            <div class="product_search_list_left">
                <div>
                    <h5><i class="fas fa-filter" style="margin-right: 5px;"></i>Bộ lọc tìm kiếm</h5>
                    <div class="product_search product_search_list_category">
                        <p>Danh mục<i class="fas fa-sort-down"></i></p>
                        <div class="product_search_list_category_popup">
                            @foreach ($danhSachDanhMuc as $danhMuc)
                                <a href="{{ route('timkiemsanpham', ['slug' => $danhMuc->slug]) }}">{{ $danhMuc->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="product_search product_search_list_branch">
                        <p>Thương hiệu<i class="fas fa-sort-down"></i></p>
                        <div class="product_search_list_branch_popup">
                            @foreach ($danhSachDanhMuc as $danhMuc)
                                <p>{{ $danhMuc->name }}</p>
                                @foreach (DB::table('brands')->select('brands.name')->join('categories', 'brands.category_id', '=', 'categories.id')->where('categories.id', $danhMuc->id)->get() as $brand)
                                    <a
                                        href="{{ route('timkiemsanpham', ['slug' => $danhMuc->slug, 'id' => $brand->name]) }}">{{ $brand->name }}</a>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    <div class="product_search product_search_list_price">
                        <p>Mức giá</p>
                        <div class="product_search_list_price_popup">
                            <button id ="seachall"onclick="SeachProduct(undefined,undefined,undefined,this)" class="active_price">Tất cả</button>
                            <button onclick="SeachProduct(0,2000000,undefined,this)">Dưới 2 triệu</button>
                            <button onclick="SeachProduct(2000000,4000000,undefined,this)">Từ 2 đến 4 triệu</button>
                            <button onclick="SeachProduct(4000000,8000000,undefined,this)">Từ 4 đến 8 triệu</button>
                            <button onclick="SeachProduct(8000000,15000000,undefined,this)">Từ 8 đến 15 triệu</button>
                            <button onclick="SeachProduct(15000000,undefined,undefined,this)">Trên 15 triệu</button>
                            {{-- <div>
                                <p>Hoặc nhập mức giá phù hợp</p>
                                <div class="price_about">
                                    <input type="text" placeholder="2.000.000đ" onblur="handelBlur(this)">~<input
                                        type="text"placeholder="5.000.000đ" onblur="handelBlur(this)">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_search_list_right">
                <div class="product_search_list_right_items">
                    @if (isset($danhSachSanPham) && $danhSachSanPham->isNotEmpty())
                        @foreach ($danhSachSanPham as $item)
                            <div class="product_search_list_right_item">
                                <a href="{{route('detail',[$item->slug])}}"><img src="{{ asset('images/' . $item->image) }}" alt="Lỗi hiển thị"></a>
                                <div class="product_search_list_item_info">
                                    <ul>
                                        <li><a href="{{route('detail',$item->slug )}}">{{ $item->name }}</a></li>
                                        <li class = "price">{{ number_format($item->price, 0, ',', '.') }}<sup>đ</sup></li>
                                        <li>{{ $item->rating }} <i class="fas fa-star"></i></li>
                                        <li>
                                            <a href=""><button>Mua ngay</button></a>
                                            <div><a href=""><i class="fas fa-cart-plus"></i></a></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                </div>
                <div class="page" id="page"></div>
                 @else
                <div style="color: black; text-align:center; width:100%; margin-top:10px">
                    <h5>Không có sản phẩm tương tự</h5>
                </div>
                @endif
            </div>
        </div>
        </div>
    </section>
@endsection
@section('script')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        kt(); // Khởi tạo danh sách sản phẩm
        Page();
    });


    function kt() {
        const products = document.querySelectorAll('.product_search_list_right_item');
        return products;
    }

    function SeachProduct(min = 0, max = Infinity, itemsPage = 8, btn = null) {
        const active_color_price = document.querySelectorAll('.product_search_list_price_popup button');
        if (active_color_price) {
            active_color_price.forEach((element) => {
                active_color_price.forEach(btn => btn.classList.remove('active_price'));
            });
            btn.classList.add('active_price');
            const products = Array.from(kt());
            const seachProduct = [];
            products.forEach(function (product) {
                const priceText = product.querySelector('.price').innerHTML;
                const price = parseInt(priceText.replace(/[^0-9]/g, ''));
                if (price >= min && price <= max) {
                    seachProduct.push(product);
                } else {
                    product.style.display = "none";
                }
            });
            const countPage = Math.ceil(seachProduct.length / itemsPage);
            let index = 1;

            function LoadPage(page) {
                seachProduct.forEach(product => product.style.display = "none");
                const begin = (page - 1) * itemsPage;
                const end = begin + itemsPage;
                seachProduct.slice(begin, end).forEach(product => {
                    product.style.display = 'block';
                });
                LoadPageButton(countPage, page);
            }

            function LoadPageButton(countPage, index) {
                const page = document.getElementById('page');
                page.innerHTML = '';
                // Nút "Pre"
                const pre = document.createElement('button');
                pre.innerHTML = "Pre";
                pre.disabled = index === 1;
                pre.addEventListener('click', () => LoadPage(index - 1));
                page.appendChild(pre);
                // Nút số trang
                for (let i = 1; i <= countPage; i++) {
                    const button = document.createElement('button');
                    button.innerHTML = i;
                    button.className = i === index ? 'active' : '';
                    button.addEventListener('click', () => LoadPage(i));
                    page.appendChild(button);
                }
                // Nút "Next"
                const next = document.createElement('button');
                next.innerHTML = "Next";
                next.disabled = index === countPage;
                next.addEventListener('click', () => LoadPage(index + 1));
                page.appendChild(next);
            }

            if (seachProduct.length > 0) {
                LoadPage(index);
            } else {
                if (document.getElementById('page')) {
                    document.getElementById('page').innerHTML =
                        '<p>Không có sản phẩm nào phù hợp.</p>';
                }
            }
        }
    }

    function Page(itemsPage = 8) {
        const products = Array.from(kt());

        const countPage = Math.ceil(products.length / itemsPage);
        let index = 1;

        function LoadPage(page) {
            products.forEach(product => product.style.display = "none");
            const begin = (page - 1) * itemsPage;
            const end = begin + itemsPage;
            products.slice(begin, end).forEach(product => {
                product.style.display = 'block';
            });
            LoadPageButton(countPage, page);
        }

        function LoadPageButton(countPage, index) {
            const page = document.getElementById('page');
            page.innerHTML = '';
            // Nút "Pre"
            const pre = document.createElement('button');
            pre.innerHTML = "Pre";
            pre.disabled = index === 1;
            pre.addEventListener('click', () => LoadPage(index - 1));
            page.appendChild(pre);
            // Nút số trang
            for (let i = 1; i <= countPage; i++) {
                const button = document.createElement('button');
                button.innerHTML = i;
                button.className = i === index ? 'active' : '';
                button.addEventListener('click', () => LoadPage(i));
                page.appendChild(button);
            }
            // Nút "Next"
            const next = document.createElement('button');
            next.innerHTML = "Next";
            next.disabled = index === countPage;
            next.addEventListener('click', () => LoadPage(index + 1));
            page.appendChild(next);
        }

        if (products.length > 0) {
            LoadPage(index);
        } else {
            if (document.getElementById('page')) {
                document.getElementById('page').innerHTML =
                    '<p>Không có sản phẩm nào phù hợp.</p>';
            }
        }
    }


</script>
@endsection
