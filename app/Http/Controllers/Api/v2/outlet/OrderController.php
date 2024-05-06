<?php

namespace App\Http\Controllers\Api\v1\Outlet;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use App\Models\OrderProductsModel;
use App\Models\User;
use App\Models\OrderServiceModel;
use App\Models\Cities;
use App\Models\CouponOrder;
use App\Models\Coupons;
use DB;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use Validator;
use App\Models\ActivityType;
use App\Models\Rating;


class OrderController extends Controller
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
                'status' => 0,
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
                    'status' => 0,
                    'message' => login_message(),
                    'oData' => [],
                    'errors' => (object) [],
                ]);
                exit;
                return response()->json([
                    'status' => 0,
                    'message' => login_message(),
                    'oData' => [],
                    'errors' => (object) [],
                ], 401);
                exit;
            }
        }
    }
    public function createOrder(REQUEST $request)
    {
        $status = (string) 0;
        $message = "";
        $o_data = [];
        $errors = [];

        $validator = Validator::make($request->all(), [
            'access_token' => 'required',
            'qr_data' => 'required',
        ]);

        if ($validator->fails()) {
            $status = (string) 0;
            $message = "Validation error occured";
            $errors = $validator->messages();
        } else {
            
            $user_id = $this->validateAccesToken($request->access_token);

            $lastSixDigits = substr($request->qr_data, -6);
            $datamain = str_split($lastSixDigits, 3);
            
            $customer_id = (int) ($datamain[0]??0);
            $coupon_id   = (int) ($datamain[1]??0);
           
            //DB::statement("TRUNCATE coupon_order RESTART IDENTITY CASCADE;");
            $datamain = Coupons::where('coupon_id',$coupon_id)->where('outlet_id',$user_id)->first();
            if($datamain)
            {
                if(date('Y-m-d',strtotime($datamain->start_date)) <= date('Y-m-d') && date('Y-m-d',strtotime($datamain->coupon_end_date)) >= date('Y-m-d'))
                {
                    $check = CouponOrder::where('customer_id',$customer_id)->where('coupon_id',$coupon_id)->get()->count();
                    $used_total = CouponOrder::where('coupon_id',$coupon_id)->get()->count();
                    if($check >= $datamain->coupon_usage_peruser || $used_total >= $datamain->coupon_usage_percoupon)
                    {   
                        $status = (string) 0;
                        $message = "Already used"; 
                    }else{
                            //check user limit
                            $datains = new CouponOrder;
                            $datains->customer_id = $customer_id;
                            $datains->outlet_id = $user_id;
                            $datains->coupon_id = $coupon_id;
                            $datains->coupon_code = $datamain->coupon_code;
                            $datains->order_date = gmdate('Y-m-d H:i:s');
                            $datains->save();
        
                            $datainsorder = CouponOrder::find($datains->id);
                            $datainsorder->order_no = config('global.sale_order_prefix').date(date('Ymd', strtotime($datainsorder->order_date))).$datainsorder->id;
                            $datainsorder->save();
        
                            $status = (string) 1;
                            $message = "Coupon applied successfully!"; 
                            $o_data['order_id'] = (string) $datainsorder->id;
                            $o_data['order_no'] = $datainsorder->order_no;
    
                            $users = User::where('id',$customer_id)->where('send_notification','!=',2)->first();
                            $title = $datainsorder->order_no;//'Order Cancelled';
                            $description = $message;
                            $notification_id = time();
                            $ntype = 'order_created';
                            if (!empty($users->firebase_user_key)) {
                            $notification_data["Notifications/" . $users->firebase_user_key . "/" . $notification_id] = [
                                "title" => $title,
                                "description" => $description,
                                "notificationType" => $ntype,
                                "createdAt" => gmdate("d-m-Y H:i:s", $notification_id),
                                "orderId" => (string) $coupon_id,
                                "url" => "",
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
                                    "orderId" => (string) $coupon_id,
                                    "imageURL" => "",
                                ]
                            );
                        }
                    }
                    
                    
                }
                else
                {
                    
                    $status = (string) 0;
                    $message = "Coupon expired"; 
                }
                
            }
            else
            {
                $status = (string) 0;
                $message = "Invalid Coupon";
            }
            

        }

        return response()->json(['status' => $status, 'error' => $errors, 'message' => $message, 'oData' => (object) $o_data], 200);
    }

    public function orderList(REQUEST $request)
    {
        $status = (string) 0;
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

            $datamain = CouponOrder::with('coupon_details','customer')->where('outlet_id',$user_id)->orderBy('id','asc')->get();
            foreach ($datamain as $key => $value) {
                $datamain[$key]->order_date = api_date_in_timezone($value->order_date,'Y-m-d H:i:s','Asia/Dubai');
                $datamain[$key]->customer_location = Cities::find($value->customer->city_id??0)->name??'';
                $datamain[$key]->customerName = $value->customer->name??'';
            }

            
            

            $status = (string) 1;
            $message = "Order list";

            $o_data = convert_all_elements_to_string($datamain);
            
            foreach($o_data as $k=>$value){
                if(empty($value->customer)){
                    $o_data[$key]->customer = (object)[];
                }
                if(empty($value->coupon_details)){
                    $o_data[$key]->coupon_details = (object)[];
                }
            }
           

        }

        return response()->json(['status' => $status, 'error' => $errors, 'message' => $message, 'oData' => $o_data], 200);
    }

    public function orderDetails(REQUEST $request)
    {
        $status = (string) 0;
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

            $datamain = CouponOrder::with('coupon_details','customer')->where('outlet_id',$user_id)->where('id',$request->order_id)->first();
           
                $datamain->order_date = api_date_in_timezone($datamain->order_date,'Y-m-d H:i:s','Asia/Dubai');
                $datamain->customer_location = Cities::find($datamain->customer->city_id??0)->name??'';
                $datamain->coupon_details = $datamain->coupon_details;
                $datamain->customer = $datamain->customer;
                $datamain->customerName = $datamain->customer->name??'';
          
            

            $status = (string) 1;
            $message = "Order list";

            $o_data = convert_all_elements_to_string($datamain->toArray());
           

        }

        return response()->json(['status' => $status, 'error' => $errors, 'message' => $message, 'oData' => $o_data], 200);
    }
    
    public function cancel_order(REQUEST $request)
    {
        $status = 1;
        $message = "";
        $o_data = [];
        $errors = [];

        $validator = Validator::make($request->all(), [
            'access_token' => 'required',
            'order_id' => 'required',
        ]);

        if ($validator->fails()) {
            $status = 0;
            $message = "Validation error occured";
            $errors = $validator->messages();
        } else {

            $user_id = $this->validateAccesToken($request->access_token);
            $order = OrderModel::with(['products'])->where('user_id', $user_id)->where('order_id', $request->order_id)->first();

            if ($order) {
                $highest_order_prd_status = OrderModel::where('order_id', $request->order_id)->orderby('status', 'desc')->first();

                if (isset($highest_order_prd_status->status) && $highest_order_prd_status->status <= 2) {
                    $users = User::find($user_id);

                    if (in_array($order->payment_mode, [1,2,3,4])) {
                        $amount_to_credit = $order->grand_total;
                        $data = [
                            'user_id' => $user_id,
                            'wallet_amount' => $amount_to_credit,
                            'pay_type' => 'credited',
                            'pay_method' => $order->payment_mode,
                            'description' => 'Order cancellation amount refunded to wallet.',
                        ];

                        if (wallet_history($data)) {
                            $users->wallet_amount = $users->wallet_amount + $amount_to_credit;
                            $users->save();
                        }
                    }


                    $c_st = config('global.order_status_cancelled');
                    OrderModel::where('order_id', $request->order_id)->update(['status' => $c_st]);
                    OrderProductsModel::where('order_id', $request->order_id)->update(['order_status' => $c_st]);
                    $status = 1;
                    $message = "Your order has been cancelled successfully.";

                    if (in_array($order->payment_mode, [1,2,3,4])) {
                        $message = "Your order has been cancelled successfully. Amount has been refunded to your wallet.";
                    }
                    $order_no = config('global.sale_order_prefix').date(date('Ymd', strtotime($order->created_at))).$order->order_id;

                    $title = $order_no;//'Order Cancelled';
                    $description = $message;
                    $notification_id = time();
                    $ntype = 'order_cancelled';
                    if (!empty($users->firebase_user_key)) {
                        $notification_data["Notifications/" . $users->firebase_user_key . "/" . $notification_id] = [
                            "title" => $title,
                            "description" => $description,
                            "notificationType" => $ntype,
                            "createdAt" => gmdate("d-m-Y H:i:s", $notification_id),
                            "orderId" => (string) $request->order_id,
                            "url" => "",
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
                    \Artisan::call("send:send_grocery_booking_notification --uri=" . $order->order_id . " --uri2=" . 'cancellation' );
                } else {
                    $status = 0;
                    $message = "You can't cancel this order";
                }
            }
        }
        return response()->json(['status' => $status, 'errors' => $errors, 'message' => $message, 'oData' => $o_data], 200);
    }

    public function refund_request(REQUEST $request)
    {
        $status = 1;
        $message = "";
        $o_data = [];
        $errors = [];

        $validator = Validator::make($request->all(), [
            'access_token' => 'required',
            'order_id' => 'required|numeric|min:1',
            'payment_mode' => 'required|numeric|min:1|max:2',
            'type' => 'required|numeric|min:1|max:2',
        ]);

        if ($validator->fails()) {
            $status = 0;
            $message = "Validation error occured";
            $errors = $validator->messages();
        } else {

            $user_id = $this->validateAccesToken($request->access_token);
            if ($request->type == 1) { //product order
                $order = OrderModel::with(['products'])->where('user_id', $user_id)->where('order_id', $request->order_id)->first();

                if ($order) {
                    $highest_order_prd_status = OrderProductsModel::where('order_id', $request->order_id)->orderby('order_status', 'desc')->first();

                    if (isset($highest_order_prd_status->order_status) && $highest_order_prd_status->order_status == 10) {
                        $amount_to_credit = $order->grand_total;

                        $users = User::find($user_id);
                        // $users->wallet_amount = $users->wallet_amount + $amount_to_credit;
                        // $users->save();
                        $c_st = config('global.order_status_cancelled');
                        $indata = [
                            'refund_method' => $request->payment_mode,
                            'refund_requested' => 1,
                            'refund_requested_date' => gmdate('Y-m-d H:i:s'),
                        ];
                        OrderModel::where('order_id', $request->order_id)->update($indata);
                        //OrderProductsModel::where('order_id', $request->order_id)->update(['order_status'=>$c_st]);
                        $status = 1;
                        $message = "Your order refund request send successfully.";


                        $title = 'Refund request send successfully';
                        $description = $message;
                        $notification_id = time();
                        $ntype = 'refund_request';
                        if (!empty($users->firebase_user_key)) {
                            $notification_data["Notifications/" . $users->firebase_user_key . "/" . $notification_id] = [
                                "title" => $title,
                                "description" => $description,
                                "notificationType" => $ntype,
                                "createdAt" => gmdate("d-m-Y H:i:s", $notification_id),
                                "orderId" => (string) $request->order_id,
                                "url" => "",
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
                        $status = 0;
                        $message = "You can't request refund for this order";
                    }
                } else {
                    $status = 0;
                    $message = "Error";
                }
            } else {

                //for service
                $order = OrderServiceModel::with(['services'])->where('user_id', $user_id)->where('order_id', $request->order_id)->first();
                if ($order) {
                    $highest_order_prd_status = OrderServiceItemsModel::where('order_id', $request->order_id)->orderby('order_status', 'desc')->first();


                    if (isset($highest_order_prd_status->order_status) && $highest_order_prd_status->order_status == 10) {
                        $users = User::find($user_id);
                        // $users->wallet_amount = $users->wallet_amount + $amount_to_credit;
                        // $users->save();
                        $c_st = config('global.order_status_cancelled');
                        $indata = [
                            'refund_method' => $request->payment_mode,
                            'refund_requested' => 1,
                            'refund_requested_date' => gmdate('Y-m-d H:i:s'),
                        ];
                        OrderServiceModel::where('order_id', $request->order_id)->update($indata);
                        //OrderProductsModel::where('order_id', $request->order_id)->update(['order_status'=>$c_st]);
                        $status = 1;
                        $message = "Your service order refund request send successfully.";


                        $title = 'Service Refund request send successfully';
                        $description = $message;
                        $notification_id = time();
                        $ntype = 'service_refund_request';
                        if (!empty($users->firebase_user_key)) {
                            $notification_data["Notifications/" . $users->firebase_user_key . "/" . $notification_id] = [
                                "title" => $title,
                                "description" => $description,
                                "notificationType" => $ntype,
                                "createdAt" => gmdate("d-m-Y H:i:s", $notification_id),
                                "orderId" => (string) $request->order_id,
                                "url" => "",
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
                        $status  = 0;
                        $message = "You can't request refund for this service order";
                    }
                } else {
                    $status = 0;
                    $message = "Invalid order id";
                }
            }
        }
        return response()->json(['status' => $status, 'errors' => $errors, 'message' => $message, 'oData' => $o_data], 200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contracting(Request $request)
    {
        $status = "0";
        $message = "";
        $o_data = [];
        $errors = [];
        $redirectUrl = '';

        $validator = Validator::make($request->all(), [
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            $status = "0";
            $message = "Validation error occured";
            $errors = $validator->messages();
        } else {
            $user_id = $this->validateAccesToken($request->access_token);
            $input = $request->all();
            $ins = [
                'description' => $request->description,
                'building_type' => $request->building_type,
                'contract_type' => $request->contract_type,

            ];

            if ($request->file("file")) {
                $response = image_save($request, config('global.service_image_upload_dir'), 'file');
                if ($response['status']) {
                    $ins['file'] = $response['link'];
                }
            }

            $ins['created_at'] = gmdate('Y-m-d H:i:s');
            Contracting::create($ins);

            $status = "1";
            $message = "Contracting Submitted successfully";
        }
        return response()->json(['status' => $status, 'message' => $message, 'errors' => $errors], 200);
    }

    public function maintainance(Request $request)
    {
        $status = "0";
        $message = "";
        $o_data = [];
        $errors = [];
        $redirectUrl = '';

        $validator = Validator::make($request->all(), [
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            $status = "0";
            $message = "Validation error occured";
            $errors = $validator->messages();
        } else {
            $user_id = $this->validateAccesToken($request->access_token);
            $input = $request->all();
            $ins = [
                'description' => $request->description,
                'building_type' => $request->building_type,
            ];

            if ($request->file("file")) {
                $response = image_save($request, config('global.service_image_upload_dir'), 'file');
                if ($response['status']) {
                    $ins['file'] = $response['link'];
                }
            }

            $ins['created_at'] = gmdate('Y-m-d H:i:s');
            Maintainance::create($ins);

            $status = "1";
            $message = "Maintainance Submitted successfully";
        }
        return response()->json(['status' => $status, 'message' => $message, 'errors' => $errors], 200);
    }
    function bookingCount(Request $request)
    {
        $status = (string) 1;
        $message = "";
        $o_data = [];
        $errors = [];
        $validator = Validator::make($request->all(), [
            'access_token' => 'required',
        ]);

        if ($validator->fails()) {
            $message = "Validation error occured";
            $errors = $validator->messages();
            return response()->json([
                'status' => (string) 0,
                'message' => $message,
                'errors' => (object) $errors,
            ], 200);
        }
        $user_id = $this->validateAccesToken($request->access_token);
        $access_token = $request->access_token;
        $user = User::where('user_access_token', $access_token)->first();
        


        
        //banner END
        $activities  = ActivityType::where(['deleted' => '0','status' => '1'])->whereNotIn('id',[2,1])
        ->orderBy('sort_order', 'asc')
        ->select('id','name','description','logo')->get();
        foreach ($activities as $key => $value) {
            $count = 0;
            if($value->id == 7 || $value->id == 5 || $value->id == 3)
            {
                $activity_id = $value->id;
                $count = OrderModel::where('user_id',$user_id)->where('activity_id',$activity_id)->count();
            }
            else if($value->id == 6 || $value->id == 4)
            { 
                $activity = [$value->id];
                if($value->id == 6)
                {
                    $activity = [0,6];
                }
                
                $count = OrderServiceModel::where('user_id',$user_id)->whereIn('activity_id',$activity)->get()->count();
            }
            $activities[$key]->count = $count;
        }



     
        $o_data['activities']  = $activities;
        

        return response()->json(['status' => $status, 'message' => $message, 'errors' => (object) $errors, 'oData' => convert_all_elements_to_string($o_data)], 200);
    }
}