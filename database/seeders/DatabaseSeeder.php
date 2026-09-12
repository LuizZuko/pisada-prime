<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Evento;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin Pisada Prime',
            'email' => 'admin@pisadaprime.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        $gerente = User::create([
            'name' => 'Gerente de Eventos',
            'email' => 'gerente@pisadaprime.com',
            'password' => Hash::make('12345678'),
            'role' => 'gerente',
        ]);

        User::create([
            'name' => 'Cliente VIP',
            'email' => 'usuario@pisadaprime.com',
            'password' => Hash::make('12345678'),
            'role' => 'usuario',
        ]);

        $catShow = Categoria::create([
            'nome' => 'Show Ao Vivo',
            'descricao' => 'Apresentações de piseiro e forró'
        ]);

        Evento::create([
            'categoria_id' => $catShow->id,
            'user_id' => $gerente->id,
            'titulo' => 'Pisada Prime Sunset Edition',
            'descricao' => 'O maior festival de piseiro da região.',
            'data_evento' => now()->addDays(15),
            'local' => 'Arena Central',
            'preco_ingresso' => 85.00,
            'capacidade' => 3000,
        ]);
    }
}