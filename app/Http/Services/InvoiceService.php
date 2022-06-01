<?php

namespace App\Http\Services;

use App\Http\Enums\InvoiceStatus;
use App\Models\Invoice;
use Carbon\Carbon;

class InvoiceService
{
    public function report(Carbon $from, Carbon $to)
    {
        $invoices = Invoice::query()
            ->where('created_at', '>=', $from->startOfDay())
            ->where('created_at', '<=', $to->endOfDay())
            ->where('status', InvoiceStatus::PAID)
            ->get();
        $transformedInvoices = [];
        $yearArray = [];
        $total = 0;
        for ($year = $from->year; $year <= $to->year; $year++) {
            $yearData = [];
            $monthArray = [];
            $yearSum = 0;
            for ($month = 1; $month <= 12; $month++) {
                $monthSum = 0;
                $monthData = [];
                $dayArray = [];
                for ($day = 1; $day <= 31; $day++) {
                    $groupByDay = $invoices->filter(function ($invoice) use ($year, $month, $day) {
                        $createdAt = $invoice->created_at;
                        return $createdAt->year == $year && $createdAt->month == $month & $createdAt->day == $day;
                    });
                    if ($groupByDay->count() > 0) {
                        $daySum = array_sum($groupByDay->pluck('total')->toArray());
                        $dayArray[$day] = $daySum;
                        $monthSum += $daySum;
                    }
                }
                if ($monthSum != 0) {
                    $yearSum += $monthSum;
                    $monthData['month_sum'] = $monthSum;
                    $monthData['day_array'] = $dayArray;
                    $monthArray[$month] = $monthData;
                }
            }

            if ($yearSum != 0) {
                $total += $yearSum;
                $yearData['year_sum'] = $yearSum;
                $yearData['month_array'] = $monthArray;
                $yearArray[$year] = $yearData;
            }
        }
        $transformedInvoices['year_array'] = $yearArray;
        $transformedInvoices['total'] = $total;
        return $transformedInvoices;
    }
}
