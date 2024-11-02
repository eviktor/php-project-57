@extends('layouts.app')

@section('header')
    {{ __('Edit Label') }}
@endsection

@section('content')
    {{ html()->modelForm($label, 'PATCH', route('labels.update', $label))->class('view')->open() }}
        @include('label.form')
        {{ html()->submit(__('Update')) }}
    {{ html()->closeModelForm() }}
@endsection
