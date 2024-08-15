<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('tareas')->insert([
            'titulo' => 'Tarea de prueba',
            'descripcion' => 'Esto es una tarea de prueba',
            'fecha_vencimiento' => '2024-08-16',
            'estado' => 'PENDIENTE'
        ]);

        DB::table('tareas')->insert([
            'titulo' => 'Segunda Tarea de Prueba',
            'descripcion' => 'Esto es una segunda tarea de prueba',
            'fecha_vencimiento' => '2024-08-16',
            'estado' => 'EN PROGRESO'
        ]);

        DB::table('tareas')->insert([
            'titulo' => 'Tercera Tarea de prueba',
            'descripcion' => 'Esto es una tercera tarea de prueba',
            'fecha_vencimiento' => '2024-08-14',
            'estado' => 'COMPLETADA'
        ]);
    }
}
