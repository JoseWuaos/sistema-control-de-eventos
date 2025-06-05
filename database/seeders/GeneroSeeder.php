<?php
namespace Database\Seeders;

use App\Models\Genero;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneroSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Genero::create([
            'descripcion' => 'Hombre',
        ]);
        Genero::create([
            'descripcion' => 'Mujer',
        ]);
        Genero::create([
            'descripcion' => 'Otro',
        ]);
    }
}
