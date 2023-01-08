<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function insertform()
    {
        return view('customers/allcustomers');
    }

    public function insert(Request $request)
    {
        $emp_first_name = $request->input('emp_first_name');
        $emp_last_name = $request->input('emp_last_name');
        $emp_contact_no = $request->input('emp_contact_no');
        $emp_email = $request->input('emp_email');
        $emp_address = $request->input('emp_address');
        $emp_user_id = $request->input('emp_user_id');
        $data = array(
            'emp_first_name' => $emp_first_name,
            "emp_last_name" => $emp_last_name,
            "emp_contact_no" => $emp_contact_no,
            "emp_email" => $emp_email,
            "emp_address" => $emp_address,
            "emp_user_id" => $emp_user_id
        );
        DB::table('employees')->insert($data);
        return redirect('customers/allcustomers');
    }

    public function view()
    {
        $id = Auth::id();
        $emp = DB::select('select * from employees where emp_user_id =' . $id);
        return view('customers/allcustomers', ['emp' => $emp]);
    }
    public function viewcustomerindetail($id)
    {
        $customer = Customer::find($id);
        return view('/customers/singlecustomer', compact('customer'));
    }
    public function edit($id)
    {
        $employee = Customer::find($id);
        return view('/customers/editcustomer', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $employee = Customer::find($id);
        $employee->emp_first_name = $request->input('emp_first_name');
        $employee->emp_last_name  = $request->input('emp_last_name');
        $employee->emp_contact_no  = $request->input('emp_contact_no');
        $employee->emp_email  = $request->input('emp_email');
        $employee->emp_address  = $request->input('emp_address');
        $employee->emp_user_id  = $request->input('emp_user_id');
        $employee->update();
        return redirect('customers/allcustomers');
    }

    public function destroy($id)
    {
        $employee = Customer::find($id);
        $employee->delete();
        return redirect('customers/allcustomers');
    }
}