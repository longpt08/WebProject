<?php
session()->put('current', 'product-single')
?>
    <!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Aviato</title>

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
    <link rel="stylesheet" href="../plugins/themefisher-font/style.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">

    <!-- Animate css -->
    <link rel="stylesheet" href="../plugins/animate/animate.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="../plugins/slick/slick.css">
    <link rel="stylesheet" href="../plugins/slick/slick-theme.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body id="body">
@include('user.layout.header')
@include('user.layout.navigator')
<section class="single-product">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ol class="breadcrumb">
                    <li><a href="/">Trang chủ</a></li>
                    <li><a href="/shop-sidebar">Shop</a></li>
                    <li class="active">{{$product->name}}</li>
                </ol>
            </div>
        </div>
        <div class="row mt-20">
                <div class="col-md-5" style="width: 480px; height: 650px;">
                <img src="{{asset('images/shop/products/'.$product->image_url)}}" style="width: 100%; height: 100%; object-fit: contain">
            </div>
            <div class="col-md-7">
                <div class="single-product-details">
                    <h2>{{$product->name}}
                        @if($product->quantity == 0)
                            <span class="bage">(Hết hàng)</span>
                        @endif
                    </h2>
                    <p class="product-rating">{{$product->average_rating}}<i class="tf-ion-android-star"></i></p>
                    <p class="product-price">{{\App\Http\Services\Utility::convertPrice($product->price)}}</p>
                    <p class="product-description mt-20">
                        {{$product->detail}}
                    </p>
                    <form action="/product/add-cart" method="post">
                        @csrf
                        <div class="product-quantity">
                            <span>Số lượng:</span>
                            <div class="product-quantity-slider">
                                <input id="product-quantity" type="text" value="1" name="product-quantity"
                                       oninput="this.value = this.value > {{$product->quantity}} ? {{$product->quantity}} : Math.abs(this.value)">
                                <input name="id" value="{{$product->id}}" hidden>
                                <input id="limit-quantity" value="{{$product->quantity}}" hidden>
                            </div>
                        </div>
                        <div class="product-category">
                            <span>Danh mục:</span>
                            <ul>
                                @foreach($product->categoryProducts as $category)
                                    <li><a href="product-single.blade.php">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <input {{$product->quantity != 0 ? '': 'disabled'}} type="submit" id="add-cart" class="btn btn-main mt-20" value="Thêm vào giỏ hàng">
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="tabCommon mt-20">
                    <ul class="nav nav-tabs">
                        <li class=""><a href="#reviews" aria-expanded="true">Đánh giá
                                ({{$comments->count()}})</a></li>
                    </ul>
                    <div style="display:flex; justify-content: space-between" >
                    <div style="width: 48%">
                        <form action="/comment/post" method="post">
                            @csrf
                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5"/>
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4"/>
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3"/>
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2"/>
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1"/>
                                <label for="star1" title="text">1 star</label>
                            </div>
                            <div class="product-single-comments">

                                <input type="text" name="content" placeholder="Viết nhận xét...">
                            </div>
                            <div class="product-single-submit">
                                <input  type="submit">

                            </div>
                            <input name="product-id" value="{{$product->id}}" hidden="true">

                        </form>
                    </div>

                    <div class="tab-content patternbg" style="width: 48%">
                        <div id="reviews">
                            <div class="post-comments">
                                <ul class="media-list comments-list m-bot-50 clearlist">
                                @foreach($comments as $comment)
                                    <!-- Comment Item start-->
                                        <li class="media">

                                            <a class="pull-left" href="#!">
                                                <img class="media-object comment-avatar" src="images/blog/avater-1.jpg"
                                                     alt="" width="50" height="50"/>
                                            </a>

                                            <div class="media-body">
                                                <div class="comment-info">
                                                    <h4 class="comment-author">
                                                        <a href="#!">{{$comment->user->first_name . " " . $comment->user->last_name}}</a>

                                                    </h4>
                                                    <time datetime="">{{$comment->updated_at}}</time>
                                                    <span class="comment-button"><i
                                                            class="tf-ion-star"></i>{{$comment->rating}}</span>
                                                </div>

                                                <p>
                                                    {{$comment->content}}
                                                </p>
                                            </div>

                                        </li>
                                        <!-- End Comment Item -->
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div></div>
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
<script src="../plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.1 -->
<script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- Bootstrap Touchpin -->
<script src="../plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<!-- Instagram Feed Js -->
<script src="../plugins/instafeed/instafeed.min.js"></script>
<!-- Video Lightbox Plugin -->
<script src="../plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
<!-- Count Down Js -->
<script src="../plugins/syo-timer/build/jquery.syotimer.min.js"></script>

<!-- slick Carousel -->
<script src="../plugins/slick/slick.min.js"></script>
<script src="../plugins/slick/slick-animation.min.js"></script>

<!-- Google Mapl -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script type="text/javascript" src="../plugins/google-map/gmap.js"></script>

<!-- Main Js File -->
<script src="../js/script.js"></script>
<script>
    $("#product-quantity").change(function() {
                let quantity = $(this).val();
        if (quantity == $("#limit-quantity").val()) {
            $(".bootstrap-touchspin-up").prop('disabled', true);
        }
        else {
            $(".bootstrap-touchspin-up").prop('disabled', false);
        }
        if (quantity == 0) {
            $("#add-cart").prop('disabled', true);
        } else {
            $("#add-cart").prop('disabled', false);
        }
    })
</script>

</body>
</html>
