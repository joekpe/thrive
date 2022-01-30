<header class="page-header">

    <div class="topbar">
        <div class="container">
            <div class="row">
                @guest
                    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                        <div class="left-topbar">
                            <p>Welcome to our store. Please <a href="{{route('login')}}"> Login </a> or <a
                                    href="{{route('register')}}"> Register</a>.</p>
                        </div>
                    </div>
                @else
                <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                    <div class="left-topbar">
                        <p>
                            <a style="color: #fff; text-decoration: none" href="/my_orders">My Orders</a> |
                            <a style="color: #fff; text-decoration: none" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </p>
                    </div>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                @endguest

                <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">

                    <div class="right-topbar">
                        <ul>
                            @guest
                                <li class="tabs-sort-1"><a href="/login" style="color: #fff">My Account</a></li>
                            @else
                            <li class="tabs-sort-1"><a href="#" style="color: #fff">{{ Auth::user()->name }}</a></li>
                            @endguest

                            {{-- <li class="tabs-sort-2">Currency :
                                <select id="pgl-names-switch" class=" the-switch">
                                    <option value="">USD</option>
                                    <option value="">EUR</option>
                                </select>
                            </li> --}}

                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </div>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <p align="middle" align="middle">{{ Session::get('success') }}</p>
        </div>
    @endif
    @if(Session::has('errorMessage'))
        <div class="alert alert-danger" role="alert">
            <p align="middle">{{ Session::get('errorMessage') }}</p>
        </div>
    @endif
    <div class="header-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-4">
                    <a class="logo" title="Magento Commerce" href="/">
                        <img src="{{asset('logo.png')}}" alt="" style="width: 6em">
                    </a>
                </div> <!-- logo -->
                <div class=" col-xs-12 col-sm-12 col-md-9 col-lg-8">
                    <nav>
                        <ul class="main-nav nav-tabs" id="main-menu">
                            <li><a class="active" href="{{route('website-home')}}" title="">HOME</a></li>
                            <li><a href="{{route('website-authors')}}" title="">AUTHORS</a></li>
                            <li><a href="{{route('website-newArrivals')}}" title="">NEW ARRIVALS</a></li>
                            <li><a href="#" title="">OUR SHOP</a>
                                <ul>
                                    <li><a href="{{route('website-allBooks')}}">ALL BOOKS</a></li>
                                    {{-- <li><a href="{{route('website-bestSelling')}}">BEST SELLING</a></li> --}}
                                    <li><a href="{{route('website-allCategories')}}"> ALL CATEGORIES</a></li>
                                </ul>
                            </li>
{{--                            <li><a href="#" title="">CONTACT</a></li>--}}
                        </ul>
                    </nav>

                    @if(Session::get('booksCart'))
                    <div class="my-cart" style="margin-top: -5em">
                        <div class="abb">
                            <a href="#" class="shop-icon"><p>CART <span class="clor-cart">({{count(Session::get('booksCart') ? Session::get('booksCart') : [])}})</span>
                                </p></a>
                        </div>
                        <ul class="menu-shop">

                                {{-- @php
                                    $sub_total = 0;
                                @endphp --}}
                                @forelse(Session::get('booksCart') as $cartBook)
                                    <li class="list-menu-shop">
                                        <div class="shop-cart">
                                            <div class="image-shop">
                                                @php
                                                    $book = \App\Models\Book::find($cartBook['book_id']);
                                                @endphp
                                                <img src="{{ asset('storage/'.$book->image) }}" alt=""
                                                     style="width: 3em">
                                            </div>
                                            <div class="next-shop">
                                                <a href="/delete_cart_item/{{ $cartBook['book_id'] }}"><i class="fa fa-times-circle"></i></a>
                                            </div>
                                            <div class="list-names">
                                                <a href="#">{{ $cartBook['book_name'] }}</a>
                                            </div>
                                            <span class="price">
												<span class="amount">{{ App\Models\Book::find($cartBook['book_id'])->multi_currency->code}} {{ $cartBook['price'] }}</span>
											</span>
                                            <div class="list-qty">
                                                <p>QTY: {{ $cartBook['quantity'] }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    {{-- @php
                                        $sub_total = $sub_total + ($cartBook['price'] * $cartBook['quantity']);
                                    @endphp --}}
                                @empty
                                @endforelse


                            <li class="shop-input">
                                {{-- <div class="text-shop clearfix">
                                    <p class="sub-total">SUBTOTAL</p>
                                    <p class="shop-price">{{ $sub_total }}</p>
                                </div> --}}

                                <span class="list-view">
											<a href="{{ route('cart') }}" class="view-cart">VIEW CART</a>
											<a href="/clear_cart" class="view-cart">CLEAR CART</a>
										</span>
                            </li>
                        </ul>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
    <!-- end header content -->
</header>
