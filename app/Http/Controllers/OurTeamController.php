<?php

namespace App\Http\Controllers;

use App\Models\OurTeam;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OurTeamController extends Controller
{
    public function insertteamform()
    {
        return view('/ourteam/addourteam');
    }
    public function insertteam(Request $request)
    {
        $team = new OurTeam;
        $team->sg_our_team_title = $request->input('sg_our_team_title');
        if ($request->hasfile('sg_our_team_image')) {
            $file = $request->file('sg_our_team_image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . rand() . '.' . $extenstion;
            $file->move('images/memberimages/', $filename);
            $team->sg_our_team_image = $filename;
        }
        $team->sg_our_team_text = $request->input('sg_our_team_text');
        $team->save();
        return redirect('/ourteam/allteammembers');
    }

    public function viewteam()
    {
        $id = Auth::id();
        $viewteam = DB::select('select * from sg_our_team');
        return view('/ourteam/allteammembers', compact('viewteam'));
    }

    public function viewteamindetail($id)
    {
        $viewteamindetail = OurTeam::find($id);
        return view('/ourteam/memberdetails', ['viewteamindetail' => $viewteamindetail]);
    }


    public function editteam($id)
    {
        $team = OurTeam::find($id);
        return view('/ourteam/editmember', compact('team'));
    }
    public function updateteam(Request $request, $id)
    {
        $team = OurTeam::find($id);
        $team->sg_our_team_title = $request->input('sg_our_team_title');
        if ($request->sg_our_team_image != '') {
            $path = public_path() . '/images/memberimages/';
            //code for remove old file
            if ($team->sg_our_team_image != '' && $team->sg_our_team_image != null) {
                $file_old = $path . $team->sg_our_team_image;
                unlink($file_old);
            }
            //upload new file
            if ($request->hasfile('sg_our_team_image')) {
                $file = $request->file('sg_our_team_image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . rand() . '.' . $extenstion;
                $file->move('images/memberimages/', $filename);
                $team->sg_our_team_image = $filename;
            }
        }
        $team->sg_our_team_text = $request->input('sg_our_team_text');
        $team->update();
        return redirect('/ourteam/allteammembers');
    }

    public function destroyteam($id)
    {
        $expense = OurTeam::find($id);
        $expense->delete();
        return redirect('/ourteam/allteammembers');
    }

}