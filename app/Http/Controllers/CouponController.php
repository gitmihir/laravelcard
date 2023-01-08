<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Franchise;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    public function insertcouponform()
    {
        return view('/coupon/addcoupon');
    }

    public function insertcoupon(Request $request)
    {
        $coupon = new Coupon;
        $coupon->sg_franchise_id = $request->input('sg_franchise_id');
        $coupon->sg_coupon_code = $request->input('sg_coupon_code');
        $coupon->sg_coupon_discount = $request->input('sg_coupon_discount');
        $coupon->save();
        return redirect('/coupon/allcoupon');
    }

    public function viewcoupon()
    {
        $id = Auth::id();
        $viewcoupon = DB::select('select * from sg_coupon_code');
        return view('/coupon/allcoupon', compact('viewcoupon'));
    }

    public function viewcouponindetail($id)
    {
        $viewcouponindetail = Coupon::find($id);
        return view('/coupon/coupondetails', compact('viewcouponindetail'));
    }
    public function editcoupon($id)
    {
        $coupon = Coupon::find($id);
        $allfranchise = Franchise::all();
        $franchise = DB::table('sg_franchise')->where('id', $id)->first();
        return view('/coupon/editcoupon', compact('coupon', 'franchise', 'allfranchise'));
    }
    public function updatecoupon(Request $request, $id)
    {
        $coupon = Coupon::find($id);
        $coupon->sg_franchise_id = $request->input('sg_franchise_id');
        $coupon->sg_coupon_code = $request->input('sg_coupon_code');
        $coupon->sg_coupon_discount = $request->input('sg_coupon_discount');
        $coupon->update();
        return redirect('/coupon/allcoupon');
    }

    public function destroycoupon($id)
    {
        $expense = Coupon::find($id);
        $expense->delete();
        return redirect('/coupon/allcoupon');
    }

    public function checkCouponCode()
    {
        $coupon_code = $_GET['coupon_code'];
        if (!empty($coupon_code)) {
            $couponqry = DB::table('sg_coupon_code')->where('sg_coupon_code', $coupon_code)->first();
            $coupon = Coupon::where('sg_coupon_code', '<=', $coupon_code)->get();
            $couponCount = $coupon->count();
            if ($couponCount > 0) {
                return $couponqry->id . "~" . $couponqry->sg_franchise_id . "~" . $couponqry->sg_coupon_code . "~" . $couponqry->sg_coupon_discount;
            } else {
                return "1";
            }
        } else {
            return "0";
        }
    }
}