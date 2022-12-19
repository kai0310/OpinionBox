<?php

return [

    /*
     * GitHub内のURL
     */
    'github' => [
        'author' => 'https://github.com/kai0310',
        'author_icon' => 'https://unavatar.io/github/kai0310',
        'repository' => 'https://github.com/kai0310/OpinionBox',
        'license' => 'https://github.com/blob/2.x/LICENSE',
        'discussions' => 'https://github.com/kai0310/OpinionBox/discussions',
        'contributors' => 'https://github.com/kai0310/OpinionBox/graphs/contributors',
        'issues' => 'https://github.com/kai0310/OpinionBox/issues',
    ],

    'wiki' => 'https://opinionbox.netlify.app',

    'chat-bot' => env('CHAT_BOT', false),

    'initial' => [
        'user' => [
            'do_create' => env('OPINIONBOX_INITIAL_USER_DO_CREATE', true),
            'name' => env('OPINIONBOX_INITIAL_USER_NAME', 'OpinionBox Official'),
            'email' => env('OPINIONBOX_INITIAL_USER_EMAIL', 'opinionbox@example.com'),
            'password' => env('OPINIONBOX_INITIAL_USER_PW', 'password'),
        ],
    ],

    'settings' => [
        'admin_is_stuff' => env('OPINIONBOX_SETTINGS_ADMIN_IS_STUFF', true),

        'selected_tester' => [],
    ],
];
