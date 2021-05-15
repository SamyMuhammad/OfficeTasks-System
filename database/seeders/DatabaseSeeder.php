<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PermissionSeeder::class,
            AdminSeeder::class,
            SettingSeeder::class,
            TaskStatusSeeder::class,
            // Local Seeders
            CategorySeeder::class,
            UserSeeder::class,
            ClientSeeder::class,
            ExpenseTypeSeeder::class,
            PaymentMethodSeeder::class,
            ServiceSeeder::class,
        ]);
    }
}
