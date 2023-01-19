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
                                <h5 class="mb-0">Your Orders</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#1357</td>
                                                <td>March 45, 2020</td>
                                                <td>Processing</td>
                                                <td>$125.00 for 2 item</td>
                                                <td><a href="#" class="btn-small d-block">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>#2468</td>
                                                <td>June 29, 2020</td>
                                                <td>Completed</td>
                                                <td>$364.00 for 5 item</td>
                                                <td><a href="#" class="btn-small d-block">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>#2366</td>
                                                <td>August 02, 2020</td>
                                                <td>Completed</td>
                                                <td>$280.00 for 3 item</td>
                                                <td><a href="#" class="btn-small d-block">View</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
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