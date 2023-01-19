@extends('frontend.layouts.master')
@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{route('front')}}" rel="nofollow">Home</a>
            <span></span> Pages
            <span></span> Account
        </div>
    </div>
</div>
<section class="pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    <div class="col-md-4">
                        <div class="dashboard-menu">
                            @include('frontend.user.sidebar')
                        </div>
                    </div>
                    <div class="col-md-8">


                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Orders tracking</h5>
                            </div>
                            <div class="card-body contact-from-area">
                                <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                            <div class="input-style mb-20">
                                                <label>Order ID</label>
                                                <input name="order-id" placeholder="Found in your order confirmation email" type="text" class="square">
                                            </div>
                                            <div class="input-style mb-20">
                                                <label>Billing email</label>
                                                <input name="billing-email" placeholder="Email you used during checkout" type="email" class="square">
                                            </div>
                                            <button class="submit submit-auto-width" type="submit">Track</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection