@extends('voyager::master')

@section('page_header')
    <h1 class="page-title">
        <i class="icon voyager-credit-card"></i>
        Withdrawal Requests
    </h1>
@stop
@php
    $counter = 0;
@endphp
@section('content')
<div class="page-content browse container-fluid">
    @include('voyager::alerts')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <th>
                                #
                            </th>
                            <th>
                                Author
                            </th>
                            <th>
                                Amount
                            </th>
                            <th>
                                Request Date
                            </th>
                            <th>
                                Approve
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($withdrawal_requests as $withdrawal_request )
                                <tr>
                                    <td>
                                        {{ $counter += 1}}
                                    </td>
                                    <td>
                                        {{ App\Models\User::find($withdrawal_request->user_id)->name }}
                                    </td>
                                    <td>
                                        GHS {{ $withdrawal_request->amount }}
                                    </td>
                                    <td>
                                        {{ $withdrawal_request->created_at }}
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div>
                        {!! $withdrawal_requests->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
