@extends('layout.admin')
@section('content')
    <header>
        <a href="{{ route('conta.index') }}">
            <button>Listar Contas</button>
        </a> <br>

        @if (session('error'))
            <span style="color: red;" id="alert_error_session">
                {{ session('error')}}
            </span>
        @endif

        @if ($errors->any())
            <span style="color: red;" id="alert_error_request">
                @foreach ($errors->all() as $error)
                    <span>{{ $error }}</span> <br>
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
@endsection

