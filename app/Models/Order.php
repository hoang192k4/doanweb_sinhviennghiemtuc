<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    //
    use HasFactory;
    //tạo mã hóa đơn order_code ngẩu nhiên vs mã 14 lý tự
    public static function generateOrderCode()
    {
        do {
            $orderCode = strtoupper(substr(bin2hex(random_bytes(7)), 0, 14));
        } while (self::where('order_code', $orderCode)->exists());

        return $orderCode;
    }
}
