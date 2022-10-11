<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Admin;
use App\Models\Usertype;
use Hash;
Use Alert;

class UserController extends Controller
{
    //
    public function index(){
        $users=User::orderBy('created_at','desc')->paginate(20);
        $types=Usertype::paginate(20);
        $type=1;
        return view('Admin.user.index',compact('users','types','type'));
    }
    public function usertype(Request $request){
       // dd($request->all());
           if($request->user_type==2){
            $users=Teacher::paginate(20);
            $type=$request->user_type;
           }elseif($request->user_type==1){
            $users=User::paginate(20);
            $type=$request->user_type;
           }elseif($request->user_type==3){
            $users=Admin::paginate(20);
            $type=$request->user_type;
           }else{
            return redirect()->back();
           }
           $types=Usertype::paginate(20);
           return view('Admin.user.index',compact('users','types','type'));
    }
        public function searchuser(Request $request){
            // usertype 3 == Admin   usertype 2 == teacher  usertype 1 == student
        if($request->usertype==3){
            $users=Admin::where('username', 'like', '%' . $request->name . '%')->paginate(20);
            $type=3;
        }elseif($request->usertype==1){
            $users=User::where('username', 'like', '%' . $request->name . '%')->paginate(20);
            $type=1;
        }elseif($request->usertype==2){
            $users=Teacher::where('username', 'like', '%' . $request->name . '%')->paginate(20);
            $type=1;
        }else{
            return redirect()->back();
        }
        $types=Usertype::paginate(20);
        return view('Admin.user.index',compact('users','types','type'));
        }
        public function create(){
            $types=Usertype::paginate(20);
            return view('Admin.user.create',compact('types'));
        }
        public function store(Request $request){
            // dd($request->all());
             $request->validate([
                'f_name' => 'required|max:15',
                'l_name' => 'required|max:15',
                'username' => 'required',
                'email'=>'required',
                'password'=> 'required|min:6|max:50|confirmed',
                'password_confirmation' => 'required|max:50|min:6',
                'national_id' => 'required',
                'Bank_account_number' => 'required',
            ]);
            $data=[
                'f_name'=>$request->f_name,
                'l_name'=>$request->l_name,
                'username'=>$request->username,
                'national_id'=>$request->national_id,
                'Bank_account_number'=>$request->Bank_account_number,
                'password'=>Hash::make($request->password),
                ];
            //check of kind of user
            if($request->usertype==1){
                //user is student
                $request->validate([
                    'username' => 'required|unique:users',
                    'email' => 'required|unique:users',
                ]);
                $data['username']=$request->username;
                $data['email']=$request->email;
             //   dd($data);
                User::create($data);
            }elseif($request->usertype==2){
                //user is teacher
                $request->validate([
                    'username' => 'required|unique:teachers',
                    'email' => 'required|unique:teachers',
                ]);
                $data['username']=$request->username;
                $data['email']=$request->email;
                Teacher::create($data);
            }elseif($request->usertype==3){
                //user is Admin
                $request->validate([
                    'username' => 'required|unique:admins',
                    'email' => 'required|unique:admins',
                ]);
                $data['username']=$request->username;
                $data['email']=$request->email;
                Admin::create($data);
            }else{
                return redirect()->back();
            }
            Alert::success('success', 'تم اضافه مستخدم بنجاح');
             return redirect()->route('admin.user');
        }
        public function edit($id,$usertype){
            $types=Usertype::paginate(20);
            if($usertype==1){
               $user= User::find($id);
            }elseif($usertype==2){
               $user= Teacher::find($id);
            }elseif($usertype==3){
                $user= Admin::find($id);
            }else{
                return  redirect()->back();
            }
            return view('Admin.user.edit',compact('types','user'));
        }
        public function update(Request $request){
            //dd($request->all());
            $request->validate([
                'f_name' => 'required|max:15',
                'l_name' => 'required|max:15',
                'username' => 'required',
                'email'=>'required',
                'national_id' => 'required',
                'Bank_account_number' => 'required',
            ]);
            if($request->password){
                $request->validate([
                    'password'=> 'required|min:6|max:50|confirmed',
                    'password_confirmation' => 'max:50|min:6',
                ]);
            }
            $data=[
                'f_name'=>$request->f_name,
                'l_name'=>$request->l_name,
                'username'=>$request->username,
                'national_id'=>$request->national_id,
                'Bank_account_number'=>$request->Bank_account_number,
                'password'=>Hash::make($request->password),
                ];
                if($request->usertype==1){
                    //user is student
                    $request->validate([
                        'username' => 'required|unique:users,username,'.$request->id,
                        'email' => 'required|unique:users,email,'.$request->id,
                    ]);
                    $data['username']=$request->username;
                    $data['email']=$request->email;
                    User::find($request->id)->update();
                }elseif($request->usertype==2){
                    //user is teacher
                    $request->validate([
                        'username' => 'required|unique:teachers',
                        'email' => 'required|unique:teachers',
                    ]);
                    $data['username']=$request->username;
                    $data['email']=$request->email;
                    Teacher::find($request->id)->update();
                }elseif($request->usertype==3){
                    //user is Admin
                    $request->validate([
                        'username' => 'required|unique:admins',
                        'email' => 'required|unique:admins',
                    ]);
                    $data['username']=$request->username;
                    $data['email']=$request->email;
                    Admin::find($request->id)->update();
                }else{
                    return redirect()->back();
                }
                return redirect()->back();
        }
        public function destroy(Request $request){
        //    dd($request->all());
            if($request->usertype==1){
                //user is student
                User::find($request->id)->delete();
            }elseif($request->usertype==2){
                //user is teacher
                Teacher::find($request->id)->delete();
            }elseif($request->usertype==3){
                //user is Admin
                Admin::find($request->id)->delete();
            }else{
                return redirect()->back();
            }
            return redirect()->back();
        }
}
