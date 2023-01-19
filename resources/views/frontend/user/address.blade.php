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
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-3 mb-lg-0">
                                    <div class="card-header">
                                        <h5 class="mb-0">Billing Address</h5>
                                    </div>
                                    <div class="card-body">
                                        <address>{{$user->address}}<br> {{$user->state}}<br>{{$user->city}} <br></address>
                                        <p>{{$user->postcode}}</p>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#shipaddress">Edit</a>
                                        <div class="modal fade" id="shipaddress" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Address</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('billing.address',$user->id)}}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="">Address</label>
                                                                <textarea name="address" id="" >{{$user->address}}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Post Code</label>
                                                                <input name="postcode" id="" value="{{$user->postcode}}"></input>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">State</label>
                                                                <input name="state" id="" value="{{$user->state}}"></input>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">City</label>
                                                                <input name="city" id="" value="{{$user->city}}"></input>
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Shipping Address</h5>
                                    </div>
                                    <div class="card-body">
                                    <address>{{$user->saddress}}<br> {{$user->sstate}}<br>{{$user->scity}} <br></address>
                                        <p>{{$user->spostcode}}</p>
                                        <a href="#" class="btn-small" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit</a>
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Shipping Address</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('shipping.address',$user->id)}}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="">Shipping Address</label>
                                                                <textarea name="saddress" id="" >{{$user->saddress}}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Shipping Post Code</label>
                                                                <input name="spostcode" id="" value="{{$user->spostcode}}"></input>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Shipping State</label>
                                                                <input name="sstate" id="" value="{{$user->sstate}}"></input>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Shipping City</label>
                                                                <input name="scity" id="" value="{{$user->scity}}"></input>
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </div>
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
            </div>
        </div>
    </div>
    </div>
</section>

@endsection