<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            //User Mangement
            'edit_own_profile',
            'access_user_management',
            
            //Dashboard
            // 'show_total_stats',
            // 'show_month_overview',
            // 'show_weekly_sales_purchases',
            // 'show_monthly_cashflow',
            // 'show_notifications',

            //badan penyelenggara
            'access_data_badan_penyelenggara',
            'access_history_badan_penyelenggara',

            'create_data_badan_penyelenggara',
            'create_history_badan_penyelenggara',

            'show_data_badan_penyelenggara',
            'show_history_badan_penyelenggara',

            'edit_data_badan_penyelenggara',
            'edit_history_badan_penyelenggara',

            'view_all_badan_penyelenggara',
            'view_restrict_badan_penyelenggara',

            //Perguruan tinggi
            'access_data_perguruan_tinggi',
            'access_history_perguruan_tinggi',

            'create_data_perguruan_tinggi',
            'create_history_perguruan_tinggi',
            
            'show_data_perguruan_tinggi',
            'show_history_perguruan_tinggi',

            'edit_data_perguruan_tinggi',
            'edit_history_perguruan_tinggi',
            
            'view_all_perguruan_tinggi',
            'view_restrict_perguruan_tinggi',

            //Pimpinan Perguruan Tinggi

            'access_pimpinan_perguruan_tinggi',

            'input_pimpinan_perguruan_tinggi',

            'edit_pimpinan_perguruan_tinggi',

            'view_all_pimpinan_perguruan_tinggi',

            'view_restrict_pimpinan_perguruan_tinggi',

            'show_data_peringkat_akreditasi',
            
            'show_data_lembaga_akreditasi',

        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        $role = Role::create([
            'name' => 'super_admin'
        ]);

        $role->givePermissionTo($permissions);
        $role->revokePermissionTo('access_user_management');

    }
}
