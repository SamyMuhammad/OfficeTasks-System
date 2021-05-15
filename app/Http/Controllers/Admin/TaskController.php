<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use App\Models\User;
use App\Models\Receipt;
use App\Models\TaskStatus;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view tasks')->only('index');
        $this->middleware('can:create tasks')->only(['create', 'store']);
        $this->middleware('can:edit tasks')->only(['edit', 'update']);
        $this->middleware('can:delete tasks')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Task::with('receipt', 'task_status', 'users')->paginate(10);
        $pageTitle = 'المهام';
        return view('admin.tasks.index', compact('items', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models = $this->getAssociatedModels();
        return view('admin.tasks.create', compact('models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $data = $request->validated();
        $data['status_changing_date'] = date('Y-m-d');
        try {
            DB::transaction(function () use ($data, $request){
                $task = Task::create($data);
                
                if ($data['task_status_id'] == 2) { $task->updateActivationDate(); }
                
                if ($request->filled('users')) { $task->users()->attach($request->users); }
            });
            success(__('flashes.store'));
        } catch (\Throwable $th) {
            // throw $th;
            error(__('flashes.error'));
        }
        return redirect()->route('admin.tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Task $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $task->load('receipt', 'task_status', 'users');
        return view('admin.tasks.show', [
            'item' => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Task $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $task->load('receipt', 'task_status', 'users');
        $models = $this->getAssociatedModels();
        $models['receipts']->prepend($task->receipt); // adding the task receipt with the receipts.
        return view('admin.tasks.edit', [
            'item' => $task,
            'models' => $models,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TaskRequest  $request
     * @param  Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, Task $task)
    {
        $data = $request->validated();
        if ($data['task_status_id'] != $task->task_status_id) {
            $data['status_changing_date'] = date('Y-m-d');
        }
        try {
            DB::transaction(function () use($data, $request, $task) {
                if ($data['task_status_id'] == 2 && $task->task_status_id != 2) {
                    $task->updateActivationDate();
                }
                $task->update($data);
                
                if ($request->has('users')) { $task->users()->sync($request->users); }
            });
            success(__('flashes.update'));
        } catch (\Throwable $th) {
            // throw $th;
            error(__('flashes.error'));
        }
        return redirect()->route('admin.tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        success(__('flashes.destroy'));
        return redirect()->route('admin.tasks.index');
    }

    private function getAssociatedModels()
    {
        $models['receipts'] = Receipt::doesntHave('task')->latest('id')->get(['id']);
        $models['task_statuses'] = TaskStatus::get(['id', 'name']);
        $models['users'] = User::get(['id', 'name']);
        return $models;
    }
}
