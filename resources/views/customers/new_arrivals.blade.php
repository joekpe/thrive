@extends('customers.layouts.master')
@section('content')
    <section class="content-grid" style="margin-top: 1em">
        <div class="images-banner" style="height: 10em;background-image: url({{asset('website/images/ui/banner003@2x.png')}});background-size: cover ">
            <p style="padding-top: 2em;font-size: 2em;color: #fff" align="middle">New Arrivals</p>
        </div>
    </section>

    <div class="container" style="margin-top: 5em">
        <div class="row">
            @forelse($newArrivals as $newArrival)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" style="margin-bottom: 2em">
                    <div class="item top-item">
                        <a href="{{route('website-book-details', $newArrival->id)}}">
                            <div class="product-image">
                                <div class="image" style="height: 30em">
                                    <img src="{{asset('storage')}}/{{$newArrival->image}}" alt="">
                                    <span class="price">
										<span class="amount">{{currency($newArrival->currency)->code}} {{$newArrival->selling_price}}</span>
                                    </span>
                                </div>
                            </div>
                        </a>

                        <h4 class="names">
                            <a href="{{route('website-book-details', $newArrival->id)}}">{{$newArrival->name}}</a>
                        </h4>
                        <hr/>
                        <div class="cart-text product-cart">
                            <p><a href="#">ADD TO CART</a></p>
                            <div class="whishlist">
                                <a href="#"><i class="fa fa-heart-o"></i></a>
                            </div>
                            <div class="refresh">
                                <a href="#"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12">
                    <div class="alert alert-primary" role="alert">
                        <p  align="middle">Oops! There are no books in our system at this time.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
