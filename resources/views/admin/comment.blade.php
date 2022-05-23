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
                                <div class="table-responsive">
                                    <table class="table table-bcommented verticle-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Người Dùng</th>
                                                <th scope="col">Mã Sản Phẩm</th>
                                                <th scope="col">Nội Dung</th>
                                                <th scope="col">Đánh Giá</th>
                                                <th scope="col">Trạng Thái</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($comments as $comment)
                                            <tr>
                                                <td>{{$comment->id}}</td>
                                                <td>{{$comment->user->getFullName()}}</td>
                                                <td>#{{$comment->product->id}}</td>
                                                <td>{{$comment->content}}</td>
                                                <td>{{$comment->rating}}</td>
                                                <td>{{\App\Http\Enums\CommentStatus::convert($comment->status)}}</td>
                                                <td><span><a href="/admin/comment/detail/{{$comment->id}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a></span></td>
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
