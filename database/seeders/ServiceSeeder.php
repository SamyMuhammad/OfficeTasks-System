<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            ['name' => 'الخدمة 1'],
            ['name' => 'الخدمة 2'],
            ['name' => 'الخدمة 3'],
        ]);
    }
}
