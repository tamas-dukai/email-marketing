<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarketingProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marketing_providers')->insert([
            'provider' => 'mailchimp',
        ]);

        DB::table('marketing_providers')->insert([
            'provider' => 'sendy',
        ]);

        DB::table('marketing_providers')->insert([
            'provider' => 'convertkit',
        ]);

        DB::table('marketing_providers')->insert([
            'provider' => 'sendinblue',
        ]);

        DB::table('marketing_providers')->insert([
            'provider' => 'getresponse',
        ]);
    }
}
