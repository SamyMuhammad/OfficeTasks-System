<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Support\Facades\DB;

class ImportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view imports')->only('index');
    }

    public function index()
    {
        $receipts = Receipt::with('services', 'receipt_payments')->latest();
        
        $allPaidAmount = DB::table('receipt_payments')->sum('amount');
        $allTotalAmount = DB::table('receipt_service')->sum('price');
        $allRemainingAmount = $this->getAllRemainings($receipts->get(['id']));

        $receipts = $receipts->paginate(10);
        return view('user.imports.index',
            compact('receipts', 'allPaidAmount', 'allTotalAmount', 'allRemainingAmount')
        );
    }

    private function getAllRemainings($receipts)
    {
        $remaining = 0;
        foreach ($receipts as $receipt) {
            $remaining += $receipt->remaining;
        }
        return $remaining;
    }
}
