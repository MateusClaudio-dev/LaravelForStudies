<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContaRequest;
use App\Models\Conta;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    // Listar Contas
    public function index() 
    {
        // Recupera os registro do BD
        $contas = Conta::where('id', 100)->orderByDesc('created_at')->get();
        
        // Carrega a view
        return view('contas.index', ['contas' => $contas]);
    }

    // Criar formulário
    public function create()
    {
        return view('contas.create');
    }

    // Cadastrar no BD nova conta 
    public function store(ContaRequest $request)
    {
        // Validar formulário
        $request->validated();

        // Cadastrar no BD na tabela 'contas' os valores de todos os campos
        Conta::create($request->all());

        // Redirecionar para conta.show
        return redirect()->route('conta.show')->with('sucess', 'Conta cadastrada com sucesso');
    }

    // Mostar contas salvas no BD
    public function show()
    {
        return view('contas.show');
    }

    // Carregar formulário editar conta
    public function edit()
    {
        return view('contas.edit');
    }

    // Editar no BD a conta
    public function update()
    {
        dd("Editar");
    }

    // Excluir a conta do BD
    public function destroy()
    {
        dd("Apagar");
    }
}
