@extends('layouts.app')

@section('header')
    {{ __('Labels') }}
@endsection

@section('content')
    <div class="flex mb-4 ml-1">
        @can('create', \App\Models\Label::class)
            <a class="filter-button" href="{{ route('labels.create') }}">
                {{ __('views.label.create') }}
            </a>
        @endcan
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
                                {{ $label->name }}
                            </a>
                        </th>
                        <td>{{ Str::limit($label->description, 100) }}</td>
                        <td>{{ $label->created_at->format('d.m.Y') }}</td>
                        <td>
                            @can('delete', $label)
                                <a class="text-red-500 no-underline" href="{{route('labels.destroy', $label->id)}}" data-confirm="{{ __('Are you sure?') }}" data-method="delete">
                                    {{ __('Delete') }}
                                </a>
                            @endcan
                            @can('update', $label)
                                <a class="pl-1 text-blue-500 no-underline" href="{{route('labels.edit', $label->id)}}">
                                    {{ __('Edit') }}
                                </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-2">
            {{ $labels->links() }}
        </div>
    </div>
@endsection
