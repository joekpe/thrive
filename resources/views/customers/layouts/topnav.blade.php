<header class="page-header">

    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                    <div class="left-topbar">
                        <p>Welcome to our store. Please <a href="{{route('login')}}"> Login </a> or <a href="{{route('register')}}"> Register</a>.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">

                    <div class="right-topbar">
                        <ul>
                            <li  class="tabs-sort-1"><a href="#" style="color: #fff">My Account</a></li>
                            <li  class="tabs-sort-2">Currency :
                                <select id="pgl-names-switch" class=" the-switch">
                                    <option value="">USD</option>
                                    <option value="">EUR</option>
                                </select>
                            </li>

                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="header-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-4">
                    <a class="logo" title="Magento Commerce" href="#">
                        <img  src="{{asset('website/images/ui/logo@2x.png')}}" alt="" style="width: 7em">
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
                                    <li><a href="{{route('website-bestSelling')}}">BEST SELLING</a></li>
                                    <li><a href="{{route('website-allCategories')}}"> ALL CATEGORIES</a></li>
                                </ul>
                            </li>
                            <li><a href="#" title="">CONTACT</a></li>
                        </ul>
                    </nav>

                    <div class="my-cart" style="margin-top: -5em">
                        <div class="abb" >
                            <a href="#" class="shop-icon"> <p>CART <span class="clor-cart">(3)</span> </p></a>
                        </div>
                        <ul class="menu-shop">
                            <li class="list-menu-shop">
                                <div class="shop-cart">
                                    <div class="image-shop">
                                        <img src="{{asset('website/images/ui/book01.jpg')}}" alt="" style="width: 3em">
                                    </div>
                                    <div class="next-shop">
                                        <a href=""><i class="fa fa-times-circle"></i></a>
                                    </div>
                                    <div class="list-names">
                                        <a href="shopping_cart.html">Luxuri Casio G-shock </a>
                                    </div>
                                    <span class="price">
												<span class="amount">$ 120.000</span>
												<span class="amount-3">$ 240.000 </span>
											</span>
                                    <div class="list-qty">
                                        <p>QTY: 01</p>
                                    </div>
                                </div>
                            </li>

                            <li class="shop-input">
                                <div class="text-shop clearfix">
                                    <p class="sub-total">SUBTOTAL</p>
                                    <p class="shop-price">$105.000</p>
                                </div>

                                <span class="list-view">
											<a href="#" class="view-cart">VIEW CART</a>
											<button type="submit" class="btn btn-primary list-check">CHECKOUT</button>
										</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end header content -->
</header>
