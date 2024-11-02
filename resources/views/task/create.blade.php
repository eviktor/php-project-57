@extends('layouts.app')

@section('content')
    <h1 class="mb-2 text-center">{{ __('Task') }}</h1>

    {{ html()->modelForm($task, 'POST', route('tasks.store'))->class('view')->open() }}
        @include('task.form')
        {{ html()->submit(__('Save')) }}
    {{ html()->closeModelForm() }}
@endsection
