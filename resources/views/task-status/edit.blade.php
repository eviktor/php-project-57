@extends('layouts.app')

@section('content')
    <h1 class="mb-2 text-center">{{ __('Status') }}</h1>

    {{ html()->modelForm($task_status, 'PATCH', route('task_statuses.update', $task_status))->class('view')->open() }}
        @include('task-status.form')
        {{ html()->submit(__('Update')) }}
    {{ html()->closeModelForm() }}
@endsection
