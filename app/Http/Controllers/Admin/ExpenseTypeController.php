<?php

namespace App\Http\Controllers\Admin;

use App\Models\ExpenseType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExpenseTypeRequest;

class ExpenseTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view expense-types')->only('index');
        $this->middleware('can:create expense-types')->only('store');
        $this->middleware('can:edit expense-types')->only(['edit', 'update']);
        $this->middleware('can:delete expense-types')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.expense-types.index', [
            'items' => ExpenseType::paginate(10)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseTypeRequest $request)
    {
        $data = $request->validated();
        ExpenseType::create($data);
        success(__('flashes.store'));
        return redirect()->route('admin.expense-types.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpenseType  $expense_type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense_type = ExpenseType::find($id);
        if ($expense_type) {
            return response()->json(['status' => true, 'name' => $expense_type->name]);
        }
        return response()->json(['status' => false, 'name' => '']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpenseType  $expense_type
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseTypeRequest $request, ExpenseType $expense_type)
    {
        $data = $request->validated();
        $expense_type->update($data);
        success(__('flashes.update'));
        return redirect()->route('admin.expense-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseType  $expense_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseType $expense_type)
    {
        $expense_type->delete();
        success(__('flashes.destroy'));
        return redirect()->route('admin.expense-types.index');
    }
}
