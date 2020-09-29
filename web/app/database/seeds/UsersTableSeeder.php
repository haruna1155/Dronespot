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
            'user_id' => '1',
            'photo' => 'https://img-cdn.guide.travel.co.jp/article/999/31206/6E27665A71E34BA2B52CDB816ECBB6EE_LL.jpg',
            'spot' => '××公園',
            'area_id' => '5',
            'access' => '京都府',
            'comment' => '綺麗でした。',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

        \DB::table('posts')->insert([
            'user_id' => '1',
            'photo' => 'https://img-cdn.guide.travel.co.jp/article/999/31206/6E27665A71E34BA2B52CDB816ECBB6EE_LL.jpg',
            'spot' => '××海',
            'area_id' => '4',
            'access' => '滋賀県',
            'comment' => '綺麗でした。',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);


        \DB::table('posts')->insert([
            'user_id' => '2',
            'photo' => 'https://free-materials.com/adm/wp-content/uploads/2016/03/28aa11b03a244096c87aada442847714.jpg',
            'spot' => '屋上',
            'area_id' => '3',
            'access' => '東京',
            'comment' => 'おすすめスポット！',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

    }
}
