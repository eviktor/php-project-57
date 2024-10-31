@extends('layouts.app')

@section('content')
    <section>
        <div class="px-4 pt-20">
            @foreach ($statuses as $status)
                <h3><a href="{{route('task_statuses.show', $status->id)}}">{{ __($status->name) }}</a></h3>
                <div class="flex gap-2">
                    <a href="{{route('task_statuses.edit', $status->id)}}">{{ __('Edit') }}</a>
                    <a href="{{route('task_statuses.destroy', $status->id)}}" data-confirm="{{ __('Are you sure?') }}" data-method="delete" rel="nofollow">{{ __('Delete') }}</a>
                </div>
            @endforeach
            {{$statuses->links()}}
            <div><a href="{{route('task_statuses.create')}}">{{ __('Create new') }}</a></div>
        </div>
    </section>
@endsection