
@extends('backened.layouts.master')

@section('content')
<section class="content-main">
 <div class="row">
 <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Add Coupon</h4>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                            <div class="alert alert-danger">
                             <ul>
                                 @foreach($errors->all() as $error)
                                 <li>{{$error}}</li>
                                 @endforeach
                             </ul>
                             </div>
                             @endif
                            <form action="{{route('coupon.store')}}" method="POST">
                                @csrf 
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Coupon Code</label>
                                    <input type="text" placeholder="Type here" class="form-control"name="code" id="product_name" value="{{old('code')}}">
                                </div>
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Coupon Value</label>
                                    <input type="text" placeholder="Type here" class="form-control"name="value" id="product_name" value="{{old('value')}}">
                                </div>
                               
                               
                                
                                <div class="mb-4">
                                <label class="form-label">Coupon Type</label>
                                <select class="form-select"  name="type" aria-label="Default select example">                                
                                  <option selected>Open this select menu</option>
                                  <option value="fixed" value="{{old('fixed')}}">Fixed</option>
                                 <option value="percent" value="{{old('percent')}}">Percentage</option>
                                 </select>
                                </div>
                                <div class="mb-4">
                                <label class="form-label" >Status</label>
                                <select class="form-select" name="status" aria-label="Default select example">                                
                                  <option selected>Open this select menu</option>
                                  <option value="active" value="{{old('active')}}">Active</option>
                                 <option value="inactive" value="{{old('inactive')}}">Inactive</option>
                                 </select>
                                </div>

                                <div >
                            <button type="submit" class="btn btn-light rounded font-sm mr-5 text-body hover-up">Cancel</button>
                            <button type="submit" class="btn btn-md rounded font-sm hover-up">Submit</button>
                        </div>
                              
                               
                                
                            </form>
                        </div>
                    </div>
 </div>
</section>    
@endsection
@section('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script> $('#lfm').filemanager('image');</script>


@endsection