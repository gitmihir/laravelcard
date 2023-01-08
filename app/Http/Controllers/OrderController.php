<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function insertorderform()
    {
        return redirect('/frontwebsite/checkout');
    }
    public function inserorder(Request $request)
    {
        $order = new Order;
        $order->sg_total_product_count = count($request->input('product_ids'));
        $order->sg_full_name = $request->input('sg_full_name');
        $order->sg_business_name = $request->input('sg_business_name');
        $order->sg_business_address = $request->input('sg_business_address');
        $order->sg_business_GST_number = $request->input('sg_business_GST_number');
        $order->sg_business_email = $request->input('sg_business_email');
        $order->sg_business_phone = $request->input('sg_business_phone');
        $order->sg_s_name = $request->input('sg_s_name');
        $order->sg_s_address = $request->input('sg_s_address');
        $order->sg_s_email = $request->input('sg_s_email');
        $order->sg_s_phone = $request->input('sg_s_phone');
        $order->coupon_ID = $request->input('coupon_ID');
        $order->franchise_ID = $request->input('franchise_ID');
        $order->return_coupon_code = $request->input('return_coupon_code');
        $order->coupon_discount = $request->input('coupon_discount');
        $order->shipping_fee = $request->input('shipping_fee');
        $order->before_discount_total = $request->input('before_discount_total');
        $order->discounted_price = $request->input('discounted_price');
        $order->after_discount_total = $request->input('after_discount_total');

        $order->product_ids = implode(",", $request->input('product_ids'));
        $order->product_quantities = implode(",", $request->input('product_quantities'));
        $order->product_prices = implode(",", $request->input('product_prices'));

        //$productarray = (array_map(null, $_POST['product_ids'], $_POST['product_quantities'], $_POST['product_prices']));
        $order->save();
        $request->session()->forget('cart');
        //$request->session()->flush();
        return redirect('/');
    }

}