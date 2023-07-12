@props(['text', 'outline' => false, 'href' => ''])

@php
    $designType = $outline ? 'btn-outline-danger' : 'btn-danger';
@endphp

<x-dashboard.buttons.base {{ $attributes->class([$designType]) }} :text="$text" :href="$href" />
