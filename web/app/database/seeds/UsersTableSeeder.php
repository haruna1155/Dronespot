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
            'photo' => 'ここは写真',
            'spot' => '××公園',
            'area_id' => '5',
            'access' => '京都府',
            'comment' => '綺麗でした。',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

        \DB::table('posts')->insert([
            'id' => '2',
            'user_id' => '2',
            'photo' => 'ここは写真',
            'spot' => '〇〇海辺',
            'area_id' => '9',
            'access' => '沖縄',
            'comment' => 'おすすめスポット！',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

    }
}
