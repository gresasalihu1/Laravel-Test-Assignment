<?php

namespace Database\Seeders\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'id'=>'1',
            'email' => 'user1@gmail.com',
            'password' =>'Gresa1',
        ],[
            'id'=>'2',
            'email' => 'user2@gmail.com',
            'password' =>'Gresa12.',
        ]
        ]);
    }
}
