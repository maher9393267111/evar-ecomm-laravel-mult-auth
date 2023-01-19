@extends('frontend.layouts.master')
@section('content')
<style>
    .card {
        box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: 1rem;
    }

    .card-body {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.5rem 1.5rem;
    }
</style>
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('front')}}" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>

    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
               
                    <div class="col-6">
                    <form action="{{route('checkout2.store')}}" method="post">
                        @csrf
                        <div class="mb-25">
                            <h4>Choose payment method</h4>
                        </div>
                        <div class="accordion" id="accordionPayment">
                            <!-- Credit card -->
                            <div class="accordion-item mb-3">
                                <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                                    <div class="form-check w-100 collapsed">
                                        <input class="form-check-input" type="radio" name="payment_method" id="payment1" required value="creditcard">
                                        <label class="form-check-label pt-1" for="payment1">
                                            Credit Card
                                        </label>
                                    </div>
                                    <span>
                                        <svg width="34" height="25" xmlns="http://www.w3.org/2000/svg">
                                            <g fill-rule="nonzero" fill="#333840">
                                                <path d="M29.418 2.083c1.16 0 2.101.933 2.101 2.084v16.666c0 1.15-.94 2.084-2.1 2.084H4.202A2.092 2.092 0 0 1 2.1 20.833V4.167c0-1.15.941-2.084 2.102-2.084h25.215ZM4.203 0C1.882 0 0 1.865 0 4.167v16.666C0 23.135 1.882 25 4.203 25h25.215c2.321 0 4.203-1.865 4.203-4.167V4.167C33.62 1.865 31.739 0 29.418 0H4.203Z"></path>
                                                <path d="M4.203 7.292c0-.576.47-1.042 1.05-1.042h4.203c.58 0 1.05.466 1.05 1.042v2.083c0 .575-.47 1.042-1.05 1.042H5.253c-.58 0-1.05-.467-1.05-1.042V7.292Zm0 6.25c0-.576.47-1.042 1.05-1.042H15.76c.58 0 1.05.466 1.05 1.042 0 .575-.47 1.041-1.05 1.041H5.253c-.58 0-1.05-.466-1.05-1.041Zm0 4.166c0-.575.47-1.041 1.05-1.041h2.102c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042H5.253c-.58 0-1.05-.466-1.05-1.042Zm6.303 0c0-.575.47-1.041 1.051-1.041h2.101c.58 0 1.051.466 1.051 1.041 0 .576-.47 1.042-1.05 1.042h-2.102c-.58 0-1.05-.466-1.05-1.042Zm6.304 0c0-.575.47-1.041 1.051-1.041h2.101c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042h-2.101c-.58 0-1.05-.466-1.05-1.042Zm6.304 0c0-.575.47-1.041 1.05-1.041h2.102c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042h-2.101c-.58 0-1.05-.466-1.05-1.042Z"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </h2>
                                <div id="collapseCC" class="accordion-collapse collapse show" data-bs-parent="#accordionPayment" style="">
                                    <div class="accordion-body">
                                        <div class="mb-3">
                                            <label class="form-label">Card Number</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Name on card</label>
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label">Expiry date</label>
                                                    <input type="text" class="form-control" placeholder="MM/YY">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label">CVV Code</label>
                                                    <input type="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                                    <div class="form-check w-100 collapsed">
                                        <input class="form-check-input" type="radio" name="payment_method" id="payment2" value="jazzcash">
                                        <label class="form-check-label pt-1" for="payment2">
                                            Jazz Cash
                                        </label>
                                    </div>
                                    <span>
                                        <svg width="34" height="25" xmlns="http://www.w3.org/2000/svg">
                                            <g fill-rule="nonzero" fill="#333840">
                                                <path d="M29.418 2.083c1.16 0 2.101.933 2.101 2.084v16.666c0 1.15-.94 2.084-2.1 2.084H4.202A2.092 2.092 0 0 1 2.1 20.833V4.167c0-1.15.941-2.084 2.102-2.084h25.215ZM4.203 0C1.882 0 0 1.865 0 4.167v16.666C0 23.135 1.882 25 4.203 25h25.215c2.321 0 4.203-1.865 4.203-4.167V4.167C33.62 1.865 31.739 0 29.418 0H4.203Z"></path>
                                                <path d="M4.203 7.292c0-.576.47-1.042 1.05-1.042h4.203c.58 0 1.05.466 1.05 1.042v2.083c0 .575-.47 1.042-1.05 1.042H5.253c-.58 0-1.05-.467-1.05-1.042V7.292Zm0 6.25c0-.576.47-1.042 1.05-1.042H15.76c.58 0 1.05.466 1.05 1.042 0 .575-.47 1.041-1.05 1.041H5.253c-.58 0-1.05-.466-1.05-1.041Zm0 4.166c0-.575.47-1.041 1.05-1.041h2.102c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042H5.253c-.58 0-1.05-.466-1.05-1.042Zm6.303 0c0-.575.47-1.041 1.051-1.041h2.101c.58 0 1.051.466 1.051 1.041 0 .576-.47 1.042-1.05 1.042h-2.102c-.58 0-1.05-.466-1.05-1.042Zm6.304 0c0-.575.47-1.041 1.051-1.041h2.101c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042h-2.101c-.58 0-1.05-.466-1.05-1.042Zm6.304 0c0-.575.47-1.041 1.05-1.041h2.102c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042h-2.101c-.58 0-1.05-.466-1.05-1.042Z"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </h2>
                            </div>
                            <div class="accordion-item mb-3">
                                <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                                    <div class="form-check w-100 collapsed">
                                        <input class="form-check-input" type="radio" name="payment_method" id="payment3" value="easypaisa">
                                        <label class="form-check-label pt-1" for="payment3">
                                            Easy Paisa
                                        </label>
                                    </div>
                                    <span>
                                        <svg width="34" height="25" xmlns="http://www.w3.org/2000/svg">
                                            <g fill-rule="nonzero" fill="#333840">
                                                <path d="M29.418 2.083c1.16 0 2.101.933 2.101 2.084v16.666c0 1.15-.94 2.084-2.1 2.084H4.202A2.092 2.092 0 0 1 2.1 20.833V4.167c0-1.15.941-2.084 2.102-2.084h25.215ZM4.203 0C1.882 0 0 1.865 0 4.167v16.666C0 23.135 1.882 25 4.203 25h25.215c2.321 0 4.203-1.865 4.203-4.167V4.167C33.62 1.865 31.739 0 29.418 0H4.203Z"></path>
                                                <path d="M4.203 7.292c0-.576.47-1.042 1.05-1.042h4.203c.58 0 1.05.466 1.05 1.042v2.083c0 .575-.47 1.042-1.05 1.042H5.253c-.58 0-1.05-.467-1.05-1.042V7.292Zm0 6.25c0-.576.47-1.042 1.05-1.042H15.76c.58 0 1.05.466 1.05 1.042 0 .575-.47 1.041-1.05 1.041H5.253c-.58 0-1.05-.466-1.05-1.041Zm0 4.166c0-.575.47-1.041 1.05-1.041h2.102c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042H5.253c-.58 0-1.05-.466-1.05-1.042Zm6.303 0c0-.575.47-1.041 1.051-1.041h2.101c.58 0 1.051.466 1.051 1.041 0 .576-.47 1.042-1.05 1.042h-2.102c-.58 0-1.05-.466-1.05-1.042Zm6.304 0c0-.575.47-1.041 1.051-1.041h2.101c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042h-2.101c-.58 0-1.05-.466-1.05-1.042Zm6.304 0c0-.575.47-1.041 1.05-1.041h2.102c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042h-2.101c-.58 0-1.05-.466-1.05-1.042Z"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </h2>
                            </div>
                            <div class="accordion-item mb-3">
                                <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                                    <div class="form-check w-100 collapsed">
                                        <input class="form-check-input" type="radio" name="payment_method"  id="payment4" value="cod">
                                        <label class="form-check-label pt-1" for="payment4">
                                            Cash On Deivery
                                        </label>
                                    </div>
                                    <span>
                                        <svg width="34" height="25" xmlns="http://www.w3.org/2000/svg">
                                            <g fill-rule="nonzero" fill="#333840">
                                                <path d="M29.418 2.083c1.16 0 2.101.933 2.101 2.084v16.666c0 1.15-.94 2.084-2.1 2.084H4.202A2.092 2.092 0 0 1 2.1 20.833V4.167c0-1.15.941-2.084 2.102-2.084h25.215ZM4.203 0C1.882 0 0 1.865 0 4.167v16.666C0 23.135 1.882 25 4.203 25h25.215c2.321 0 4.203-1.865 4.203-4.167V4.167C33.62 1.865 31.739 0 29.418 0H4.203Z"></path>
                                                <path d="M4.203 7.292c0-.576.47-1.042 1.05-1.042h4.203c.58 0 1.05.466 1.05 1.042v2.083c0 .575-.47 1.042-1.05 1.042H5.253c-.58 0-1.05-.467-1.05-1.042V7.292Zm0 6.25c0-.576.47-1.042 1.05-1.042H15.76c.58 0 1.05.466 1.05 1.042 0 .575-.47 1.041-1.05 1.041H5.253c-.58 0-1.05-.466-1.05-1.041Zm0 4.166c0-.575.47-1.041 1.05-1.041h2.102c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042H5.253c-.58 0-1.05-.466-1.05-1.042Zm6.303 0c0-.575.47-1.041 1.051-1.041h2.101c.58 0 1.051.466 1.051 1.041 0 .576-.47 1.042-1.05 1.042h-2.102c-.58 0-1.05-.466-1.05-1.042Zm6.304 0c0-.575.47-1.041 1.051-1.041h2.101c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042h-2.101c-.58 0-1.05-.466-1.05-1.042Zm6.304 0c0-.575.47-1.041 1.05-1.041h2.102c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042h-2.101c-.58 0-1.05-.466-1.05-1.042Z"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                                        <tr>
                                            <td class="image product-thumbnail"><img src="{{$item->model->photo}}" alt="{{$item->name}}"></td>
                                            <td>
                                                <h5><a href="{{route('product.detail',$item->model->slug)}}">{{$item->name}}</a></h5> <span class="product-qty">x {{$item->qty}}</span>
                                            </td>
                                            <td>RS {{number_format($item->price),2}}</td>
                                        </tr>
                                        @endforeach
                                      
                                        
                                        <tr>
                                            <th>SubTotal</th>
                                            <td class="product-subtotal" colspan="2">RS{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td colspan="2"><em>RS {{number_format(\Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charges'],2)}}</em></td>
                                        </tr>
                                        @if(\Illuminate\Support\Facades\Session::has('coupon'))
                                        <tr>
                                            <th>Coupon </th>
                                            <td colspan="2"><em>RS {{number_format(\Illuminate\Support\Facades\Session::get('coupon')['value'],2)}}</em></td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <th>Total</th>
                                            @if(\Illuminate\Support\Facades\Session::has('coupon') && \Illuminate\Support\Facades\Session::has('checkout'))

                                            <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">RS {{number_format((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())+\Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charges']-\Illuminate\Support\Facades\Session::get('coupon')['value'],2)}}</span></td>
                                            @elseif(\Illuminate\Support\Facades\Session::has('coupon'))
                                            <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">RS {{number_format((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())-\Illuminate\Support\Facades\Session::get('coupon')['value'],2)}}</span></td>
                                           
                                            @elseif(\Illuminate\Support\Facades\Session::has('checkout'))
                                              <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">RS {{number_format((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())+\Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charges'],2)}}</span></td>
                                            @else
                                            <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">RS {{number_format(\Gloudemans\Shoppingcart\Facades\Cart::subtotal(),2)}} </span></td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>

                            <input type="hidden" name="sub_total" value="{{(float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal)}}">
                            <input type="hidden" name="total_amount" value="{{(float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal)}}">
                        <!-- <input type="hidden" name="" value="{{\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal}}"> -->
                        </div>
                        <button type="submit" class="btn btn-fill-out btn-block mt-30" style=" float:right;">Place Order</button>
                    </div>
                    <form >
                
            </div>
        </div>
    </section>
</main>
@endsection