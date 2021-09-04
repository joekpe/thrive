@extends('customers.layouts.master')
@section('content')

    @php
        $order = \App\Models\Order::findOrFail($my_order_id);

        $shipping_details = \App\Models\ShippingDetail::where('email', $order->customer->email)->get();
        $shipping_details = $shipping_details[0];
        $items = \App\Models\Order::where('invoice_number', $order->invoice_number)->get();

        $total = \App\Models\Order::select(DB::raw('sum(book_quantity * book_price) as total'))->where('invoice_number', $order->invoice_number)->get();
        $shipping_details->total = $total[0]['total'];
    @endphp
     <section class="content-grid" style="margin-top: 1em">
         <div class="images-banner"
              style="height: 10em;background-image: url({{asset('website/images/ui/banner003@2x.png')}});background-size: cover ">
             <p style="padding-top: 2em;font-size: 2em;color: #fff"
                align="middle">My Invoice #{{ $order->invoice_number }}</p>
         </div>
     </section>
    <div class="container">
        <div class="card-header">

        </div>
        <div class="card-body">
            <div class="container">
                <div class="row align-items-start">
                    <div class="col-md-4">
                        <h4 style="margin-bottom: 1em">From : Thrive</h4>
                        <p style="margin-bottom: 1em">Thrive Bookstore</p>
                        <p style="margin-bottom: 1em">Suite 240, Greater Accra</p>
                        <p style="margin-bottom: 1em">Accra, 94103</p>
                        <p style="margin-bottom: 1em">Phone: 0302-415-292</p>
                        <p style="margin-bottom: 1em">Email: contact@thrive.store</p>
                    </div>
                    <div class="col-md-4">
                        <h4 style="margin-bottom: 1em">To : {{ $shipping_details->name }}</h4>
                        <p style="margin-bottom: 1em"> {{ $shipping_details->country }}</p>
                        <p style="margin-bottom: 1em"> {{ $shipping_details->region }}</p>
                        <p style="margin-bottom: 1em"> {{ $shipping_details->city }}</p>
                        <p style="margin-bottom: 1em">Phone: {{ $shipping_details->phone_number }}</p>
                        <p style="margin-bottom: 1em">Email: {{ $shipping_details->email }}</p>
                    </div>
                    <div class="col-md-4">
                        <h4 style="margin-bottom: 1em">Payment details</h4>
                        <p style="margin-bottom: 1em">Date: {{ date('d-M-Y', strtotime($order->created_at)) }}</p>
                        <p style="margin-bottom: 1em">Total Amount: GHS {{ $shipping_details->total }}</p>
                        <p style="margin-bottom: 1em">Account Name: {{ $shipping_details->name }}</p>
                    </div>
                </div>

                <div class="row table-row">
                    <table class="table table-striped styled-table">
                    <thead>
                        <tr>
                        <th class="text-center" style="width:5%">#</th>
                        <th style="width:50%">Item</th>
                        <th class="text-right" style="width:15%">Quantity</th>
                        <th class="text-right" style="width:15%">Unit Price</th>
                        <th class="text-right" style="width:15%">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 0;
                        @endphp
                        @foreach ($items as $item)
                        <tr>
                            <td class="text-center">{{ $counter+=1 }}</td>
                            <td>{{ $item->book_name }}</td>
                            <td class="text-right">{{ $item->book_quantity }}</td>
                            <td class="text-right">GHS {{ $item->book_price }}</td>
                            <td class="text-right">GHS {{ $item->book_quantity * $item->book_price}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                    </table>
                    <h4>
                        Total: GHS {{ $shipping_details->total }}
                    </h4>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
