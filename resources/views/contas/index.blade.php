<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contas Registro</title>
</head>
<body>
    <header>
        <div class="container_cabecalho">
            <h2 class="cabecalho__title">Contas Registardas</h2>
            <a class="cabecalho__add_new_account" href="{{ route('conta.create') }}">
                <button>Cadastrar algo novo</button>
            </a><br>
            @if( session('sucess') )
                <span style="color: green;">{{ session('sucess') }}</span>
            @endif
        </div><br>
    </header>
    <main>
        <div class="container_registros">
            @forelse ($contas as $conta)
                Id: {{$conta->id}} <br>
                Nome: {{$conta->nome}} <br>
                Valor: {{ number_format($conta->valor, 2, ',', '.') }} <br>
                Vencimento: {{ \Carbon\Carbon::parse($conta->vencimento)->tz('America/Sao_Paulo')->format('d/m/Y') }} <br><br>
        
                <a href="{{ route('conta.show', ['contaSelecionadaId' => $conta->id] ) }}">
                    <button>Ver detalhes</button>
                </a><br>
                <a href="{{ route('conta.edit', ['contaSelecionadaId' => $conta->id] ) }}">
                    <button>Editar</button>
                </a><br>
                <form action="{{ route('conta.destroy', ['contaSelecionadaId' => $conta->id] ) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('Você realmente deseja apagar? Essa ação não poderar ser desfeita!')" >Apagar</button>
                </form>
                <br><hr>
            @empty
                <span style="color: blue;">Nenhum registro encontrado</span>
            @endforelse
        </div>
    </main>
</body>
</html>
