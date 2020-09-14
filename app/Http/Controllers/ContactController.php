<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ContactController extends Controller
{


//  public function __construct()
//    {
////        $this->middleware('auth:admin');
//    }



  public function Contact(){
  	return view('pages.contact');
  }


  public function ContactForm(Request $request){

  	$data = array();
  	$data['name'] = $request->name;
  	$data['email'] = $request->email;
  	$data['phone'] = $request->phone;
  	$data['message'] = $request->message;
  	$data['status'] = 0;
  	DB::table('contact')->insert($data);
  	$notification=array(
            'messege'=>'Your Message Insert Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
  }


 public function AllMessage(){
     $message =	DB::table('contact')->get();
     return view('admin.contact.all_message',compact('message'));
 }

 public function ShowMessage($id){
     $message =	DB::table('contact')->where('id',$id)->get();
     return view('admin.contact.Show_message',compact('message'));
 }

    public function ReadMessage($id){

        $data = array();
        $data['status'] = 1;
        $message = DB::table('contact')->where('id',$id)->update($data);
        $notification=array(
            'messege'=>'Your Read this Message Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.message')->with($notification);
    }
    public function DeleteMessage($id){

        DB::table('contact')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'This Message Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.message')->with($notification);
    }


}
