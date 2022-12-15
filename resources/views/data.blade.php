<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Invited list</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 min-h-screen sm:items-center py-4 sm:pt-0">

            <table style="min-width: 30%;margin-left:30px;margin-top:20px;">
                <caption style="margin-bottom:15px;"><b>The name and IDs of matching affiliates within 100km, sorted by Affiliate ID (ascending)</b></caption>
                <tr>
                    <th style="text-align: left;"><b>Affiliate_id</b></th>
                    <th style="text-align: left;"><b>Name</b></th>
                    <th style="text-align: left;"><b>Distance</b></th>
                </tr>
                @foreach ($list as $affiliate)
                <tr>
                    <td>{{ $affiliate['affiliate_id'] }}</td>
                    <td>{{ $affiliate['name'] }}</td>
                    <td>{{ round($affiliate['distance'], 0) }} km</td>
                </tr>

                @endforeach
            </table>

        </div>
    </body>
</html>
