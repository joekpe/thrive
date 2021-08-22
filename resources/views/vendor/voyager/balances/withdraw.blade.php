@extends('voyager::master')

@section('page_header')
    <h1 class="page-title">
        <i class="icon voyager-credit-card"></i>
        Withdrawal Request
    </h1>
@stop
@php
    $disabled = '';
@endphp
@section('content')
    <div class="page-content edit-add container-fluid">
        @if (count($pending_requests) > 0)
            @php
                $disabled = 'disabled';
            @endphp
            <div class="alert alert-warning">
                You have {{ count($pending_requests) }} pending request(s)
            </div>
        @endif
        @if (author_balance(Auth::user()->id) <= 0)
            @php
                $disabled = 'disabled';
            @endphp
            <div class="alert alert-danger">
                You account balance is <b>GHS {{ author_balance(Auth::user()->id) }}</b>. You cannot make a withdrawal
            </div>
        @endif
        <div class="row">
            <div class="col-md-6">

                <div class="panel panel-bordered">
                    <!-- form start -->
                   
                    <div class="container">
                        <form method="POST" role="form" action="{{ route('withdrawal_request') }}" class="form-edit-add">
                            @csrf
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
    
                            <div class="form-group col-md-12">
                                <label class="control-label" for="amount">Amount</label>
                                <input type="text" class="form-control" name="sweep_amount" id="amount" required value="{{ author_balance(Auth::user()->id) }}">
                            </div>
    
                            <div class="form-group col-md-12">
                                <label class="control-label" for="amount">Phone number</label>
                                <input type="text" class="form-control" name="sweep_number" id="amount" required value="{{ Auth::user()->phone_number }}">
                            </div>
    
                            <button {{ $disabled }} class="btn btn-success" type="submit">Initiate Request</button>
                        </form>
                    </div>
                    

                </div>
            </div>
            <div class="col-md-6">
                <h4>Pending Requests</h4>
                @if (count($pending_requests) > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Amount</th>
                                <th scope="col">Number</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($pending_requests as $pending_request)
                            <tr>
                                <th scope="col">{{ $pending_request->amount }}</th>
                                <th scope="col">{{ $pending_request->sweep_number }}</th>
                                <th scope="col">{{ $pending_request->created_at }}</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-warning">
                        You have {{ count($pending_requests) }} pending request(s).
                    </div>
                @endif
            </div>
        </div>
    </div>

@stop
