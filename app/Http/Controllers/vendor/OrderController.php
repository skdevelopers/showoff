<?php

namespace App\Http\Controllers\vendor;

use App\Exports\ExportReports;
use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use App\Models\OrderProductsModel;
use Auth;
use DB;
use Illuminate\Http\Request;
// use Kreait\Firebase\Database;
use Kreait\Firebase\Contract\Database;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\WholesaleOrder;
use App\Models\WholesaleOrderItem;

class OrderController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    public function index(Request $request)
    {
        $page_heading = "Orders";
        $order_id = $_GET['order_id'] ?? '';
        $name = $_GET['name'] ?? '';
        $from = !empty($_GET['from'])?date('Y-m-d',strtotime($_GET['from'])): '';
        $to = !empty($_GET['to']) ?date('Y-m-d',strtotime($_GET['to'])): '';
        $status = $_GET['status'] ?? '';
        $store_id = Auth::user()->id;

        $list =  OrderModel::select('orders.*',DB::raw("CONCAT(users.first_name,' ',users.last_name) as customer_name"))->leftjoin('users','users.id','orders.user_id')->with(['customer'=>function($q) use($name){
            $q->where('display_name','like','%'.$name.'%');
        }])
        ->with('customer')->leftJoinSub(
        OrderProductsModel::select('vendor_id', 'order_id')
            ->groupBy('order_id', 'vendor_id'),
        'order_products',
        'order_products.order_id',
        '=',
        'orders.order_id'
    )->where('vendor_id',$store_id);
        if($name)
        {
            $list =$list->whereRaw("concat(first_name, ' ', last_name) like '%" .$name. "%' ");
        }
        if($order_id){
            $list=$list->where(function ($query) use ($order_id) {
                $query->where('orders.order_id','like','%'.$order_id.'%' );
                $query->orWhere('orders.order_no', "like", "%" . $order_id . "%");
            });
        }
        if($from){
            $list=$list->whereDate('orders.created_at','>=',$from.' 00:00:00');
        }
        if($to){
            $list=$list->where('orders.created_at','<=',$to.' 23:59:59');
        }
        
        if($status){
            $list=$list->where('orders.status',$status);
        }
        if(isset($_GET['status'])){
            if($_GET['status'] == 0)
            {
            $list=$list->where('orders.status',0);    
            }
            
        }
        $list=$list->orderBy('orders.order_id','DESC')->paginate(10);

        foreach ($list as $key => $value) {
            $list[$key]->admin_commission = OrderProductsModel::where('order_id',$value->order_id)->sum('admin_commission');
            $list[$key]->vendor_commission = OrderProductsModel::where('order_id',$value->order_id)->sum('vendor_commission');
        }

        return view('vendor.orders.list',compact('page_heading','list','order_id','name','from','to','status'));
    }
    public function commission(Request $request)
    {
        $page_heading = "Commission Report";
        $order_id = $_GET['order_id'] ?? '';
        $name = $_GET['name'] ?? '';
        $from = !empty($_GET['from']) ? date('Y-m-d', strtotime($_GET['from'])) : '';
        $to = !empty($_GET['to']) ? date('Y-m-d', strtotime($_GET['to'])) : '';
        $list = OrderModel::select('orders.*', DB::raw("CONCAT(res_users.first_name,' ',res_users.last_name) as vendor_name"), 'order_products.admin_commission as ad_comm', 'order_products.vendor_commission as vd_comm', 'order_products.total as subtot')
            ->leftjoin('order_products', 'order_products.order_id', 'orders.order_id')
            ->leftjoin('res_users', 'res_users.id', 'order_products.vendor_id');
        $list->orderBy('vendor.order_id', 'desc');

        if ($order_id) {
            $list = $list->where('orders.order_id', $order_id);
        }
        if ($from) {
            $list = $list->whereDate('orders.created_at', '>=', $from . ' 00:00:00');
        }
        if ($to) {
            $list = $list->where('orders.created_at', '<=', $to . ' 23:59:59');
        }
        $list = $list->where('order_products.order_status', config("global.order_status_delivered"));
        if ($request->submit != "export") {
            $list = $list->paginate(10);
        } else {
            $list = $list->paginate(1000);
        }

        if ($request->submit == "export") {
            //export

            $rows = array();
            $i = 1;
            foreach ($list as $key => $val) {

                if ($val->payment_mode == 1) {
                    $payment = "COD";
                } else {
                    $payment = "CARD";
                }

                $rows[$key]['i'] = $i;
                $rows[$key]['order_id'] = $val->order_id;
                $rows[$key]['invoice_id'] = ($val->invoice_id) ?? '-';
                $rows[$key]['vendor'] = ($val->vendor_name) ?? '-';
                $rows[$key]['admin_commission'] = ($val->ad_comm) ?? '0';
                $rows[$key]['vendor_earning'] = $val->vd_comm;
                $rows[$key]['total'] = $val->subtot;
                $rows[$key]['payment_mode'] = $payment;
                $rows[$key]['order_date'] = get_date_in_timezone($val->created_at, 'd-M-y H:i A');
                $i++;
            }
            $headings = [
                "#",
                "Order ID",
                "Invoice ID",
                "Vendor",
                "Admin Commission",
                "Vendor Earning",
                "Total",
                "Payment Mode",
                "Order Date",
            ];
            $coll = new ExportReports([$rows], $headings);
            $ex = Excel::download($coll, 'products_' . date('d_m_Y_h_i_s') . '.xlsx');
            if (ob_get_length()) {
                ob_end_clean();
            }

            return $ex;
            //export end
        } else {
            return view('vendor.orders.commission', compact('page_heading', 'list', 'order_id', 'name', 'from', 'to'));
        }
    }

    public function details(Request $request,$id)
    {
        $page_heading = "Orders Details";
        //$list =  OrderProductsModel::select('orders.*',DB::raw("CONCAT(res_users.first_name,' ',res_users.last_name) as customer_name"))->->leftjoin('res_users','res_users.id','orders.user_id')->with('vendor')->where(['order_id'=>$id])->paginate(10);
        //if($list->total()){
        //foreach($list->items() as $key=>$row){

        //$list->items()[$key]->tickets=OrderModel::tickets($row->id);
        //$list->items()[$key]->product_name=OrderProductsModel::product_name($row->product_id,$row->product_type);
        //}
        // }
        $filter['order_id']  = $id;

        $page = (int)$request->page??1;
        $limit= 10;
        $offset = ($page - 1) * $limit;
        $list = OrderProductsModel::get_order_details($filter)->skip($offset)->take($limit)->get();
        $list = process_order($list);
        $show_cancel = 0;

        /*echo "<pre>";
            print_r($list);
        die;*/

        return view('vendor.orders.details',compact('page_heading','list', 'show_cancel'));
    }

    public function edit_order(Request $request, $id)
    {
        $page_heading = "Orders Details Edit";
        //$list =  OrderProductsModel::select('orders.*',DB::raw("CONCAT(res_users.first_name,' ',res_users.last_name) as customer_name"))->->leftjoin('res_users','res_users.id','orders.user_id')->with('vendor')->where(['order_id'=>$id])->paginate(10);
        //if($list->total()){
        //foreach($list->items() as $key=>$row){

        //$list->items()[$key]->tickets=OrderModel::tickets($row->id);
        //$list->items()[$key]->product_name=OrderProductsModel::product_name($row->product_id,$row->product_type);
        //}
        // }
        $filter['order_id'] = $id;

        $page = (int) $request->page ?? 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $list = OrderProductsModel::get_order_details($filter)->skip($offset)->take($limit)->get();
        $list = process_order($list);

        return view('vendor.orders.details_edit', compact('page_heading', 'list'));
    }

    public function change_status(Request $request)
    {
        $status = "0";
        $message = "";
        if ($request->detailsid && $request->statusid) {
            $update['status'] = $request->statusid;
            if (OrderModel::where('order_id', $request->detailsid)->update($update)) {

                // $det = OrderProductsModel::find($request->detailsid);
                // if ($request->statusid == config('global.order_status_delivered')) {
                //     $prd_det = \App\Models\ProductModel::find($det->product_id);
                //     $show_commission_on = gmdate("Y-m-d");
                //     if ($prd_det->ret_applicable) {
                //         $ret_policy_days = $prd_det->ret_policy_days ?? 0;
                //         if ($ret_policy_days) {
                //             $show_commission_on = \Carbon\Carbon::now()->addDays($ret_policy_days + 1);
                //         }
                //     }
                //     OrderProductsModel::where('id', $request->detailsid)->update(['show_commission_on' => $show_commission_on]);
                // }

                $ord = OrderModel::with('customer')->where('order_id', $request->detailsid)->first();
                if($request->statusid==config('global.order_status_cancelled')){
                    
                    $amount_to_credit = $ord->grand_total;
                    $w_data = [
                        'user_id' => $ord->customer->id,
                        'wallet_amount' => $amount_to_credit,
                        'pay_type' => 'credited',
                        'description' => 'Order Cancelled',
                    ];
                    if (wallet_history($w_data)) {
                        $users = \App\Models\User::find($ord->customer->id);
                        $users->wallet_amount = $users->wallet_amount + $amount_to_credit;
                        $users->save();
                    }
                }
                
                $title = "#".config('global.sale_order_prefix').date(date('Ymd', strtotime($ord->created_at))).$request->detailsid;
                $ord_st = order_status($request->statusid);
                $description = "Your order status updated to " . $ord_st;
                $notification_id = time();
                $ntype = 'order_status_changed';
                if (!empty($ord->customer->firebase_user_key)) {
                    $notification_data["Nottifications/" . $ord->customer->firebase_user_key . "/" . $notification_id] = [
                        "title" => $title,
                        "description" => $description,
                        "notificationType" => $ntype,
                        "createdAt" => gmdate("d-m-Y H:i:s", $notification_id),
                        "orderId" => (string) $request->detailsid,
                        "url" => "",
                        "imageURL" => '',
                        "read" => "0",
                        "seen" => "0",
                    ];
                    $this->database->getReference()->update($notification_data);
                }

                if (!empty($ord->customer->user_device_token)) {
                    send_single_notification($ord->customer->user_device_token, [
                        "title" => $title,
                        "body" => $description,
                        "icon" => 'myicon',
                        "sound" => 'default',
                        "click_action" => "EcomNotification"],
                        ["type" => $ntype,
                            "notificationID" => $notification_id,
                            "orderId" => (string) $request->detailsid,
                            "imageURL" => "",
                        ]);
                }
                $name = $ord->customer->name ?? $ord->customer->first_name . ' ' . $ord->customer->last_name;
                
                exec("php " . base_path() . "/artisan send:send_order_status_change_email --uri=" . urlencode($ord->customer->email) . " --uri2=" . $request->detailsid . " --uri3=" . urlencode($name) . " --uri4=" . $ord->customer->id . " --uri5=" . urlencode($ord_st) . " > /dev/null 2>&1 & ");

                $status = "1";
                $message = "Successfully updated";
            } else {
                $message = "Something went wrong";
            }
        } else {
            $message = "Something went wrong";
        }
        echo json_encode(['status' => $status, 'message' => $message]);
    }
    public function cancel_order(Request $request)
    {
        $status  = "0";
        $message = "";

        $order = OrderModel::with(['products'])->where('order_id', $request->order_id)->first();

            if ($order) {
                $highest_order_prd_status = OrderProductsModel::where('order_id',$request->order_id)->orderby('order_status','desc')->first();

                if(isset($highest_order_prd_status->order_status) && $highest_order_prd_status->order_status == 1){
                    $amount_to_credit = $order->grand_total;
                    $w_data = [
                        'user_id' => $order->user_id,
                        'wallet_amount' => $amount_to_credit,
                        'pay_type' => 'credited',
                        'description' => 'Order Cancelled',
                    ];
                    if (wallet_history($w_data)) {
                        $users = \App\Models\User::find($order->user_id);
                        $users->wallet_amount = $users->wallet_amount + $amount_to_credit;
                        $users->save();
                        $c_st = config('global.order_status_cancelled');
                        OrderModel::where('order_id', $request->order_id)->update(['status'=>$c_st]);
                        OrderProductsModel::where('order_id', $request->order_id)->update(['order_status'=>$c_st]);
                        $status = "1";
                        $message = "Order has been cancelled successfully. Amount has refunded to user wallet.";
                        $title = 'Order Cancelled';
                        $description = 'Your order has been cancelled successfully. Amount has refunded to your wallet.';
                        $notification_id = time();
                        $ntype = 'order_cancelled';
                        if (!empty($users->firebase_user_key)) {
                            $notification_data["Nottifications/" . $users->firebase_user_key . "/" . $notification_id] = [
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
                            send_single_notification($users->user_device_token, [
                                "title" => $title,
                                "body" => $description,
                                "icon" => 'myicon',
                                "sound" => 'default',
                                "click_action" => "EcomNotification"],
                                ["type" => $ntype,
                                    "notificationID" => $notification_id,
                                    "orderId" => (string) $request->order_id,
                                    "imageURL" => "",
                                ]);
                        }


                    }else{
                        $status = "0";
                        $message = "Something went wrong!! Try again";
                    }
                }else{
                     $status = "0";
                    $message = "You can't cancel this order";
                }
                
            }else{
                $message = "Something went wrong";
            }

        echo json_encode(['status'=>$status,'message'=>$message]);
    }
    public function change_return_status(Request $request)
    {
        $status = "0";
        $message = "";
        if($request->detailsid && $request->statusid){
            $ret_st = 'Rejected';
            if($request->statusid==1){
                $ret_st = 'Approved';
                $update['order_status'] = config('global.order_status_returned');
            }
            $update['ret_status'] = $request->statusid;
            $update['ret_status_changed_on'] = gmdate('Y-m-d H:i:s');
            $update['ret_status_changed_by'] = Auth::user()->id;
            if (OrderProductsModel::where('id', $request->detailsid)->update($update)) {
                $det = OrderProductsModel::find($request->detailsid);
                $ord = OrderModel::with('customer')->where('order_id', $det->order_id)->first();
                $title = 'Return Status Updated';
                $description = "Your return request has been ".$ret_st;
                $notification_id = time();
                $ntype = 'return_status_changed';
                if($request->statusid==1){
                    $description = $description.'. Amount has refunded to your wallet';
                    $amount_to_credit = $det->total;
                    $w_data = [
                        'user_id' => $ord->user_id,
                        'wallet_amount' => $amount_to_credit,
                        'pay_type' => 'credited',
                        'description' => 'Order Returned',
                    ];
                    if(wallet_history($w_data)){
                        $users = \App\Models\User::find($ord->user_id);
                        $users->wallet_amount = $users->wallet_amount + $amount_to_credit;
                        $users->save();
                    }
                }
                if (!empty($ord->customer->firebase_user_key)) {
                    $notification_data["Nottifications/" . $ord->customer->firebase_user_key . "/" . $notification_id] = [
                        "title" => $title,
                        "description" => $description,
                        "notificationType" => $ntype,
                        "createdAt" => gmdate("d-m-Y H:i:s", $notification_id),
                        "orderId" => (string) $det->order_id,
                        "url" => "",
                        "imageURL" => '',
                        "read" => "0",
                        "seen" => "0",
                    ];
                    $this->database->getReference()->update($notification_data);
                }

                if (!empty($ord->customer->user_device_token)) {
                    send_single_notification($ord->customer->user_device_token, [
                        "title" => $title,
                        "body" => $description,
                        "icon" => 'myicon',
                        "sound" => 'default',
                        "click_action" => "EcomNotification"],
                        ["type" => $ntype,
                            "notificationID" => $notification_id,
                            "orderId" => (string) $det->order_id,
                            "imageURL" => "",
                        ]);
                }
                // $name = $ord->customer->name ?? $ord->customer->first_name . ' ' . $ord->customer->last_name;
                // exec("php " . base_path() . "/artisan send:send_order_status_change_email --uri=" . urlencode($ord->customer->email) . " --uri2=" . $det->order_id . " --uri3=" . urlencode($name) . " --uri4=" . $ord->customer->id . " --uri5=" . urlencode($ret_st) . " > /dev/null 2>&1 & ");

                $status = "1";
                $message = "Successfully updated";
            } else {
                $message = "Something went wrong";
            }
        }else{
            $message = "Something went wrong";
        }
        echo json_encode(['status' => $status, 'message' => $message]);
    }

}
