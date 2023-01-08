<?php

namespace App\Http\Controllers;

use App\Models\CMS;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CMSController extends Controller
{
    public function insertcmsform()
    {
        return redirect('/cms/cmsdetails');
    }
    public function insertcms(Request $request)
    {

        $cms = new CMS;
        $this->validate($request, [
            'title' => 'string|max:255',
            'video' => 'required|file|mimetypes:video/mp4',
        ]);
        $fileName = $request->video->getClientOriginalName();
        $filePath = 'videos/' . $fileName;

        $path = Storage::disk('public')->put($filePath, file_get_contents($request->video));
        $path = Storage::disk('public')->url($path);
        $cms->sg_cms_home_video = $path;
        //$cms->sg_cms_home_video = $request->input('sg_cms_home_video');

        // $this->validate($request, [
        //     'title' => 'required|string|max:255',
        //     'video' => 'required|file|mimetypes:video/mp4',
        // ]);
        // $fileName = $request->video->getClientOriginalName();
        // $filePath = 'videos/' . $fileName;

        // $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));
        // $cms->sg_cms_popup_image = $filePath;

        // if ($request->hasfile('sg_cms_home_video')) {
        //     $file = $request->file('sg_cms_home_video');
        //     $extenstion = $file->getClientOriginalExtension();
        //     $filename = time() . rand() . '.' . $extenstion;
        //     $file->move('videos/', $filename);
        //     $cms->sg_cms_home_video = $filename;
        // }

        $cms->sg_cms_tag_line = $request->input('sg_cms_tag_line');

        /* Image Upload */
        if ($request->hasfile('sg_cms_popup_image')) {
            $file = $request->file('sg_cms_popup_image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . rand() . '.' . $extenstion;
            $file->move('images/popupimage/', $filename);
            $cms->sg_cms_popup_image = $filename;
        }
        if ($request->hasfile('sg_cms_header_image')) {
            $file = $request->file('sg_cms_header_image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . rand() . '.' . $extenstion;
            $file->move('images/headerimage/', $filename);
            $cms->sg_cms_header_image = $filename;
        }

        $cms->sg_cms_termscondition = $request->input('sg_cms_termscondition');
        $cms->sg_cms_privacy_policy = $request->input('sg_cms_privacy_policy');
        $cms->sg_cms_payment_policy = $request->input('sg_cms_payment_policy');
        $cms->sg_cms_cookies_policy = $request->input('sg_cms_cookies_policy');
        $cms->sg_cms_copyright_line = $request->input('sg_cms_copyright_line');
        $cms->sg_shipping_rate = $request->input('sg_shipping_rate');
        $cms->save();
        //CMS::create($request);
        return redirect('/cms/cmsdetails');
    }

    public function viewcms()
    {
        $viewcms = DB::select('select * from sg_cms');
        return view('/cms/cmsdetails', ['viewcms' => $viewcms]);
    }

    public function editcms($id)
    {
        $cms = CMS::find($id);
        return view('/cms/editcms', compact('cms'));
    }

    public function updatecms(Request $request, $id)
    {
        $cms = CMS::find($id);

        if ($request->sg_cms_home_video != '') {
            $path = public_path() . '/videos/';

            if ($cms->sg_cms_home_video != '' && $cms->sg_cms_home_video != null) {
                $file_old = $path . $cms->sg_cms_home_video;
                unlink($file_old);
            }
            $data = $request->all();
            if ($request->has('sg_cms_home_video')) {
                echo $file = $request->file('sg_cms_home_video');
                $name = $file->getClientOriginalName();
                $data['sg_cms_home_video'] = $name;
                $destination = '/public/videos';
                $request->file('sg_cms_home_video')->move(base_path() . $destination, $name);
                $cms->sg_cms_home_video = $name;
            }

        }

        $cms->sg_cms_video_title = $request->input('sg_cms_video_title');
        $cms->sg_cms_tag_line = $request->input('sg_cms_tag_line');
        if ($request->sg_cms_popup_image != '') {
            $path = public_path() . '/images/popupimage/';
            if ($cms->sg_cms_popup_image != '' && $cms->sg_cms_popup_image != null) {
                $file_old = $path . $cms->sg_cms_popup_image;
                unlink($file_old);
            }
            if ($request->hasfile('sg_cms_popup_image')) {
                $file = $request->file('sg_cms_popup_image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . rand() . '.' . $extenstion;
                $file->move('images/popupimage/', $filename);
                $cms->sg_cms_popup_image = $filename;
            }
        }
        if ($request->sg_cms_header_image != '') {
            $path = public_path() . '/images/headerimage/';
            if ($cms->sg_cms_header_image != '' && $cms->sg_cms_header_image != null) {
                $file_old = $path . $cms->sg_cms_header_image;
                unlink($file_old);
            }
            if ($request->hasfile('sg_cms_header_image')) {
                $file = $request->file('sg_cms_header_image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . rand() . '.' . $extenstion;
                $file->move('images/headerimage/', $filename);
                $cms->sg_cms_header_image = $filename;
            }
        }
        $cms->sg_cms_termscondition = $request->input('sg_cms_termscondition');
        $cms->sg_cms_privacy_policy = $request->input('sg_cms_privacy_policy');
        $cms->sg_cms_payment_policy = $request->input('sg_cms_payment_policy');
        $cms->sg_cms_cookies_policy = $request->input('sg_cms_cookies_policy');
        $cms->sg_cms_copyright_line = $request->input('sg_cms_copyright_line');

        $cms->sg_cms_block_title = $request->input('sg_cms_block_title');
        $cms->sg_cms_block_content = $request->input('sg_cms_block_content');
        $cms->sg_cms_block_link = $request->input('sg_cms_block_link');

        if ($request->sg_cms_block_image != '') {
            $path = public_path() . '/images/blockimage/';
            if ($cms->sg_cms_block_image != '' && $cms->sg_cms_block_image != null) {
                $file_old = $path . $cms->sg_cms_block_image;
                unlink($file_old);
            }
            if ($request->hasfile('sg_cms_block_image')) {
                $file = $request->file('sg_cms_block_image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . rand() . '.' . $extenstion;
                $file->move('images/blockimage/', $filename);
                $cms->sg_cms_block_image = $filename;
            }
        }
        $cms->sg_shipping_rate = $request->input('sg_shipping_rate');

        $cms->update();
        return redirect('/edit-cms/1');
    }

    public function destroycms($id)
    {
        $cms = CMS::find($id);
        $cms->delete();
        return redirect('/cms/cmsdetails');
    }
}