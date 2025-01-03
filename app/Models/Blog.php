<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    //
    public static function getAllBlog()
    {
        return DB::table('blogs')->get();
    }
}