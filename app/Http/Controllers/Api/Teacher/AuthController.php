<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Teacher;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    use GeneralTrait;

    public function register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'f_name'                => 'required|string|min:3|max:20',
            'l_name'                => 'required|string|min:3|max:20',
            'username'              => 'required|unique:teachers,username',
            'email'                 => 'required|email|unique:teachers,email',
            'phone'                 => 'required|min:6|max:20|unique:teachers,phone',
            'password_confirmation'     => 'required|string|min:6|max:190',
            'password'              => 'required|string|min:6|max:190|confirmed',
            'national_id'           => 'required|unique:teachers,national_id',
            'Bank_account_number'   => 'nullable|string',
            'photo'                 => 'nullable|image'
        ]);
        if ($validate->fails()) {
            $code = $this->returnCodeAccordingToInput($validate);
            return $this->returnValidationError($code, $validate);
        }

        $cover_name = 'default.png';
        if ($request->hasFile('photo')) {
            # Upload New Image & Return its New Name
            $image_name = uploadImage($request->file('photo'), 'assets/images/teachers/');
            # Save New Name in DB
            $cover_name = $image_name;
        }

        $user = new Teacher();
        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->national_id = $request->national_id;
        $user->Bank_account_number = $request->Bank_account_number ?? '';
        $user->photo = $cover_name;
        $user->save();

        $credentials = request(['username', 'password']);

        return $this->tokenization($credentials, $msg = "registered");
    }



    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'username' => 'required|string|max:190',
            'password' => 'required|string|max:190',
        ]);

        if ($validate->fails()) {
            $code = $this->returnCodeAccordingToInput($validate);
            return $this->returnValidationError($code, $validate);
        }

        $credentials = request(['username', 'password']);

        return $this->tokenization($credentials, $msg = "logged_in");
    }



    public function tokenization($credentials, $msg = "logged_in")
    {
        try {
            if (!$token = auth()->guard('teacher')->attempt($credentials)) {
                return $this->returnError('404', __('User not exists.'));
            } else {
                $user = auth()->guard('teacher')->user();
                $user['token'] = $token;
                $user['token_type'] = 'bearer';
                return $this->returnData('user', $user, __($msg));
            }
        } catch (\Throwable $th) {
            return $this->returnError('404', __('try_catch_error'));
        }
    }



    public function logout(Request $request)
    {
        auth()->guard('teacher')->logout();
        JWTAuth::invalidate($request->header('Authorization'));

        return $this->returnSuccessMessage('Successfully logged out');
    }



    public function updateFcmToken(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'fcm_token'   => 'required|min:3',
                'mobile_id'   => 'required|in:0,1'
            ],
            []
        );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }

        $user = auth()->guard('teacher')->user();

        if ($user) {
            $user->fcm_token = $request->fcm_token;
            $user->mobile_id = $request->mobile_id;
            $user->save();

            return $this->returnSuccessMessage("FCM Token & mobile_id have been updated");
        } else {
            return $this->returnError('error', __("user.usernotexist"));
        }
    }





    public function sayHello()
    {
        return auth()->guard('teacher')->user();
        return response()->json('hello teacher');
    }


    public function refresh()
    {
        return $this->respondWithToken(auth()->guard('teacher')->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => null
        ]);
        //auth()->guard('api')->factory()->getTTL() * 60
    }
}
