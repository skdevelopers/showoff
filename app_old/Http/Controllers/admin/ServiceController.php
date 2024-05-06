<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!check_permission('services', 'View')) {
            abort(404);
        }
        $page_heading = "Services";
        $datamain = Service::where(['services.deleted' => 0])
        // ->orderBy('services.created_at', 'asc')
        ->orderBy('sort_order', 'asc')
        ->get();

        return view('admin.services.list', compact('page_heading', 'datamain'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!check_permission('services', 'Create')) {
            abort(404);
        }
        $page_heading = "Services";
        $mode = "create";
        $id = "";
        $sort_order = "";
        return view("admin.services.create", compact('page_heading', 'mode', 'id','sort_order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = "0";
        $message = "";
        $o_data = [];
        $errors = [];
        $redirectUrl = '';


        $rules = [
            'name' => 'required',
            
        ];
        

        $validator = Validator::make(
            $request->all(),
            $rules,
            [
                'name.required' => 'Name is required',
            ]
        );
        if ($validator->fails()) {
            $status = "0";
            $message = "Validation error occured";
            foreach ($validator->messages()->toArray() as $key => $row) {
                $errors[0][$key] = $row[0];
            }
        }  else {
            $input = $request->all();

            
            $ins = [
                'name' => $request->name,
                'sort_order' => $request->sort_order,
                'updated_at' => gmdate('Y-m-d H:i:s'),
                'active' => $request->active,
            ];

            if ($file = $request->file("image")) {
                $dir = config('global.upload_path') . "/" . config('global.user_image_upload_dir');
                $file_name = time() . uniqid() . "." . $file->getClientOriginalExtension();
                $file->storeAs(config('global.user_image_upload_dir'), $file_name, config('global.upload_bucket'));
                $ins['image'] = $file_name;
            }

            if ($file = $request->file("background_image")) {
                $dir = config('global.upload_path') . "/" . config('global.user_image_upload_dir');
                $file_name = time() . uniqid() . "_background_." . $file->getClientOriginalExtension();
                $file->storeAs(config('global.user_image_upload_dir'), $file_name, config('global.upload_bucket'));
                $ins['background_image'] = $file_name;
            }

            
            if ($request->id != "") {
                $services = Services::find($request->id);
                $ins['slug'] = Str::slug($request->name);

                $services->update($ins);
                $status = "1";
                $message = "Service updated succesfully";
            } else {
                $ins['created_at'] = gmdate('Y-m-d H:i:s');
                $ins['slug'] = Str::slug($request->name);
                Services::create($ins);
                $status = "1";
                $message = "Service added successfully";
            }

        }
        echo json_encode(['status' => $status, 'message' => $message, 'errors' => $errors]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!check_permission('services', 'Edit')) {
            abort(404);
        }
        $datamain = Services::find($id);
        if ($datamain) {
            $page_heading = "Services ";
            $mode = "edit";
            $id = $datamain->id;
            $sort_order = $datamain->sort_order;
            $image = asset($datamain->image);
            $background_image = asset($datamain->background_image);
            return view("admin.services.create", compact('page_heading', 'datamain','sort_order', 'mode', 'id','image','background_image'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = "0";
        $message = "";
        $o_data = [];
        $category = Services::find($id);
        if ($category) {
            $category->deleted = 1;
            $category->active = 0;
            $category->updated_at = gmdate('Y-m-d H:i:s');
            $category->save();
            $status = "1";
            $message = "Service removed successfully";
        } else {
            $message = "Sorry!.. You cant do this?";
        }

        echo json_encode(['status' => $status, 'message' => $message, 'o_data' => $o_data]);

    }
    public function change_status(Request $request)
    {
        $status = "0";
        $message = "";
        if (Services::where('id', $request->id)->update(['active' => $request->status])) {
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
    
}
