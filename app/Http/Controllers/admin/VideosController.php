<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Videos;
use Illuminate\Http\Request;
use Validator;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!check_permission('videos', 'View')) {
            abort(404);
        }
        $page_heading = "Videos";
        $vendor = \request()->get('vendor');

        $list = Videos::select('videos.*', 'users.name as vendor')->where('videos.deleted', 0)
            ->leftjoin('users', 'users.id', 'videos.vendor_id');
        if(isset($request->outlet_id)) {
            $list = $list->where('vendor_id',$request->outlet_id);
        }
        $list = $list->orderBy('videos.id', 'DESC')->get();
        $outlets = \App\Models\VendorModel::where(['role' => '4', 'users.deleted' => '0','users.phone_verified' => '1'])->get(['id','name','main_category_id']);
        
        return view('admin.ad_videos.list', compact('page_heading', 'list', 'vendor','outlets'));
    }

    public function destroy($id)
    {
        $status = "0";
        $message = "";
        $o_data = [];
        $video = Videos::find($id);
        if ($video) {
            $video->deleted = 1;
            $video->active = 0;
            $video->updated_at = gmdate('Y-m-d H:i:s');
            $video->save();
            $status = "1";
            $message = "Video removed successfully";
        } else {
            $message = "Sorry!.. You cant do this?";
        }

        echo json_encode(['status' => $status, 'message' => $message, 'o_data' => $o_data]);
    }
    public function change_status(Request $request)
    {
        $status = "0";
        $message = "";
        if (Videos::where('id', $request->id)->update(['active' => $request->status])) {
            $status = "1";
            $msg = "Successfully activated";
            if (!$request->status) {
                $msg = "Successfully deactivated";
            }
            $message = $msg;
        } else {
            $message = "Something went wrong";
        }
        echo json_encode(['status' => $status, 'message' => $message]);
    }
    public function create(Request $request)
    {
        if (!check_permission('videos','Create')) {
            abort(404);
        }
        $page_heading = "Create Ad Videos";
        $outlets = \App\Models\VendorModel::where(['role' => '4', 'users.deleted' => '0','users.phone_verified' => '1'])->get(['id','name','main_category_id']);
        return view('admin.ad_videos.create', compact('page_heading', 'outlets'));
    }
    public function edit($id)
    {
        if (!check_permission('videos','Create')) {
            abort(404);
        }
        $page_heading = "Edit Ad Videos";
        $datamain = Videos::find($id);
        $outlets = \App\Models\VendorModel::where(['role' => '4', 'users.deleted' => '0','users.phone_verified' => '1'])->get(['id','name','main_category_id']);
        return view('admin.ad_videos.create', compact('page_heading', 'datamain','outlets'));
    }

    public function store(Request $request)
    {
        $status = "0";
        $message = "";
        $o_data = [];
        $errors = [];
        $redirectUrl = '';
        $rules  = [
            'video_title'    => 'required',
            'outlet_id'      => 'required',
            'video_type'     => 'required'
    
        ];
        if($request->video_type == 0) {
            $rules['video_link'] = 'required';
        } else if ($request->id == "" && $request->video_type == 1) { 
            $rules['video_file'] = 'required';
        }
        $msg  = [
            'video_title.required'    => 'Title required',
            'outlet_id.required'      => 'Select outlet',
            'video_type.required'     => 'Select video type',
            'video_link.required'     => 'Link is required',
            'video_file.required'     => 'Upload video file'
    
        ];
        $validator = Validator::make($request->all(),$rules,$msg );
        if ($validator->fails()) {
            $status = "0";
            $message = "Validation error occured";
            $errors = $validator->messages();
        } else {
            $input = $request->all();         
            
            $ins = [
                'video_title'      => $request->video_title,
                'vendor_id'      => $request->outlet_id,
                'video_type'      => $request->video_type,                
                'active'=>$request->active

                
            ];     
            if($request->video_type == 0) {
                $ins['video'] = $request->video_link;
            }       
            $dir = config('global.upload_path_cdn') . "/" . config('global.video_upload_dir');            
            if ($file = $request->file("video_file")) {                
                $file_name = time() . uniqid() . "." . $file->getClientOriginalExtension();
                $file->storeAs(config('global.video_upload_dir'), $file_name, config('global.upload_cdn'));
                $ins['video'] = $file_name;
            }          
            
            if ($request->id != "") {
                $ins['updated_at'] = gmdate('Y-m-d H:i:s');
                Videos::where('id',$request->id)->update($ins);                
                $status = "1";
                $message = "Video updated succesfully";
            } else {
                $ins['created_at'] = gmdate('Y-m-d H:i:s');
                
                Videos::insert($ins);                
                $status = "1";
                $message = "Video added successfully";
            }
           

        }
        echo json_encode(['status' => $status, 'message' => $message, 'errors' => $errors]);
    }

    public function getVideoByOutlet(Request $request)
    {
        $status = "0";
        $message = "";
        $o_data = [];
        $errors = [];
        $o_data = Videos::where('vendor_id',$request->outlet_id)->where('videos.deleted', 0)->get(['id','video_title']);
        echo json_encode(['status' => $status, 'message' => $message, 'o_data' => $o_data]);
    }

}
