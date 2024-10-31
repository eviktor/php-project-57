<?php

namespace App\Http\Controllers;

use App\Models\TaskStatus;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $statuses = TaskStatus::paginate();
        $inputName = $request->input('name');

        return view('task-status.index', compact('statuses', 'inputName'));
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:task_statuses'
        ]);

        $status = new TaskStatus($validatedData);
        $status->save();
        return redirect()
            ->route('task_statuses.index')
            ->with('success', __('Task status created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskStatus $task_status)
    {
        return view('task-status.show', compact('task_status'));    }

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
    public function update(Request $request, TaskStatus $task_status)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:task_statuses'
        ]);

        $task_status->fill($validatedData);
        $task_status->save();
        return redirect()
            ->route('task_statuses.index')
            ->with('success', __('Task status updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskStatus $task_status)
    {
        $task_status->delete();
        return redirect()
            ->route('task_statuses.index')
            ->with('success', __('Task status removed successfully'));
    }
}
