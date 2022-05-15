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
            'fullname' => 'Vo Chau Tuan',
            'email' => 'admin@vctuan.com',
            'password' => bcrypt('12345678'),
            'phone' => '0798888888',
            'status' => 1,
        ]);
    }
}
