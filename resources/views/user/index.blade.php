<?php
$user = \Illuminate\Support\Facades\Auth::user();
session()->put(['current' => 'index']);
?>
    <!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Moon</title>

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

<div class="hero-slider">
    <div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-center">
                    <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
                    <h1 style="font-size: 60px" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">
                        Sản phẩm nhập khẩu <br>
                        chất lượng quốc tế.</h1>
                    <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                       href="/shop-sidebar">Mua Ngay</a>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider-3.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-left">
                    <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
                    <h1 style="font-size: 60px" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">
                        Nguyên liệu cao cấp <br>
                        tạo nên chiếc bánh ngon.</h1>
                    <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                       href="/shop-sidebar">Mua Ngay</a>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-right">
                    <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
                    <h1 style="font-size: 60px" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">
                        Nghệ thuật của ẩm thực
                        <br> tinh túy trong trang trí.</h1>
                    <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                       href="/shop-sidebar">Mua Ngay</a>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="product-category section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title text-center">
                    <h2>DANH MỤC NỔI BẬT</h2>
                </div>
            </div>
            @if ($categories->count() == 4)
                <div class="col-md-6">
                    <div class="category-box">
                        <a href="/shop-sidebar?category={{$categories[0]->id}}">
                            <img src="images/shop/categories/{{$categories[0]->image_url}}" alt=""/>
                            <div class="content">
                                <h3>{{$categories[0]->name}}</h3>
                                <p>{{$categories[0]->description}}</p>
                            </div>
                        </a>
                    </div>
                    <div class="category-box">
                        <a href="/shop-sidebar?category={{$categories[1]->id}}">
                            <img src="images/shop/categories/{{$categories[1]->image_url}}" alt=""/>
                            <div class="content">
                                <h3>{{$categories[1]->name}}</h3>
                                <p>{{$categories[1]->description}}</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="category-box">
                        <a href="/shop-sidebar?category={{$categories[2]->id}}">
                            <img src="images/shop/categories/{{$categories[2]->image_url}}" alt=""/>
                            <div class="content">
                                <h3>{{$categories[2]->name}}</h3>
                                <p>{{$categories[2]->description}}</p>
                            </div>
                        </a>
                    </div>
                    <div class="category-box">
                        <a href="/shop-sidebar?category={{$categories[3]->id}}">
                            <img src="images/shop/categories/{{$categories[3]->image_url}}" alt=""/>
                            <div class="content">
                                <h3>{{$categories[3]->name}}</h3>
                                <p>{{$categories[3]->description}}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endif
            @if ($categories->count() == 3)
                <div class="col-md-6">
                    <div class="category-box">
                        <a href="/shop-sidebar?category={{$categories[0]->id}}">
                            <img src="images/shop/categories/{{$categories[0]->image_url}}" alt=""/>
                            <div class="content">
                                <h3>{{$categories[0]->name}}</h3>
                                <p>{{$categories[0]->description}}</p>
                            </div>
                        </a>
                    </div>
                    <div class="category-box">
                        <a href="/shop-sidebar?category={{$categories[1]->id}}">
                            <img src="images/shop/categories/{{$categories[1]->image_url}}" alt=""/>
                            <div class="content">
                                <h3>{{$categories[1]->name}}</h3>
                                <p>{{$categories[1]->description}}</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="category-box">
                        <a href="/shop-sidebar?category={{$categories[2]->id}}">
                            <img src="images/shop/categories/{{$categories[2]->image_url}}" alt=""/>
                            <div class="content">
                                <h3>{{$categories[2]->name}}</h3>
                                <p>{{$categories[2]->description}}</p>
                            </div>
                        </a>
                    </div>
                    <div class="category-box">
                        <a href="/shop-sidebar">
                            <img src="images/shop/categories/default-1.jpg" alt=""/>
                        </a>
                    </div>
                </div>
            @endif
            @if ($categories->count() == 2)
                <div class="col-md-6">
                    <div class="category-box">
                        <a href="/shop-sidebar?category={{$categories[0]->id}}">
                            <img src="images/shop/categories/{{$categories[0]->image_url}}" alt=""/>
                            <div class="content">
                                <h3>{{$categories[0]->name}}</h3>
                                <p>{{$categories[0]->description}}</p>
                            </div>
                        </a>
                    </div>
                    <div class="category-box">
                        <a href="/shop-sidebar?category={{$categories[1]->id}}">
                            <img src="images/shop/categories/{{$categories[1]->image_url}}" alt=""/>
                            <div class="content">
                                <h3>{{$categories[1]->name}}</h3>
                                <p>{{$categories[1]->description}}</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="category-box-2">
                        <a href="/shop-sidebar">
                            <img src="images/shop/categories/default-2.jpg" alt="" style="max-height: 730px"/>
                        </a>
                    </div>
                </div>
            @endif
            @if ($categories->count() == 1)
                <div class="col-md-6">
                    <div class="category-box">
                        <a href="/shop-sidebar?category={{$categories[0]->id}}">
                            <img src="images/shop/categories/{{$categories[0]->image_url}}" alt=""/>
                            <div class="content">
                                <h3>{{$categories[0]->name}}</h3>
                                <p>{{$categories[0]->description}}</p>
                            </div>
                        </a>
                    </div>
                    <div class="category-box">
                        <a href="/shop-sidebar">
                            <img src="images/shop/categories/default-2.jpg" alt=""/>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="category-box-2">
                        <a href="/shop-sidebar">
                            <img src="images/shop/categories/default-2.jpg" alt="" style="max-height: 730px"/>

                        </a>
                    </div>
                </div>
            @endif
            @if ($categories->count() == 0)
                <div class="col-md-6">
                    <div class="category-box-2">
                        <a href="/shop-sidebar">
                            <img src="images/shop/categories/default-2.jpg" alt=""/>
                            <div class="content">
                                <h3>Bánh ngon</h3>
                                <p>Làm từ nguyên liệu ngon</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="category-box-2">
                        <a href="/shop-sidebar">
                            <img src="images/shop/categories/default-3.jpg" alt=""/>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<section class="products section bg-gray">
    <div class="container">
        <div class="row">
            <div class="title text-center">
                <h2>SẢN PHẨM NỔI BẬT</h2>
            </div>
        </div>
        <div class="row">
            @if($trendyProducts)
                @foreach($trendyProducts as $trendyProduct)
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-thumb">
                                @if($trendyProduct->quantity == 0)
                                    <span class="bage">Hết hàng</span>
                                @endif
                                <img class="img-responsive"
                                     src="{{asset('images/shop/products/' . $trendyProduct->image_url)}}"
                                     alt="product-img"
                                     style="object-fit: contain; height: 500px"
                                />
                                <div class="preview-meta">
                                    <ul>
                                        <li>
                                            <a href="/product-single/{{$trendyProduct->id}}"><i
                                                    class="tf-ion-ios-search-strong"></i></a>
                                        </li>
                                        <li>
                                            <a id="cart-button"><i class="tf-ion-ios-cart"></i></a>
                                            <input id="product-id" value="{{$trendyProduct->id}}" hidden>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                @if($trendyProduct->quantity == 0)
                                    <s><h4><a href="/product-single/{{$trendyProduct->id}}">{{$trendyProduct->name}}</a>
                                        </h4></s>
                                    <s>
                                        <p class="price">{{\App\Http\Services\Utility::convertPrice($trendyProduct->price)}}</p>
                                    </s>
                                @else
                                    <h4><a href="/product-single/{{$trendyProduct->id}}">{{$trendyProduct->name}}</a>
                                    </h4>
                                    <p class="price">{{\App\Http\Services\Utility::convertPrice($trendyProduct->price)}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>


<!--
Start Call To Action
==================================== -->
<section class="call-to-action bg-gray section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="title">
                    <h2>THEO DÕI ĐỂ NHẬN THÔNG BÁO MỚI NHẤT</h2>
                </div>
                <div class="col-lg-6 col-md-offset-3">
                    <div class="input-group subscription-form">
                        <input type="text" class="form-control" placeholder="NHẬP ĐỊA CHỈ EMAIL">
                        <span class="input-group-btn">
				        <button class="btn btn-main" type="button">Subscribe Now!</button>
				      </span>
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->

            </div>
        </div>        <!-- End row -->
    </div>    <!-- End container -->
</section>   <!-- End section -->

<section class="section instagram-feed">
    <div class="container">
        <div class="row">
            <div class="title">
                <h2>INSTAGRAM</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="instagram-slider" id="instafeed"
                     data-accessToken="IGQVJYeUk4YWNIY1h4OWZANeS1wRHZARdjJ5QmdueXN2RFR6NF9iYUtfcGp1NmpxZA3RTbnU1MXpDNVBHTzZAMOFlxcGlkVHBKdjhqSnUybERhNWdQSE5hVmtXT013MEhOQVJJRGJBRURn"></div>
            </div>
        </div>
    </div>
</section>
@include('user.layout.footer')

<!--
    Essential Scripts
    =====================================-->

<!-- Main jQuery -->
<script src="plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.1 -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- Bootstrap Touchpin -->
<script src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<!-- Instagram Feed Js -->
<script src="plugins/instafeed/instafeed.min.js"></script>
<!-- Video Lightbox Plugin -->
<script src="plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
<!-- Count Down Js -->
<script src="plugins/syo-timer/build/jquery.syotimer.min.js"></script>

<!-- slick Carousel -->
<script src="plugins/slick/slick.min.js"></script>
<script src="plugins/slick/slick-animation.min.js"></script>

<!-- Google Mapl -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script type="text/javascript" src="plugins/google-map/gmap.js"></script>

<!-- Main Js File -->
<script src="js/script.js"></script>

<script>
    $(".button").click(function () {
        const id = $(this).attr('id').split('-');
        const action = id[0];
        const productId = id[1];
        switch (action) {
            case 'plus':
                $.get(
                    '/plus/' + productId,
                    function (response) {
                        $(".quantity-" + productId).text(response[0]);
                        $(".total-" + productId).text(response[1])
                        $(".total-price").text(response[2])
                    }
                );
                break;
            case 'minus':
                let quantity = $(".quantity-" + productId).text()
                if (quantity[0] == 1) {
                    $("#removeModal").modal('show');
                    $('#yes').click(function () {
                            $.get(
                                '/remove-cart/' + productId,
                                function (response) {
                                    $('.product-' + productId).remove();
                                    $(".total-price").text(response)
                                }
                            );
                        }
                    );
                    break;
                } else {
                    $.get(
                        '/minus/' + productId,
                        function (response) {
                            $(".quantity-" + productId).text(response[0]);
                            $(".total-" + productId).text(response[1])
                            $(".total-price").text(response[2])
                        }
                    );
                    break;
                }

            case 'remove': {
                $('#yes').click(function () {
                    $.get(
                        '/remove-cart/' + productId,
                        function (response) {
                            $('.product-' + productId).remove();
                            $(".total-price").text(response)
                        });
                });
            }
        }
    })
    $('#cart-button').click(function() {
        let productId = $('#product-id').val()
        $.get(
            '/plus/' + productId,
            function (response) {
                $(".quantity-" + productId).text(response[0]);
                $(".total-" + productId).text(response[1])
                $(".total-price").text(response[2])
            }
        );
    })
</script>
</body>
</html>
