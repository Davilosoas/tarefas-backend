<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskListTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('task_lists')->insert([
            [
                'description' => 'Lista de compras',
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'Tarefas do trabalho',
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'Metas pessoas',
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}