
@extends('backened.layouts.master')

@section('content')
<section class="content-main">
 <div class="row">
 <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Add User</h4>
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
                            <form action="{{route('user.store')}}" method="POST">
                                @csrf 
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Full Name</label>
                                    <input type="text" placeholder="Type here" class="form-control"name="fullname" id="product_name">
                                </div>
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">User Name</label>
                                    <input type="text" placeholder="Type here" class="form-control"name="username" id="product_name">
                                </div>
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Email</label>
                                    <input type="email" placeholder="Type here" class="form-control"name="email" id="product_name">
                                </div>
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Password</label>
                                    <input type="password" placeholder="Type here" class="form-control"name="password" id="product_name">
                                </div>
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Phone</label>
                                    <input type="phone" placeholder="Type here" class="form-control"name="phone" id="product_name">
                                </div>
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Address</label>
                                    <input type="text" placeholder="Type here" class="form-control"name="address" id="product_name">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Photo</label>
                                    <div class="input-group">
                                    <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                   </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="photo">
                                    </div>
                                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                </div>
                                <div class="mb-4">
                                <label class="form-label">Role</label>
                                <select class="form-select"  name="role" aria-label="Default select example">                                
                                  <option selected>Open this select menu</option>
                                  <option value="admin">Admin</option>
                                 <option value="customer">Customer</option>
                                 <option value="vendor">Vendor</option>
                                 
                                 </select>
                                </div>
                                <div class="mb-4">
                                <label class="form-label" >Status</label>
                                <select class="form-select" name="status" aria-label="Default select example">                                
                                  <option selected>Open this select menu</option>
                                  <option value="active">Active</option>
                                 <option value="inactive">Inactive</option>
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