<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
class AdminReviewController extends Controller
{
    public function showListReviews(){
        $listReview=Rating::where('status',1)->get();
        return view('admin.pages.review')->with('listReview',$listReview);
    }
    public function deleteReviews($id){
        $review = Rating::findOrFail($id);
        $review->delete();
        return response()->json([
            'message'=>'Xóa đánh giá thành công!'
        ]);
    }
    public function pointReview(Request $request){
        $query = Rating::query();
        //lọc theo số điểm chọn
        if($request->has('point') && $request->point !='');//nhận score từ dropdown
        {
            $query->where('point', $request->point);
        }
        //sấp xếp ngày mới nhất lên trên cùng
        $reviews = $query->orderBy('created_at', 'desc')->get();
        
        return response()->json(['reviews' => $reviews]);
    }
}
