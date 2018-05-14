<?php

return [
    'auth' => [
        'signin' => [
            'form' => [
                'email' => 'Email address...',
                'password' => 'Password...',
                'remember' => 'Remember me',
                'signin' => 'Sign in'
            ],
            'link' => [
                'forgot' => 'I forgot my password'
            ]
        ],
        'remind' => [
            'form' => [
                'email' => 'Email address...',
                'submit' => 'Send reset email'
            ]
        ],
        'reset' => [
            'form' => [
                'email' => 'Email address...',
                'password' => 'Password...',
                'password_confirmation' => 'Password confirmation...',
                'submit' => 'Change password'
            ]
        ]
    ],
    'site' => [
        'navbar' => [
            'dashboard' => 'Dashboard'
        ],
        'alerts' => [
            'no_articles' => 'No articles to display.'
        ],
        'headers' => [
            'categories' => 'Categories',
            'articles_in_category' => 'Articles in category'
        ]
    ],
    'dashboard' => [
        'navbar' => [
            'mainpage' => 'Main page',
            'signout' => 'Sign out'
        ],
        'menu' => [
            'articles' => [
                'header' => 'Articles',
                'list' => 'Articles list',
                'add' => 'Add article'
            ]
        ],
        'articles' => [
            'list' => [
                'callouts' => [
                    'noarticles' => [
                        'header' => 'List of articles',
                        'paragraph' => 'No articles to show.',
                        'link' => 'Add first article!'
                    ]
                ],
                'headers' => [
                    'articles_list' => 'Articles list'
                ],
                'table' => [
                    'headers' => [
                        'id' => 'ID',
                        'author' => 'Author',
                        'category' => 'Category',
                        'title' => 'Title',
                        'created_at' => 'Created at',
                        'updated_at' => 'Updated at'
                    ]
                ],
                'alert' => [
                    'delete_confirm' => 'Confirm article delete.'
                ]
            ],
            'create' => [
                'header' => 'New article',
                'form' => [
                    'title' => 'Title:',
                    'content' => 'Content:',
                    'submit' => 'Add new article'
                ]
            ],
            'edit' => [
                'header' => 'Article edit',
                'form' => [
                    'title' => 'Title:',
                    'content' => 'Content:',
                    'submit' => 'Update article'
                ]
            ]
        ]
    ]
];