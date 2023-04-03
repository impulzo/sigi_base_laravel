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
                'id' => 1,
                'name' => 'users',
                'slug' => 'users',
                'display_name_singular' => 'User',
                'display_name_plural' => 'Users',
                'icon' => 'voyager-person',
                'model_name' => 'App\\Models\\User',
                'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"desc","default_search_key":null,"scope":"users"}',
                'created_at' => '2022-11-09 13:18:29',
                'updated_at' => '2022-11-10 01:12:13',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'menus',
                'slug' => 'menus',
                'display_name_singular' => 'Menu',
                'display_name_plural' => 'Menus',
                'icon' => 'voyager-list',
                'model_name' => 'TCG\\Voyager\\Models\\Menu',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2022-11-09 13:18:29',
                'updated_at' => '2022-11-09 13:18:29',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'roles',
                'slug' => 'roles',
                'display_name_singular' => 'Role',
                'display_name_plural' => 'Roles',
                'icon' => 'voyager-lock',
                'model_name' => 'App\\Models\\Role',
                'policy_name' => NULL,
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"desc","default_search_key":null,"scope":"roles"}',
                'created_at' => '2022-11-09 13:18:29',
                'updated_at' => '2022-11-09 14:02:45',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'transfer_data',
                'slug' => 'transfer-data',
                'display_name_singular' => 'Datos de tranferencia',
                'display_name_plural' => 'Datos de transferencia',
                'icon' => 'voyager-credit-card',
                'model_name' => 'App\\Models\\TransferDatum',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2023-04-02 19:26:05',
                'updated_at' => '2023-04-02 19:47:35',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'modules',
                'slug' => 'modules',
                'display_name_singular' => 'Módulo',
                'display_name_plural' => 'Módulos',
                'icon' => 'voyager-list',
                'model_name' => 'App\\Models\\Module',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2023-04-02 19:53:08',
                'updated_at' => '2023-04-02 19:53:54',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'payment_methods',
                'slug' => 'payment-methods',
                'display_name_singular' => 'Método de pago',
                'display_name_plural' => 'Métodos de pagos',
                'icon' => 'voyager-credit-cards',
                'model_name' => 'App\\Models\\PaymentMethod',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2023-04-02 19:58:31',
                'updated_at' => '2023-04-02 20:02:47',
            ),
        ));
        
        
    }
}