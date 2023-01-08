<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LeadController extends Controller
{

    public function insertLeadData(Request $request)
    {

        $lead = new Lead;
        $lead->sg_lead_name = $_GET['fullname'];
        $lead->sg_lead_contact_number = $_GET['conemail'];
        $lead->sg_lead_email_address = $_GET['phonenumber'];

        $lead->save();

        $productid = $_GET['productid'];

        $product = Product::find($productid);

        if (!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if (!$cart) {

            $cart = [
                $productid => [
                    "name" => $product->product_name,
                    "quantity" => 1,
                    "price" => $product->product_list_price,
                    "photo" => $product->image,
                    "ptype" => $product->product_type
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$productid])) {

            $cart[$productid]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$productid] = [
            "name" => $product->product_name,
            "quantity" => 1,
            "price" => $product->product_list_price,
            "photo" => $product->image,
            "ptype" => $product->product_type
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');

        //CMS::create($request);
        //return redirect('/products');
    }


}