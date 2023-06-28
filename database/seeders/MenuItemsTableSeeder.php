<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_items')->delete();
        
        \DB::table('menu_items')->insert(array (
            0 => 
            array (
                'color' => NULL,
                'created_at' => '2023-04-02 19:16:09',
                'icon_class' => 'voyager-boat',
                'id' => 1,
                'menu_id' => 1,
                'order' => 1,
                'parameters' => NULL,
                'parent_id' => NULL,
                'route' => 'voyager.dashboard',
                'target' => '_self',
                'title' => 'Tablero',
                'updated_at' => '2023-04-02 19:16:09',
                'url' => '',
            ),
            1 => 
            array (
                'color' => NULL,
                'created_at' => '2023-04-02 19:16:09',
                'icon_class' => 'voyager-person',
                'id' => 3,
                'menu_id' => 1,
                'order' => 3,
                'parameters' => NULL,
                'parent_id' => NULL,
                'route' => 'voyager.users.index',
                'target' => '_self',
                'title' => 'Usuarios',
                'updated_at' => '2023-04-02 19:16:09',
                'url' => '',
            ),
            2 => 
            array (
                'color' => NULL,
                'created_at' => '2023-04-02 19:16:09',
                'icon_class' => 'voyager-lock',
                'id' => 4,
                'menu_id' => 1,
                'order' => 2,
                'parameters' => NULL,
                'parent_id' => NULL,
                'route' => 'voyager.roles.index',
                'target' => '_self',
                'title' => 'Roles',
                'updated_at' => '2023-04-02 19:16:09',
                'url' => '',
            ),
            3 => 
            array (
                'color' => NULL,
                'created_at' => '2023-04-02 19:16:09',
                'icon_class' => 'voyager-tools',
                'id' => 5,
                'menu_id' => 1,
                'order' => 4,
                'parameters' => NULL,
                'parent_id' => NULL,
                'route' => NULL,
                'target' => '_self',
                'title' => 'Herramientas',
                'updated_at' => '2023-06-22 20:35:32',
                'url' => '',
            ),
            4 => 
            array (
                'color' => NULL,
                'created_at' => '2023-04-02 19:16:09',
                'icon_class' => 'voyager-list',
                'id' => 6,
                'menu_id' => 1,
                'order' => 1,
                'parameters' => NULL,
                'parent_id' => 5,
                'route' => 'voyager.menus.index',
                'target' => '_self',
                'title' => 'Diseñador de Menús',
                'updated_at' => '2023-04-09 21:49:25',
                'url' => '',
            ),
            5 => 
            array (
                'color' => NULL,
                'created_at' => '2023-04-02 19:16:09',
                'icon_class' => 'voyager-data',
                'id' => 7,
                'menu_id' => 1,
                'order' => 2,
                'parameters' => NULL,
                'parent_id' => 5,
                'route' => 'voyager.database.index',
                'target' => '_self',
                'title' => 'Base de Datos',
                'updated_at' => '2023-04-09 21:49:25',
                'url' => '',
            ),
            6 => 
            array (
                'color' => NULL,
                'created_at' => '2023-04-02 19:16:09',
                'icon_class' => 'voyager-compass',
                'id' => 8,
                'menu_id' => 1,
                'order' => 3,
                'parameters' => NULL,
                'parent_id' => 5,
                'route' => 'voyager.compass.index',
                'target' => '_self',
                'title' => 'Compás',
                'updated_at' => '2023-04-09 21:49:25',
                'url' => '',
            ),
            7 => 
            array (
                'color' => NULL,
                'created_at' => '2023-04-02 19:16:09',
                'icon_class' => 'voyager-bread',
                'id' => 9,
                'menu_id' => 1,
                'order' => 4,
                'parameters' => NULL,
                'parent_id' => 5,
                'route' => 'voyager.bread.index',
                'target' => '_self',
                'title' => 'BREAD',
                'updated_at' => '2023-04-09 21:49:25',
                'url' => '',
            ),
            8 => 
            array (
                'color' => '#000000',
                'created_at' => '2023-04-02 19:16:09',
                'icon_class' => 'voyager-settings',
                'id' => 10,
                'menu_id' => 1,
                'order' => 5,
                'parameters' => 'null',
                'parent_id' => NULL,
                'route' => 'voyager.settings.index',
                'target' => '_self',
                'title' => 'Ajustes',
                'updated_at' => '2023-06-22 20:35:32',
                'url' => '',
            ),
            9 => 
            array (
                'color' => NULL,
                'created_at' => '2023-04-02 19:53:08',
                'icon_class' => 'voyager-list',
                'id' => 12,
                'menu_id' => 1,
                'order' => 7,
                'parameters' => NULL,
                'parent_id' => NULL,
                'route' => 'voyager.modules.index',
                'target' => '_self',
                'title' => 'Módulos',
                'updated_at' => '2023-06-22 20:37:12',
                'url' => '',
            ),
            10 => 
            array (
                'color' => '#000000',
                'created_at' => '2023-04-09 21:27:15',
                'icon_class' => 'voyager-data',
                'id' => 17,
                'menu_id' => 1,
                'order' => 1,
                'parameters' => 'null',
                'parent_id' => 20,
                'route' => 'voyager.products.index',
                'target' => '_self',
                'title' => 'Productos/Servicios',
                'updated_at' => '2023-06-22 23:50:33',
                'url' => '',
            ),
            11 => 
            array (
                'color' => '#000000',
                'created_at' => '2023-04-09 21:49:05',
                'icon_class' => 'voyager-folder',
                'id' => 20,
                'menu_id' => 1,
                'order' => 6,
                'parameters' => '',
                'parent_id' => NULL,
                'route' => NULL,
                'target' => '_self',
                'title' => 'Catálogos',
                'updated_at' => '2023-06-22 20:37:12',
                'url' => '',
            ),
            12 => 
            array (
                'color' => '#000000',
                'created_at' => '2023-04-12 23:37:46',
                'icon_class' => 'voyager-people',
                'id' => 22,
                'menu_id' => 1,
                'order' => 2,
                'parameters' => 'null',
                'parent_id' => 20,
                'route' => 'voyager.customers.index',
                'target' => '_self',
                'title' => 'Clientes',
                'updated_at' => '2023-06-22 20:37:12',
                'url' => '',
            ),
            13 => 
            array (
                'color' => NULL,
                'created_at' => '2023-06-23 11:00:43',
                'icon_class' => 'voyager-certificate',
                'id' => 23,
                'menu_id' => 1,
                'order' => 8,
                'parameters' => NULL,
                'parent_id' => NULL,
                'route' => 'voyager.invoices.index',
                'target' => '_self',
                'title' => 'Facturas',
                'updated_at' => '2023-06-23 11:00:43',
                'url' => '',
            ),
            14 => 
            array (
                'color' => '#000000',
                'created_at' => '2023-06-28 00:23:37',
                'icon_class' => 'voyager-receipt',
                'id' => 24,
                'menu_id' => 1,
                'order' => 9,
                'parameters' => 'null',
                'parent_id' => NULL,
                'route' => 'voyager.fiscals.index',
                'target' => '_self',
                'title' => 'Datos fiscales',
                'updated_at' => '2023-06-28 14:22:53',
                'url' => '',
            ),
        ));
        
        
    }
}