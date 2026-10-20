<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
<body>
    <header>
        <a href="{{ route('conta.index') }}">Listar Contas</a> <br>
        @if ($errors->any())
            <span style="color: red;">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </span>
        @endif
    </header>
    <main>
        <h2>Cadastrar a Conta</h2>
        <form action="{{ route('conta.store') }}" method="post">
            @csrf
            <div class="container_inputs">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="Digite o nome da conta" value="{{ old('nome') }}"> <br>
                

                <label for="valor">Valor:</label>
                <input type="text" name="valor" id="valor" value="{{ old('valor') }}"> <br>

                <label for="vencimento">Vencimento:</label>
                <input type="date" name="vencimento" id="vencimento" value="{{ old('vencimento') }}"> <br> <br>

                <div class="btn-salve">
                    <button type="submit">Cadastrar</button>
                </div>
            </div>
        </form>
    </main>
    <footer></footer>
</body>
</html>

