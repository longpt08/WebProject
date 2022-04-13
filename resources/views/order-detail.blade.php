<?php
$user = session()->get('user');
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
  <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png" />

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
@include('layout.header')
@include('layout.navigator')

<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Dashboard</h1>
					<ol class="breadcrumb">
						<li><a href="index.html">Home</a></li>
						<li class="active">my account</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="user-dashboard page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="list-inline dashboard-menu text-center">
					<li><a class="active" href="/dashboard">Dashboard</a></li>
					<li><a href="/order">Orders</a></li>
					<li><a href="/profile-details">Profile Details</a></li>
				</ul>
				<div class="dashboard-wrapper user-dashboard">
					<div class="media">
						<div class="media-body">
							<h2 class="media-heading">Welcome {{$user->first_name}}!</h2>
							<p>Let's check it out! Order ID: #{{$order->id}}</p>
						</div>
					</div>
					<div class="total-order mt-20">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Product</th>
										<th>Price</th>
										<th>Amount</th>
										<th>Total Price</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
                                @foreach($order->orderItems as $item)
									<tr>
										<td><a href="#!">{{$item->product->name}}</a></td>
										<td>${{$item->product->price}}</td>
										<td>{{$item->amount}}</td>
										<td>$ {{$item->product->price * $item->amount}}</td>
									</tr>
                                @endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



@include('layout.footer')

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
