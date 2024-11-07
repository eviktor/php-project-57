@extends('layouts.app')

@section('header')
    {{ __('Statuses') }}
@endsection

@section('content')
    <div class="flex mb-4 ml-1">
        @can('create', \App\Models\TaskStatus::class)
            <a class="filter-button" href="{{ route('task_statuses.create') }}">
                {{ __('views.task-status.create') }}
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
                    <th scope="col">@lang('models.task_status.id')</th>
                    <th scope="col">@lang('models.task_status.name')</th>
                    <th scope="col">@lang('models.task_status.created_at')</th>
                    @auth
                        <th scope="col">{{ __('Actions') }}</th>
                    @endauth
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                @foreach($statuses as $status)
                    <tr>
                        <td>{{ $status->id }}</td>
                        <th scope="row">
                            <a class="no-underline" href="{{route('task_statuses.show', $status->id)}}">
                                {{ $status->name }}
                            </a>
                        </th>
                        <td>
                            {{ $status->created_at->format('d.m.Y') }}
                        </td>
                        <td>
                            @can('delete', $status)
                                <a class="text-red-500 no-underline" href="{{route('task_statuses.destroy', $status->id)}}" data-confirm="{{ __('Are you sure?') }}" data-method="delete">
                                    {{ __('Delete') }}
                            </a>
                            @endcan
                            @can('update', $status)
                                <a class="pl-1 text-blue-500 no-underline" href="{{route('task_statuses.edit', $status->id)}}">
                                    {{ __('Edit') }}
                                </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-2">
            {{ $statuses->links() }}
        </div>
    </div>
@endsection
