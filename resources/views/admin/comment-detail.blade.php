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
                                    <form class="form-valide" action="edit/{{$comment->id}}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="id">Owner
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="id" name="id" disabled="true" value="{{$comment->user->getFullName()}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="name">Product ID
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="name" disabled="true" value="{{$comment->product->id}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="name">Product Name
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="name" disabled="true" name="name" value="{{$comment->product->name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="price">Content
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="price" disabled="true" name="description" value="{{$comment->content}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="price">Rating
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="price" disabled="true" name="description" value="{{$comment->rating}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Status
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="status">
                                                    <option value="0" {{$comment->status != 0 ?:"selected='true'"}}>Hidden</option>
                                                    <option value="1" {{$comment->status != 1 ?: "selected='true'"}}>Active</option>
                                                    <option value="2" {{$comment->status != 2 ?: "selected='true'"}}>Pending</option>
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
