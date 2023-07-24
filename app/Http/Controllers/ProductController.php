<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function insertproductform()
    {
        return view('/products/allproducts');
    }
    public function insertproduct(Request $request)
    {
        $product = new Product;
        $product->product_name = $request->input('product_name');
        $product->product_type = $request->input('product_type');
        $product->product_category = $request->input('product_category');
        $product->product_list_price = $request->input('product_list_price');
        $product->product_hsnsac = $request->input('product_hsnsac');


        /* Image Upload */
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . rand() . '.' . $extenstion;
            $file->move('images/productimages/', $filename);
            $product->image = $filename;
        }
        if ($request->hasfile('image1')) {
            $file = $request->file('image1');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . rand() . '.' . $extenstion;
            $file->move('images/productimages/', $filename);
            $product->image1 = $filename;
        }
        if ($request->hasfile('image2')) {
            $file = $request->file('image2');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . rand() . '.' . $extenstion;
            $file->move('images/productimages/', $filename);
            $product->image2 = $filename;
        }
        $product->save();
        return redirect('/products/allproducts');
    }

    public function viewproduct()
    {
        $viewproduct = DB::select('select * from products');
        return view('/products/allproducts', ['viewproduct' => $viewproduct]);
    }
    public function viewproductindetail($product_main_id)
    {
        $product = Product::find($product_main_id);
        return view('/products/singleproduct', compact('product'));
    }
    public function editproduct($product_main_id)
    {
        $product = Product::find($product_main_id);
        $categoryquery = DB::select('select * from category');
        return view('/products/updateproduct', compact('product', 'categoryquery'));
    }
    public function updateproduct(Request $request, $product_main_id)
    {
        $product = Product::find($product_main_id);

        $product->product_name = $request->input('product_name');
        $product->product_type = $request->input('product_type');
        $product->product_category = $request->input('product_category');
        $product->product_list_price = $request->input('product_list_price');
        $product->product_hsnsac = $request->input('product_hsnsac');


        if ($request->image != '') {
            $path = public_path() . '/images/productimages/';

            //code for remove old file
            if ($product->image != '' && $product->image != null) {
                $file_old = $path . $product->image;
                unlink($file_old);
            }

            //upload new file
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . rand() . '.' . $extenstion;
                $file->move('images/productimages/', $filename);
                $product->image = $filename;
            }
        }

        if ($request->image1 != '') {
            $path = public_path() . '/images/productimages/';

            //code for remove old file
            if ($product->image1 != '' && $product->image1 != null) {
                $file_old = $path . $product->image1;
                unlink($file_old);
            }

            //upload new file
            if ($request->hasfile('image1')) {
                $file = $request->file('image1');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . rand() . '.' . $extenstion;
                $file->move('images/productimages/', $filename);
                $product->image1 = $filename;
            }
        }

        if ($request->image2 != '') {
            $path = public_path() . '/images/productimages/';

            //code for remove old file
            if ($product->image2 != '' && $product->image2 != null) {
                $file_old = $path . $product->image2;
                unlink($file_old);
            }

            //upload new file
            if ($request->hasfile('image2')) {
                $file = $request->file('image2');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . rand() . '.' . $extenstion;
                $file->move('images/productimages/', $filename);
                $product->image2 = $filename;
            }
        }
        $product->update();
        return redirect('/products/allproducts');
    }

    public function destroyproduct($product_main_id)
    {
        $expense = Product::find($product_main_id);
        $expense->delete();
        return redirect('/products/allproducts');
    }
    public function categoryinproduct()
    {
        $categoryquery = DB::select('select * from category');
        return view('/products/addproduct', compact('categoryquery'));
    }

    /* Cart Functionality */
    public function cart()
    {
        return view('/frontwebsite/cart');
    }
    public function addToCart($product_main_id)
    {
        $product = Product::find($product_main_id);

        if (!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if (!$cart) {

            $cart = [
                $product_main_id => [
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
        if (isset($cart[$product_main_id])) {

            $cart[$product_main_id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$product_main_id] = [
            "name" => $product->product_name,
            "quantity" => 1,
            "price" => $product->product_list_price,
            "photo" => $product->image,
            "ptype" => $product->product_type
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');


            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }


    public function updateshoppingcart(Request $request)
    {
        $newarray = array_map(null, $request->id, $request->quantity);
        foreach ($newarray as $cdata) {
            $cart = session()->get('cart');
            $cart[$cdata[0]]["quantity"] = $cdata[1];
            session()->put('cart', $cart);
        }
    }
    public function viewproductindetailfront($product_main_id)
    {
        $productdetailfront = Product::find($product_main_id);
        return view('/frontwebsite/productDetail', compact('productdetailfront'));
    }

    public function getproductamount(Request $request)
    {
        $productid = $_GET['productid'];
        $productselectquery = DB::select('select * from products where product_main_id=' . $productid);
        foreach ($productselectquery as $productamount) {
            return $productamount->product_list_price;
        }
    }
}