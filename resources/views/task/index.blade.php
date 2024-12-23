@extends('layouts.app')

@section('header')
    {{ __('Tasks') }}
@endsection

@section('content')
    <div class="flex items-start w-full">
        <div class="ml-1">
            @can('create', \App\Models\Task::class)
                <a class="filter-button" href="{{ route('tasks.create') }}">
                    {{ __('views.task.create') }}
                </a>
            @endcan
        </div>
        <div class="flex ml-auto">
            {{ html()->form('GET', route('tasks.index'))->class('filter')->open() }}

            {{ html()->select('filter[status_id]')
                ->options(\App\Models\TaskStatus::all()->pluck('name', 'id')
                    ->prepend(__('Status'), ''))
                ->class('w-36')
                ->value($filter['status_id'] ?? '') }}

            {{ html()->select('filter[created_by_id]')
                ->options(\App\Models\User::all()->pluck('name', 'id')->prepend(__('models.task.created_by'), ''))
                ->value($filter['created_by_id'] ?? '') }}

            {{ html()->select('filter[assigned_to_id]')
                ->options(\App\Models\User::all()->pluck('name', 'id')->prepend(__('models.task.assigned_to'), ''))
                ->value($filter['assigned_to_id'] ?? '') }}

            {{ html()->submit(__('Apply')) }}

            {{ html()->form()->close() }}
        </div>
    </div>

    <!-- Table responsive wrapper -->
    <div class="index-container">
        <!-- Table -->
        <table class="index">
            <!-- Table head -->
            <thead>
                <tr>
                    <th scope="col">@lang('models.task.id')</th>
                    <th scope="col">@lang('models.task.status')</th>
                    <th scope="col">@lang('models.task.name')</th>
                    <th scope="col">@lang('models.task.created_by')</th>
                    <th scope="col">@lang('models.task.assigned_to')</th>
                    <th scope="col">@lang('models.task.created_at')</th>
                    @auth
                        <th scope="col">{{ __('Actions') }}</th>
                    @endauth
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{$task->id}}</td>
                        <td scope="row" class="whitespace-nowrap">{{ $task->status->name }}</td>
                        <th scope="row">
                            <a class="no-underline" href="{{route('tasks.show', $task->id)}}">
                                {{ $task->name }}
                            </a>
                        </th>
                        <td scope="row">{{ $task->createdBy->name }}</td>
                        <td scope="row">{{ $task->assignedTo?->name }}</td>
                        <td scope="row">{{ $task->created_at->format('d.m.Y') }}</td>
                        @auth
                        <td>
                            @can('delete', $task)
                                <a class="pl-1 text-red-500 no-underline" href="{{route('tasks.destroy', $task->id)}}" data-confirm="{{ __('Are you sure?') }}" data-method="delete">
                                    {{ __('Delete') }}
                                </a>
                            @endcan
                            @can('update', $task)
                                <a class="text-blue-500 no-underline" href="{{route('tasks.edit', $task->id)}}">
                                    {{ __('Edit') }}
                                </a>
                            @endcan
                        </td>
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-2">
            {{$tasks->links()}}
        </div>
    </div>
@endsection
