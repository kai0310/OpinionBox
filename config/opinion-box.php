<?php

const GITHUB_DOMAIN = 'https://github.com/';

return [

    /*
     * GitHub内のURL
     */
    'github' => [
        'author'        => GITHUB_DOMAIN.'kai0310',
        'author_icon'   => 'https://unavatar.io/github/kai0310',
        'repository'    => GITHUB_DOMAIN.'kai0310/OpinionBox',
        'license'       => GITHUB_DOMAIN.'blob/2.x/LICENSE',
        'discussions'   => GITHUB_DOMAIN.'kai0310/OpinionBox/discussions',
        'contributors'  => GITHUB_DOMAIN.'kai0310/OpinionBox/graphs/contributors',
        'issues'        => GITHUB_DOMAIN.'kai0310/OpinionBox/issues',
    ],

    'wiki' => 'https://opinionbox.netlify.app',

    'chat-bot' => env('CHAT_BOT', false),

    'initial' => [
        'user' => [
            'do_create' => env('OPINIONBOX_INITIAL_USER_DO_CREATE', true),
            'name'      => env('OPINIONBOX_INITIAL_USER_NAME', 'OpinionBox Official'),
            'email'     => env('OPINIONBOX_INITIAL_USER_EMAIL', 'opinionbox@example.com'),
            'password'  => env('OPINIONBOX_INITIAL_USER_PW', 'password')
        ]
    ],

    'settings' => [
        'admin_is_stuff' => env('OPINIONBOX_SETTINGS_ADMIN_IS_STUFF', true),

        'selected_tester' => [
            // 'grade' => [
            //     5,
            // ],
            // 'class' => [
            //     01, 02,
            // ],
        ],
    ],
];
