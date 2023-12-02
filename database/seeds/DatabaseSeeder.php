<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([UserSeeder::class,]);
        DB::table('users')->insert([
            'name' => 'Yash',
            'email' => '06yashsharma@gmail.com',
            'password' => Hash::make('0000'),
            'status' => 'active',
            'type' => 'admin',
        ]);
    }
}
