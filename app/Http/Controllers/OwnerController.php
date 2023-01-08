<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function insertownerform()
    {
        return view('/owner/addowner');
    }
    public function insertowner(Request $request)
    {
        $owner = new Owner;
        $owner->sg_owner_title = $request->input('sg_owner_title');
        if ($request->hasfile('sg_owner_image')) {
            $file = $request->file('sg_owner_image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . rand() . '.' . $extenstion;
            $file->move('images/ownerimages/', $filename);
            $owner->sg_owner_image = $filename;
        }
        $owner->sg_owner_text = $request->input('sg_owner_text');
        $owner->save();
        return redirect('/owner/allowners');
    }

    public function viewowner()
    {
        $id = Auth::id();
        $viewowner = DB::select('select * from sg_owner');
        return view('/owner/allowners', compact('viewowner'));
    }

    public function viewownerindetail($id)
    {
        $viewownerindetail = Owner::find($id);
        return view('/owner/ownerdetails', ['viewownerindetail' => $viewownerindetail]);
    }


    public function editowner($id)
    {
        $owner = Owner::find($id);
        return view('/owner/editowner', compact('owner'));
    }
    public function updateowner(Request $request, $id)
    {
        $owner = Owner::find($id);
        $owner->sg_owner_title = $request->input('sg_owner_title');
        if ($request->sg_owner_image != '') {
            $path = public_path() . '/images/ownerimages/';
            //code for remove old file
            if ($owner->sg_owner_image != '' && $owner->sg_owner_image != null) {
                $file_old = $path . $owner->sg_owner_image;
                unlink($file_old);
            }
            //upload new file
            if ($request->hasfile('sg_owner_image')) {
                $file = $request->file('sg_owner_image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . rand() . '.' . $extenstion;
                $file->move('images/ownerimages/', $filename);
                $owner->sg_owner_image = $filename;
            }
        }
        $owner->sg_owner_text = $request->input('sg_owner_text');
        $owner->update();
        return redirect('/owner/allowners');
    }

    public function destroyowner($id)
    {
        $expense = Owner::find($id);
        $expense->delete();
        return redirect('/owner/allowners');
    }

}