@extends('customers.layouts.master')
@section('content')
    <section class="content-grid" style="margin-top: 1em">
        <div class="images-banner"
             style="height: 10em;background-image: url({{asset('website/images/ui/banner003@2x.png')}});background-size: cover ">
            <p style="padding-top: 2em;font-size: 2em;color: #fff"
               align="middle">{{authorName(request()->route('id'))->name}}'s Books</p>
            <p align="middle" style="padding-top: 1em;font-size: 1em;color: #fff"><em>{{strip_tags(authorBio(request()->route('id'))->bio)}}</em></p>
        </div>
    </section>

    <div class="container" style="margin-top: 5em">
        <div class="row">
            <div class="col-lg-3" style="margin-bottom: 4em">
                <div class="card" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;border: 1px solid white; border-radius: 1em">
                    <div class="card-body">
                            <img src="{{asset('storage/')}}/{{authorName(request()->route('id'))->avatar}}" alt="" style="width: 20em;height: 20em;">
                        <div class="blog-content">
                            <div class="extra">
                                <hr/>
                                <p style="font-size: 1.2em"><i class="fa fa-user"></i> {{authorName(request()->route('id'))->name}}</p>
                                <hr/>
                                <p style="font-size: 1.2em"><i class="fa fa-at"></i> Socials</p>
                                <hr/>
                                <a target="_blank" href="{{authorBio(request()->route('id'))->facebook}}" class="btn btn-primary btn-block btn-lg"><i class="fa fa-facebook"></i> </a>
                                <a style="background-color: blueviolet;" target="_blank" href="{{authorBio(request()->route('id'))->instagram}}" class="btn btn-primary btn-block btn-lg"><i class="fa fa-instagram"></i> </a>
                                <a style="background-color: cornflowerblue" target="_blank" href="{{authorBio(request()->route('id'))->twitter}}" class="btn btn-primary btn-block btn-lg"><i class="fa fa-twitter"></i> </a>
                                <a target="_blank" href="{{authorBio(request()->route('id'))->youtube}}" class="btn btn-danger btn-block btn-lg"><i class="fa fa-youtube"></i> </a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

{{--                <div style="border-left:1px solid #F5F5F5;height:500px"></div>--}}

                <div class="col-lg-9" style="margin-bottom: 2em">
                    <div class="row">
                        @forelse($books as $book)
                        <div class="col-4" style="margin-bottom: 1em">
                            <div class="item top-item">
                                <a href="{{route('website-book-details',$book->id)}}">
                                    <div class="product-image">
                                        <div class="image" style="height: 30em">
                                            <img src="{{asset('storage')}}/{{$book->image}}" alt="" style="object-fit: contain">
                                            <span class="price">
                                        <span class="amount">{{currency($book->currency)->code}}
                                            @if ($book->discount_type == 'none')
                                                {{ number_format((float)$book->selling_price, 2, '.', '') }}
                                            @elseif ($book->discount_type == 'amount')
                                                {{ number_format((float)$book->selling_price - (float)$book->discount_figure, 2, '.', '') }} <span style="text-decoration: line-through;">{{ number_format((float)$book->selling_price, 2, '.', '') }}</span></h3>
                                            @elseif ($book->discount_type == 'percentage')
                                                {{ number_format((float)$book->selling_price - (float)($book->selling_price * ($book->discount_figure / 100)), 2, '.', '') }} <span style="text-decoration: line-through;">{{ number_format((float)$book->selling_price, 2, '.', '') }}</span></h3>
                                            @endif
                                        </span>
                                        </div>
                                    </div>
                                </a>

                                <h4 class="names">
                                    <a href="{{route('website-book-details',$book->id)}}">{{$book->name}}</a>
                                </h4>
                                <hr/>
                                <div class="cart-text product-cart">
                                    <p>
                                        @if($book->quantity == 0)

                                        @else
                                            <a href="javascript:{}" onclick="document.getElementById('{{ $book->id }}').submit();">ADD TO CART</a>
                                        @endif


                                    </p>
                                    {{-- <div class="whishlist">
                                        <a href="#"><i class="fa fa-heart-o"></i></a>
                                    </div> --}}
                                    <div class="refresh">
                                        <a href="/cart"><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                    <form id="{{ $book->id }}" method="POST" action="{{ route('website-book-cart') }}">
                                        @csrf

                                        <input data-step="1" value="1" type="hidden" name="quantity">
                                        @if ($book->discount_type == 'none')
                                            <input type="hidden" name="price" value="{{ number_format((float)$book->selling_price, 2, '.', '') }}">
                                        @elseif ($book->discount_type == 'amount')
                                            <input type="hidden" name="price" value="{{ number_format((float)$book->selling_price - (float)$book->discount_figure, 2, '.', '') }}">
                                        @elseif ($book->discount_type == 'percentage')
                                            <input type="hidden" name="price" value="{{ number_format((float)$book->selling_price - (float)($book->selling_price * ($book->discount_figure / 100)), 2, '.', '') }}">
                                        @endif
                                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                                        <input type="hidden" name="author_id" value="{{ $book->user_id }}">
                                        <input type="hidden" name="book_name" value="{{ $book->name }}">



                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="col-lg-12">
                                <div class="alert alert-primary" role="alert">
                                    Oops! There are no books in our system at this time.
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
        </div>
    </div>
@endsection
