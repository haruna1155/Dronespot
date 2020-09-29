<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertUser();
    }

    private function insertUser(int $length = 2)
    {
        for ($i = 1; $i <= $length; $i++) {
            $id = sprintf('%02d', $i);

            DB::table('users')->insert([
                'name' => "demo_user_${id}",
                'email' => "user${id}@example.com",
                'password' => Hash::make('password'),
            ]);
        }
    }
}
