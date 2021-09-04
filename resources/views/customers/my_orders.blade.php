@extends('customers.layouts.master')
@section('content')
<section class="content-grid" style="margin-top: 1em">
    <div class="images-banner"
         style="height: 10em;background-image: url({{asset('website/images/ui/banner003@2x.png')}});background-size: cover ">
        <p style="padding-top: 2em;font-size: 2em;color: #fff"
           align="middle">My Orders</p>
    </div>
</section>
 <div class="container">
    @if (count($my_orders) > 0)
        @php
            $counter = 0;
        @endphp
        {{-- <div class="alert alert-warning text-center" role="alert">
            All prices have been converted to Ghana Cedis(GHS)
        </div> --}}
{{--        <table class="table table-striped">--}}
{{--            <thead>--}}
{{--                <tr>--}}
{{--                    <th scope="col">#</th>--}}
{{--                    <th scope="col">Invoice Number</th>--}}
{{--                    <th scope="col">Total</th>--}}
{{--                    <th scope="col">Date</th>--}}
{{--                    <th scope="col">Invoice</th>--}}
{{--                </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--                @foreach ($my_orders as $order)--}}
{{--                <tr>--}}
{{--                    <th scope="row">{{ $counter += 1 }}</th>--}}
{{--                    <td><a href="/invoice/{{ $order->id }}">{{ $order->invoice_number }}</a></td>--}}
{{--                    @php--}}
{{--                        $total = \App\Models\Order::where('invoice_number', $order->invoice_number)->select(DB::raw('sum(book_price * book_quantity) as total'))->get();--}}
{{--                    @endphp--}}
{{--                    <td>GHS {{ $total[0]->total }}</td>--}}
{{--                    <td>{{ date('d-M-Y', strtotime($order->created_at)) }}</td>--}}
{{--                    <td><a href="/invoice/{{ $order->id }}" class="btn btn-success">View</a></td>--}}
{{--                </tr>--}}
{{--                @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}

         <table class="table table-striped styled-table">
             <thead>
             <tr>
             <tr>
                 <th scope="col">#</th>
                 <th scope="col">Invoice Number</th>
                 <th scope="col">Total</th>
                 <th scope="col">Date</th>
                 <th scope="col">Invoice</th>
             </tr>
             </tr>
             </thead>
             <tbody>
             @foreach ($my_orders as $order)
                 <tr>
                     <th scope="row">{{ $counter += 1 }}</th>
                     <td><a href="/invoice/{{ $order->id }}">{{ $order->invoice_number }}</a></td>
                     @php
                         $total = \App\Models\Order::where('invoice_number', $order->invoice_number)->select(DB::raw('sum(book_price * book_quantity) as total'))->get();
                     @endphp
                     <td>GHS {{ $total[0]->total }}</td>
                     <td>{{ date('d-M-Y', strtotime($order->created_at)) }}</td>
                     <td><a href="/invoice/{{ $order->id }}" class="btn btn-success">View</a></td>
                 </tr>
             @endforeach
             </tbody>
         </table>

    @else
    <div class="alert alert-warning text-center" role="alert">
        You haven't made an order yet. Continue shopping.
    </div>
    @endif
 </div>
@endsection
