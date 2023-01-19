@extends('frontend.layouts.master')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('front')}}" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Wishlist
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive" id="wishlist_list">
                        @include('frontend.layouts.wishlists')
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('scripts')
<script>
  $(document).on('click','.move-to-cart',function(e){
        e.preventDefault(e);
        var rowId = $(this).data('id');
        var token = "{{csrf_token()}}";
        var path = "{{route('wishlist.move.cart')}}";
        $.ajax({
            url: path,
            type: "POST",
            data: {
                _token: token,
                rowId: rowId,
            },
            beforeSend: function() {
                $(this).html('<i class="fi-rs-spinner"></i>');
            },
            success: function(data) {              
              console.log(data);
              if (data['status']) {    
                  $('body #cart-counter').html(data['cart_count']);
                  $('body #wishlist_list').html(data['wishlist_list']);    
                  $('body #header-ajax').html(data['header']);                   
                  swal({
                      title: "Good job!",
                      text: data['message'],
                      icon: "success",
                      button: "OK!",
                  });
              }

          },
        error:function(err){
            swal({
                      title: "Error!",
                      text: "Some thing wrong",
                      icon: "error",
                      button: "OK!",
                  });
        }
           

        })

    })
</script>

<script>
      $(document).on('click','.delete_wishlist',function(e){
        e.preventDefault(e);
        var rowId = $(this).data('id');
        var token = "{{csrf_token()}}";
        var path = "{{route('wishlist.delete')}}";
        $.ajax({
            url: path,
            type: "POST",
            data: {
                _token: token,
                rowId: rowId,
            },
            success: function(data) {              
              console.log(data);
              if (data['status']) {    
                  $('body #cart-counter').html(data['cart_count']);
                  $('body #wishlist_list').html(data['wishlist_list']);    
                  $('body #header-ajax').html(data['header']);                   
                  swal({
                      title: "Good job!",
                      text: data['message'],
                      icon: "success",
                      button: "OK!",
                  });
              }

          },
        error:function(err){
            swal({
                      title: "Error!",
                      text: "Some thing wrong",
                      icon: "error",
                      button: "OK!",
                  });
        }
           

        })

    })
</script>
@endsection