@extends('layouts.app')

@section('header')
    {{ __('Create Label') }}
@endsection

@section('content')
    {{ html()->modelForm($label, 'POST', route('labels.store'))->class('view')->open() }}
        @include('label.form')
        {{ html()->submit(__('Save')) }}
    {{ html()->closeModelForm() }}
@endsection
