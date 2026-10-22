<!DOCTYPE html>
<html lang="py-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes</title>
</head>
<body>
    <header><h1>Detalhes da conta</h1>
        @if( session('sucess') )
            <span style="color: green;">{{ session('sucess') }}</span>
        @endif
    </header>
    <main>
       <div class="container_describeAccount">
            <table>
                <tr>
                   <th>ID</th>
                   <th>Nome</th>
                   <th>Valor</th>
                   <th>Vencimento</th>
                   <th>Criado em</th>
                   <th>Editado em</th>
                </tr>
                <tr>
                    <td>{{$conta->id}}</td>
                    <td>{{$conta->nome}}</td>
                    <td>{{ number_format($conta->valor, 2, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon:: parse($conta->vencimento)->tz('America/Sao_Paulo')->format('d/m/y')}}</td>
                    <td>{{ \Carbon\Carbon::parse($conta->created_at)->format('d/m/Y H:i:s') }}</td>
                    <td>{{ \Carbon\Carbon::parse($conta->updated_at)->format('d/m/Y H:i:s') }}</td>
                </tr>
            </table>
        </div>
    </main>
    <footer>
        <div class="container_buttons">
                <a class="btn-edit" href="{{ route('conta.edit', ['contaSelecionadaId' => $conta->id] ) }}">
                    <button>Editar</button>
                </a>
                <a class="btn-showList" href="{{ route('conta.index') }}">
                    <button>Listar Contas</button>
                </a>
        </div>
        
    </footer>
</body>
</html>
