@extends('frontend.layouts.master')
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&display=swap');

    html,
    body {
        font-family: 'Raleway', sans-serif;
    }

    .thankyou-page ._header {
        background: #fee028;
        padding: 100px 30px;
        text-align: center;
        background: #fee028 url(https://codexcourier.com/images/main_page.jpg) center/cover no-repeat;
    }

    .thankyou-page ._header .logo {
        max-width: 200px;
        margin: 0 auto 50px;
    }

    .thankyou-page ._header .logo img {
        width: 100%;
    }

    .thankyou-page ._header h1 {
        font-size: 65px;
        font-weight: 800;
        color: white;
        margin: 0;
    }

    .thankyou-page ._body {
        margin: -70px 0 30px;
    }

    .thankyou-page ._body ._box {
        margin: auto;
        max-width: 80%;
        padding: 50px;
        background: white;
        
        border-radius: 3px;
        box-shadow: 0 0 35px rgba(10, 10, 10, 0.12);
        -moz-box-shadow: 0 0 35px rgba(10, 10, 10, 0.12);
        -webkit-box-shadow: 0 0 35px rgba(10, 10, 10, 0.12);
    }

    .thankyou-page ._body ._box h4 {
       
        font-size: 32px;
        font-weight: 600;
        color: #4ab74a;
    }

    .thankyou-page ._footer {
        text-align: center;
        padding: 50px 30px;
    }

    .thankyou-page ._footer .btn {
        background: #4ab74a;
        color: white;
        border: 0;
        font-size: 14px;
        font-weight: 600;
        border-radius: 0;
        letter-spacing: 0.8px;
        padding: 20px 33px;
        text-transform: uppercase;
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
            <div class="checkout_area section_padding_100">

                <div class="row">
                    <div class="col-12">
                        <div class="thankyou-page">
                            <div class="_header">
                                <div class="logo">
                                    <img src="https://codexcourier.com/images/banner-logo.png" alt="">
                                </div>
                                <h1>Thank You For Your Order!</h1>
                            </div>
                            <div class="_body">
                                <div class="_box">
                                    <h4>
                                        You will receive an email of your order details
</br>
                                    
                                    Your Order id {{$order}}
                                    </h4>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- <div class="jumbotron text-center">
                    <h5 class="display-3">Thank You For Your Order!</h5>
                    <p>You will receive an email of your order details</p>
                    <hr>
                    <p class="orderid mb-0">Your Order id {{$order}}</p>
                   
                    
                </div> -->

            </div>

        </div>
    </section>
</main>
@endsection