<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Customer, Lending};
use Carbon\Carbon;

class ReportController extends Controller
{
    public function generateCustomersReport(Request $request)
    {
        $customers = new Customer;

        if ($request->date_start != '') {
            $dateStart = Carbon::parse($request->date_start)->startOfDay();
            $customers = $customers->where('created_at', '>=', $dateStart);
        }

        if ($request->date_end != '') {
            $dateEnd = Carbon::parse($request->date_end)->endOfDay();
            $customers = $customers->where('created_at', '<=', $dateEnd);
        }

        $customers = $customers->get();

        return view('reports.customers', compact('customers'));
    }

    public function generateLendingsReport(Request $request)
    {
        $lendings = new Lending;

        if ($request->date_start != '') {
            $dateStart = Carbon::parse($request->date_start)->startOfDay();
            $lendings = $lendings->where('created_at', '>=', $dateStart);
        }

        if ($request->date_end != '') {
            $dateEnd = Carbon::parse($request->date_end)->endOfDay();
            $lendings = $lendings->where('created_at', '<=', $dateEnd);
        }

        $lendings = $lendings->get();

        return view('reports.lendings', compact('lendings'));
    }
}
