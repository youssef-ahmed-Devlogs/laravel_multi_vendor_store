@props(['text', 'icon' => 'far fa-circle', 'route', 'isActive' => false, 'iconPosition' => 'left', 'isNew' => false, 'isNewPosition' => 'right'])

<li {{ $attributes->class(['nav-item']) }}>
    <a href="{{ route($route) }}" class="nav-link {{ $isActive ? 'active' : '' }}">
        <i class="nav-icon {{ $iconPosition . ' ' . $icon }}"></i>

        <p>
            {{ $text }}

            @if ($isNew)
                <span class="{{ $isNewPosition }} badge badge-danger">New</span>
            @endif
        </p>
    </a>
</li>
