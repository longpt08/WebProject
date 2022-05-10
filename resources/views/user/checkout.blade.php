<?php
$total = 0;
$productCarts = session()->get('product_cart');
if ($productCarts) {
    foreach ($productCarts as $productCart) {
        $total += optional($productCart['product'])->getPrice() * $productCart['quantity'];
    }
}
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
                    <h1 class="page-name">THANH TOÁN</h1>
                    <ol class="breadcrumb">
                        <li><a href="../index.html">TRANG CHỦ</a></li>
                        <li class="active">THANH TOÁN</li>
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
                            <h4 class="widget-title">THÔNG TIN ĐƠN HÀNG</h4>
                            <div id="default-address">
                            </div>
                            <div class="form-group">
                                <label for="full_name">HỌ VÀ TÊN</label>
                                <input type="text" class="form-control" name="full_name" required
                                       value="{{$user->first_name . " " . $user->last_name}}">
                            </div>
                            <div class="form-group">
                                <label for="user_address">ĐỊA CHỈ</label>
                                <input type="text" class="form-control" name="user_address" required
                                       value="{{$user->address}}">
                            </div>
                            <div class="form-group">
                                <label for="user_country">SỐ ĐIỆN THOẠI</label>
                                <input type="text" class="form-control" name="phone_number" required
                                       value="{{$user->phone_number}}">
                            </div>
                        </div>
                        <div class="block">
                            <h4 class="widget-title">PHƯƠNG THỨC THANH TOÁN</h4>
                            <div>
                                <input id="cod" type="radio" name="payment-method" checked
                                       value="{{\App\Http\Enums\PaymentMethod::COD}}">
                                <label for="cod">Thanh toán khi nhận hàng (COD)</label>
                            </div>
                            <div>
                                <input id="air-pay" type="radio" name="payment-method"
                                       value="{{\App\Http\Enums\PaymentMethod::MOMO}}">
                                <label for="air-pay">Thanh toán qua MOMO</label>
                                <div class="qr" hidden="true">
                                    <img src="images/QR.png" width="50%" height="50%">
                                </div>
                            </div>
                            <div>
                                <input id="card" type="radio" name="payment-method"
                                       value="{{\App\Http\Enums\PaymentMethod::CARD}}">
                                <label for="card">Thanh toàn bằng thẻ (ATM/Visa/MasterCard)</label>
                                <div class="checkout-user-details" disabled hidden>
                                    <div class="payment">
                                        <div class="card-details">
                                            <div class="form-group">
                                                <label for="card-number">Card Number <span
                                                        class="required">*</span></label>
                                                <input id="card-number" class="form-control" name="card_number"
                                                       type="tel"
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
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-main mt-20">Đặt hàng</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-md-4">
                    <div class="product-checkout-details">
                        <div class="block">
                            <h4 class="widget-title">CHI TIẾT ĐƠN HÀNG</h4>
                            @if($productCarts)
                                @foreach($productCarts as $productCart)
                                    <div class="media product-card product-{{$productCart['product']->getId()}}">
                                        <a class="pull-left"
                                           href="/product-single/{{$productCart['product']->getId()}}">
                                            <img class="media-object"
                                                 src="{{asset('images/shop/products/' . $productCart['product']->getImageUrl())}}"
                                                 alt="Image"
                                                 style="height: 100px; object-fit: contain"/>
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a
                                                    href="product-single.blade.php">{{$productCart['product']->getname()}}</a>
                                            </h4>
                                            <p class="price">{{$productCart['quantity']}} x
                                                ${{\App\Http\Services\Utility::convertPrice($productCart['product']->getPrice())}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <ul class="summary-prices">
                                <li>
                                    <span>TẠM TÍNH:</span>
                                    <span
                                        class="total-price">${{\App\Http\Services\Utility::convertPrice($total)}}</span>
                                </li>
                                <li>
                                    <span>PHÍ VẬN CHUYỂN:</span>
                                    <span>MIỄN PHÍ</span>
                                </li>
                            </ul>
                            <div class="summary-total">
                                <span>TỔNG</span>
                                <span class="total-price">${{$total}}</span>
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
<div id="alert-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p id="alert-message"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
@include('user.layout.footer')
<!--
    Essential Scripts
    =====================================-->

<!-- Main jQuery -->

<script src="{{asset('plugins/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.1 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Bootstrap Touchpin -->
<script src="public/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<!-- Instagram Feed Js -->
<script src="public/plugins/instafeed/instafeed.min.js"></script>
<!-- Video Lightbox Plugin -->
<script src="public/plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
<!-- Count Down Js -->


<!-- Main Js File -->
<script src="js/script.js"></script>
<script>
    $(document).ready(function () {
            let message = "<?php echo session()->get('alert-quantity') ?>"
            if (message != "") {
                $("#alert-message").text(message)
                $("#alert-modal").modal()
            }
    })
    $("#card").click(function () {
        $(".checkout-user-details").removeAttr("hidden");
        $(".checkout-user-details").removeAttr("disabled");
        $("#card-number").attr('required', true);
        $("#card-expiry").attr('required', true);
        $("#card-cvc").attr('required', true);
    });
    $("#cod").click(function () {
        $(".checkout-user-details").attr("hidden", true);
        $(".checkout-user-details").attr("disabled", true);
        $("#card-number").removeAttr('required');
        $("#card-expiry").removeAttr('required');
        $("#card-cvc").removeAttr('required');
    })
    $("#air-pay").click(function () {
        $(".checkout-user-details").attr("hidden", true);
        $(".checkout-user-details").attr("disabled", true);
        $("#card-number").removeAttr('required');
        $("#card-expiry").removeAttr('required');
        $("#card-cvc").removeAttr('required');
    })

    $("#card").click(function () {
        $(".qr").attr("hidden", true);
    });
    $("#cod").click(function () {
        $(".qr").attr("hidden", true);
    })
    $("#air-pay").click(function () {
        $(".qr").attr("hidden", false);
    })
</script>
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
</script>
</body>
</html>
