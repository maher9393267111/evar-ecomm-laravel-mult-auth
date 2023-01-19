<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipping=Shipping::orderBy('id','DESC')->get();
        return view('backened.shipping.index',compact('shipping'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backened.shipping.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'shipping_address'=>'string|required',
            'delivery_time'=>'string|required',
            'delivery_charges'=>'numeric|nullable',           
            'status'=>'nullable|in:active,inactive'
           ]);
           $data=$request->all();           
           $status=Shipping::create($data);
           if($status){
               return redirect()->route('shipping.index')->with('success','Successfully created shipping!');
           }
           else{
               return back()->with('error','Something went wrong');
           }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shipping=Shipping::find($id);
        if($shipping){
            return view('backened.shipping.edit',compact('shipping'));
        }
        else{
            return back()->with('error','Data Not Found!!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shipping=Shipping::find($id);
        if($shipping){
            $this->validate($request,[
                'shipping_address'=>'string|required',
            'delivery_time'=>'string|required',
            'delivery_charges'=>'numeric|nullable',           
            'status'=>'nullable|in:active,inactive'
               ]);
                 $data=$request->all();               
               $status=$shipping->update($data);
               if($status){
                   return redirect()->route('shipping.index')->with('success','Successfully updated  Shipping');
               }
               else{
                   return back()->with('error','Something went wrong');
               }
        }
        else{
            return back()->with('error','Data Not Found!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shipping=Shipping::find($id);
        if($shipping){
            $status=$shipping->delete();
            if($status){
                return redirect()->route('shipping.index')->with('success','Shipping Deleted Successfully');
            }
            else{
                return back()->with('error','Something Wrong');
            }
            
        }
        else{
            return back()->with('error','Data Not Found!!');
        }
    }
}
