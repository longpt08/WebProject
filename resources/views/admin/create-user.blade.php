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
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-validate" action="/admin/user/create" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">Họ <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-username" name="first-name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">Tên <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-username" name="last-name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-email" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-password">Mật khẩu <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" id="val-password" name="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-confirm-password">Nhập lại mật khẩu <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" id="val-confirm-password" name="val-confirm-password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-suggestions">Địa chỉ
                                        </label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control" id="val-suggestions" name="address" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-phoneus">Số điện thoại
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-phoneus" name="phone-number">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="role">Chức vụ <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="role" name="role">
                                                <option value="{{\App\Http\Enums\UserRole::ADMIN}}">Admin</option>
                                                <option value="{{\App\Http\Enums\UserRole::USER}}">User</option>
                                                <option value="{{\App\Http\Enums\UserRole::STAFF}}">Staff</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
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
