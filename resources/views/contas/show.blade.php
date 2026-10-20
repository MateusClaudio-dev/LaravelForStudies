<!DOCTYPE html>
<html lang="py-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes</title>
</head>
<body>
    <header><h1>Detalhes da conta</h1></header>
    <main>
        <a href="{{ route('conta.index') }}">Listar Contas</a>
        @if( session('sucess') )
        <span style="color: green;">{{ session('sucess') }}</span>
            
        @endif
    </main>
    <footer></footer>
</body>
</html>
