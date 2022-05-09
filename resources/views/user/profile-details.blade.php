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
<?php
$user = \Illuminate\Support\Facades\Auth::user();
?>
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">THÔNG TIN CÁ NHÂN</h1>
					<ol class="breadcrumb">
						<li><a href="/">Home</a></li>
						<li class="active">Thông tin</li>
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
          <li><a href="/order">ĐƠN HÀNG</a></li>
          <li><a class="active"  href="/profile-details">THÔNG TIN CÁ NHÂN</a></li>
        </ul>
        <div class="dashboard-wrapper dashboard-user-profile">
          <div class="media">
            <div class="" href="#!">
              <img class="media-object user-img" src="images/avater.jpg" alt="Image">
              <a href="#x" class="btn btn-transparent mt-20" style="width: 180px">ĐỔI ẢNH</a>
            </div>
            <div class="media-body">
                <form method="POST" action="/edit-profile">
                    @csrf
                    <div class="profile-rows">
                    <div><label for="full-name">Họ:</label></div>
                            <div><input type="text" id="full-name" name="first_name"
                                       value="{{$user->first_name}}"></div>
                    </div>

                        <div class="profile-rows">
                        <div><label for="full-name">Tên:</label></div>
                            <div><input type="text" id="full-name" name="last_name"
                                       value="{{$user->last_name}}"></div>
                        </div>

                        <div class="profile-rows">
                            <div><label for="address">Địa chỉ:</label></div>
                            <div><input type="text" id="address" name="address"
                                       value="{{$user->address ?? 'N/A'}}"></div>
</div>

                        <div class="profile-rows">
                            <div><label for="email">Email:</label></div>
                            <div><input type="email" id="email" name="email" value="{{$user->email}}"></div>
                        </div>

                        <div class="profile-rows">
                            <div><label for="phone-number">Số điện thoại:</label></div>
                            <div><input type="text" id="phone-number" name="phone_number"
                                       value="{{$user->phone_number}}"></div>
                        </div>

                        <div class="profile-rows">
                            <div><label for="date-of-birth">Ngày sinh:</label></div>
                            <div><input type="date" id="date-of-birth" name="date_of_birth"
                                       value="{{\Carbon\Carbon::parse(optional($user->date_of_birth)->toString())->format('Y-m-d')}}">
                            </div>
                        </div>

                        <div class="profile-rows">
                            <div>
                                <button type="submit">Cập nhật</button>
                            </div>
                        </div>
                    </table>
                </form>
            </div>
          </div>
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
                    $("#basicModal").modal('show');
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
</script>



  </body>
  </html>
