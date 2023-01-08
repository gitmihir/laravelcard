<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function insertreviewform()
    {
        return view('/reviews/addreview');
    }
    public function insertreview(Request $request)
    {
        $review = new Review;
        $review->sg_review_title = $request->input('sg_review_title');
        if ($request->hasfile('sg_review_image')) {
            $file = $request->file('sg_review_image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . rand() . '.' . $extenstion;
            $file->move('images/reviewimages/', $filename);
            $review->sg_review_image = $filename;
        }
        $review->sg_review_text = $request->input('sg_review_text');
        $review->save();
        return redirect('/reviews/allreviews');
    }

    public function viewreview()
    {
        $id = Auth::id();
        $viewreview = DB::select('select * from sg_reviews');
        return view('/reviews/allreviews', compact('viewreview'));
    }

    public function viewreviewindetail($id)
    {
        $viewreviewindetail = Review::find($id);
        return view('/reviews/reviewdetails', ['viewreviewindetail' => $viewreviewindetail]);
    }


    public function editreview($id)
    {
        $review = Review::find($id);
        return view('/reviews/editreview', compact('review'));
    }
    public function updatereview(Request $request, $id)
    {
        $review = Review::find($id);
        $review->sg_review_title = $request->input('sg_review_title');
        if ($request->sg_review_image != '') {
            $path = public_path() . '/images/reviewimages/';
            //code for remove old file
            if ($review->sg_review_image != '' && $review->sg_review_image != null) {
                $file_old = $path . $review->sg_review_image;
                unlink($file_old);
            }
            //upload new file
            if ($request->hasfile('sg_review_image')) {
                $file = $request->file('sg_review_image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . rand() . '.' . $extenstion;
                $file->move('images/reviewimages/', $filename);
                $review->sg_review_image = $filename;
            }
        }
        $review->sg_review_text = $request->input('sg_review_text');
        $review->update();
        return redirect('/reviews/allreviews');
    }

    public function destroyreview($id)
    {
        $expense = Review::find($id);
        $expense->delete();
        return redirect('/reviews/allreviews');
    }

}