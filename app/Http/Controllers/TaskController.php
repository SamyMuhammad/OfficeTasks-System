<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskStatus;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class TaskController extends Controller
{
    /**
     * Get the tasks assigned to the auth user.
     */
    public function myTasks()
    {
        $user = auth()->user();
        $tasks = $user->tasks()->with('receipt', 'task_status', 'users')->paginate(10);
        return view('admin.tasks.index', [
            'pageTitle' => 'مهامي',
            'items' => $tasks,
            'task_statuses' => TaskStatus::get(['id', 'name'])
        ]);
    }

    /**
     * Get the tasks which its receipt category is the auth user category. 
     */
    public function categoryTasks()
    {
        $userCategory = optional(auth()->user()->category)->name;
        
        $tasks = Task::postponed()->whereHas('receipt.category', function (Builder $query) use ($userCategory){
            $query->where('name', $userCategory);
        })->with('receipt', 'task_status', 'users')->paginate(10);
        
        return view('admin.tasks.index', [
            'pageTitle' => 'مهام القسم',
            'items' => $tasks,
            'task_statuses' => TaskStatus::get(['id', 'name'])
        ]);
    }

    /**
     * Change the status of the task.
     */
    public function changeStatus(Request $request, Task $task)
    {
        $request->validate(['task_status_id' => 'required|exists:task_statuses,id']);
        $task->update(['task_status_id' => $request->task_status_id]);
        if ($request->task_status_id == 2) { $task->updateActivationDate(); }
        success(__('flashes.update'));
        return back();
    }

    /**
     * Associte the auth user with the task.
     */
    public function accept(Task $task)
    {
        $task->users()->attach(auth()->id());
        success(__('flashes.store'));
        return back();
    }
}
