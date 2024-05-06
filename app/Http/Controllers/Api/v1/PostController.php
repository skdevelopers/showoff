<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\PostUsers;
use App\Models\PostLikes;
use App\Models\PostComment;
use App\Models\CommentTagedUsers;
use App\Models\CommentLikes;
use Kreait\Firebase\Contract\Database;
use App\Models\PostSave;
use Validator;
use DB;

class PostController extends Controller
{
    //
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    private function validateAccesToken($access_token){

      $user = User::where(['user_access_token'=>$access_token])->get();

      if($user->count() == 0){
         http_response_code(401);
              echo json_encode([
                    'status' => "0",
                    'message' => login_message(),
                    'oData' => [],
                    'errors' => (object)[]
                ]);
                exit;

      }else{
          $user=$user->first();
          if($user->active == 1){
            return $user->id;
          }else{
              http_response_code(401);
              echo json_encode([
                    'status' => "0",
                    'message' => login_message(),
                    'oData' => [],
                    'errors' => (object)[]
                ]);
                exit;
              return response()->json([
                    'status' => "0",
                    'message' => login_message(),
                    'oData' => [],
                    'errors' => (object)[]
                ], 401);
                exit;
          }
      }
    }
    private function process_post_data($data=[]){
      $result = [
        'post_id'     => (string)$data->id,
        'caption'     => $data->caption,
        'file'        => $data->file,
        'file_type'   => $data->file_type,
        'location_name' => $data->location_name,
        'lattitude'   => $data->lattitude,
        'longitude'   => $data->longitude,
        'created_at'  => $data->created_at,
        'time_text'  => $data->created_at->diffForHumans(),
        'updated_at'  => $data->updated_at,
        'user_id'     => (string)$data->user_id,
        'author'      => [],
        'comments'    => [],
        'comments_count' => (string) $data->comments_count??0,
        'likes_count' => (string) $data->likes_count??0,
        'visibility'  => (string) $data->visibility,
        'extra_file_names' => $data->extra_file_names,
        'active'      => (string) $data->active,
        'liked_by_user'=> "0",
        'saved_by_user'=> "0",
        'share_url'    => url('/').'/post/'.$data->id
      ];

      if(isset($data->liked_by_user)){
        $result['liked_by_user'] = (string) (($data->liked_by_user!=null)?1:0);
      }
      if(isset($data->saved_by_user)){
        $result['saved_by_user'] = (string) (($data->saved_by_user!=null)?1:0);
      }
      if(isset($data->user) && !empty($data->user)){
        $result['user_firebase_key'] = $data->user->firebase_user_key;
        $result['author'] = [
          'name'    => $data->user->name,
          'user_image' => $data->user->user_image
        ];
      }
      if(isset($data->comments) && !empty($data->comments)){
        $result['comments'] = $data->comments;
      }
      if(isset($data->post_users) && !empty($data->post_users)){
        $result['taged_users'] = [];
        foreach ($data->post_users as $userKey ) {
          $result['taged_users'][]= [
            'id'        => (string)$userKey->user->id,
            'name'      => $userKey->user->name,
            'user_image'=> $userKey->user->user_image,
            'firebase_user_key'=>$userKey->user->firebase_user_key
          ];
        }
      }
      return $result;
    }

