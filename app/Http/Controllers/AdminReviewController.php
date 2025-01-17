<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
class AdminReviewController extends Controller
{
    public function showListReviews(){
        $listReview=Rating::ShowListReview();
       
        return view('admin.pages.review')->with('listReview',$listReview);
    }
    public function deleteReviews($id){
        $review = Rating::findOrFail($id);
        $review->delete();
        return response()->json([
            'message'=>'Xóa đánh giá thành công!'
        ]);
    }
    public function searchReview(Request $request)
    {
        $listReview = Rating::SearchReview($request->keyword_review);

        return view('admin.pages.review')->with('listReview',$listReview);
    }
    public function pointReview(Request $request)
    {
        $listReview = Rating::PointReview($request->point);
        return response()->json(['listReview' => $listReview]);

    }
}
