@props([
    'label' => '',
    'type' => 'text',
    'name' => '',
])

<x-dashboard.form.group>
    @if ($label)
        <x-dashboard.form.label :text="$label" />
    @endif

    <input {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }} type="{{ $type }}"
        {{ $name ? "name=$name" : '' }}>

    <x-dashboard.form.error :name="$name" />
</x-dashboard.form.group>
