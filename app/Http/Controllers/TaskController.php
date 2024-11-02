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
        $tasks = Task::orderBy('id')->paginate(10);
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
        flash(__('Task created successfully'), 'success');
        return redirect()->route('tasks.index');
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
        flash(__('Task updated successfully'), 'success');
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if (auth()->user()->id !== $task->created_by_id) {
            flash(__('Only the creator of the task can delete it'), 'error');
        } else {
            $task->delete();
            flash(__('Task removed successfully'), 'success');
        }

        return redirect()->route('tasks.index');
    }
}
