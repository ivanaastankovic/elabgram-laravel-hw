<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'user_id' => '5',
                'caption' => 'Seeder post',
                'image' => 'uploads/cHzc5ps89Xi1ILZSX58LgCaaGzHPvTTbwaGJhQGj.jpeg'
            ],
            [
                'user_id' => '4',
                'caption' => 'Seeder post',
                'image' => 'uploads/logoletnja-800x400.jpg'
            ],
        
        ]);
    }
}
