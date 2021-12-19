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
            <div class="card">
                <div class="card-body">
                    @foreach (session()->get('booksCart') as $book)
                    @php

                        $rate = App\Models\Book::find($book['book_id'])->multi_currency->rate;
                        $sub_total = $sub_total + (($book['quantity'] * $book['price']) * $rate);
                    @endphp
                    <p style="font-size: 1.5em;">{{ $counter+=1 }}. {{ $book['book_name'] }} - {{ $book['quantity'] }} pcs. x GHS {{ $book['price'] * $rate }}</p><br>
                    @endforeach
                </div>
            </div>

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
