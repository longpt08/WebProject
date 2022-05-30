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

        $this->invoiceService->report($from, $to);
    }
}
