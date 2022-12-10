<?php

return [
    'paginate' => [
        'user' => 10,
        'home' => 10,
        'post' => 10,
        'region' => 10,
    ],

    'image_path' => [
        'avatar' => 'panel/avatars/',
        'post_image' => 'panel/posts/',
    ],

    'word_length' => 200,

    'permissions' => [
        'admin' => [
            'delete_post', 'delete_cat', 'delete_comment', 'delete_province', 'delete_city', 'delete_user',
            'update_post', 'update_cat', 'update_comment', 'update_province', 'update_city', 'update_user',
            'read_post', 'read_cat', 'read comment', 'read_province', 'read_city', 'read_user',
            'create_post', 'create_cat', 'create comment', 'create_province', 'create_city', 'create_user',
        ],
        'member' => [
            'delete_post', 'delete_comment',
            'update_post', 'update_comment',
            'read_post', 'read comment',
            'create_post', 'create comment',
        ],

    ],
];
