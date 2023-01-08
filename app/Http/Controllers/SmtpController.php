<?php

namespace App\Http\Controllers;

use App\Models\Smtp;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class SmtpController extends Controller
{
    public function insertsmtpform()
    {
        return redirect('/smtp/smtpdetails');
    }
    public function insertsmtp(Request $request)
    {
        $smtp = new Smtp;
        $smtp->sg_smtp_driver = $request->input('sg_smtp_driver');
        $smtp->sg_smtp_host = $request->input('sg_smtp_host');
        $smtp->sg_smtp_port = $request->input('sg_smtp_port');
        $smtp->sg_smtp_username = $request->input('sg_smtp_username');
        $smtp->sg_smtp_password = $request->input('sg_smtp_password');
        $smtp->sg_smtp_encryption = $request->input('sg_smtp_encryption');
        $smtp->sg_smtp_from_address = $request->input('sg_smtp_from_address');
        $smtp->sg_smtp_from_name = $request->input('sg_smtp_from_name');
        $smtp->save();
        return redirect('/smtp/smtpdetails');
    }

    public function viewsmtp()
    {
        $viewsmtp = DB::select('select * from sg_smtp_details');
        return view('/smtp/smtpdetails', ['viewsmtp' => $viewsmtp]);
    }

    public function editsmtp($id)
    {
        $smtp = Smtp::find($id);
        return view('/smtp/editsmtp', compact('smtp'));
    }

    public function updatesmtp(Request $request, $id)
    {
        $smtp = Smtp::find($id);
        $smtp->sg_smtp_driver = $request->input('sg_smtp_driver');
        $smtp->sg_smtp_host = $request->input('sg_smtp_host');
        $smtp->sg_smtp_port = $request->input('sg_smtp_port');
        $smtp->sg_smtp_username = $request->input('sg_smtp_username');
        $smtp->sg_smtp_password = $request->input('sg_smtp_password');
        $smtp->sg_smtp_encryption = $request->input('sg_smtp_encryption');
        $smtp->sg_smtp_from_address = $request->input('sg_smtp_from_address');
        $smtp->sg_smtp_from_name = $request->input('sg_smtp_from_name');
        $smtp->update();
        return redirect('/smtp/smtpdetails');
    }

    public function destroysmtp($id)
    {
        $smtp = Smtp::find($id);
        $smtp->delete();
        return redirect('/smtp/smtpdetails');
    }
}