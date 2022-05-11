<?php
session()->put(['current' => 'shop']);

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
    <link rel="stylesheet" href="{{asset('plugins/themefisher-font/style.css')}}">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">

    <!-- Animate css -->
    <link rel="stylesheet" href="{{asset('plugins/animate/animate.css')}}">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="{{asset('plugins/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/slick/slick-theme.css')}}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body id="body">

@include('user.layout.header')
@include('user.layout.navigator')

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Shop</h1>
                    <ol class="breadcrumb">
                        <li><a href="/">TRANG CHỦ</a></li>
                        <li class="active">shop</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="products section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="widget">
                    <h4 class="widget-title">GIÁ</h4>
                    <div>
                        <form action="/shop-sidebar" method="GET">
                            <div class="filter">
                                <input id="from" name="from" type="text"/>
                                <span style="padding: 5px">-</span>
                                <input id="to" name="to" type="text"/>
                            </div>
                            <button type="submit">ÁP DỤNG</button>
                        </form>
                    </div>
                </div>
                <div class="widget product-category">
                    <h4 class="widget-title">DANH MỤC</h4>
                    <div class="panel-group commonAccordion" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                 aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <ul>
                                        @foreach($categories as $category)
                                            <li>
                                                <a href="/shop-sidebar?category={{$category->id}}">{{$category->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @if ($products->count() == 0)
                        <div class="alert alert-danger alert-common" role="alert"><i class="tf-ion-search"></i><span>CẢNH BÁO!</span>
                            KHÔNG THỂ TÌM THẤY SẢN PHẨM BẠN MUỐN! XEM <a href="/shop-sidebar">SẢN PHẨM KHÁC</a>
                        </div>
                    @endif
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="product-item">
                                <div class="product-thumb">
                                    @if($product->quantity == 0)
                                        <span class="bage">Hết hàng</span>
                                    @endif
                                    <img class="img-responsive"
                                         src="{{asset('images/shop/products/' . $product->image_url)}}"
                                         alt="product-img"
                                         style="object-fit: contain; height: 500px"
                                    />
                                    <div class="preview-meta">
                                        <ul>
                                            <li>
                                                <a href="/product-single/{{$product->id}}"><i
                                                        class="tf-ion-ios-search-strong"></i></a>
                                            </li>
                                            <li>
                                                <a id="cart-button"><i class="tf-ion-ios-cart"></i></a>
                                                <input id="product-id" value="{{$product->id}}" hidden>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    @if($product->quantity == 0)
                                        <s><h4>
                                                <a href="/product-single/{{$product->id}}">{{$product->name}}</a>
                                            </h4></s>
                                        <s>
                                            <p class="price">{{\App\Http\Services\Utility::convertPrice($product->price)}}</p>
                                        </s>
                                    @else
                                        <h4>
                                            <a href="/product-single/{{$product->id}}">{{$product->name}}</a>
                                        </h4>
                                        <p class="price">{{\App\Http\Services\Utility::convertPrice($product->price)}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


@include('user.layout.footer')

<!--
    Essential Scripts
    =====================================-->

<!-- Main jQuery -->
<script src="{{asset('plugins/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.1 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Bootstrap Touchpin -->
<script src="{{asset('plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}"></script>
<!-- Instagram Feed Js -->
<script src="{{asset('plugins/instafeed/instafeed.min.js')}}"></script>
<!-- Video Lightbox Plugin -->
<script src="{{asset('plugins/ekko-lightbox/dist/ekko-lightbox.min.js')}}"></script>
<!-- Count Down Js -->
<script src="{{asset('plugins/syo-timer/build/jquery.syotimer.min.js')}}"></script>

<!-- slick Carousel -->
<script src="{{asset('plugins/slick/slick.min.js')}}"></script>
<script src="{{asset('plugins/slick/slick-animation.min.js')}}"></script>

<!-- Google Mapl -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script type="text/javascript" src="{{asset('plugins/google-map/gmap.js')}}"></script>

<!-- Main Js File -->
<script src="{{asset('js/script.js')}}"></script>
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
            '/add-cart-by-button/' + productId,
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
