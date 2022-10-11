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
        \App\Models\User::create([
            'name' => 'user 1',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456789')
        ]);
    }
}
