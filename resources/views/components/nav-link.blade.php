@props([
    'href' => '#',
    'active' => false,
])

<a href="{{ $href }}" 
   {{ $attributes->merge([
       'class' => 'nav-link me-2 rounded px-3 py-2 ' . ($active ? 'bg-secondary text-white' : 'text-white')
   ]) }}
   aria-current="{{ $active ? 'page' : 'false' }}">
    {{ $slot }}
</a>
