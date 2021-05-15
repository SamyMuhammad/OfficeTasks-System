<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = Admin::create([
            'name' => 'Super Admin',
            'email' => 'admin@email.com',
            'phone' => '009661236548',
            'password' => bcrypt('123456'),
        ]);
        $adminsPermissions = Permission::where('guard_name', 'admin')->get()->pluck('id');
        $superAdmin->givePermissionTo($adminsPermissions);
    }
}
