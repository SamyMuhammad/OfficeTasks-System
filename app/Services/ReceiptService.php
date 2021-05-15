<?php

namespace App\Services;

use App\Models\Receipt;
use App\Events\ReceiptCreated;
use App\Events\ReceiptUpdated;

class ReceiptService
{
    public function paginateReceiptsWithRelations(int $number)
    {
        $receipts = Receipt::latest()->with(['client', 'user', 'payment_method', 'category']);

        if (!request()->routeIs('admin.*')) {
            $receipts->userReceipts();
        }

        return $receipts->paginate($number);
    }

    public function paginateReceiptsByStatus(string $status, int $number)
    {
        $receipts = Receipt::where('status', $status)->latest()->with(['client', 'user', 'payment_method', 'category']);

        if (!request()->routeIs('admin.*')) {
            $receipts->userReceipts();
        }

        return $receipts->paginate($number);
    }

    /**
     * Validate services descriptions and prices.
     */
    public function validateServicesData(array $requestedData)
    {
        $servicesIds = $requestedData['services'];
        $rules = array();
        foreach ($servicesIds as $id) {
            $rules["$id|description"] = ['required', 'string', 'max:191'];
            $rules["$id|price"] = ['required', 'numeric', 'min:0'];
        }

        $validator = validator($requestedData, $rules);
        if ($validator->fails()) {
            error('تأكد من إدخال بيانات الخدمات كاملة بصيغ صحيحة.');
            return false;
        }
        return true;
    }

    /**
     * Validate the paid amount
     */
    public function validatePaid(array $data)
    {
        $total = $this->getTotal($data);
        validator($data, ['paid' => 'numeric|max:'.$total])->validate();
    }

    public function storeReceipt(array $data)
    {
        $userId = auth()->id();
        $status = $this->getStatus($data);
        $createdBy = request()->routeIs('admin.*') ? 'admin' : 'user';

        $receipt = Receipt::create([
            'client_id' => $data['client_id'],
            'project' => $data['project'],
            'payment_method_id' => $data['payment_method_id'],
            'user_id' => $userId,
            'category_id' => $data['category_id'],
            'status' => $status,
            'created_by' => $createdBy,
        ]);
        $this->storeServicesData($receipt);
        ReceiptCreated::dispatch($receipt, $data['paid']);
        success(__('flashes.store'));
        return $receipt;
    }

    public function updateReceipt(array $data, $receipt)
    {
        $userId = auth()->id();
        $status = $this->getStatus($data);

        $receipt->update([
            'client_id' => $data['client_id'],
            'project' => $data['project'],
            'payment_method_id' => $data['payment_method_id'],
            'user_id' => $userId,
            'category_id' => $data['category_id'],
            // 'paid' => $data['paid'],
            'status' => $status,
        ]);
        $this->storeServicesData($receipt);
        ReceiptUpdated::dispatch($receipt);
        success(__('flashes.update'));
        return $receipt;
    }

    public function routeIndex()
    {
        if (request()->routeIs('admin.*')) {
            return 'admin.receipts.index';
        }
        return 'receipts.index';
    }

    /**
     * Get column status proper value depending on entered prices.
     */
    private function getStatus(array $data)
    {
        $total = $this->getTotal($data);
        if ($total <= $data['paid']) {
            return 'paid';
        } else {
            return 'unpaid';
        }
    }

    /**
     * Get the total of the entered prices.
     */
    private function getTotal(array $data)
    {
        $total = 0;
        foreach ($data as $key => $value) {
            if (strpos($key, 'price') !== false) {
                $total += $value;
            }
        }
        return $total;
    }

    /**
     * Store entered services data to the pivot table.
     */
    private function storeServicesData($receipt)
    {
        $servicesInputs = [];
        foreach (request()->all() as $key => $value) {
            if (strpos($key, 'price') !== false || strpos($key, 'description') !== false) {
                $arr = explode('|', $key);
                $serviceId = $arr[0];
                $fieldName = $arr[1];
                $servicesInputs[$serviceId][$fieldName] = $value;
            }
        }
        $receipt->services()->sync($servicesInputs);
    }
}
