<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Cart;
use Session;
use Mail;
use App\Mail\InvoiceMail;

class PaymentController extends Controller
{
   public function Payment(Request $request){

   $data = array();
   $data['name'] = $request->name;
   $data['phone'] = $request->phone;
   $data['email'] = $request->email;
   $data['address'] = $request->address;
   $data['city'] = $request->city;
   $data['payment'] = $request->payment;
    // dd($data);

    if ($request->payment == 'stripe') {

    return view('pages.payment.stripe',compact('data'));

    }elseif ($request->payment == 'paypal') {

    }elseif ($request->payment == 'oncash') {

     return view('pages.payment.oncash',compact('data'));

    }else{
    	echo "Cash On Delivery";
    }


   }


  public function StripeCharge(Request $request){

        $email = Auth::user()->email;

       if (Session::has('coupon')) {
           $shopCh = $request->shipping;
           $vat = $request->vat;
           $sub = Session::get('coupon')['balance'];
           $total = round($shopCh,2) + round($vat,2) + round($sub,2) ;
//           $total = 249.995 + 100 + 5 ;
//           $total = $request->total;
       }else{
          $total = $request->total;
      }

		// Set your secret key: remember to change this to your live secret key in production
		// See your keys here: https://dashboard.stripe.com/account/apikeys
		\Stripe\Stripe::setApiKey('sk_test_5ZirZT3iIt0WKpWjL9HAjzFr00FH2pBhQp');

		// Token is created using Checkout or Elements!
		// Get the payment token ID submitted by the form:
		$token = $_POST['stripeToken'];

		$charge = \Stripe\Charge::create([
		    'amount' => $total*100,
		    'currency' => 'usd',
		    'description' => 'A7M-Store Details',
		    'source' => $token,
		    'metadata' => ['order_id' => uniqid()],
		]);

    $data = array();
    $data['user_id'] = Auth::id();
    $data['payment_id'] = $charge->payment_method;
    $data['paying_amount'] = $charge->amount;
    $data['blnc_transection'] = $charge->balance_transaction;
    $data['stripe_order_id'] = $charge->metadata->order_id;
    $data['shipping'] = $request->shipping;
    $data['vat'] = $request->vat;

    $data['payment_type'] = $request->payment_type;
    $data['status_code'] = mt_rand(100000,999999);

    if (Session::has('coupon')) {
        $shopCh = $request->shipping;
        $vat = $request->vat;
        $sub = $data['subtotal'] = Session::get('coupon')['balance'];
        $data['total'] =  $sub + $vat + $shopCh;
    }else{
    	$data['subtotal'] = Cart::Subtotal();
        $data['total'] = $request->total;
    }
    $data['status'] = 0;
    $data['date'] = date('d-m-y');
    $data['month'] = date('F');
    $data['year'] = date('Y');
    $order_id = DB::table('orders')->insertGetId($data);

   // Mail send to user for Invoice
  Mail::to($email)->send(new invoiceMail($data));


    /// Insert Shipping Table

    $shipping = array();
    $shipping['order_id'] = $order_id;
    $shipping['ship_name'] = $request->ship_name;
    $shipping['ship_phone'] = $request->ship_phone;
    $shipping['ship_email'] = $request->ship_email;
    $shipping['ship_address'] = $request->ship_address;
    $shipping['ship_city'] = $request->ship_city;
    DB::table('shipping')->insert($shipping);

    // Insert Order Details Table

    $content = Cart::content();
    $details = array();
    foreach ($content as $row) {
    $details['order_id'] = $order_id;
    $details['product_id'] = $row->id;
    $details['product_name'] = $row->name;
    $details['color'] = $row->options->color;
    $details['size'] = $row->options->size;
    $details['quantity'] = $row->qty;
    $details['singleprice'] = $row->price;
    $details['totalprice'] = $row->qty*$row->price;
    DB::table('orders_details')->insert($details);

    }

    Cart::destroy();
    if (Session::has('coupon')) {
    	Session::forget('coupon');
    }
    $notification=array(
                        'messege'=>'Order Process Successfully Done',
                        'alert-type'=>'success'
                         );
                       return Redirect()->to('/')->with($notification);

  }





public function OnCash(Request $request){



    $data = array();
    $data['user_id'] = Auth::id();
    $data['shipping'] = $request->shipping;
    $data['vat'] = $request->vat;

    $data['payment_type'] = $request->payment_type;
    $data['status_code'] = mt_rand(100000,999999);

    if (Session::has('coupon')) {
        $shopCh = $request->shipping;
        $vat = $request->vat;
        $sub = $data['subtotal'] = Session::get('coupon')['balance'];
        $data['total'] = $sub + $vat + $shopCh;
    }else{
      $data['subtotal'] = Cart::Subtotal();
        $data['total'] = $request->total;
    }
    $data['status'] = 0;
    $data['date'] = date('d-m-y');
    $data['month'] = date('F');
    $data['year'] = date('Y');
    $order_id = DB::table('orders')->insertGetId($data);


    /// Insert Shipping Table

    $shipping = array();
    $shipping['order_id'] = $order_id;
    $shipping['ship_name'] = $request->ship_name;
    $shipping['ship_phone'] = $request->ship_phone;
    $shipping['ship_email'] = $request->ship_email;
    $shipping['ship_address'] = $request->ship_address;
    $shipping['ship_city'] = $request->ship_city;
    DB::table('shipping')->insert($shipping);

    // Insert Order Details Table

    $content = Cart::content();
    $details = array();
    foreach ($content as $row) {
    $details['order_id'] = $order_id;
    $details['product_id'] = $row->id;
    $details['product_name'] = $row->name;
    $details['color'] = $row->options->color;
    $details['size'] = $row->options->size;
    $details['quantity'] = $row->qty;
    $details['singleprice'] = $row->price;
    $details['totalprice'] = $row->qty*$row->price;
    DB::table('orders_details')->insert($details);

    }

    Cart::destroy();
    if (Session::has('coupon')) {
      Session::forget('coupon');
    }
    $notification=array(
                        'messege'=>'Order Process Successfully Done',
                        'alert-type'=>'success'
                         );
                       return Redirect()->to('/')->with($notification);

  }







  public function SuccessList(){

  $order = DB::table('orders')->where('user_id',Auth::id())->where('status',3)->orderBy('id','DESC')->limit(5)->get();

  return view('pages.returnorder',compact('order'));


  }


  public function RequestReturn($id){
    DB::table('orders')->where('id',$id)->update(['return_order'=>1]);
     $notification=array(
                        'messege'=>'Order Request Done',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);


  }






}
