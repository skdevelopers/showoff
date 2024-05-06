<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use App\Models\Categories;
use App\Models\Divisions;
use Illuminate\Http\Request;
use Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_heading = "App Banners";
        $filter = [];
        $params = [];
        $params['search_key'] = $_GET['search_key'] ?? '';
        $search_key = $params['search_key'];
        $list = BannerModel::get_banners_list($filter, $params)->paginate(10);

        return view("admin.banner.list", compact("page_heading", "list", "search_key"));
    }
   
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $status = "0";
            $message = "";
            $errors = '';
            $validator = Validator::make($request->all(),
                [
                    //'banner' => 'required|image',
                    'type' => '',
                ],
                [
                    'banner.required' => 'Banner required',
                    'type.required' => 'Banner Type required',
                    'banner.image' => 'should be in image format (.jpg,.jpeg,.png)',
                ]
            );
            if ($validator->fails()) {
                $status = "0";
                $message = "Validation error occured";
                $errors = $validator->messages();
            } else {
                $ins['active'] = $request->active;
                $ins['type'] = (int)$request->type;
                $ins['banner_title'] = '';
                $ins['category_id'] = $request->category_id ?? 0;
                $ins['outlet_id'] = $request->outlet_id ?? 0;
                $ins['product_id'] = $request->product_id ?? 0;
                
                $ins['created_at'] = gmdate('Y-m-d H:i:s');
                $ins['created_by'] = session("user_id");
                if ($file = $request->file("banner")) {
                    $dir = config('global.upload_path') . config('global.banner_image_upload_dir');
                    $file_name = time() . uniqid() . "_banner." . $file->getClientOriginalExtension();
                    $file->move($dir, $file_name);
                    $ins['banner_image'] = $file_name;
                }
                if ($file = $request->file("banner_ar")) {
                    $dir = config('global.upload_path') . config('global.banner_image_upload_dir');
                    $file_name = time() . uniqid() . "_banner." . $file->getClientOriginalExtension();
                    $file->move($dir, $file_name);
                    $ins['banner_image_ar'] = $file_name;
                }
                if($request->id > 0)
                { 
                    BannerModel::where('id', $request->id)->update($ins);
                    $status = "1";
                    $message = "Banner updated";
                    $errors = '';
                }
                else {
                   
                    BannerModel::insert($ins);
                    $status = "1";
                    $message = "Banner created";
                    $errors = '';
                }
            }
            echo json_encode(['status' => $status, 'message' => $message, 'errors' => $errors]);die();
        } else {
            $page_heading = "Create App Banner";
            $categories = Categories::where(['deleted'=>0,'active'=>1])->get();
            $outlets = \App\Models\VendorModel::where(['role' => '4', 'users.deleted' => '0','users.phone_verified' => '1'])->get(['id','name','main_category_id']);
        
            $prds = [];
            return view('admin.banner.create', compact('page_heading','categories','prds','outlets'));
        }

    }
   
    public function edit($id = '')
    {
        $datamain = BannerModel::find($id);
        if ($datamain) {
            $page_heading = "Edit App Banner";
            $categories = Categories::where(['deleted'=>0,'active'=>1,'division_id'=>$datamain->division_id])->get();
            $outlets = \App\Models\VendorModel::where(['role' => '4', 'users.deleted' => '0','users.phone_verified' => '1'])->get(['id','name','main_category_id']);
        
            return view('admin.banner.create', compact('page_heading', 'datamain','categories','outlets'));
        } else {
            abort(404);
        }
    }
  

    public function update(Request $request)
    {
        $status = "0";
        $message = "";
        $errors = '';
        $validator = Validator::make($request->all(),
            [
                // 'banner_title' => 'required',
                'banner' => 'image',
            ],
            [
                // 'banner_title.required' => 'Title required',
                'banner.image' => 'should be in image format (.jpg,.jpeg,.png)',
            ]
        );
        if ($validator->fails()) {
            $status = "0";
            $message = "Validation error occured";
            $errors = $validator->messages();
        } else {
            $ins['active'] = $request->active;
            $ins['banner_title'] = $request->banner_title;
            $ins['outlet_id'] = $request->outlet_id;
            $ins['updated_at'] = gmdate('Y-m-d H:i:s');
            $ins['updated_by'] = session("user_id");
            $ins['category_id'] = $request->category_id ?? 0;
            $ins['division_id'] = $request->division_id ?? 0;
            $ins['product_id'] = $request->product_id ?? 0;
            if ($file = $request->file("banner")) {
                $dir = config('global.upload_path') . "/" . config('global.banner_image_upload_dir');
                $file_name = time() . uniqid() . "_banner." . $file->getClientOriginalExtension();
                $file->move($dir, $file_name);
                //$file->storeAs(config('global.banner_image_upload_dir'),$file_name,'s3');
                $ins['banner_image'] = $file_name;
            }
            if (BannerModel::where('id', $request->id)->update($ins)) {

                $status = "1";
                $message = "Banner updated";
                $errors = '';
            } else {
                $status = "0";
                $message = "Something went wrong";
                $errors = '';
            }
        }
        echo json_encode(['status' => $status, 'message' => $message, 'errors' => $errors]);die();
    }
    
    public function delete($id = '')
    {
        BannerModel::where('id', $id)->delete();
        $status = "1";
        $message = "Banner removed successfully";
        echo json_encode(['status' => $status, 'message' => $message]);
    }
    
    
    public function get_category(Request $request)
    {
    $query= Categories::select('id','name')->where('division_id',$request->division)->get();
        $data=$query->toArray();
        if(count($data) == 0) 
        { $data ="0"; }
        echo  json_encode($data);

     
     }

}
