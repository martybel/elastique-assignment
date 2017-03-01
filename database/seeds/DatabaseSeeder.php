<?php

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
      factory(\App\Models\Author::class,100)->create();
      factory(\App\Models\Publisher::class,100)->create();
      factory(\App\Models\Book::class,100)->create();
    }
}
