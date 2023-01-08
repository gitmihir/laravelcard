<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SlideController extends Controller
{
    public function insertslideform()
    {
        return view('/headertextslider/addslide');
    }
    public function insertslide(Request $request)
    {
        $slide = new Slide;
        $slide->sg_text_line = $request->input('sg_text_line');
        $slide->save();
        return redirect('/headertextslider/allslides');
    }

    public function viewslide()
    {
        $id = Auth::id();
        $viewslide = DB::select('select * from sg_header_text_slider');
        return view('/headertextslider/allslides', compact('viewslide'));
    }

    public function viewslideindetail($id)
    {
        $viewslideindetail = Slide::find($id);
        return view('/headertextslider/slidedetails', ['viewslideindetail' => $viewslideindetail]);
    }


    public function editslide($id)
    {
        $slide = Slide::find($id);
        return view('/headertextslider/editslide', compact('slide'));
    }
    public function updateslide(Request $request, $id)
    {
        $slide = Slide::find($id);
        $slide->sg_text_line = $request->input('sg_text_line');
        $slide->update();
        return redirect('/headertextslider/allslides');
    }

    public function destroyslide($id)
    {
        $expense = Slide::find($id);
        $expense->delete();
        return redirect('/headertextslider/allslides');
    }

}