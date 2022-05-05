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
    <!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Moonshop</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png"/>

    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="plugins/themefisher-font/style.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">

    <!-- Animate css -->
    <link rel="stylesheet" href="plugins/animate/animate.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="plugins/slick/slick.css">
    <link rel="stylesheet" href="plugins/slick/slick-theme.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body id="body">

@include('user.layout.header')
@include('user.layout.navigator')

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Cart</h1>
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active">cart</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="page-wrapper">
    <div class="cart shopping">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="block">
                        <div class="product-list">
                            <form method="post">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="">SẢN PHẨM</th>
                                        <th class="">ĐƠN GIÁ</th>
                                        <th class="">SỐ LƯỢNG</th>
                                        <th class=""></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($productCarts)
                                        @foreach($productCarts as $productCart)
                                            <tr class="product-rows product-{{$productCart['product']->getId()}}">
                                                <td class="">
                                                    <div class="product-info">
                                                        <img class="img-responsive"
                                                             src="{{asset('images/shop/products/' . $productCart['product']->getImageUrl())}}"
                                                             alt="product-img"
                                                             style="object-fit: contain; width: 100%; height: 100px;"
                                                        />
                                                        <a href="#!">{{$productCart['product']->getName()}}</a>
                                                    </div>
                                                </td>
                                                <td class="">{{App\Http\Services\Utility::convertPrice($productCart['product']->getPrice())}}</td>
                                                <td class="">
                                                    <div class="product-price">
                                                        <span class="button"
                                                              id="plus-{{$productCart['product']->getId()}}"><i
                                                                class="tf tf-ion-plus"></i></span>
                                                        <span
                                                            class="quantity-{{$productCart['product']->getId()}}">{{$productCart['quantity']}}</span>
                                                        <span class="button"
                                                              id="minus-{{$productCart['product']->getId()}}"><i
                                                                class="tf tf-ion-minus"></i></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <ul class="action">
                                                        <li><i id="remove-{{$productCart['product']->getId()}}"
                                                               class="tf-ion-close button" data-toggle="modal"
                                                               data-target="#basicModal"></i></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                @if (session()->get('user'))
                                    <a href="/checkout" class="btn btn-main pull-right">Checkout</a>
                                @else
                                    <a href="/login" class="btn btn-main pull-right">Checkout</a>
                                @endif

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('user.layout.footer')

<!--
    Essential Scripts
    =====================================-->

<!-- Main jQuery -->

<!-- Bootstrap 3.1 -->
<script src="../plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- slick Carousel -->
<script src="plugins/slick/slick.min.js"></script>
<script src="plugins/slick/slick-animation.min.js"></script>

<!-- Google Mapl -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script type="text/javascript" src="plugins/google-map/gmap.js"></script>

<!-- Main Js File -->
<script src="js/script.js"></script>
</body>
</html>
