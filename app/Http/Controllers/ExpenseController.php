<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Service;
use App\Models\ExpenseType;
use Illuminate\Http\Request;
use App\Http\Requests\ExpenseRequest;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view expenses')->only('index');
        // $this->middleware('can:show expenses')->only('show');
        $this->middleware('can:create expenses')->only(['create', 'store']);
        $this->middleware('can:edit expenses')->only(['edit', 'update']);
        $this->middleware('can:delete expenses')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Expense::with('service', 'expense_type')->paginate(10);
        return view('user.expenses.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::get(['id', 'name']);
        $expense_types = ExpenseType::get(['id', 'name']);
        return view('user.expenses.create', compact('services', 'expense_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ExpenseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseRequest $request)
    {
        $data = $request->validated();
        $data['is_paid'] = $data['is_paid'] ?? 0;

        Expense::create($data);
        success(__('flashes.store'));
        return redirect()->route('expenses.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        $services = Service::get(['id', 'name']);
        $expense_types = ExpenseType::get(['id', 'name']);
        $item = $expense;
        return view('user.expenses.edit', compact('item', 'services', 'expense_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ExpenseRequest  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseRequest $request, Expense $expense)
    {
        $data = $request->validated();
        $data['is_paid'] = $data['is_paid'] ?? 0;
        
        $expense->update($data);
        success(__('flashes.update'));
        return redirect()->route('expenses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        success(__('flashes.destroy'));
        return redirect()->route('expenses.index');
    }
}
