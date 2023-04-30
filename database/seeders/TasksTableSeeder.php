<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lists')->insert([
            [
                'title' => 'Finish homework',
                'description' => 'Complete all assignments before deadline',
                'completed' => false,
                'tasks' => [['description' => 'Complete all assignments before deadline', 'completed' => false], ['description' => ' Complete all assignments before deadline', 'completed' => false]]

            ],
            [
                'title' => 'Buy groceries',
                'description' => 'Get milk, bread, eggs, and cheese',
                'completed' => false,
                'tasks' => [['description' => 'Complete all assignments before deadline', 'completed' => false]]

            ],
            [
                'title' => 'Go to the gym',
                'description' => 'Do cardio and weight lifting',
                'completed' => true,
                'tasks' => [['description' => 'Complete all assignments before deadline', 'completed' => false]]

            ],
        ]);
    }
}
