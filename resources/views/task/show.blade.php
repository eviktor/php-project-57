@extends('layouts.app')

@section('header')
    {{ __('views.task.show') }}
@endsection

@section('content')
    <p class="mt-2 ml-1">
        <span class="font-bold">{{ __('models.task.name') }}:</span> {{ $task->name }}
    </p>
    <p class="mt-2 ml-1">
        <span class="font-bold">{{ __('models.task.description') }}:</span> {{ $task->description }}
    </p>
    <p class="mt-2 ml-1">
        <span class="font-bold">{{ __('models.task.status') }}:</span> {{ $task->status->name }}
    </p>
    <p class="mt-2 ml-1">
        <span class="font-bold">{{ __('models.task.assigned_to') }}:</span> {{ $task->assigned_to?->name }}
    </p>
    <p class="mt-2 ml-1">
        <span class="font-bold">{{ __('models.task.created_by') }}:</span> {{ $task->created_by->name }}
    </p>
    <p class="mt-2 ml-1">
        <span class="font-bold">{{ __('models.task.labels') }}:</span>
        <div>
            @foreach ($task->labels as $label)
                <span class="badge">{{ $label->name }}</span>
            @endforeach
        </div>
    </p>
@endsection
