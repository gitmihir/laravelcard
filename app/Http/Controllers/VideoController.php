<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function insertvideoform()
    {
        return view('/webvideos/addvideo');
    }
    public function insertvideo(Request $request)
    {
        $video = new Video;
        $video->sg_p_video_title = $request->input('sg_p_video_title');
        $video->sg_p_video_text = $request->input('sg_p_video_text');
        $data = $request->all();
        if ($request->has('sg_p_video_link')) {
            echo $file = $request->file('sg_p_video_link');
            $name = $file->getClientOriginalName();
            $filename = time() . rand() . '.' . $name;
            $data['sg_p_video_link'] = $filename;
            $destination = '/public/websitevideos';
            $request->file('sg_p_video_link')->move(base_path() . $destination, $filename);
            $video->sg_p_video_link = $filename;
        }

        $video->save();
        return redirect('/webvideos/allvideos');
    }

    public function viewvideo()
    {
        $id = Auth::id();
        $viewvideo = DB::select('select * from sg_p_video');
        return view('/webvideos/allvideos', compact('viewvideo'));
    }

    public function viewvideoindetail($id)
    {
        $viewvideoindetail = Video::find($id);
        return view('/webvideos/videodetails', ['viewvideoindetail' => $viewvideoindetail]);
    }


    public function editvideo($id)
    {
        $video = Video::find($id);
        return view('/webvideos/editvideo', compact('video'));
    }
    public function updatevideo(Request $request, $id)
    {
        $video = Video::find($id);
        $video->sg_p_video_title = $request->input('sg_p_video_title');
        $video->sg_p_video_text = $request->input('sg_p_video_text');



        if ($request->sg_p_video_link != '') {
            $path = public_path() . '/websitevideos/';

            if ($video->sg_p_video_link != '' && $video->sg_p_video_link != null) {
                $file_old = $path . $video->sg_p_video_link;
                unlink($file_old);
            }
            $data = $request->all();
            if ($request->has('sg_p_video_link')) {
                echo $file = $request->file('sg_p_video_link');
                $name = $file->getClientOriginalName();
                $filename = time() . rand() . '.' . $name;
                $data['sg_p_video_link'] = $filename;
                $destination = '/public/websitevideos';
                $request->file('sg_p_video_link')->move(base_path() . $destination, $filename);
                $video->sg_p_video_link = $filename;
            }

        }



        $video->update();
        return redirect('/webvideos/allvideos');
    }

    public function destroyvideo($id)
    {
        $expense = Video::find($id);
        $expense->delete();
        return redirect('/webvideos/allvideos');
    }

}