<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BacklistedEmailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blacklisted_emails')->insert([
            'email_address' => 'test@test.com',
        ]);

        DB::table('blacklisted_emails')->insert([
            'email_address' => 'test@tests.com',
        ]);
    }
}
