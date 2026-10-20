<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contas Registro</title>
</head>
<body>
    <header>
        <h2>Contas Registardas</h2>
    </header>
    <main>
        @forelse ($contas as $conta)

        @empty
            <span style="color: blue;">Nenhum registro encontrado</span>
        @endforelse
    </main>
    
</body>
</html>
