@extends('customers.layouts.master')
@section('content')
    <section class="content-grid" style="margin-top: 1em">
        <div class="images-banner"
             style="height: 10em;background-image: url({{asset('website/images/ui/banner003@2x.png')}});background-size: cover ">
            <p style="padding-top: 2em;font-size: 2em;color: #fff"
               align="middle">{{categoryName(request()->route('id'))->name}} - Category</p>
        </div>
    </section>

    <div class="container" style="margin-top: 5em">
        <div class="row">
            @forelse($books as $book)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" style="margin-bottom: 2em">
                    <div class="item top-item">
                        <a href="{{route('website-book-details',$book->id)}}">
                            <div class="product-image">
                                <div class="image" style="height: 30em">
                                    <img src="{{asset('storage')}}/{{$book->image}}" alt="">
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
@endsection
