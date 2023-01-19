@extends('frontend.layouts.master')
@section('content')

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
            <div class="col-12">
                @if($errors->any())
                <div class=" alert alert-danger" id="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                        @endforeach

                    </ul>
                </div>
                @endif
            </div>

            <!-- <div class="row">
                    <div class="col-12">
                        <div class="divider mt-50 mb-50"></div>
                    </div>
                </div> -->
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-25">
                        <h4>Billing Details</h4>
                    </div>
                    @php
                    $name=explode(' ',auth()->user()->fullname)

                    @endphp

                    <form method="post" action="{{route('checkout1.store')}}" >
                        @csrf
                        <div class="form-group">
                            <input type="text"  id="first_name" name="first_name" placeholder="First name *" value="{{$name[0]}}">
                        </div>
                        <div class="form-group">
                            <input type="text"  id="last_name" name="last_name" placeholder="Last name *" value="{{$name[1]}}">
                        </div>
                        <div class="form-group">
                            <input  type="number" id="phone" name="phone" placeholder="Phone *" value="{{$user->phone}}">
                        </div>
                        <div class="form-group">
                            <input type="text" id="email" name="email" placeholder="Email address *" value="{{$user->email}}" readonly>
                        </div>

                        <div class="form-group">
                            <input type="text" id="address" name="address" required="" placeholder="Address *" value="{{$user->address}}">
                        </div>

                        <div class="form-group">
                            <input type="text" id="city" name="city" placeholder="City / Town *" value="{{$user->city}}">
                        </div>
                        <div class="form-group">
                            <input type="text" id="state" name="state" placeholder="State*" value="{{$user->state}}">
                        </div>
                        <div class="form-group">
                            <input  type="text" id="postcode" name="postcode" placeholder="Postcode / ZIP *" value="{{$user->postcode}}">
                        </div>



                        <div class="ship_detail">
                            <div class="form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="differentaddress">
                                        <label class="form-check-label label_info" data-bs-toggle="collapse" data-target="#collapseAddress" href="#collapseAddress" aria-controls="collapseAddress" for="differentaddress" id="different"><span>Ship to a different Address?</span></label>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseAddress" class="different_address collapse in">
                                <div class="form-group">
                                    <input type="text"  id="sfirst_name" name="sfirst_name" placeholder="First name *">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="slast_name" name="slast_name" placeholder="Last name *">
                                </div>

                                <div class="form-group">
                                    <input type="text" id="saddress" name="saddress"  placeholder="Address *">
                                </div>
                                <div class="form-group">
                                    <input type="number" id="sphone" name="sphone"  placeholder="Phone *">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="semail" name="semail" placeholder="Email *">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="scity" name="scity" placeholder="City / Town *">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="sstate" name="sstate" placeholder="State / County *">
                                </div>
                                <div class="form-group">
                                    <input  type="text" id="spostcode" name="spostcode" placeholder="Postcode / ZIP *">
                                </div>
                            </div>
                        </div>
                        <div class="mb-20">
                            <h5>Additional information</h5>
                        </div>
                        <div class="form-group mb-30">
                            <textarea rows="5" placeholder="Order notes" name="note"></textarea>
                        </div>
                        
                    
                </div>
                <div class="col-md-6">
                    <div class="order_review">
                        <div class="mb-20">
                            <h4>Slect Shippment Plan</h4>
                        </div>
                        <div class="table-responsive order_table text-center">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Method</th>
                                        <th>Delivery Time</th>
                                        <th>Price</th>
                                        <th>Choose</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($shippings)>0)
                                    @foreach($shippings as $key=>$item)
                                    <tr>
                                        <th scope="row">{{$item->shipping_address}}</th>
                                        <td>{{$item->delivery_time}}</td>
                                        <td>RS {{number_format($item->delivery_charges),2}}</td>
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customradio{{$key}}" name="delivery_charges" value="{{$item->delivery_charges}}" class="custom-control"  style=" width: 25px; height: 25px;" required>
                                                <label class="custom-control-label" for="customRadio{{$key}}"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <h2>No Shipping Method Found!!</h2>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-fill-out btn-block mt-30" style=" float:right;">Next</button>
                </div>
               
                </form>

            </div>
        </div>
    </section>
</main>



@endsection

@section('scripts')
<script>
    $('#differentaddress').click(function(e) {

        if (this.checked) {
            $('#sfirst_name').val("");
            $('#slast_name').val("");
            $('#semail').val("");
            $('#sphone').val("");
            $('#saddress').val("");
            $('#scity').val("");
            $('#sstaet').val("");
            $('#spostcode').val("");


        } else {
            $('#sfirst_name').val($('#first_name').val());
            $('#slast_name').val($('#last_name').val());
            $('#semail').val($('#email').val());
            $('#sphone').val($('#phone').val());
            $('#saddress').val($('#address').val());
            $('#sphone').val($('#phone').val());
            $('#scity').val($('#city').val());
            $('#sstate').val($('#state').val());
            $('#spostcode').val($('#postcode').val());





        }

    })
</script>


@endsection