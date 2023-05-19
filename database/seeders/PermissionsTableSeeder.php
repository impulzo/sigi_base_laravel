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
                'created_at' => '2023-03-25 12:47:13',
                'id' => 1,
                'key' => 'browse_admin',
                'table_name' => 'system',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            1 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 2,
                'key' => 'browse_bread',
                'table_name' => 'system',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            2 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 3,
                'key' => 'browse_database',
                'table_name' => 'system',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            3 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 4,
                'key' => 'browse_media',
                'table_name' => 'system',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            4 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 5,
                'key' => 'browse_compass',
                'table_name' => 'system',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            5 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 6,
                'key' => 'browse_menus',
                'table_name' => 'menus',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            6 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 7,
                'key' => 'read_menus',
                'table_name' => 'menus',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            7 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 8,
                'key' => 'edit_menus',
                'table_name' => 'menus',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            8 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 9,
                'key' => 'add_menus',
                'table_name' => 'menus',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            9 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 10,
                'key' => 'delete_menus',
                'table_name' => 'menus',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            10 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 11,
                'key' => 'browse_roles',
                'table_name' => 'roles',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            11 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 12,
                'key' => 'read_roles',
                'table_name' => 'roles',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            12 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 13,
                'key' => 'edit_roles',
                'table_name' => 'roles',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            13 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 14,
                'key' => 'add_roles',
                'table_name' => 'roles',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            14 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 15,
                'key' => 'delete_roles',
                'table_name' => 'roles',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            15 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 16,
                'key' => 'browse_users',
                'table_name' => 'users',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            16 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 17,
                'key' => 'read_users',
                'table_name' => 'users',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            17 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 18,
                'key' => 'edit_users',
                'table_name' => 'users',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            18 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 19,
                'key' => 'add_users',
                'table_name' => 'users',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            19 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 20,
                'key' => 'delete_users',
                'table_name' => 'users',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            20 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 21,
                'key' => 'browse_settings',
                'table_name' => 'settings',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            21 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 22,
                'key' => 'read_settings',
                'table_name' => 'settings',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            22 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 23,
                'key' => 'edit_settings',
                'table_name' => 'settings',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            23 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 24,
                'key' => 'add_settings',
                'table_name' => 'settings',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            24 => 
            array (
                'created_at' => '2023-03-25 12:47:13',
                'id' => 25,
                'key' => 'delete_settings',
                'table_name' => 'settings',
                'updated_at' => '2023-03-25 12:47:13',
            ),
            25 => 
            array (
                'created_at' => '2023-04-02 22:25:32',
                'id' => 26,
                'key' => 'browse_fiscals',
                'table_name' => 'fiscals',
                'updated_at' => '2023-04-02 22:25:32',
            ),
            26 => 
            array (
                'created_at' => '2023-04-02 22:25:32',
                'id' => 27,
                'key' => 'read_fiscals',
                'table_name' => 'fiscals',
                'updated_at' => '2023-04-02 22:25:32',
            ),
            27 => 
            array (
                'created_at' => '2023-04-02 22:25:32',
                'id' => 28,
                'key' => 'edit_fiscals',
                'table_name' => 'fiscals',
                'updated_at' => '2023-04-02 22:25:32',
            ),
            28 => 
            array (
                'created_at' => '2023-04-02 22:25:32',
                'id' => 29,
                'key' => 'add_fiscals',
                'table_name' => 'fiscals',
                'updated_at' => '2023-04-02 22:25:32',
            ),
            29 => 
            array (
                'created_at' => '2023-04-02 22:25:32',
                'id' => 30,
                'key' => 'delete_fiscals',
                'table_name' => 'fiscals',
                'updated_at' => '2023-04-02 22:25:32',
            ),
            30 => 
            array (
                'created_at' => '2023-05-19 04:16:14',
                'id' => 31,
                'key' => 'browse_whatsapp_templates',
                'table_name' => 'whatsapp_templates',
                'updated_at' => '2023-05-19 04:16:14',
            ),
            31 => 
            array (
                'created_at' => '2023-05-19 04:16:14',
                'id' => 32,
                'key' => 'read_whatsapp_templates',
                'table_name' => 'whatsapp_templates',
                'updated_at' => '2023-05-19 04:16:14',
            ),
            32 => 
            array (
                'created_at' => '2023-05-19 04:16:14',
                'id' => 33,
                'key' => 'edit_whatsapp_templates',
                'table_name' => 'whatsapp_templates',
                'updated_at' => '2023-05-19 04:16:14',
            ),
            33 => 
            array (
                'created_at' => '2023-05-19 04:16:14',
                'id' => 34,
                'key' => 'add_whatsapp_templates',
                'table_name' => 'whatsapp_templates',
                'updated_at' => '2023-05-19 04:16:14',
            ),
            34 => 
            array (
                'created_at' => '2023-05-19 04:16:14',
                'id' => 35,
                'key' => 'delete_whatsapp_templates',
                'table_name' => 'whatsapp_templates',
                'updated_at' => '2023-05-19 04:16:14',
            ),
        ));
        
        
    }
}