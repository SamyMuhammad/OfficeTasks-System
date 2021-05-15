<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;
use App\Models\ReceiptPayment;
use App\Http\Requests\ReceiptPaymentRequest;

class ReceiptPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view receipts-payments')->only('index');
        $this->middleware('can:create receipts-payments')->only('store');
        $this->middleware('can:edit receipts-payments')->only(['edit', 'update']);
        $this->middleware('can:delete receipts-payments')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Receipt $receipt)
    {
        $items = $receipt->receipt_payments()->paginate(10);

        return view('user.receipts-payments.index', compact('receipt', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ReceiptPaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReceiptPaymentRequest $request, Receipt $receipt)
    {
        $amount = $request->validated()['amount'];

        ReceiptPayment::create([
            'receipt_id' => $receipt->id,
            'amount' => $amount,
        ]);

        success(__('flashes.store'));
        if (routeIsAdmin()) {
            return redirect()->route('admin.receipts.show', $receipt->id);
        }
        return redirect()->route('receipts.show', $receipt->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReceiptPayment  $receiptPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $receiptPayment = ReceiptPayment::find($id);
        if ($receiptPayment) {
            return response()->json(['status' => true, 'amount' => $receiptPayment->amount]);
        }
        return response()->json(['status' => false, 'amount' => '']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ReceiptPaymentRequest  $request
     * @param  \App\Models\ReceiptPayment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(ReceiptPaymentRequest $request, ReceiptPayment $payment)
    {
        $data = $request->validated();

        $payment->update($data);
        
        success(__('flashes.update'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReceiptPayment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReceiptPayment $payment)
    {
        $payment->delete();
        success(__('flashes.destroy'));
        return back();
    }
}
