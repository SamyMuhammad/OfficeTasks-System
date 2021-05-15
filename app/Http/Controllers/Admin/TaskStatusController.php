<?php

namespace App\Http\Controllers\Admin;

use App\Models\TaskStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStatusRequest;

class TaskStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view task-statuses')->only('index');
        $this->middleware('can:create task-statuses')->only('store');
        $this->middleware('can:edit task-statuses')->only(['edit', 'update']);
        $this->middleware('can:delete task-statuses')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.task-statuses.index', [
            'items' => TaskStatus::paginate(10)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStatusRequest $request)
    {
        $data = $request->validated();
        TaskStatus::create($data);
        success(__('flashes.store'));
        return redirect()->route('admin.task-statuses.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskStatus  $task_status
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task_status = TaskStatus::find($id);
        if ($task_status) {
            $this->checkForEditing($task_status);
            return response()->json(['status' => true, 'name' => $task_status->name]);
        }
        return response()->json(['status' => false, 'name' => '']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskStatusRequest $request, TaskStatus $task_status)
    {
        $this->checkForEditing($task_status);
        $data = $request->validated();
        $task_status->update($data);
        success(__('flashes.update'));
        return redirect()->route('admin.task-statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskStatus  $task_status
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskStatus $task_status)
    {
        $this->checkForEditing($task_status);
        $task_status->delete();
        success(__('flashes.destroy'));
        return redirect()->route('admin.task-statuses.index');
    }

    /**
     * To make sure that the fixed items won't be changed.
     */
    private function checkForEditing(TaskStatus $task_status)
    {
        if (! $task_status->isEditable()) {
            abort(403, "You can't edit or delete this item.");
        }
    }
}
