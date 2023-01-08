<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class SupplierController extends Controller
{
    public function insertsupplierform()
    {
        return view('/supplier/allsupplier');
    }
    public function insertsupplier(Request $request)
    {
        $supplier = new Supplier;
        $supplier->supplier_name = $request->input('supplier_name');
        $supplier->supplier_company  = $request->input('supplier_company');
        $supplier->supplier_contact_number  = $request->input('supplier_contact_number');
        $supplier->supplier_email  = $request->input('supplier_email');
        $supplier->supplier_registered_address  = $request->input('supplier_registered_address');
        $supplier->supplier_communication_address = $request->input('supplier_communication_address');
        $supplier->supplier_gst_number  = $request->input('supplier_gst_number');
        $supplier->supplier_added_by  = $request->input('supplier_added_by');
        $supplier->save();
        return redirect('/supplier/allsupplier');
    }

    public function viewsupplier()
    {
        $id = Auth::id();
        $viewsupplier = DB::select('select * from supplier where supplier_added_by =' . $id);
        return view('/supplier/allsupplier', ['viewsupplier' => $viewsupplier]);
    }
    public function viewsupplierindetail($id)
    {
        $supplier = Supplier::find($id);
        return view('/supplier/singlesupplier', compact('supplier'));
    }
    public function editsupplier($id)
    {
        $supplier = Supplier::find($id);
        return view('/supplier/updatesupplier', compact('supplier'));
    }
    public function updatesupplier(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        $supplier->supplier_name = $request->input('supplier_name');
        $supplier->supplier_company  = $request->input('supplier_company');
        $supplier->supplier_contact_number  = $request->input('supplier_contact_number');
        $supplier->supplier_email  = $request->input('supplier_email');
        $supplier->supplier_registered_address  = $request->input('supplier_registered_address');
        $supplier->supplier_communication_address = $request->input('supplier_communication_address');
        $supplier->supplier_gst_number  = $request->input('supplier_gst_number');
        $supplier->supplier_added_by  = $request->input('supplier_added_by');
        $supplier->update();
        return redirect('/supplier/allsupplier');
    }

    public function destroysupplier($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect('/supplier/allsupplier');
    }
}