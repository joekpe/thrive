@extends('voyager::master')

@section('page_title', __('voyager::generic.view').' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> {{ __('voyager::generic.viewing') }} {{ ucfirst($dataType->getTranslatedAttribute('display_name_singular')) }} &nbsp;

        @can('edit', $dataTypeContent)
            <a href="{{ route('voyager.'.$dataType->slug.'.edit', $dataTypeContent->getKey()) }}" class="btn btn-info">
                <i class="glyphicon glyphicon-pencil"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.edit') }}</span>
            </a>
        @endcan
        @can('delete', $dataTypeContent)
            @if($isSoftDeleted)
                <a href="{{ route('voyager.'.$dataType->slug.'.restore', $dataTypeContent->getKey()) }}" title="{{ __('voyager::generic.restore') }}" class="btn btn-default restore" data-id="{{ $dataTypeContent->getKey() }}" id="restore-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.restore') }}</span>
                </a>
            @else
                <a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger delete" data-id="{{ $dataTypeContent->getKey() }}" id="delete-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>
                </a>
            @endif
        @endcan
        @can('browse', $dataTypeContent)
        <a href="{{ route('voyager.'.$dataType->slug.'.index') }}" class="btn btn-warning">
            <i class="glyphicon glyphicon-list"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.return_to_list') }}</span>
        </a>
        @endcan
    </h1>
    @include('voyager::multilingual.language-selector')
@stop
@php
    $order = \App\Models\Order::findOrFail($dataTypeContent->id);
        
        $shipping_details = \App\Models\ShippingDetail::where('email', $order->customer->email)->get();
        $shipping_details = $shipping_details[0];
        $items = \App\Models\Order::where('invoice_number', $order->invoice_number)->where('author_id', Auth::user()->id)->get();
        
        $total = \App\Models\Order::select(DB::raw('sum(book_quantity * book_price) as total'))->where('invoice_number', $order->invoice_number)->where('author_id', Auth::user()->id)->get();
        $shipping_details->total = $total[0]['total'];
@endphp

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
                                Total: GHS {{ $shipping_details->total }}
                            </h4>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
