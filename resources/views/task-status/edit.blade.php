@extends('layouts.app')

@section('header')
    {{ __('views.task-status.edit') }}
@endsection

@section('content')
    {{ html()->modelForm($task_status, 'PATCH', route('task_statuses.update', $task_status))->class('view')->open() }}
        @include('task-status.form')
        {{ html()->submit(__('Update')) }}
    {{ html()->closeModelForm() }}
@endsection
