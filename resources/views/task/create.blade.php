@extends('layouts.app')

@section('content')
    <h1 class="mb-2">{{ __('Task') }}</h1>

    {{ html()->modelForm($task, 'POST', route('tasks.store'))->open() }}
        @include('task.form')
        {{ html()->submit(__('Save'))->class('btn btn-primary font-bold') }}
    {{ html()->closeModelForm() }}
@endsection
