@extends('layout.admin')
@section('content')
    <header><h1>Editar conta</h1></header>
    <main>

        @if (session('error'))
            <span style="color: red;" id="alert_error_session">
                {{ session('error') }}
            </span>
        @endif

        @if($errors->any())
            <div style="color: red;" id="alert_error_request">
                @foreach($errors->all() as $error)
                    <span>{{$error}}</span> <br>
                @endforeach
            </div>
        @endif

        <form action="{{ route('conta.update', ['contaSelecionadaId' => $conta->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="container_inputs">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="Digite o nome da conta" value="{{ old('nome', $conta->nome) }}"> <br>
                
                <label for="valor">Valor:</label>
                <input type="text" name="valor" id="valor" value="{{ old( 'valor', isset( $conta->valor ) ? 
                number_format( $conta->valor, '2', ',', '.' ) : '' ) }}"> <br>

                <label for="vencimento">Vencimento:</label>
                <input type="date" name="vencimento" id="vencimento" value="{{ old('vencimento', $conta->vencimento) }}"> <br> <br>

                <div class="container_buttons">
                    <a href="{{ route('conta.index') }}">
                        <button>Listar Contas</button>
                    </a>
                    <a href="{{ route('conta.show', ['contaSelecionadaId' => $conta->id]) }}">
                        <button>Ver detalhes</button>
                    </a>
                    <div class="btn-salve">
                        <button type="submit">Salvar</button>
                    </div>
                </div>
                    
            </div>
        </form>
    </main>
    <footer>
        
    </footer>
@endsection