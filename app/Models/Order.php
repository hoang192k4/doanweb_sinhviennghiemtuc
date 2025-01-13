<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    //
    use HasFactory;
    public $timestamps =false;
    protected $fillable = ['id', 'order_code','full_name','phone','address','total_price','payment_method','user_id','voucher_id','order_status_id'];
    //tạo mã hóa đơn order_code năm (2 chữ số), tháng, ngày, giờ phút giây và 2 số ngẫu nhiên
    static public function generateTimestamp() {
        // Lấy thời gian hiện tại
        $now = new \DateTime();
        // Lấy các thành phần thời gian
        $year = $now->format('y'); // 2 số cuối của năm
        $month = $now->format('m'); // Tháng (2 chữ số)
        $day = $now->format('d'); // Ngày (2 chữ số)
        $hour = $now->format('H'); // Giờ (24h format, 2 chữ số)
        $minute = $now->format('i'); // Phút (2 chữ số)
        $second = $now->format('s'); // Giây (2 chữ số)

        // Tạo 2 chữ số ngẫu nhiên
        $random = str_pad(mt_rand(0, 99), 2, '0', STR_PAD_LEFT);

        // Kết hợp thành chuỗi 14 số
        $timestamp = $year . $month . $day . $hour . $minute . $second . $random;

        return $timestamp;
    }
}
