@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'block w-full px-4 py-2 text-start text-sm border-l-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out';
@endphp

<a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
