<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Rigel">
        <meta name="description" content="Antares">
        <link rel="shortcut icon" href="/images/favicon.png" />
        <title>{{ config('app.name') }}</title>

        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
                'siteName'  => config('app.name'),
                'apiDomain' => config('app.url').'/api'
            ]) !!}
        </script>
    </head>
    <body class="kt-quick-panel--right kt-header--fixed kt-header-mobile--fixed kt-aside--enabled kt-aside--fixed kt-page--loading">
        <div id="app">
            <app></app>
        </div>
        
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
