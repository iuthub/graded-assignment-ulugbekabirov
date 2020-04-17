<?php

use Illuminate\Database\Seeder;

class taskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'name' => 'IP quiz',
            'done' => '0',
            'created_at' => '2012-12-12 12:12:12',
            'updated_at' => '2012-12-12 12:12:12'
        ]);

         DB::table('tasks')->insert([
            'name' => 'Hit the gym',
            'done' => '0',
            'created_at' => '2012-12-12 12:12:12',
            'updated_at' => '2012-12-12 12:12:12'
        ]);

        DB::table('tasks')->insert([
            'name' => 'read a book',
            'done' => '0',
            'created_at' => '2012-12-12 12:12:12',
            'updated_at' => '2012-12-12 12:12:12'
        ]);
    
	}
}