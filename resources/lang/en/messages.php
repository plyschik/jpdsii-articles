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
            ],
            'users' => [
                'header' => 'Users',
                'list' => 'Users list',
                'add' => 'Add user'
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
            ],
            'users' => [
                'added' => 'User created successfully.',
                'edited' => 'User updated successfully.',
                'deleted' => 'User deleted successfully.'
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
                        'search' => 'No results for query: <b>:query</b>',
                        'link' => 'Add first category!',
                        'back' => 'Go to categories list.'
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
        ],
        'users' => [
            'list' => [
                'callouts' => [
                    'nousers' => [
                        'header' => 'List of users',
                        'paragraph' => 'No users to show.',
                        'search' => 'No results for query: <b>:query</b>',
                        'link' => 'Add first user!',
                        'back' => 'Go to users list.'
                    ]
                ],
                'headers' => [
                    'articles_list' => 'Users list'
                ],
                'table' => [
                    'headers' => [
                        'id' => 'ID',
                        'email' => 'Email',
                        'first_name' => 'First name',
                        'last_name' => 'Last name',
                        'role' => 'Role',
                        'created_at' => 'Created at',
                        'updated_at' => 'Updated at'
                    ]
                ],
                'alert' => [
                    'delete_confirm' => 'Confirm user delete.'
                ]
            ],
            'create' => [
                'header' => 'New user',
                'form' => [
                    'email' => 'Email:',
                    'first_name' => 'First name:',
                    'last_name' => 'Last name:',
                    'password' => 'Password:',
                    'password_confirm' => 'Pa1ssword confirm:',
                    'role' => 'Role:',
                    'submit' => 'Add user'
                ]
            ],
            'edit' => [
                'header' => 'User edit',
                'form' => [
                    'email' => 'Email:',
                    'first_name' => 'First name:',
                    'last_name' => 'Last name:',
                    'submit' => 'Update user'
                ]
            ],
            'delete' => [
                'disabled_button_information' => 'You can only delete users with role different from administrator. Additionally you can not delete yourself account.'
            ]
        ]
    ]
];