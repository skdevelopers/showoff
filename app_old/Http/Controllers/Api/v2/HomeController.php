<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorDetailsModel;
use App\Models\User;
use App\Models\Likes;
use App\Models\BannerModel;
use App\Models\Categories;
use App\Models\ProductModel;
use App\Models\Service;
use App\Models\FeaturedProducts;
use App\Models\Rating;
use App\Models\FeaturedProductsImg;
use App\Models\ServiceCategories;
use App\Models\Coupons;
use App\Models\VendorModel;
use App\Models\CouponOrder;
use App\Models\VideoViews;
use App\Models\ContactUsSetting;
use App\Models\Events;
use Validator;
use QrCode;

class HomeController extends Controller
{
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
    function index(Request $request)
    {
        $status = (string) 1;
        $message = "";
        $o_data = [];
        $errors = [];
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            $message = "Validation error occured";
            $errors = $validator->messages();
            return response()->json([
                'status' => (string) 0,
                'message' => $message,
                'errors' => (object) $errors,
            ], 200);
        }

        $access_token = $request->access_token;
        $user = User::where('user_access_token', $access_token)->first();
        
        $banner_image = "banner_image";
        if($request->header('lang') == "ar")
        {
            $banner_image = "banner_image_ar as banner_image";
        }

        $banner  = BannerModel::select('*',$banner_image)->where('active',1)->get();
        foreach ($banner as $key => $value) {
            $banner[$key]->name = Categories::find($value->category_id)->name??'';
        }
        $categories  = Categories::where('active',1)->get();

        $limit = isset($request->limit) ? $request->limit : 10;
        $offset = isset($request->page) ? ($request->page - 1) * $request->limit : 0;

