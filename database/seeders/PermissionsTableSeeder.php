<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'browse_admin',
                'table_name' => 'system',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'browse_bread',
                'table_name' => 'system',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'browse_database',
                'table_name' => 'system',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'browse_media',
                'table_name' => 'system',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'browse_compass',
                'table_name' => 'system',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'browse_menus',
                'table_name' => 'menus',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'read_menus',
                'table_name' => 'menus',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'edit_menus',
                'table_name' => 'menus',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'add_menus',
                'table_name' => 'menus',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'delete_menus',
                'table_name' => 'menus',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'browse_roles',
                'table_name' => 'roles',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'read_roles',
                'table_name' => 'roles',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'edit_roles',
                'table_name' => 'roles',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'add_roles',
                'table_name' => 'roles',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'delete_roles',
                'table_name' => 'roles',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'browse_users',
                'table_name' => 'users',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'read_users',
                'table_name' => 'users',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            17 => 
            array (
                'id' => 18,
                'key' => 'edit_users',
                'table_name' => 'users',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            18 => 
            array (
                'id' => 19,
                'key' => 'add_users',
                'table_name' => 'users',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            19 => 
            array (
                'id' => 20,
                'key' => 'delete_users',
                'table_name' => 'users',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            20 => 
            array (
                'id' => 21,
                'key' => 'browse_settings',
                'table_name' => 'settings',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            21 => 
            array (
                'id' => 22,
                'key' => 'read_settings',
                'table_name' => 'settings',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            22 => 
            array (
                'id' => 23,
                'key' => 'edit_settings',
                'table_name' => 'settings',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            23 => 
            array (
                'id' => 24,
                'key' => 'add_settings',
                'table_name' => 'settings',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            24 => 
            array (
                'id' => 25,
                'key' => 'delete_settings',
                'table_name' => 'settings',
                'created_at' => '2023-03-25 12:47:13',
                'updated_at' => '2023-03-25 12:47:13',
            ),
        ));
        
        
    }
}