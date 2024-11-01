@extends('layouts.app')

@section('content')
    <h1 class="mb-2">{{ __('Task') }}</h1>

    {{ html()->modelForm($task, 'PATCH', route('tasks.update', $task))->open() }}
        @include('task.form')
        {{ html()->submit(__('Update'))->class('btn btn-primary') }}
    {{ html()->closeModelForm() }}
@endsection
