@extends('layouts.app')

@section('header')
    {{ __('Labels') }}
@endsection

@section('content')
    <div class="flex mb-4 ml-1">
        @auth
            <a class="filter-button" href="{{ route('labels.create') }}">
                {{ __('views.label.create') }}
            </a>
        @endauth
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
                    <th scope="col">@lang('models.label.description')</th>
                    <th scope="col">@lang('models.label.created_at')</th>
                    @auth
                        <th scope="col">{{ __('Actions') }}</th>
                    @endauth
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
                        <td>{{ Str::limit($label->description, 100) }}</td>
                        <td>{{ $label->created_at->format('d.m.Y') }}</td>
                        @auth
                            <td>
                                <a class="text-red-500 no-underline" href="{{route('labels.destroy', $label->id)}}" data-confirm="{{ __('Are you sure?') }}" data-method="delete">
                                    {{ __('Delete') }}
                                </a>
                                <a class="pl-1 text-blue-500 no-underline" href="{{route('labels.edit', $label->id)}}">
                                    {{ __('Edit') }}
                                </a>
                            </td>
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-2">
            {{$labels->links()}}
        </div>
    </div>
@endsection
