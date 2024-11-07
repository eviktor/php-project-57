<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskStatusRequest;
use App\Models\TaskStatus;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $statuses = TaskStatus::orderBy('id')->paginate(10);
        return view('task-status.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = new TaskStatus();
        return view('task-status.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskStatusRequest $request)
    {
        TaskStatus::create($request->validated());
        flash(__('views.task-status.created'), 'success');
        return redirect()->route('task_statuses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskStatus $task_status)
    {
        return view('task-status.show', compact('task_status'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskStatus $task_status)
    {
        return view('task-status.edit', compact('task_status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTaskStatusRequest $request, TaskStatus $task_status)
    {
        $task_status->fill($request->validated());
        $task_status->save();
        flash(__('views.task-status.updated'), 'success');
        return redirect()->route('task_statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskStatus $task_status)
    {
        if ($task_status->tasks()->exists()) {
            flash(__('views.task-status.cannot_delete'), 'error');
        } else {
            $task_status->delete();
            flash(__('views.task-status.deleted'), 'success');
        }

        return redirect()->route('task_statuses.index');
    }
}
