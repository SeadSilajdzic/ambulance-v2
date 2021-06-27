<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name' => 'Sead Silajdzic',
            'username' => 'seadx',
            'password' => bcrypt('sead1234'),
            'email' => 'sead17@outlook.com',
            'role_id' => 1,
            'is_staff' => 1,
            'phone' => '123-456-789',
            'slug' => 'seadx'
        ]);
    }
}
