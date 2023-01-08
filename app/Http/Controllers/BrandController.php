<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function insertbarndform()
    {
        return redirect('/branddetails/branddetail');
    }
    public function insertbrand(Request $request)
    {
        $brand = new Brand;

        /* Image Upload */
        if ($request->hasfile('sg_brand_logo')) {
            $file1 = $request->file('sg_brand_logo');
            $extenstion1 = $file1->getClientOriginalExtension();
            $filename1 = time() . rand() . '.' . $extenstion1;
            $file1->move('images/brandimages/', $filename1);
            $brand->sg_brand_logo = $filename1;
        }

        if ($request->hasfile('sg_favicon_icon')) {
            $file2 = $request->file('sg_favicon_icon');
            $extenstion2 = $file2->getClientOriginalExtension();
            $filename2 = time() . rand() . '.' . $extenstion2;
            $file2->move('images/brandimages/', $filename2);
            $brand->sg_favicon_icon = $filename2;
        }
        $brand->sg_brand_tagline = $request->input('sg_brand_tagline');
        $brand->sg_brand_business_name = $request->input('sg_brand_business_name');

        if ($request->hasfile('sg_brand_business_logo')) {
            $file3 = $request->file('sg_brand_business_logo');
            $extenstion3 = $file3->getClientOriginalExtension();
            $filename3 = time() . rand() . '.' . $extenstion3;
            $file3->move('images/brandimages/', $filename3);
            $brand->sg_brand_business_logo = $filename3;
        }
        $brand->sg_brand_business_address = $request->input('sg_brand_business_address');
        $brand->sg_brand_business_email = $request->input('sg_brand_business_email');
        $brand->sg_brand_busienss_phone = $request->input('sg_brand_busienss_phone');
        $brand->sg_brand_tandc_line = $request->input('sg_brand_tandc_line');
        $brand->sg_brand_upload_limit = $request->input('sg_brand_upload_limit');

        $brand->sg_gstin = $request->input('sg_gstin');
        $brand->sg_gstin_tax = $request->input('sg_gstin_tax');

        $brand->save();
        return redirect('/branddetails/branddetail');
    }

    public function viewbrand()
    {
        $viewbrand = DB::select('select * from sg_brand_details');
        return view('/branddetails/branddetail', ['viewbrand' => $viewbrand]);
    }

    public function editbrand($id)
    {
        $brand = Brand::find($id);
        return view('/branddetails/editbrand', compact('brand'));
    }

    public function updatebrand(Request $request, $id)
    {
        $brand = Brand::find($id);

        // Update Image
        if ($request->sg_brand_logo != '') {
            $path = public_path() . '/images/brandimages/';

            //code for remove old file
            if ($brand->sg_brand_logo != '' && $brand->sg_brand_logo != null) {
                $file_old = $path . $brand->sg_brand_logo;
                unlink($file_old);
            }
            //upload new file
            if ($request->hasfile('sg_brand_logo')) {
                $file = $request->file('sg_brand_logo');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . rand() . '.' . $extenstion;
                $file->move('images/brandimages/', $filename);
                $brand->sg_brand_logo = $filename;
            }
        }

        if ($request->sg_favicon_icon != '') {
            $path = public_path() . '/images/brandimages/';

            //code for remove old file
            if ($brand->sg_favicon_icon != '' && $brand->sg_favicon_icon != null) {
                $file_old = $path . $brand->sg_favicon_icon;
                unlink($file_old);
            }
            //upload new file
            if ($request->hasfile('sg_favicon_icon')) {
                $file = $request->file('sg_favicon_icon');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . rand() . '.' . $extenstion;
                $file->move('images/brandimages/', $filename);
                $brand->sg_favicon_icon = $filename;
            }
        }
        $brand->sg_brand_tagline = $request->input('sg_brand_tagline');
        $brand->sg_brand_business_name = $request->input('sg_brand_business_name');

        if ($request->sg_brand_business_logo != '') {
            $path = public_path() . '/images/brandimages/';

            //code for remove old file
            if ($brand->sg_brand_business_logo != '' && $brand->sg_brand_business_logo != null) {
                $file_old = $path . $brand->sg_brand_business_logo;
                unlink($file_old);
            }
            //upload new file
            if ($request->hasfile('sg_brand_business_logo')) {
                $file = $request->file('sg_brand_business_logo');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . rand() . '.' . $extenstion;
                $file->move('images/brandimages/', $filename);
                $brand->sg_brand_business_logo = $filename;
            }
        }
        $brand->sg_brand_business_address = $request->input('sg_brand_business_address');
        $brand->sg_brand_business_email = $request->input('sg_brand_business_email');
        $brand->sg_brand_busienss_phone = $request->input('sg_brand_busienss_phone');
        $brand->sg_brand_tandc_line = $request->input('sg_brand_tandc_line');
        $brand->sg_brand_upload_limit = $request->input('sg_brand_upload_limit');
        $brand->sg_gstin = $request->input('sg_gstin');
        $brand->sg_gstin_tax = $request->input('sg_gstin_tax');

        $brand->update();
        return redirect('/branddetails/branddetail');
    }

    public function destroybrand($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('/branddetails/branddetail');
    }
}