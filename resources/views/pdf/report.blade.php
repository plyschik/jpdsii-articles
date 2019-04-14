<html>
    <head>
        <meta charset="UTF-8">
        <style>
            body {
                font-family: Arial, sans-serif;
            }
        </style>
    </head>
    <body>
        <h2 style="text-align: center; margin: 0 0 10px 0;">Raport</h2>

        <table style="width: 100%; border-collapse: collapse; border: 1px solid #000; margin-bottom: 15px;">
            <tbody>
                <tr>
                    <td style="padding: 5px 0; text-align: center; font-weight: bold; border: 1px solid #000;">System w liczbach</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #000;">
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td>Liczba artykułów</td>
                                    <td style="text-align: right;">{{ $articlesCount }}</td>
                                </tr>
                                <tr>
                                    <td>Liczba kategorii</td>
                                    <td style="text-align: right;">{{ $categoriesCount }}</td>
                                </tr>
                                <tr>
                                    <td>Liczba użytkowników</td>
                                    <td style="text-align: right;">{{ $usersCount }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>

        <table style="width: 100%; border-collapse: collapse; border: 1px solid #000;">
            <tbody>
                <tr>
                    <td style="padding: 5px 0; text-align: center; font-weight: bold; border: 1px solid #000;">Artykuły</td>
                </tr>
                <tr>
                    <td style="padding: 10px;">
                        <img src="{{ public_path('images' . DIRECTORY_SEPARATOR . 'charts' . DIRECTORY_SEPARATOR . 'articles.png') }}">
                    </td>
                </tr>
            </tbody>
        </table>

        <table style="width: 100%; border-collapse: collapse; border: 1px solid #000; margin-top: 15px;">
            <tbody>
                <tr>
                    <td style="padding: 5px 0; text-align: center; font-weight: bold; border: 1px solid #000;">Kategorie</td>
                </tr>
                <tr>
                    <td style="padding: 10px;">
                        <img src="{{ public_path('images' . DIRECTORY_SEPARATOR . 'charts' . DIRECTORY_SEPARATOR . 'categories.png') }}">
                    </td>
                </tr>
            </tbody>
        </table>

        <table style="width: 100%; border-collapse: collapse; border: 1px solid #000; margin-top: 15px;">
            <tbody>
            <tr>
                <td style="padding: 5px 0; text-align: center; font-weight: bold; border: 1px solid #000;">Użytkownicy</td>
            </tr>
            <tr>
                <td style="padding: 10px;">
                    <img src="{{ public_path('images' . DIRECTORY_SEPARATOR . 'charts' . DIRECTORY_SEPARATOR . 'users.png') }}">
                </td>
            </tr>
            </tbody>
        </table>

        <div style="font-size: 0.75em; margin-top: 15px; text-align: center;">
            Raport wygenerowany dnia {{ $datetime }} przez {{ $creator }}.
        </div>
    </body>
</html>