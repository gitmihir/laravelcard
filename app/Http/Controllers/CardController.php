<?php

namespace App\Http\Controllers;

use App\Models\Card;


use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

global $supplierselectquery;
class CardController extends Controller
{
    public function viewcardindetail($customstring, $id)
    {
        $urlstring = '"' . '/view-card-details/' . $customstring . '/' . $id . '"';
        $cardselectquery = DB::select('select * from sg_card_details where sg_cd_QR_Link =' . $urlstring);
        return view('/userarea/view-card-details', compact('cardselectquery'));
    }

    public function editcardindetail($id)
    {
        $card = Card::find($id);
        return view('/userarea/editcards', compact('card'));
    }

    public function updatecard(Request $request, $id)
    {

        $card = Card::find($id);
        $card->sg_cd_user_email = $request->input('sg_cd_user_email');
        $card->sg_cd_user_phone = $request->input('sg_cd_user_phone');


        if ($request->sg_cd_cover_image != '') {
            $path = public_path() . '/images/cardimages/';
            if ($card->sg_cd_cover_image != '' && $card->sg_cd_cover_image != null) {
                $file_old = $path . $card->sg_cd_cover_image;
                unlink($file_old);
            }
            if ($request->hasfile('sg_cd_cover_image')) {
                $file = $request->file('sg_cd_cover_image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/cardimages/', $filename);
                $card->sg_cd_cover_image = $filename;
            }
        }
        if ($request->sg_cd_profile_image != '') {
            $path = public_path() . '/images/cardimages/';
            if ($card->sg_cd_profile_image != '' && $card->sg_cd_profile_image != null) {
                $file_old = $path . $card->sg_cd_profile_image;
                unlink($file_old);
            }

            if ($request->hasfile('sg_cd_profile_image')) {
                $file = $request->file('sg_cd_profile_image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/cardimages/', $filename);
                $card->sg_cd_profile_image = $filename;
            }
        }
        $card->sg_cd_name = $request->input('sg_cd_name');
        $card->sg_cd_designation = $request->input('sg_cd_designation');
        $card->sg_cd_company_name = $request->input('sg_cd_company_name');
        $card->sg_cd_about_us = $request->input('sg_cd_about_us');
        $card->sg_cd_phone_number = $request->input('sg_cd_phone_number');
        $card->sg_cd_whatsapp_number = $request->input('sg_cd_whatsapp_number');
        $card->sg_cd_Business_whatsapp_number = $request->input('sg_cd_Business_whatsapp_number');

        $card->sg_cd_email = $request->input('sg_cd_email');
        $card->sg_cd_website = $request->input('sg_cd_website');
        $card->sg_cd_Facebook = $request->input('sg_cd_Facebook');
        $card->sg_cd_Instagram = $request->input('sg_cd_Instagram');
        $card->sg_cd_Twitter = $request->input('sg_cd_Twitter');
        $card->sg_cd_Linkedin = $request->input('sg_cd_Linkedin');
        $card->sg_cd_Pinterest = $request->input('sg_cd_Pinterest');
        $card->sg_cd_Youtube = $request->input('sg_cd_Youtube');
        $card->sg_cd_Snapchat = $request->input('sg_cd_Snapchat');
        $card->sg_cd_google_business = $request->input('sg_cd_google_business');

        $card->sg_cd_Office = $request->input('sg_cd_Office');
        $card->sg_cd_Branch = $request->input('sg_cd_Branch');
        $card->sg_cd_Branch2 = $request->input('sg_cd_Branch2');

        $card->sg_cd_Service_Title_1 = $request->input('sg_cd_Service_Title_1');
        $card->sg_cd_Service_Title_2 = $request->input('sg_cd_Service_Title_2');
        $card->sg_cd_Service_Title_3 = $request->input('sg_cd_Service_Title_3');
        $card->sg_cd_Service_Title_4 = $request->input('sg_cd_Service_Title_4');
        $card->sg_cd_Service_Title_5 = $request->input('sg_cd_Service_Title_5');
        $card->sg_cd_Service_Title_6 = $request->input('sg_cd_Service_Title_6');
        $card->sg_cd_Service_Title_7 = $request->input('sg_cd_Service_Title_7');
        $card->sg_cd_Service_Title_8 = $request->input('sg_cd_Service_Title_8');

        if ($request->sg_Service_Image_1 != '') {
            $path = public_path() . '/images/cardimages/';
            if ($card->sg_Service_Image_1 != '' && $card->sg_Service_Image_1 != null) {
                $file_old = $path . $card->sg_Service_Image_1;
                unlink($file_old);
            }
            if ($request->hasfile('sg_Service_Image_1')) {
                $file = $request->file('sg_Service_Image_1');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/cardimages/', $filename);
                $card->sg_Service_Image_1 = $filename;
            }
        }
        if ($request->sg_Service_Image_2 != '') {
            $path = public_path() . '/images/cardimages/';
            if ($card->sg_Service_Image_2 != '' && $card->sg_Service_Image_2 != null) {
                $file_old = $path . $card->sg_Service_Image_2;
                unlink($file_old);
            }
            if ($request->hasfile('sg_Service_Image_2')) {
                $file = $request->file('sg_Service_Image_2');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/cardimages/', $filename);
                $card->sg_Service_Image_2 = $filename;
            }
        }
        if ($request->sg_Service_Image_3 != '') {
            $path = public_path() . '/images/cardimages/';
            if ($card->sg_Service_Image_3 != '' && $card->sg_Service_Image_3 != null) {
                $file_old = $path . $card->sg_Service_Image_3;
                unlink($file_old);
            }
            if ($request->hasfile('sg_Service_Image_3')) {
                $file = $request->file('sg_Service_Image_3');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/cardimages/', $filename);
                $card->sg_Service_Image_3 = $filename;
            }
        }
        if ($request->sg_Service_Image_4 != '') {
            $path = public_path() . '/images/cardimages/';
            if ($card->sg_Service_Image_4 != '' && $card->sg_Service_Image_4 != null) {
                $file_old = $path . $card->sg_Service_Image_4;
                unlink($file_old);
            }
            if ($request->hasfile('sg_Service_Image_4')) {
                $file = $request->file('sg_Service_Image_4');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/cardimages/', $filename);
                $card->sg_Service_Image_4 = $filename;
            }
        }
        if ($request->sg_Service_Image_5 != '') {
            $path = public_path() . '/images/cardimages/';
            if ($card->sg_Service_Image_5 != '' && $card->sg_Service_Image_5 != null) {
                $file_old = $path . $card->sg_Service_Image_5;
                unlink($file_old);
            }
            if ($request->hasfile('sg_Service_Image_5')) {
                $file = $request->file('sg_Service_Image_5');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/cardimages/', $filename);
                $card->sg_Service_Image_5 = $filename;
            }
        }
        if ($request->sg_Service_Image_6 != '') {
            $path = public_path() . '/images/cardimages/';
            if ($card->sg_Service_Image_6 != '' && $card->sg_Service_Image_6 != null) {
                $file_old = $path . $card->sg_Service_Image_6;
                unlink($file_old);
            }
            if ($request->hasfile('sg_Service_Image_6')) {
                $file = $request->file('sg_Service_Image_6');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/cardimages/', $filename);
                $card->sg_Service_Image_6 = $filename;
            }
        }
        if ($request->sg_Service_Image_7 != '') {
            $path = public_path() . '/images/cardimages/';
            if ($card->sg_Service_Image_7 != '' && $card->sg_Service_Image_7 != null) {
                $file_old = $path . $card->sg_Service_Image_7;
                unlink($file_old);
            }
            if ($request->hasfile('sg_Service_Image_7')) {
                $file = $request->file('sg_Service_Image_7');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/cardimages/', $filename);
                $card->sg_Service_Image_7 = $filename;
            }
        }
        if ($request->sg_Service_Image_8 != '') {
            $path = public_path() . '/images/cardimages/';
            if ($card->sg_Service_Image_8 != '' && $card->sg_Service_Image_8 != null) {
                $file_old = $path . $card->sg_Service_Image_8;
                unlink($file_old);
            }
            if ($request->hasfile('sg_Service_Image_8')) {
                $file = $request->file('sg_Service_Image_8');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/cardimages/', $filename);
                $card->sg_Service_Image_8 = $filename;
            }
        }
        $card->sg_cd_Service_About_1 = $request->input('sg_cd_Service_About_1');
        $card->sg_cd_Service_About_2 = $request->input('sg_cd_Service_About_2');
        $card->sg_cd_Service_About_3 = $request->input('sg_cd_Service_About_3');
        $card->sg_cd_Service_About_4 = $request->input('sg_cd_Service_About_4');
        $card->sg_cd_Service_About_5 = $request->input('sg_cd_Service_About_5');
        $card->sg_cd_Service_About_6 = $request->input('sg_cd_Service_About_6');
        $card->sg_cd_Service_About_7 = $request->input('sg_cd_Service_About_7');
        $card->sg_cd_Service_About_8 = $request->input('sg_cd_Service_About_8');

        if ($request->sg_cd_Gallery_1 != '') {
            $path = public_path() . '/images/galleryimages/';
            if ($card->sg_cd_Gallery_1 != '' && $card->sg_cd_Gallery_1 != null) {
                $file_old = $path . $card->sg_cd_Gallery_1;
                unlink($file_old);
            }
            if ($request->hasfile('sg_cd_Gallery_1')) {
                $file = $request->file('sg_cd_Gallery_1');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/galleryimages/', $filename);
                $card->sg_cd_Gallery_1 = $filename;
            }
        }
        if ($request->sg_cd_Gallery_2 != '') {
            $path = public_path() . '/images/galleryimages/';
            if ($card->sg_cd_Gallery_2 != '' && $card->sg_cd_Gallery_2 != null) {
                $file_old = $path . $card->sg_cd_Gallery_2;
                unlink($file_old);
            }
            if ($request->hasfile('sg_cd_Gallery_2')) {
                $file = $request->file('sg_cd_Gallery_2');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/galleryimages/', $filename);
                $card->sg_cd_Gallery_2 = $filename;
            }
        }
        if ($request->sg_cd_Gallery_3 != '') {
            $path = public_path() . '/images/galleryimages/';
            if ($card->sg_cd_Gallery_3 != '' && $card->sg_cd_Gallery_3 != null) {
                $file_old = $path . $card->sg_cd_Gallery_3;
                unlink($file_old);
            }
            if ($request->hasfile('sg_cd_Gallery_3')) {
                $file = $request->file('sg_cd_Gallery_3');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/galleryimages/', $filename);
                $card->sg_cd_Gallery_3 = $filename;
            }
        }
        if ($request->sg_cd_Gallery_4 != '') {
            $path = public_path() . '/images/galleryimages/';
            if ($card->sg_cd_Gallery_4 != '' && $card->sg_cd_Gallery_4 != null) {
                $file_old = $path . $card->sg_cd_Gallery_4;
                unlink($file_old);
            }
            if ($request->hasfile('sg_cd_Gallery_4')) {
                $file = $request->file('sg_cd_Gallery_4');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/galleryimages/', $filename);
                $card->sg_cd_Gallery_4 = $filename;
            }
        }
        if ($request->sg_cd_Gallery_5 != '') {
            $path = public_path() . '/images/galleryimages/';
            if ($card->sg_cd_Gallery_5 != '' && $card->sg_cd_Gallery_5 != null) {
                $file_old = $path . $card->sg_cd_Gallery_5;
                unlink($file_old);
            }
            if ($request->hasfile('sg_cd_Gallery_5')) {
                $file = $request->file('sg_cd_Gallery_5');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/galleryimages/', $filename);
                $card->sg_cd_Gallery_5 = $filename;
            }
        }
        if ($request->sg_cd_Gallery_6 != '') {
            $path = public_path() . '/images/galleryimages/';
            if ($card->sg_cd_Gallery_6 != '' && $card->sg_cd_Gallery_6 != null) {
                $file_old = $path . $card->sg_cd_Gallery_6;
                unlink($file_old);
            }
            if ($request->hasfile('sg_cd_Gallery_6')) {
                $file = $request->file('sg_cd_Gallery_6');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/galleryimages/', $filename);
                $card->sg_cd_Gallery_6 = $filename;
            }
        }
        if ($request->sg_cd_Gallery_7 != '') {
            $path = public_path() . '/images/galleryimages/';
            if ($card->sg_cd_Gallery_7 != '' && $card->sg_cd_Gallery_7 != null) {
                $file_old = $path . $card->sg_cd_Gallery_7;
                unlink($file_old);
            }
            if ($request->hasfile('sg_cd_Gallery_7')) {
                $file = $request->file('sg_cd_Gallery_7');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/galleryimages/', $filename);
                $card->sg_cd_Gallery_7 = $filename;
            }
        }
        if ($request->sg_cd_Gallery_8 != '') {
            $path = public_path() . '/images/galleryimages/';
            if ($card->sg_cd_Gallery_8 != '' && $card->sg_cd_Gallery_8 != null) {
                $file_old = $path . $card->sg_cd_Gallery_8;
                unlink($file_old);
            }
            if ($request->hasfile('sg_cd_Gallery_8')) {
                $file = $request->file('sg_cd_Gallery_8');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/galleryimages/', $filename);
                $card->sg_cd_Gallery_8 = $filename;
            }
        }

        $card->sg_cd_YouTube_Link = $request->input('sg_cd_YouTube_Link');

        if ($request->sg_cd_Google_Pay != '') {
            $path = public_path() . '/images/paymentimages/';
            if ($card->sg_cd_Google_Pay != '' && $card->sg_cd_Google_Pay != null) {
                $file_old = $path . $card->sg_cd_Google_Pay;
                unlink($file_old);
            }
            if ($request->hasfile('sg_cd_Google_Pay')) {
                $file = $request->file('sg_cd_Google_Pay');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/paymentimages/', $filename);
                $card->sg_cd_Google_Pay = $filename;
            }
        }
        if ($request->sg_cd_Phone_pe != '') {
            $path = public_path() . '/images/paymentimages/';
            if ($card->sg_cd_Phone_pe != '' && $card->sg_cd_Phone_pe != null) {
                $file_old = $path . $card->sg_cd_Phone_pe;
                unlink($file_old);
            }
            if ($request->hasfile('sg_cd_Phone_pe')) {
                $file = $request->file('sg_cd_Phone_pe');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/paymentimages/', $filename);
                $card->sg_cd_Phone_pe = $filename;
            }
        }
        if ($request->sg_cd_Paytm != '') {
            $path = public_path() . '/images/paymentimages/';
            if ($card->sg_cd_Paytm != '' && $card->sg_cd_Paytm != null) {
                $file_old = $path . $card->sg_cd_Paytm;
                unlink($file_old);
            }
            if ($request->hasfile('sg_cd_Paytm')) {
                $file = $request->file('sg_cd_Paytm');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/paymentimages/', $filename);
                $card->sg_cd_Paytm = $filename;
            }
        }
        if ($request->sg_Bhim_UPI != '') {
            $path = public_path() . '/images/paymentimages/';
            if ($card->sg_Bhim_UPI != '' && $card->sg_Bhim_UPI != null) {
                $file_old = $path . $card->sg_Bhim_UPI;
                unlink($file_old);
            }
            if ($request->hasfile('sg_Bhim_UPI')) {
                $file = $request->file('sg_Bhim_UPI');
                $extenstion = $file->getClientOriginalExtension();
                $filename = rand() . time() . '.' . $extenstion;
                $file->move('images/paymentimages/', $filename);
                $card->sg_Bhim_UPI = $filename;
            }
        }

        if ($request->sg_brochure != '') {
            $path = public_path() . '/images/brochures/';
            if ($card->sg_brochure != '' && $card->sg_brochure != null) {
                $file_old = $path . $card->sg_brochure;
                unlink($file_old);
            }
            if ($request->hasfile('sg_brochure')) {
                $file = $request->file('sg_brochure');
                if ($file->getClientMimeType() !== 'application/pdf') {

                } else {
                    $extenstion = $file->getClientOriginalExtension();
                    $filename = rand() . time() . '.' . $extenstion;
                    $file->move('images/brochures/', $filename);
                    $card->sg_brochure = $filename;
                }
            }
        }
        $card->sg_brochure_title = $request->input('sg_brochure_title');

        $card->sg_cd_Title_1 = $request->input('sg_cd_Title_1');
        $card->sg_cd_Title_2 = $request->input('sg_cd_Title_2');
        $card->sg_cd_Title_3 = $request->input('sg_cd_Title_3');
        $card->sg_cd_Title_4 = $request->input('sg_cd_Title_4');

        $card->sg_cd_Link_1 = $request->input('sg_cd_Link_1');
        $card->sg_cd_Link_2 = $request->input('sg_cd_Link_2');
        $card->sg_cd_Link_3 = $request->input('sg_cd_Link_3');
        $card->sg_cd_Link_4 = $request->input('sg_cd_Link_4');

        $card->update();
        return redirect('/edit-card/' . $card->id);
    }
    public function DeleteImage(Request $request)
    {
        $sg_file_name = $_GET['sg_file_name'];
        $imagedbname = $_GET['imagedbname'];
        $imagefoldername = $_GET['imagefoldername'];
        Card::where($imagedbname, $sg_file_name)->update(array($imagedbname => NULL));
        $path = public_path() . '/images/' . $imagefoldername . '/' . $sg_file_name;
        unlink($path);
        echo $imagedbname;
    }

}