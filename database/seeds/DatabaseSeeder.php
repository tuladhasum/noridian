<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//       $this->call(PollsSeeder::class);
       $this->call(QuestionsSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
