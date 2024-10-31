@extends('layouts.app')

@section('content')
    <h1 class="mb-2">{{ __('Status') }}</h1>

    <p class="pl-1">
        <span class="font-bold">{{ __('models.task_status.name') }}:</span> {{ $task_status->name }}
        @if($task_status->name !== __($task_status->name))
            ({{ __($task_status->name) }})
        @endif
    </p>
@endsection
