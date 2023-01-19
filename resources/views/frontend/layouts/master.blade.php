<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from wp.alithemes.com/html/evara/evara-frontend/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Aug 2021 15:26:06 GMT -->
<head>
    @include('frontend.layouts.head')
</head>

<body>
    <!-- Quick view -->
    @include('frontend.layouts.navbar')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            @include('backened.layouts.notification')
            </div>
        </div>
    </div>
      @yield('content')
      @include('frontend.layouts.footer') 
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <h5 class="mb-5">Now Loading</h5>
                    <div class="loader">
                        <div class="bar bar1"></div>
                        <div class="bar bar2"></div>
                        <div class="bar bar3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
@include('frontend.layouts.script') 

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).on('click', '.cart_delete', function(e) {
        e.preventDefault();
        var cart_id = $(this).data('id');
        var token = "{{csrf_token()}}";
        var path = "{{route('cart.delete')}}";
        $.ajax({
            url: path,
            type: "POST",
            dataType: "JSON",
            data: {
                cart_id: cart_id,
                _token: token,
            },
            success: function(data) {
                $('body #header-ajax').html(data['header']);
                console.log(data);
                if (data['status']) {
                    $('body #header-ajax').html(data['header']);
                    $('body #cart-counter').html(data['cart-count']);
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
</body>


<!-- Mirrored from wp.alithemes.com/html/evara/evara-frontend/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Aug 2021 15:26:06 GMT -->
</html>
