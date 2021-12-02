@extends('voyager::master')

@section('page_title', __('voyager::generic.view').' '.$dataType->getTranslatedAttribute('display_name_singular'))
@php
        $order = \App\Models\Order::findOrFail($dataTypeContent->id);
        
        $shipping_details = \App\Models\ShippingDetail::where('email', $order->customer->email)->get();
        $shipping_details = $shipping_details[0];
        
        if(Auth::user()->role->name == 'author'){
            $items = \App\Models\Order::where('invoice_number', $order->invoice_number)->where('author_id', Auth::user()->id)->get();
            $total = \App\Models\Order::select(DB::raw('sum(book_quantity * book_price) as total'))->where('invoice_number', $order->invoice_number)->where('author_id', Auth::user()->id)->get();
        }else{
            $items = \App\Models\Order::where('invoice_number', $order->invoice_number)->get();
            $total = \App\Models\Order::select(DB::raw('sum(book_quantity * book_price) as total'))->where('invoice_number', $order->invoice_number)->get();
        }
        
        
        
@endphp
@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> {{ __('voyager::generic.viewing') }} {{ ucfirst($dataType->getTranslatedAttribute('display_name_singular')) }} &nbsp;

        @if(Auth::user()->role->name != 'author')
            
            @if ($order->order_status != 'pending')
                <a href="/admin/order/status?id={{ $order->invoice_number }}&&order_status=pending" class="btn btn-warning">
                    <span class="hidden-xs hidden-sm">Stall Order</span>
                </a>
            @endif

            @if ($order->order_status != 'cancelled')
                <a href="/admin/order/status?id={{ $order->invoice_number }}&&order_status=cancelled" class="btn btn-danger">
                    <span class="hidden-xs hidden-sm">Cancel Order</span>
                </a>
            @endif

            @if ($order->order_status != 'delivered')
                <a href="/admin/order/status?id={{ $order->invoice_number }}&&order_status=delivered" class="btn btn-success">
                    <span class="hidden-xs hidden-sm">Mark as Delivered</span>
                </a>
            @endif

        @endif
    </h1>
    @include('voyager::multilingual.language-selector')
@stop


@section('content')
    <div class="page-content read container-fluid">
        <div class="panel panel-default">
            <div class="container">
                <div class="card-header">
                    <h4>INVOICE #{{ $order->invoice_number }}</h4>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row align-items-start">
                            <div class="col-md-4">
                                <h4>From : Thrive</h4>
                                <p>Thrive Bookstore</p>
                                <p>Suite 240, Greater Accra</p>
                                <p>Accra, 94103</p>
                                <p>Phone: 0302-415-292</p>
                                <p>Email: contact@thrive.store</p>
                            </div>
                            <div class="col-md-4">
                                <h4>To : {{ $shipping_details->name }}</h4>
                                <p> {{ $shipping_details->country }}</p>
                                <p> {{ $shipping_details->region }}</p>
                                <p> {{ $shipping_details->city }}</p>
                                <p>Phone: {{ $shipping_details->phone_number }}</p>
                                <p>Email: {{ $shipping_details->email }}</p>
                            </div>
                            <div class="col-md-4">
                                <h4>Payment details</h4>
                                <p>Date: 14 April 2014</p>
                                <p>VAT: DK888-777 </p>
                                <p>Total Amount: $1019</p>
                                <p>Account Name: Flatter</p>
                            </div>
                        </div>
            
                        <div class="row table-row">
                            <table class="table table-striped">
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
                                Total: GHS {{ $total[0]['total'] }}
                            </h4>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
