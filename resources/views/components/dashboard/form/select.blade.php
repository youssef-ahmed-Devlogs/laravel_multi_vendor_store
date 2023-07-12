@props(['name' => '', 'label' => ''])

<x-dashboard.form.group>
    @if ($label)
        <x-dashboard.form.label :text="$label" />
    @endif

    <select
        {{ $attributes->class(['form-control select2 select2-hidden-accessible', 'is-invalid' => $errors->has($name)]) }}
        style="width: 100%;">
        {{ $slot }}
    </select>

    <x-dashboard.form.error :name="$name" />
</x-dashboard.form.group>
