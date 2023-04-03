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
                'id' => 1,
                'menu_id' => 1,
                'title' => 'Tablero',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-boat',
                'color' => null,
                'parent_id' => null,
                'order' => 1,
                'created_at' => '2023-04-02 19:16:09',
                'updated_at' => '2023-04-02 19:16:09',
                'route' => 'voyager.dashboard',
                'parameters' => null,
            ),
            1 =>
            array (
                'id' => 2,
                'menu_id' => 1,
                'title' => 'Multimedia',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-images',
                'color' => null,
                'parent_id' => null,
                'order' => 5,
                'created_at' => '2023-04-02 19:16:09',
                'updated_at' => '2023-04-02 19:16:09',
                'route' => 'voyager.media.index',
                'parameters' => null,
            ),
            2 =>
            array (
                'id' => 3,
                'menu_id' => 1,
                'title' => 'Usuarios',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-person',
                'color' => null,
                'parent_id' => null,
                'order' => 3,
                'created_at' => '2023-04-02 19:16:09',
                'updated_at' => '2023-04-02 19:16:09',
                'route' => 'voyager.users.index',
                'parameters' => null,
            ),
            3 =>
            array (
                'id' => 4,
                'menu_id' => 1,
                'title' => 'Roles',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-lock',
                'color' => null,
                'parent_id' => null,
                'order' => 2,
                'created_at' => '2023-04-02 19:16:09',
                'updated_at' => '2023-04-02 19:16:09',
                'route' => 'voyager.roles.index',
                'parameters' => null,
            ),
            4 =>
            array (
                'id' => 5,
                'menu_id' => 1,
                'title' => 'Herramientas',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-tools',
                'color' => null,
                'parent_id' => null,
                'order' => 9,
                'created_at' => '2023-04-02 19:16:09',
                'updated_at' => '2023-04-02 19:16:09',
                'route' => null,
                'parameters' => null,
            ),
            5 =>
            array (
                'id' => 6,
                'menu_id' => 1,
                'title' => 'Diseñador de Menús',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-list',
                'color' => null,
                'parent_id' => 5,
                'order' => 10,
                'created_at' => '2023-04-02 19:16:09',
                'updated_at' => '2023-04-02 19:16:09',
                'route' => 'voyager.menus.index',
                'parameters' => null,
            ),
            6 =>
            array (
                'id' => 7,
                'menu_id' => 1,
                'title' => 'Base de Datos',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-data',
                'color' => null,
                'parent_id' => 5,
                'order' => 11,
                'created_at' => '2023-04-02 19:16:09',
                'updated_at' => '2023-04-02 19:16:09',
                'route' => 'voyager.database.index',
                'parameters' => null,
            ),
            7 =>
            array (
                'id' => 8,
                'menu_id' => 1,
                'title' => 'Compás',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-compass',
                'color' => null,
                'parent_id' => 5,
                'order' => 12,
                'created_at' => '2023-04-02 19:16:09',
                'updated_at' => '2023-04-02 19:16:09',
                'route' => 'voyager.compass.index',
                'parameters' => null,
            ),
            8 =>
            array (
                'id' => 9,
                'menu_id' => 1,
                'title' => 'BREAD',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-bread',
                'color' => null,
                'parent_id' => 5,
                'order' => 13,
                'created_at' => '2023-04-02 19:16:09',
                'updated_at' => '2023-04-02 19:16:09',
                'route' => 'voyager.bread.index',
                'parameters' => null,
            ),
            9 =>
            array (
                'id' => 10,
                'menu_id' => 1,
                'title' => 'Parámetros',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-settings',
                'color' => null,
                'parent_id' => null,
                'order' => 14,
                'created_at' => '2023-04-02 19:16:09',
                'updated_at' => '2023-04-02 19:16:09',
                'route' => 'voyager.settings.index',
                'parameters' => null,
            ),
            10 =>
            array (
                'id' => 11,
                'menu_id' => 1,
                'title' => 'Datos de transferencia',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-credit-card',
                'color' => null,
                'parent_id' => null,
                'order' => 15,
                'created_at' => '2023-04-02 19:26:05',
                'updated_at' => '2023-04-02 19:26:05',
                'route' => 'voyager.transfer-data.index',
                'parameters' => null,
            ),
            11 =>
            array (
                'id' => 12,
                'menu_id' => 1,
                'title' => 'Módulos',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-list',
                'color' => null,
                'parent_id' => null,
                'order' => 16,
                'created_at' => '2023-04-02 19:53:08',
                'updated_at' => '2023-04-02 19:53:08',
                'route' => 'voyager.modules.index',
                'parameters' => null,
            ),
            12 =>
            array (
                'id' => 13,
                'menu_id' => 1,
                'title' => 'Métodos de pagos',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-credit-cards',
                'color' => null,
                'parent_id' => null,
                'order' => 17,
                'created_at' => '2023-04-02 19:58:31',
                'updated_at' => '2023-04-02 19:58:31',
                'route' => 'voyager.payment-methods.index',
                'parameters' => null,
            ),
        ));
    }
}
