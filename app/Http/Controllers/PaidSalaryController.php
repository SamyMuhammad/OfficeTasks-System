<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PaidSalary;
use Illuminate\Http\Request;
use App\Http\Requests\PaidSalaryRequest;

class PaidSalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view paid-salaries')->only('index');
        // $this->middleware('can:show paid-salaries')->only('show');
        $this->middleware('can:create paid-salaries')->only(['create', 'store']);
        $this->middleware('can:edit paid-salaries')->only(['edit', 'update']);
        $this->middleware('can:delete paid-salaries')->only('destroy');
    }

    public function index()
    {
        $items = PaidSalary::with('user')->paginate(10);
        return view('user.paid-salaries.index', compact('items'));
    }

    public function create()
    {
        $users = User::get(['id', 'name']);
        return view('user.paid-salaries.create', compact('users'));
    }

    public function store(PaidSalaryRequest $request)
    {
        $data = $request->validated();

        if (array_key_exists('deduction_amount', $data)) {
            $this->validateDeductionAmount($data['user_id'], $data['deduction_amount']);
        }

        PaidSalary::create($data);
        success(__('flashes.store'));
        return redirect()->route('paid-salaries.index');
    }

    public function edit(PaidSalary $paid_salary)
    {
        $users = User::get(['id', 'name']);
        return view('user.paid-salaries.edit',[
            'users' => $users,
            'item' => $paid_salary
        ]);
    }

    public function update(PaidSalaryRequest $request, PaidSalary $paid_salary)
    {
        $data = $request->validated();

        if (array_key_exists('deduction_amount', $data)) {
            $this->validateDeductionAmount($data['user_id'], $data['deduction_amount']);
        }

        $paid_salary->update($data);
        success(__('flashes.update'));
        return redirect()->route('paid-salaries.index');
    }

    public function destroy(PaidSalary $paid_salary)
    {
        $paid_salary->delete();
        success(__('flashes.destroy'));
        return redirect()->route('paid-salaries.index');
    }

    /**
     * Validating the deduction amount to be less than or equal to the user salary.
     */
    private function validateDeductionAmount(int $userId, $deductionAmount)
    {
        $salary = User::find($userId)->salary;
        $data['deduction_amount'] = $deductionAmount;
        $rules['deduction_amount'] = ['numeric', 'max:'.$salary];
        validator($data, $rules)->validate();
    }
}
