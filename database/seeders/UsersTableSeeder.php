<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
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
        //
        $faker = Faker::create();

        User::create([
            'fullname' => 'Võ Châu Tuấn',
            'email' => 'tuan@baotri.com',
            'password' => bcrypt('1234567'),
            'phone' => '0798888888',
            'status' => 1,
        ]);

        DB::table('users')->insert([
            [   'email'=>'thien@baotri.com',
                'fullname'=>'Thiện','password'=>Hash::make('1234567'),
                'phone'=>'0902071234','status'=>1],
                [   'email'=>'contact.thien.16@gmail.com',
                'fullname'=>'Trần Quang Thiện','password'=>Hash::make('1234567'),
                'phone'=>'09001009','status'=>1],
            [   'email'=>'trung@baotri.com',
                'fullname'=>'Trung','password'=>Hash::make('1234567'),
                'phone'=>'09001009','status'=>1],
            [   'email'=>'toan@baotri.com',
                'fullname'=>'Toàn','password'=>Hash::make('1234567'),
                'phone'=>'190010654','status'=>1]
        ]);
    }
}
