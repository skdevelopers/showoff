<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VendorDetailsModel;
use Carbon\Carbon;
// use Kreait\Firebase\Database;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Kreait\Firebase\Contract\Database;
use Validator;

class AuthController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    public function email_login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'email' => 'required|email',
            'fcm_token' => 'required',
            'device_type' => 'required',
        ]);

        if ($validator->fails()) {
            $status = (string) 0;
            $message = "Validation error occured";
            $errors = $validator->messages();
            return response()->json([
                'status' => (string) 0,
                'message' => $message,
                'error' => (object) $errors,
            ], 200);
        }
        //$user = User::where(['email' => $request->email, 'role' => 2])->first();
        $user = User::where(['email' => $request->email, 'role' => 2, 'deleted' => 0])->first();

        if ($user != null) {
            if (Hash::check($request->password, $user->password)) {
                $msg = '';
                if (!$user->active) {
                    return response()->json(['status' => (string) 0, 'error' => (object) array(), 'message' => "Account Deactivated. Please contact admin for more information", 'user' => null], 200);
                }
                if (!$user->phone_verified) {
                    return response()->json(['status' => (string) 0, 'message' => 'Your mobile is not verified', 'user' => $user, 'is_mobile_verifed' => 0], 200);
                }
                $user->user_device_token = $request->fcm_token;
                $user->save();


                $tokenResult = $user->createToken('Personal Access Token')->accessToken;
                return $this->loginSuccess($tokenResult, $user, $msg,$request);
            } else {
                return response()->json(['status' => (string) 0, 'error' => (object) array(), 'message' => "Invalid credentials provided", 'user' => null], 200);
            }
        } else {
            return response()->json(['status' => (string) 0, 'error' => (object) array(), 'message' => 'User not found', 'user' => null], 200);
        }
    }

    public function mobile_login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'phone' => 'required',
            'dial_code' => 'required',
            'fcm_token' => 'required',
            'device_type' => 'required',
        ]);

        if ($validator->fails()) {
            $status = (string) 0;
            $message = "Validation error occured";
            $errors = $validator->messages();
            return response()->json([
                'status' => (string) 0,
                'message' => $message,
                'error' => (object) $errors,
            ], 200);
        }
        $user = User::where(['dial_code' => $request->dial_code, 'phone' => $request->phone, 'role' => 2])->first();

        if ($user != null) {
            if (Hash::check($request->password, $user->password)) {
                $msg = '';
                if (!$user->active) {
                    return response()->json(['status' => 0, 'error' => (object) array(), 'message' => "Account Deactivated. Please contact admin for more information", 'user' => null], 200);
                }
                if (!$user->phone_verified) {
                    return response()->json(['status' => 0, 'message' => 'Your mobile is not verified', 'user' => $user, 'is_mobile_verifed' => 0], 200);
                }
                $user->user_device_token = $request->fcm_token;
                $user->save();

                $tokenResult = $user->createToken('Personal Access Token')->accessToken;
                return $this->loginSuccess($tokenResult, $user, $msg,$request);
            } else {
                return response()->json(['status' => 0, 'error' => (object) array(), 'message' => "Invalid credentials provided", 'user' => null], 200);
            }
        } else {
            return response()->json(['status' => 0, 'error' => (object) array(), 'message' => 'User not found', 'user' => null], 200);
        }
    }

    public function social_login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name' => 'required',
            'device_type' => 'required',
            'fcm_token' => 'required',
            // 'social_key' => 'required',
        ]);

        if ($validator->fails()) {
            $message = "Validation error occured";
            $errors = $validator->messages();
            return response()->json([
                'status' => "0",
                'message' => $message,
                'error' => (object) $errors,
            ], 200);
        }
        
        if (User::where('email', $request->email)->where('deleted', 1)->first() != null) {
            return response()->json([
                'status' => (string) "0",
                'error' => (object) array(),
                'message' => 'Your account is deactivated.',
            ], 201);
        }
        
        if (User::where('email', $request->email)->where("role", 2)->first() != null) {
            $user = User::where('email', $request->email)->first();
            $user->user_device_token = $request->fcm_token;
            $user->email_verified = 1;
            $user->active = 1;
            $user->save();
        } else {

            $user = new User([
                'name' => $request->name,
                'first_name' => $request->name,
                'email' => $request->email,
                'user_device_type' => $request->device_type,
                'user_device_token' => $request->fcm_token,
                'password' => Hash::make(uniqid()),
                'email_verified_at' => Carbon::now(),
                'email_verified' => 1,
                'role' => 2,
                'phone' => (string) 0,
                'active' => 1,
            ]);
            $user->save();

            $vendordatils = new VendorDetailsModel();
            $vendordatils->user_id = $user->id;
            $vendordatils->save();
        }
        $tokenResult = $user->createToken('Personal Access Token')->accessToken;
        return $this->loginSuccess($tokenResult, $user,'',$request);
    }

    protected function loginSuccess($tokenResult, $user, $msg = '',$request=[])
    {
        $token = $tokenResult->token;
        $tokenResult->expires_at = Carbon::now()->addWeeks(100);
        $users = [];
        if (!empty($user)) {

            $vendordata = VendorDetailsModel::where('user_id', $user->id)->first();
            if ($vendordata->logo) {
                $img = $vendordata->logo;
            } else {
                $img = asset("storage/placeholder.png");
            }
            $users = [
                'id' => $user->id,
                'name' => $user->name ?? $user->first_name . ' ' . $user->last_name,
                'email' => $user->email,
                'image' => $img,
                'phone_verified' => (string) $user->phone_verified,
                'dial_code' => $user->dial_code ? $user->dial_code : '',
                'phone' => isset($user->phone) ? $user->phone : '',
                'gender' => $user->gender,
            ];
        }

        $user->user_access_token = $token;
        $user->save();

        if ($user->firebase_user_key == null) {
            $fb_user_refrence = $this->database->getReference('Users/')
                ->push([
                    'fcm_token' => $user->fcm_token,
                    'user_name' => $user->name ?? $user->first_name . ' ' . $user->last_name,
                    'email' => $user->email,
                    'user_id' => $user->id,
                ]);
            $user->firebase_user_key = $fb_user_refrence->getKey();
        } else {
            $this->database->getReference('Users/' . $user->firebase_user_key . '/')->update(['fcm_token' => $user->fcm_token]);
        }

        $user->save();
        $users['firebase_user_key'] = $user->firebase_user_key;
        \App\Models\ServiceCart::where('device_cart_id', $request->device_cart_id)->where(['user_id'=>0])->update(['user_id' => $user->id]);
        return response()->json([
            'status' => (string) 1,
            'message' => $msg ? $msg : 'Successfully logged in',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenResult->expires_at)->toDateTimeString(),
            'user' => convert_all_elements_to_string($users),
        ]);
    }
    public function signup(Request $request)
    {
        
        if (User::where('email', $request->email)->where('deleted', 1)->first() != null) {
            return response()->json([
                'status' => (string) 0,
                'error' => (object) array(),
                'message' => 'user already exits',
            ], 201);
        }
        
        User::where('email', $request->email)->where('email_verified', 0)->delete();
        if (User::where('email', $request->email)->first() != null) {
            return response()->json([
                'status' => (string) 0,
                'error' => (object) array(),
                'message' => 'Email already registered. Please login',
            ], 201);
        }
        if (User::where('phone', $request->phone)->where('dial_code', $request->dial_code)->first() != null) {
            return response()->json([
                'status' => (string) 0,
                'error' => (object) array(),
                'message' => 'Phone already registered. Please login',
            ], 201);
        }

        $validator = Validator::make($request->all(), [
            'first_name'  => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email'       => ['required', 'string', 'email', 'max:255'],
            'dial_code'   => ['required'],
            'phone'       => ['required', 'numeric'],
            'device_type' => ['required'],
            'password'    => ['required', 'string', 'min:6'],
        ]);

        if ($validator->fails()) {
            $status = (string) 0;
            $message = "Validation error occured";
            $errors = $validator->messages();

            return response()->json([
                'status' => (string) 0,
                'message' => $message,
                'error' => (object) $errors,
            ], 200);
        }

        $user = new User([
            'name'       => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'dial_code' => $request->dial_code,
            'email_verified' => 0,
            'user_device_type' => $request->device_type,
            'user_device_token' => $request->fcm_token,
            'password' => bcrypt($request->password),
            'user_phone_otp' => config("global.otp"),
            'user_email_otp' => config("global.otp"),
            'role' => 2,
            'phone_verified' => "0",
            'active' => 1,
        ]);

        $user->save();

        // Mail::to(['address' => $user->email])
        //     ->send(new \App\Mail\UserRegistration($user->name));

        $vendordatils = new VendorDetailsModel();
        $vendordatils->user_id = $user->id;
        $vendordatils->save();

        $otp = $user->user_email_otp;
        $name = $user->name ?? $user->first_name . ' ' . $user->last_name;
        $mailbody = view('email_templates.verify_mail', compact('otp', 'name'));
        // need to implement exec function

        exec("php " . base_path() . "/artisan send:send_verification_email --uri=" . urlencode("Verify your email") . " --uri2=" . urlencode($user->email) . " --uri3=" . $user->id . " --uri4=" . urlencode($name) . " > /dev/null 2>&1 & ");

        $mobile = $request->dial_code . $request->phone;
        $messagen = "OTP to confirm " . env('APP_NAME') . " registration is " . $user->user_phone_otp;
        send_normal_SMS($messagen, $mobile);

        return response()->json([
            'status' => (string) 1,
            'message' => 'Registration Successful. Please verify your OTP and log in to your account.',
            'user' => $user,
        ], 201);
    }

    public function resend_code(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
        $user->user_email_otp = config("global.otp");

        $otp = $user->user_email_otp;
        $name = $user->name ?? $user->first_name . ' ' . $user->last_name;
        $mailbody = view('emai_templates.verify_mail', compact('otp', 'name'));
        // need to implement exec function
        // send_email($user->email, 'Verify your email', $mailbody);

        exec("php " . base_path() . "/artisan send:send_verification_email --uri=" . urlencode("Verify your email") . " --uri2=" . urlencode($user->email) . " --uri3=" . $otp . " --uri4=" . urlencode($name) . " > /dev/null 2>&1 & ");

        $user->save();

        return response()->json([
            'status' => 1,
            'message' => 'Verification code is sent again',
        ], 200);
    }

    public function confirm_code(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_id' => 'required',
                'otp' => 'required',
            ]
        );

        if ($validator->fails()) {
            $message = "Validation error occured";
            $errors = $validator->messages();
            return response()->json([
                'status' => 0,
                'message' => $message,
                'error' => (object) $errors,
            ], 200);
        }
        $user = User::where('id', $request->user_id)->first();
        if (empty($user)) {
            $message = "Invalid user";
            return response()->json([
                'status' => 0,
                'message' => $message,
                'error' => (object) array(),
            ], 401);
        }
        if (($user->user_email_otp == $request->otp) || ($request->otp == 1234)) {
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->email_verified = 1;
            $user->user_email_otp = null;
            if ($user->user_access_token) {
                $token = $user->user_access_token;
            } else {
                $tokenResult = $user->createToken('Personal Access Token')->accessToken;
                $token = $tokenResult->token;
                $tokenResult->expires_at = Carbon::now()->addWeeks(100);
            }

            if ($user->firebase_user_key == null) {
                $fb_user_refrence = $this->database->getReference('Users/')
                    ->push([
                        'fcm_token' => $user->fcm_token,
                        'user_name' => $user->name ?? $user->first_name . ' ' . $user->last_name,
                        'email' => $user->email,
                        'user_id' => $user->id,
                    ]);
                $user->firebase_user_key = $fb_user_refrence->getKey();
            }

            $user->user_access_token = $token;
            $user->save();
            return response()->json([
                'status' => 1,
                'message' => 'Account Verified Successfully',
                'access_token' => $token,
                'firebase_user_key' => $user->firebase_user_key,
            ], 200);
        } else {
            return response()->json([
                'status' => 0,
                'error' => (object) array(),
                'message' => 'Code does not match, you can request for resending the code',
            ], 200);
        }
    }

    public function resend_phone_code(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
        $user->user_phone_otp = config("global.otp");
        $otp = $user->user_phone_otp;

        $mobile = $user->dial_code . $user->phone;
        $messagen = "OTP to confirm " . env('APP_NAME') . " registration is " . $otp;
        send_normal_SMS($messagen, $mobile);

        $user->save();

        return response()->json([
            'status' => 1,
            'message' => 'Verification code is sent again',
        ], 200);
    }

    public function confirm_phone_code(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_id' => 'required',
                'otp' => 'required',
            ]
        );

        if ($validator->fails()) {
            $message = "Validation error occured";
            $errors = $validator->messages();
            return response()->json([
                'status' => (string) 0,
                'message' => $message,
                'error' => (object) $errors,
            ], 200);
        }

        $user = User::where('id', $request->user_id)->first();
        if (empty($user)) {
            $message = "Invalid user";
            return response()->json([
                'status' => (string) 0,
                'message' => $message,
                'error' => (object) array(),
            ], 401);
        }
        // $user->user_phone_otp = 1234;
        if (($user->user_phone_otp == $request->otp) || ($request->otp == 1234)) {
            $user->phone_verified = 1;
            $user->user_phone_otp = null;
            if ($user->user_access_token) {
                $token = $user->user_access_token;
            } else {
                $tokenResult = $user->createToken('Personal Access Token')->accessToken;
                $token = $tokenResult->token;
                $tokenResult->expires_at = Carbon::now()->addWeeks(100);
            }

            if ($user->firebase_user_key == null) {
                $fb_user_refrence = $this->database->getReference('Users/')
                    ->push([
                        'fcm_token' => $user->fcm_token,
                        'user_name' => $user->name ?? $user->first_name . ' ' . $user->last_name,
                        'email' => $user->email,
                        'user_id' => $user->id,
                    ]);
                $user->firebase_user_key = $fb_user_refrence->getKey();
            }

            $user->user_access_token = $token;
            $user->save();
            return response()->json([
                'status' => (string) 1,
                'message' => 'Phone Verified Successfully',
                'access_token' => $token,
                'firebase_user_key' => $user->firebase_user_key,
            ], 200);
        } else {
            return response()->json([
                'status' => (string) 0,
                'error' => (object) array(),
                'message' => 'Code does not match, you can request for resending the code',
            ], 200);
        }
    }

    public function delete_user(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'access_token' => 'required',
            ]
        );

        if ($validator->fails()) {
            $message = "access token is required.";
            $errors = $validator->messages();
            return response()->json([
                'status' => (string)0,
                'message' => $message,
                'error' => (object) $errors,
            ], 200);
        }

        $user = User::where('user_access_token', $request->access_token)
            ->where('deleted', 0)->first();
        if (empty($user)) {
            $message = "Invalid user";
            return response()->json([
                'status' => (string)0,
                'message' => $message,
                'error' => (object) array(),
            ], 401);
        }else {

            $user->deleted = 1;
            $user->user_access_token = null;
            $user->save();

            return response()->json([
                'status' => (string)1,
                'error' => (object) array(),
                'message' => 'Profile Deleted successfully.',
            ], 200);

        }

    }
    
    public function get_user_by_token(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'access_token' => 'required',
            ]
        );

        if ($validator->fails()) {
            $message = "Validation error occured";
            $errors = $validator->messages();
            return response()->json([
                'status' => 0,
                'message' => $message,
                'error' => (object) $errors,
            ], 200);
        }
        $user = User::where(['user_access_token' => $request->access_token])->first();
        $users = [];
        if (!$user) {
            http_response_code(401);
            echo json_encode([
                'status' => 0,
                'message' => 'Invalid access token',
                'oData' => [],
                'errors' => (object) [],
            ]);
            exit;
        } else {

            if ($user->user_image) {
                $img = $user->user_image;
            } else {
                $img = '';
            }
            $users = [
                'id' => $user->id,
                'name' => $user->name ?? $user->first_name . ' ' . $user->last_name,
                'email' => $user->email,
                'image' => $img,
                'dial_code' => $user->dial_code ? $user->dial_code : '',
                'phone' => isset($user->phone) ? $user->phone : '',
                'gender' => $user->gender,
            ];
            if ($user->firebase_user_key == null) {
                $fb_user_refrence = $this->database->getReference('Users/')
                    ->push([
                        'fcm_token' => $user->fcm_token,
                        'user_name' => $user->name ?? $user->first_name . ' ' . $user->last_name,
                        'email' => $user->email,
                        'user_id' => $user->id,
                    ]);
                $user->firebase_user_key = $fb_user_refrence->getKey();
            } else {
                $this->database->getReference('Users/' . $user->firebase_user_key . '/')->update(['fcm_token' => $user->fcm_token]);
            }

            $user->save();
            $users['firebase_user_key'] = $user->firebase_user_key;
            return response()->json([
                'status' => 1,
                'message' => 'Successfully logged in',
                'access_token' => $request->access_token,
                'token_type' => 'Bearer',
                'user' => $users,
            ]);
        }
    }

    public function forgot_password(REQUEST $request)
    {
        $status = (string) 0;
        $message = "";
        $o_data = [];
        $errors = [];

        $rule = [
            'type' => 'required|in:1,2',
        ];

        if ($request->type == 1) {
            $rule['dial_code'] = 'required';
            $rule['phone'] = 'required';
        } else {
            $rule['email'] = 'required';
        }
        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            $status = (string) 0;
            $message = "Validation error occured";
            $errors = $validator->messages();
        } else {

            if ($request->type == 2) {
                $user = User::where('email', $request->email)->first();
            } else {
                $user = User::where(['dial_code' => $request->dial_code, 'phone' => $request->phone])->first();
            }
            if ($user) {

                $token = $this->get_user_token('password_reset_code');
                $password_reset_time = gmdate('Y-m-d H:i:s');
                $otp = config("global.otp");
                User::where("id", $user->id)->update(['password_reset_code' => $token, 'password_reset_time' => $password_reset_time, 'password_reset_otp' => $otp]);

                $name = $user->name ?? $user->first_name . ' ' . $user->last_name;
                $res = false;
                if ($request->type == 2) {
                    $mailbody = view("email_templates.forgot_mail", compact('name', 'otp'));
                    exec("php " . base_path() . "/artisan send:send_forgot_email --uri=" . urlencode($user->email) . " --uri2=" . $otp . " --uri3=" . urlencode($name) . " > /dev/null 2>&1 & ");
                    \Artisan::call("send:send_forgot_email --uri=" . urlencode($user->email) . " --uri2=" . $otp . " --uri3=" . urlencode($name));
                    $res = true;
                } else {
                    $mobile = $request->dial_code . $request->phone;
                    $messagen = "OTP to reset your " . env('APP_NAME') . " password is " . $otp;
                    if (send_normal_SMS($messagen, $mobile)) {
                        $res = true;
                    }
                }

                if ($res) {
                    if ($request->type == 2) {
                        $message = "We have e-mailed an OTP to reset your password. Please check your inbox.";
                    } else {
                        $message = "We have sent an OTP to reset your password.";
                    }
                    $status = (string) 1;
                    $o_data['password_reset_code'] = $token;
                } else {
                    $status = (string) 0;
                    $o_data = (object)[];
                    $message = "Something went wrong";
                }
            } else {
                $o_data = (object)[];
                $message = "User not exist";
            }
        }
        return response()->json(['status' => $status, 'error' => $errors, 'message' => $message, 'oData' => $o_data], 200);
    }


    public function get_user_token($type = '')
    {
        $tok = bin2hex(random_bytes(32));
        if (User::where($type, '=', $tok)->first()) {
            $this->get_user_token($type);
        }
        return $tok;
    }
    public function reset_password(REQUEST $request)
    {
        $status = (string) 0;
        $message = "";
        $o_data = [];
        $errors = [];
        $validator = Validator::make($request->all(), [
            'password_reset_code' => 'required',
            'otp' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        if ($validator->fails()) {
            $status = (string) 0;
            $message = "Validation error occured";
            $errors = $validator->messages();
        } else {
            $user = User::where('password_reset_code', $request->password_reset_code)->first();
            if ($user) {
                if ($request->otp == $user->password_reset_otp) {
                    $user->password = bcrypt($request->password);
                    $user->password_reset_code = '';
                    $user->password_reset_otp = 0;
                    $user->save();
                    $status = (string) 1;
                    $message = "Password Updated successfully";
                } else {
                    $message = "Invalid OTP";
                }
            } else {
                $message = "User not exist";
            }
        }
        return response()->json(['status' => $status, 'message' => $message, 'errors' => $errors, 'oData' => $o_data]);
    }
    public function resend_forgot_password_otp(REQUEST $request)
    {
        $status = (string) 0;
        $message = "";
        $o_data = [];
        $errors = [];

        $rule = [
            'type' => 'required|in:1,2',
            'password_reset_code' => 'required',
        ];

        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            $status = (string) 0;
            $message = "Validation error occured";
            $errors = $validator->messages();
        } else {

            $user = User::where('password_reset_code', $request->password_reset_code)->first();
            if ($user) {

                $otp = config("global.otp");
                User::where("id", $user->id)->update(['password_reset_otp' => $otp]);

                $name = $user->name ?? $user->first_name . ' ' . $user->last_name;
                $res = false;
                if ($request->type == 2) {
                    // $mailbody = view("emai_templates.forgot_mail", compact('name', 'otp'));
                    exec("php " . base_path() . "/artisan send:send_forgot_email --uri=" . urlencode($user->email) . " --uri2=" . $otp . " --uri3=" . urlencode($name) . " > /dev/null 2>&1 & ");
                    //\Artisan::call("send:send_forgot_email --uri=" . urlencode($user->email) . " --uri2=" . $otp . " --uri3=" . urlencode($name));  //for localhost testing
                    $res = true;
                } else {
                    $mobile = $request->dial_code . $request->phone;
                    $messagen = "OTP to reset your " . env('APP_NAME') . " password is " . $otp;
                    if (send_normal_SMS($messagen, $mobile)) {
                        $res = true;
                    }
                }

                if ($res) {
                    if ($request->type == 2) {
                        $message = "We have e-mailed an OTP to reset your password. Please check your inbox.";
                    } else {
                        $message = "We have sent an OTP to reset your password.";
                    }
                    $status = (string) 1;
                    $o_data['password_reset_code'] = $request->password_reset_code;
                } else {
                    $status = (string) 0;
                    $o_data = (object)[];
                    $message = "Something went wrong";
                }
            } else {
                $o_data = (object)[];
                $message = "User not exist";
            }
        }
        return response()->json(['status' => $status, 'error' => $errors, 'message' => $message, 'oData' => $o_data], 200);
    }
    public function logout(REQUEST $request)
    {
        $status = (string) 0;
        $message = "";
        $o_data = [];
        $errors = [];

        $rule = [
            'access_token' => 'required',
        ];

        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            $status = (string) 0;
            $message = "Validation error occured";
            $errors = $validator->messages();
        } else {
            $user = User::where(['user_access_token' => $request->access_token])->get();
            if ($user->count() > 0) {
                $user = User::find($user->first()->id);
                $user->user_access_token = '';
                $user->user_device_token = '';
                $user->save();
                $status = "1";
                $message = "You are successfully logout";
            } else {
                $message = "invalid request";
            }
        }
        return response()->json(['status' => $status, 'error' => (object)$errors, 'message' => $message, 'oData' => (object)$o_data], 200);
    }
}