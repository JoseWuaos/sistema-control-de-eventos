<?php
namespace Database\Seeders;

use App\Models\TipoDeEvento;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoEventoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        TipoDeEvento::create([
            'descripcion' => 'Fiesta',
        ]);
        TipoDeEvento::create([
            'descripcion' => 'Reunion',
        ]);
        TipoDeEvento::create([
            'descripcion' => 'Otro',
        ]);
    }
}
