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
$user = session()->get('user');
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
					<h1 class="page-name">Checkout</h1>
					<ol class="breadcrumb">
						<li><a href="../index.html">Home</a></li>
						<li class="active">checkout</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="page-wrapper">
    <div class="checkout shopping">
        <div class="container">
            <div class="row">
                <form method="POST" action="/confirm">
                    @csrf
                    <div class="col-md-8">
                        <div class="block billing-details">
                            <h4 class="widget-title">Billing Details</h4>
                            <div id="default-address">
                            </div>
                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input type="text" class="form-control" name="full_name"
                                       placeholder="{{$user->first_name . " " . $user->last_name}}">
                            </div>
                            <div class="form-group">
                                <label for="user_address">Address</label>
                                <input type="text" class="form-control" name="user_address"
                                       placeholder="{{$user->address}}">
                            </div>
                            <div class="form-group">
                                <label for="user_country">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number"
                                       placeholder="{{$user->phone_number}}">
                            </div>
                        </div>
                        <div class="block">
                            <h4 class="widget-title">Payment Method</h4>
                            <p>Credit Cart Details (Secure payment)</p>
                            <div class="checkout-user-details">
                                <div class="payment">
                                    <div class="card-details">
                                        <div class="form-group">
                                            <label for="card-number">Card Number <span class="required">*</span></label>
                                            <input id="card-number" class="form-control" name="card_number" type="tel"
                                                   placeholder="•••• •••• •••• ••••">
                                        </div>
                                        <div class="form-group half-width padding-right">
                                            <label for="card-expiry">Expiry (MM/YY) <span
                                                    class="required">*</span></label>
                                            <input id="card-expiry" class="form-control" name="expiry" type="tel"
                                                   placeholder="MM / YY">
                                        </div>
                                        <div class="form-group half-width padding-left">
                                            <label for="card-cvc">Card Code <span class="required">*</span></label>
                                            <input id="card-cvc" class="form-control" name="cvc" type="tel"
                                                   maxlength="4"
                                                   placeholder="CVC">
                                        </div>
                                        <button type="submit" class="btn btn-main mt-20" >Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <div class="col-md-4">
               <div class="product-checkout-details">
                  <div class="block">
                     <h4 class="widget-title">Order Summary</h4>
                      @if($productCarts)
                          @foreach($productCounts as $key => $value)
                              @foreach($productCarts as $productCart)
                                  @if($key == $productCart['id'])
                                      <div class="media product-card">
                                          <a class="pull-left" href="product-single.blade.php">
                                              <img class="media-object" src="images/shop/cart/cart-1.jpg" alt="Image" />
                                          </a>
                                          <div class="media-body">
                                              <h4 class="media-heading"><a href="product-single.blade.php">{{$productCart['name']}}</a></h4>
                                              <p class="price">{{$value}} x ${{$productCart['price']}}</p>
                                          </div>
                                      </div>
                                      @break
                                  @endif
                              @endforeach
                          @endforeach
                      @endif
                     <ul class="summary-prices">
                        <li>
                           <span>Subtotal:</span>
                           <span class="price">${{$total}}</span>
                        </li>
                        <li>
                           <span>Shipping:</span>
                           <span>Free</span>
                        </li>
                     </ul>
                     <div class="summary-total">
                        <span>Total</span>
                        <span>${{$total}}</span>
                     </div>
                     <div class="verified-icon">
                        <img src="images/shop/verified.png">
                     </div>
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
