<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Conta;

class ContaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!Conta::where('nome', 'Energia')->first()) {
            Conta::create([
                'nome' => 'Energia',
                'valor' => '147.42',
                'vencimento' => '2023-12-23'
            ]);
        }
        if(!Conta::where('nome', 'Internet')->first()) {
            Conta::create([
                'nome' => 'Internet',
                'valor' => '100.42',
                'vencimento' => '2023-12-24'
            ]);
        }
    }
}
