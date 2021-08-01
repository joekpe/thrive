@extends('customers.layouts.master')
@section('content')
    <main class="page-main" style="margin-top: 2em">
        <div class="wide_layout relative w_xs_auto">
            <section class="revolution_slider">
                <div class="r_slider">
                    <ul>
                        <li class="f_left" data-transition="cube" data-slotamount="7" data-custom-thumb="{{asset('website/images/ui/slider.jpeg')}}">
                            <img src="{{asset('website/images/ui/slider.jpeg')}}" alt="" data-bgrepeat="no-repeat" data-bgfit="cover" data-bgposition="center center" style="" >
                        </li>
                        <li class="f_left" data-transition="cube" data-slotamount="7" data-custom-thumb="{{asset('website/images/ui/slider.jpeg')}}">
                            <img src="{{asset('website/images/ui/slider02.jpeg')}}" alt="" data-bgrepeat="no-repeat" data-bgfit="cover" data-bgposition="center center" style="" >
                        </li>
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
                    <div class="box-content content-blog">
                        <div id="owl-demo-banner" class="owl-carousel">

                            <div class="item-blog item wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="0ms">
                                <div class="blog-images" style="height: 30em;overflow-y: scroll">
                                    <img src="{{asset('website/images/ui/author1.jpeg')}}" alt="">
                                </div>
                                <div class="blog-content">
                                    <div class="extra">
                                        <h2 class="name"><a href="#" style="color: #212121">PROPHET ATSU MANASSEH</a></h2>
                                        <div class="date">Total Books : 300</div>
                                        <div class="like">Sold : 256</div>
                                    </div>
                                    <div class="des">
                                        This is a small bio on the author to let customers feel personal.
                                        <a href="#" class="read-more">Browse Books</a>
                                    </div>
                                </div>
                            </div>

                            <div class="item-blog item wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="200ms">
                                <div class="blog-images" style="height: 30em;overflow-y: scroll">
                                    <img src="{{asset('website/images/ui/author2.jpeg')}}" alt="">
                                </div>
                                <div class="blog-content">
                                    <div class="extra">
                                        <h2 class="name"><a href="#" style="color: #212121">Pastor Mensah Otabil</a></h2>
                                        <div class="date">Total Books : 300</div>
                                        <div class="like">Sold : 256</div>
                                    </div>
                                    <div class="des">
                                        This is a small bio on the author to let customers feel personal.
                                        <a href="#" class="read-more">Browse Books</a>
                                    </div>
                                </div>
                            </div>

                            <div class="item-blog item wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="400ms">
                                <div class="blog-images"style="height: 30em !important;overflow-y: scroll">
                                    <img src="{{asset('website/images/ui/author3.jpeg')}}" alt="">
                                </div>
                                <div class="blog-content">
                                    <div class="extra">
                                        <h2 class="name"><a href="#" style="color: #212121">REV. AGYIN ASARE</a></h2>
                                        <div class="date">Total Books : 300</div>
                                        <div class="like">Sold : 256</div>
                                    </div>
                                    <div class="des">
                                        This is a small bio on the author to let customers feel personal.
                                        <a href="#" class="read-more">Browse Books</a>
                                    </div>
                                </div>
                            </div>

                            <div class="item-blog item wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="600ms">
                                <div class="blog-images" style="height: 30em;overflow-y: scroll">
                                    <img src="{{asset('website/images/media/banner/blog01.jpg')}}" alt="">
                                </div>
                                <div class="blog-content">
                                    <div class="extra">
                                        <h2 class="name"><a href="#">ANALIZANDO TENDENCIAS</a></h2>
                                        <div class="date">September 09, 2015 </div>
                                        <div class="like">256 like</div>
                                    </div>
                                    <div class="des">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#8217;s standard dummy text ever since.
                                        <a href="#" class="read-more">Read more</a>
                                    </div>
                                </div>
                            </div>

                            <div class="item-blog item wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="0ms">
                                <div class="blog-images" style="height: 30em;overflow-y: scroll">
                                    <img src="{{asset('website/images/media/banner/blog01.jpg')}}" alt="">
                                </div>
                                <div class="blog-content">
                                    <div class="extra">
                                        <h2 class="name"><a href="#">ANALIZANDO TENDENCIAS</a></h2>
                                        <div class="date">September 09, 2015 </div>
                                        <div class="like">256 like</div>
                                    </div>
                                    <div class="des">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#8217;s standard dummy text ever since.
                                        <a href="#" class="read-more">Read more</a>
                                    </div>
                                </div>
                            </div>

                            <div class="item-blog item wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="200ms">
                                <div class="blog-images" style="height: 30em;overflow-y: scroll">
                                    <img src="{{asset('website/images/media/banner/blog01.jpg')}}" alt="">
                                </div>
                                <div class="blog-content">
                                    <div class="extra">
                                        <h2 class="name"><a href="#">ANALIZANDO TENDENCIAS</a></h2>
                                        <div class="date">September 09, 2015 </div>
                                        <div class="like">256 like</div>
                                    </div>
                                    <div class="des">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#8217;s standard dummy text ever since.
                                        <a href="#" class="read-more">Read more</a>
                                    </div>
                                </div>
                            </div>

                            <div class="item-blog item wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="400ms">
                                <div class="blog-images" style="height: 30em;overflow-y: scroll">
                                    <img src="{{asset('website/images/media/banner/blog01.jpg')}}" alt="">
                                </div>
                                <div class="blog-content">
                                    <div class="extra">
                                        <h2 class="name"><a href="#">ANALIZANDO TENDENCIAS</a></h2>
                                        <div class="date">September 09, 2015 </div>
                                        <div class="like">256 like</div>
                                    </div>
                                    <div class="des">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#8217;s standard dummy text ever since.
                                        <a href="#" class="read-more">Read more</a>
                                    </div>
                                </div>
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
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" style="margin-bottom: 2em">
                        <div class="item top-item">
                            <div class="product-image">
                                <div class="image" style="height: 30em">
                                    <img src="{{asset('website/images/ui/book01.jpg')}}" alt="">
                                    <span class="price">
													<span class="amount">$ 120.000</span>
												</span>
                                </div>
                            </div>

                            <h4 class="names">
                                <a href="#">Luxuri Casio G-shock Watches</a>
                            </h4>
                            <div class="icon-judge">
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-half-o"></i> </li>
                                </ul>
                            </div>
                            <div class="cart-text product-cart">
                                <p><a href="shopping_cart.html">ADD TO CART</a></p>
                                <div class="whishlist">
                                    <a href="#"><i class="fa fa-heart-o"></i></a>
                                </div>
                                <div class="refresh">
                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" style="margin-bottom: 2em">
                        <div class="item top-item">
                            <div class="product-image">
                                <div class="image" style="height: 30em">
                                    <img src="{{asset('website/images/ui/book2.jpg')}}" alt="">
                                    <span class="price">
													<span class="amount">$ 120.000</span>
												</span>
                                </div>
                            </div>

                            <h4 class="names">
                                <a href="#">Luxuri Casio G-shock Watches</a>
                            </h4>
                            <div class="icon-judge">
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-half-o"></i> </li>
                                </ul>
                            </div>
                            <div class="cart-text product-cart">
                                <p><a href="shopping_cart.html">ADD TO CART</a></p>
                                <div class="whishlist">
                                    <a href="#"><i class="fa fa-heart-o"></i></a>
                                </div>
                                <div class="refresh">
                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" style="margin-bottom: 2em">
                        <div class="item top-item">
                            <div class="product-image">
                                <div class="image" style="height: 30em">
                                    <img src="{{asset('website/images/ui/book3.jpg')}}" alt="">
                                    <span class="price">
													<span class="amount">$ 120.000</span>
												</span>
                                </div>
                            </div>

                            <h4 class="names">
                                <a href="#">Luxuri Casio G-shock Watches</a>
                            </h4>
                            <div class="icon-judge">
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-half-o"></i> </li>
                                </ul>
                            </div>
                            <div class="cart-text product-cart">
                                <p><a href="shopping_cart.html">ADD TO CART</a></p>
                                <div class="whishlist">
                                    <a href="#"><i class="fa fa-heart-o"></i></a>
                                </div>
                                <div class="refresh">
                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" style="margin-bottom: 2em">
                        <div class="item top-item">
                            <div class="product-image">
                                <div class="image" style="height: 30em">
                                    <img src="{{asset('website/images/ui/book4.jpg')}}" alt="">
                                    <span class="price">
													<span class="amount">$ 120.000</span>
												</span>
                                </div>
                            </div>

                            <h4 class="names">
                                <a href="#">Luxuri Casio G-shock Watches</a>
                            </h4>
                            <div class="icon-judge">
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-half-o"></i> </li>
                                </ul>
                            </div>
                            <div class="cart-text product-cart">
                                <p><a href="shopping_cart.html">ADD TO CART</a></p>
                                <div class="whishlist">
                                    <a href="#"><i class="fa fa-heart-o"></i></a>
                                </div>
                                <div class="refresh">
                                    <a href="#"><i class="fa fa-refresh"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" style="margin-bottom: 2em">
                        <div class="item top-item">
                            <div class="product-image">
                                <div class="image" style="height: 30em">
                                    <img src="{{asset('website/images/ui/book5.jpg')}}" alt="">
                                    <span class="price">
													<span class="amount">$ 120.000</span>
												</span>
                                </div>
                            </div>

                            <h4 class="names">
                                <a href="#">Luxuri Casio G-shock Watches</a>
                            </h4>
                            <div class="icon-judge">
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-half-o"></i> </li>
                                </ul>
                            </div>
                            <div class="cart-text product-cart">
                                <p><a href="shopping_cart.html">ADD TO CART</a></p>
                                <div class="whishlist">
                                    <a href="#"><i class="fa fa-heart-o"></i></a>
                                </div>
                                <div class="refresh">
                                    <a href="#"><i class="fa fa-refresh"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" style="margin-bottom: 2em">
                        <div class="item top-item">
                            <div class="product-image">
                                <div class="image" style="height: 30em">
                                    <img src="{{asset('website/images/ui/book6.jpg')}}" alt="">
                                    <span class="price">
													<span class="amount">$ 120.000</span>
												</span>
                                </div>
                            </div>

                            <h4 class="names">
                                <a href="#">Luxuri Casio G-shock Watches</a>
                            </h4>
                            <div class="icon-judge">
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-half-o"></i> </li>
                                </ul>
                            </div>
                            <div class="cart-text product-cart">
                                <p><a href="shopping_cart.html">ADD TO CART</a></p>
                                <div class="whishlist">
                                    <a href="#"><i class="fa fa-heart-o"></i></a>
                                </div>
                                <div class="refresh">
                                    <a href="#"><i class="fa fa-refresh"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" style="margin-bottom: 2em">
                        <div class="item top-item">
                            <div class="product-image">
                                <div class="image" style="height: 30em">
                                    <img src="{{asset('website/images/ui/book7.jpeg')}}" alt="">
                                    <span class="price">
													<span class="amount">$ 120.000</span>
												</span>
                                </div>
                            </div>

                            <h4 class="names">
                                <a href="#">Luxuri Casio G-shock Watches</a>
                            </h4>
                            <div class="icon-judge">
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-half-o"></i> </li>
                                </ul>
                            </div>
                            <div class="cart-text product-cart">
                                <p><a href="shopping_cart.html">ADD TO CART</a></p>
                                <div class="whishlist">
                                    <a href="#"><i class="fa fa-heart-o"></i></a>
                                </div>
                                <div class="refresh">
                                    <a href="#"><i class="fa fa-refresh"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" style="margin-bottom: 2em">
                        <div class="item top-item">
                            <div class="product-image">
                                <div class="image" style="height: 30em">
                                    <img src="{{asset('website/images/ui/books6.jpeg')}}" alt="">
                                    <span class="price">
													<span class="amount">$ 120.000</span>
												</span>
                                </div>
                            </div>

                            <h4 class="names">
                                <a href="#">Luxuri Casio G-shock Watches</a>
                            </h4>
                            <div class="icon-judge">
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-half-o"></i> </li>
                                </ul>
                            </div>
                            <div class="cart-text product-cart">
                                <p><a href="shopping_cart.html">ADD TO CART</a></p>
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


        </section>
        <!-- end main content -->
    </main>
@endsection
