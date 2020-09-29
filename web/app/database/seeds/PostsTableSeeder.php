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
        $this->insertPosts();
    }

    private function insertPosts()
    {
        $user_01_posts = $this->getUser01Data();
        $user_02_posts = $this->getUser02Data();

        $posts = array_merge($user_01_posts, $user_02_posts);
        foreach ($posts as $post) {
            DB::table('posts')->insert($post);
        }
    }

    private function getUser01Data()
    {
        return [
            [
                'user_id' => '1',
                'photo' => '/img/demo_data/yokonaga.png',
                'spot' => '××公園',
                'area_id' => '5',
                'access' => '京都府',
                'comment' => '綺麗でした。',
            ],
            [
                'user_id' => '1',
                'photo' => '/img/demo_data/tatenaga.png',
                'spot' => '××海',
                'area_id' => '4',
                'access' => '滋賀県',
                'comment' => '綺麗でした。',
            ],
            [
                'user_id' => '1',
                'photo' => '/img/demo_data/square.png',
                'spot' => '屋上',
                'area_id' => '1',
                'access' => '東京',
                'comment' => 'おすすめスポット！',
            ],
        ];
    }

    private function getUser02Data()
    {
        return [
            [
                'user_id' => '2',
                'photo' => '/img/demo_data/yokonaga.png',
                'spot' => '屋上',
                'area_id' => '9',
                'access' => '東京',
                'comment' => 'おすすめスポット！',
            ],
            [
                'user_id' => '2',
                'photo' => '/img/demo_data/yokonaga.png',
                'spot' => '屋上',
                'area_id' => '3',
                'access' => '東京',
                'comment' => 'おすすめスポット！',
            ],
            [
                'user_id' => '2',
                'photo' => '/img/demo_data/yokonaga.png',
                'spot' => '屋上',
                'area_id' => '7',
                'access' => '東京',
                'comment' => 'おすすめスポット！',
            ],
        ];
    }
}
