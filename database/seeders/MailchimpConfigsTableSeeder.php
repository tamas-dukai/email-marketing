<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MailchimpConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mailchimp_configs')->insert([
            'api_key' => 'placeholder',
            'list_id' => 'placeholder',
            'server_prefix' => 'placeholder',
        ]);
    }
}
