<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        User::create([
            'fullname' => 'Võ Châu Tuấn',
            'email' => 'tuan@baotri.com',
            'password' => bcrypt('1234567'),
            'phone' => '0798888888',
            'status' => 1,
        ]);
    }
}
