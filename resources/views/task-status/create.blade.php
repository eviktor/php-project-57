@extends('layouts.app')

@section('content')
    <h1 class="mb-2">{{ __('Status') }}</h1>

    {{ html()->modelForm($status, 'POST', route('task_statuses.store'))->open() }}
        @include('task-status.form')
        {{ html()->submit(__('Save'))->class('btn btn-primary font-bold') }}
    {{ html()->closeModelForm() }}
@endsection
