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
                <span>Detalhes do cliente</span>
                </div>
                
                <span>
                    <a href="{{ route( 'conta.edit', ['contaSelecionadaId' => $conta->id] ) }}">
                        <button class="btn btn-outline-primary btn-sm">Editar</button>
                    </a>    
                </span>
            </div>
           
            @if( session('sucess') )
                <div class="alert alert-success m-3" id="alert" role="alert">
                    {{ session('sucess') }}
                </div>
            @endif

            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Nome</dt>
                    <dd class="col-sm-9">{{$conta->nome}}

                    <dt class="col-sm-3">Plano</dt>
                    <dd class="col-sm-9">{{ number_format($conta->valor, 2, ',', '.') }}

                    <dt class="col-sm-3">Data de pagamento</dt>
                    <dd class="col-sm-9">1º dia útil

                    <dt class="col-sm-3">Data de vencimento</dt>
                    <dd class="col-sm-9">{{ \Carbon\Carbon:: parse($conta->vencimento)->tz('America/Sao_Paulo')->format('d/m/y')}}

                    <dt class="col-sm-3">Cliente desde</dt>
                    <dd class="col-sm-9">{{ \Carbon\Carbon::parse($conta->created_at)->format('d/m/Y H:i:s') }}

                    <dt class="col-sm-3">Status</dt>
                    <dd class="col-sm-9">Inativo
                </dl>
            </div>
        
            <div class="container_buttons"></div>
                
            
        
        </div>
@endsection
