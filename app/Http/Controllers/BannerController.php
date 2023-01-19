<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners=Banner::orderBy('id','DESC')->get();
        return view('backened.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backened.banner.create');
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
        'title'=>'string|required',
        'description'=>'string|nullable',
        'photo'=>'required',
        'condition'=>'nullable|in:banner,promo',
        'status'=>'nullable|in:active,inactive'
       ]);
       $data=$request->all();
       $slug=Str::slug($request->input('title'));
       $slug_count=Banner::where('slug',$slug)->count();
       if($slug_count>0){
           $slug=time().'-'.$slug;
       }
       $data['slug']=$slug;
       $status=Banner::create($data);
       if($status){
           return redirect()->route('banner.index')->with('success','Successfully created banner');
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
       $banner=Banner::find($id);
       if($banner){
           return view('backened.banner.edit',compact('banner'));
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
        $banner=Banner::find($id);
        if($banner){
            $this->validate($request,[
                'title'=>'string|required',
                'description'=>'string|nullable',
                'photo'=>'required',
                'condition'=>'nullable|in:banner,promo',
                'status'=>'nullable|in:active,inactive'
               ]);
                 $data=$request->all();               
               $status=$banner->update($data);
               if($status){
                   return redirect()->route('banner.index')->with('success','Successfully updated  banner');
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
        $banner=Banner::find($id);
        if($banner){
            $status=$banner->delete();
            if($status){
                return redirect()->route('banner.index')->with('success','Banner Deleted Successfully');
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
