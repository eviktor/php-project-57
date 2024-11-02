@extends('layouts.app')

@section('header')
    {{ __('Tasks') }}
@endsection

@section('content')
    <div class="mt-2 ml-1">
        <a class="no-underline" href="{{ route('tasks.create') }}">
            {{ __('Create Task') }}
        </a>
    </div>
    <div class="hidden mt-2">
        {{  html()->form('GET', route('tasks.index'))->open() }}
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
                    <th scope="col">@lang('models.task.id')</th>
                    <th scope="col">@lang('models.task.status')</th>
                    <th scope="col">@lang('models.task.name')</th>
                    <th scope="col">@lang('models.task.created_by')</th>
                    <th scope="col">@lang('models.task.assigned_to')</th>
                    <th scope="col">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{$task->id}}</td>
                        <td scope="row" class="whitespace-nowrap">{{ __($task->status->name) }}</td>
                        <th scope="row">
                            <a class="no-underline" href="{{route('tasks.show', $task->id)}}">
                                {{ __($task->name) }}
                            </a>
                        </th>
                        <td scope="row">{{ $task->created_by->name }}</td>
                        <td scope="row">{{ $task->assigned_to?->name }}</td>
                        <td>
                            @if(auth()->user()->id === $task->created_by_id)
                                <a class="pl-1 text-red-500 no-underline" href="{{route('tasks.destroy', $task->id)}}" data-confirm="{{ __('Are you sure?') }}" data-method="delete">
                                    {{ __('Delete') }}
                                </a>
                            @endif
                            <a class="text-blue-500 no-underline" href="{{route('tasks.edit', $task->id)}}">
                                {{ __('Edit') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-2">
            {{$tasks->links()}}
        </div>
    </div>
@endsection
