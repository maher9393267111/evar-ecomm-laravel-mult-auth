
@extends('backened.layouts.master')

@section('content')
<section class="content-main">
 <div class="row">
 <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Edit Banner</h4>
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
                            <form action="{{route('banner.update',$banner->id)}}" method="POST">
                                @csrf 
                                @method('patch')
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Title</label>
                                    <input type="text" placeholder="Type here" class="form-control"name="title" id="product_name" value="{{$banner->title}}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Photo</label>
                                    <div class="input-group">
                                    <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                   </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$banner->photo}}">
                                    </div>
                                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Full description</label>
                                    <textarea placeholder="Type here" class="form-control" id="description" name="description" rows="4" >{{$banner->description}}</textarea>
                                </div>
                                <div class="mb-4">
                                <label class="form-label">Condition</label>
                                <select class="form-select"  name="condition" aria-label="Default select example">                                
                                  <option selected>Open this select menu</option>
                                  <option value="banner" {{$banner->condition=='banner' ? 'selected' : ''}}>Banner</option>
                                 <option value="promo" {{$banner->condition=='promo' ? 'selected' : ''}}>Promotional</option>
                                 </select>
                                </div>
                                <div class="mb-4">
                                <label class="form-label" >Status</label>
                                <select class="form-select" name="status" aria-label="Default select example">                                
                                  <option selected>Open this select menu</option>
                                  <option value="active" {{$banner->status=='active' ? 'selected' : ''}}>Active</option>
                                 <option value="inactive" {{$banner->status=='inactive' ? 'selected' : ''}}>Inactive</option>
                                 </select>
                                </div>

                                <div >
                            <button type="submit" class="btn btn-light rounded font-sm mr-5 text-body hover-up">Cancel</button>
                            <button type="submit" class="btn btn-md rounded font-sm hover-up">Update</button>
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