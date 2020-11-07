<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ToDoList;
use App\Models\Task;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      //This is confusing,
      //Basically we make 10 users that each has 3 To Do Lists
      //and each List has 3 tasks
      //I have absolutely no idea how this works, its magic.
      \App\Models\User::factory()
          ->times(10)
          ->has(ToDoList::factory()->times(3)->has(Task::factory()->times(3)))
          ->create();
    }
}
