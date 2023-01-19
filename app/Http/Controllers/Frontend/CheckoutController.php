<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\Shipping;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function checkout1()
    {
        $user = Auth::user();
        $shippings =Shipping::where('status','active')->orderBy('shipping_address','ASC')->get();
        return view('frontend.pages.checkout.checkout1', compact('user','shippings'));
    }
    public function checkout1Store(Request $request)
    {
        $this->validate($request,[
            'first_name'=>'string|required',
            'last_name'=>'string|required',
            'email'=>'email|required',
            'phone'=>'required',
            'address'=>'string|required',
            'city'=>'string|required',
            'state'=>'string|nullable',
            'postcode'=>'string|nullable',
            'note'=>'string|nullable',
            'delivery_charges'=>'required|numeric',
        ]);
     
       
        if (empty($request->input('sfirst_name', 'slast_name', 'saddress', 'semail','sphone', 'scity', 'sstate', 'spostcode'))) {
            $sfname = $request->input('first_name');
            $slname = $request->input('last_name');
            $saddress = $request->input('address');
            $sphone = $request->input('phone');
            $semail = $request->input('email');
            $scity = $request->input('city');
            $sstate = $request->input('state');
            $spostcode = $request->input('postcode');
        } else {
            $sfname = $request->input('sfirst_name');
            $slname = $request->input('slast_name');
            $saddress = $request->input('saddress');
            $sphone = $request->input('sphone');
            $semail = $request->input('semail');
            $scity = $request->input('scity');
            $sstate = $request->input('sstate');
            $spostcode = $request->input('spostcode');
        }
        // Session()->forget('checkout');
        Session()->push('checkout',[
            'first_name'=> $request->input('first_name'),
            'last_name'=> $request->input('last_name'),
            'email'=> $request->input('email'),
            'phone'=> $request->input('phone'),
            'address'=> $request->input('address'),
            'city'=> $request->input('city'),
            'state'=> $request->input('state'),
            'postcode'=> $request->input('postcode'),
            'note'=>$request->input('note'),
            'sfirst_name'=> $sfname,
            'slast_name'=> $slname,
            'saddress'=> $saddress,
            'semail'=> $semail,
            'sphone'=> $sphone,
            'scity'=> $scity,
            'sstate'=> $sstate,
            'spostcode'=> $spostcode,
            'delivery_charges'=>$request->input('delivery_charges'),
           
        ]);
        // return Session()->get('checkout');
        
         
        return redirect()->route('checkout2');   

    }
    public function checkout2(){
return view('frontend.pages.checkout.checkout2');  
    }
    public function checkout2Store(Request $request){
        $sub_total=$request->input('sub_total');
        $total_amount=$request->input('total_amount');
        
        $this->validate($request,[
            'payment_method'=>'string|required',
            // 'payment_status'=>'string|in:paid,unpaid',
        ]);
        Session()->push('checkout',[
            'payment_method'=>$request->payment_method, 
            'payment_status'=>'paid',    
            'sub_total'=>$request->sub_total,
            'total_amount'=>$request->total_amount,       
        ]);
      
  
    
        $order=new Order();
        $order['user_id']=auth()->user()->id;
        $order['order_number']=Str::upper('ORD-'.Str::random(6));
        $order['sub_total']=$sub_total;
        if(Session()->has('coupon')){
            $order['coupon']=Session()->get('coupon')['value'];
        }
        else{
            $order['coupon']=0;
        }
        // $order['total_amount']=(float)str_replace(',','',Session()->get('checkout')['1']['sub_total'])+Session()->get('checkout')['0']['delivery_charges']-$order['coupon'];
        $order['total_amount']=$total_amount+Session()->get('checkout')['0']['delivery_charges']-$order['coupon'];
       
        $order['payment_method']=Session()->get('checkout')['1']['payment_method'];
        $order['payment_status']=Session()->get('checkout')['1']['payment_status'];
        $order['condition']='pending';
        $order['delivery_charges'] =Session()->get('checkout')[0]['delivery_charges'];
        $order['first_name']= Session()->get('checkout')[0]['first_name'];
        $order['last_name']= Session()->get('checkout')[0]['last_name'];
        $order['email']= Session()->get('checkout')[0]['email'];
        $order['phone']=Session()->get('checkout')[0]['phone'];
        $order['address']= Session()->get('checkout')[0]['address'];
        $order['city']= Session()->get('checkout')[0]['city'];
        $order['state']= Session()->get('checkout')[0]['state'];
        $order['postcode']= Session()->get('checkout')[0]['postcode'];
        $order['note']= Session()->get('checkout')[0]['note'];
        $order['sfirst_name']= Session()->get('checkout')[0]['sfirst_name'];
        $order['slast_name']= Session()->get('checkout')[0]['slast_name'];
        $order['sphone']= Session()->get('checkout')[0]['sphone'];
        $order['semail']= Session()->get('checkout')[0]['semail'];
        $order['sstate']= Session()->get('checkout')[0]['sstate'];
        $order['saddress']= Session()->get('checkout')[0]['saddress'];
        $order['scity']= Session()->get('checkout')[0]['scity'];
        $order['spostcode']= Session()->get('checkout')[0]['spostcode'];
       $status=$order->save();
     

       if($status){
        Mail::to($order['email'])->bcc($order['semail'])->cc('dokanvendor@gmail.com')->send(new OrderMail($order));
        Cart::instance('shopping')->destroy();
        Session()->forget('checkout');
        Session()->forget('coupon');
           return redirect()->route('complete',$order['order_number']);
       }
       else{
        return redirect()->route('checkout1')->with('error','Please try again later!!');
       }        
    }
    public function complete($order){
           return view('frontend.pages.checkout.complete',compact('order'));
    }
}
