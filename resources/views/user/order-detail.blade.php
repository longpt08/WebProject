<?php
$user = session()->get('user');
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
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png"/>

    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="../plugins/themefisher-font/style.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{asset('../plugins/bootstrap/css/bootstrap.min.css')}}">

    <!-- Animate css -->
    <link rel="stylesheet" href="../plugins/animate/animate.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="../plugins/slick/slick.css">
    <link rel="stylesheet" href="../plugins/slick/slick-theme.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('../css/style.css')}}">

</head>

<body id="body">
@include('user.layout.header')
@include('user.layout.navigator')

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">CHI TIẾT ĐƠN HÀNG</h1>
                    <ol class="breadcrumb">
                        <li><a href="/">TRANG CHỦ</a></li>
                        <li class="active">CHI TIẾT ĐƠN HÀNG</li>
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
                    <li><a class="active" href=""> CHI TIẾT ĐƠN HÀNG</a></li>
                    <li><a href="/order">ĐƠN HÀNG</a></li>
                    <li><a href="/profile-details">CÁ NHÂN</a></li>
                </ul>
                <div class="dashboard-wrapper user-dashboard">
                    <div class="media">
                        <div class="media-body">
                            <h2 class="media-heading">Xin chào {{$user->first_name}}!</h2>
                            <p>Bạn đang xem chi tiết đơn hàng #{{$order->id}} (trạng thái: {{\App\Http\Enums\OrderStatus::convert($order->status)}})</p>
                        </div>
                    </div>
                    <div class="total-order mt-20">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>SẢN PHẨM</th>
                                    <th>GIÁ</th>
                                    <th>SỐ LƯỢNG</th>
                                    <th>TỔNG</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->orderItems as $item)
                                    <tr>
                                        <td>
                                            <a href="/product-single/{{$item->product->id}}">{{$item->product->name}}</a>
                                        </td>
                                        <td>${{$item->product->price}}</td>
                                        <td>{{$item->amount}}</td>
                                        <td>$ {{$item->product->price * $item->amount}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if($order->status == \App\Http\Enums\OrderStatus::SHIPPING)
                        <div style="text-align: center">
                            <div class="bootstrap-modal">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#basicModal">ĐÃ NHẬN ĐƯỢC HÀNG
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="basicModal">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">XÁC NHẬN RẰNG BẠN ĐÃ NHẬN ĐƯỢC HÀNG</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">CHÚNG TÔI SẼ KHÔNG GIẢI QUYẾT CÁC KHIẾU NẠI SAU KHI
                                                BẠN XÁC NHẬN RẰNG ĐÃ NHẬN ĐƯỢC HÀNG
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    HỦY
                                                </button>
                                                <a href="/order-detail/{{$order->id}}/complete">
                                                    <button type="button" class="btn btn-primary">ĐỒNG Ý</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($order->status == \App\Http\Enums\OrderStatus::CONFIRMED)
                        <div style="text-align: center">
                            <div style="text-align: center">
                                <div class="bootstrap-modal">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#basicModal">HỦY ĐƠN HÀNG
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="basicModal">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">BẠN MUỐN HỦY ĐƠN HÀNG?</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">ĐƠN HÀNG CỦA BẠN SẼ BỊ HỦY. BẠN CÓ THỂ CHO CHÚNG TÔI BIẾT LÝ DO ĐƯỢC KHÔNG?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">HỦY BỎ
                                                    </button>
                                                    <a href="/order-detail/{{$order->id}}/cancel">
                                                        <button type="button" class="btn btn-primary">ĐỒNG Ý HỦY ĐƠN HÀNG
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
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
<script src="{{asset('../plugins/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.1 -->
<script src="{{asset('../plugins/bootstrap/js/bootstrap.min.js')}}"></script>
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
