<?php
    $productCarts = session()->get('product_cart');
    if ($productCarts) {
        $productCounts = array_count_values(array_column(session()->get('product_cart'), 'id'));
        $total = array_sum(array_column(session()->get('product_cart'), 'price'));
    } else {
        $total = 0;
    }
    $user = session()->get('user');
?>
<!-- Start Top Header Bar -->
<section class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="contact-number">
                    <i class="tf-ion-ios-telephone"></i>
                    <span>0123-4567-89</span>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Site Logo -->
                <div class="logo text-center">
                    <a href="/">
                        <!-- replace logo here -->
                        <svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1"
                             xmlns="http://www.w3.org/2000/svg"
                        >
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
                               font-family="AustinBold, Austin" font-weight="bold">
                                <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                                    <text id="AVIATO">
                                        <tspan x="108.94" y="325">AVIATO</tspan>
                                    </text>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Cart -->
                <ul class="top-menu text-right list-inline">
                    <li class="dropdown cart-nav dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
                                class="tf-ion-android-cart"></i>Cart</a>
                        <div class="dropdown-menu cart-dropdown">
                        @if($productCarts)
                            @foreach($productCounts as $key => $value)
                                @foreach($productCarts as $productCart)
                                    @if($key == $productCart['id'])
                                        <!-- Cart Item -->
                                            <div class="media">
                                                <a class="pull-left" href="/product-single/{{$productCart->id}}">
                                                    <img class="media-object" src="images/shop/cart/cart-1.jpg"
                                                         alt="image"/>
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><a href="/product-single/{{$productCart['id']}}">{{$productCart['name']}}</a></h4>
                                                    <div class="cart-price">
                                                        <span>{{$value}} x </span>
                                                        <span>{{$productCart['price']}}</span>
                                                    </div>
                                                    <h5><strong>{{$value * $productCart['price']}}</strong></h5>
                                                </div>
                                                <a href="remove-cart/{{$productCart['id']}}" class="remove"><i class="tf-ion-close"></i></a>
                                            </div><!-- / Cart Item -->
                                            @break
                                        @endif
                                    @endforeach
                                @endforeach
                            @endif
                            <div class="cart-summary">
                                <span>Total</span>
                                <span class="total-price">${{$total}}</span>
                            </div>
                            <ul class="text-center cart-buttons">
                                <li><a href="/cart" class="btn btn-small">View Cart</a></li>
                                    <li><a href="/checkout" class="btn btn-small btn-solid-border">Checkout</a></li>
                            </ul>
                        </div>

                    </li><!-- / Cart -->

                    <!-- Search -->
                    <li class="dropdown search dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
                                class="tf-ion-ios-search-strong"></i> Search</a>
                        <ul class="dropdown-menu search-dropdown">
                            <li>
                                <form action="/shop-sidebar" method="GET"><input type="search" name="search" class="form-control" placeholder="Search..."></form>
                            </li>
                        </ul>
                    </li><!-- / Search -->

                    <li class="dropdown full-width dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
                           role="button" aria-haspopup="true" aria-expanded="false">Hi, @if (isset($product)) {{$product->first_name}} @else Guest @endif <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <div class="dropdown-menu">
                            <div class="row">
                                <!-- Contact -->
                                <div class="col-sm-3 col-xs-12">
                                    <ul>
                                        <li class="dropdown-header">Personal</li>
                                        <li role="separator" class="divider"></li>
                                        @if (!\Illuminate\Support\Facades\Auth::check())
                                            <li><a href="/login">Log In</a></li>
                                            <li><a href="/sign-up">Sign Up</a></li>
                                        @else
                                            <li><a href="/order">Orders</a></li>
                                            <li><a href="/profile-details">Profile Details</a></li>
                                            <li><a href="/log-out">Log Out</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div><!-- / .row -->
                        </div><!-- / .dropdown-menu -->
                    </li><!-- / Personal -->

                </ul><!-- / .nav .navbar-nav .navbar-right -->
            </div>
        </div>
    </div>
</section><!-- End Top Header Bar -->
