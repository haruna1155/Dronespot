<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->isnertAreas();
    }

    private function isnertAreas()
    {
        foreach (config('const.AREAS') as $id => $name) {
            DB::table('areas')->insert([
                'id' => $id,
                'name' => $name,
            ]);
        }
    }
}
