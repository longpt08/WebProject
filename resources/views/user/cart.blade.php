<!--
THEME: Aviato | E-commerce template
VERSION: 1.0.0
AUTHOR: Themefisher

HOMEPAGE: https://themefisher.com/products/aviato-e-commerce-template/
DEMO: https://demo.themefisher.com/aviato/
GITHUB: https://github.com/themefisher/Aviato-E-Commerce-Template/

WEBSITE: https://themefisher.com
TWITTER: https://twitter.com/themefisher
FACEBOOK: https://www.facebook.com/themefisher
-->
<?php
$productCarts = session()->get('product_cart');
if ($productCarts) {
    $productCounts = array_count_values(array_column(session()->get('product_cart'), 'id'));
    $total = array_sum(array_column(session()->get('product_cart'), 'price'));
} else {
    $total = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Aviato | E-commerce template</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

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
                        <th class="">Item Name</th>
                        <th class="">Item Price</th>
                        <th class="">Amount</th>
                        <th class="">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($productCarts)
                        @foreach($productCounts as $key => $value)
                            @foreach($productCarts as $productCart)
                                @if($key == $productCart['id'])
                                    <tr class="">
                                        <td class="">
                                            <div class="product-info">
                                                <img width="80" src="images/shop/cart/cart-1.jpg" alt="" />
                                                <a href="#!">{{$productCart['name']}}</a>
                                            </div>
                                        </td>
                                        <td class="">${{$productCart['price']}}</td>
                                        <td class="">{{$value}}</td>
                                        <td class="">
                                            <ul class="action">
                                                <li><i class="tf-ion-plus"></i></li>
                                                <li><i class="tf-ion-minus"></i></li>
                                                <li><i class="tf-ion-close"></i></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @break
                                @endif
                            @endforeach
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



  </body>
  </html>
