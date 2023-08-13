<?php
namespace App\Http\Controllers;

use Storage;
use App\Models\Order;
use App\Models\User;
use App\Models\Card;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Undefined;
use Paytm;
use DB;
use App\Models\Brand;

class OrderController extends Controller
{
    public function insertorderform()
    {
        return redirect('/frontwebsite/checkout');
    }

    // Razorpay
    public function inserorder(Request $request)
    {
        $order = new Order;
        $cardcount = array_sum($_GET['product_quantities']);
        $order->sg_total_product_count = $cardcount;
        $order->sg_full_name = $_GET['sg_full_name'];
        $order->sg_business_name = $_GET['sg_business_name'];
        $order->sg_business_address = $_GET['sg_business_address'];
        $order->sg_business_GST_number = $_GET['sg_business_GST_number'];
        $order->sg_business_email = $_GET['sg_business_email'];
        $order->sg_business_phone = $_GET['sg_business_phone'];
        $order->sg_s_name = $_GET['sg_s_name'];
        $order->sg_s_address = $_GET['sg_s_address'];
        $order->sg_s_email = $_GET['sg_s_email'];
        $order->sg_s_phone = $_GET['sg_s_phone'];
        $order->sg_state = $_GET['sg_state'];
        $order->sg_s_state = $_GET['sg_s_state'];
        $order->coupon_ID = $_GET['coupon_ID'];
        $order->franchise_ID = $_GET['franchise_ID'];
        $order->return_coupon_code = $_GET['return_coupon_code'];
        $order->coupon_discount = $_GET['coupon_discount'];
        $order->before_discount_total = $_GET['before_discount_total'];
        $order->discounted_price = $_GET['discounted_price'];
        $order->after_discount_total = $_GET['after_discount_total'];
        $order->product_ids = implode(",", $_GET['product_ids']);
        $order->product_quantities = implode(",", $_GET['product_quantities']);
        $order->product_prices = implode(",", $_GET['product_prices']);
        $order->order_id_for_status = $_GET['order_id_for_status'];
        $order->payment_remark = $_GET['payment_remark'];
        $order->sg_order_status = $_GET['sg_order_status'];
        $order->Order_status = $_GET['Order_status'];

        if (isset($_GET['cgst'])) {
            $order->sg_CGST = $_GET['cgst'];
        } else {
            $order->sg_CGST = $_GET['sg_CGST'];
        }
        if (isset($_GET['sgst'])) {
            $order->sg_SGST = $_GET['sgst'];
        } else {
            $order->sg_SGST = $_GET['sg_SGST'];
        }
        if (isset($_GET['igst'])) {
            $order->sg_IGST = $_GET['igst'];
        } else {
            $order->sg_IGST = $_GET['sg_IGST'];
        }
        //Total Tax
        if ($_GET['sg_state'] === 'Gujarat') {
            if (isset($_GET['cgst']) && isset($_GET['sgst'])) {
                $order->sg_total_tax = $_GET['cgst'] + $_GET['sgst'];
            } else {
                $order->sg_total_tax = $_GET['sg_CGST'] + $_GET['sg_SGST'];
            }
        } else {
            if (isset($_GET['igst'])) {
                $order->sg_total_tax = $_GET['igst'];
            } else {
                $order->sg_total_tax = $_GET['sg_IGST'];
            }
        }
        $order->sg_order_base_price = $_GET['sg_order_base_price'];
        $order->save();
        $request->session()->forget('cart');

        $length = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        /* Insert Card Details */
        for ($c = 0; $c < $cardcount; $c++) {
            $card = new Card;
            $baseurl = '/view-card-details/' . $randomString . '/' . $c;
            $card->sg_order_id = $_GET['order_id_for_status'];
            $card->sg_cd_QR_Link = $baseurl;
            $card->sg_user_order_email = $_GET['sg_business_email'];
            $finename = "qr-" . time() . $c;
            $card->sg_card_image_name = $finename;
            $qrurl = 'http://' . $_SERVER['SERVER_NAME'];
            $finalurl = $qrurl . $baseurl;
            $image = \QrCode::format('png')->size(400)->errorCorrection('H')->generate($finalurl);
            $output_file = '/images/qrimages/' . $finename . '.png';
            Storage::disk('public')->put($output_file, $image);
            if (isset($_GET['OfflineOrder'])) {
                $card->sg_order_status = '1';
            } else {
                $card->sg_order_status = '0';
            }
            $card->save();
        }
        if (User::where('email', '=', $_GET['sg_business_email'])->exists()) {
            $brand = Brand::all();
            $brandemail = [];
            $brandphone = [];
            foreach ($brand as $branddata) {
                $brandemail = $branddata->sg_brand_business_email;
                $brandphone = $branddata->sg_brand_busienss_phone;
            }
            \Mail::html(
                "<main style='width: 60%;background-color: #f8f3ed;margin: auto;font-family: 'Segoe UI regular';height: 100%;'><section style='background: white;width: 90%;margin: 0px auto;border-radius: 5%;margin-bottom: 5%;padding: 4% 0;'><p style='text-align: center;'>Dear " . $_GET['sg_full_name'] . ", we are delighted to confirm your order. Your Order ID is: " . $_GET['order_id_for_status'] . ". Access all updates by logging into your account using your provided ID and password. Thank you for Choosing us. For any queries, kindly contact us at $brandemail or email us at $brandphone.</p></section></main>",
                function ($message) {
                    $message->to($_GET['sg_business_email'])->subject('Order');
                }
            );
        } else {
            $user = new User();
            $user['name'] = $_GET['sg_full_name'];
            $user['email'] = $_GET['sg_business_email'];
            $psw = $randomString;
            $user['password'] = \Hash::make($psw);
            $user['user_role'] = 'normaluser';
            // Welcome Email
            $brand = Brand::all();
            $brandemail = [];
            $brandphone = [];
            foreach ($brand as $branddata) {
                $brandemail = $branddata->sg_brand_business_email;
                $brandphone = $branddata->sg_brand_busienss_phone;
            }
            \Mail::html(
                "<main style='width: 60%;background-color: #f8f3ed;margin: auto;font-family: 'Segoe UI regular';height: 100%;'><section style='background: white;width: 90%;margin: 0px auto;border-radius: 5%;margin-bottom: 5%;padding: 4% 0;'><p style='text-align: center;'>Dear " . $_GET['sg_full_name'] . ", Welcome to KESSR. Here is your ID (" . $_GET['sg_business_email'] . ") and secure password (" . $psw . ") to access your account. Keep this information confidential and ensure its safety. Thank you for Choosing us. For any queries, kindly contact us at $brandemail or email us at $brandphone.</p></section></main>",
                function ($message) {
                    $message->to($_GET['sg_business_email'])->subject('Order');
                }
            );
            // Order Email
            \Mail::html(
                "<main style='width: 60%;background-color: #f8f3ed;margin: auto;font-family: 'Segoe UI regular';height: 100%;'><section style='background: white;width: 90%;margin: 0px auto;border-radius: 5%;margin-bottom: 5%;padding: 4% 0;'><p style='text-align: center;'>Dear " . $_GET['sg_full_name'] . ", we are delighted to confirm your order. Your Order ID is: " . $_GET['order_id_for_status'] . ". Access all updates by logging into your account using your provided ID and password. Thank you for Choosing us. For any queries, kindly contact us at $brandemail or email us at $brandphone.</p></section></main>",
                function ($message) {
                    $message->to($_GET['sg_business_email'])->subject('Order');
                }
            );
            $user->save();
            $user->password = $psw;
        }
    }
    public function vieworderindetail($id)
    {
        $order = Order::find($id);
        return view('/orderoffline/orderofflinedetails', ['order' => $order]);
    }

