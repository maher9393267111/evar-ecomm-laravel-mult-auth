@extends('backened.layouts.master')

@section('content')
<section class="content-main">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Edit Product</h4>
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
                    <form action="{{route('product.update',$product->id)}}"  method="POST">
                        @csrf
                        @method('patch')
                        <div class="mb-4">
                            <label for="product_name" class="form-label">Title</label>
                            <input type="text" placeholder="Type here" class="form-control" name="title" id="product_name" value="{{$product->title}}">
                        </div>
                        <div class="mb-4">
                            <label for="product_name" class="form-label">Summary</label>
                            <input type="Type here" placeholder="Write Summary of Product" class="form-control" name="summary" id="summary" value="{{$product->summary}}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Full description</label>
                            <textarea placeholder="Type here" class="form-control" id="description" name="description" rows="4" value="{{$product->description}}"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Stock</label>
                            <input type="Number" placeholder="How many product in stock" class="form-control" name="stock" id="stock" value="{{$product->stock}}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Photo</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$product->photo}}">
                            </div>
                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Price</label>
                            <input type="Number" step="any" placeholder="Price of Product" class="form-control" name="price" id="price" value="{{$product->price}}">

                        </div>
                        <div class="mb-4">
                            <label class="form-label">Discount</label>
                            <input type="Number" step="any" placeholder="Discount of Product" class="form-control" name="discount" id="discount" value="{{$product->discount}}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Brands</label>
                            <select class="form-select" name="brand_id" aria-label="Default select example">
                                <option selected>Please Select Brand</option>
                                @foreach(\App\Models\Brand::get() as $brand)
                                <option value="{{$brand->id}}" {{$brand->id==$product->brand_id ? 'selected' : ''}}>{{$brand->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Category</label>
                            <select id="cat_id" class="form-select" name="cat_id" aria-label="Default select example">
                                <option selected>Please Select Category</option>
                                @foreach(\App\Models\Category::where('is_parent',1)->get() as $cat)
                                <option value="{{$cat->id}}" {{$cat->id==$product->cat_id ? 'selected' : ''}}>{{$cat->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4 d-none" id="child_cat_div">
                            <label class="form-label">Child Category</label>
                            <select id="child_cat_id" class="form-select" name="child_cat_id" aria-label="Default select example">

                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Size</label>
                            <select class="form-select" name="size" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="S" {{$product->size=='S' ? 'selected' : ''}}>Small</option>
                                <option value="M"  {{$product->size=='M' ? 'selected' : ''}}>Medium</option>
                                <option value="L"  {{$product->size=='L' ? 'selected' : ''}}>Large</option>
                                <option value="XL"  {{$product->size=='XL' ? 'selected' : ''}}>Extra Large</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Condition</label>
                            <select class="form-select" name="conditions" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="new"  {{$product->conditions=='new' ? 'selected' : ''}}>New</option>
                                <option value="popular"  {{$product->conditions=='popular' ? 'selected' : ''}}>Popular</option>
                                <option value="winter"  {{$product->conditions=='winter' ? 'selected' : ''}}>Winter</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Vendors</label>
                            <select class="form-select" name="vendor_id" aria-label="Default select example">
                                <option selected>Please Select Vendor</option>
                                @foreach(\App\Models\User::where('role','seller')->get() as $vendor)
                                <option value="{{$vendor->id}}" {{$vendor->id==$product->vendor_id ? 'selected' : ''}}>{{$vendor->fullname}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="active"  {{$product->status=='active' ? 'selected' : ''}}>Active</option>
                                <option value="inactive"  {{$product->status=='inactive' ? 'selected' : ''}}>Inactive</option>
                            </select>
                        </div>
                        <div>
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
<script>
    $('#lfm').filemanager('image');
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    var child_cat_id={{$product->child_cat_id}};
    $('#cat_id').change(function() {
        var cat_id = $(this).val();
        if (cat_id != null) {
            $.ajax({

                url: "/admin/category/" + cat_id + "/child",
                type: "POST",
                data: {
                    _token: "{{csrf_token()}}",
                    'cat_id': cat_id,
                },
                success: function(response) {
                    var html_option = "<option value=''>Child Category</option>"
                    if (response.status) {
                        $('#child_cat_div').removeClass('d-none');
                        $.each(response.data, function(id, title) {
                            html_option += "<option value='" + id + "' "+(child_cat_id==id ? 'selected' : '')+">" + title + "</option>"
                        });
                    } else {
                        $('#child_cat_div').addClass('d-none');
                    }
                    $('#child_cat_id').html(html_option);
                }

            });
        }
    });
    if(child_cat_id!=null){
        $('#cat_id').change();
    }
</script>


@endsection