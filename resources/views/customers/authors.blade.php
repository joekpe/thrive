@extends('customers.layouts.master')
@section('content')
    <section class="content-grid" style="margin-top: 1em">
        <div class="images-banner"
             style="height: 10em;background-image: url({{asset('website/images/ui/banner003@2x.png')}});background-size: cover ">
            <p style="padding-top: 2em;font-size: 2em;color: #fff" align="middle">All Authors</p>
        </div>
    </section>

    <div class="container" style="">
        <div class="card">

            <section class="main-content">
                <div class="container-fluid">
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
                                                <p  align="middle">  Oops! There are no authors in our system at this time.</p>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection
