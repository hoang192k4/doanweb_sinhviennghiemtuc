<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
class AdminReviewController extends Controller
{
    public function showListReviews(){
        $listReview=Rating::where('status',1)->orderBy('created_at', 'desc')->get();
        
        return view('admin.pages.review')->with('listReview',$listReview);
    }
    public function deleteReviews($id){
        $review = Rating::findOrFail($id);
        $review->delete();
        return response()->json([
            'message'=>'Xóa đánh giá thành công!'
        ]);
    }
    public function pointReview($point){
        $reviews = Review::where('point', $point)->get();
        
    // Chuẩn bị dữ liệu trả về
        $data = $reviews->map(function ($review) {
            return [
                'id' => $review->id,
                'user_name' => $review->user->full_name, // Giả sử có quan hệ 'user'
                'content' => $review->content,
                'product_name' => $review->product->name, // Giả sử có quan hệ 'product'
                'color' => $review->color,
                'internal_memory' => $review->internal_memory,
                'created_at' => $review->created_at->format('Y-m-d H:i:s'),
                'point' => $review->point,
            ];
        });

        return response()->json($data);

    }
}
