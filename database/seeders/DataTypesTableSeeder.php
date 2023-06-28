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
                'updated_at' => '2023-06-28 14:17:00',
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
                'controller' => NULL,
                'created_at' => '2023-04-02 19:53:08',
                'description' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'display_name_plural' => 'Módulos',
                'display_name_singular' => 'Módulo',
                'generate_permissions' => 1,
                'icon' => 'voyager-list',
                'id' => 5,
                'model_name' => 'App\\Models\\Module',
                'name' => 'modules',
                'policy_name' => NULL,
                'server_side' => 0,
                'slug' => 'modules',
                'updated_at' => '2023-04-02 19:53:54',
            ),
            4 => 
            array (
                'controller' => 'App\\Http\\Controllers\\ProductController',
                'created_at' => '2023-04-09 21:27:15',
                'description' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'display_name_plural' => 'Productos',
                'display_name_singular' => 'Producto',
                'generate_permissions' => 1,
                'icon' => 'voyager-data',
                'id' => 10,
                'model_name' => 'App\\Models\\Product',
                'name' => 'products',
                'policy_name' => NULL,
                'server_side' => 0,
                'slug' => 'products',
                'updated_at' => '2023-06-28 14:22:02',
            ),
            5 => 
            array (
                'controller' => 'App\\Http\\Controllers\\CustomerController',
                'created_at' => '2023-04-12 23:37:46',
                'description' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'display_name_plural' => 'Clientes',
                'display_name_singular' => 'Cliente',
                'generate_permissions' => 1,
                'icon' => 'voyager-people',
                'id' => 13,
                'model_name' => 'App\\Models\\Customer',
                'name' => 'customers',
                'policy_name' => NULL,
                'server_side' => 0,
                'slug' => 'customers',
                'updated_at' => '2023-06-28 14:19:11',
            ),
            6 => 
            array (
                'controller' => 'App\\Http\\Controllers\\InvoiceController',
                'created_at' => '2023-06-23 11:00:43',
                'description' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'display_name_plural' => 'Facturas',
                'display_name_singular' => 'Factura',
                'generate_permissions' => 1,
                'icon' => 'voyager-certificate',
                'id' => 15,
                'model_name' => 'App\\Models\\Invoice',
                'name' => 'invoices',
                'policy_name' => NULL,
                'server_side' => 0,
                'slug' => 'invoices',
                'updated_at' => '2023-06-28 14:20:18',
            ),
            7 => 
            array (
                'controller' => NULL,
                'created_at' => '2023-06-28 00:23:37',
                'description' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'display_name_plural' => 'Datos fiscales',
                'display_name_singular' => 'Datos fiscales',
                'generate_permissions' => 1,
                'icon' => 'voyager-receipt',
                'id' => 17,
                'model_name' => 'App\\Models\\Fiscal',
                'name' => 'fiscals',
                'policy_name' => NULL,
                'server_side' => 0,
                'slug' => 'fiscals',
                'updated_at' => '2023-06-28 14:18:41',
            ),
        ));
        
        
    }
}