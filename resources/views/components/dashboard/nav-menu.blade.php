@props(['text' => 'Nav Menu', 'icon' => 'fas fa-tachometer-alt', 'isActive' => false, 'navItems'])

<li {{ $attributes->class(['nav-item', 'menu-open' => $isActive]) }}>
    <a href="#" class="nav-link {{ $isActive ? 'active' : '' }}">
        <i class="nav-icon {{ $icon }}"></i>
        <p>
            {{ $text }}

            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        @foreach ($navItems as $navItem)
            <x-dashboard.nav-item :text="$navItem['text']" :route="$navItem['route']" :isActive="Route::is($navItem['route'])" />
        @endforeach

    </ul>
</li>
