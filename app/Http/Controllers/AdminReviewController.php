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
        return view('admin.review.delete')->with('msg','Đã xóa đánh giá thành công');
    }
}
