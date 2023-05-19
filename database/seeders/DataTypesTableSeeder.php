<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_types')->delete();
        
        \DB::table('data_types')->insert(array (
            0 => 
            array (
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'created_at' => '2022-11-09 13:18:29',
                'description' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"desc","default_search_key":null,"scope":"users"}',
                'display_name_plural' => 'Users',
                'display_name_singular' => 'User',
                'generate_permissions' => 1,
                'icon' => 'voyager-person',
                'id' => 1,
                'model_name' => 'App\\Models\\User',
                'name' => 'users',
                'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
                'server_side' => 0,
                'slug' => 'users',
                'updated_at' => '2022-11-10 01:12:13',
            ),
            1 => 
            array (
                'controller' => '',
                'created_at' => '2022-11-09 13:18:29',
                'description' => '',
                'details' => NULL,
                'display_name_plural' => 'Menus',
                'display_name_singular' => 'Menu',
                'generate_permissions' => 1,
                'icon' => 'voyager-list',
                'id' => 2,
                'model_name' => 'TCG\\Voyager\\Models\\Menu',
                'name' => 'menus',
                'policy_name' => NULL,
                'server_side' => 0,
                'slug' => 'menus',
                'updated_at' => '2022-11-09 13:18:29',
            ),
            2 => 
            array (
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                'created_at' => '2022-11-09 13:18:29',
                'description' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"desc","default_search_key":null,"scope":"roles"}',
                'display_name_plural' => 'Roles',
                'display_name_singular' => 'Role',
                'generate_permissions' => 1,
                'icon' => 'voyager-lock',
                'id' => 3,
                'model_name' => 'App\\Models\\Role',
                'name' => 'roles',
                'policy_name' => NULL,
                'server_side' => 0,
                'slug' => 'roles',
                'updated_at' => '2022-11-09 14:02:45',
            ),
            3 => 
            array (
                'controller' => 'App\\Http\\Controllers\\InvoiceController',
                'created_at' => '2023-04-02 22:25:32',
                'description' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'display_name_plural' => 'Datos fiscales',
                'display_name_singular' => 'Datos fiscales',
                'generate_permissions' => 1,
                'icon' => 'voyager-receipt',
                'id' => 4,
                'model_name' => 'App\\Models\\Fiscal',
                'name' => 'fiscals',
                'policy_name' => NULL,
                'server_side' => 0,
                'slug' => 'fiscals',
                'updated_at' => '2023-04-03 01:01:49',
            ),
            4 => 
            array (
                'controller' => 'App\\Http\\Controllers\\WhatsappTemplateController',
                'created_at' => '2023-05-19 04:16:14',
                'description' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'display_name_plural' => 'Templates de whatsapp',
                'display_name_singular' => 'Template de whatsapp',
                'generate_permissions' => 1,
                'icon' => 'voyager-documentation',
                'id' => 5,
                'model_name' => 'App\\Models\\WhatsappTemplate',
                'name' => 'whatsapp_templates',
                'policy_name' => NULL,
                'server_side' => 0,
                'slug' => 'whatsapp-templates',
                'updated_at' => '2023-05-19 04:20:23',
            ),
        ));
        
        
    }
}