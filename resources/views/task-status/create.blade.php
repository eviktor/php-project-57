@extends('layouts.app')

@section('content')
    <h1 class="mb-2 text-center">{{ __('Status') }}</h1>

    {{ html()->modelForm($status, 'POST', route('task_statuses.store'))->class('view')->open() }}
        @include('task-status.form')
        {{ html()->submit(__('Save')) }}
    {{ html()->closeModelForm() }}
@endsection
