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
            'dashboard' => 'Dashboard',
            'search' => 'Search...'
        ],
        'alerts' => [
            'no_articles' => 'No articles to display.',
            'no_categories' => 'No categories to display.',
            'access_denied' => 'Access denied. You do not have permission to perform this action or access this resource.',
            'something_went_wrong' => 'Something went wrong. Try again.'
        ],
        'headers' => [
            'categories' => 'Categories',
            'articles_in_category' => 'Articles in category',
            'articles_from_user' => 'Articles from user'
        ],
        'footer' => [
            'article' => "Article added from: <a href=\":userRoute\">:user</a>, in category: <a href=\":categoryRoute\">:category</a>. Created at: :date."
        ]
    ],
    'dashboard' => [
        'navbar' => [
            'mainpage' => 'Main page',
            'signout' => 'Sign out',
            'search' => 'Search...'
        ],
        'menu' => [
            'articles' => [
                'header' => 'Articles',
                'list' => 'Articles list',
                'add' => 'Add article'
            ],
            'categories' => [
                'header' => 'Categories',
                'list' => 'Categories list',
                'add' => 'Add category'
            ]
        ],
        'alerts' => [
            'headers' => [
                'information' => 'Information'
            ],
            'articles' => [
                'added' => 'Article created successfully.',
                'edited' => 'Article updated successfully.',
                'deleted' => 'Article deleted successfully.'
            ],
            'categories' => [
                'added' => 'Category created successfully.',
                'edited' => 'Category updated successfully.',
                'deleted' => 'Category deleted successfully.'
            ]
        ],
        'articles' => [
            'list' => [
                'callouts' => [
                    'noarticles' => [
                        'header' => 'List of articles',
                        'paragraph' => 'No articles to show.',
                        'search' => 'No results for query: <b>:query</b>',
                        'link' => 'Add first article!',
                        'back' => 'Go to articles list.'
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
        ],
        'categories' => [
            'list' => [
                'callouts' => [
                    'nocategories' => [
                        'header' => 'List of categories',
                        'paragraph' => 'No categories to show.',
                        'link' => 'Add first category!'
                    ]
                ],
                'headers' => [
                    'articles_list' => 'Categories list'
                ],
                'table' => [
                    'headers' => [
                        'id' => 'ID',
                        'name' => 'Name',
                        'created_at' => 'Created at',
                        'updated_at' => 'Updated at'
                    ]
                ],
                'alert' => [
                    'delete_confirm' => 'Confirm category delete.'
                ]
            ],
            'create' => [
                'header' => 'New category',
                'form' => [
                    'name' => 'Name:',
                    'submit' => 'Add category'
                ]
            ],
            'edit' => [
                'header' => 'Category edit',
                'form' => [
                    'name' => 'Name:',
                    'submit' => 'Update category'
                ]
            ]
        ]
    ]
];