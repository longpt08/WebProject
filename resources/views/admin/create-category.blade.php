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
                                    <form class="form-valide" action="/admin/category/create" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="name">Name
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="name" name="name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="description">Description
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="description" name="description">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Status
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <p class="col-lg-4 col-form-label" >Image
                                            </p>
                                            <div class="col-lg-6">
                                                <img id="image-hint" style="max-height: 100px">
                                                <input type="file" class="form-control" id="image" name="image" value="">
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
    <script>
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
