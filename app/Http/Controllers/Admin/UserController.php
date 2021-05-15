<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:view users')->only('index');
        $this->middleware('can:show users')->only('show');
        $this->middleware('can:create users')->only(['create', 'store']);
        $this->middleware('can:edit users')->only(['edit', 'update']);
        $this->middleware('can:delete users')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('category')->paginate(10);
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('guard_name', 'web')->get();
        $categories = Category::get(['id', 'name']);
        return view('admin.users.create', compact('roles', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->except(['password']);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        if (! $request->has('roles')) {
            $data['roles'] = [];
        }
        if (! $request->has('permissions')) {
            $data['permissions'] = [];
        }
        
        try {
            DB::transaction(function () use ($data) {
                $user = User::create($data);
                $user->syncRoles($data['roles']);
                $user->syncPermissions($data['permissions']);
                success(__('flashes.store'));
            });
        } catch (\Throwable $th) {
            error(__('flashes.error'));
        }
        return redirect()->route('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::where('guard_name', 'web')->get();
        $categories = Category::get(['id', 'name']);
        return view('admin.users.edit', compact('user', 'roles', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->except(['password']);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        if (! $request->has('roles')) {
            $data['roles'] = [];
        }
        if (! $request->has('permissions')) {
            $data['permissions'] = [];
        }

        try {
            DB::transaction(function () use ($user, $data) {
                $user->update($data);
                $user->syncRoles($data['roles']);
                $user->syncPermissions($data['permissions']);
                success(__('flashes.update'));
            });
        } catch (\Throwable $th) {
            error(__('flashes.error'));
        }
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            DB::transaction(function () use ($user) {
                $user->delete();
                success(__('flashes.destroy'));
            });
        } catch (\Throwable $th) {
            error(__('flashes.error'));
        }
        return redirect()->route('admin.users.index');
    }
}
