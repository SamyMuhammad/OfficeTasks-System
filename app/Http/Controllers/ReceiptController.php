<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Receipt;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Services\ClientService;
use App\Services\ReceiptService;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\ReceiptRequest;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Admin\ClientController;

class ReceiptController extends Controller
{
    protected $receiptService;

    public function __construct(ReceiptService $receiptService)
    {
        $this->receiptService = $receiptService;
        $this->middleware('can:view receipts')->only(['index', 'paid', 'unpaid', 'search']);
        $this->middleware('can:show receipts')->only('show');
        $this->middleware('can:create receipts')->only(['create', 'store']);
        $this->middleware('can:edit receipts')->only(['edit', 'update']);
        $this->middleware('can:delete receipts')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status = null)
    {
        $receipts = $this->receiptService->paginateReceiptsWithRelations(10);

        return view('user.receipts.index', [
            'items' => $receipts,
            'title' => 'كل الفواتير'
        ]);
    }

    public function paid()
    {
        $receipts = $this->receiptService->paginateReceiptsByStatus('paid', 10);

        return view('user.receipts.index', [
            'items' => $receipts,
            'title' => 'الفواتير المدفوعة'
        ]);
    }

    public function unpaid()
    {
        $receipts = $this->receiptService->paginateReceiptsByStatus('unpaid', 10);

        return view('user.receipts.index', [
            'items' => $receipts,
            'title' => 'الفواتير الآجل'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models = $this->getAssociatedModels();
        return view('user.receipts.create', compact('models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReceiptRequest $request)
    {
        $data = $request->all();
        $validateServices = $this->receiptService->validateServicesData($data);
        if (!$validateServices) { return back(); }
        $this->receiptService->validatePaid($data);
        $this->receiptService->storeReceipt($data);
        return redirect()->route($this->receiptService->routeIndex());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show(Receipt $receipt)
    {
        $receipt->load('client', 'user', 'payment_method', 'category', 'receipt_payments');
        $settings = Setting::where('slug', 'indviduals-service-phone')->orWhere('slug', 'companies-service-phone')->get();
        return view('user.receipts.show', compact('receipt', 'settings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipt $receipt)
    {
        $receipt->load('client', 'user', 'payment_method', 'category');
        $models = $this->getAssociatedModels();
        return view('user.receipts.edit', compact('receipt', 'models'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(ReceiptRequest $request, Receipt $receipt)
    {
        $data = $request->all();
        $validateServices = $this->receiptService->validateServicesData($data);
        if (!$validateServices) { return back(); }
        // $this->receiptService->validatePaid($data);
        $this->receiptService->updateReceipt($data, $receipt);
        success(__('flashes.update'));

        return redirect()->route($this->receiptService->routeIndex());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipt $receipt)
    {
        $receipt->delete();
        success(__('flashes.destroy'));
        return redirect()->route($this->receiptService->routeIndex());
    }

    /**
     * Get the associated models
     */
    private function getAssociatedModels(): array
    {
        $models['clients'] = Client::get(['id', 'name', 'phone']);
        $models['paymentMethods'] = PaymentMethod::get(['id', 'name']);
        $models['services'] = Service::get(['id', 'name']);
        $models['categories'] = Category::get(['id', 'name']);

        return $models;
    }

    public function search(Request $request)
    {
        $key = $request->key;
        if(empty($key)) return redirect()->route($this->receiptService->routeIndex());

        $items = Receipt::with(['client', 'user', 'payment_method', 'category'])
        ->where('id', $key)
        ->orWhere('project', 'like', "%$key%")
        ->orWhereHas('client', function(Builder $q) use ($key){
            $q->where('name', 'like', "%$key%");
        })
        ->orWhereHas('user', function(Builder $q) use ($key){
            $q->where('name', 'like', "%$key%");
        })
        ->orWhereHas('category', function(Builder $q) use ($key){
            $q->where('name', 'like', "%$key%");
        })
        ->orWhereHas('payment_method', function(Builder $q) use ($key){
            $q->where('name', 'like', "%$key%");
        });

        if (mb_detect_encoding($key) !== 'UTF-8') { // If input is not arabic.
            $items->orWhereDate('created_at', $key);
        }

        $items = $items->latest()->paginate(10);

        return view('user.receipts.index', [
            'items' => $items,
            'title' => 'الفواتير'
        ]);
    }
}
