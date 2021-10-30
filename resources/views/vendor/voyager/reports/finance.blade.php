@extends('voyager::master')

@section('page_title', __('Finances Report'))

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-wallet"></i> Finances Report
        </h1>
        <p>
            <form method="POST" action="{{ route('finance_specified') }}" class="pull-right" style="color: black;">
                @csrf
                <div class="form-group">
                    <label for="from">From</label>
                    <input type="date" name="from_date" id="from" required>
                
                    <label for="to">To</label>
                    <input type="date" name="to_date" id="to" required>

                    <button type="submit" class="btn btn-success">Go</button>
                </div>
            </form>
        </p>

        
    </div>
@stop
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css"> --}}
 
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

  <script>
    jQuery(document).ready(function($) {
      $('#example').DataTable(
        {
        searching: false,
        paging: false,
        dom: 'Bfrtip',
        buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ],
        }
      );
     
    } );
    </script>


@section('content')
    
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="container p-5">
            <table id="example" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Author Name</th>
                        <th>Transaction Type</th>
                        <th>Amount</th>
                        <th>Balance Left</th>
                        <th>Transaction Date</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($finances as $finance)
                        <tr>
                            <td>
                                {{ $loop->index + 1 }}
                            </td>
                            <td>
                                {{ $finance->author->name }}
                            </td>
                            <td>
                                {{ ucwords($finance->transaction_type) }}
                            </td>
                            <td>
                                {{ $finance->amount }}
                            </td>
                            <td>
                                {{ $finance->balance_left }}
                            </td>
                            <td>
                                {{ $finance->created_at }}
                            </td>
                    
                        </tr>
                    @endforeach
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th>No. </th>
                        <th>Author Name</th>
                        <th>Transaction Type</th>
                        <th>Amount</th>
                        <th>Balance Left</th>
                        <th>Transaction Date</th>
                        
                    </tr>
                </tfoot>
            </table>
            
        </div>
            
        
    </div>
@stop
