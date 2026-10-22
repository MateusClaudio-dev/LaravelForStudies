<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>
        <header>
            <h1>PRONET - SOLUÇÕES</h1>
        </header>
        <main>
            <a href="{{ route('conta.index') }}">Listar assinantes</a>
        </main>
    </body>
</html>
