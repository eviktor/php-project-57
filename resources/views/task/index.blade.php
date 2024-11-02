@extends('layouts.app')

@section('header')
    {{ __('Tasks') }}
@endsection

@section('content')
    <div class="mt-2 ml-1">
        <a class="no-underline" href="{{ route('tasks.create') }}">
            {{ __('views.tasks.create') }}
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
                    <th scope="col">@lang('models.task.name')</th>
                    {{-- <th scope="col">@lang('models.task.description')</th> --}}
                    <th scope="col">@lang('models.task.status')</th>
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
                        <th scope="row">
                            <a class="no-underline" href="{{route('tasks.show', $task->id)}}">
                                {{ __($task->name) }}
                            </a>
                        </th>
                        {{-- <td scope="row">{{ Str::limit(__($task->description), 100) }}</td> --}}
                        <td scope="row" class="whitespace-nowrap">{{ __($task->status->name) }}</td>
                        <td scope="row">{{ $task->created_by->name }}</td>
                        <td scope="row">{{ $task->assigned_to?->name }}</td>
                        <td>
                            <a class="no-underline" href="{{route('tasks.edit', $task->id)}}">
                                {{ __('Edit') }}
                            </a>
                            <a class="text-red-500 no-underline" href="{{route('tasks.destroy', $task->id)}}" data-confirm="{{ __('Are you sure?') }}" data-method="delete">
                                {{ __('Delete') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-2">
            {{$tasks->links()}}
        </div>

        {{-- <nav class="flex items-center justify-between mt-5 text-sm" aria-label="Page navigation example">
        <p>
            Showing <strong>1-5</strong> of <strong>10</strong>
        </p>

        <ul class="flex list-style-none">
            <li>
            <a
                class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white"
                href="#!"
            >
                Previous
            </a>
            </li>
            <li>
            <a
                class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100"
                href="#!"
            >
                1
            </a>
            </li>
            <li aria-current="page">
            <a
                class="relative block rounded bg-blue-100 px-3 py-1.5 text-sm font-medium text-blue-700 transition-all duration-300"
                href="#!"
            >
                2
                <span class="absolute -m-px h-px w-px overflow-hidden whitespace-nowrap border-0 p-0 [clip:rect(0,0,0,0)]">
                (current)
                </span>
            </a>
            </li>
            <li>
            <a
                class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100"
                href="#!"
            >
                3
            </a>
            </li>
            <li>
            <a
                class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100"
                href="#!"
            >
                Next
            </a>
            </li>
        </ul>
        </nav>

    </div> --}}
@endsection
