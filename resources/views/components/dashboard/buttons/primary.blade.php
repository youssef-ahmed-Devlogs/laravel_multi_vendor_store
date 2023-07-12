@props(['text', 'outline' => false, 'href' => ''])

@php
    $designType = $outline ? 'btn-outline-primary' : 'btn-primary';
@endphp

<x-dashboard.buttons.base {{ $attributes->class([$designType]) }} :text="$text" :href="$href" />
