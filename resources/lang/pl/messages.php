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
            'dashboard' => 'Panel administracyjny',
            'signin' => 'Zaloguj się',
            'search' => 'Szukaj...'
        ],
        'alerts' => [
            'no_articles' => 'Brak artykułów do wyświetlenia.',
            'no_categories' => 'Brak kategorii do wyświetlenia.',
            'access_denied' => 'Dostęp zabroniony. Nie masz uprawnień do wykonania tej akcji lub dostępu do zasobu.',
            'something_went_wrong' => 'Coś poszło nie tak. Spróbuj ponownie.'
        ],
        'headers' => [
            'categories' => 'Kategorie',
            'articles_in_category' => 'Artykuły w kategorii',
            'articles_from_user' => 'Artykuły użytkownika'
        ],
        'footer' => [
            'article' => "Artykuł dodany przez: <a href=\":userRoute\">:user</a>, w kategorii: <a href=\":categoryRoute\">:category</a>. Data dodania: :date."
        ]
    ],
    'dashboard' => [
        'navbar' => [
            'mainpage' => 'Strona głowna',
            'signout' => 'Wyloguj się',
            'search' => 'Szukaj...'
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
            ],
            'users' => [
                'header' => 'Użytkownicy',
                'list' => 'Lista użytkowników',
                'add' => 'Dodaj użytkownika'
            ],
            'stats' => [
                'header' => 'Statystyki',
                'live' => 'Na żywo',
                'report' => 'Raport'
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
            ],
            'users' => [
                'added' => 'Użytkownik został poprawnie dodany.',
                'edited' => 'Użytkownik została poprawnie zaktualizowany.',
                'deleted' => 'Użytkownik został poprawnie usunięty.'
            ]
        ],
        'articles' => [
            'list' => [
                'callouts' => [
                    'noarticles' => [
                        'header' => 'Lista artykułów',
                        'paragraph' => 'Brak artykułów do wyświetlenia.',
                        'search' => 'Brak wyników wyszukiwania dla frazy: <b>:query</b>',
                        'link' => 'Dodaj pierwszy artykuł!',
                        'back' => 'Powrót do listy artykułów.'
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
                        'search' => 'Brak wyników wyszukiwania dla frazy: <b>:query</b>',
                        'link' => 'Dodaj pierwszą kategorię!',
                        'back' => 'Powrót do listy kategorii.'
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
            ],
            'delete' => [
                'disabled_button_information' => 'Nie można usunąć kategorii, która zawiera artykuły.'
            ]
        ],
        'users' => [
            'list' => [
                'callouts' => [
                    'nousers' => [
                        'header' => 'Lista użytkowników',
                        'paragraph' => 'Brak użytkowników do wyświetlenia.',
                        'search' => 'Brak wyników wyszukiwania dla frazy: <b>:query</b>',
                        'link' => 'Dodaj pierwszego użytkownika!',
                        'back' => 'Powrót do listy użytkowników.'
                    ]
                ],
                'headers' => [
                    'articles_list' => 'Lista użytkowników'
                ],
                'table' => [
                    'headers' => [
                        'id' => 'ID',
                        'email' => 'Email',
                        'first_name' => 'Imię',
                        'last_name' => 'Nazwisko',
                        'role' => 'Rola',
                        'created_at' => 'Utworzono',
                        'updated_at' => 'Zaktualizowano'
                    ]
                ],
                'alert' => [
                    'delete_confirm' => 'Potwierdź usunięcie użytkownika.'
                ]
            ],
            'create' => [
                'header' => 'Nowy użytkownik',
                'form' => [
                    'email' => 'Email:',
                    'first_name' => 'Imię:',
                    'last_name' => 'Nazwisko:',
                    'password' => 'Hasło:',
                    'password_confirm' => 'Hasło ponownie:',
                    'role' => 'Rola:',
                    'submit' => 'Dodaj użytkownika'
                ]
            ],
            'edit' => [
                'header' => 'Edycja użytkownika',
                'form' => [
                    'email' => 'Email:',
                    'first_name' => 'Imię:',
                    'last_name' => 'Nazwisko:',
                    'submit' => 'Zaktualizuj użytkownika'
                ]
            ],
            'delete' => [
                'disabled_button_information' => 'Usuwać można tylko użytkowników z rangą inną niż administrator. Dodatkowo nie można usunąć swojego własnego konta.'
            ]
        ],
        'stats' => [
            'live' => [
                'header' => 'Użytkownicy online',
                'chart' => [
                    'axes' => [
                        'x' => 'Godzina',
                        'y' => 'Użytkowników online'
                    ],
                    'dataset' => 'Użytkownicy online'
                ]
            ]
        ]
    ]
];