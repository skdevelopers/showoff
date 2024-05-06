<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorDetailsModel;
use App\Models\User;
use App\Models\ProductModel;
use App\Models\ProductMasterModel;
use App\Models\FeaturedProductsImg;
use App\Models\Categories;
use App\Models\ProductLikes;
use App\Models\Rating;
use App\Models\Likes;
use App\Models\VendorModel;
use DB;
use Validator;

class VendorController extends Controller
{
    function list(Request $request) {
        $status = 1;
        $message = "";
        $o_data = [];
        $errors = [];
        $validator = Validator::make($request->all(), [
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        if ($validator->fails()) {
            $message = "Validation error occured";
            $errors = $validator->messages();
            return response()->json([
                'status' => 0,
                'message' => $message,
                'errors' => (object) $errors,
            ], 200);
        }

        $access_token = $request->access_token;
        $limit = isset($request->limit) ? $request->limit : 10;
        $offset = isset($request->page) ? ($request->page - 1) * $request->limit : 0;

        $where = [];
        $filter['search_text'] = $request->search_text;
        $filter['lat'] = $request->latitude;
        $filter['long'] = $request->longitude;
        $filter['distance'] = $request->distance;
        $filter['master_product_id'] = $request->master_product_id;
        if($request->category_id){
            $filter['category_id'] = $request->category_id;
        }
        if($request->ignore_id){
            $filter['ignore_id'] = $request->ignore_id;
        }
        $stores = VendorDetailsModel::get_stores($where, $filter, $limit, $offset)->get();
        
        $user = User::where('user_access_token', $access_token)->first();
        foreach ($stores as $key => $val) {
            $stores[$key]->logo = asset($val->logo);
            if(!empty($val->cover_image))
            {
                   $stores[$key]->cover_image = asset($val->cover_image);
            }
            else
            {
                $stores[$key]->cover_image = asset("storage/placeholder.png");
            }

            $store_timing = check_store_open($request,$val->id,'1');

            $stores[$key]->open_time = $store_timing['open_time'] ?? '';
            $stores[$key]->close_time = $store_timing['close_time'] ?? '';
            $stores[$key]->store_is_open = $store_timing['open'] ?? '0';

            $stores[$key]->is_liked = 0;
            // $stores[$key]->rating = number_format(0, 1, '.', '');
            // $stores[$key]->rating_count = 0;
            if ($user) {
                $is_liked = Likes::where(['vendor_id' => $val->id, 'user_id' => $user->id])->count();
                if ($is_liked) {
                    $stores[$key]->is_liked = 1;
                }
            }
            $stores[$key]->rating = number_format(Rating::avg_rating(['vendor_id'=>$val->id]), 1, '.', '');
            $stores[$key]->rating_count = Rating::where('vendor_id',$val->id)->get()->count();
            unset($stores[$key]->cover_image);
            unset($stores[$key]->latitude);
            unset($stores[$key]->longitude);
            unset($stores[$key]->location);

            $vendor = VendorModel::find($val->id);
            $stores[$key]->is_dinein =  (string)($vendor->is_dinein ?? '0');
            $stores[$key]->is_delivery =  (string)($vendor->is_delivery ?? '0');

        }
          $filter = [];
          $where = [];
          $limit = isset($request->limit) ? $request->limit : 10;
          $offset = isset($request->page) ? ($request->page - 1) * $request->limit : 0;
          $filter['search_text'] = $request->search_text;
          $filter['lat'] = $request->latitude;
          $filter['long'] = $request->longitude;
          $filter['distance'] = $request->distance;
          $stores2 = VendorDetailsModel::get_stores_for_featured($where, $filter, $limit, $offset)->get();

        //   foreach ($stores2 as $key => $val) {
        //     $stores2[$key]->logo = asset($val->logo);
        //     $stores2[$key]->cover_image = asset($val->cover_image);
        //     $stores2[$key]->is_liked = 0;
        //     $where['vendor_id']   = $val->id;
        //     $stores2[$key]->rating = number_format(Rating::avg_rating($where), 1, '.', '');
        //     if ($user) {
        //         $is_liked = Likes::where(['vendor_id' => $val->id, 'user_id' => $user->id])->count();
        //         if ($is_liked) {
        //             $stores2[$key]->is_liked = 1;
        //         }
            
        //     }

        // }

        $o_data['list'] = convert_all_elements_to_string($stores);
        // $o_data['product_stores'] = $stores2;
        return response()->json(['status' => $status, 'message' => $message, 'errors' => (object) $errors, 'oData' => $o_data], 200);
    }
    public function details(Request $request)
    {
        $status = 1;
        $message = "";
        $o_data = [];
        $errors = [];
        $validator = Validator::make($request->all(), [
            'vendor_id' => 'required',
        ]);

        if ($validator->fails()) {
            $message = "Validation error occured";
            $errors = $validator->messages();
            return response()->json([
                'status' => 0,
                'message' => $message,
                'errors' => (object) $errors,
            ], 200);
        }
        $access_token = $request->access_token;

        $where['user_id'] = $request->vendor_id;

        $details = VendorDetailsModel::select('user_id as id','company_name','location','cover_image','logo','description','open_time','close_time','latitude','longitude','location')->where($where)->first();
        $user = User::where('user_access_token', $access_token)->first();


        if ($details) {
            $details->logo = asset($details->logo);

            if(!empty($details->cover_image))
            {
                   $details->cover_image = asset($details->cover_image);
            }
            else
            {
                $details->cover_image = asset("storage/placeholder.png");
            }
            
            $details->is_liked = 0;
            $where1['vendor_id']   = $details->id;
            $details->rating      = number_format(Rating::avg_rating($where1), 1, '.', '');
            $details->rating_count = Rating::where($where1)->get()->count() ?? 0;
            if ($user) {
                $is_liked = Likes::where(['vendor_id' => $details->id, 'user_id' => $user->id])->count();
                if ($is_liked) {
                    $details->is_liked = 1;
                }
                 

            }
            $store_timing = check_store_open($request,$details->id,'1');
            $details->open_time = $store_timing['open_time'] ?? '';
            $details->close_time = $store_timing['close_time'] ?? '';
            $details->store_is_open = $store_timing['open'] ?? '0';
            
            $details->location  = (string) $details->location;
            $details->available_from  = $details->open_time." - ".$details->close_time;
            $details->about           = (string) $details->description;
            $details->description =  $details->description ?? '';

            $vendor = VendorModel::with('menu_images','vendor_cuisines.cuisine','rattings.user')->find($details->id);

            $details->is_dinein =  (string)($vendor->is_dinein ?? '0');
            $details->is_delivery =  (string)($vendor->is_delivery ?? '0');
            $images = [];
            if($vendor && $vendor->menu_images->count()){
                foreach ($vendor->menu_images as $key => $row) {
                    $images[] = asset($row->image);
                }
            }
            $details->vendor_menu_images =  $images;

            $cuisines = [];
            if($vendor && $vendor->vendor_cuisines->count()){
                foreach ($vendor->vendor_cuisines as $key => $row) {
                    if($row->cuisine){
                        $cuisines[] = $row->cuisine->name;
                    }
                }
            }
            $details->vendor_cuisines =  $cuisines;
            $rattings = [];
            if($vendor && $vendor->rattings->count()){
                $offset = isset($request->page) ? ($request->page - 1) * $request->limit : 0;
                $vendor_rattings  =  Rating::where($where1)->limit(($request->limit ?? 2))->skip(($offset))->get();
                foreach ($vendor_rattings as $key => $row) {
                    $rattings[] = [
                        'rating' => $row->rating,
                        'name' => $row->title,
                        'comment' => $row->comment,
                        'customer_name' => $row->user ? ($row->user->first_name.' '. $row->user->last_name) : '',
                        'image' => $row->user ? asset($row->user->user_image) : '',
                        'created_at' => date('d M y',strtotime($row->created_at)),
                    ];
                }
            }
            $details->rattings =  $rattings;


            // $details->open_time =  $details->open_time ?? '';
            // $details->close_time =  $details->close_time ?? '';


            
        }

        $condition['product.deleted'] = 0;
        $condition['product.product_status'] = 1;
        $condition['product.product_vender_id'] = $request->vendor_id;

        $categories = Categories::select('category.*')->join('product_category','product_category.category_id','=','category.id')
        ->join('product','product.id','=','product_category.product_id')
        ->where($condition)
        ->orderBy('category.sort_order', 'asc')
        ->groupBy('category.id')->get();
        
        foreach ($categories as $key => $value) {
            $categories[$key]->image = $value->image ? asset($value->image) : '';
            $categories[$key]->product_count = Categories::where('category.id',$value->id)
            ->join('product_category','product_category.category_id','=','category.id')
            ->join('product','product.id','=','product_category.product_id')
            ->where($condition)
            ->get()->count();
            unset($categories[$key]->parent_id);
            unset($categories[$key]->active);
            unset($categories[$key]->deleted);
            unset($categories[$key]->sort_order);
            unset($categories[$key]->created_uid);
            unset($categories[$key]->updated_uid);
            
            unset($categories[$key]->created_at);
            unset($categories[$key]->updated_at);
            unset($categories[$key]->activity_id);
        }
        $details->store_id =  (string)$details->id;
        $o_data['store']   = convert_all_elements_to_string($details);

        

        //$data_sale_price_min = ProductModel::leftjoin('product_selected_attribute_list','product_selected_attribute_list.product_id','=','product.id')
        //->where('product_vender_id',$details->id)->where(['deleted'=>0,'product_status'=>1])->min('sale_price');
        $data_sale_price_min = VendorModel::find($details->id)->minimum_order_amount??0;
        $o_data['min_order_amount'] = (string) $data_sale_price_min;
        $o_data['categories'] = convert_all_elements_to_string($categories);


        $limit = isset($request->limit) ? $request->limit : 10;
        $offset = isset($request->page) ? ($request->page - 1) * $request->limit : 0;
        $where = [];
        $where['deleted'] = 0;
        $where['product_status'] = 1;

        $filter['search_text'] = $request->search_text;
        $filter['vendor_id']   = $request->vendor_id;
        $filter['featured'] = 1;

        $list = ProductModel::products_list($where, $filter, $limit, $offset)->get();
        $products = $this->product_inv($list, $user);
        $filter['featured'] = 0;
        $filter['recommended'] = 1;
        $recommended = ProductModel::products_list($where, $filter, $limit, $offset)->get();
        $recommended = $this->product_inv($recommended, $user);
        
        $o_data['list'] = $products->count() ? convert_all_elements_to_string($products) : [];
        $o_data['recommended_list'] = $recommended->count() ? convert_all_elements_to_string($recommended) : [];
        $o_data = convert_all_elements_to_string($o_data);

        if($request->latitude && $request->category_id){
            $request->id = $vendor->activity_id;
            $request->ignore_id = $details->id;
           try {
                $o_data['nearby_vendors'] = $this->list($request)->original['oData']['list'] ?? [];
           } catch (\Exception $e) {
               
           }
        }

        return response()->json(['status' => $status, 'message' => $message, 'errors' => (object) $errors, 'oData' => $o_data], 200);
    }
    function product_inv($products,$user){
        foreach ($products as $key => $val) {
            $products[$key]->is_liked = 0;
            $where['product_id'] = $val->id;
            $products[$key]->avg_rating = number_format(Rating::avg_rating($where), 1, '.', '');
            $products[$key]->rating_count = Rating::where($where)->get()->count();
            if ($user) {
                $is_liked = ProductLikes::where(['product_id' => $val->id, 'user_id' => $user->id])->count();
                if ($is_liked) {
                    $products[$key]->is_liked = 1;
                }
            }
            $det = [];
            if ($val->default_attribute_id) {
                $det = DB::table('product_selected_attribute_list')->select('product_attribute_id', 'stock_quantity', 'sale_price', 'regular_price', 'image')->where('product_id', $val->id)->where('product_attribute_id', $val->default_attribute_id)->first();
                if ($det) {
                    $images = $det->image;
                    if ($images) {
                        $images = explode(',', $images);
                        $images = array_values(array_filter($images));
                        $i = 0;
                        $prd_img = [];
                        foreach ($images as $img) {
                            if ($img) {
                                $prd_img[$i] = url(config('global.upload_path') . '/' . config('global.product_image_upload_dir').$img);
                                $i++;
                            }
                        }
                        $det->image = $prd_img;
                    } else {
                        $det->image = [];
                    }
                }

            } else {
                $det = DB::table('product_selected_attribute_list')->select('product_attribute_id', 'stock_quantity', 'sale_price', 'regular_price', 'image')->where('product_id', $val->id)->orderBy('product_attribute_id', 'DESC')->limit(1)->first();

                if ($det) {
                    $images = $det->image;
                    if ($images) {
                        $images = explode(',', $images);
                        $images = array_values(array_filter($images));
                        $i = 0;
                        $prd_img = [];
                        
                        foreach ($images as $img) {
                            if ($img) {
                                $prd_img[$i] = url(config('global.upload_path') . '/' . config('global.product_image_upload_dir').$img);
                                $i++;
                            }
                        }
                        $det->image = $prd_img;
                    } else {
                        $det->image = [];
                    }
                }
            }
            $products[$key]->inventory = $det;
        }
        return $products;
    }
}
