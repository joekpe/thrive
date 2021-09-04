@extends('customers.layouts.master')
@section('content')
    <main class="page-main" style="margin-top: 2em">
        <div class="wide_layout relative w_xs_auto">
            <section class="revolution_slider">
                <div class="r_slider">
                    <ul>
                        @forelse ($sliders as $slider)
                        <li class="f_left" data-transition="cube" data-slotamount="7"
                            data-custom-thumb="{{ asset('storage/'.$slider->image) }}">
                            <img src="{{ asset('storage/'.$slider->image) }}" alt="" data-bgrepeat="no-repeat"
                                data-bgfit="cover" data-bgposition="center center" style="">
                        </li>

                        @empty
                            <li class="f_left" data-transition="cube" data-slotamount="7"
                                data-custom-thumb="{{ asset('website/images/ui/banner@2x.png') }}">
                                <img src="{{ asset('website/images/ui/banner@2x.png') }}" alt="" data-bgrepeat="no-repeat"
                                     data-bgfit="cover" data-bgposition="center center" style="">
                            </li>
                        @endforelse
                    </ul>
                </div>
            </section>
        </div>

        <section class="main-content">
            <div class="policy-v1 ">
                <div class="container">
                    <div class="row row-gutter-10">
                        <div class="col-sm-4">
                            <div class="policy-item">
                                <h3>Same Day Delivery Service</h3>
                                <span>Receive your copies now</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="policy-item mid">
                                <h3>Best Selling Christian Books</h3>
                                <span>from all the best writers</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="policy-item ">
                                <h3>
                                    Signed Copies Available
                                </h3>
                                <span>exclusive sale</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="latest-blog " style="margin-top: 10em">
                <div class="container">
                    <div class="box-title">
                        <h3 class="h3-title">
                            TOP AUTHORS WITH BEST SELLING BOOKS
                        </h3>
                        <div class="title-icon margin-bottom-50">
                            <img src="{{asset('website/images/media/banner/title-icon.jpg')}}" alt="">
                        </div>
                    </div>


                    <div class="latest-blog">
                        <div class="box-content content-blog">
                            <div class="row">
                                @forelse($authors as $author)
                                    <div class="col-lg-4" style="margin-bottom: 4em">
                                        <div class="blog-images" style="height: 30em;overflow-y: scroll">
                                            <img src="{{asset('storage')}}/{{$author->avatar}}" alt="">
                                        </div>
                                        <div class="blog-content">
                                            <div class="extra">
                                                <h2 class="name"><a href="#"
                                                                    style="color: #212121">{{$author->name}}</a></h2>
                                                <div class="date">Total Books : {{totalBooks($author->id)}}</div>
                                                <div class="like">Sold : {{ books_sold($author->id) }}</div>
                                            </div>
                                            <div class="des">
                                                <a href="{{route('website-authors-books', $author->id)}}"
                                                   class="read-more">Browse Books</a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-lg-12">
                                        <div class="alert alert-primary" role="alert">
                                            <p  align="middle">Oops! There are no authors in our system at this time.</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="top-contten">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title_nav">
                                <ul class="nav nav-tabs clearfix">
                                    <li><a class="active" href="#tabs-2">New Arrivals</a></li>
                                </ul>
                                <div class="title-icon margin-bottom-50">
                                    <img src="{{asset('website/images/media/banner/title-icon.jpg')}}" alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    @forelse($newArrivals as $newArrival)
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" style="margin-bottom: 2em">
                            <div class="item top-item">
                                <a href="{{route('website-book-details', $newArrival->id)}}">
                                    <div class="product-image">
                                        <div class="image" style="height: 30em">
                                            <img src="{{asset('storage')}}/{{$newArrival->image}}" alt="">
                                            <span class="price">
													<span
                                                        class="amount">{{currency($newArrival->currency)->code}} {{$newArrival->selling_price}}</span>
												</span>
                                        </div>
                                    </div>
                                </a>

                                <h4 class="names">
                                    <a href="{{route('website-book-details', $newArrival->id)}}">{{$newArrival->name}}</a>
                                </h4>
                                <hr/>
                                <div class="cart-text product-cart">
                                    <p>
                                        @if($newArrival->quantity == 0)

                                        @else
                                        <a href="javascript:{}" onclick="document.getElementById('{{ $newArrival->id }}').submit();">ADD TO CART</a>
                                        @endif


                                    </p>
                                    {{-- <div class="whishlist">
                                        <a href="#"><i class="fa fa-heart-o"></i></a>
                                    </div> --}}
                                    <div class="refresh">
                                        <a href="/cart"><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                    <form id="{{ $newArrival->id }}" method="POST" action="{{ route('website-book-cart') }}">
                                        @csrf

                                        <input data-step="1" value="1" type="hidden" name="quantity">
                                        <input type="hidden" name="price" value="{{ $newArrival->selling_price }}">
                                        <input type="hidden" name="book_id" value="{{ $newArrival->id }}">
                                        <input type="hidden" name="author_id" value="{{ $newArrival->user_id }}">
                                        <input type="hidden" name="book_name" value="{{ $newArrival->name }}">



                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-12">
                            <div class="alert alert-primary" role="alert">
                                <p  align="middle"> Oops! There are no books in our system at this time.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="top-contten" style="margin-top: 10em">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title_nav">
                                <ul class="nav nav-tabs clearfix">
                                    <li><a class="active" href="#tabs-2">Best Selling Books</a></li>
                                </ul>
                                <div class="title-icon margin-bottom-50">
                                    <img src="{{asset('website/images/media/banner/title-icon.jpg')}}" alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    @forelse($books as $book)
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" style="margin-bottom: 2em">
                            <div class="item top-item">
                                <a href="{{route('website-book-details', $book->id)}}">
                                    <div class="product-image">
                                        <div class="image" style="height: 30em">
                                            <img src="{{asset('storage')}}/{{$book->image}}" alt="">
                                            <span class="price">
													<span
                                                        class="amount">{{currency($book->currency)->code}} {{$book->selling_price}}</span>
												</span>
                                        </div>
                                    </div>
                                </a>

                                <h4 class="names">
                                    <a href="{{route('website-book-details', $book->id)}}">{{$book->name}}</a>
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
                                        <input type="hidden" name="price" value="{{ $book->selling_price }}">
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
                                <p  align="middle"> Oops! There are no books in our system at this time.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>


        </section>
        <!-- end main content -->
    </main>
@endsection
