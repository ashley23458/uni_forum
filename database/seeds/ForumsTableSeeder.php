<?php

use Illuminate\Database\Seeder;

class ForumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $forums = [
            ['name' => 'General Discussions'],
            ['name' => 'Learning Discussions'],
            ['name' => 'Reading Discussions'],
            ['name' => 'Events Discussions'],
            ['name' => 'Tech Discussions'],
            ['name' => 'Entertainment Discussions']
        ];

        DB::table('forums')->insert($forums);
    }
}
