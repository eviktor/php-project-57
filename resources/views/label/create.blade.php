@extends('layouts.app')

@section('header')
    {{ __('views.label.create') }}
@endsection

@section('content')
    {{ html()->modelForm($label, 'POST', route('labels.store'))->class('view')->open() }}
        @include('label.form')
        {{ html()->submit(__('Save')) }}
    {{ html()->closeModelForm() }}
@endsection
