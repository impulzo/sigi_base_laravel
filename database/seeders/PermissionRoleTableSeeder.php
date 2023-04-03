<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission_role')->delete();
        
        \DB::table('permission_role')->insert(array (
            0 => 
            array (
                'permission_id' => 1,
                'role_id' => 1,
            ),
            1 => 
            array (
                'permission_id' => 1,
                'role_id' => 2,
            ),
            2 => 
            array (
                'permission_id' => 2,
                'role_id' => 1,
            ),
            3 => 
            array (
                'permission_id' => 3,
                'role_id' => 1,
            ),
            4 => 
            array (
                'permission_id' => 4,
                'role_id' => 1,
            ),
            5 => 
            array (
                'permission_id' => 5,
                'role_id' => 1,
            ),
            6 => 
            array (
                'permission_id' => 11,
                'role_id' => 1,
            ),
            7 => 
            array (
                'permission_id' => 11,
                'role_id' => 2,
            ),
            8 => 
            array (
                'permission_id' => 12,
                'role_id' => 1,
            ),
            9 => 
            array (
                'permission_id' => 13,
                'role_id' => 1,
            ),
            10 => 
            array (
                'permission_id' => 14,
                'role_id' => 1,
            ),
            11 => 
            array (
                'permission_id' => 15,
                'role_id' => 1,
            ),
            12 => 
            array (
                'permission_id' => 16,
                'role_id' => 1,
            ),
            13 => 
            array (
                'permission_id' => 16,
                'role_id' => 2,
            ),
            14 => 
            array (
                'permission_id' => 17,
                'role_id' => 1,
            ),
            15 => 
            array (
                'permission_id' => 17,
                'role_id' => 2,
            ),
            16 => 
            array (
                'permission_id' => 18,
                'role_id' => 1,
            ),
            17 => 
            array (
                'permission_id' => 18,
                'role_id' => 2,
            ),
            18 => 
            array (
                'permission_id' => 19,
                'role_id' => 1,
            ),
            19 => 
            array (
                'permission_id' => 19,
                'role_id' => 2,
            ),
            20 => 
            array (
                'permission_id' => 20,
                'role_id' => 1,
            ),
            21 => 
            array (
                'permission_id' => 20,
                'role_id' => 2,
            ),
            22 => 
            array (
                'permission_id' => 26,
                'role_id' => 1,
            ),
            23 => 
            array (
                'permission_id' => 26,
                'role_id' => 2,
            ),
            24 => 
            array (
                'permission_id' => 27,
                'role_id' => 1,
            ),
            25 => 
            array (
                'permission_id' => 27,
                'role_id' => 2,
            ),
            26 => 
            array (
                'permission_id' => 28,
                'role_id' => 1,
            ),
            27 => 
            array (
                'permission_id' => 28,
                'role_id' => 2,
            ),
            28 => 
            array (
                'permission_id' => 29,
                'role_id' => 1,
            ),
            29 => 
            array (
                'permission_id' => 29,
                'role_id' => 2,
            ),
            30 => 
            array (
                'permission_id' => 30,
                'role_id' => 1,
            ),
            31 => 
            array (
                'permission_id' => 30,
                'role_id' => 2,
            ),
            32 => 
            array (
                'permission_id' => 31,
                'role_id' => 1,
            ),
            33 => 
            array (
                'permission_id' => 31,
                'role_id' => 2,
            ),
            34 => 
            array (
                'permission_id' => 32,
                'role_id' => 1,
            ),
            35 => 
            array (
                'permission_id' => 32,
                'role_id' => 2,
            ),
            36 => 
            array (
                'permission_id' => 33,
                'role_id' => 1,
            ),
            37 => 
            array (
                'permission_id' => 33,
                'role_id' => 2,
            ),
            38 => 
            array (
                'permission_id' => 34,
                'role_id' => 1,
            ),
            39 => 
            array (
                'permission_id' => 34,
                'role_id' => 2,
            ),
            40 => 
            array (
                'permission_id' => 35,
                'role_id' => 1,
            ),
            41 => 
            array (
                'permission_id' => 35,
                'role_id' => 2,
            ),
            42 => 
            array (
                'permission_id' => 36,
                'role_id' => 1,
            ),
            43 => 
            array (
                'permission_id' => 36,
                'role_id' => 2,
            ),
            44 => 
            array (
                'permission_id' => 37,
                'role_id' => 1,
            ),
            45 => 
            array (
                'permission_id' => 37,
                'role_id' => 2,
            ),
            46 => 
            array (
                'permission_id' => 38,
                'role_id' => 1,
            ),
            47 => 
            array (
                'permission_id' => 38,
                'role_id' => 2,
            ),
            48 => 
            array (
                'permission_id' => 39,
                'role_id' => 1,
            ),
            49 => 
            array (
                'permission_id' => 39,
                'role_id' => 2,
            ),
            50 => 
            array (
                'permission_id' => 40,
                'role_id' => 1,
            ),
            51 => 
            array (
                'permission_id' => 40,
                'role_id' => 2,
            ),
        ));
        
        
    }
}