@extends('layouts.app')

@section('header')
    {{ __('views.task-status.create') }}
@endsection

@section('content')
    {{ html()->modelForm($status, 'POST', route('task_statuses.store'))->class('view')->open() }}
        @include('task-status.form')
        {{ html()->submit(__('Save')) }}
    {{ html()->closeModelForm() }}
@endsection
