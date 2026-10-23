@extends('layout.admin')
@section('content')
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
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Vencimento</th>
                </tr>
                <tr>
                    <td>{{$conta->id}}</td>
                    <td>{{$conta->nome}}</td>
                    <td>{{ number_format($conta->valor, 2, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($conta->vencimento)->tz('America/Sao_Paulo')->format('d/m/Y') }}</td>
                </tr>
            </table><br>
            <div class="container_buttons">
                <a href="{{ route('conta.show', ['contaSelecionadaId' => $conta->id] ) }}">
                    <button>Ver detalhes</button>
                </a>
                <a href="{{ route('conta.edit', ['contaSelecionadaId' => $conta->id] ) }}">
                    <button>Editar</button>
                </a>
                <form action="{{ route('conta.destroy', ['contaSelecionadaId' => $conta->id] ) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('Você realmente deseja apagar? Essa ação não poderar ser desfeita!')" >Apagar</button>
                </form>
                <br><br>
            </div>
                
            @empty
                <span style="color: blue;">Nenhum registro encontrado</span>
            @endforelse
        
        </div>
    </main>
@endsection
