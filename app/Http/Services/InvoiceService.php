<?php

namespace App\Http\Services;

use App\Models\Invoice;
use Carbon\Carbon;

class InvoiceService
{
    public function report(Carbon $from,Carbon $to)
    {
        $invoices = Invoice::query()->whereBetween('created_at', [$from, $to])->get();
        $transformedInvoices = [];

    }
}