    public function editorder($id)
    {
        $order = Order::find($id);
        return view('/orderoffline/editorderoffline', compact('order'));
    }
    public function updateorder(Request $request, $id)
    {
        $order = Order::find($id);
        $order->sg_total_product_count = count($request->input('product_name'));
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
        $order->sg_state = $request->input('sg_state');
        $order->sg_s_state = $request->input('sg_s_state');
        $order->coupon_ID = $request->input('coupon_ID');
        $order->franchise_ID = $request->input('franchise_ID');
        $order->return_coupon_code = $request->input('return_coupon_code');
        $order->coupon_discount = $request->input('coupon_discount');
        $order->before_discount_total = $request->input('bill_amount');
        $order->discounted_price = $request->input('discounted_price');
        $order->after_discount_total = $request->input('after_discount_total');
        $order->product_ids = implode(",", $request->input('product_name'));
        $order->product_quantities = implode(",", $request->input('product_quantity'));
        $order->product_prices = implode(",", $request->input('product_total_amount'));
        $order->Order_status = $request->input('Order_status');
        $order->sg_CGST = $request->input('sg_CGST');
        $order->sg_SGST = $request->input('sg_SGST');
        $order->sg_IGST = $request->input('sg_IGST');
        $order->sg_order_base_price = $request->input('sg_order_base_price');
        //Total Tax
        if ($request->input('sg_state') === 'Gujarat') {
            $order->sg_total_tax = $request->input('sg_CGST') + $request->input('sg_SGST');
        } else {
            $order->sg_total_tax = $request->input('sg_IGST');
        }
        $order->order_id_for_status = $request->input('order_id_for_status');
        $order->payment_remark = $request->input('payment_remark');
        $order->update();
        return redirect('/orderoffline/allorderoffline');
    }

    public function destroyorder(Request $request)
    {
        $id = $request->id;
        $orderid = $request->orderid;
        $order = Order::find($id);
        DB::select('DELETE from sg_card_details WHERE sg_order_id =  ' . $orderid);
        $order->delete();
        return redirect('/orderoffline/allorderoffline');
    }

}