    private function process_comment_data($data){
      $return = [
        'comment_id'    => (string)$data->id,
        'comment'       => $data->comment,
        'parent_id'     => (string)$data->parent_id,
        'created_at'    => $data->created_at,
        'updated_at'    => $data->updated_at
      ];
      if(isset($data->post) && !empty($data->post)){
        $return['post'] = $this->process_post_data($data->post);
      }
      // $return['parent_comment'] = [];
      // if(isset($data->parent) && !empty($data->parent)){
      //   $return['parent_comment'] = [
      //   ];
      // }
      if(isset($data->taged_users) && !empty($data->taged_users)){
        $return['comment_taged_users'] = [];
        foreach ($data->taged_users as $userKey ) {
          $return['comment_taged_users'][]= [
            'id'        => (string)$userKey->user->id,
            'name'      => $userKey->user->name,
            'user_image'=> $userKey->user->user_image,
            'firebase_user_key'=>$userKey->user->firebase_user_key
          ];
        }
      }

      return $return;
    }
    public function get_tag_users(REQUEST $request){
      $status   = "0";
      $message  = "";
      $o_data   = [];
      $errors   = [];

      $validator = Validator::make($request->all(), [
          'access_token' => 'required'
      ]);

      if ($validator->fails()) {
          $status = "0";
          $message = "Validation error occured";
          $errors = $validator->messages();
      }else{
        $search_text = $request->search_key;
        $page = (int)$request->page??1;
        $limit= 20;
        $offset = ($page - 1) * $limit;
        $user_id = $this->validateAccesToken($request->access_token);
        if$search_text != ''){
          $search_result = User::where(['active'=>1,'deleted'=>0])->where('id','!=',$user_id);
          $search_result->where(function($query) use ($search_text){
              $query->where('users.name', 'LIKE', $search_text.'%');
          });
          $search_result = $search_result->orderBy('name','asc')->orderBy('id','desc');
          $search_result = $search_result->skip($offset)->take($limit)->get();
          if($search_result->count() > 0){
            $status = "1";
            $message = "Data fetched Successfully";
            $o_data = $search_result->toArray();
            $o_data = convert_all_elements_to_string($o_data);
          }else{
            $message = "no data to show";
          }
        }else{
          $status = "1";
          $message = "no search key";
        }
      }


