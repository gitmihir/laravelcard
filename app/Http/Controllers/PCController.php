<?php

namespace App\Http\Controllers;

use App\Models\PC;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class PCController extends Controller
{
    public function insertpcform()
    {
        return redirect('/paymentcredentials/pcdetails');
    }
    public function insertpc(Request $request)
    {
        $PC = new PC;
        $PC->sg_pc_public_key = $request->input('sg_pc_public_key');
        $PC->sg_pc_secret_key = $request->input('sg_pc_secret_key');
        $PC->sg_pc_status = $request->input('sg_pc_status');
        $PC->save();
        return redirect('/paymentcredentials/pcdetails');
    }

    public function viewpc()
    {
        $viewpc = DB::select('select * from sg_payment_credentials');
        return view('/paymentcredentials/pcdetails', ['viewpc' => $viewpc]);
    }

    public function editpc($id)
    {
        $PC = PC::find($id);
        return view('/paymentcredentials/editpc', compact('PC'));
    }

    public function updatepc(Request $request, $id)
    {
        $PC = PC::find($id);
        $PC->sg_pc_public_key = $request->input('sg_pc_public_key');
        $PC->sg_pc_secret_key = $request->input('sg_pc_secret_key');
        $PC->sg_pc_status = $request->input('sg_pc_status');
        $PC->update();
        return redirect('/paymentcredentials/pcdetails');
    }

    public function destroypc($id)
    {
        $PC = PC::find($id);
        $PC->delete();
        return redirect('/paymentcredentials/pcdetails');
    }
}