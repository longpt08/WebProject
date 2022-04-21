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
                                    <form class="form-valide" action="edit/{{$order->id}}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="id">Order ID
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="id" name="id" disabled="true" value="{{$order->id}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="name">Invoice ID
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="name" disabled="true" value="{{$order->invoice->id}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="name">Total
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="name" disabled="true" name="name" value="{{$order->total}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="price">Description
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="price" disabled="true" name="description" value="{{$order->description}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Status
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="status">
                                                    <option value="1" {{$order->status != 1 ?:"selected='true'"}}>Confirmed</option>
                                                    <option value="2" {{$order->status != 2 ?: "selected='true'"}}>Shipping</option>
                                                    <option value="3" {{$order->status != 3 ?: "selected='true'"}}>Completed</option>
                                                    <option value="0" {{$order->status != 0 ?: "selected='true'"}}>Canceled</option>
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
