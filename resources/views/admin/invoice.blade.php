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
@include(('admin.layout.header'))
    @include('admin.layout.sidebar')

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Table</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Invoice ID</th>
                                                <th>Owner</th>
                                                <th>Order ID</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($invoices as $invoice)
                                            <tr>
                                                <td>{{$invoice->id}}</td>
                                                <td><a href="/admin/user/detail/{{$invoice->user->id}}">{{$invoice->user->getFullName()}}</a></td>
                                                <td><a href="/admin/order/detail/{{$invoice->order->id}}">{{$invoice->order->id}}</a></td>
                                                <td>{{$invoice->total}}$</td>
                                                <td>{{\App\Http\Enums\InvoiceStatus::convert($invoice->status)}}</td>
                                                <td>{{$invoice->created_at}}</td>
                                            </tr>
                                        @endforeach
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
