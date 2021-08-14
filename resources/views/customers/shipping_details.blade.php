@extends('customers.layouts.master')
@section('content')
<section class="content-grid" style="margin-top: 1em">
    <div class="images-banner"
         style="height: 10em;background-image: url({{asset('website/images/ui/banner003@2x.png')}});background-size: cover ">
        <p style="padding-top: 2em;font-size: 2em;color: #fff"
           align="middle">Shipping Details</p>
    </div>
</section>
 <div class="container">
     <br>
    <form action="/checkout" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <label for="name" class="form-label">Name</label>
                <input value="{{ $shipping_details->name }}" type="text" class="form-control" id="name" placeholder="Enter your name" name="name">
            </div>
    
            <div class="col">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input required  value="{{ $shipping_details->phone_number }}"  type="text" class="form-control" id="phone_number" placeholder="Enter your phone number" name="phone_number">
            </div>
    
            <div class="col">
                <label for="email" class="form-label">Email</label>
                <input value="{{ $shipping_details->email }}"  type="email" class="form-control" id="email" placeholder="Enter your email" name="email">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input value="{{ $shipping_details->date_of_birth }}"  type="date" class="form-control" id="date_of_birth" name="date_of_birth">
            </div>
    
            <div class="col">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="none">Prefer not to say</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
    
            <div class="col">
                <label for="location" class="form-label">Location</label>
                <input required value="{{ $shipping_details->location }}" type="text" class="form-control" id="location" placeholder="Enter your location" name="location">
            </div>
        </div>
        <button type="submit" class="btn btn-success">CHECKOUT</button>
    </form>
 </div>
@endsection
