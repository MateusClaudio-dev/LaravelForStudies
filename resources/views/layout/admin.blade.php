<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        <title>Pronet | Telecomunicações</title>
    </head>
    <body>
        @yield('content')
        <script src="{{ asset('JS/formatter.js') }}"></script>
    </body>
</html>