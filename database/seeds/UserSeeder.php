<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name' => "test1",
                    'email' => "test1@gmail.com",
                    'password' => Hash::make('test1')
                ],
                [
                    'name' => "test2",
                    'email' => "test2@gmail.com",
                    'password' => Hash::make('test2')
                ],
                [
                    'name' => "test3",
                    'email' => "test3@gmail.com",
                    'password' => Hash::make('test3')
                ]

        ]);
    }
}
