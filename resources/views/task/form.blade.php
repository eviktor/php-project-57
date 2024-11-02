@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-red-500">{{ __($error) }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div>
    {{  html()->label(__('models.task.name'), 'name') }}
    {{  html()->input('text', 'name') }}

    {{  html()->label(__('models.task.description'), 'description') }}
    {{  html()->textarea('description') }}

    {{  html()->label(__('models.task.status'), 'status_id') }}
    {{  html()->select('status_id')
            ->options(\App\Models\TaskStatus::all()->pluck('name', 'id')->map(fn ($name) => __($name))->prepend('', ''))
            ->value($task->status_id) }}

    {{  html()->label(__('models.task.assigned_to'), 'assigned_to') }}
    {{  html()->select('assigned_to_id')
            ->options(\App\Models\User::all()->pluck('name', 'id')->prepend('', ''))
            ->value($task->assigned_to_id ?? '') }}

    {{  html()->label(__('models.task.labels'), 'labels[]') }}
    {{  html()->multiselect('labels[]')
            ->options(\App\Models\Label::all()->pluck('name', 'id'))
            ->value($task->labels->pluck('id')->toArray()) }}

</div>
