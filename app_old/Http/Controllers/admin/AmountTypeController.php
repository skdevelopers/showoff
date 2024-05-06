<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AmountType;
use Validator;


class AmountTypeController extends Controller
{
    //
    public function index()
    {
        //
        $page_heading = "Coupon Amount Type";
        $records = AmountType::get();
        return view('admin.amount_type.list', compact('page_heading', 'records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_heading = "Coupon Amount Type";
        return view("admin.amount_type.create", compact('page_heading'));
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

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            $status = "0";
            $message = "Please fill all required fields";
            $errors = $validator->messages();
        } else {

            $check_exist = AmountType::where(['name' => $request->name])->where('id','!=',$request->id)->get()->toArray();
            if (empty($check_exist)) {

                if ($request->id != "" && $request->id > 0) {

                    $storemanager = AmountType::find($request->id);
                    $status = "1";
                    $message = "Amount type updated successfully";
                } else {
                    $storemanager = new AmountType();
                    $status = "1";
                    $message = "Amount type added successfully";
                }

                
                $storemanager->name = $request->name;
                $storemanager->save();

            } else {
                $status = "0";
                $message = "Name should be unique";
                $errors['name'] = $request->name . " already added";
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
        $record = AmountType::where('id',$id)->first();

        if ($record) {
            $page_heading = "Coupon Amount type";
            $mode = "edit";
            return view("admin.amount_type.create", compact('page_heading', 'mode', 'record'));
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
        if (AmountType::find($id)) {
            $check = Coupon::where(['amount_type'=>$id])->get()->count();
            if($check > 0){
                $message = "this type is used by some coupons so you cant delete";
            }else{
            AmountType::where('id', $id)->delete();
            $status = "1";
            $message = "Coupon Amount type removed successfully";
            }
        } else {
            $message = "Sorry!.. You cant do this?";
        }

        echo json_encode(['status' => $status, 'message' => $message, 'o_data' => $o_data]);
    }
}
