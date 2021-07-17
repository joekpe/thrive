@extends('layouts.dashboard')

@section('page_title')
BOOKS
@endsection

@section('content')
@if(Session::has('success'))
    <div class="alert alert-success text-center">
        {{Session::get('success')}}
    </div>
@elseif (Session::has('error'))
    <div class="alert alert-danger text-center">
        {{Session::get('error')}}
    </div>
@endif  
<div class="card">
    <div class="card-header">
      <h4 class="card-title"> My Books 
        <a href="/books/create" class="btn btn-success btn-xs pull-right">
          <i class="nc-icon nc-plus"></i> <span class="hidden-xs hidden-sm"> + ADD NEW BOOK</span>
        </a>
      </h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead class=" text-primary">
            <tr>
                <th>
                Name
                </th>
                <th>
                    Price
                </th>
          </tr></thead>
          <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>
                        {{ $book->name }}
                    </td>
                    <td>
                        {{ $book->selling_price }}
                    </td>
                    <td>
                        <a href="/books/{{ $book->id }}" class="btn btn-info">
                            <i class="nc-icon nc-minimal-right"></i> <span class="hidden-xs hidden-sm">View</span>
                        </a>
                        <a href="/books/{{ $book->id }}/edit" class="btn btn-success">
                            <i class="nc-icon nc-ruler-pencil"></i> <span class="hidden-xs hidden-sm">Edit</span>
                        </a>
                        <a href="/books/{{ $book->id }}/delete" class="btn btn-danger">
                            <i class="nc-icon nc-simple-remove"></i> <span class="hidden-xs hidden-sm">Delete</span>
                        </a>
                    </td>
                </tr>
            @endforeach
            
          </tbody>
        </table>
        <div>
            {!! $books->links() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
