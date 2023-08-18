<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Brand;

class ContactController extends Controller
{
    public function sendemailcontroller(Request $request)
    {
        $data = [
            'fullname' => $_GET['fullname'],
            'conemail' => $_GET['conemail'],
            'phonenumber' => $_GET['phonenumber'],
            'comment' => $_GET['message'],
        ];
        \Mail::html(
            "Name: " . $data['fullname'] . "</br>" . "Email: " . $data['conemail'] . "</br>" . "Phone Number: " . $data['phonenumber'] . "</br>" . "Message: " . $data['comment'],
            function ($message) {
                $brand = Brand::all();
                $emailtosend = [];
                foreach ($brand as $brandemail) {
                    $emailtosend = $brandemail->sg_brand_business_email;
                }
                $message->to($emailtosend)->subject('Contact form');
            }
        );
        if (count(\Mail::failures()) > 0) {
            echo "0";
        } else {
            echo "1";
        }
    }
}