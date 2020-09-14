<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function changePassword(){
        return view('auth.changepassword');
    }

    public function updateProfile(Request $request){
        $newPassword =$request->password;
        $confirmPassword =$request->password_confirmation;
        if ($newPassword === $confirmPassword) {
            $user=User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
        }else{
            $notification=array(
                'messege'=>'New password and Confirm Password not matched!',
                'alert-type'=>'error'
            );
            return Redirect()->route('password.change')->with($notification);
        }
        $user=User::find(Auth::id());
        $user->phone=$request->phone;
        $user->name=$request->name;
        $user->save();
        $notification=array(
            'messege'=>'Updated Successfully ! Now can Login with Your New Password',
            'alert-type'=>'success'
        );
        return Redirect()->route('password.change')->with($notification);
    }

    public function updatePassword(Request $request)
    {
      $password = Auth::user()->password;
      $oldPassword=$request->oldpass;
      $newpass=$request->password;
      $confirm=$request->password_confirmation;
//      if ($oldpass != null){
          if (Hash::check($oldPassword,$password)) {
              if ($newpass === $confirm) {
                  $user=User::find(Auth::id());
                  $user->password=Hash::make($request->password);
                  $user->save();
                  Auth::logout();
                  $notification=array(
                    'messege'=>'Password Changed Successfully ! Now Login with Your New Password',
                    'alert-type'=>'success'
                     );
                   return Redirect()->route('login')->with($notification);
              }else{
                  $notification=array(
                      'messege'=>'New password and Confirm Password not matched!',
                      'alert-type'=>'error'
                  );
                  return Redirect()->route('password.change')->with($notification);
              }
          }else{
              $notification=array(
                  'messege'=>'Old Password not matched!',
                  'alert-type'=>'error'
              );
              return Redirect()->route('password.change')->with($notification);
          }
//      }else{
            $user=User::find(Auth::id());
            $user->phone=$request->phone;
            $user->name=$request->name;
            $user->save();
            $notification=array(
                'messege'=>'Updated Successfully ! Now can Login with Your New Password',
                'alert-type'=>'success'
            );
            return Redirect()->route('password.change')->with($notification);
      }
//    }

    public function Logout()
    {
        // $logout= Auth::logout();
            Auth::logout();
            $notification=array(
                'messege'=>'Successfully Logout',
                'alert-type'=>'success'
                 );
             return Redirect()->route('login')->with($notification);


    }



}
