<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bonus;
use Illuminate\Http\Request;
use App\Http\Requests\BonusRequest;

class BonusController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view bonuses')->only('index');
        // $this->middleware('can:show bonuses')->only('show');
        $this->middleware('can:create bonuses')->only(['create', 'store']);
        $this->middleware('can:edit bonuses')->only(['edit', 'update']);
        $this->middleware('can:delete bonuses')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Bonus::with('user')->paginate(10);
        return view('user.bonuses.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get(['id', 'name']);
        return view('user.bonuses.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BonusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BonusRequest $request)
    {
        $data = $request->validated();
        $data['is_paid'] = $data['is_paid'] ?? 0;

        Bonus::create($data);
        success(__('flashes.store'));
        return redirect()->route('bonuses.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function edit(Bonus $bonus)
    {
        $users = User::get(['id', 'name']);
        return view('user.bonuses.edit',[
            'users' => $users,
            'item' => $bonus
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BonusRequest  $request
     * @param  \App\Models\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function update(BonusRequest $request, Bonus $bonus)
    {
        $data = $request->validated();
        $data['is_paid'] = $data['is_paid'] ?? 0;
        
        $bonus->update($data);
        success(__('flashes.update'));
        return redirect()->route('bonuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bonus $bonus)
    {
        $bonus->delete();
        success(__('flashes.destroy'));
        return redirect()->route('bonuses.index');
    }
}
