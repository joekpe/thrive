@extends('customers.layouts.master')
@section('content')
    <section class="content-grid"  style="margin-top: 1em">
        <div class="images-banner" style="height: 10em;background-image: url({{asset('website/images/ui/banner003@2x.png')}});background-size: cover ">
            <p style="padding-top: 2em;font-size: 2em;color: #fff" align="middle">All Authors</p>
        </div>
    </section>

<div class="container" style="">
    <div class="card">

        <section class="main-content">
            <div class="container">
                <div class="row">
                    <div class="latest-blog">
                        <div class="box-content content-blog">
                        <div class="col-lg-4" style="margin-bottom: 4em">
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

                        <div class="col-lg-4" style="margin-bottom: 4em">
                            <div class="blog-images" style="height: 30em;overflow-y: scroll">
                                <img src="{{asset('website/images/ui/author2.jpeg')}}" alt="">
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

                        <div class="col-lg-4" style="margin-bottom: 4em">

                            <div class="blog-images" style="height: 30em;overflow-y: scroll">
                                <img src="{{asset('website/images/ui/author3.jpeg')}}" alt="">
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

                        </div>

                    </div>
            </div>
            </div>
        </section>

    </div>
</div>
@endsection
