<?php

namespace App\Http\Controllers;

use App\Models\Franchise;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FranchiseController extends Controller
{
    public function insertfranchiseform()
    {
        return view('/franchise/addfranchise');
    }
    public function insertfranchise(Request $request)
    {
        $franchise = new Franchise;
        $franchise->sg_franchise_name = $request->input('sg_franchise_name');
        $franchise->sg_franchise_contact_number = $request->input('sg_franchise_contact_number');
        $franchise->sg_franchise_email = $request->input('sg_franchise_email');
        $franchise->sg_franchise_password = $request->input('sg_franchise_password');
        $franchise->save();
        return redirect('/franchise/allfranchise');
    }

    public function viewfranchise()
    {
        $id = Auth::id();
        $viewfranchise = DB::select('select * from sg_franchise');
        return view('/franchise/allfranchise', compact('viewfranchise'));
    }

    public function viewfranchiseindetail($id)
    {
        $viewfranchiseindetail = Franchise::find($id);
        return view('/franchise/franchisedetails', ['viewfranchiseindetail' => $viewfranchiseindetail]);
    }


    public function editfranchise($id)
    {
        $franchise = Franchise::find($id);
        return view('/franchise/editfranchise', compact('franchise'));
    }
    public function updatefranchise(Request $request, $id)
    {
        $franchise = Franchise::find($id);
        $franchise->sg_franchise_name = $request->input('sg_franchise_name');
        $franchise->sg_franchise_contact_number = $request->input('sg_franchise_contact_number');
        $franchise->sg_franchise_email = $request->input('sg_franchise_email');
        $franchise->sg_franchise_password = $request->input('sg_franchise_password');
        $franchise->update();
        return redirect('/franchise/allfranchise');
    }

    public function destroyfranchise($id)
    {
        $expense = Franchise::find($id);
        $expense->delete();
        return redirect('/franchise/allfranchise');
    }

}