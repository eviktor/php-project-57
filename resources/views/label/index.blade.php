@extends('layouts.app')

@section('header')
    {{ __('Labels') }}
@endsection

@section('content')
    <div class="mt-2 ml-1">
        <a class="no-underline" href="{{ route('labels.create') }}">
            {{ __('Create Label') }}
        </a>
    </div>
    <div class="hidden mt-2">
        {{  html()->form('GET', route('labels.index'))->open() }}
                {{  html()->input('text', 'name', $inputName) }}
                {{  html()->submit('Search') }}
        {{ html()->form()->close() }}
    </div>

    <!-- Table responsive wrapper -->
    <div class="mt-2 index-container">
        <!-- Table -->
        <table class="index">
            <!-- Table head -->
            <thead>
                <tr>
                    <th scope="col">@lang('models.label.id')</th>
                    <th scope="col">@lang('models.label.name')</th>
                    <th scope="col">@lang('models.label.created_at')</th>
                    <th scope="col">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                @foreach($labels as $label)
                    <tr>
                        <td>{{$label->id}}</td>
                        <th scope="row">
                            <a class="no-underline" href="{{route('labels.show', $label->id)}}">
                                {{ __($label->name) }}
                            </a>
                        </th>
                        <td>
                            {{ __($label->created_at->format('Y-m-d')) }}
                        </td>
                        <td>
                            <a class="text-red-500 no-underline" href="{{route('labels.destroy', $label->id)}}" data-confirm="{{ __('Are you sure?') }}" data-method="delete">
                                {{ __('Delete') }}
                            </a>
                            <a class="pl-1 text-blue-500 no-underline" href="{{route('labels.edit', $label->id)}}">
                                {{ __('Edit') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-2">
            {{$labels->links()}}
        </div>
    </div>
@endsection
