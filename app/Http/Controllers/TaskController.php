<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Task::class, 'task');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = QueryBuilder::for(Task::class)
            ->allowedFilters([
                AllowedFilter::exact('status_id'),
                AllowedFilter::exact('assigned_to_id'),
                AllowedFilter::exact('created_by_id')
            ])
            ->with('status', 'assignedTo', 'createdBy')
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
    public function store(StoreTaskRequest $request)
    {
        $user = auth()->user();
        $validatedData = $request->validated();
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
    public function update(StoreTaskRequest $request, Task $task)
    {
        $validatedData = $request->validated();
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
