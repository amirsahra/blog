<?php

return [
    'paginate' => [
        'user' => 10,
        'home' => 10,
        'post' => 10,
    ],

    'image_path' => [
        'avatar' => 'panel/avatars/',
        'post_image' => 'panel/posts/',
    ],

    'word_length' => 200,

    'permissions' => [
        'delete post', 'delete_cat', 'delete_comment', 'delete_province', 'delete_city', 'delete_user',
        'update post', 'update_cat', 'update_comment', 'update_province', 'update_city', 'update_user',
        'read post', 'read cat', 'read comment', 'read province', 'read city', 'read user',
        'create post', 'create cat', 'create comment', 'create province', 'create city', 'create user',
    ],
];
