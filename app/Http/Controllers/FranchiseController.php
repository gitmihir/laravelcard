<?php

namespace App\Http\Controllers;

use App\Models\Franchise;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Hash;

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

        $length = 6;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        if (User::where('email', '=', $request->input('sg_franchise_email'))->exists()) {

        } else {
            $user = new User();
            $user['name'] = $request->input('sg_franchise_name');
            $user['email'] = $request->input('sg_franchise_email');
            $psw = $request->input('sg_franchise_password');
            $user['password'] = \Hash::make($psw);
            $user['user_role'] = 'franchiseuser';
            $user->save();
            $user->password = $psw;
        }
        $franchise->save();
        if (Franchise::where('sg_franchise_email', '=', $request->input('sg_franchise_email'))->exists()) {
            \Mail::html(
                "Name: " . $request->input('sg_franchise_name') . "</br>" . "Email: " . $request->input('sg_franchise_email') . "</br>" . "Password: " . $psw,
                function ($message) {
                    $franchise = Franchise::all();
                    $emailtosend = [];
                    foreach ($franchise as $franchiseemail) {
                        $emailtosend = $franchiseemail->sg_franchise_email;
                    }
                    $message->to($emailtosend)->subject('Frenchise');
                }
            );
        }

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


        $user = User::where('email', $request->input('sg_franchise_email'))->first();
        $user->password = Hash::make($request->input('sg_franchise_password'));
        $user->save();

        $franchise->update();
        return redirect('/franchise/allfranchise');
    }

    public function destroyfranchise($id)
    {
        $expense = Franchise::find($id);
        $expense->delete();
        return redirect('/franchise/allfranchise');
    }
    public function CheckEmail()
    {
        $email = $_GET['sg_franchise_email'];
        if (User::where('email', '=', $email)->exists()) {
            return "1";
        } else {
            return "0";
        }
    }
    public function viewfranchiseorders($id)
    {
        //$viewfranchiseorders = Order::find($id);
        $viewfranchiseorders = DB::select('select * from sg_order where franchise_ID =' . $id);
        return view('franchise/franchiseorders', ['viewfranchiseorders' => $viewfranchiseorders]);
    }
}