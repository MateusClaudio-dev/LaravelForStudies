@extends('layout.admin')
@section('content')
        <div class="card mt-4 mb-4 border-light shadow">
            <div class="card-header d-flex justify-content-between">
                <div class="left_header d-flex">
                    <a href="{{ route( 'conta.index' ) }}">
                        <button class="btn btn-primary btn-sm me-3">
                            <span class="material-symbols-outlined text-center">arrow_back</span>
                        </button>
                    </a>   
                    <span>Cadastrar cliente</span>
                </div>
            </div>
           
            @if( session('sucess') )
                <div class="alert alert-success m-3" id="alert" role="alert">
                    {{ session('sucess') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger m-3" id="alert" role="alert">
                    @foreach($errors->all() as $error)
                        {{$error}}<br>
                    @endforeach
                </div>
            @endif

            <div class="card-body">
                <form class="row g-3" action="{{ route('conta.store') }}" method="POST">
                    @csrf
                    
                    <div class="col-12">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input 
                            type="text" 
                            name="nome" 
                            class="form-control" 
                            id="nome" 
                            placeholder="Digite como escrito no RG"
                            value="{{ old('nome') }}">
                    </div>

                    <div class="col-12">
                        <label for="valor" class="form-label">Plano contratado</label>
                        <input 
                            type="text" 
                            name="valor" 
                            class="form-control" 
                            id="valor" 
                            placeholder="Digite o valor"
                            value="{{ old('valor') }}">
                    </div>

                    <div class="col-12">
                        <label for="vencimento" class="form-label">Data de vencimento</label>
                        <input 
                            type="date" 
                            name="vencimento" 
                            class="form-control" 
                            id="vencimento" 
                            placeholder="Digite o vencimento"
                            value="{{ old( 'vencimento')}}">
                    </div>

                    <div class="col-12">
                        <a class="btn btn-warning btn-sm" href="{{ route('conta.index') }}">
                             Cancelar
                        </a>
                        <button class="btn btn-secondary btn-sm" type="submit">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
@endsection
