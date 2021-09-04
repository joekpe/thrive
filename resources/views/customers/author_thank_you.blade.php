@extends('customers.layouts.master')
@section('content')
    <section class="content-grid" style="margin-top: 1em">
        <div class="images-banner"
             style="height: 20em;background-image: url({{asset('website/images/ui/banner003@2x.png')}});background-size: cover ">
            <p style="padding-top: 2em;font-size: 2em;color: #fff" align="middle">
                <font style="font-size: 1.2em; margin-left: 0.7em">Thank You!</font>
                <br/>
                <br/>
                <font style="font-size: 0.8em; margin-left: 0.7em"><strong>Please check your email</strong> for further
                    instructions on how to complete your account setup.</font>
                <br/>
                <br/>
            <div class="row">
                <div class="col-lg-12" style="padding: 3em">
                    <a class="btn btn-primary btn-block" href="/login" role="button" style="padding: 1em">Continue Shopping</a>
                </div>
            </div>
            </p>
        </div>
    </section>


{{--    <div class="jumbotron text-center">--}}
{{--        <h1 class="display-3">Thank You!</h1>--}}
{{--        <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your--}}
{{--            account setup.</p>--}}
{{--        <hr>--}}
{{--        <p>--}}
{{--            Having trouble? <a href="/contact_us">Contact us</a>--}}
{{--        </p>--}}
{{--        <p class="lead">--}}
{{--            <a class="btn btn-primary btn-sm" href="/" role="button">Continue to homepage</a>--}}
{{--        </p>--}}
{{--        <div></div>--}}
{{--    </div>--}}
@endsection
