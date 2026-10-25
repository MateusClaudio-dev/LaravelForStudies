@extends('layout.admin')
@section('content')
    <header></header>

    <main>
        <div class="card mt-4 mb-4 border-light shadow">
            <div class="card-header d-flex justify-content-between">
                <span>Registro de clientes</span>
                <span>
                    <a class="cabecalho__add_new_account" href="{{ route('conta.create') }}">
                        <button class="btn btn-primary btn-sm">Cadastrar novo cliente</button>
                    </a>    
                </span>
            </div>
           
            @if( session('sucess') )
                <div class="alert alert-success m-3" id="alert" role="alert">
                    {{ session('sucess') }}
                </div>
            @endif

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th ecope="col">Nome</th>
                            <th ecope="col">Plano</th>
                            <!-- <th ecope="col">Data de pagamento</th> -->
                            <th ecope="col">Vencimento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contas as $conta)
                            <tr>
                                <td>{{$conta->nome}}</td>
                                <td>{{ number_format($conta->valor, 2, ',', '.') }}</td>
                                <!-- <td>1º dia útil</td> -->
                                <td>{{ \Carbon\Carbon::parse($conta->vencimento)->tz('America/Sao_Paulo')->format('d/m/Y') }}</td>
                                <td class="d-md-flex justify-content-center">
                                    <a href="{{ route('conta.show', ['contaSelecionadaId' => $conta->id] ) }}">
                                        <button class="btn btn-outline-primary btn-sm me-2">Ver detalhes</button>
                                    </a>
                                    <a href="{{ route('conta.edit', ['contaSelecionadaId' => $conta->id] ) }}">
                                        <button class="btn btn-outline-primary btn-sm me-2">Editar</button>
                                    </a>
                                    <form action="{{ route('conta.destroy', ['contaSelecionadaId' => $conta->id] ) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm me-2" type="submit" onclick="return confirm('Você realmente deseja apagar? Essa ação não poderar ser desfeita!')" >Apagar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <span style="color: blue;">Nenhum registro encontrado</span>
                        @endforelse
                    </tbody>
                </table>
            </div>
        
            <div class="container_buttons"></div>
                
            
        
        </div>
    </main>
@endsection
