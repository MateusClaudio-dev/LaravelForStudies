<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_back" />
        
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <title>Pronet | Telecomunicações</title>
    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand d-flex" href="{{ route('conta.index') }}">
                <img src="{{ asset('images/favicon.ico')}}">
                <h1 class="">Pronet - Subúrbio Telecomunicações</h1>
            </a>
        </div>
        </nav>
        </header>
        <main>
            <div class="container">
                @yield('content')
            </div>
        </main>


       
        <script src="{{ asset('JS/formatter.js') }}"></script>
        <script src="{{ asset('JS/alerts.js') }}"></script>
    </body>
</html>