@extends('frontend.layouts.master')

@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{route('front')}}" rel="nofollow">Home</a>
            <span></span> {{$categories->title}}
        </div>
    </div>
</div>
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p> We found <strong class="text-brand">688</strong> items for you!</p>
                    </div>
                    <div class="sort-by-product-area">
                        <div class="sort-by-cover mr-10">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps"></i>Show:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">50</a></li>
                                    <li><a href="#">100</a></li>
                                    <li><a href="#">150</a></li>
                                    <li><a href="#">200</a></li>
                                    <li><a href="#">All</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <select id="sortBy">
                                        <option><a href="#">Default</a></option>
                                        <option value="priceAsc"><a href="#">Price: Low to High</a></option>
                                        <option value="priceDesc"><a href="#">Price: High to Low</a></option>
                                        <option value="titleAsc"><a href="#">Alphabetical Ascending</a></option>
                                        <option value="titleDesc"><a href="#">Alphabetical Descending</a></option>
                                        <option value="discAsc"><a href="#">Discount: Low to High</a></option>
                                        <option value="discDesc"><a href="#">Discount: High to Low</a></option>
                                    </select>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row product-grid-3" id="product-data">
                    @include('frontend.layouts.singleproduct')

                    <div class="ajax-load text-center" style="display: none;">
                        <img src="{{asset('frontend/assets/imgs/loader.gif')}}" style="width:15%;" alt="">
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection

@section('scripts')

<script>
    $('#sortBy').change(function() {
        var sort = $('#sortBy').val();
        window.location = "{{url(''.$route.'')}}/{{$categories->slug}}?sort=" + sort;
    });
</script>
<script>
    function loadmoredata(page) {
        $.ajax({
                url: '?page' + page,
                type: get,
                beforeSend: function() {
                    $('.ajax-load').show();
                },
            })
            .done(function(data) {
                if (data.html == '') {
                    $('.ajax-load').html('No More Product Available');
                    return;
                }
                $('.ajax-load').hide();
                $('#product-data').append(data.html);
            })
            .fail(function() {
                alert('Something went wrong');
            });
    }
    var page = 1;
    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() + 120 >= $(document).height()) {
            page++;
            loadmoredata(page);
        }
    })
</script>
<script>
    $(document).on('click', '.add_to_cart', function(e) {
        e.preventDefault();
        var product_id = $(this).data('product-id');
        var product_qty = $(this).data('quantity');
        var token = "{{csrf_token()}}";
        var path = "{{route('cart.store')}}";
        $.ajax({
            url: path,
            type: "POST",
            dataType: "JSON",
            data: {
                product_id: product_id,
                product_qty: product_qty,
                _token: token,
            },
            beforeSend: function() {
                $("#add_to_cart" + product_id).html('<i class="fi-rs-spinner"></i>')

            },
            complete: function() {
                $("#add_to_cart" + product_id).html('<i class="fi-rs-shopping-bag-add"></i>')
            },
            success: function(data) {
              
                console.log(data);
                if (data['status']) {
                    $('body #header-ajax').html(data['header']);
                    $('body #cart-counter').html(data['cart_count']);
                    swal({
                        title: "Good job!",
                        text: data['message'],
                        icon: "success",
                        button: "OK!",
                    });
                }
            },
            error:function(err){
                console.log(err);
            }
        });
    });
</script>

<script>
    $(document).on('click', '.add_to_wishlist', function(e) {
        e.preventDefault();
        var product_id = $(this).data('id');
        var product_qty = $(this).data('quantity');
        var token = "{{csrf_token()}}";
        var path = "{{route('wishlist.store')}}";
        $.ajax({
            url: path,
            type: "POST",
            dataType: "JSON",
            data: {
                product_id: product_id,
                product_qty: product_qty,
                _token: token,
            },
            beforeSend: function() {
                $("#add_to_wishlist_" + product_id).html('<i class="fi-rs-spinner"></i>')

            },
            complete: function() {
                $("#add_to_wishlist_" + product_id).html('<i class="fi-rs-heart"></i>')
            },
            success: function(data) {
              
                console.log(data);
                if (data['status']) {
                    $('body #header-ajax').html(data['header']);
                    $('body #wishlist-counter').html(data['wishlist_count']);
                    swal({
                        title: "Good job!",
                        text: data['message'],
                        icon: "success",
                        button: "OK!",
                    });
                }
               else if (data['present']) {
                    $('body #header-ajax').html(data['header']);
                    $('body #wishlist-counter').html(data['wishlist_count']);
                    swal({
                        title: "Oops!",
                        text: data['message'],
                        icon: "warning",
                        button: "OK!",
                    });
                }
                else{
                    swal({
                        title: "Sorry!",
                        text: "You can not add that product",
                        icon: "error",
                        button: "OK!",
                    });
                }
            },
            error:function(err){
                console.log(err);
            }
        });
    });
</script>

@endsection