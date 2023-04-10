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
                'controller' => NULL,
                'created_at' => '2023-04-02 19:26:05',
                'description' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'display_name_plural' => 'Datos de transferencia',
                'display_name_singular' => 'Datos de tranferencia',
                'generate_permissions' => 1,
                'icon' => 'voyager-credit-card',
                'id' => 4,
                'model_name' => 'App\\Models\\TransferDatum',
                'name' => 'transfer_data',
                'policy_name' => NULL,
                'server_side' => 0,
                'slug' => 'transfer-data',
                'updated_at' => '2023-04-02 19:47:35',
            ),
            4 => 
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
            5 => 
            array (
                'controller' => NULL,
                'created_at' => '2023-04-02 19:58:31',
                'description' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'display_name_plural' => 'Métodos de pagos',
                'display_name_singular' => 'Método de pago',
                'generate_permissions' => 1,
                'icon' => 'voyager-credit-cards',
                'id' => 6,
                'model_name' => 'App\\Models\\PaymentMethod',
                'name' => 'payment_methods',
                'policy_name' => NULL,
                'server_side' => 0,
                'slug' => 'payment-methods',
                'updated_at' => '2023-04-02 20:02:47',
            ),
            6 => 
            array (
                'controller' => NULL,
                'created_at' => '2023-04-09 21:15:08',
                'description' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'display_name_plural' => 'Categorías',
                'display_name_singular' => 'Categoría',
                'generate_permissions' => 1,
                'icon' => 'voyager-categories',
                'id' => 7,
                'model_name' => 'App\\Models\\Category',
                'name' => 'categories',
                'policy_name' => NULL,
                'server_side' => 0,
                'slug' => 'categories',
                'updated_at' => '2023-04-09 21:16:08',
            ),
            7 => 
            array (
                'controller' => NULL,
                'created_at' => '2023-04-09 21:18:07',
                'description' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'display_name_plural' => 'Sucursales',
                'display_name_singular' => 'Sucursal',
                'generate_permissions' => 1,
                'icon' => 'voyager-shop',
                'id' => 8,
                'model_name' => 'App\\Models\\Office',
                'name' => 'offices',
                'policy_name' => NULL,
                'server_side' => 0,
                'slug' => 'offices',
                'updated_at' => '2023-04-09 21:18:07',
            ),
            8 => 
            array (
                'controller' => NULL,
                'created_at' => '2023-04-09 21:19:51',
                'description' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'display_name_plural' => 'Unidades de medida',
                'display_name_singular' => 'Unidad de medida',
                'generate_permissions' => 1,
                'icon' => 'voyager-params',
                'id' => 9,
                'model_name' => 'App\\Models\\Unit',
                'name' => 'units',
                'policy_name' => NULL,
                'server_side' => 0,
                'slug' => 'units',
                'updated_at' => '2023-04-09 21:19:51',
            ),
            9 => 
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
                'updated_at' => '2023-04-09 21:44:48',
            ),
            10 => 
            array (
                'controller' => NULL,
                'created_at' => '2023-04-09 21:31:57',
                'description' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'display_name_plural' => 'Tipos de movimientos',
                'display_name_singular' => 'Tipo de movimiento',
                'generate_permissions' => 1,
                'icon' => 'voyager-external',
                'id' => 11,
                'model_name' => 'App\\Models\\MovementType',
                'name' => 'movement_types',
                'policy_name' => NULL,
                'server_side' => 0,
                'slug' => 'movement-types',
                'updated_at' => '2023-04-09 21:31:57',
            ),
            11 => 
            array (
                'controller' => NULL,
                'created_at' => '2023-04-09 21:40:15',
                'description' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'display_name_plural' => 'Inventario de productos',
                'display_name_singular' => 'Inventario de producto',
                'generate_permissions' => 1,
                'icon' => 'voyager-data',
                'id' => 12,
                'model_name' => 'App\\Models\\Inventory',
                'name' => 'inventories',
                'policy_name' => NULL,
                'server_side' => 0,
                'slug' => 'inventories',
                'updated_at' => '2023-04-09 21:42:19',
            ),
        ));
        
        
    }
}