<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscribeOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscribe_options')->insert([
            'option' => 'automatic',
        ]);

        DB::table('subscribe_options')->insert([
            'option' => 'checkbox',
        ]);

        DB::table('subscribe_options')->insert([
            'option' => 'no',
        ]);
    }
}
