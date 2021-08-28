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
                    @if (count($withdrawal_requests) > 0)
                        
                    
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
                                        <a onclick="approve_withdrawal({{$withdrawal_request->id}})" class="btn btn-success">
                                            Approve
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else

                        <div class="alert alert-success" align="center">
                            Hooray!!! You have no pending withdrawal requests
                        </div>

                    @endif

                    <div>
                        {!! $withdrawal_requests->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

<script type="text/javascript">
    function approve_withdrawal(id){
        if(confirm("Do you want to approve transaction?")){
            location.href = '/admin/approve_withdrawal/'+id;
            //console.log('/admin/approve_withdrawal/'+id);
        }
    }
</script>
