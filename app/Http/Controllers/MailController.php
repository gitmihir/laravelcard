<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

//use Session;


class MailController extends Controller
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
                $message->to('developermihir009@gmail.com')->subject('Email From ContactUs Form');
            }
        );
        if (count(\Mail::failures()) > 0) {
            echo "0";
        } else {
            echo "1";
        }
    }
}