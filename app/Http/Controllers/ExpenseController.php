<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Employee;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function insertexpenseform()
    {
        return view('/expense/addexpense');
    }

    public function insertexpense(Request $request)
    {
        $expense_type = $request->input('expense_type');
        $expense_amount = $request->input('expense_amount');
        $exp_user_id = $request->input('exp_user_id');
        $exp_emp_id = $request->input('exp_emp_id');
        $data = array(
            'expense_type' => $expense_type,
            "expense_amount" => $expense_amount,
            "exp_user_id" => $exp_user_id,
            "exp_emp_id" => $exp_emp_id
        );
        DB::table('expenses')->insert($data);
        return redirect('/expense/allexpense');
    }

    public function viewexpense()
    {
        $id = Auth::id();
        $exp = DB::select('select * from expenses where exp_user_id =' . $id);
        return view('/expense/allexpense', compact('exp'));
    }
    public function viewexpenseindetail($expense_id)
    {
        $expense = Expense::find($expense_id);
        return view('/expense/singleexpense', compact('expense'));
    }
    public function expenseby()
    {
        $id = Auth::id();
        $empby = DB::select('select * from employees');
        return view('/expense/addexpense', compact('empby'));
    }
    public function editexpense($expense_id)
    {
        $expense = Expense::find($expense_id);
        return view('/expense/editexpense', compact('expense'));
    }

    public function updateexpense(Request $request, $expense_id)
    {
        $expense = Expense::find($expense_id);
        $expense->expense_type = $request->input('expense_type');
        $expense->expense_amount = $request->input('expense_amount');
        $expense->exp_user_id = $request->input('exp_user_id');
        $expense->update();
        return redirect('/expense/allexpense');
    }

    public function destroyexpense($expense_id)
    {
        $expense = Expense::find($expense_id);
        $expense->delete();
        return redirect('/expense/allexpense');
    }
}