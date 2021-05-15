<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            ['name' => 'Lavinia Wolf', 'phone' => '00386534810579'],
            ['name' => 'Jerry Russo', 'phone' => '00177865681072'],
            ['name' => 'Shannon Guy', 'phone' => '00637622417158'],
        ]);
    }
}
