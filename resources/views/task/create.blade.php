@extends('layouts.app')

@section('header')
    {{ __('Create Task') }}
@endsection

@section('content')
    {{ html()->modelForm($task, 'POST', route('tasks.store'))->class('view')->open() }}
        @include('task.form')
        {{ html()->submit(__('Save')) }}
    {{ html()->closeModelForm() }}
@endsection
