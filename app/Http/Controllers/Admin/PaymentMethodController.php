<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentMethodRequest;

class PaymentMethodController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view payment-methods')->only('index');
        $this->middleware('can:create payment-methods')->only('store');
        $this->middleware('can:edit payment-methods')->only(['edit', 'update']);
        $this->middleware('can:delete payment-methods')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.payment-methods.index', [
            'items' => PaymentMethod::paginate(10)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentMethodRequest $request)
    {
        $data = $request->validated();
        PaymentMethod::create($data);
        success(__('flashes.store'));
        return redirect()->route('admin.payment-methods.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $payment_method
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment_method = PaymentMethod::find($id);
        if ($payment_method) {
            return response()->json(['status' => true, 'name' => $payment_method->name]);
        }
        return response()->json(['status' => false, 'name' => '']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentMethod  $payment_method
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentMethodRequest $request, PaymentMethod $payment_method)
    {
        $data = $request->validated();
        $payment_method->update($data);
        success(__('flashes.update'));
        return redirect()->route('admin.payment-methods.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentMethod  $payment_method
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentMethod $payment_method)
    {
        $payment_method->delete();
        success(__('flashes.destroy'));
        return redirect()->route('admin.payment-methods.index');
    }
}
