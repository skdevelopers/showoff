<?php

namespace App\Http\Middleware;

use Closure;
use Validator;

class IsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $status  = "0";
      $message = "";
      $o_data  = [];
      $errors  = [];

      $validator = Validator::make($request->all(),[
            'access_token'      => 'required'
      ]);

      if ($validator->fails()) {
            $status = "0";
            $message = "Session expired";
            $errors = $validator->messages();
            return response()->json(['status'=>$status,'error'=>(object)$errors,'message'=>$message,'oData'=>(object)$o_data]);
      } else {
            $current_user  = \App\Models\User::where('user_access_token',$request->access_token)->get()->first();
            if( $current_user == null ){
              $message =   "Session expired";
                return response()->json(['status' => $status, 'error'=>(object)$errors, 'message' => $message, 'oData' => (object) $o_data], 401);
            }
            $request->request->add(['current_user' => $current_user,'user_id'=>$current_user['id']]);
      }

      return $next($request);
    }
}
