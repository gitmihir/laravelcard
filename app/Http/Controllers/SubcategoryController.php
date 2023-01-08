<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubcategoryController extends Controller
{
    public function insertform()
    {
        return view('subcategory/allsubcategory');
    }

    public function insertsubcategory(Request $request)
    {
        $subcategory_name = $request->input('subcategory_name');
        $subcategory_added_by = $request->input('subcategory_added_by');
        $data = array(
            'subcategory_name' => $subcategory_name,
            "subcategory_added_by" => $subcategory_added_by
        );
        DB::table('subcategory')->insert($data);
        return redirect('subcategory/allsubcategory');
    }

    public function viewsubcategory()
    {
        $id = Auth::id();
        $subcategory = DB::select('select * from subcategory where subcategory_added_by =' . $id);
        return view('subcategory/allsubcategory', ['subcategory' => $subcategory]);
    }
    public function viewsubcategoryindetail($id)
    {
        $subcategory = Subcategory::find($id);
        return view('/subcategory/singlesubcategory', compact('subcategory'));
    }
    public function editsubcategory($id)
    {
        $subcategory = Subcategory::find($id);
        return view('/subcategory/updatesubcategory', compact('subcategory'));
    }

    public function updatesubcategory(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->subcategory_name = $request->input('subcategory_name');
        $subcategory->update();
        return redirect('subcategory/allsubcategory');
    }

    public function destroysubcategory($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        return redirect('subcategory/allsubcategory');
    }
}