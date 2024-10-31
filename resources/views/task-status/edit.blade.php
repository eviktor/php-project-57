@extends('layouts.app')

@section('content')
    <h1 class="mb-2">{{ __('Status') }}</h1>

    {{ html()->modelForm($task_status, 'PATCH', route('task_statuses.update', $task_status))->open() }}
        @include('task-status.form')
        {{ html()->submit(__('Update'))->class('btn btn-primary') }}
    {{ html()->closeModelForm() }}
@endsection
