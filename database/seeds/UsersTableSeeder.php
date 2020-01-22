<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "first_name" => "george",
                "last_name" => "gkogkas",
            ],
            [
                "first_name" => "sofia",
                "last_name" => "dimaka",
            ],
            [
                "first_name" => "spiros",
                "mid_name" => "iwannis",
                "last_name" => "gkogkas",
            ],
        ];

        foreach ($users as $key => $user) {
            $midName = '';

            $name = $user['first_name'];

            if (array_key_exists('mid_name', $user)) {
                $name .= ' ' . $user['mid_name'];
                $midName = $user['mid_name'];
            }

            $name .= ' ' . $user['last_name'];

            DB::table('users')->insert([
                'first_name'    => $user['first_name'],
                'mid_name'      => $midName,
                'last_name'     => $user['last_name'],
                'name'          => $name,
                'email'         => $user['first_name'] . '_' . $user['last_name'] . '@gmail.com',
                'password'      => Hash::make('password'),
            ]);
        }
    }
}
