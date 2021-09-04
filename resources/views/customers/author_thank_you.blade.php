@extends('customers.layouts.master')
@section('content')
<div class="jumbotron text-center">
    <h1 class="display-3">Thank You!</h1>
    <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your account setup.</p>
    <hr>
    <p>
      Having trouble? <a href="/contact_us">Contact us</a>
    </p>
    <p class="lead">
      <a class="btn btn-primary btn-sm" href="/" role="button">Continue to homepage</a>
    </p>
    <p class="lead">
        <a class="btn btn-primary btn-sm" href="/login" role="button">Login</a>
    </p>
</div>
@endsection