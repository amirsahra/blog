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
        'delete post', 'delete cat', 'delete comment', 'delete province', 'delete city', 'delete user',
        'update post', 'update cat', 'update comment', 'update province', 'update city', 'update user',
        'read post', 'read cat', 'read comment', 'read province', 'read city', 'read user',
        'create post', 'create cat', 'create comment', 'create province', 'create city', 'create user',
    ],
];
