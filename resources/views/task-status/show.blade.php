@extends('layouts.app')

@section('header')
    {{ __('views.task-status.show') }}
@endsection

@section('content')
    <p class="mt-2 ml-1">
        <span class="font-bold">{{ __('models.task_status.name') }}:</span> {{ $task_status->name }}
    </p>
@endsection
