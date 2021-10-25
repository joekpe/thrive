@extends('voyager::master')

@section('page_title', __('Customer Report'))

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-people"></i> Customer Report
        </h1>
       
        
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
                        <th>Customer Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Total Amount Spent</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>
                                {{ $loop->index + 1 }}
                            </td>
                            <td>
                                {{ ucwords($customer->customer->name) }}
                            </td>
                            <td>
                                {{ $customer->customer->phone_number }}
                            </td>
                            <td>
                                {{ $customer->customer->email }}
                            </td>
                            <td>
                                GHS {{ $customer->total_spent }}
                            </td>
                                                
                        </tr>
                    @endforeach
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th>No. </th>
                        <th>Customer Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Total Amount Spent</th>
                        
                    </tr>
                </tfoot>
            </table>
            
        </div>
            
        
    </div>
@stop
