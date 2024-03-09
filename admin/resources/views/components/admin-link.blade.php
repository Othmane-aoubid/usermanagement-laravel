@props(['active'])

@php 
$classes = ($active ?? false)
            ? 'block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark:bg-gray-700'
            : 'block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-gray-700'

@endphp

<a {{ $attributes->merge(['class' => $class])}}>
    {{ $slot}}
</a>
