@extends('customers.layouts.master')
@section('content')
<section class="content-grid" style="margin-top: 1em">
    <div class="images-banner"
         style="height: 10em;background-image: url({{asset('website/images/ui/banner003@2x.png')}});background-size: cover ">
        <p style="padding-top: 2em;font-size: 2em;color: #fff"
           align="middle">Cart</p>
    </div>
</section>
 <div class="container">
    @if (session()->has('booksCart'))
        @php
            $counter = 0;
            $sub_total =0;
        @endphp
        <div class="alert alert-warning text-center" role="alert">
            All prices have been converted to Ghana Cedis(GHS)
        </div>
        <div class="hidden-md hidden-xs hidden-sm">
            <table class="table styled-table">
                <thead  style="margin-bottom: 1em">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Book Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (session()->get('booksCart') as $book)
                    @php

                        $rate = App\Models\Book::find($book['book_id'])->multi_currency->rate;
                        $sub_total = $sub_total + (($book['quantity'] * $book['price']) * $rate);
                    @endphp
                    <tr>
                        <th scope="row">{{ $counter += 1 }}</th>
                        <td>{{ $book['book_name'] }}</td>
                        <td>{{ $book['quantity'] }}</td>
                        <td>GHS {{ $book['price'] * $rate }}</td>
                        <td>GHS {{ ($book['quantity'] * $book['price']) * $rate }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @php
            $counter = 0;
            $sub_total =0;
        @endphp
        <div class="hidden-lg">
            {{-- <div class="card">
                <div class="card-body">
                    @foreach (session()->get('booksCart') as $book)
                    @php

                        $rate = App\Models\Book::find($book['book_id'])->multi_currency->rate;
                        $sub_total = $sub_total + (($book['quantity'] * $book['price']) * $rate);
                    @endphp
                    <p style="font-size: 1.5em;">{{ $counter+=1 }}. {{ $book['book_name'] }} - {{ $book['quantity'] }} pcs. x GHS {{ $book['price'] * $rate }}</p><br>
                    @endforeach
                </div>
            </div> --}}
            @forelse(Session::get('booksCart') as $cartBook)
            <li class="list-menu-shop" style="list-style: none;">
                <div class="shop-cart">
                    <div class="image-shop">
                        @php
                            $book = \App\Models\Book::find($cartBook['book_id']);
                        @endphp
                        <img class="pull-left" src="{{ asset('storage/'.$book->image) }}" alt=""
                             style="width: 5em; margin-right: 15px;">
                    </div>
                    <div class="next-shop pull-right">
                        <a href="/delete_cart_item/{{ $cartBook['book_id'] }}"><i class="fa fa-times-circle"></i></a>
                    </div>
                    <div class="list-names" style="font-size: 2em; padding-bottom:5px;">
                        <a href="#">{{ $cartBook['book_name'] }}</a>
                    </div>
                    <span class="price"  style="font-size: 1.6em; padding-bottom:10px;">
                        <span class="amount">{{ App\Models\Book::find($cartBook['book_id'])->multi_currency->code}} {{ $cartBook['price'] }}</span>
                    </span>
                    <div class="list-qty"  style="font-size: 1.3em; padding-top:5px;">
                        <p>QTY: {{ $cartBook['quantity'] }}</p>
                    </div>
                </div>
            </li>
            <br>
            <br>
            <hr>
            @php
                $sub_total = $sub_total + ($cartBook['price'] * $cartBook['quantity']);
            @endphp
        @empty
        @endforelse

        </div>
        <h2>
            Sub Total: GHS {{ $sub_total }}
            <a href="/shipping_details" class="btn btn-primary pull-right" style="padding: 1em">PROCEED</a>
        </h2>
    @else
    <div class="alert alert-warning text-center" role="alert">
        Your cart is empty
    </div>
    @endif
 </div>
@endsection
