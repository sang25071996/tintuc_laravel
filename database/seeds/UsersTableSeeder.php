<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        	[
	        	[
		        	'email' => 'admin03@gmail.com',
		        	'password' => bcrypt('12345'),
		        	'level' => 1,
		        	'created_at' => new \DateTime() 
	        	],
	        	[
		        	'email' => 'member@gmail.com',
		        	'password' => bcrypt('12345'),
		        	'level' => 2,
		        	'created_at' => new \DateTime() 
	        	],
	        	[
		        	'email' => 'mod@gmail.com',
		        	'password' => bcrypt('12345'),
		        	'level' => 1,
		        	'created_at' => new \DateTime() 
	        	]
	]
    	);
    }
}