      return response()->json(['status' => $status, 'error' => $errors, 'message' => $message, 'oData' => $o_data], 200);
    }

    public function add_post(REQUEST $request){

    $status   = "0";
    $message  = "";
    $o_data   = [];
    $errors   = [];

    $validator = Validator::make($request->all(), [
        'access_token' => 'required',
        'caption' => 'max:2500',
        'file_type' => 'required',
        'file'    => function ($attribute, $value, $fail) {
            $is_image = Validator::make(
                ['upload' => $value],
                ['upload' => 'image']
            )->passes();

            $is_video = Validator::make(
                ['upload' => $value],
                ['upload' => 'mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4']
            )->passes();

            if (!$is_video && !$is_image) {
                $fail(':attribute must be image or video.');
            }

            if ($is_video) {
                $validator = Validator::make(
                    ['video' => $value],
                    ['video' => "max:102400"]
                );
                if ($validator->fails()) {
                    $fail(":attribute must be 10 megabytes or less.");
                }
            }

            if ($is_image) {
                $validator = Validator::make(
                    ['image' => $value],
                    ['image' => "max:1024"]
                );
                if ($validator->fails()) {
                    $fail(":attribute must be one megabyte or less.");
                }
            }
        },
        'extra_files.*'    => function ($attribute, $value, $fail) {
            $is_image = Validator::make(
                ['upload' => $value],
                ['upload' => 'image']
            )->passes();

            $is_video = Validator::make(
                ['upload' => $value],
                ['upload' => 'mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4']
            )->passes();

            if (!$is_video && !$is_image) {
                $fail(':attribute must be image or video.');
            }

            if ($is_video) {
                $validator = Validator::make(
                    ['video' => $value],
                    ['video' => "max:102400"]
                );
                if ($validator->fails()) {
                    $fail(":attribute must be 10 megabytes or less.");
                }
            }

            if ($is_image) {
                $validator = Validator::make(
                    ['image' => $value],
                    ['image' => "max:1024"]
                );
                if ($validator->fails()) {
                    $fail(":attribute must be one megabyte or less.");
                }
            }
        }
    ]);

    if ($validator->fails()) {
        $status = "0";
        $message = "Validation error occured";
        $errors = $validator->messages();
    }else{
      $user_id = $this->validateAccesToken($request->access_token);
      DB::beginTransaction();
        try{
          $file_name= '';
          if($file = $request->file("file")){
            $dir = config('global.upload_path')."/".config('global.post_image_upload_dir');
            $file_name = time().uniqid().".".$file->getClientOriginalExtension();
            $file->storeAs(config('global.post_image_upload_dir'),$file_name,config('global.upload_bucket'));
          }
          $extra_file_names = [];
          if($request->hasfile('extra_files')) {
              foreach($request->file('extra_files') as $file)
              {
                $dir = config('global.upload_path')."/".config('global.post_image_upload_dir');
                $file_name = time().uniqid().".".$file->getClientOriginalExtension();
                $file->storeAs(config('global.post_image_upload_dir'),$file_name,config('global.upload_bucket'));
                $extra_file_names[] = $file_name;
              }
          }

          $post_id = $request->post_id;
          if($post_id > 0){
            $post =  Post::find($post_id);
            $old_datas = explode(",",$post->extra_file_names);
            if(!empty($extra_file_names)){
              $new_data = array_merge($old_datas,$extra_file_names);
              $new_data = array_filter($new_data);
              $post->extra_file_names = $new_data;
            }
          }else{
            $post = new Post();
            $post->user_id        = $user_id;
            $post->created_at     = gmdate('Y-m-d H:i:s');
            if(!empty($extra_file_names)){
              $post->extra_file_names = implode(",",$extra_file_names);
            }
          }


          $post->caption        = $request->caption??'';
          $post->file_type      = $request->file_type;
          $post->file           = $file_name;
          $post->location_name  = $request->location;
          $post->lattitude      = $request->lattitude;
          $post->longitude      = $request->longitude;
          $post->visibility     = $request->visibility??'public';
          $post->updated_at     = gmdate('Y-m-d H:i:s');
          $post->save();

          $post_id = $post->id;

          $peoples = [];
          if($request->peoples != ''){
            $peoples = explode(",",$request->peoples);
          }
          $tag_users = [];
          if(!empty($peoples)){
            foreach($peoples as $people){
              if($people){
                $tag_users[] = [
                  'user_id'  => $people,
                  'post_id'  => $post_id
                ];
              }
            }
            if(!empty($tag_users)){
              PostUsers::Where(['post_id'=>$post_id])->delete();
              PostUsers::insert($tag_users);
            }
          }
          DB::commit();
          $status = "1";
          $message = "post added Successfully";
          $data  = Post::with('post_users','post_users.user','user')->find($post_id);
          $o_data = $this->process_post_data($data);



          if( config('global.server_mode') == 'local'){
            \Artisan::call('send_nottification:post '.$post_id);
            \Artisan::call('firebase:save_post '.$post_id);
          }else{
            exec("php ".base_path()."/artisan send_nottification:post ".$post_id." > /dev/null 2>&1 & ");
            exec("php ".base_path()."/artisan firebase:save_post ".$post_id." > /dev/null 2>&1 & ");
          }


        }catch (\Exception $e) {
            DB::rollback();
            $message = "Transaction Faild: ".$e->getMessage();
        }
      }
      return response()->json(['status' => $status, 'error' => $errors, 'message' => $message, 'oData' => $o_data], 200);
    }

    public function like_dislike(REQUEST $request){
      $status   = "0";
      $message  = "";
      $o_data   = [];
      $errors   = [];

      $validator = Validator::make($request->all(), [
          'access_token' => 'required',
          'post_id' => 'required|numeric'
      ]);

      if ($validator->fails()) {
          $status = "0";
          $message = "Validation error occured";
          $errors = $validator->messages();
      }else{
        $user_id = $this->validateAccesToken($request->access_token);
        $post_id = $request->post_id;
        $check_exist = PostLikes::where(['post_id'=>$post_id,'user_id'=>$user_id])->get();
        if($check_exist->count() > 0){
          if( config('global.server_mode') == 'local'){
            \Artisan::call('firebase:post_reaction '.$check_exist->first()->id.' dislike');
          }else{
            exec("php ".base_path()."/artisan firebase:post_reaction ".$check_exist->first()->id." dislike > /dev/null 2>&1 & ");
          }
          PostLikes::where(['post_id'=>$post_id,'user_id'=>$user_id])->delete();
          $status = "1";
          $message = "disliked";
        }else{
          $like = new PostLikes();
          $like->post_id = $post_id;
          $like->user_id = $user_id;
          $like->created_at =  gmdate('Y-m-d H:i:s');
          $like->save();
          if($like->id >0){
            $status = "1";
            $message = "liked";
            if( config('global.server_mode') == 'local'){
              \Artisan::call('send_nottification:post_like '.$like->id);
              \Artisan::call('firebase:post_reaction '.$like->id.' like');
            }else{
              exec("php ".base_path()."/artisan send_nottification:post_like ".$like->id." > /dev/null 2>&1 & ");
              exec("php ".base_path()."/artisan firebase:post_reaction ".$like->id." like > /dev/null 2>&1 & ");
            }
          }else{
            $message = "faild to like";
          }
        }
      }
      return response()->json(['status' => $status, 'error' => $errors, 'message' => $message, 'oData' => $o_data], 200);
    }

    public function post_comment(REQUEST $request){
      $status   = "0";
      $message  = "";
      $o_data   = [];
      $errors   = [];

      $validator = Validator::make($request->all(), [
          'access_token' => 'required',
          'post_id' => 'required|numeric',
          'comment' => 'required',
          'parent_id'=> 'numeric',
          'comment_id'=> 'numeric'
      ]);

      if ($validator->fails()) {
          $status = "0";
          $message = "Validation error occured";
          $errors = $validator->messages();
      }else{
        $user_id = $this->validateAccesToken($request->access_token);
        $post_id = $request->post_id;
        $comment_id = $request->comment_id;
        $parent_id  = $request->parent_id;
        $comment_text    = $request->comment;
        $taged_peoples = $request->taged_peoples;

        $post_data = Post::find($post_id);
        if($comment_id > 0){
          $comment = PostComment::find($comment_id);

        }else{
          $comment = new PostComment();
          $comment->post_id = $post_id;
          $comment->parent_id = $parent_id;
          $comment->user_id   = $user_id;
          $comment->created_at = gmdate('Y-m-d H:i:s');
        }
          $comment->comment = $comment_text;
          $comment->updated_at = gmdate('Y-m-d H:i:s');
          $comment->save();
          $comment_id = $id = $comment->id;

          $peoples = explode(",",$taged_peoples);
          $taged_list = [];
          foreach($peoples as $people){
            if($people){
              $taged_list[] = [
                'comment_id' => $id,
                'user_id'    => $people
              ];
            }
          }
          if(!empty($taged_list)){
            CommentTagedUsers::where(['comment_id'=>$id])->delete();
            CommentTagedUsers::insert($taged_list);
          }

          $data = PostComment::with('post','post.user','taged_users.user')->where(['id'=>$id])->get()->first();
          $o_data = $this->process_comment_data($data);



          if( config('global.server_mode') == 'local'){
            \Artisan::call('send_nottification:comment '.$comment_id);
            \Artisan::call('firebase:save_comment '.$comment_id);
          }else{
            exec("php ".base_path()."/artisan send_nottification:comment ".$comment_id." > /dev/null 2>&1 & ");
            exec("php ".base_path()."/artisan firebase:save_comment ".$comment_id." > /dev/null 2>&1 & ");
          }

      }
      return response()->json(['status' => $status, 'error' => $errors, 'message' => $message, 'oData' => $o_data], 200);
    }
    public function comment_like_dislike(REQUEST $request){
      $status   = "0";
      $message  = "";
      $o_data   = [];
      $errors   = [];

      $validator = Validator::make($request->all(), [
          'access_token' => 'required',
          'comment_id' => 'required|numeric'
      ]);

      if ($validator->fails()) {
          $status = "0";
          $message = "Validation error occured";
          $errors = $validator->messages();
      }else{
        $user_id = $this->validateAccesToken($request->access_token);
        $comment_id = $request->comment_id;
        $check_exist = CommentLikes::where(['comment_id'=>$comment_id,'user_id'=>$user_id])->get();
        if($check_exist->count() > 0){
          if( config('global.server_mode') == 'local'){
            \Artisan::call('firebase:comment_reaction '.$check_exist->first()->id.' dislike');
          }else{
            exec("php ".base_path()."/artisan firebase:comment_reaction ".$check_exist->first()->id." dislike > /dev/null 2>&1 & ");
          }
          CommentLikes::where(['comment_id'=>$comment_id,'user_id'=>$user_id])->delete();
          $status = "1";
          $message = "disliked";
        }else{
          $like = new CommentLikes();
          $like->comment_id = $comment_id;
          $like->user_id = $user_id;
          $like->created_at = gmdate('Y-m-d H:i:s');
          $like->save();
          if($like->id >0){
            $status = "1";
            $message = "liked";
            if( config('global.server_mode') == 'local'){
              \Artisan::call('send_nottification:comment_like '.$like->id);
              \Artisan::call('firebase:comment_reaction '.$like->id.' like');
            }else{
              exec("php ".base_path()."/artisan send_nottification:comment_like ".$like->id." > /dev/null 2>&1 & ");
              exec("php ".base_path()."/artisan firebase:comment_reaction ".$like->id." like > /dev/null 2>&1 & ");
            }
          }else{
            $message = "faild to like";
          }
        }
      }
      return response()->json(['status' => $status, 'error' => $errors, 'message' => $message, 'oData' => $o_data], 200);
    }
    public function save_unsave_post(REQUEST $request){
      $status   = "0";
      $message  = "";
      $o_data   = [];
      $errors   = [];

      $validator = Validator::make($request->all(), [
          'access_token' => 'required',
          'post_id' => 'required|numeric'
      ]);

      if ($validator->fails()) {
          $status = "0";
          $message = "Validation error occured";
          $errors = $validator->messages();
      }else{
        $user_id = $this->validateAccesToken($request->access_token);
        $post_id = $request->post_id;
        $check_exist = PostSave::where(['post_id'=>$post_id,'user_id'=>$user_id])->get();
        if($check_exist->count() > 0){
          PostSave::where(['post_id'=>$post_id,'user_id'=>$user_id])->delete();
          $status = "1";
          $message = "disliked";
        }else{
          $like = new PostSave();
          $like->post_id = $post_id;
          $like->user_id = $user_id;
          $like->created_at =  gmdate('Y-m-d H:i:s');
          $like->save();
          if($like->id >0){
            $status = "1";
            $message = "saved";

          }else{
            $message = "faild to save";
          }
        }
      }
      return response()->json(['status' => $status, 'error' => $errors, 'message' => $message, 'oData' => $o_data], 200);
    }
    public function get_user_posts(REQUEST $request){
      $status   = "0";
      $message  = "";
      $o_data   = [];
      $errors   = [];

      $validator = Validator::make($request->all(), [
          'access_token' => 'required',
          'user_id' => 'required|numeric',
          'file_type'=>'numeric',
          'include_inactive'=>'numeric'
      ]);

      if ($validator->fails()) {
          $status = "0";
          $message = "Validation error occured";
          $errors = $validator->messages();
      }else{
        $login_user_id = $this->validateAccesToken($request->access_token);
        $user_id       = $request->user_id;
        $page = (int)$request->page??1;
        $limit= 20;
        $offset = ($page - 1) * $limit;
        $file_type = $request->file_type;
        $include_inactive = $request->include_inactive??0;
        $search_result = Post::where(['user_id'=>$user_id]);
        if($file_type > 0){
          $search_result = $search_result->where(['file_type'=>$file_type]);
        }
        if(!$include_inactive){
          $search_result=$search_result->where(['active'=>1]);
        }
        $search_result = $search_result->orderBy('id','desc');
        $search_result = $search_result->skip($offset)->take($limit)->get();
        if($search_result->count() > 0){
          $status = "1";
          $message = "Data fetched Successfully";
          $o_data = $search_result->toArray();
          $o_data = convert_all_elements_to_string($o_data);
        }else{
          $message = "no data to show";
        }
      }
      return response()->json(['status' => $status, 'error' => $errors, 'message' => $message, 'oData' => $o_data], 200);
    }
    public function get_saved_posts(REQUEST $request){
      $status   = "0";
      $message  = "";
      $o_data   = [];
      $errors   = [];

      $validator = Validator::make($request->all(), [
          'access_token' => 'required',
          'user_id' => 'required|numeric'
      ]);

      if ($validator->fails()) {
          $status = "0";
          $message = "Validation error occured";
          $errors = $validator->messages();
      }else{
        $login_user_id = $this->validateAccesToken($request->access_token);
        $user_id       = $request->user_id;
        $page = (int)$request->page??1;
        $limit= 20;
        $offset = ($page - 1) * $limit;
        $file_type = $request->file_type;
        $include_inactive = $request->include_inactive??0;
        $search_result = PostSave::with('post')->where(['user_id'=>$user_id]);

        $search_result = $search_result->orderBy('id','desc');
        $search_result = $search_result->skip($offset)->take($limit)->get();
        if($search_result->count() > 0){
          $status = "1";
          $message = "Data fetched Successfully";
          $o_data = $search_result->toArray();
          $o_data = convert_all_elements_to_string($o_data);
        }else{
          $message = "no data to show";
        }
      }
      return response()->json(['status' => $status, 'error' => $errors, 'message' => $message, 'oData' => $o_data], 200);
    }

    public function get_posts(REQUEST $request){
      $status   = "0";
      $message  = "";
      $o_data   = [];
      $errors   = [];

      $validator = Validator::make($request->all(), [
          'access_token' => 'required',
          'file_type'=>'numeric',
          'include_inactive'=>'numeric'
      ]);

      if ($validator->fails()) {
          $status = "0";
          $message = "Validation error occured";
          $errors = $validator->messages();
      }else{
        $login_user_id = $this->validateAccesToken($request->access_token);
        $user_id       = $request->user_id;
        $page = (int)$request->page??1;
        $limit= 20;
        $offset = ($page - 1) * $limit;
        $file_type = $request->file_type;
        $include_inactive = $request->include_inactive??0;
        $search_result = Post::with(['user','comments'=>function($q){
          $q->latest()->limit(1)->get()->first();
        }])->withCount(['comments','likes']);
        if($file_type > 0){
          $search_result = $search_result->where(['file_type'=>$file_type]);
        }
        $search_result = $search_result->where(['active'=>1]);
        $search_result = $search_result->addSelect(['liked_by_user' => PostLikes::select('id')
            ->where('user_id', $login_user_id)
            ->whereColumn('post_id', 'posts.id')
        ]);
        $search_result = $search_result->addSelect(['saved_by_user' => PostSave::select('id')
            ->where('user_id', $login_user_id)
            ->whereColumn('post_id', 'posts.id')
        ]);
        // $search_result = $search_result->whereHas('likes', function ($query) use ($user_id) {
        //     $query->where('user_id', '=', $user_id);
        // });
        $search_result = $search_result->orderBy('id','desc');
        //echo $search_result->toSql();
        $search_result = $search_result->skip($offset)->take($limit)->get();
        if($search_result->count() > 0){
          $status = "1";
          $message = "Data fetched Successfully";
          $list = $search_result;
          foreach($list as $key=>$value){
            $o_data[] = $this->process_post_data($value);
          }

        }else{
          $message = "no data to show";
        }
      }
      return response()->json(['status' => $status, 'error' => $errors, 'message' => $message, 'oData' => $o_data], 200);
    }

    public function remove_post(REQUEST $request){
      $status   = "0";
      $message  = "";
      $o_data   = [];
      $errors   = [];

      $validator = Validator::make($request->all(), [
          'access_token' => 'required',
          'post_id' => 'required|numeric'
      ]);

      if ($validator->fails()) {
          $status = "0";
          $message = "Validation error occured";
          $errors = $validator->messages();
      }else{
        $user_id = $this->validateAccesToken($request->access_token);
        $post_id = $request->post_id;

        $post = Post::find($post_id);
        if($post->user_id == $user_id){
          $post->active = 0;
          $post->save();
          $status = "1";
          $message = "post removed Successfully";
          $fb_user_refrence = $this->database->getReference('SocialPosts/'.$post->post_firebase_node_id.'/')
              ->update(['active' => "0"]);
        }else{
          $message = "You dont have permission to delete this post";
        }
      }
      return response()->json(['status' => $status, 'error' => $errors, 'message' => $message, 'oData' => $o_data], 200);
    }
  }
