@extends('customers.layouts.master')
@section('content')

@php
    $total = 0;
    foreach (session()->get('booksCart') as $cart_book){
        $book = App\Models\Book::find($cart_book['book_id']);

        //converting price to GHS
        $price = $cart_book['price'] * $book->multi_currency->rate;

        $total = $total + ($cart_book['quantity'] * $price);
    }
    $grand_total = $total + $shipping_details->delivery_fee;
@endphp
<section class="content-grid" style="margin-top: 1em">
    <div class="images-banner"
         style="height: 10em;background-image: url({{asset('website/images/ui/banner003@2x.png')}});background-size: cover ">
        <p style="padding-top: 2em;font-size: 2em;color: #fff" align="middle">
            <i class="fa fa-shopping-cart fa-lg"></i><font style="font-size: 1.2em; margin-left: 0.7em">Pay Now</font>
        </p>
    </div>
</section>
<br>
 <div class="container">

     <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
        <div class="row" style="margin-bottom:40px;">
            <div class="col-md-8 col-md-offset-2">



                <input type="hidden" name="first-name" value="{{ $shipping_details->name }}">
                <input type="hidden" name="phone" value="{{ $shipping_details->phone_number }}">
                <input type="hidden" name="email" value="{{ $shipping_details->email }}"> {{-- required --}}
                <input type="hidden" name="orderID" value="{{ 'THR'.$shipping_details->id }}">
                <input type="hidden" name="amount" value="{{ $grand_total * 100 }}"> {{-- required in kobo --}}
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="currency" value="GHS">
                <input type="hidden" name="metadata" value="{{ json_encode($array = ['shipping_details' =>  $shipping_details->id , 'order_id' => 'THR-'.uniqid()."-".$shipping_details->id, ]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}


                @csrf

                <div class="card" align="center">
                    <div class="card-body">
                        <h2 style="font-size: 1.5em;">Cart Total: GHS {{ $total }}</h2><hr>
                        <h2 style="font-size: 1.5em;">Delivery: GHS {{ $shipping_details->delivery_fee }}</h2><hr>
                        <h2 style="font-size: 2em;">Total: GHS {{ $total + $shipping_details->delivery_fee }}</h2>
                        <p>
                            <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!" style="padding: 1em;margin-top: 2em;">
                                <i class="fa fa-credit-card fa-2x"></i><br/><font style="font-size: 1.4em; margin-left: 0.7em">Click to Pay GHS {{  $grand_total }}</font>
                            </button>
                        </p>
                    </div>
                </div>
                 <br>



            </div>
        </div>
    </form>
 </div>
@endsection
