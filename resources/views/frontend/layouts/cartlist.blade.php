<table class="table shopping-summery text-center clean">
    <thead>
        <tr class="main-heading">
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Remove</th>
        </tr>
    </thead>
    <tbody>
        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
        <tr>
            <td class="image product-thumbnail"><img src="{{$item->model->photo}}" alt="#"></td>
            <td class="product-des product-name">
                <h5 class="product-name"><a href="{{route('product.detail',$item->model->slug)}}">{{$item->name}}</a></h5>
            </td>
            <td class="price" data-title="Price"><span>RS {{$item->price}} </span></td>
            <td class="text-center" data-title="Stock">
                <!-- <div class="detail-qty border radius  m-auto" id="qty-input-{{$item->rowId}}" data-id="{{$item->rowId}}">
                                           
                                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <span class="qty-val">{{$item->qty}}</span>
                                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                            <input type="number" id="qty-input-{{$item->rowId}}" data-id="{{$item->rowId}}" min="1" max="99" name="quantity" class="qty-val" value="" > -->

                <!-- </div> -->
                <div class="quantity border radius  m-auto">

                    <input type="number" data-id="{{$item->rowId}}" class="qty-text" id="qtyinput1-{{$item->rowId}}" min="1" max="99" name="quantity" value="{{$item->qty}}" style="border:none;">
                    <input type="hidden" data-id="{{$item->rowId}}" data-product-quantity="{{$item->model->stock}}" id="stock1-{{$item->rowId}}">
                </div>
            </td>
            <td class="text-right" data-title="Cart">
                <span>RS {{$item->subtotal()}} </span>
            </td>
            <td class="action cart_delete" data-title="Remove" data-id={{$item->rowId}}><a href="" class="text-muted"><i class="fi-rs-trash"></i></a></td>
        </tr>
        @endforeach


        <tr>
            <td colspan="6" class="text-end">
                <a href="#" class="text-muted"> <i class="fi-rs-cross-small"></i> Clear Cart</a>
            </td>
        </tr>
    </tbody>
</table>
<div class="table-responsive">

</div>
<div class="cart-action text-end">
    <a class="btn  mr-10 mb-sm-15"><i class="fi-rs-shuffle mr-10"></i>Update Cart</a>
    <a class="btn "><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
</div>
<div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
<div class="row mb-50">
    <div class="col-lg-6 col-md-12">

        <div class="mb-30 mt-50">
            <div class="heading_s1 mb-3">
                <h4>Apply Coupon</h4>
            </div>
            <div class="total-amount">
                <div class="left">
                    <div class="coupon">
                        <form action="{{route('coupon.add')}}" method="POST" id="coupon-form">
                            @csrf
                            <div class="form-row row justify-content-center">
                                <div class="form-group col-lg-6">
                                    <input class="font-medium" name="code" placeholder="Enter Your Coupon">
                                </div>
                                <div class="form-group col-lg-6">
                                    <button type="submit" class="coupon-btn btn  btn-sm"><i class="fi-rs-label mr-10"></i>Apply</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="border p-md-4 p-30 border-radius cart-totals">
            <div class="heading_s1 mb-3">
                <h4>Cart Totals</h4>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="cart_total_label">Cart Subtotal</td>
                            <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">RS {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span></td>
                        </tr>
                        <tr>
                            <td class="cart_total_label">Save Amount</td>
                            <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">@if(\Illuminate\Support\Facades\Session::get('coupon')) RS {{number_format(\Illuminate\Support\Facades\Session::get('coupon')['value'])}} @else RS 0 @endif</span></td>
                        </tr>
                        <!-- <tr>
                                                <td class="cart_total_label">Shipping</td>
                                                <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free Shipping</td>
                                            </tr> -->
                        <tr>
                            <td class="cart_total_label">Total</td>
                            @if(\Illuminate\Support\Facades\Session::get('coupon'))
                            <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">RS {{number_format((float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())-\Illuminate\Support\Facades\session::get('coupon')['value'],2)}}</span></strong></td>
                            @else
                            <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">RS {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}} </span></strong></td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="{{route('checkout1')}}" class="btn "> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a>
        </div>
    </div>