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
                                <div>
                                    <form method="post" action="/admin/generate-report">
                                        @csrf
                                        <label for="from">Từ ngày: </label>
                                        <input id="from" type="date" name="from" value="{{\Carbon\Carbon::today()->format('Y-m-d')}}">
                                        <label for="to">Đến ngày: </label>
                                        <input id="to" type="date" name="to" value="{{\Carbon\Carbon::today()->format('Y-m-d')}}">
                                        <input type="submit" id="yes" value="Xuất báo cáo" class="btn btn-primary" data-dismiss="modal">
                                    </form>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Người Dùng</th>
                                                <th>Mã Đơn Hàng</th>
                                                <th>Tổng</th>
                                                <th>Chi Tiết</th>
                                                <th>Trạng Thái</th>
                                                <th>Ngày Hóa Đơn</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($invoices as $invoice)
                                            <tr>
                                                <td>{{$invoice->id}}</td>
                                                <td><a href="/admin/user/detail/{{$invoice->user->id}}">{{$invoice->user->getFullName()}}</a></td>
                                                <td><a href="/admin/order/detail/{{$invoice->order->id}}">{{$invoice->order->id}}</a></td>
                                                <td>{{$invoice->total}}$</td>
                                                <td>{{$invoice->description}}</td>
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
    $("#from").change(function() {
        let to = $("#to").val();
        let from = $(this).val();
        let today = new Date().toISOString().slice(0, 10)
        if (from > today) {
            alert("Không thể xuất báo cáo trong tương lai!")
            $(this).val(today)
        }
        else if (from > to) {
            alert("Ngày xuất báo cáo không hợp lệ!")
            $(this).val(to)
        }
    })
    $("#to").change(function() {
        let to = $(this).val();
        let from = $("#from").val();
        let today = new Date().toISOString().slice(0, 10)
        if (to > today) {
            alert("Không thể xuất báo cáo trong tương lai!")
            $(this).val(today)
        }
        if (from > to) {
            alert("Ngày xuất báo cáo không hợp lệ!")
            $(this).val(from)
        }
    })
</script>
</body>

</html>
