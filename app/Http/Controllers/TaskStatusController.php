<?php

namespace App\Http\Controllers;

use App\Models\TaskStatus;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TaskStatusController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show'])
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => __('views.task-status.name_required'),
            'name.unique' => __('views.task-status.name_unique'),
        ];
    }

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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:task_statuses'
        ], $this->messages());

        $status = new TaskStatus($validatedData);
        $status->save();
        flash(__('views.task-status.created'), 'success');
        return redirect()->route('task_statuses.index');
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
            'name' => 'required|unique:task_statuses,name,' . $task_status->id,
        ], $this->messages());

        $task_status->fill($validatedData);
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
