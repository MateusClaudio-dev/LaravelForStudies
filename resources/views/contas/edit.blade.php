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
                <span>Editar cadastro</span>
                </div>
                
                <span>
                    <a href="{{ route( 'conta.edit', ['contaSelecionadaId' => $conta->id] ) }}">
                        <button class="btn btn-outline-primary btn-sm">Editar</button>
                    </a>    
                </span>
            </div>
           
            @if( session('sucess') )
                <div class="alert alert-success m-3" role="alert">
                    {{ session('sucess') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger m-3" id="alert" role="alert">
                    @foreach($errors->all() as $error)
                        {{$error}}
                    @endforeach
                </div>
            @endif

            <div class="card-body">
                <form class="row g-3" action="{{ route('conta.update', ['contaSelecionadaId' => $conta->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input 
                            type="text" 
                            name="nome" 
                            class="form-control" 
                            id="nome" 
                            placeholder="Digite como escrito no RG"
                            value="{{ old('nome', $conta->nome) }}">
                    </div>

                    <div class="col-12">
                        <label for="valor" class="form-label">Plano contratado</label>
                        <input 
                            type="text" 
                            name="valor" 
                            class="form-control" 
                            id="valor" 
                            placeholder="Digite o valor"
                            value="{{ old('valor', isset($conta->valor) ? number_format($conta->valor, 2, ',', '.') : '' ) }}">
                    </div>

                    <!-- <div class="col-12">
                        <label for="pagamento" class="form-label">Data de pagamento</label>
                        <input 
                            type="text" 
                            name="pagamento" 
                            class="form-control" 
                            id="pagamento" 
                            placeholder="Digite o pagamento"
                            value="{{ old('nome', $conta->pagamento) }}">
                    </div> -->

                    <div class="col-12">
                        <label for="vencimento" class="form-label">Data de vencimento</label>
                        <input 
                            type="text" 
                            name="vencimento" 
                            class="form-control" 
                            id="vencimento" 
                            placeholder="Digite o vencimento"
                            value="{{ old( 'vencimento', $conta->vencimento ) }}">
                    </div>

                    <div class="col-12">
                        <a class="btn btn-warning btn-sm" href="{{ route( 'conta.show', ['contaSelecionadaId' => $conta->id]) }}">
                             Cancelar
                        </a>
                        <button class="btn btn-secondary btn-sm" type="submit">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
@endsection
