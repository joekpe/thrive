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
                                    <p class="text-version">This is Photoshop's version of Lorem Ipsum. Proin gravida
                                        nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
                                        nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet
                                        nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec
                                        tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat
                                        consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per
                                        conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu
                                        felis dapibus.
                                    </p>
                                    <span class="price">
											<span
                                                class="amount">{{currency($book->currency)->code}} {{$book->selling_price}}</span>
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
                                                        <input data-step="1" value="1" title="Qty" class="qty" size="4"
                                                               type="text" name="quantity">
                                                        <input type="hidden" name="price" value="{{ $book->selling_price }}">
                                                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                                                        <input type="hidden" name="author_id" value="{{ $book->user_id }}">
                                                        <input type="hidden" name="book_name" value="{{ $book->name }}">
                                                    </div>
                                                    <div class="submit">
                                                        @if($book->quantity == 0)
    
                                                        @else
                                                                <input type="submit" class="sub"  value="ADD TO CART"/>
                                                        @endif
                                                    </div>
    
                                                </div>
                                            </div>
                                        </form>

                                    <div class="sharing-box">
                                        <div class="social-sharing">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-heart"> </i>Add to wishlist</a></li>
                                                <li><a href="#"><i class="fa fa-refresh"></i>Add to compare </a></li>
                                                <li><a href="#"><i class="fa fa-envelope"></i>Emailafriend</a></li>
                                            </ul>

                                        </div>

                                    </div>
                                    <div class="image-icon">
                                        <img src="images/assets/social.png" alt="">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="product-item" style="margin-top: 10em">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="box-title">
                                    <h3>UPSELL PRODUCTS</h3>
                                </div>
                                <div class="title-icon">
                                    <img src="{{asset('website/images/media/banner/title-icon.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="product-img product-clear">
                        <div id="demo2">
                            <div id="owl-demo-post" class="owl-carousel">
                                <div class="item ">
                                    <div class="product-image">

                                        <div class="image">
                                            <img src="images/media/product/bn1.jpg" alt="">
                                            <span class="price">
													<span class="amount">$ 120.000</span>
												</span>
                                        </div>
                                    </div>

                                    <h4 class="names">
                                        <a href="shopping_cart.html">Luxuri Casio G-shock Watches</a>
                                    </h4>
                                    <div class="icon-judge">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-o"></i></li>
                                        </ul>
                                    </div>
                                    <div class="cart-text">
                                        <p><a href="shopping_cart.html">ADD TO CART</a></p>
                                        <div class="whishlist">
                                            <a href="#"><i class="fa fa-heart-o"></i></a>
                                        </div>
                                        <div class="refresh">
                                            <a href="#"><i class="fa fa-refresh"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="product-image">
                                        <div class="image">
                                            <img src="images/media/product/bn2.jpg" alt="">
                                            <span class="price">
													<span class="amount">$ 120.000</span>
												</span>
                                        </div>
                                    </div>

                                    <h4 class="names">
                                        <a href="shopping_cart.html">Luxuri Casio G-shock Watches</a>
                                    </h4>
                                    <div class="icon-judge">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-o"></i></li>
                                        </ul>
                                    </div>
                                    <div class="cart-text">
                                        <p><a href="shopping_cart.html">ADD TO CART</a></p>
                                        <div class="whishlist">
                                            <a href="#"><i class="fa fa-heart-o"></i></a>
                                        </div>
                                        <div class="refresh">
                                            <a href="#"><i class="fa fa-refresh"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="product-image">
                                        <div class="image">
                                            <img src="images/media/product/bn3.jpg" alt="">
                                            <span class="price">
													<span class="amount">$ 120.000</span>
												</span>
                                        </div>
                                    </div>

                                    <h4 class="names">
                                        <a href="shopping_cart.html">Luxuri Casio G-shock Watches</a>
                                    </h4>
                                    <div class="icon-judge">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-o"></i></li>
                                        </ul>
                                    </div>
                                    <div class="cart-text">
                                        <p><a href="shopping_cart.html">ADD TO CART</a></p>
                                        <div class="whishlist">
                                            <a href="#"><i class="fa fa-heart-o"></i></a>
                                        </div>
                                        <div class="refresh">
                                            <a href="#"><i class="fa fa-refresh"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="product-image">
                                        <div class="image">
                                            <img src="images/media/product/bn4.jpg" alt="">
                                            <span class="price">
													<span class="amount">$ 120.000</span>
												</span>
                                        </div>
                                    </div>

                                    <h4 class="names">
                                        <a href="shopping_cart.html">Luxuri Casio G-shock Watches</a>
                                    </h4>
                                    <div class="icon-judge">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-o"></i></li>
                                        </ul>
                                    </div>
                                    <div class="cart-text">
                                        <p><a href="shopping_cart.html">ADD TO CART</a></p>
                                        <div class="whishlist">
                                            <a href="#"><i class="fa fa-heart-o"></i></a>
                                        </div>
                                        <div class="refresh">
                                            <a href="#"><i class="fa fa-refresh"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="product-image">
                                        <div class="image">
                                            <img src="images/media/product/bn1.jpg" alt="">
                                            <span class="price">
													<span class="amount">$ 120.000</span>
												</span>
                                        </div>
                                    </div>

                                    <h4 class="names">
                                        <a href="shopping_cart.html">Luxuri Casio G-shock Watches</a>
                                    </h4>
                                    <div class="icon-judge">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-o"></i></li>
                                        </ul>
                                    </div>
                                    <div class="cart-text">
                                        <p><a href="shopping_cart.html">ADD TO CART</a></p>
                                        <div class="whishlist">
                                            <a href="#"><i class="fa fa-heart-o"></i></a>
                                        </div>
                                        <div class="refresh">
                                            <a href="#"><i class="fa fa-refresh"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="product-image">
                                        <div class="image">
                                            <img src="images/media/product/bn2.jpg" alt="">
                                            <span class="price">
													<span class="amount">$ 120.000</span>
												</span>
                                        </div>
                                    </div>

                                    <h4 class="names">
                                        <a href="shopping_cart.html">Luxuri Casio G-shock Watches</a>
                                    </h4>
                                    <div class="icon-judge">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-o"></i></li>
                                        </ul>
                                    </div>
                                    <div class="cart-text">
                                        <p><a href="shopping_cart.html">ADD TO CART</a></p>
                                        <div class="whishlist">
                                            <a href="#"><i class="fa fa-heart-o"></i></a>
                                        </div>
                                        <div class="refresh">
                                            <a href="#"><i class="fa fa-refresh"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="product-image">
                                        <div class="image">
                                            <img src="images/media/product/bn3.jpg" alt="">
                                            <span class="price">
													<span class="amount">$ 120.000</span>
												</span>
                                        </div>
                                    </div>

                                    <h4 class="names">
                                        <a href="shopping_cart.html">Luxuri Casio G-shock Watches</a>
                                    </h4>
                                    <div class="icon-judge">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-o"></i></li>
                                        </ul>
                                    </div>
                                    <div class="cart-text">
                                        <p><a href="shopping_cart.html">ADD TO CART</a></p>
                                        <div class="whishlist">
                                            <a href="#"><i class="fa fa-heart-o"></i></a>
                                        </div>
                                        <div class="refresh">
                                            <a href="#"><i class="fa fa-refresh"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="product-image">
                                        <div class="image">
                                            <img src="images/media/product/bn4.jpg" alt="">
                                            <span class="price">
													<span class="amount">$ 120.000</span>
												</span>
                                        </div>
                                    </div>

                                    <h4 class="names">
                                        <a href="shopping_cart.html">Luxuri Casio G-shock Watches</a>
                                    </h4>
                                    <div class="icon-judge">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-o"></i></li>
                                        </ul>
                                    </div>
                                    <div class="cart-text">
                                        <p><a href="#">ADD TO CART</a></p>
                                        <div class="whishlist">
                                            <a href="#"><i class="fa fa-heart-o"></i></a>
                                        </div>
                                        <div class="refresh">
                                            <a href="#"><i class="fa fa-refresh"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xs-12  col-md-12 col-lg-3">
                    <div class="main-content">
                        <div class="content-group">
                            <h3><span class="the-after">SEE OTHER CATEGORIES</span></h3>
                            @forelse($categories as $category)
                                <a href="{{route('website-categories-books', $category->id)}}" class="btn btn-default"
                                   type="submit">{{$category->name}}</a>
                            @empty
                                <p>Oops! There are no categories in the system at this time</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
