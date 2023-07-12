@props(['text', 'outline' => false, 'href' => ''])

@php
    $designType = $outline ? 'btn-outline-success' : 'btn-success';
@endphp

<x-dashboard.buttons.base {{ $attributes->class([$designType]) }} :text="$text" :href="$href" />
