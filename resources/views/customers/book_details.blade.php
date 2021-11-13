@extends('customers.layouts.master')

@section('content')
    <section class="content-grid" style="margin-top: 1em">
        <div class="images-banner"
             style="height: 10em;background-image: url({{asset('website/images/ui/banner003@2x.png')}});background-size: cover ">
            <p style="padding-top: 2em;font-size: 2em;color: #fff"
               align="middle">{{bookDetails(request()->route('id'))->name}}</p>
        </div>
    </section>

    <div class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                    <div class="section-left">
                        <div class="row">
                            <div class="col-xs-12 col-md-5 col-lg-5">
                                <div class="content-img clearfix">
                                    <img id="zoom_01" src="{{asset('storage')}}/{{$book->image}}"
                                         data-zoom-image="{{asset('storage')}}/{{$book->image}}" alt=""/>

                                </div>
                            </div>
                            <div class="col-md-7 col-lg-7">
                                <div class="text-content">
                                    <h3>{{$book->name}}</h3>
                                    <div class="product-icon">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                        {!! strlen($book->description) > 0 ? $book->description : 'No description' !!}
                                    <hr>
                                    <br>
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
                                    <br/>
                                    <br/>
                                    @if($book->quantity < $book->threshold && $book->quantity > 0)
                                        <div class="availi">
                                            <p>Availability: <a href="#"><span class="in-stock" style="color: #FF8F00"> Limited Stock <strong>( {{$book->quantity}} Copies Left )</strong></span></a>
                                            </p>
                                        </div>
                                    @elseif($book->quantity == 0)
                                        <div class="availi">
                                            <p>Availability: <a href="#"><span class="in-stock" style="color: #cc0000"> Out Stock</span></a>
                                            </p>
                                        </div>
                                    @else
                                        <div class="availi">
                                            <p>Availability: <a href="#"><span class="in-stock"> In Stock</span></a></p>
                                        </div>
                                    @endif

                                        <form method="POST" action="{{ route('website-book-cart') }}">
                                            @csrf
                                            <div class="product-signle-options clearfix">
                                                <div class="selector-wrapper size">
                                                    <label>Qty :</label>
                                                    <div class="quantity">
                                                        <input data-step="1" value="1" title="Qty" class="qty" size="4" type="number" name="quantity" min="1" max="{{ $book->quantity }}">
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
                                                    </div>
                                                    <div class="submit">
                                                        @if($book->quantity == 0)

                                                        @else
                                                                <button type="submit" class="sub"> ADD TO CART </button>
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>
                                        </form>

                                    <div class="sharing-box">
                                        <div class="social-sharing">
                                            <ul>
                                                <li><a href="whatsapp://send?text={{$_SERVER['HTTP_HOST']}}{{ $_SERVER['REQUEST_URI'] }}"><i class="fa fa-heart"> </i>Share on WhatsApp</a></li>
                                                <li>
                                                    <a href="mailto:?subject=I wanted you to see this book&amp;body=Check out this site {{$_SERVER['HTTP_HOST']}}{{ $_SERVER['REQUEST_URI'] }}"><i class="fa fa-envelope"></i>Email a friend</a>
                                                </li>
                                            </ul>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        @php
                            $reviews = \App\Models\Review::where('book_id', $book->id)->get();
                        @endphp

                        @guest
                        @else
                            <br/>
                            <br/>
                        <hr/>
                            <br/>
                        <div class="col-lg-4">
                            <div class="card" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 1em">
                                <div class="card-body">
                                    <p style="font-size: 1.2em;font-weight: bold">Add A Review Comment</p>
                                    <hr/>
                                    <form action="{{ route('save_review') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6" style="display: none">
                                                <div class="form-group">
                                                    <label for="review-name">Your Name</label>
                                                    <input class="form-control" type="text" id="review-name" required value="{{ Auth::user()->name }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6" style="display: none">
                                                <div class="form-group">
                                                    <label for="review-email">Your Email</label>
                                                    <input class="form-control" type="email" id="review-email" required value="{{ Auth::user()->email }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="product_id" value="{{ $book->id }}">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="review-subject">Subject</label>
                                                    <input class="form-control" type="text" id="review-subject" name="subject" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label for="review-rating" style="margin-bottom: 1em">Rating</label>
                                                    <select class="form-control" id="review-rating" name="rating" style="padding: 2em">
                                                        <option value="5">5 Stars</option>
                                                        <option value="4">4 Stars</option>
                                                        <option value="3">3 Stars</option>
                                                        <option value="2">2 Stars</option>
                                                        <option value="1">1 Star</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="review-message" style="margin-bottom: 1em">Review</label>
                                            <textarea class="form-control" id="review-message" rows="8" required name="comment"></textarea>
                                        </div>
                                        <br/>
                                        <button type="submit" class="btn col-12 btn-primary p-4">Submit Review</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endguest

                        <div class="col-lg-8">
                            <br/>
                            <h3>Latest Reviews</h3>
                            <br/>
                            @forelse ($reviews as $review)
                                @php
                                    $counter = 0;
                                    $user = App\Models\User::find($review->user_id);
                                @endphp
                                <div class="single-review">
                                    <img src="/storage/{{ $user->avatar }}" alt="#">
                                    <div class="review-info">
                                        <h4>Subject: {{ $review->subject }}
                                            <span>Name:{{ $user->name }}</span>
                                        </h4>
                                        @while ( $counter < $review->rating)
                                            <i class="fa fa-star"></i>
                                            @php
                                                $counter += 1;
                                            @endphp
                                        @endwhile
                                        <p>Comment: {{ $review->comment }}</p>
                                    </div>
                                </div>
                            @empty
                                <div class="alert alert-primary">There are no reviews for this product</div>
                            @endforelse
                        </div>
                    </div>

                    <div class="col-xs-12  col-md-12 col-lg-12">
                        <div class="main-content">
                            <div class="content-group">
                                <h3><span class="the-after">SEE OTHER RELATED BOOKS</span></h3>
                                <br/>
                                @forelse($related_books as $books)
                                    @if($books->category !== $book->category)
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" style="margin-bottom: 2em">
                                        <div class="item top-item">
                                            <a href="{{route('website-book-details',$book->id)}}">
                                                <div class="product-image">
                                                    <div class="image">
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
                                    @else
                                        <p>Oops! There are no related books in the system</p>
                                    @endif
                                @empty
                                    <p>Oops! There are no related books in the system</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
