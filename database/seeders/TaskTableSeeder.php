<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskTableSeeder extends Seeder
{
    public function run()
    {
        $task_lists = DB::table('task_lists')->pluck('id');

        DB::table('tasks')->insert([
            [
                'description' => 'Comprar leite',
                'completed' => false,
                'task_list_id' => $task_lists[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'Terminar o projeto',
                'completed' => false,
                'task_list_id' => $task_lists[1],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'Fazer caminhada',
                'completed' => false,
                'task_list_id' => $task_lists[2],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'comprar pão',
                'completed' => false,
                'task_list_id' => $task_lists[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}