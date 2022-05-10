<!DOCTYPE html>
<html lang="en">

@include('admin.layout.include-top')

<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10"/>
        </svg>
    </div>
</div>
<!--*******************
    Preloader end
********************-->


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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="/admin/product/create-form">
                                <button type="button" class="btn mb-1 btn-info">THÊM MỚI <span class="btn-icon-right"><i
                                            class="fa fa-plus"></i></span>
                                </button>
                            </a>
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle">
                                    <thead>
                                    <tr>
                                        <th scope="col">UID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Detail</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td><a href="/admin/product/detail/{{$product->id}}">{{$product->name}}</a>
                                            </td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->detail}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td><img src="{{asset('images/shop/products/'.$product->image_url)}}" style="max-height: 100px"></td>
                                            <td>{{\App\Http\Enums\ProductStatus::convert($product->status)}}</td>
                                            <td>
                                                <span>
                                                    <a href="/admin/product/detail/{{$product->id}}"
                                                       data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="fa fa-pencil color-muted m-r-5"></i>
                                                    </a>
                                                </span>
                                            </td>
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
