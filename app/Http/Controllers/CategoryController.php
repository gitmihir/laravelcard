<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function insertform()
    {
        return view('category/allcategory');
    }

    public function insertcategory(Request $request)
    {
        $category_name = $request->input('category_name');
        $category_added_by = $request->input('category_added_by');
        $data = array(
            'category_name' => $category_name,
            "category_added_by" => $category_added_by
        );
        DB::table('category')->insert($data);
        return redirect('category/allcategory');
    }

    public function viewcategory()
    {

        $category = DB::select('select * from category');
        return view('category/allcategory', ['category' => $category]);
    }
    public function viewcategoryindetail($category_id)
    {
        $category = Category::find($category_id);
        return view('/category/singlecategory', compact('category'));
    }
    public function editcategory($category_id)
    {
        $category = Category::find($category_id);
        return view('/category/updatecategory', compact('category'));
    }

    public function updatecategory(Request $request, $category_id)
    {
        $category = Category::find($category_id);
        $category->category_name = $request->input('category_name');
        $category->update();
        return redirect('category/allcategory');
    }

    public function destroycategory($category_id)
    {
        $category = Category::find($category_id);
        $category->delete();
        return redirect('category/allcategory');
    }
}