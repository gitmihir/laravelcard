<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    public function insertclientform()
    {
        return view('/clients/addclient');
    }
    public function insertclient(Request $request)
    {
        $client = new Client;
        $client->sg_client_name = $request->input('sg_client_name');
        if ($request->hasfile('sg_client_logo')) {
            $file = $request->file('sg_client_logo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . rand() . '.' . $extenstion;
            $file->move('images/clientimages/', $filename);
            $client->sg_client_logo = $filename;
        }

        $client->save();
        return redirect('/clients/allclients');
    }

    public function viewclient()
    {
        $id = Auth::id();
        $viewclient = DB::select('select * from sg_clients');
        return view('/clients/allclients', compact('viewclient'));
    }

    public function viewclientindetail($id)
    {
        $viewclientindetail = Client::find($id);
        return view('/clients/clientdetails', ['viewclientindetail' => $viewclientindetail]);
    }


    public function editclient($id)
    {
        $client = Client::find($id);
        return view('/clients/editclient', compact('client'));
    }
    public function updateclient(Request $request, $id)
    {
        $client = Client::find($id);
        $client->sg_client_name = $request->input('sg_client_name');
        if ($request->sg_client_logo != '') {
            $path = public_path() . '/images/clientimages/';
            //code for remove old file
            if ($client->sg_client_logo != '' && $client->sg_client_logo != null) {
                $file_old = $path . $client->sg_client_logo;
                unlink($file_old);
            }
            //upload new file
            if ($request->hasfile('sg_client_logo')) {
                $file = $request->file('sg_client_logo');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . rand() . '.' . $extenstion;
                $file->move('images/clientimages/', $filename);
                $client->sg_client_logo = $filename;
            }
        }

        $client->update();
        return redirect('/clients/allclients');
    }

    public function destroyclient($id)
    {
        $expense = Client::find($id);
        $expense->delete();
        return redirect('/clients/allclients');
    }

}