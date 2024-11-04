@extends('layouts.app')

@section('header')
    {{ __('views.task.edit') }}
@endsection

@section('content')
    {{ html()->modelForm($task, 'PATCH', route('tasks.update', $task))->class('view')->open() }}
        @include('task.form')
        {{ html()->submit(__('Update')) }}
    {{ html()->closeModelForm() }}
@endsection
