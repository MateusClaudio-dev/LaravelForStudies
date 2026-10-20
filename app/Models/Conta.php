<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    // Indica o nome da tabela
    protected $table = 'contas';

    // Indica quais colunas podem ser cadastradas
    protected $fillable = ['nome', 'valor', 'vencimento'];
}
