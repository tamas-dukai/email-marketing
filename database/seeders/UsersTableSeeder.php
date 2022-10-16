<?php

namespace Database\Seeders;

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
            'role_id'  => '1',
            'name'  => 'Mr Admin',
            'username'  => 'mradmin',
            'email'  => 'admin@admin.com',
            'email_verified_at'  => date("Y-m-d H:i:s"),
            'password'  => bcrypt('12341234'),
            'created_at'  => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'role_id'  => '2',
            'name'  => 'Mr Member',
            'username'  => 'mrmember',
            'email'  => 'member@member.com',
            'email_verified_at'  => date("Y-m-d H:i:s"),
            'password'  => bcrypt('12341234'),
            'created_at'  => date("Y-m-d H:i:s"),
        ]);
    }
}
