@extends('layouts.app')

@section('header')
    {{ __('Status') }}
@endsection

@section('content')
    <p class="pl-1">
        <span class="font-bold">{{ __('models.task_status.name') }}:</span> {{ $task_status->name }}
        @if($task_status->name !== __($task_status->name))
            ({{ __($task_status->name) }})
        @endif
    </p>
@endsection
