<?php

use App\Models\Driver;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Driver::create([
            'name' => 'driver 1',
            'email' => 'driver@gmail.com',
            'password' => bcrypt('123456789')
        ]);

        
    }
}
