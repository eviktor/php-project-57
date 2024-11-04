@extends('layouts.app')

@section('header')
    {{ __('views.label.edit') }}
@endsection

@section('content')
    {{ html()->modelForm($label, 'PATCH', route('labels.update', $label))->class('view')->open() }}
        @include('label.form')
        {{ html()->submit(__('Update')) }}
    {{ html()->closeModelForm() }}
@endsection
