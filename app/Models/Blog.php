<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    //
    public static function layTatCaBaiViet()
    {
        return DB::table('blogs')->paginate(4);
    }
    public static function timKiemBaiViet($key)
    {
        return DB::table('blogs')->where('title', 'like', '%' . $key . '%')->paginate(1);
    }
}
