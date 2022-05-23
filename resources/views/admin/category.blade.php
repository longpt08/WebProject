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
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
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
                                <a href="/admin/category/create-form"><button type="button" class="btn mb-1 btn-info">THÊM MỚI <span class="btn-icon-right"><i
                                            class="fa fa-plus"></i></span>
                                    </button></a>
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Tên</th>
                                                <th scope="col">Mô Tả</th>
                                                <th scope="col">Trạng Thái</th>
                                                <th scope="col">Hình Ảnh</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td><a href="/admin/category/detail/{{$category->id}}">{{$category->name}}</a></td>
                                                <td>{{$category->description}}</td>
                                                <td>{{\App\Http\Enums\CategoryStatus::convert($category->status)}}</td>
                                                <td><img src="{{asset('images/shop/categories/'.$category->image_url)}}" style="max-height: 100px"></td>
                                                <td><span><a href="/admin/category/detail/{{$category->id}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a></span></td>
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
