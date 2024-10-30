@extends('layouts.app')

@section('content')
    <section>
        <div class="px-4 pt-20">
            @foreach ($statuses as $status)
                <h3><a href="{{route('task_statuses.show', $status->id)}}">{{$status->name}}</a></h3>
                <div class="flex gap-2">
                    <a href="{{route('task_statuses.edit', $status->id)}}">Редактировать</a>
                    <a href="{{route('task_statuses.destroy', $status->id)}}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a>
                </div>
            @endforeach
            {{$statuses->links()}}
            <div><a href="{{route('task_statuses.create')}}">Создать статус</a></div>
        </div>
    </section>
@endsection
