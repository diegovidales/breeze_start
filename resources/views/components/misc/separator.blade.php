@props([
    'vertical' => false,
])

<div
    role="separator"
    aria-orientation="{{ $vertical ? 'vertical' : 'horizontal' }}"
    {{ $attributes->class([
        'bg-gray-400',
        'h-full w-[1px]' => $vertical,
        'w-full h-[1px]' => !$vertical
    ])}}
></div>