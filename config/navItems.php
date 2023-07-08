<?php

return [
    'menus' => [
        'users',
        'stores',
    ],

    'users' => [
        [
            'text' => 'Users List',
            'icon' => '',
            'route' => 'dashboard.users.index',
        ],
        [
            'text' => 'Create New',
            'icon' => '',
            'route' => 'dashboard.users.create',
        ],
    ],

    'stores' => [
        [
            'text' => 'Stores List',
            'icon' => '',
            'route' => 'dashboard.users.index',
        ],
        [
            'text' => 'Create New',
            'icon' => '',
            'route' => 'dashboard.users.create',
        ],
    ],
];
