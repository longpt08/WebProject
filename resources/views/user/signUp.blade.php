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
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/toastr/css/toastr.min.css')}}">
    <!-- Animate css -->
    <link rel="stylesheet" href="{{asset('plugins/animate/animate.css')}}">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="plugins/slick/slick.css">
    <link rel="stylesheet" href="plugins/slick/slick-theme.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/style.css">


</head>

<body id="body">

<section class="signin-page account">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="block text-center">
                    <a class="logo" href="/">
                        <img src="images/logo.png" alt="">
                    </a>
                    <h2 class="text-center">TẠO TÀI KHOẢN</h2>
                    <form class="text-left clearfix" action="/sign-up/create" method="POST">
                        @csrf
                        <div class="form-group">
                            <input required id="val-firstname" type="text" class="form-control" name="first-name" placeholder="HỌ">
                        </div>
                        <div class="form-group">
                            <input required id="val-lastname" type="text" class="form-control" name="last-name" placeholder="TÊN">
                        </div>
                        <div class="form-group">
                            <a id="email-exist"data-toggle="popover" data-content="Email đã tồn tại!"><input required id="val-email" type="email" class="form-control" name="email" placeholder="EMAIL"></a>
                        </div>
                        <div class="form-group">
                            <input required id="password" type="password" class="form-control" name="password" placeholder="MẬT KHẨU">
                        </div>
                        <div class="form-group">
                            <a  id="confirm-password" data-toggle="popover" data-content="Mật khẩu không khớp!"><input required id="val-confirm-password" type="password" class="form-control" placeholder="NHẬP LẠI MẬT KHẨU"></a>
                        </div>
                        <div class="text-center">
                            <button id="button-create" type="submit" class="btn btn-main text-center" disabled>TẠO</button>
                        </div>
                    </form>
                    <p class="mt-20">Bạn đã có tài khoản?<a href="/login"> Đăng nhập ngay!</a></p>

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
</section>

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



<!-- Main Js File -->
<script src="{{asset('js/script.js')}}"></script>

<script src="plugins/validation/jquery.validate.min.js"></script>
<script src="plugins/validation/jquery.validate-init.js"></script>

<script>
    $(document).ready(function() {
        let password = false;
        let message = "<?php echo session()->get('message') ?>";
        if (message != "") {
            $("#alert-message").text(message)
            $("#alert-modal").modal('show')
        }

        $("#val-email").change(function() {
            $.post(
                '/check-email/',
                {
                    "_token": "{{ csrf_token() }}",
                    'email': $(this).val()
                },
                function(response) {
                    if (response) {
                        $('#email-exist').popover('show');
                    } else {
                        $('#email-exist').popover('destroy');
                    }
                }
            );
        });
        $("#val-confirm-password").change(function() {
            if ($(this).val() != $("#password").val()) {
                $('#confirm-password').popover('show');
                password = false
            } else {
                $('#confirm-password').popover('destroy');
                password = true
            }
        })
        $(this).change(function() {
            if (password) {
                $('#button-create').removeAttr("disabled")
            } else {
                $('#button-create').attr("disabled", true)
            }
        })
    })
</script>
</body>
</html>
