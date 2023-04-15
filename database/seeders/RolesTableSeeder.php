<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'support',
                'display_name' => 'Support',
                'created_at' => '2022-11-09 13:18:29',
                'updated_at' => '2022-11-09 14:03:47',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'admin',
                'display_name' => 'Administrador',
                'created_at' => '2022-11-09 13:18:29',
                'updated_at' => '2022-11-09 14:06:03',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'customer',
                'display_name' => 'Cliente',
                'created_at' => '2023-04-13 21:21:09',
                'updated_at' => '2023-04-13 21:21:09',
            ),
        ));
        
        
    }
}