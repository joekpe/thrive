@extends('layouts.dashboard')

@section('page_title')
CREATE NEW BOOK
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success text-center">
        {{Session::get('success')}}
    </div>
@endif
<form method="POST" action="{{ route('books.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Book Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter name of book" required name="name">
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="currency">Currency</label>
            <select id="currency" class="form-control" name="currency" required>
                <option value="">Choose...</option>
                @foreach ($data[3] as $currency)
                    <option value="{{ $currency->id }}">{{ $currency->name."(".$currency->code.")" }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="price">Selling Price</label>
            <input type="number" class="form-control" id="price" placeholder="Enter price of book" name="selling_price" required>
        </div>
        <div class="form-group col-md-4">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" placeholder="Enter quantity available" name="quantity" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="category">Category</label>
            <select id="category" class="form-control" name="category" required>
              <option value="">Choose...</option>
              @foreach ($data[0] as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="sub_category">Sub Category</label>
            <select id="sub_category" class="form-control" required name="sub_category">
              <option value="">Choose...</option>
              @foreach ($data[1] as $sub_category)
                <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
              @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="sub_category">Location</label>
            <select id="sub_category" class="form-control" name="location">
              <option selected>Choose...</option>
              @foreach ($data[2] as $location)
                <option value="{{ $location->id }}">{{ $location->name }}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="threshold">Threshold</label>
            <input type="number" class="form-control" id="threshold" placeholder="Enter book threshold" name="threshold" min="0" value="0">
        </div>

    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="image">Image</label>
            <button class="btn btn-block btn-primary">
                <input type="file" class="form-control" id="image" name="image" value=""> Pick Image
            </button>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Create Book</button>
</form>
@endsection
