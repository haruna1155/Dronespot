<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('posts')->insert([
            'id' => '1',
            'user_id' => '1',
            'photo' => 'test1.jpg',
            'spot' => Str::random(10),
            'area_id' => '3',
            'access' => Str::random(10),
            'comment' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);
    }
}
