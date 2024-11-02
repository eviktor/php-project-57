@props(['type', 'message'])

<div role="alert" class="alert-{{ $type }}">
    {{ $message }}
</div>
