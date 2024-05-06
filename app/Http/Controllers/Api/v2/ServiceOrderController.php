<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\OrderServiceModel;
use App\Models\OrderProductsModel;
use App\Models\OrderServiceItemsModel;
use App\Models\Service;
use App\Models\ServiceCategories;
use App\Models\ServiceCategorySelected;
use App\Models\User;
use App\Models\Rating;
use DB;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use Validator;

class ServiceOrderController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    private function validateAccesToken($access_token)
    {

        $user = User::where(['user_access_token' => $access_token])->get();

        if ($user->count() == 0) {
            http_response_code(401);
            echo json_encode([
                'status' => (string) 0,
                'message' => login_message(),
                'oData' => [],
                'errors' => (object) [],
            ]);
            exit;
        } else {
            $user = $user->first();
            if ($user->active == 1) {
                return $user->id;
            } else {
                http_response_code(401);
                echo json_encode([
                    'status' => (string) 0,
                    'message' => login_message(),
                    'oData' => [],
                    'errors' => (object) [],
                ]);
                exit;
                return response()->json([
                    'status' => (string) 0,
                    'message' => login_message(),
                    'oData' => [],
                    'errors' => (object) [],
                ], 401);
                exit;
            }
        }
    }
    public function my_service_orders(REQUEST $request)
    {
        $status = (string) 1;
        $message = "";
        $o_data = [];
        $errors = [];

        $validator = Validator::make($request->all(), [
            'access_token' => 'required',
        ]);

        if ($validator->fails()) {
            $status = (string) 0;
            $message = "Validation error occured";
            $errors = $validator->messages();
        } else {

            $user_id = $this->validateAccesToken($request->access_token);
            $order_list = OrderServiceModel::orderBy('order_id', 'desc');
            if($request->activity_id)
            {
                $order_list = $order_list->where('activity_id',$request->activity_id);
            }
            else
            {
                $order_list = $order_list->whereIn('activity_id',[0,6]);   
            }

            $order_list = $order_list->with(['services' => function ($qr) {
                $qr->select('orders_services_items.id', 'order_id', 'orders_services_items.service_id', 'image', 'service.name', 'service_price', 'orders_services_items.order_status')
                ->join('service', 'service.id', 'orders_services_items.service_id');
            }])->where('user_id', $user_id)->get();
            foreach ($order_list as $key => $val) {
                $order_list[$key]->status_text = service_order_status($val->status);
                $order_list[$key]->order_no    = config('global.sale_order_prefix') . "-SER" . date(date('Ymd', strtotime($val->created_at))) . $val->order_id;
                $order_list[$key]->payment_mode_id = $val->payment_mode;
                $order_list[$key]->payment_mode = payment_mode($val->payment_mode);
                $order_list[$key]->order_date = get_date_in_timezone($val->created_at, config('global.datetime_format'));
                $service = $val->services;
                foreach ($service as $key => $value1) {
                    $selected_category_id = ServiceCategorySelected::where('service_id', $value1->service_id)->first();
                    $service[$key]->category_name  = ServiceCategories::find($selected_category_id->category_id)->name;
                    $service[$key]->parent_category_name  = ServiceCategories::find(ServiceCategories::find($selected_category_id->category_id)->parent_id)->name??'';
                    $service[$key]->image = get_uploaded_image_url($value1->image, 'service_image_upload_dir');
                    $where2['service_id'] = $value1->service_id;
                    $service[$key]->rating = number_format(Rating::avg_rating($where2), 1, '.', '');
                    $service[$key]->is_rated = (string) Rating::where(['user_id'=>$user_id,'service_id'=>$value1->service_id])->count();
                    $service[$key]->status_text = service_order_status($value1->order_status);
                }
                $order_list[$key]->services = $service;
                $o_data = $order_list;
            }
            $o_data = convert_all_elements_to_string($o_data);
        }
        return response()->json(['status' => $status, 'errors' => $errors, 'message' => $message, 'oData' => $o_data], 200);
    }
    public function my_service_order_details(REQUEST $request)
    {
        $status = (string) 1;
        $message = "";
        $o_data = [];
        $errors = [];

        $validator = Validator::make($request->all(), [
            'access_token' => 'required',
            'service_order_id' => 'required',
        ]);

        if ($validator->fails()) {
            $status = (string) 0;
            $message = "Validation error occured";
            $errors = $validator->messages();
        } else {

            $user_id = $this->validateAccesToken($request->access_token);
            $order = OrderServiceModel::orderBy('order_id', 'desc')->with(['services' => function ($qr) {
                $qr->select('orders_services_items.id', 'order_id', 'service_id', 'image', 'service.name', 'service.description','service_price', 'orders_services_items.order_status','qty','text','hourly_rate','doc','orders_services_items.booking_date','task_description')
                ->join('service', 'service.id', 'orders_services_items.service_id');
            }])->where(['user_id' => $user_id, 'orders_services.order_id' => $request->service_order_id])->first();

            if ($order) {

                $order->status_text = service_order_status($order->status);
                $order->order_no    = config('global.sale_order_prefix') . "-SER" . date(date('Ymd', strtotime($order->created_at))) . $order->order_id;
                $order->payment_mode_id = (string) $order->payment_mode;
                $order->payment_mode = payment_mode($order->payment_mode);
                $order->order_date = get_date_in_timezone($order->created_at, config('global.datetime_format'));
                $order->address = \App\Models\UserAdress::get_address_details($order->address_id);
                $order->ref_user_name = User::where('ref_code',$order->ref_code)->first()->name??"";
                $service = $order->services;
                foreach ($service as $key => $value) {
                    $selected_category_id = ServiceCategorySelected::where('service_id', $value->service_id)->first();
                    $service[$key]->category_name  = ServiceCategories::find($selected_category_id->category_id)->name;
                    $service[$key]->parent_category_name  = ServiceCategories::find(ServiceCategories::find($selected_category_id->category_id)->parent_id)->name??'';
                    $service[$key]->image = get_uploaded_image_url($value->image, 'service_image_upload_dir');
                    if($value->doc) 
                    {
                        $service[$key]->doc = asset($value->doc);
                    }
                    
                    $where2['service_id'] = $value->service_id;
                    $where2['type']   = 3;
                    $service[$key]->rating = number_format(Rating::avg_rating($where2), 2, '.', '');
                    $service[$key]->is_rated = (string) Rating::where(['user_id'=>$user_id,'service_id'=>$value->service_id,'type'=>3])->count();
                    $service[$key]->rating_count = (string) count(Rating::rating_list($where2));
                    $service[$key]->status_text = service_order_status($value->order_status);
                    $service[$key]->booking_date = $value->booking_date;
                }
                $order->services = convert_all_elements_to_string($service);
                $o_data = $order;
            }
            $o_data = convert_all_elements_to_string($o_data->toArray());
        }
        return response()->json(['status' => $status, 'errors' => $errors, 'message' => $message, 'oData' => (object) $o_data], 200);
    }

      public function booked_slots(REQUEST $request)
    {
        $status = (string) 1;
        $message = "";
        $o_data = [];
        $errors = [];

        $validator = Validator::make($request->all(), [
            // 'access_token' => 'required',
        ]);

        if ($validator->fails()) {
            $status = (string) 0;
            $message = "Validation error occured";
            $errors = $validator->messages();
        } else {
            $sorted_order_list= [];
            $order_list = OrderServiceModel::select( 'booking_date')
            ->orderBy('booking_date', 'asc')
            ->get();
            foreach($order_list as $val){
                $booked_date  = \Carbon\Carbon::parse($val->booking_date)->format('d-m-Y');
                $booked_time = \Carbon\Carbon::parse($val->booking_date)->format("h:i");
                $request_date = $request->booking_date;
                if($request_date == $booked_date){
                    array_push($sorted_order_list, $booked_time);
                }
                
            }
            
            $o_data = $sorted_order_list;
            
            $o_data = convert_all_elements_to_string($o_data);
        }
        return response()->json(['status' => $status, 'errors' => $errors, 'message' => $message, 'oData' => $o_data], 200);
    }


    public function service_cancel_order(REQUEST $request)
    {
        $status = (string) 1;
        $message = "";
        $o_data = [];
        $errors = [];

        $validator = Validator::make($request->all(), [
            'access_token' => 'required',
            'order_id' => 'required',
        ]);

        if ($validator->fails()) {
            $status = (string) 0;
            $message = "Validation error occured";
            $errors = $validator->messages();
        } else {

            $user_id = $this->validateAccesToken($request->access_token);
            $order = OrderServiceItemsModel::where(['order_id' => $request->order_id])->first();
            $mainorderdata = OrderServiceModel::where('order_id', $request->order_id)->first();

            if ($order) {
                $highest_order_prd_status = OrderServiceItemsModel::where(['order_id' => $request->order_id])->orderBy('order_status', 'desc')->first();

                if (isset($highest_order_prd_status->order_status) && $highest_order_prd_status->order_status == 0) {

                    $amount_to_credit = $order->grand_total;
                    $users = User::find($user_id);

                        $data = [
                            'user_id' => $user_id,
                            'wallet_amount' => $mainorderdata->grand_total,
                            'pay_type' => 'credited',
                            'pay_method' => $mainorderdata->payment_mode,
                            'description' => 'Service Order cancellation amount refunded to wallet.',
                        ];

                        if (wallet_history($data)) {
                            $users->wallet_amount = $users->wallet_amount + $mainorderdata->grand_total;
                            $users->save();
                        }
                    


                    

                    // $users->wallet_amount = $users->wallet_amount + $amount_to_credit;
                    // $users->save();
                    $c_st = config('global.order_status_cancelled');
                    OrderServiceModel::where('order_id', $request->order_id)->update(['status' => $c_st]);
                    OrderServiceItemsModel::where(['order_id' => $request->order_id])->update(['order_status' => $c_st]);
                    $status = (string) 1;
                    $message = "Your service order has been cancelled successfully.";

                    $title = $mainorderdata->order_no;
                    $description = $message;
                    $notification_id = time();
                    $ntype = 'service_order_cancelled';
                    if (!empty($users->firebase_user_key)) {
                        $notification_data["Notifications/" . $users->firebase_user_key . "/" . $notification_id] = [
                            "title" => $title,
                            "description" => $description,
                            "notificationType" => $ntype,
                            "createdAt" => gmdate("d-m-Y H:i:s", $notification_id),
                            "orderId" => (string) $request->order_id,
                            "url" => (string) $request->id,
                            "imageURL" => '',
                            "read" => "0",
                            "seen" => "0",
                        ];
                        $this->database->getReference()->update($notification_data);
                    }

                    if (!empty($users->user_device_token)) {
                        send_single_notification(
                            $users->user_device_token,
                            [
                                "title" => $title,
                                "body" => $description,
                                "icon" => 'myicon',
                                "sound" => 'default',
                                "click_action" => "EcomNotification"
                            ],
                            [
                                "type" => $ntype,
                                "notificationID" => $notification_id,
                                "orderId" => (string) $request->order_id,
                                "imageURL" => "",
                            ]
                        );
                    }
                } else {
                    $status = (string) 0;
                    $message = "You can't cancel this service order";
                }
            } else {
                $status = (string) 0;
                $message = "Error";
            }
        }
        return response()->json(['status' => $status, 'errors' => $errors, 'message' => $message, 'oData' => $o_data], 200);
    }
}