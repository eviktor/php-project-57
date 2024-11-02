@extends('layouts.app')

@section('header')
    {{ __('View Label') }}
@endsection

@section('content')
    <p class="pl-1">
        <span class="font-bold">{{ __('models.label.name') }}:</span> {{ $label->name }}
    </p>
    <p class="pl-1">
        <span class="font-bold">{{ __('models.label.description') }}:</span> {{ $label->description }}
    </p>
@endsection
