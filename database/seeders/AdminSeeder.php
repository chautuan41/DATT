<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ad = new Admin();
        $ad->email = 'admin@gmail.com';
        $ad->password = Hash::make('1234567');
        $ad->fullname='admin';
        $ad->phone='0123';
        $ad->status=1;
        $ad->save();

        DB::table('admins')->insert([
            [   'email'=>'adminthien1@gmail.com',
                'fullname'=>'Thiện','password'=>Hash::make('1234567'),
                'phone'=>'0902071234','status'=>1],
            [   'email'=>'adminthien2@gmail.com',
                'fullname'=>'Trần Quang Thiện','password'=>Hash::make('1234567'),
                'phone'=>'09001009','status'=>1],
            [   'email'=>'contact.thien.16@gmail.com',
                'fullname'=>'Trần Quang Thiện','password'=>Hash::make('1234567'),
                'phone'=>'09001009','status'=>1],
            [   'email'=>'adminthien3@gmail.com',
                'fullname'=>'Trần','password'=>Hash::make('1234567'),
                'phone'=>'190010654','status'=>1]
        ]);
    }
}
