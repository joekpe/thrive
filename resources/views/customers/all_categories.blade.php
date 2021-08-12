@extends('customers.layouts.master')
@section('content')
    <section class="content-grid" style="margin-top: 1em">
        <div class="images-banner" style="height: 10em;background-image: url({{asset('website/images/ui/banner003@2x.png')}});background-size: cover ">
            <p style="padding-top: 2em;font-size: 2em;color: #fff" align="middle">All Categories</p>
        </div>
    </section>

    <div class="container" style="margin-top: 5em">
        <div class="row">
            @forelse($categories as $category)
            <div class="col-lg-4">
                <a href="{{route('website-categories-books', $category->id)}}">
                    <div class="card" style="height: 7em">
                        <p align="middle" style="font-size: 1.5em;margin-top:2em"><i class="fa fa-bookmark-o"></i> {{$category->name}} </p>
                        <br/>
                    </div>
                </a>
            </div>
            @empty
                <div class="col-lg-12">
                    <div class="alert alert-primary" role="alert">
                        There are no categories in the system at this time.
                    </div>
                </div>
            @endforelse

        </div>
    </div>
@endsection
