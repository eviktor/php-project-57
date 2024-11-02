@extends('layouts.app')

@section('header')
    {{ __('Task') }}
@endsection

@section('content')
    <p class="pl-1">
        <span class="font-bold">{{ __('models.task.name') }}:</span> {{ $task->name }}
    </p>
    <p class="pl-1">
        <span class="font-bold">{{ __('models.task.description') }}:</span> {{ $task->description }}
    </p>
    <p class="pl-1">
        <span class="font-bold">{{ __('models.task.status') }}:</span> {{ $task->status->name }}
    </p>
    <p class="pl-1">
        <span class="font-bold">{{ __('models.task.assigned_to') }}:</span> {{ $task->assigned_to?->name }}
    </p>
    <p class="pl-1">
        <span class="font-bold">{{ __('models.task.created_by') }}:</span> {{ $task->created_by->name }}
    </p>
@endsection
