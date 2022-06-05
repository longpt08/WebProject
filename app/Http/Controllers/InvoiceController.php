<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function generateReport(Request $request)
    {
        $from = Carbon::parse($request['from']);
        $to = Carbon::parse($request['to']);

        $data = $this->invoiceService->report($from, $to);
        $data['title'] = "BÁO CÁO DOANH THU";
        $data['subtitle'] = "Từ ngày " . $from->format('d/m/Y') . " đến ngày ". $to->format('d/m/Y');

        return view('admin.report', ['data' => $data]);
    }
}
