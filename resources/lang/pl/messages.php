<?php

return [
    'auth' => [
        'signin' => [
            'form' => [
                'email' => 'Adres email...',
                'password' => 'Hasło...',
                'remember' => 'Zapamiętaj mnie',
                'signin' => 'Zaloguj się'
            ],
            'link' => [
                'forgot' => 'Zapomniałem hasło'
            ]
        ],
        'remind' => [
            'form' => [
                'email' => 'Adres email...',
                'submit' => 'Wyślij link resetujący hasło'
            ]
        ],
        'reset' => [
            'form' => [
                'email' => 'Adres email...',
                'password' => 'Hasło...',
                'password_confirmation' => 'Potwiedzenie hasła...',
                'submit' => 'Zmień hasło'
            ]
        ]
    ],
    'site' => [
        'navbar' => [
            'dashboard' => 'Panel administracyjny'
        ],
        'alerts' => [
            'no_articles' => 'Brak artykułow do wyświetlenia.'
        ],
        'headers' => [
            'categories' => 'Kategorie',
            'articles_in_category' => 'Artykuły w kategorii'
        ]
    ],
    'dashboard' => [
        'navbar' => [
            'mainpage' => 'Strona głowna',
            'signout' => 'Wyloguj się'
        ],
        'menu' => [
            'articles' => [
                'header' => 'Artykuły',
                'list' => 'Lista artykułów',
                'add' => 'Dodaj artykuł'
            ]
        ],
        'articles' => [
            'list' => [
                'callouts' => [
                    'noarticles' => [
                        'header' => 'Lista artykułów',
                        'paragraph' => 'Brak artykułów do wyświetlenia.',
                        'link' => 'Dodaj pierwszy artykuł!'
                    ]
                ],
                'headers' => [
                    'articles_list' => 'Lista artykułów'
                ],
                'table' => [
                    'headers' => [
                        'id' => 'ID',
                        'author' => 'Autor',
                        'category' => 'Kategoria',
                        'title' => 'Tytuł',
                        'created_at' => 'Utworzono',
                        'updated_at' => 'Zaktualizowano'
                    ]
                ],
                'alert' => [
                    'delete_confirm' => 'Potwierdź usunięcie artykułu.'
                ]
            ],
            'create' => [
                'header' => 'Nowy artykuł',
                'form' => [
                    'title' => 'Tytuł:',
                    'content' => 'Treść:',
                    'submit' => 'Dodaj artykuł'
                ]
            ],
            'edit' => [
                'header' => 'Edycja artykułu',
                'form' => [
                    'title' => 'Tytuł:',
                    'content' => 'Treść:',
                    'submit' => 'Zaktualizuj artykuł'
                ]
            ]
        ]
    ]
];