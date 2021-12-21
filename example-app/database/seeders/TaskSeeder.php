<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $limit = 5;
        for ($i = 0; $i < $limit; $i++) {
            $user = DB::table('users')->insert([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeemail(),
                'password' => Hash::make('password'),
            ]);
            $taskCount = rand(1, 5);
            for ($j = 0; $j < $taskCount; $j++) {
                DB::table('tasks')->insert([
                    'title' => $faker->text(7),
                    'description' => $faker->text(100),
                    'type' => rand(1, 10),
                    'status' => rand(0, 5),
                    'start_date' => Carbon::today()->addDay(rand(-15, -1)),
                    'due_date' => Carbon::today()->addDay(rand(1, 15)),
                    'assignee' => $user,
                    'estimate' => rand(0, 100),
                    'actual' => rand(0, 100),
                ]);
            }
        }
    }
}