@extends('layouts.app')

@section('content')
    <h1>{{ __("Statuses") }}</h1>
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
    <div class="mt-2 overflow-x-auto bg-white">
        <!-- Table -->
        <table class="min-w-full text-sm text-left whitespace-nowrap">
            <!-- Table head -->
            <thead class="tracking-wider uppercase border-b-2 bg-neutral-50">
                <tr>
                    <th scope="col" class="px-6 py-4">@lang('models.task_status.id')</th>
                    <th scope="col" class="px-6 py-4">@lang('models.task_status.name')</th>
                    <th scope="col" class="px-6 py-4">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                @foreach($statuses as $status)
                    @if($loop->odd)
                        <tr class="border-b hover:bg-neutral-100">
                    @else
                        <tr class="border-b hover:bg-neutral-100 bg-neutral-50">
                    @endif
                        <td class="px-6 py-4">{{$status->id}}</td>
                        <th scope="row" class="px-6 py-4">
                            <a class="no-underline" href="{{route('task_statuses.show', $status->id)}}">
                                {{ __($status->name) }}
                            </a>
                        </th>
                        <td class="px-6 py-4">
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
