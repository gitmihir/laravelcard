<?php

namespace App\Http\Controllers;

use App\Models\Bills;

use App\Models\Billtransaction;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

global $supplierselectquery;
class BillsController extends Controller
{
    public function selectqueries()
    {
        $supplierselectquery = DB::select('select * from supplier');
        $productselectquery = DB::select('select * from products');
        return view('/bills/addbills', compact('supplierselectquery', 'productselectquery'));
    }

    public function getproductamount(Request $request)
    {
        $productid = $_GET['productid'];
        $productselectquery = DB::select('select * from products where product_main_id=' . $productid);
        foreach ($productselectquery as $productamount) {
            return $productamount->product_list_price;
        }
    }
    public function insertbillform()
    {
        return view('/bills/addbills');
    }

    public function insertbill(Request $request)
    {
        $bills = new Bills;
        $bills->supplier_name = $request->input('supplier_name');
        $bills->bill_number = $request->input('bill_number');
        $bills->bill_amount = $request->input('bill_amount');

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('images/billattachments/', $filename);
            $bills->image = $filename;
        }

        $bills->product_name = implode("~", $request->input('product_name'));
        $bills->product_price = implode("~", $request->input('product_price'));
        $bills->product_quantity = implode("~", $request->input('product_quantity'));
        $bills->product_total_amount = implode("~", $request->input('product_total_amount'));
        $bills->product_id = implode("~", $request->input('product_id'));
        $bills->bill_due_amount = $request->input('bill_due_amount');
        $bills->bill_added_by = $request->input('bill_added_by');
        $bills->bill_notes = $request->input('bill_notes');

        $bills->save();
        return redirect('/bills/allbills');
    }

    public function viewbills()
    {
        $id = Auth::id();
        $viewbills = DB::select('select * from bills where bill_added_by =' . $id);
        return view('/bills/allbills', ['viewbills' => $viewbills]);
    }

    public function viewbillindetail($id)
    {
        $bills = Bills::find($id);
        return view('/bills/singlebill', compact('bills'));
    }

    public function addbiilltransactionform($id)
    {
        $billtransaction = Bills::find($id);
        return view('/bills/singlebilltransaction', compact('billtransaction'));
    }

    public function inserttransaction(Request $request)
    {
        $billtransaction = new Billtransaction;
        $billtransaction->billtransactions_transaction_amount = $request->input('billtransactions_transaction_amount');
        $billtransaction->billtransactions_due_amount = $request->input('billtransactions_due_amount');

        $billtransaction->billtransactions_mode_of_payment = $request->input('billtransactions_mode_of_payment');
        $billtransaction->billtransactions_transaction_date = $request->input('billtransactions_transaction_date');
        $billtransaction->billtransactions_note = $request->input('billtransactions_note');
        $billtransaction->hidden_due = $request->input('hidden_due');
        $billtransaction->billtransactions_bill_id = $request->input('billtransactions_bill_id');
        $billtransaction->billtransactions_added_by = $request->input('billtransactions_added_by');

        $billtransaction->save();

        $bill = Bills::find($billtransaction->billtransactions_bill_id);
        $bill->bill_due_amount = $request->input('billtransactions_due_amount');
        $bill->update();

        return redirect('/bills/allbills');
    }

    public function destroybill($id)
    {
        $bill = Bills::find($id);
        $bill->delete();
        DB::select('DELETE from billtransactions where billtransactions_bill_id =' . $id);
        return redirect('bills/allbills');
    }

    public function editbill($id)
    {
        $bills = Bills::find($id);
        $supplierselectquery = DB::select('select * from supplier');
        $productselectquery = DB::select('select * from products');
        return view('/bills/editbill', compact('bills', 'supplierselectquery', 'productselectquery'));
    }

    public function updatebill(Request $request, $id)
    {
        $bills = Bills::find($id);
        $bills->supplier_name = $request->input('supplier_name');
        $bills->bill_number = $request->input('bill_number');
        $bills->bill_amount = $request->input('bill_amount');
        if ($request->image != '') {
            $path = public_path() . '/images/billattachments/';
            //code for remove old file
            if ($bills->image != ''  && $bills->image != null) {
                $file_old = $path . $bills->image;
                unlink($file_old);
            }
            //upload new file
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extenstion;
                $file->move('images/billattachments/', $filename);
                $bills->image = $filename;
            }
        }
        $bills->product_name = implode("~", $request->input('product_name'));
        $bills->product_price = implode("~", $request->input('product_price'));
        $bills->product_quantity = implode("~", $request->input('product_quantity'));
        $bills->product_total_amount = implode("~", $request->input('product_total_amount'));
        $bills->product_id = implode("~", $request->input('product_id'));
        $bills->bill_due_amount = $request->input('bill_due_amount');
        $bills->bill_added_by = $request->input('bill_added_by');
        $bills->bill_notes = $request->input('bill_notes');

        $bills->update();
        return redirect('/bills/allbills');
    }

    public function listoftransactions($id)
    {
        $alltransactions = DB::select('SELECT * from billtransactions where billtransactions_bill_id =' . $id);
        return view('/bills/billtransactions', compact('alltransactions'));
    }
}
