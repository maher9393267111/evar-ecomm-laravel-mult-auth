
@extends('backened.layouts.master')

@section('content')
<section class="content-main">
 <div class="row">
 <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Edit Category</h4>
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
                            <form action="{{route('category.update',$category->id)}}" method="POST">
                                @csrf 
                                @method('patch')
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Title</label>
                                    <input type="text" placeholder="Type here" class="form-control"name="title" id="product_name" value="{{$category->title}}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Summary</label>
                                    <textarea placeholder="Type here" class="form-control" id="summary" name="summary" rows="4" >{{$category->summary}}</textarea>
                                </div>
                                <div class="mb-4">
                                <label class="form-label">Is Parent: </label>
                                <input type="checkbox" id="is_parent" name="is_parent" value="1" {{$category->is_parent==1 ? 'checked' : ''}}> Yes
                                </div>
                                <div class="mb-4 {{$category->is_parent==1 ? 'd-none' : ''}}" id="parent_cat_div">
                                <label class="form-label" >Parent Category</label>
                                <select class="form-control"  id="parent_cat_div" name="parent_id" aria-label="Default select example">                                
                                    <option value="">Parent Category</option>     
                                    @foreach($parent_cats as $pcats)
                                    <option value="{{$pcats->id}}" {{$pcats->id==$category->parent_id ? 'selected' : ''}}>{{$pcats->title}}</option> 
                                    @endforeach             
                                 </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Photo</label>
                                    <div class="input-group">
                                    <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                   </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$category->photo}}">
                                    </div>
                                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                </div>
                                
                        
                                <div class="mb-4">
                                <label class="form-label" >Status</label>
                                <select class="form-select" name="status" aria-label="Default select example">                                
                                  <option selected>Open this select menu</option>
                                  <option value="active" {{$category->status=='active' ? 'selected' : ''}}>Active</option>
                                 <option value="inactive" {{$category->status=='inactive' ? 'selected' : ''}}>Inactive</option>
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
<script>
    $('#is_parent').change(function(e){
        e.preventDefault();
        var is_checked=$('#is_parent').prop('checked');
        // alert(is_checked);
        if(is_checked){
            $('#parent_cat_div').addClass('d-none');
            $('#parent_cat_div').val("");
        }
        else{
            $('#parent_cat_div').removeClass('d-none');
        }
    })
</script>


@endsection