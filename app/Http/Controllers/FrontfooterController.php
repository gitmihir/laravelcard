<?php

namespace App\Http\Controllers;

use App\Models\Frontfooter;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class FrontfooterController extends Controller
{
    public function insertfrontfooterform()
    {
        return redirect('/frontfooter/footerdetails');
    }
    public function insertfrontfooter(Request $request)
    {
        $frontfooter = new Frontfooter;
        $frontfooter->sg_footer_fb_link = $request->input('sg_footer_fb_link');
        $frontfooter->sg_footer_inst_link = $request->input('sg_footer_inst_link');
        $frontfooter->sg_footer_tw_link = $request->input('sg_footer_tw_link');
        $frontfooter->sg_footer_lk_link = $request->input('sg_footer_lk_link');
        $frontfooter->sg_footer_pt_link = $request->input('sg_footer_pt_link');
        $frontfooter->sg_footer_call_link = $request->input('sg_footer_call_link');
        $frontfooter->sg_footer_whatsapp_link = $request->input('sg_footer_whatsapp_link');
        $frontfooter->sg_footer_email = $request->input('sg_footer_email');
        $frontfooter->save();
        return redirect('/frontfooter/footerdetails');
    }

    public function viewfrontfooter()
    {
        $viewfrontfooter = DB::select('select * from sg_footer');
        return view('/frontfooter/footerdetails', ['viewfrontfooter' => $viewfrontfooter]);
    }

    public function editfrontfooter($id)
    {
        $frontfooter = Frontfooter::find($id);
        return view('/frontfooter/editfooter', compact('frontfooter'));
    }

    public function updatefrontfooter(Request $request, $id)
    {
        $frontfooter = Frontfooter::find($id);
        $frontfooter->sg_footer_fb_link = $request->input('sg_footer_fb_link');
        $frontfooter->sg_footer_inst_link = $request->input('sg_footer_inst_link');
        $frontfooter->sg_footer_tw_link = $request->input('sg_footer_tw_link');
        $frontfooter->sg_footer_lk_link = $request->input('sg_footer_lk_link');
        $frontfooter->sg_footer_pt_link = $request->input('sg_footer_pt_link');
        $frontfooter->sg_footer_call_link = $request->input('sg_footer_call_link');
        $frontfooter->sg_footer_whatsapp_link = $request->input('sg_footer_whatsapp_link');
        $frontfooter->sg_footer_email = $request->input('sg_footer_email');
        $frontfooter->sg_footer_text = $request->input('sg_footer_text');
        $frontfooter->sg_footer_address = $request->input('sg_footer_address');
        $frontfooter->update();
        return redirect('/frontfooter/footerdetails');
    }

    public function destroyfrontfooter($id)
    {
        $frontfooter = Frontfooter::find($id);
        $frontfooter->delete();
        return redirect('/frontfooter/footerdetails');
    }
}