<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i =1 ;$i <=100 ; $i++){
		    DB::table('news')->insert(
		    	[
		    		'title' => 'Tiêu đề ' . $i,
		    		'author' => 'Tác giả ' . $i,
		    		'intro' => 'Đây là tóm tắc intro của tiêu đề ' . $i,
		    		'content' => 'Đây là nội dung intro của tiêu đề ' . $i,
		    		'image' => 'hinh'.$i.'.jpg',
		    		'status' => rand(0,1),
		    		'user_id' => rand(1,4),
		    		'category_id' => rand(1,10),
		    		'created_at' => new \DateTime()
		    	]
			);
    	}
    }
}
