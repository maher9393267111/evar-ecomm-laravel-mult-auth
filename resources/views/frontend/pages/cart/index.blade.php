@extends('frontend.layouts.master')

@section('content')

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('front')}}" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Your Cart
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12" id="cart_list">
                    @include('frontend.layouts.cartlist')


                </div>
            </div>
        </div>
        </div>
    </section>
</main>
@endsection
@section('scripts')
<script>
    $(document).on('click', '.coupon-btn', function(e) {
        e.preventDefault();
        var code = $('input[name=code]').val();
        $('.coupon-btn').html('<i class="fi-rs-spinner mr-10"></i> Applying...');
        $('#coupon-form').submit();

    });
</script>
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
                    $('body #cart-counter').html(data['cart_count']);
                    swal({
                        title: "Good job!",
                        text: data['message'],
                        icon: "success",
                        button: "OK!",
                    });
                }
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
</script>
<script>
    $(document).on('click', '.qty-text', function() {
        var id = $(this).data('id');
        var spinner = $(this),
            input = spinner.closest("div.quantity").find('input[type="number"]');
        if (input.val() == 1) {
            return false;
        }
        if (input.val() != 1) {
            var newVal = parseFloat(input.val());
            var hep = $('#qtyinput1-' + id).val(newVal);

        }
        var productQuantity = $("#stock1-" + id).data('product-quantity');
        upadate_cart(id, productQuantity);
    });

    function upadate_cart(id, productQuantity) {
        var rowId = id;
        var product_qty = $('#qtyinput1-' + rowId).val();
        var token = "{{csrf_token()}}";
        var path = "{{route('cart.update')}}";
        $.ajax({
            url: path,
            type: "POST",
            data: {
                _token: token,
                rowId: rowId,
                product_qty: product_qty,
                productQuantity: productQuantity,
            },
            success: function(data) {

                if (data['status']) {
                    $('body #header-ajax').html(data['header']);
                    $('body #cart-counter').html(data['cart_count']);
                    $('body #cart_list').html(data['cart_list']);
                    swal({
                        title: "Good job!",
                        text: data['message'],
                        icon: "success",
                        button: "OK!",
                    });
                }
            }

        });
    }
</script>
@endsection