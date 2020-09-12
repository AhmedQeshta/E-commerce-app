<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class SettingController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }


 public function SiteSetting(){

   $setting = DB::table('sitesetting')->first();
   return view('admin.setting.site_setting',compact('setting'));

 }
 public function ShowAddSiteSetting(){
   return view('admin.setting.add_site_setting');
 }


 public function UpdateSiteSetting(Request $request){

 	$id = $request->id;

 	$data = array();
 	$data['phone_one'] = $request->phone_one;
 	$data['phone_two'] = $request->phone_two;
 	$data['email'] = $request->email;
 	$data['company_name'] = $request->company_name;
 	$data['company_address'] = $request->company_address;
 	$data['facebook'] = $request->facebook;
 	$data['youtube'] = $request->youtube;
 	$data['instagram'] = $request->instagram;
 	$data['twitter'] = $request->twitter;
 	DB::table('sitesetting')->where('id',$id)->update($data);
 	$notification=array(
            'messege'=>'Site Setting Updated Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);

 }



 public function addSiteSetting(Request $request){


 	$data = array();
 	$data['phone_one'] = $request->phone_one;
 	$data['phone_two'] = $request->phone_two;
 	$data['email'] = $request->email;
 	$data['company_name'] = $request->company_name;
 	$data['company_address'] = $request->company_address;
 	$data['facebook'] = $request->facebook;
 	$data['youtube'] = $request->youtube;
 	$data['instagram'] = $request->instagram;
 	$data['twitter'] = $request->twitter;
 	DB::table('sitesetting')->insert($data);
     $notification=array(
         'messege'=>'Settings Site Added Successfully',
         'alert-type'=>'success'
     );
     return Redirect()->route('admin.site.setting')->with($notification);

 }

     public function ShowAddpaymentSetting(){
         return view('admin.setting.add_payment_setting');
     }

     public function addpaymentSetting(Request $request){
         $data = array();
         $data['vat'] = $request->vat;
         $data['shipping_charge'] = $request->shipping_charge;
         $data['shopname'] = $request->shopname;
         $data['email'] = $request->email;
         $data['phone'] = $request->phone;
         $data['adderss'] = $request->adderss;
         $image = $request->file('logo');
         if ($image) {
             $image_name = date('dmy_H_s_i');
             $ext = strtolower($image->getClientOriginalExtension());
             $image_full_name = $image_name.'.'.$ext;
             $upload_path = 'public/media/logo_settings/';
             $image_url = $upload_path.$image_full_name;
             $success = $image->move($upload_path,$image_full_name);
             $data['logo'] = $image_url;
             $paymentSettings = DB::table('settings')->insert($data);
             $notification=array(
                 'messege'=>'payment Settings Inserted Successfully',
                 'alert-type'=>'success'
             );
             return Redirect()->route('admin.payment.setting.show')->with($notification);
         }else{
             $paymentSettings = DB::table('settings')->insert($data);
             $notification=array(
                 'messege'=>'Its Done',
                 'alert-type'=>'success'
             );
             return Redirect()->route('admin.payment.setting.show')->with($notification);
         }

     }
     public function indexPaymentSetting(){

         $paymentSetting = DB::table('settings')->first();
         return view('admin.setting.payment_setting',compact('paymentSetting'));
     }

     public function updatepaymentSetting(Request $request){
         $id = $request->id;
         $oldlogo = $request->old_logo;

         $data = array();
         $data['vat'] = $request->vat;
         $data['shipping_charge'] = $request->shipping_charge;
         $data['shopname'] = $request->shopname;
         $data['email'] = $request->email;
         $data['phone'] = $request->phone;
         $data['adderss'] = $request->adderss;
         $image = $request->file('logo');
         if ($image) {
             unlink($oldlogo);
             $image_name = date('dmy_H_s_i');
             $ext = strtolower($image->getClientOriginalExtension());
             $image_full_name = $image_name.'.'.$ext;
             $upload_path = 'public/media/logo_settings/';
             $image_url = $upload_path.$image_full_name;
             $success = $image->move($upload_path,$image_full_name);

             $data['logo'] = $image_url;
             $paymentSettiings = DB::table('settings')->where('id',$id)->update($data);
             $notification=array(
                 'messege'=>'payment Setting Updated Successfully',
                 'alert-type'=>'success'
             );
             return Redirect()->route('admin.payment.setting.show')->with($notification);
         }else{
             $paymentSettiings = DB::table('settings')->where('id',$id)->update($data);
             $notification=array(
                 'messege'=>'payment Setting Updated Successfully',
                 'alert-type'=>'success'
             );
             return Redirect()->route('admin.payment.setting.show')->with($notification);
         }

     }




}
