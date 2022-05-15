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
                    <li><a class="active" href="/profile-details">THÔNG TIN CÁ NHÂN</a></li>
                </ul>
                <div class="dashboard-wrapper dashboard-user-profile">
                    <form method="POST" action="/edit-profile" enctype="multipart/form-data">
                        @csrf
                        <div class="media">
                            <div class="" href="#!">
                                <img id="image-hint" class="media-object user-img" src="images/users/{{$user->img_url}}" alt="Image" style="max-height: 180px; max-width: 180px; object-fit: contain">
                                <a id="changeImage" class="btn btn-transparent mt-20" style="width: 180px; margin-bottom: 50px">ĐỔI ẢNH</a>
                                <input type="file" class="form-control" id="image" name="image" style="display:none">
                            </div>
                            <div class="media-body">

                                <div class="profile-rows">
                                    <div><label for="first-name">Họ:</label></div>
                                    <div><input type="text" id="first-name" name="first_name"
                                                value="{{$user->first_name}}"></div>
                                </div>

                                <div class="profile-rows">
                                    <div><label for="last-name">Tên:</label></div>
                                    <div><input type="text" id="last-name" name="last_name"
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
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#changePasswordModal" data-whatever="@getbootstrap">Đổi mật
                                            khẩu
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/change-password" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="old-password" class="col-form-label">Mật khẩu hiện tại:</label>
                        <a id="old-password-popover" data-toggle="popover" data-content="Mật khẩu không đúng!"><input
                                required type="password" class="form-control" name="old-password" id="old-password"></a>
                    </div>
                    <div class="form-group">
                        <label for="new-password" class="col-form-label">Mật khẩu mới:</label>
                        <a id="new-password-popover" data-toggle="popover"
                           data-content="Mật khẩu mới phải khác mật khẩu cũ!"><input minlength="6" required
                                                                                     type="password"
                                                                                     class="form-control"
                                                                                     id="new-password"
                                                                                     name="new-password"></a>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password" class="col-form-label">Nhập lại mật khẩu:</label>
                        <a id="confirm-password-popover" data-toggle="popover"
                           data-content="Mật khẩu không khớp!"><input minlength="6" required type="password"
                                                                      class="form-control" id="confirm-password"></a>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" id="submit" disabled value="Đổi">
                    </div>
                </form>
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
    let password = false;
    let match = false;
    let different = false;
    $("#old-password").focusout(function () {
        $.post(
            '/check-password',
            {
                _token: "{{csrf_token()}}",
                password: $(this).val(),
            },
            function (response) {
                if (!response) {
                    $("#old-password-popover").popover('show')
                    password = false;
                } else {
                    $("#old-password-popover").popover('destroy')
                    password = true;
                }
            }
        )
    })
    $("#confirm-password").focusout(function () {
        if ($(this).val() != $("#new-password").val()) {
            $("#confirm-password-popover").popover('show')
            match = false
        } else {
            $("#confirm-password-popover").popover('destroy')
            match = true
        }
    })
    $("#new-password").focusout(function () {
        if ($(this).val() == $("#old-password").val()) {
            $("#new-password-popover").popover('show')
            different = false
        } else {
            $("#new-password-popover").popover('destroy')
            different = true;
        }
    })
    $(document).click(function () {
        console.log(password, different, match)
        if (match && different && password) {
            $("#submit").removeAttr('disabled')
        } else {
            $("#submit").attr('disabled', true)
        }
    })
    $(document).ready(function () {
        let message = '{{session()->get('successChange')}}'
        if (message.length > 0) {
            alert(message);
        }
    })
</script>
<script>
    $("#changeImage").click(function() {
        $("#image").click();
    })
    $("#image").change(function(e) {

        for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {

            var file = e.originalEvent.srcElement.files[i];

            var img = $("#image-hint");
            var reader = new FileReader();
            reader.onloadend = function () {
                img.attr('src', reader.result);
            }
            reader.readAsDataURL(file);
        }
    });
</script>

</body>
</html>
