<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Blog;
use App\Models\About;
use App\Models\ProductUser;
use App\Models\Brand;
use App\Models\Product;
use App\Models\LikeProduct;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $thuongHieu = Brand::index();
        $danhSachDTHot = ProductUser::LayThongTinSanPham('Điện Thoại');
        $danhSachLapTopMoi = ProductUser::LayThongTinSanPham('Laptop');
        return View('User.pages.index')->with([
            "thuongHieu" => $thuongHieu,
            "danhSachDTHot" => $danhSachDTHot,
            "danhSachLapTopMoi" => $danhSachLapTopMoi
        ]);
    }

    public function TimKiemSanPhamFH($slug, $id = null)
    {
        $danhSachSanPham = ProductUser::TimKiemSanPham($slug, $id);
        return view('user.pages.search')->with('danhSachSanPham', $danhSachSanPham);
    }
    public function TimKiemTheoTuKhoa(Request $request)
    {
        $key = str_replace('$', '', $request->input('seachbykey'));

        $danhSachSanPham = ProductUser::TimKiemTheoTuKhoa($key);
        return view('user.pages.search')->with('danhSachSanPham', $danhSachSanPham);
    }

    //Trang Giới Thiệu
    public function GioiThieu()
    {
        $danhSachBaiViet = Blog::layTatCaBaiViet();
        $danhSachThongTinBaiViet = About::all()->first();
        return view('user.pages.blog')
            ->with('danhSachBaiViet', $danhSachBaiViet)
            ->with('danhSachThongTinBaiViet', $danhSachThongTinBaiViet);
    }
    public function timKiemBaiVietTheoTuKhoa(Request $request)
    {
        $key = $request->input('keyBlog');
        $danhSachBaiViet = Blog::timKiemBaiViet($key);
        return view('user.pages.blog')->with('danhSachBaiViet', $danhSachBaiViet);
    }

    //Trang Liên Hệ
    public function LienHe()
    {
        return view('user.pages.contact');
    }

    public function DangKy(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|string|max:50|unique:users,username',
                'full_name' => 'required|string|max:255',
                'phone' => 'required|string|regex:/^[0-9]{10}$/|unique:users,phone',
                'email_register' => 'required|email|max:255|unique:users,email',
                'password_register' => 'required|string'
            ],
            [
                'username.required' => 'Bạn chưa nhập username',
                'username.max' => 'Username không được quá 50 ký tự',
                'username.unique' => 'Username đã tồn tại',
                'full_name.required' => 'Bạn chưa nhập họ và tên',
                'full_name.max' => 'Họ và tên không được quá 255 ký tự',
                'email_register.required' => 'Bạn chưa nhập email',
                'email_register.email' => 'Bạn chưa nhập đúng định đạng email',
                'email_register.max' => 'Email không được quá 255 ký tự',
                'email_register.unique' => 'Email đã được sử dụng',
                'phone.required' => 'Bạn chưa nhập số điện thoại',
                'phone.unique' => 'Số điện thoại đã được sử dụng',
                'phone.regex' => 'Vui lòng nhập ký tự số ( 0 đến 9 ) không quá 10 kí tự',
                'password_register.required' => 'Bạn chưa nhập password',
            ]
        );
        DB::table('users')->insert([
            'username' => $request->username,
            'full_name' => $request->full_name,
            'gender' => 'Nam',
            'date_of_birth' => now(),
            'image' => '',
            'phone' => $request->phone,
            'email' => $request->email_register,
            'password' => Hash::make($request->password_register),
            'status' => 1
        ]);
        return response()->json(['message' => 'Đăng ký thành công']);
    }
    public function DangNhap(Request $request)
    {
        $request->validate(
            [
                'email_login' => 'required|email|string|max:255|exists:users,email',
                'password_login' => 'required|string'
            ],
            [
                'email_login.required' => 'Bạn chưa nhập email',
                'email_login.exists' => 'Email chưa được đăng ký',
                'email_login.email' => 'Bạn chưa nhập đúng định đạng email',
                'email_login.max' => 'Email không được quá 255 ký tự',
                'password_login.required' => 'Bạn chưa nhập password',
            ]
        );
        if (Auth::attempt(['email' => $request->email_login, 'password' => $request->password_login])) {
            if (Auth::user()->role == "NV" || Auth::user()->role == "QL")
                return redirect()->route('admin.index');
            return response()->json(['message' => 'Đăng nhập thành công']);
        } else {
            return response()->json(['msg_error' => 'Mật khẩu chưa chính xác!' . '<br>' . ' Vui lòng nhập lại mật khẩu'], 401);
        }
    }
    public function Logout()
    {
        Auth::logout();
        return redirect()->back();
    }


    public function ChiTietSanPham($slug)
    {
        $product = Product::where('slug', $slug)->first();
        ProductUser::UpdateView($slug);
        $danhSachAnh = ProductUser::HinhAnhSamPham($slug);
        $danhSachBoNho = ProductUser::BoNhoTrongSanPham($slug);
        $thongTinSanPham = ProductUser::ThongTinSanPham($slug);
        $sanPhamTuongTu = ProductUser::SanPhamTuongDuong($thongTinSanPham[0]->slug, $thongTinSanPham[0]->brand, $slug);
        $laySanPhamTheoDanhMuc = ProductUser::LayDanhSachSanPhamTheoDanhMuc($thongTinSanPham[0]->slug, $slug);
        $arr = array_merge($sanPhamTuongTu->toArray(), $laySanPhamTheoDanhMuc->toArray());
        //thông số kỹ thuậnthuận
        $thongSoKiThuatSanPham = $product->product_specification;
        $boNhoNhoNhat = ProductUser::LayBoNhoNhoNhat($slug);
        $mauSanPham = ProductUser::MauSanPham($slug, $boNhoNhoNhat->internal_memory);
        $luotThichSanPham = ProductUser::LuotThichSanPham($slug);
        return View('user.pages.detail')->with([
            'slug' => $slug,
            "danhSachAnh" => $danhSachAnh,
            "danhSachBoNho" => $danhSachBoNho,
            "thongTinSanPham" => $thongTinSanPham[0],
            "thongSoKiThuatSanPham" => $thongSoKiThuatSanPham,
            "luotThichSanPham" => $luotThichSanPham,
            "mauSanPham" => $mauSanPham,
            "sanPhamTuongTu" => $arr
        ]);
    }
    public function LayMauSanPhamTheoBoNho($slug, $internal_memory)
    {
        $danhSachMau = ProductUser::MauSanPham($slug, $internal_memory);
        return $danhSachMau;
    }

    public function ChiTietSanPhamTheoBoNho($slug, $internal_memory)
    {

        $danhSachAnh = ProductUser::HinhAnhSamPham($slug);
        $danhSachBoNho = ProductUser::BoNhoTrongSanPham($slug);
        $thongTinSanPham = ProductUser::ThongTinSanPham($slug);
        $thongSoKiThuatSanPham = ProductUser::ThongSoKiThuatSanPham($slug);
        $mauSanPham = ProductUser::MauSanPham($slug, $internal_memory);
        $luotThichSanPham = ProductUser::LuotThichSanPham($slug);
        return View('user.pages.detail')->with([
            'slug' => $slug,
            "danhSachAnh" => $danhSachAnh,
            "danhSachBoNho" => $danhSachBoNho,
            "thongTinSanPham" => $thongTinSanPham[0],
            "thongSoKiThuatSanPham" => $thongSoKiThuatSanPham[0],
            "luotThichSanPham" => $luotThichSanPham,
            "mauSanPham" => $mauSanPham,
        ]);
    }
    public function LayThongTinSanPhamTheoMau($slug, $internal_memory, $color)
    {
        $data = ProductUser::LayThongTinSanPhamTheoMau($slug, $internal_memory, $color);
        return response()->json([
            "variant_id" => $data->id,
            "image" => $data->image,
            "stock" => $data->stock,
            "price" => $data->price
        ]);
    }

    public function addContact(Request $req)
    {
        $validate = $req->validate([
            'name' => 'required|string|regex:/^[a-zA-ZàáảãạâầấẩẫậăằắẳẵặèéẻẽẹêềếểễệìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵđÀÁẢÃẠÂẦẤẨẪẬĂẰẮẲẴẶÈÉẺẼẸÊỀẾỂỄỆÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴĐ\s]+$/|max:50',
            'email' => 'required|email|max:25',
            'phone' => 'required|string|regex:/^[0-9]{10}$/',
            'title' => 'required|regex:/^[a-zA-ZàáảãạâầấẩẫậăằắẳẵặèéẻẽẹêềếểễệìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵđÀÁẢÃẠÂẦẤẨẪẬĂẰẮẲẴẶÈÉẺẼẸÊỀẾỂỄỆÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴĐ\s]+$/|max:255',
            'content' => 'required|regex:/^[a-zA-ZàáảãạâầấẩẫậăằắẳẵặèéẻẽẹêềếểễệìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵđÀÁẢÃẠÂẦẤẨẪẬĂẰẮẲẴẶÈÉẺẼẸÊỀẾỂỄỆÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴĐ\s]+$/|string',
        ], [
            'name.required' => 'Bạn chưa nhập họ tên',
            'name.regex' => 'Bạn không được phép nhập ký tự đặc biệt ở họ và tên',
            'name.max' => 'Họ và tên vừa nhập đã vượt 50 ký tự.',
            'email.required' => 'Bạn chưa nhập Email.',
            'email.email' => 'Email vừa nhập chưa hợp lệ.',
            'email.max' => 'Email vừa nhập đã vượt 25 ký tự.',
            'phone.required' => 'Bạn chưa nhập số điện thoại.',
            'phone.regex' => 'Số điện thoại chỉ được nhập là số và chỉ được 10 ký tự',
            'title.required' => 'Bạn chưa nhập tiêu đề.',
            'title.regex' => 'Bạn không được phép nhập ký tự đặc biệt ở tiêu đề',
            'title.max' => 'chỉ được nhập tối đã 255 ký tự',
            'content.required' => 'Bạn chưa nhập nội dung.',
            'content.regex' => 'Bạn không được phép nhập ký tự đặc biệt ở nội dung',
        ]);

        $data = new Contact();
        $data->id = $req['id'];
        $data->name = $req['name'];
        $data->title = $req['title'];
        $data->content = $req['content'];
        $data->email = $req['email'];
        $data->phone = $req['phone'];
        $data->save();
        return redirect()->route('user.contact')->with('msg', 'Gửi liên hệ thành công!');
    }
    public function CapNhapSanPhamYeuThich($sanpham, $user)
    {
        $luotThich = LikeProduct::TongLuotThichSanPham($sanpham);
        $tenSanPham = ProductUser::LayTenSanPhamTheoId($sanpham);
        $status = LikeProduct::TrangThai($sanpham, $user);
        if ($status > 0) {
            LikeProduct::XoaSanPhamYeuThich($sanpham, $user);
            return response()->json([
                'status' => 0,
                'tenSanPham' => $tenSanPham,
                'luotThich' => $luotThich,
            ]);
        } else {
            LikeProduct::ThemSanPhamYeuThich($sanpham, $user);
            return response()->json([
                'status' => 1,
                'tenSanPham' => $tenSanPham,
                'luotThich' => $luotThich,
            ]);
        }
    }
}
