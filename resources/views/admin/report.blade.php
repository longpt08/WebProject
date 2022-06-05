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
                            <div style="margin-bottom: 10px">
                                <button class="btn btn-flat" data-toggle="modal" data-target="#reportModal">In PDF
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration"
                                       style="color: black">
                                    <div
                                        style="text-align: center; font-size: 50pt; font-weight: bold">{{$data['title']}}</div>
                                    <br>
                                    <div style="text-align: center; font-size: 20pt">{{$data['subtitle']}}</div>
                                    <tbody>
                                    @foreach($data['year_array'] as $year => $yearData)
                                        <tr style="background-color: #e3646f">
                                            <td colspan="4">NĂM {{$year}}</td>
                                        </tr>
                                        @foreach($yearData['month_array'] as $month => $monthData)
                                            <tr style="background-color: #e7a9b0">
                                                <td></td>
                                                <td colspan="3">THÁNG {{$month}}</td>
                                            </tr>
                                            @foreach($monthData['day_array'] as $day => $profit)
                                                <tr style="background-color: #ffffff">
                                                    <td></td>
                                                    <td></td>
                                                    <td>{{$day.'/'.$month.'/'.$year}}</td>
                                                    <td>{{\App\Http\Services\Utility::convertPrice($profit)}}</td>
                                                </tr>
                                            @endforeach
                                            <tr style="background-color: rgba(0, 0, 0, 0.05)">
                                                <td></td>
                                                <td></td>
                                                <td>TỔNG DOANH THU THÁNG {{$month}}</td>
                                                <td>{{\App\Http\Services\Utility::convertPrice($data['year_array'][$year]['month_array'][$month]['month_sum'])}}</td>
                                            </tr>
                                        @endforeach
                                        <tr style="background-color: rgba(0, 0, 0, 0.05)">
                                            <td></td>
                                            <td colspan="2">TỔNG DOANH THU NĂM {{$year}}</td>
                                            <td>{{\App\Http\Services\Utility::convertPrice($data['year_array'][$year]['year_sum'])}}</td>
                                        </tr>
                                    @endforeach
                                    <tr style="background-color: rgba(0, 0, 0, 0.05); font-weight: bold">
                                        <td colspan="4">TỔNG DOANH
                                            THU: {{\App\Http\Services\Utility::convertPrice($data['total'])}}</td>
                                    </tr>
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
