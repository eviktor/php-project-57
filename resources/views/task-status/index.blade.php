@extends('layouts.app')

@section('content')
    <h1 class="mb-2 text-center">{{ __("Statuses") }}</h1>
    <div class="mt-2 ml-1">
        <a class="no-underline" href="{{ route('task_statuses.create') }}">
            {{ __('Create new') }}
        </a>
    </div>
    <div class="hidden mt-2">
        {{  html()->form('GET', route('task_statuses.index'))->open() }}
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
                    <th scope="col">@lang('models.task_status.id')</th>
                    <th scope="col">@lang('models.task_status.name')</th>
                    <th scope="col">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                @foreach($statuses as $status)
                    <tr>
                        <td>{{$status->id}}</td>
                        <th scope="row">
                            <a class="no-underline" href="{{route('task_statuses.show', $status->id)}}">
                                {{ __($status->name) }}
                            </a>
                        </th>
                        <td>
                            <a class="no-underline" href="{{route('task_statuses.edit', $status->id)}}">
                                {{ __('Edit') }}
                            </a>
                            <a class="text-red-500 no-underline" href="{{route('task_statuses.destroy', $status->id)}}" data-confirm="{{ __('Are you sure?') }}" data-method="delete">
                                {{ __('Delete') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-2">
            {{$statuses->links()}}
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
