@extends('layouts.dashboard')

@section('page_title')
{{ strtoupper($book->name) }}
@endsection

@section('content')
<div class="card" style="width: 20rem;">
    <img class="card-img-top" src="{{ asset('storage/'.$book->image) }}" alt="{{ $book->name }}">
    <div class="card-body">
        <h4 class="card-title">{{ $book->name }}</h4>
        <p class="card-text">Price: {{ $book->multi_currency->code." ".$book->selling_price}}</p>
        <p class="card-text">Author: {{ $book->user->name }}</p>
        <a href="/books/{{ $book->id }}/edit" class="btn btn-succes">EDIT</a>
    </div>
</div>
@endsection
