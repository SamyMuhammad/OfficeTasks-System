<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expense_types')->insert([
            ['name' => 'النوع 1'],
            ['name' => 'النوع 2'],
            ['name' => 'النوع 3'],
        ]);
    }
}
