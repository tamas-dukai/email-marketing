<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'marketing_provider' => 'mailchimp',
            'subscribe_on_register' => 'checkbox',
            'tick_subscribe' => 0,
        ]);
    }
}
