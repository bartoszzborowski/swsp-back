<?php

return [
    'role_structure' => [
        'admin' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'student' => [
            'profile' => 'c,r,u,d'
        ],
        'parent' => [
            'acl' => 'c,r,u,d'
        ],
        'teacher' => [
            'acl' => 'c,r,u,d'
        ],
        'user' => [
            'profile' => 'r,u'
        ],
    ],
    'permission_structure' => [
        'cru_user' => [
            'profile' => 'c,r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
