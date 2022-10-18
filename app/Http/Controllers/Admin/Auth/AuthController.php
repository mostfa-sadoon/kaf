<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Admin;
use Validator;
use Mail;
use Hash;
use Auth;
use Alert;
use Session;
class AuthController extends Controller
{
    //
    // public function __construct(){
    //     $this->middleware('PreventBackHistory');
    // }

    public function login(){
        return view('Admin.Auth.login');
    }
    public function Submitlogin(Request $request){
        //dd($request->all());
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }
        return redirect("/login")->with('error','Login details are not valid');
    }

    public function forgetpassword(){
        return view('Admin.Auth.forgetpassword');
    }

    public function reciveemail(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:admins',
        ]);
        $token = random_int(100000, 999999);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Hash::make($token),
            'created_at' => Carbon::now()
          ]);
          Mail::send('Admin.Auth.forgetpasswordemail', ['token' => $token], function($message) use($request){
            $message->subject('kaf reset password');
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        $email=$request->email;
        session(['email'=>$email]);
        return redirect()->route('admin.sendToken');

    }

    public function sendtoken(){
         return view('Admin.Auth.sendToken');
    }

    public function ressetpassword(Request $request)
    {
        //dd($request->all());
        $token=$request->token;
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:admins',
            'password'=> 'required|min:6|max:50|confirmed',
            'password_confirmation' => 'required|max:50|min:6',
        ]);
        $passwordreset=DB::table('password_resets')
        ->where([
          'email' => $request->email,
        ])->latest()
        ->first();
        //dd($passwordreset);
        $email=$request->email;
        if (Hash::check($token,$passwordreset->token)) {
            // The passwords match...
            $user=Admin::where('email',$passwordreset->email)->first();
            //dd($user);

            $user->update([
                'password'=>Hash::make($request->password)
            ]);
            Alert::success('success', 'تم   تعديل كلمه المرور بنجاح');
            return redirect()->route('admin.login');
        }else{
            $request->session()->flash('errortoken', 'The token is false');
            // session(['email'=>$request->email]);
            return redirect()->back();
         }
    }


    public function signOut(Request $request) {
    //    dd($request->all());
            Session::flush();
            Auth::logout();
            
           return redirect()->route('admin.login');
    }
}