        $coupons  = Coupons::select('outlet_id','user_image as outlet_logo','coupon_title','coupon_id','coupon_description','coupon_code','coupon_amount','amount_type','name','latitude','longitude','location','image');
        $filter['lat'] = $request->latitude;
        $filter['long'] = $request->longitude;
        $filter['distance'] = $request->distance;
        if (isset($filter['lat']) && $filter['long']) {
            $lat = $filter['lat'];
            $long = $filter['long'];
            $distance =
                "6371 * acos (
                cos ( radians( CAST (latitude AS double precision) ) )
                * cos( radians( CAST ({$lat} AS double precision) ) )
                * cos( radians( CAST ({$long} AS double precision) ) - radians( CAST (longitude AS double precision) ) )
                + sin ( radians( CAST (latitude AS double precision) ) )
                * sin( radians ( CAST ({$lat} AS double precision) ) )
            )";
            $coupons->selectRaw("$distance as distance");
            }

            if (isset($filter['distance']) && $filter['distance']) {
                $filter_distance = $filter['distance'];
                $coupons->whereRaw("$distance<=$filter_distance");
            }
        $coupons = $coupons->orderBy('distance','asc');
        $coupons = $coupons->where('coupon_status',1)->leftjoin('users','users.id','=','coupon.outlet_id')
        ->where('start_date','<=',gmdate('Y-m-d H:i:s'))->where('coupon_end_date','>=',gmdate('Y-m-d 00:00:00'))->offset($offset)->limit($limit)->get();
        foreach ($coupons as $key => $value) {
            $coupons[$key]->outlet_logo = VendorModel::select('user_image')->where('id',$value->outlet_id)->first()->user_image??"";
        }
        

        $o_data['banner'] = $banner;
        $o_data['categories'] = $categories;
        $o_data['near_by_offers'] = $coupons;
        $o_data['social_data'] = ContactUsSetting::first()->toArray();

        $o_data = convert_all_elements_to_string($o_data);
        if(!empty($coupons) && count($coupons) == 0)
        {
            $o_data['near_by_offers'] = [];
        }
        


        return response()->json(['status' => $status, 'message' => $message, 'errors' => (object) $errors, 'oData' => $o_data], 200);
    }
    function search(Request $request)
    {
        $status = (string) 1;
        $message = "";
        $o_data = [];
        $errors = [];
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            $message = "Validation error occured";
            $errors = $validator->messages();
            return response()->json([
                'status' => (string) 0,
                'message' => $message,
                'errors' => (object) $errors,
            ], 200);
        }

        $access_token = $request->access_token;
        $user = User::where('user_access_token', $access_token)->first();
        $minRating = 1;
        $maxRating = 5;

        $coupons  = Coupons::
        // withAvg('ratings', 'rating')
        // ->whereHas('ratings', function ($query) use ($minRating, $maxRating) {
        //     $query->whereBetween('rating', [$minRating, $maxRating]);
        // })->
        select('outlet_id','user_image as outlet_logo','coupon_title','coupon_id','coupon_description','coupon_code','coupon_amount','amount_type','name','latitude','longitude','location','image');
        $filter['lat'] = $request->latitude;
        $filter['long'] = $request->longitude;
        $filter['distance'] = $request->distance;
        if (isset($filter['lat']) && $filter['long']) {
            $lat = $filter['lat'];
            $long = $filter['long'];
            $distance =
                "6371 * acos (
                cos ( radians( CAST (latitude AS double precision) ) )
                * cos( radians( CAST ({$lat} AS double precision) ) )
                * cos( radians( CAST ({$long} AS double precision) ) - radians( CAST (longitude AS double precision) ) )
                + sin ( radians( CAST (latitude AS double precision) ) )
                * sin( radians ( CAST ({$lat} AS double precision) ) )
            )";
            $coupons->selectRaw("$distance as distance");
            }

            if (isset($filter['distance']) && $filter['distance']) {
                $filter_distance = $filter['distance'];
                $coupons->whereRaw("$distance<=$filter_distance");
            }
           
        if(!empty($request->search))
        {
            $srch = $request->search;
            $coupons = $coupons->where('coupon_title', 'ilike', '%' . $srch . '%');
        }
        if(!empty($request->sort_by) && !empty($request->order_by))
        {
            $coupons = $coupons->orderBy($request->sort_by,$request->order_by);    
        }
        else{
            $coupons = $coupons->orderBy('distance','asc');
        }

        if(!empty($request->min_amount) && !empty($request->max_amount))
        {
            $coupons = $coupons->where('coupon_amount','>=',$request->min_amount);  
            $coupons = $coupons->where('coupon_amount','<=',$request->max_amount);    
        }
        $coupons = $coupons->where('coupon_status',1)->leftjoin('users','users.id','=','coupon.outlet_id')
        ->where('start_date','<=',gmdate('Y-m-d H:i:s'))->where('coupon_end_date','>=',gmdate('Y-m-d 00:00:00'))->get();
        foreach ($coupons as $key => $value) {
            $coupons[$key]->outlet_logo = VendorModel::select('user_image')->where('id',$value->outlet_id)->first()->user_image??"";
        }
        
        
        $limit = isset($request->limit) ? $request->limit : 10;
        $offset = isset($request->page) ? ($request->page - 1) * $request->limit : 0;
        

        $o_data['list'] = convert_all_elements_to_string($coupons);
        


        return response()->json(['status' => $status, 'message' => $message, 'errors' => (object) $errors, 'oData' => $o_data], 200);
    }

    function slider(Request $request)
    {
        $status = (string) 1;
        $message = "";
        $o_data = [];
        $errors = [];
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            $message = "Validation error occured";
            $errors = $validator->messages();
            return response()->json([
                'status' => (string) 0,
                'message' => $message,
                'errors' => (object) $errors,
            ], 200);
        }

        $access_token = $request->access_token;
        $user = User::where('user_access_token', $access_token)->first();


        $coupons  = Coupons::select('outlet_id','user_image as outlet_logo','coupon_title','coupon_id','coupon_description','coupon_code','coupon_amount','amount_type','name','latitude','longitude','location','image');
        $filter['lat'] = $request->latitude;
        $filter['long'] = $request->longitude;
        $filter['distance'] = $request->distance;
        if (isset($filter['lat']) && $filter['long']) {
            $lat = $filter['lat'];
            $long = $filter['long'];
            $distance =
                "6371 * acos (
                cos ( radians( CAST (latitude AS double precision) ) )
                * cos( radians( CAST ({$lat} AS double precision) ) )
                * cos( radians( CAST ({$long} AS double precision) ) - radians( CAST (longitude AS double precision) ) )
                + sin ( radians( CAST (latitude AS double precision) ) )
                * sin( radians ( CAST ({$lat} AS double precision) ) )
            )";
            $coupons->selectRaw("$distance as distance");
            }

            if (isset($filter['distance']) && $filter['distance']) {
                $filter_distance = $filter['distance'];
                $coupons->whereRaw("$distance<=$filter_distance");
            }
        $coupons = $coupons->orderBy('distance','asc')->where('coupon_amount','!=',0)->where('amount_type',2);
        if(!empty($request->search))
        {
            $srch = $request->search;
            $coupons = $coupons->where('name', 'ilike', '%' . $srch . '%');
        }
        $coupons = $coupons->where('coupon_status',1)->leftjoin('users','users.id','=','coupon.outlet_id')->get();
        foreach ($coupons as $key => $value) {
            $coupons[$key]->outlet_logo = VendorModel::select('user_image')->where('id',$value->outlet_id)->first()->user_image??"";
        }
        
        
        $limit = isset($request->limit) ? $request->limit : 10;
        $offset = isset($request->page) ? ($request->page - 1) * $request->limit : 0;
        
        
        $o_data['max_price'] =  $coupons->max('coupon_amount')??0;
        $o_data['min_price'] =  $coupons->min('coupon_amount')??0;
        


        return response()->json(['status' => $status, 'message' => $message, 'errors' => (object) $errors, 'oData' => convert_all_elements_to_string($o_data)], 200);
    }

    function category(Request $request)
    {
        $status = (string) 1;
        $message = "";
        $o_data = [];
        $errors = [];
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            $message = "Validation error occured";
            $errors = $validator->messages();
            return response()->json([
                'status' => (string) 0,
                'message' => $message,
                'errors' => (object) $errors,
            ], 200);
        }

        $access_token = $request->access_token;
        $user = User::where('user_access_token', $access_token)->first();
          
        $categories  = Categories::where('active',1);
        if(!empty($request->search))
        {
            $srch = $request->search;
            $categories = $categories->where('name', 'ilike', '%' . $srch . '%');
        }
        
        $categories = $categories->get();

        $banner  = BannerModel::where('active',1)->get();

        $o_data['banner'] = $banner;
        $o_data['categories'] = $categories;
        $o_data = convert_all_elements_to_string($o_data);
        if(!empty($categories) && count($categories) == 0)
        {
            $o_data['categories'] = [];
        }
        if(!empty($banner) && count($banner) == 0)
        {
            $o_data['banner'] = [];
        }
        
        return response()->json(['status' => $status, 'message' => $message, 'errors' => (object) $errors, 'oData' => $o_data ], 200);
    }

    function coupons(Request $request)
    {
        $status = (string) 1;
        $message = "";
        $o_data = [];
        $errors = [];
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            $message = "Validation error occured";
            $errors = $validator->messages();
            return response()->json([
                'status' => (string) 0,
                'message' => $message,
                'errors' => (object) $errors,
            ], 200);
        }

        $access_token = $request->access_token;
        $user = User::where('user_access_token', $access_token)->first();


        $coupons  = Coupons::select('outlet_id','user_image as outlet_logo','coupon_category.category_id','coupon_title','coupon.coupon_id','coupon_description','coupon_amount','amount_type','coupon_code','name','latitude','longitude','location','image');
        $filter['lat'] = $request->latitude;
        $filter['long'] = $request->longitude;
        $filter['distance'] = $request->distance;
        if (isset($filter['lat']) && $filter['long']) {
            $lat = $filter['lat'];
            $long = $filter['long'];
            $distance =
                "6371 * acos (
                cos ( radians( CAST (latitude AS double precision) ) )
                * cos( radians( CAST ({$lat} AS double precision) ) )
                * cos( radians( CAST ({$long} AS double precision) ) - radians( CAST (longitude AS double precision) ) )
                + sin ( radians( CAST (latitude AS double precision) ) )
                * sin( radians ( CAST ({$lat} AS double precision) ) )
            )";
            $coupons->selectRaw("$distance as distance");
            }

            if (isset($filter['distance']) && $filter['distance']) {
                $filter_distance = $filter['distance'];
                $coupons->whereRaw("$distance<=$filter_distance");
            }
        $coupons = $coupons->orderBy('coupon.coupon_id','asc')->leftjoin('coupon_category','coupon_category.coupon_id','=','coupon.coupon_id');
        if(!empty($request->category_id))
        {
            $coupons = $coupons->where('coupon_category.category_id',$request->category_id);
        }
        if(!empty($request->outlet_id))
        {
            $coupons = $coupons->where('coupon.outlet_id',$request->outlet_id);
        }
        
        if(!empty($request->search))
        {
            $srch = $request->search;
            $coupons = $coupons->where('name', 'ilike', '%' . $srch . '%');
        }
        $coupons = $coupons->where('coupon_status',1)->leftjoin('users','users.id','=','coupon.outlet_id')
        ->where('start_date','<=',gmdate('Y-m-d H:i:s'))->where('coupon_end_date','>=',gmdate('Y-m-d 00:00:00'))->get();
        foreach ($coupons as $key => $value) {
            $coupons[$key]->outlet_logo = VendorModel::select('user_image')->where('id',$value->outlet_id)->first()->user_image??"";
        }
        
        
        $limit = isset($request->limit) ? $request->limit : 10;
        $offset = isset($request->page) ? ($request->page - 1) * $request->limit : 0;
        
        
        $o_data['list'] = convert_all_elements_to_string($coupons);
        


        return response()->json(['status' => $status, 'message' => $message, 'errors' => (object) $errors, 'oData' => $o_data], 200);
    }
    function store_details(Request $request)
    {
        $status = (string) 1;
        $message = "";
        $o_data = [];
        $errors = [];
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            $message = "Validation error occured";
            $errors = $validator->messages();
            return response()->json([
                'status' => (string) 0,
                'message' => $message,
                'errors' => (object) $errors,
            ], 200);
        }

        $access_token = $request->access_token;
        $user = User::where('user_access_token', $access_token)->first();


        $coupons  = Coupons::select('outlet_id','user_image as outlet_logo','coupon_category.category_id','coupon_title','coupon.coupon_id','coupon_description','coupon_amount','amount_type','coupon_code','name','latitude','longitude','location','image');
        $filter['lat'] = $request->latitude;
        $filter['long'] = $request->longitude;
        $filter['distance'] = $request->distance;
        if (isset($filter['lat']) && $filter['long']) {
            $lat = $filter['lat'];
            $long = $filter['long'];
            $distance =
                "6371 * acos (
                cos ( radians( CAST (latitude AS double precision) ) )
                * cos( radians( CAST ({$lat} AS double precision) ) )
                * cos( radians( CAST ({$long} AS double precision) ) - radians( CAST (longitude AS double precision) ) )
                + sin ( radians( CAST (latitude AS double precision) ) )
                * sin( radians ( CAST ({$lat} AS double precision) ) )
            )";
            $coupons->selectRaw("$distance as distance");
            }

            if (isset($filter['distance']) && $filter['distance']) {
                $filter_distance = $filter['distance'];
                $coupons->whereRaw("$distance<=$filter_distance");
            }
        $coupons = $coupons->orderBy('coupon.coupon_id','desc')->leftjoin('coupon_category','coupon_category.coupon_id','=','coupon.coupon_id');
        if(!empty($request->category_id))
        {
            $coupons = $coupons->where('coupon_category.category_id',$request->category_id);
        }
        if(!empty($request->outlet_id))
        {
            $coupons = $coupons->where('coupon.outlet_id',$request->outlet_id);
        }
        
        if(!empty($request->search))
        {
            $srch = $request->search;
            $coupons = $coupons->where('name', 'ilike', '%' . $srch . '%');
        }
        $coupons = $coupons->where('coupon_status',1)->leftjoin('users','users.id','=','coupon.outlet_id')
        ->where('start_date','<=',gmdate('Y-m-d H:i:s'))->where('coupon_end_date','>=',gmdate('Y-m-d 00:00:00'))
        ->get();
        
        
        foreach ($coupons as $key => $value) {
            $coupons[$key]->outlet_logo = VendorModel::select('user_image')->where('id',$value->outlet_id)->first()->user_image??"";
        }
        
       
        $outlet = VendorModel::select('users.id as id', 'name',  'user_image','location','latitude','longitude','about_me')
            ->where('users.id', $request->outlet_id)
            ->first();

            
            $outlet->is_liked = 0;
            $outlet->rating = number_format(0, 1, '.', '');
            $outlet->coupons = Coupons::where('outlet_id',$outlet->id)->where('coupon_status',1)->get()->count();
            if ($user) {
                $is_liked = Likes::where(['vendor_id' => $outlet->id, 'user_id' => $user->id])->count();
                if ($is_liked) {
                    $outlet->is_liked = 1;
                }
                $where['vendor_id']   = $outlet->id;
                $outlet->rating = number_format(Rating::avg_rating($where), 1, '.', '');
            }
        
        
        $o_data['outlet'] = convert_all_elements_to_string($outlet);
        $o_data['list'] = convert_all_elements_to_string($coupons);
        if(!empty($coupons) && count($coupons) == 0)
        {
            $o_data['list'] = [];  
        }


        return response()->json(['status' => $status, 'message' => $message, 'errors' => (object) $errors, 'oData' => $o_data], 200);
    }
    public function download()
{
    return response()->streamDownload(
        function () {
            echo QrCode::size(200)
                ->format('png')
                ->generate('http://example.com');
        },
        'qr-code.png',
        [
            'Content-Type' => 'image/png',
        ]
    );
}
    function couponsDetails(Request $request)
    { 
    
        $status = (string) 1;
        $message = "";
        $o_data = [];
        $errors = [];
        $validator = Validator::make($request->all(), [
            'coupon_id'  => 'required',
           
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

        $access_token = $request->access_token;
        $user_id = $this->validateAccesToken($request->access_token);
        $user = User::where('user_access_token', $access_token)->first();




        $coupons  = Coupons::with('outlet','videos.video','earned','redeemed','amounttype','banners')->where('coupon_id',$request->coupon_id)->first();
        foreach($coupons->banners as $key_b=>$banner_value)
        {
            $coupons->banners[$key_b]->coupon_banner = asset('storage/coupons/'.$banner_value->coupon_banner);
        }
        
        $coupons->outlet_logo = VendorModel::select('user_image')->where('id',$coupons->outlet_id)->first()->user_image??"";
        foreach($coupons->videos as $keuv => $value)
        {
            $coupons->videos[$keuv]->video_url = $value->video->video;
            $viewd = VideoViews::where('video_id',$value->video->id)->where('user_id',$user->id)->where('coupon_id',$coupons->coupon_id)->get()->count();
            $coupons->videos[$keuv]->is_viewed = 0;
                if($viewd > 0)
                {
                    $coupons->videos[$keuv]->is_viewed = 1;
                }
            if($value->video->video_type == 1)
            {
                $coupons->videos[$keuv]->video_url = get_uploaded_url_cdn($value->video->video,'video_upload_dir');
            }
            
          
          
        }
        $where_rating['vendor_id']   = $coupons->outlet_id;
        $coupons->avg_rating = \App\Models\Rating::avg_rating_wherein($where_rating);
        $ratingdata = \App\Models\Rating::rating_list($where_rating);
        
        $coupons->rating_details = convert_all_elements_to_string($ratingdata);
        $coupons->is_liked = 0;
        if ($user) {
            $is_liked = Likes::where(['vendor_id' => $coupons->outlet_id, 'user_id' => $user->id])->count();
            if ($is_liked) {
                $coupons->is_liked = 1;
            }
        }
       
        
        $coupons_may  = Coupons::select('outlet_id','user_image as outlet_logo','coupon_category.category_id','coupon_title','coupon.coupon_id','coupon_amount','amount_type','coupon_description','coupon_code','name','latitude','longitude','location','image');
        $coupons_may = $coupons_may->orderBy('coupon.coupon_id','asc')
        ->leftjoin('coupon_category','coupon_category.coupon_id','=','coupon.coupon_id');
        $coupons_may = $coupons_may->where('coupon_status',1)->leftjoin('users','users.id','=','coupon.outlet_id')
        ->where('start_date','<=',gmdate('Y-m-d H:i:s'))->where('coupon_end_date','>=',gmdate('Y-m-d 00:00:00'))
        ->limit(15)->get();
        foreach ($coupons_may as $key => $value) {
            $coupons_may[$key]->outlet_logo = VendorModel::select('user_image')->where('id',$value->outlet_id)->first()->user_image??"";
        }
        $coupons->you_may_also_like = $coupons_may;
        
        
        $coupons->qr_code_data = "QR".str_pad($user_id, 3, '0', STR_PAD_LEFT).str_pad($request->coupon_id, 3, '0', STR_PAD_LEFT);
        $coupons->share_link = url('share_link/'.$request->coupon_id);
        $used = CouponOrder::where(['customer_id'=>$user_id,'outlet_id'=>$coupons->outlet_id,'coupon_id'=>$request->coupon_id])->get()->count();
        $coupons->is_used = 0;
        if($used >= $coupons->coupon_usage_peruser)
        {
            $coupons->is_used = 1;    
        }
        
        
        $o_data = convert_all_elements_to_string($coupons->toArray());
        if(count($coupons_may) == 0)
        {
            $o_data['you_may_also_like']   = [];
        }
        if(count($ratingdata) == 0)
        {
            $o_data['rating_details']   = [];
        }
        


        return response()->json(['status' => $status, 'message' => $message, 'errors' => (object) $errors, 'oData' => $o_data], 200);
    }
    
    function used_coupons(Request $request)
    { 
    
        $status = (string) 0;
        $message = "";
        $o_data = [];
        $errors = [];
        $validator = Validator::make($request->all(), [
            'access_token'  => 'required',
           
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

        $access_token = $request->access_token;
        $user_id = $this->validateAccesToken($request->access_token);
        $user = User::where('user_access_token', $access_token)->first();
        
        $page = $request->page??1;
        $limit = $request->limit??10;
        $offset = ($page - 1) * $limit;


        $used = CouponOrder::with(['coupon_details','customer'=>function($q){
                $q->select(['id','name','email','user_image','dial_code','phone']);
            },'outlet_details'=>function($q){
                $q->select(['id','name','email','user_image','dial_code','phone','location','latitude','longitude']);
            }])->where(['customer_id'=>$user_id])->orderBy('id','desc')->take($limit)->skip($offset)->get();
        
        if($used->count() > 0){
            $status = "1";
            $o_data = convert_all_elements_to_string($used->toArray());
            $message = "data fetched successfully";
        }else{
            $message = "no data to list";
        }
        
        
        


        return response()->json(['status' => $status, 'message' => $message, 'errors' => (object) $errors, 'oData' => $o_data], 200);
    }

    function un_used_coupons(Request $request)
    { 
    
        $status = (string) 0;
        $message = "";
        $o_data = [];
        $errors = [];
        $validator = Validator::make($request->all(), [
            'access_token'  => 'required',
           
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

        $access_token = $request->access_token;
        $user_id = $this->validateAccesToken($request->access_token);
        $user = User::where('user_access_token', $access_token)->first();
        
        $page = $request->page??1;
        $limit = $request->limit??10;
        $offset = ($page - 1) * $limit;
        
        $viewd = VideoViews::select('coupon_id')->where('user_id',$user_id)->get()->toArray();
        $used = CouponOrder::select('coupon_id')->where(['customer_id'=>$user_id])->get()->toArray();
        $coupons  = Coupons::whereIn('coupon_id',$viewd)->whereNotIn('coupon_id',$used)->
        // withAvg('ratings', 'rating')
        // ->whereHas('ratings', function ($query) use ($minRating, $maxRating) {
        //     $query->whereBetween('rating', [$minRating, $maxRating]);
        // })->
        select('outlet_id','user_image as outlet_logo','coupon_title','coupon_id','coupon_description','coupon_code','coupon_amount','amount_type','name','latitude','longitude','location','image');
        $filter['lat'] = $request->latitude;
        $filter['long'] = $request->longitude;
        $filter['distance'] = $request->distance;
        if (isset($filter['lat']) && $filter['long']) {
            $lat = $filter['lat'];
            $long = $filter['long'];
            $distance =
                "6371 * acos (
                cos ( radians( CAST (latitude AS double precision) ) )
                * cos( radians( CAST ({$lat} AS double precision) ) )
                * cos( radians( CAST ({$long} AS double precision) ) - radians( CAST (longitude AS double precision) ) )
                + sin ( radians( CAST (latitude AS double precision) ) )
                * sin( radians ( CAST ({$lat} AS double precision) ) )
            )";
            $coupons->selectRaw("$distance as distance");
            }

            if (isset($filter['distance']) && $filter['distance']) {
                $filter_distance = $filter['distance'];
                $coupons->whereRaw("$distance<=$filter_distance");
            }
       
        if(!empty($request->search))
        {
            $srch = $request->search;
            $coupons = $coupons->where('name', 'ilike', '%' . $srch . '%');
        }
        if(!empty($request->sort_by) && !empty($request->order_by))
        {
            $coupons = $coupons->orderBy($request->sort_by,$request->order_by);    
        }
        else{
            //$coupons = $coupons->orderBy('distance','asc');
        }

        if(!empty($request->min_amount) && !empty($request->max_amount))
        {
            $coupons = $coupons->where('coupon_amount','>=',$request->min_amount);  
            $coupons = $coupons->where('coupon_amount','<=',$request->max_amount);    
        }
        $coupons = $coupons->where('coupon_status',1)->leftjoin('users','users.id','=','coupon.outlet_id')
        ->where('start_date','<=',gmdate('Y-m-d H:i:s'))->where('coupon_end_date','>=',gmdate('Y-m-d 00:00:00'))->get();
           
        foreach ($coupons as $key => $value) {
            $coupons[$key]->outlet_logo = VendorModel::select('user_image')->where('id',$value->outlet_id)->first()->user_image??"";
        }
        
        
        $limit = isset($request->limit) ? $request->limit : 10;
        $offset = isset($request->page) ? ($request->page - 1) * $request->limit : 0;
            
        if($coupons->count() > 0){
            $status = "1";
            $o_data = convert_all_elements_to_string($coupons->toArray());
            $message = "data fetched successfully";
        }else{
            $message = "no data to list";
        }
        
        
        


        return response()->json(['status' => $status, 'message' => $message, 'errors' => (object) $errors, 'oData' => $o_data], 200);
    }

    function events(Request $request)
    {
        $status = (string) 1;
        $message = "";
        $o_data = [];
        $errors = [];
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            $message = "Validation error occured";
            $errors = $validator->messages();
            return response()->json([
                'status' => (string) 0,
                'message' => $message,
                'errors' => (object) $errors,
            ], 200);
        }

        $access_token = $request->access_token;
        $user = User::where('user_access_token', $access_token)->first();
         
        
        $limit = isset($request->limit) ? $request->limit : 10;
        $offset = isset($request->page) ? ($request->page - 1) * $request->limit : 0;


        $datamain = Events::where('status',1);
        if(!empty($request->search))
        {
            $srch = $request->search;
            $datamain = $datamain->where('name', 'ilike', '%' . $srch . '%');
        }

        $o_data['list'] = convert_all_elements_to_string($datamain->get());
        


        return response()->json(['status' => $status, 'message' => $message, 'errors' => (object) $errors, 'oData' => $o_data], 200);
    }

    function events_details(Request $request)
    {
        $status = (string) 1;
        $message = "";
        $o_data = [];
        $errors = [];
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            $message = "Validation error occured";
            $errors = $validator->messages();
            return response()->json([
                'status' => (string) 0,
                'message' => $message,
                'errors' => (object) $errors,
            ], 200);
        }

        $access_token = $request->access_token;
        $user = User::where('user_access_token', $access_token)->first();
         
        
       

        $datamain = Events::where('status',1)->where('id',$request->event_id);
        
        $o_data = convert_all_elements_to_string($datamain->first()->toarray());
        


        return response()->json(['status' => $status, 'message' => $message, 'errors' => (object) $errors, 'oData' => $o_data], 200);
    }
}