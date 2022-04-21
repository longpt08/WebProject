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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle">
                                    <thead>
                                    <tr>
                                        <th scope="col">UID</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->getFullName()}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone_number}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>{{\App\Http\Enums\UserStatus::convert($user->status)}}</td>
                                            <td><span><a href="/admin/user/detail/{{$user->id}}" data-toggle="tooltip" data-placement="top"
                                                         title="Edit"><i
                                                            class="fa fa-pencil color-muted m-r-5"></i> </a><a href="#"
                                                                                                               data-toggle="tooltip"
                                                                                                               data-placement="top"
                                                                                                               title="Close"><i
                                                            class="fa fa-close color-danger"></i></a></span></td>
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
