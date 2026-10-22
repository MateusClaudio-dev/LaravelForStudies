<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Requests\ContaRequest;
use App\Models\Conta;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    // Listar Contas
    public function index() 
    {
        // Recupera os registro do BD
        $contas = Conta::orderByDesc('created_at')->get();

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

        try {
            // Cadastrar no BD na tabela 'contas' os valores de todos os campos
            $conta = Conta::create($request->all());

            // Redirecionar para tela de vizualização + mensagem de sucesso.
            return redirect()->route('conta.show', ['contaSelecionadaId' => $conta->id])->with('sucess', 'Conta cadastrada com sucesso');
        } catch (Exception $error) {
            // Retorna mensagem de erro personalizada.
            return back()->withInput()->with('error', 'Não foi possível cadastrar. Tente novamente mais tarde');
        }

    }

    // Mostar contas salvas no BD
    public function show(Conta $contaSelecionadaId)
    {
        // Exibi detalhes da conta apontada pela URL por meio do ID
        return view ('contas.show', ['conta' => $contaSelecionadaId]);
    }

    // Carregar formulário editar conta
    public function edit(Conta $contaSelecionadaId)
    {

        return view('contas.edit', ['conta' => $contaSelecionadaId]);
    }

    // Editar no BD a conta
    public function update(ContaRequest $request, Conta $contaSelecionadaId)
    {   
        $request->validated();

        try {
           $contaEditada = $contaSelecionadaId->update([
            'nome' => $request->nome,
            'valor' => $request->valor,
            'vencimento' => $request->vencimento
        ]); 
        
        // Redirecionar para tela de vizualização + mensagem de sucesso.
        return redirect()->route('conta.show', ['contaSelecionadaId' => $contaSelecionadaId->id])->with('sucess', 'Conta editada com sucesso');

        } catch (Exception $error) {

            // Retorna mensagem de erro personalizada.
            return back()->withInput()->with('error', 'Não foi possível editar no momento. Tente novamente mais tarde');
        }
    }

    // Excluir a conta do BD
    public function destroy(Conta $contaSelecionadaId)
    {
        $contaSelecionadaId->delete();

        return redirect()->route('conta.index')->with('sucess', 'Conta apagada');
    }
}
