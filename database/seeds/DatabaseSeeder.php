<?php

use App\Lane;
use App\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lane::truncate();
        Task::truncate();

        factory(App\Lane::class, 1)->create();
        factory(App\Task::class, 5)->create();
    }
}
