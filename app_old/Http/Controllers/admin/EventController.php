<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\CountryModel;
use App\Models\States;
use App\Models\Events;
use App\Models\VendorModel;
use App\Models\Categories;
use Illuminate\Http\Request;

use Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!check_permission('vendor', 'View')) {
            abort(404);
        }
        $page_heading = "Events";
        $datamain = Events::orderBy('id', 'desc')->get();

        return view('admin.events.list', compact('page_heading', 'datamain'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!check_permission('vendor', 'Create')) {
            abort(404);
        }
        $page_heading = "Event";
        $mode = "create";
        $id = "";
        $prefix = "";
        $name = "";
        $dial_code = "";
        $image = "";
        $active = "1";
        $states = [];
        $cities = [];
        $countries = CountryModel::orderBy('name', 'asc')->where(['deleted' => 0])->get();
        
        $states = States::where(['deleted' => 0, 'active' => 1])->orderBy('name', 'asc')->get();
        $categories = Categories::where(['deleted' => 0])->orderBy('sort_order', 'asc')->get();
        return view("admin.events.create", compact('page_heading',  'id', 'name', 'dial_code', 'active', 'prefix', 'countries','categories','states','cities'));
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
        $rules =  [
            'name' => 'required',
            'location' => 'required',
        ];
        $msg =   [
            'name.required' => 'Name required',
            'location.required' => 'Location required',
        ];
       

        $validator = Validator::make($request->all(),$rules,$msg);
        
        if ($validator->fails()) {
            $status = "0";
            $message = "Validation error occured";
            $errors = $validator->messages();
        } else {
            $input = $request->all();

            $lemail = strtolower($request->email);   
               
                    $ins = [
                        'name' => $request->name,
                        'location' => $request->txt_location,
                        'knowmore' => $request->description,
                    ];
                        $location = explode(",",$request->location);
                        $ins['latitude']  = $location[0];
                        $ins['longitude']  = $location[1];

                      

                    
                    if ($file = $request->file("image")) {
                        $dir = config('global.upload_path') . "/" . config('global.user_image_upload_dir');
                        $file_name = time() . uniqid() . "." . $file->getClientOriginalExtension();
                        $file->storeAs(config('global.user_image_upload_dir'), $file_name, config('global.upload_bucket'));
                        $ins['image'] = $file_name;
                    }
                    

                    if ($request->id != "") {
                        $ins['updated_at'] = gmdate('Y-m-d H:i:s');
                        $user = Events::find($request->id);
                        $user->update($ins);
                        $status = "1";
                        $message = "Event details updated succesfully";
                    } else {
                        $ins['created_at'] = gmdate('Y-m-d H:i:s');
                        $ins['status'] = 1;
                        $userid = Events::create($ins)->id;
                        $status = "1";
                        $message = "Event details added successfully";
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
        if (!check_permission('vendor', 'Edit')) {
            abort(404);
        }
        $page_heading = "Edit Event";
        $datamain = Events::find($id);
        if (!$datamain) {
            abort(404);
        }
        $countries = CountryModel::orderBy('name', 'asc')->where(['deleted' => 0])->get();
        $states = States::where(['deleted' => 0, 'active' => 1, 'country_id' => $datamain->country_id])->orderBy('name', 'asc')->get();
        $cities = Cities::where(['deleted' => 0, 'active' => 1, 'state_id' => $datamain->state_id])->orderBy('name', 'asc')->get();
        $categories = Categories::where(['deleted' => 0])->orderBy('sort_order', 'asc')->get();
        $user_image = asset($datamain->user_image);
        if ($datamain) {
            return view("admin.events.create", compact('page_heading', 'datamain', 'id', 'countries', 'user_image','categories','states','cities'));
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
    public function change_status(Request $request)
    {
        $status = "0";
        $message = "";
        if (Events::where('id', $request->id)->update(['status' => $request->status])) {
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
    public function verify(Request $request)
    {
        $status = "0";
        $message = "";
        if (Events::where('id', $request->id)->update(['verified' => $request->status])) {
            $status = "1";
            $msg = "Successfully verified";
            if (!$request->status) {
                $msg = "Successfully updated";
            }
            $message = $msg;
        } else {
            $message = "Something went wrong";
        }
        echo json_encode(['status' => $status, 'message' => $message]);
    }
    public function destroy($id)
    {
        $status = "0";
        $message = "";
        $o_data = [];
        $datatb = Events::find($id);
        if ($datatb) {
            $datatb->delete();
            $status = "1";
            $message = "Event removed successfully";
        } else {
            $message = "Sorry!.. You cant do this?";
        }

        echo json_encode(['status' => $status, 'message' => $message, 'o_data' => $o_data]);
    }
}