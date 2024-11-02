@extends('layouts.app')

@section('content')
    <h1 class="mb-2 text-center">{{ __('Task') }}</h1>

    {{ html()->modelForm($task, 'PATCH', route('tasks.update', $task))->class('view')->open() }}
        @include('task.form')
        {{ html()->submit(__('Update')) }}
    {{ html()->closeModelForm() }}
@endsection
