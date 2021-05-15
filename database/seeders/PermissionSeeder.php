<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ## Admin Permissions
       
        // Permission::create(['name' => 'control settings', 'ar_name' => 'التحكم في الإعدادات', 'guard_name' => 'admin']);
        
        $role = Role::create(['name' => 'admins', 'ar_name' => 'المديرين', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view admins', 'ar_name' => 'عرض المديرين', 'guard_name' => 'admin']);
        Permission::create(['name' => 'show admins', 'ar_name' => 'مشاهدة المديرين', 'guard_name' => 'admin']);
        Permission::create(['name' => 'create admins', 'ar_name' => 'إضافة المديرين', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit admins', 'ar_name' => 'تعديل المديرين', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete admins', 'ar_name' => 'حذف المديرين', 'guard_name' => 'admin']); // 5
        $role->syncPermissions([1,2,3,4,5]);

        $role = Role::create(['name' => 'users', 'ar_name' => 'الموظفين', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view users', 'ar_name' => 'عرض الموظفين', 'guard_name' => 'admin']);
        Permission::create(['name' => 'show users', 'ar_name' => 'مشاهدة الموظفين', 'guard_name' => 'admin']);
        Permission::create(['name' => 'create users', 'ar_name' => 'إضافة الموظفين', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit users', 'ar_name' => 'تعديل الموظفين', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete users', 'ar_name' => 'حذف الموظفين', 'guard_name' => 'admin']); // 10
        $role->syncPermissions([6,7,8,9,10]);

        $role = Role::create(['name' => 'clients', 'ar_name' => 'العملاء', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view clients', 'ar_name' => 'عرض العملاء', 'guard_name' => 'admin']);
        Permission::create(['name' => 'show clients', 'ar_name' => 'مشاهدة العملاء', 'guard_name' => 'admin']);
        Permission::create(['name' => 'create clients', 'ar_name' => 'إضافة العملاء', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit clients', 'ar_name' => 'تعديل العملاء', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete clients', 'ar_name' => 'حذف العملاء', 'guard_name' => 'admin']); // 15
        $role->syncPermissions([11,12,13,14,15]);

        $role = Role::create(['name' => 'categories', 'ar_name' => 'الأقسام', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view categories', 'ar_name' => 'عرض الأقسام', 'guard_name' => 'admin']);
        Permission::create(['name' => 'create categories', 'ar_name' => 'إضافة الأقسام', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit categories', 'ar_name' => 'تعديل الأقسام', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete categories', 'ar_name' => 'حذف الأقسام', 'guard_name' => 'admin']); // 19
        $role->syncPermissions([16,17,18,19]);

        $role = Role::create(['name' => 'services', 'ar_name' => 'الخدمات', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view services', 'ar_name' => 'عرض الخدمات', 'guard_name' => 'admin']);
        Permission::create(['name' => 'create services', 'ar_name' => 'إضافة الخدمات', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit services', 'ar_name' => 'تعديل الخدمات', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete services', 'ar_name' => 'حذف الخدمات', 'guard_name' => 'admin']); // 23
        $role->syncPermissions([20,21,22,23]);

        $role = Role::create(['name' => 'payment-methods', 'ar_name' => 'طرق الدفع', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view payment-methods', 'ar_name' => 'عرض طرق الدفع', 'guard_name' => 'admin']);
        Permission::create(['name' => 'create payment-methods', 'ar_name' => 'إضافة طرق الدفع', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit payment-methods', 'ar_name' => 'تعديل طرق الدفع', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete payment-methods', 'ar_name' => 'حذف طرق الدفع', 'guard_name' => 'admin']); // 27
        $role->syncPermissions([24,25,26,27]);

        $role = Role::create(['name' => 'expense-types', 'ar_name' => 'أنواع الصرف', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view expense-types', 'ar_name' => 'عرض أنواع الصرف', 'guard_name' => 'admin']);
        Permission::create(['name' => 'create expense-types', 'ar_name' => 'إضافة أنواع الصرف', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit expense-types', 'ar_name' => 'تعديل أنواع الصرف', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete expense-types', 'ar_name' => 'حذف أنواع الصرف', 'guard_name' => 'admin']); // 31
        $role->syncPermissions([28,29,30,31]);

        $role = Role::create(['name' => 'task-statuses', 'ar_name' => 'حالات المهمات', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view task-statuses', 'ar_name' => 'عرض حالات المهمات', 'guard_name' => 'admin']);
        Permission::create(['name' => 'create task-statuses', 'ar_name' => 'إضافة حالات المهمات', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit task-statuses', 'ar_name' => 'تعديل حالات المهمات', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete task-statuses', 'ar_name' => 'حذف حالات المهمات', 'guard_name' => 'admin']);
        $role->syncPermissions(['view task-statuses', 'create task-statuses', 'edit task-statuses', 'delete task-statuses']);

        $role = Role::create(['name' => 'settings', 'ar_name' => 'الإعدادات', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view settings', 'ar_name' => 'عرض الإعدادات', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit settings', 'ar_name' => 'تعديل الإعدادات', 'guard_name' => 'admin']);
        $role->syncPermissions(['view settings', 'edit settings']);

        $role = Role::create(['name' => 'receipts', 'ar_name' => 'الفواتير', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view receipts', 'ar_name' => 'عرض الفواتير', 'guard_name' => 'admin']);
        Permission::create(['name' => 'show receipts', 'ar_name' => 'مشاهدة الفواتير', 'guard_name' => 'admin']);
        Permission::create(['name' => 'create receipts', 'ar_name' => 'إضافة الفواتير', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit receipts', 'ar_name' => 'تعديل الفواتير', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete receipts', 'ar_name' => 'حذف الفواتير', 'guard_name' => 'admin']);
        $role->syncPermissions(['view receipts', 'show receipts', 'create receipts', 'edit receipts', 'delete receipts']);

        $role = Role::create(['name' => 'receipts-payments', 'ar_name' => 'دفعات الفواتير', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view receipts-payments', 'ar_name' => 'عرض دفعات الفواتير', 'guard_name' => 'admin']);
        Permission::create(['name' => 'create receipts-payments', 'ar_name' => 'إضافة دفعات الفواتير', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit receipts-payments', 'ar_name' => 'تعديل دفعات الفواتير', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete receipts-payments', 'ar_name' => 'حذف دفعات الفواتير', 'guard_name' => 'admin']);
        $role->syncPermissions(['view receipts-payments', 'create receipts-payments', 'edit receipts-payments', 'delete receipts-payments']);

        $role = Role::create(['name' => 'tasks', 'ar_name' => 'المهمات', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view tasks', 'ar_name' => 'عرض المهمات', 'guard_name' => 'admin']);
        Permission::create(['name' => 'create tasks', 'ar_name' => 'إضافة المهمات', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit tasks', 'ar_name' => 'تعديل المهمات', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete tasks', 'ar_name' => 'حذف المهمات', 'guard_name' => 'admin']);
        $role->syncPermissions(['view tasks', 'create tasks', 'edit tasks', 'delete tasks']);

        ######################################## Users Permissions ###########################################
        $role = Role::create(['name' => 'clients', 'ar_name' => 'العملاء', 'guard_name' => 'web']);
        Permission::create(['name' => 'create clients', 'ar_name' => 'إضافة العملاء', 'guard_name' => 'web']);
        $role->syncPermissions(['create clients']);

        $role = Role::create(['name' => 'receipts', 'ar_name' => 'الفواتير', 'guard_name' => 'web']);
        Permission::create(['name' => 'view receipts', 'ar_name' => 'عرض الفواتير', 'guard_name' => 'web']);
        Permission::create(['name' => 'show receipts', 'ar_name' => 'مشاهدة الفواتير', 'guard_name' => 'web']);
        Permission::create(['name' => 'create receipts', 'ar_name' => 'إضافة الفواتير', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit receipts', 'ar_name' => 'تعديل الفواتير', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete receipts', 'ar_name' => 'حذف الفواتير', 'guard_name' => 'web']);
        $role->syncPermissions(['view receipts', 'show receipts', 'create receipts', 'edit receipts', 'delete receipts']);

        $role = Role::create(['name' => 'receipts-payments', 'ar_name' => 'دفعات الفواتير', 'guard_name' => 'web']);
        Permission::create(['name' => 'view receipts-payments', 'ar_name' => 'عرض دفعات الفواتير', 'guard_name' => 'web']);
        Permission::create(['name' => 'create receipts-payments', 'ar_name' => 'إضافة دفعات الفواتير', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit receipts-payments', 'ar_name' => 'تعديل دفعات الفواتير', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete receipts-payments', 'ar_name' => 'حذف دفعات الفواتير', 'guard_name' => 'web']);
        $role->syncPermissions(['view receipts-payments', 'create receipts-payments', 'edit receipts-payments', 'delete receipts-payments']);

        $role = Role::create(['name' => 'imports', 'ar_name' => 'الواردات', 'guard_name' => 'web']);
        Permission::create(['name' => 'view imports', 'ar_name' => 'عرض الواردات', 'guard_name' => 'web']);
        $role->syncPermissions(['view imports']);

        $role = Role::create(['name' => 'paid-salaries', 'ar_name' => 'الرواتب', 'guard_name' => 'web']);
        Permission::create(['name' => 'view paid-salaries', 'ar_name' => 'عرض الرواتب', 'guard_name' => 'web']);
        // Permission::create(['name' => 'show paid-salaries', 'ar_name' => 'مشاهدة الرواتب', 'guard_name' => 'web']);
        Permission::create(['name' => 'create paid-salaries', 'ar_name' => 'إضافة الرواتب', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit paid-salaries', 'ar_name' => 'تعديل الرواتب', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete paid-salaries', 'ar_name' => 'حذف الرواتب', 'guard_name' => 'web']); // 39
        $role->syncPermissions(['view paid-salaries', /* 'show paid-salaries', */ 'create paid-salaries', 'edit paid-salaries', 'delete paid-salaries']);

        $role = Role::create(['name' => 'bonuses', 'ar_name' => 'المكافآت', 'guard_name' => 'web']);
        Permission::create(['name' => 'view bonuses', 'ar_name' => 'عرض المكافآت', 'guard_name' => 'web']);
        // Permission::create(['name' => 'show bonuses', 'ar_name' => 'مشاهدة المكافآت', 'guard_name' => 'web']);
        Permission::create(['name' => 'create bonuses', 'ar_name' => 'إضافة المكافآت', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit bonuses', 'ar_name' => 'تعديل المكافآت', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete bonuses', 'ar_name' => 'حذف المكافآت', 'guard_name' => 'web']); // 39
        $role->syncPermissions(['view bonuses', /* 'show bonuses', */ 'create bonuses', 'edit bonuses', 'delete bonuses']);

        $role = Role::create(['name' => 'expenses', 'ar_name' => 'المصروفات العامة', 'guard_name' => 'web']);
        Permission::create(['name' => 'view expenses', 'ar_name' => 'عرض المصروفات العامة', 'guard_name' => 'web']);
        // Permission::create(['name' => 'show expenses', 'ar_name' => 'مشاهدة المصروفات العامة', 'guard_name' => 'web']);
        Permission::create(['name' => 'create expenses', 'ar_name' => 'إضافة المصروفات العامة', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit expenses', 'ar_name' => 'تعديل المصروفات العامة', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete expenses', 'ar_name' => 'حذف المصروفات العامة', 'guard_name' => 'web']); // 39
        $role->syncPermissions(['view expenses', /* 'show expenses', */ 'create expenses', 'edit expenses', 'delete expenses']);
    }
}
