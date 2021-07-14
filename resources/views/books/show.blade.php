@extends('layouts.dashboard')

@section('page_title')
{{ strtoupper($book->name) }}
@endsection

@section('content')
<h1>Books show</h1>
@endsection
