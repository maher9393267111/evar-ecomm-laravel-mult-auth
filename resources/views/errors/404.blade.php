@extends('frontend.layouts.master')

@section('content')
<main class="main page-404">
        <div class="container">
            <div class="row align-items-center height-100vh text-center">
                <div class="col-lg-8 m-auto">
                    <p class="mb-50"><img src="{{asset('frontend/assets/imgs/theme/404.png')}}" alt="" class="hover-up"></p>
                    <h2 class="mb-30">Page Not Found</h2>
                    <p class="font-lg text-grey-700 mb-30">
                        The link you clicked may be broken or the page may have been removed.<br> visit the <a href="index.html"> <span> Homepage</span></a> or <a href="page-contact.html"><span>Contact us</span></a> about the problem
                    </p>
                    <form class="contact-form-style text-center" id="contact-form" action="#" method="post">
                        <div class="row">
                            <div class="col-lg-6 m-auto">
                                <div class="input-style mb-20 hover-up">
                                    <input name="name" placeholder="Search" type="text">
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-default submit-auto-width font-xs hover-up" href="{{route('front')}}">Back To Home Page</a>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection
