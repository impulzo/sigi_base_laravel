<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $keys = [
            'browse_admin',
            'browse_bread',
            'browse_database',
            'browse_media',
            'browse_compass',
        ];

        foreach ($keys as $key) {
            Permission::firstOrCreate([
                'key'        => $key,
                'table_name' => null,
            ]);
        }

        Permission::generateFor('menus');
        Permission::generateFor('roles');
        Permission::generateFor('users');
        Permission::generateFor('settings');
        Permission::generateFor('transfer_data');
        Permission::generateFor('modules');
        Permission::generateFor('payment_methods');
        Permission::generateFor('categories');
        Permission::generateFor('offices');
        Permission::generateFor('units');
        Permission::generateFor('products');
        Permission::generateFor('movement_types');
        Permission::generateFor('inventories');
    }
}