@include('admin.layout.header')
@include('admin.layout.sidebar')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Bảng điều khiển </h1>

        <ol class="breadcrumb">
            <li class="active">

                <i class="fa fa-dashboard"></i> Bảng điều khiển

            </li>
        </ol>

    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">

                        <i class="fa fa-tasks fa-5x"></i>

                    </div>

                    <div class="col-xs-9 text-right">
                        <div class="huge">  </div>

                        <div> Sản phẩm </div>

                    </div>

                </div>
            </div>

            <a href="index.php?view_products">
                <div class="panel-footer">

                    <span class="pull-left">
                        Xem chi tiết
                    </span>

                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>

                    <div class="clearfix"></div>

                </div>
            </a>

        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">

            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>

                    <div class="col-xs-9 text-right">
                        <div class="huge">  </div>
                        <div> Khách hàng </div>
                    </div>
                </div>
            </div>

            <a href="index.php?view_customers">
                <div class="panel-footer">
                    <span class="pull-left">
                        Xem chi tiết
                    </span>

                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>

                    <div class="clearfix"></div>

                </div>
            </a>

        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-orange">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tags fa-5x"></i>
                    </div>

                    <div class="col-xs-9 text-right">
                        <div class="huge">  </div>
                        <div> Danh mục sản phẩm </div>
                    </div>

                </div>
            </div>

            <a href="index.php?view_p_cats">
                <div class="panel-footer">
                    <span class="pull-left">
                        Xem chi tiết
                    </span>

                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>

                    <div class="clearfix"></div>

                </div>
            </a>

        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">

            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>

                    <div class="col-xs-9 text-right">
                        <div class="huge">  </div>
                        <div> Đơn đặt hàng </div>
                    </div>

                </div>
            </div>

            <a href="index.php?view_orders">
                <div class="panel-footer">
                    <span class="pull-left">
                        Xem chi tiết
                    </span>

                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>

                    <div class="clearfix"></div>

                </div>
            </a>

        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Đơn hàng mới
                </h3>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">

                        <thead>

                        <th> Mã đơn đặt hàng </th>
                        <th> Email </th>
                        <th> Mã hoá đơn </th>
                        <th> Mã sản phẩm </th>
                        <th> Số lượng </th>
                        <th> Kích cỡ </th>
                        <th> Tình trạng </th>

                        </tr>

                        </thead>

                        <tbody>


                        <tr>
                            <td>  </td>
                            <td>


                            </td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>

                        </tr>


                        </tbody>

                    </table>
                </div>

                <div class="text-right">

                    <a href="index.php?view_orders">
                        Xem tất cả các đơn đặt hàng <i class="fa fa-arrow-circle-right"></i>
                    </a>

                </div>

            </div>

        </div>
    </div>

    <div class="col-md-4">
        <div class="panel">
            <div class="panel-body">
                <div class="mb-md thumb-info">
                    <img style="width:360px;height:450px;" src="admin_images/"
                         alt="admin-thumb-info" class="rounded img-responsive">

                    <div class="thumb-info-title">
                        <span class="thumb-info-inner">  </span>
                        <span class="thumb-info-type">  </span>
                    </div>

                </div>

                <hr class="dotted short">

                <div class="mb-md">
                    <div class="widget-content-expanded">
                        <i class="fa fa-user"></i> <span> Email: </span>  <br />
                        <i class="fa fa-flag"></i> <span> Quốc tịch: </span>  <br />
                        <i class="fa fa-envelope"></i> <span> Liên hệ: </span>  <br />
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>
