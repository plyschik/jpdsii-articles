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
            ],
            'categories' => [
                'header' => 'Kategorie',
                'list' => 'Lista kategorii',
                'add' => 'Dodaj kategorię'
            ]
        ],
        'alerts' => [
            'headers' => [
                'information' => 'Informacja'
            ],
            'articles' => [
                'added' => 'Artykuł został poprawnie dodany.',
                'edited' => 'Artykuł został poprawnie zaktualizowany.',
                'deleted' => 'Artykuł został poprawnie usunięty.'
            ],
            'categories' => [
                'added' => 'Kategoria została poprawnie dodana.',
                'edited' => 'Kategoria została poprawnie zaktualizowana.',
                'deleted' => 'Kategoria została poprawnie usunięta.'
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
        ],
        'categories' => [
            'list' => [
                'callouts' => [
                    'nocategories' => [
                        'header' => 'Lista categorii',
                        'paragraph' => 'Brak kategorii do wyświetlenia.',
                        'link' => 'Dodaj pierwszy kategorię!'
                    ]
                ],
                'headers' => [
                    'articles_list' => 'Lista kategorii'
                ],
                'table' => [
                    'headers' => [
                        'id' => 'ID',
                        'name' => 'Nazwa',
                        'created_at' => 'Utworzono',
                        'updated_at' => 'Zaktualizowano'
                    ]
                ],
                'alert' => [
                    'delete_confirm' => 'Potwierdź usunięcie kategorii.'
                ]
            ],
            'create' => [
                'header' => 'Nowy kategoria',
                'form' => [
                    'name' => 'Nazwa:',
                    'submit' => 'Dodaj kategorię'
                ]
            ],
            'edit' => [
                'header' => 'Edycja kategorii',
                'form' => [
                    'name' => 'Nazwa:',
                    'submit' => 'Zaktualizuj kategorię'
                ]
            ]
        ]
    ]
];