<!DOCTYPE html>
<html lang="en">

@include('admin.layout.include-top')

<body>


<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

@include('admin.layout.nav-header')
@include('admin.layout.header')
@include('admin.layout.sidebar')
<!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">SẢN PHẨM</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{$productCount}}</h2>
                                <p class="text-white mb-0"></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">DOANH THU</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{$profit}}</h2>
                                <p class="text-white mb-0"></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">KHÁCH HÀNG</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{$userCount}}</h2>
                                <p class="text-white mb-0"></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">ĐƠN HÀNG</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{$orderCount}}</h2>
                                <p class="text-white mb-0"></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
    @include('admin.layout.footer')
</div>
<!--**********************************
    Main wrapper end
***********************************-->

@include('admin.layout.include-bottom')

</body>

</html>
