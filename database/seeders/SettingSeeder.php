<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            ['slug' => 'logo', 'name' => 'لوجو المؤسسة', 'value' => ''],
            ['slug' => 'indviduals-service-phone', 'name' => 'هاتف خدمات الأفراد', 'value' => '009661234566'],
            ['slug' => 'companies-service-phone', 'name' => 'هاتف خدمات الشركات', 'value' => '009661234567'],
        ]);
    }
}
