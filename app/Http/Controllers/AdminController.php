<?php

namespace App\Http\Controllers;

use App\Model\Admin\Brand;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Admin;
class AdminController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = date('d-m-y');
        $today = DB::table('orders')->where('date',$date)->sum('total');
      ####################################
        $month = date('F');
        $month = DB::table('orders')->where('month',$month)->sum('total');
      ################################
        $year = date('Y');
        $year = DB::table('orders')->where('year',$year)->sum('total');
      ##################################
        $delevery = DB::table('orders')->where('date',$date)->where('status',3)->sum('total');
        $return = DB::table('orders')->where('return_order',2)->sum('total');
        $product = DB::table('products')->get();
//        $brand = DB::table('brands')->get();
        $brand = Brand::get();
//        $user = DB::table('users')->get();
        $user = User::get();
        $allData =['today','month','year','delevery','return','product','brand','user'];
        return view('admin.home',compact($allData));
    }

    public function ChangePassword()
    {
        return view('admin.auth.passwordchange');
    }

    public function Update_pass(Request $request)
    {
      $password=Auth::user()->password;
      $oldpass=$request->oldpass;
      $newpass=$request->password;
      $confirm=$request->password_confirmation;
      if (Hash::check($oldpass,$password)) {
           if ($newpass === $confirm) {
                      $user=Admin::find(Auth::id());
                      $user->password=Hash::make($request->password);
                      $user->save();
                      Auth::logout();
                      $notification=array(
                        'messege'=>'Password Changed Successfully ! Now Login with Your New Password',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('admin.login')->with($notification);
                 }else{
                     $notification=array(
                        'messege'=>'New password and Confirm Password not matched!',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);
                 }
      }else{
        $notification=array(
                'messege'=>'Old Password not matched!',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
      }
    }

    public function logout()
    {
        Auth::logout();
            $notification=array(
                'messege'=>'Successfully Logout',
                'alert-type'=>'success'
                 );
             return Redirect()->route('admin.login')->with($notification);
    }

}
