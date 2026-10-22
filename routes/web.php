<?php

use App\Http\Controllers\ContaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Metódos Controladores 
|--------------------------------------------------------------------------
| get       | index()   | Lista registros 
| get       | create()  | Mostra formulário
| post      | store()   | Salva no banco
| get       | show()    | Mostra registro
| get       | edit()    | Carrega formulário p/ edição
| put       | update()  | Atualiza os dados
| delete    | destroy() | Remove os registros

*/

Route::get('/', function () {
    return view('welcome');
});

// CONTAS
Route::get('/index-conta', [ContaController::class, 'index'])->name('conta.index');
Route::get('/create-conta', [ContaController::class, 'create'])->name('conta.create');
Route::post('/store-conta', [ContaController::class, 'store'])->name('conta.store');
Route::get('/show-conta/{contaSelecionadaId}', [ContaController::class, 'show'])->name('conta.show');
Route::get('/edit-conta/{contaSelecionadaId}', [ContaController::class, 'edit'])->name('conta.edit');
Route::put('/update-conta/{contaSelecionadaId}', [ContaController::class, 'update'])->name('conta.update');
Route::delete('/destroy-conta/{contaSelecionadaId}', [ContaController::class, 'destroy'])->name('conta.destroy');

