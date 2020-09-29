<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertFavorites();
    }

    private function insertFavorites()
    {
        $favorites = [
            [
                'user_id' => 2,
                'post_id' => 1,
            ],
            [
                'user_id' => 2,
                'post_id' => 2,
            ],
        ];

        foreach ($favorites as $favorite) {
            DB::table('favorites')->insert($favorite);
        }
    }
}
