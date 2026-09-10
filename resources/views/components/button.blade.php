@props([
    'color' => 'primary',
    'sizes' => 'sm',
    'justify' => 'center',
    'align' => 'center',
    'rounded' => 'md',
    'shadow' => 'none',
    'transform' => 'none',
    'type' => 'submit',
])
<button {{ $attributes->merge(['type' => $type, 'class' => $btnClass]) }} style="letter-spacing: 0.15em;">
    {{ $slot }}
</button>
