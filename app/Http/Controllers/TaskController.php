<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller implements HasMiddleware
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
            'name.required' => __('views.task.name_required'),
            'status_id.required' => __('views.task.status_required'),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = QueryBuilder::for(Task::class)
            ->allowedFilters(['status_id', 'assigned_to_id', 'created_by_id'])
            ->paginate();
        $filter = $request->query('filter');

        return view('task.index', compact('tasks', 'filter'));
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
            'status_id' => 'required',
            'assigned_to_id' => '',
            'labels' => 'array',
        ], $this->messages());

        $user = auth()->user();
        $task = $user->tasks()->make($validatedData);
        $task->save();

        $task->labels()->sync($validatedData['labels'] ?? []);

        flash(__('views.task.created'), 'success');
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
            'status_id' => 'required',
            'assigned_to_id' => '',
            'labels' => 'array',
        ], $this->messages());

        $task->fill($validatedData);
        $task->save();

        $task->labels()->sync($validatedData['labels'] ?? []);

        flash(__('views.task.updated'), 'success');
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if (auth()->user()?->id !== $task->created_by_id) {
            flash(__('views.task.cannot_delete'), 'error');
        } else {
            $task->delete();
            flash(__('views.task.deleted'), 'success');
        }

        return redirect()->route('tasks.index');
    }
}
