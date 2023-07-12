@props(['text', 'href' => ''])

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class(['btn']) }}>{{ $text }}</a>
@else
    <button {{ $attributes->class(['btn']) }}>{{ $text }}</button>
@endif
