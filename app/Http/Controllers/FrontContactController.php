<?php

namespace App\Http\Controllers;

use App\Models\FrontContact;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontContactController extends Controller
{
    public function insertproductform()
    {
        return view('/contactusfront/addcontact');
    }
    public function insertcontactfr(Request $request)
    {
        $contactfr = new FrontContact;
        $contactfr->sg_contact_title = $request->input('sg_contact_title');
        $contactfr->sg_contact_detail = $request->input('sg_contact_detail');
        $contactfr->sg_contact_email = $request->input('sg_contact_email');
        $contactfr->sg_contact_number = $request->input('sg_contact_number');
        $contactfr->save();
        return redirect('/contactusfront/allcontacts');
    }



    public function viewcontactfr()
    {
        $id = Auth::id();
        $viewcontactfr = DB::select('select * from sg_contact_front');
        return view('/contactusfront/allcontacts', compact('viewcontactfr'));
    }

    public function viewcontactfrindetail($id)
    {
        $viewcontactindfr = FrontContact::find($id);
        return view('/contactusfront/contactdetails', ['viewcontactindfr' => $viewcontactindfr]);
    }


    public function editcontactfr($id)
    {
        $contactfr = FrontContact::find($id);
        return view('/contactusfront/editcontact', compact('contactfr'));
    }
    public function updatecontactfr(Request $request, $id)
    {
        $contactfr = FrontContact::find($id);
        $contactfr->sg_contact_title = $request->input('sg_contact_title');
        $contactfr->sg_contact_detail = $request->input('sg_contact_detail');
        $contactfr->sg_contact_email = $request->input('sg_contact_email');
        $contactfr->sg_contact_number = $request->input('sg_contact_number');
        $contactfr->update();
        return redirect('/contactusfront/allcontacts');
    }

    public function destroycontactfr($id)
    {
        $expense = FrontContact::find($id);
        $expense->delete();
        return redirect('/contactusfront/allcontacts');
    }

}