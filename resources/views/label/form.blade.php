@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-red-500">{{ __($error) }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="mb-3">
    {{  html()->label(__('models.label.name'), 'name') }}
    {{  html()->input('text', 'name') }}

    {{  html()->label(__('models.label.description'), 'description') }}
    {{  html()->textarea('description') }}
</div>
