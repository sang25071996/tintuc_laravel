<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($i=1; $i<=10;$i++){
    		DB::table('category')->insert(
    			[
    				'name' => 'Thể loại' . $i,
    				'user_id' => rand(1,4),
    				'created_at' => new \DateTime()
    			]
    		);
    	}
    }
}
