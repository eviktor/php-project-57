<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = Task::paginate();
        $inputName = $request->input('name');

        return view('task.index', compact('tasks', 'inputName'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $task = $user->tasks()->make();
        return view('task.create', compact('task'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => '',
            'status_id' => 'integer|required',
            'assigned_to_id' => '',
        ]);

        $user = auth()->user();
        $task = $user->tasks()->make($validatedData);
        $task->save();
        return redirect()
            ->route('tasks.index')
            ->with('success', __('Task created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => '',
            'status_id' => 'integer|required',
            'assigned_to_id' => '',
        ]);

        $task->fill($validatedData);
        $task->save();
        return redirect()
            ->route('tasks.index')
            ->with('success', __('Task updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()
            ->route('tasks.index')
            ->with('success', __('Task removed successfully'));
    }
}
