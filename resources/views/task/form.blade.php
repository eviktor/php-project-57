@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-red-500">{{ __($error) }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="mb-3">
    {{  html()->label(__('models.task.name'), 'name')->class('form-label') }}
    {{  html()->input('text', 'name')->class('form-control') }}
</div>
<div class="mb-3">
    {{  html()->label(__('models.task.description'), 'description')->class('form-label') }}
    {{  html()->textarea('description')->class('form-control') }}
</div>
<div class="mb-3">
    {{  html()->label(__('models.task.status'), 'status_id')->class('form-label') }}
    {{  html()->select('status_id')
            ->options( \App\Models\TaskStatus::all()->pluck('name', 'id'))
            ->value($task->status_id)
            ->class('form-control') }}
</div>
<div class="mb-3">
    {{  html()->label(__('models.task.assigned_to'), 'assigned_to')->class('form-label') }}
    {{  html()->select('assigned_to_id')
            ->options(\App\Models\User::all()->pluck('name', 'id')->prepend('', ''))
            ->value($task->assigned_to_id ?? '')
            ->class('form-control') }}
</div>
