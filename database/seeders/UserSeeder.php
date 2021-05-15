<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'المستخدم الأول',
            'email' => 'user@email.com',
            'phone' => '009661236548',
            'salary' => 5000,
            'password' => bcrypt('123456'),
            'category_id' => 1,
        ]);
        $usersPermissions = Permission::where('guard_name', 'web')->get()->pluck('id');
        $user->givePermissionTo($usersPermissions);
    }
}
