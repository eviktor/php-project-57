<button {{ $attributes->merge(['type' => 'submit', 'class' => 'link-button']) }}>
    {{ $slot }}
</button>
