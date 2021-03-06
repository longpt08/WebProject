<?php

use Illuminate\Support\Facades\Auth;

$total = 0;
$productCarts = session()->get('product_cart');
if ($productCarts) {
    foreach ($productCarts as $productCart) {
        $total += optional($productCart['product'])->getPrice() * $productCart['quantity'];
    }
}
$user = Auth::user();
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
                        <svg width="300px" height="29px" viewBox="0 0 155 29" version="1.1"
                             xmlns="http://www.w3.org/2000/svg"
                        >
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
                               font-family="AustinBold, Austin" font-weight="bold">
                                <g id="Group" transform="translate(-136.000000, -297.000000)" fill="#000000">
                                    <text id="AVIATO">
                                        <tspan x="108.94" y="325">MOONSHOP</tspan>
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
                        <a href="/cart" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
                                class="tf-ion-android-cart"></i>GI??? H??NG</a>
                        <div class="dropdown-menu cart-dropdown">
                        @if($productCarts)
                            @foreach($productCarts as $productCart)
                                <!-- Cart Item -->
                                    <div class="media product-{{$productCart['product']->getId()}}">
                                        <a href="/product-single/{{$productCart['product']->getId()}}">
                                            <img class="media-object"
                                                 src="{{asset('images/shop/products/'.$productCart['product']->getImageUrl())}}"
                                                 alt="image" style="height: 80px; object-fit: contain"/>
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a
                                                    href="/product-single/{{$productCart['product']->getId()}}">{{$productCart['product']->name}}</a>
                                            </h4>
                                            <div class="cart-price">
                                                <span
                                                    class="quantity-{{$productCart['product']->getId()}}">{{$productCart['quantity']}} </span>x
                                                <span>{{\App\Http\Services\Utility::convertPrice($productCart['product']->getPrice())}}</span>
                                            </div>
                                            <h5 class="total-{{$productCart['product']->getId()}}">
                                                <strong>{{\App\Http\Services\Utility::convertPrice($productCart['quantity'] * $productCart['product']->getPrice())}}</strong>
                                            </h5>
                                        </div>
                                        <i id="remove-{{$productCart['product']->getId()}}"
                                           class="button tf-ion-close remove" data-toggle="modal"
                                           data-target="#removeModal"></i>
                                    </div><!-- / Cart Item -->
                                @endforeach
                            @endif
                            <div class="cart-summary">
                                <span>T???NG</span>
                                <span class="total-price">{{\App\Http\Services\Utility::convertPrice($total)}}</span>
                            </div>
                            <ul class="text-center cart-buttons">
                                <li><a href="/cart" class="btn btn-small">XEM GI??? H??NG</a></li>
                                <li><a href="/checkout" class="btn btn-small btn-solid-border">THANH TO??N</a></li>
                            </ul>
                        </div>

                    </li><!-- / Cart -->

                    <!-- Search -->
                    <li class="dropdown search dropdown-slide">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
                                class="tf-ion-ios-search-strong"></i> T??M KI???M</a>
                        <ul class="dropdown-menu search-dropdown">
                            <li>
                                <form action="/shop-sidebar" method="GET"><input type="search" name="search"
                                                                                 class="form-control"
                                                                                 placeholder="Search..."></form>
                            </li>
                        </ul>
                    </li><!-- / Search -->

                    <li class="dropdown full-width dropdown-slide">
                        <a href="/profile-details" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-delay="350"
                           role="button" aria-haspopup="true"
                           aria-expanded="false">Hi, @if (isset($user)) {{$user->first_name}} @else Guest @endif <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <div class="dropdown-menu">
                            <div class="row">
                                <!-- Contact -->
                                <div class="col-sm-12">
                                    <ul>
                                        <li class="dropdown-header">C?? NH??N</li>
                                        <li role="separator" class="divider"></li>
                                        @if (!\Illuminate\Support\Facades\Auth::check())
                                            <li><a href="/login">????NG NH???P</a></li>
                                            <li><a href="/sign-up">????NG K??</a></li>
                                        @else
                                            <li><a href="/order">????N H??NG</a></li>
                                            <li><a href="/profile-details">H??? S??</a></li>
                                            <li><a href="/log-out">????NG XU???T</a></li>
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
    <div style="text-align: center">
        <div class="bootstrap-modal">
            <div class="modal fade" id="removeModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">B???N MU???N X??A S???N PH???M N??Y KH???I GI???
                                H??NG?</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">
                                H???Y
                            </button>
                            <button type="button" id="yes" class="btn btn-primary" data-dismiss="modal">?????NG ??
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Top Header Bar -->

