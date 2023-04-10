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
                'permission_id' => 6,
                'role_id' => 1,
            ),
            7 => 
            array (
                'permission_id' => 7,
                'role_id' => 1,
            ),
            8 => 
            array (
                'permission_id' => 8,
                'role_id' => 1,
            ),
            9 => 
            array (
                'permission_id' => 9,
                'role_id' => 1,
            ),
            10 => 
            array (
                'permission_id' => 10,
                'role_id' => 1,
            ),
            11 => 
            array (
                'permission_id' => 11,
                'role_id' => 1,
            ),
            12 => 
            array (
                'permission_id' => 11,
                'role_id' => 2,
            ),
            13 => 
            array (
                'permission_id' => 12,
                'role_id' => 1,
            ),
            14 => 
            array (
                'permission_id' => 13,
                'role_id' => 1,
            ),
            15 => 
            array (
                'permission_id' => 14,
                'role_id' => 1,
            ),
            16 => 
            array (
                'permission_id' => 15,
                'role_id' => 1,
            ),
            17 => 
            array (
                'permission_id' => 16,
                'role_id' => 1,
            ),
            18 => 
            array (
                'permission_id' => 16,
                'role_id' => 2,
            ),
            19 => 
            array (
                'permission_id' => 17,
                'role_id' => 1,
            ),
            20 => 
            array (
                'permission_id' => 17,
                'role_id' => 2,
            ),
            21 => 
            array (
                'permission_id' => 18,
                'role_id' => 1,
            ),
            22 => 
            array (
                'permission_id' => 18,
                'role_id' => 2,
            ),
            23 => 
            array (
                'permission_id' => 19,
                'role_id' => 1,
            ),
            24 => 
            array (
                'permission_id' => 19,
                'role_id' => 2,
            ),
            25 => 
            array (
                'permission_id' => 20,
                'role_id' => 1,
            ),
            26 => 
            array (
                'permission_id' => 20,
                'role_id' => 2,
            ),
            27 => 
            array (
                'permission_id' => 26,
                'role_id' => 1,
            ),
            28 => 
            array (
                'permission_id' => 26,
                'role_id' => 2,
            ),
            29 => 
            array (
                'permission_id' => 27,
                'role_id' => 1,
            ),
            30 => 
            array (
                'permission_id' => 27,
                'role_id' => 2,
            ),
            31 => 
            array (
                'permission_id' => 28,
                'role_id' => 1,
            ),
            32 => 
            array (
                'permission_id' => 28,
                'role_id' => 2,
            ),
            33 => 
            array (
                'permission_id' => 29,
                'role_id' => 1,
            ),
            34 => 
            array (
                'permission_id' => 29,
                'role_id' => 2,
            ),
            35 => 
            array (
                'permission_id' => 30,
                'role_id' => 1,
            ),
            36 => 
            array (
                'permission_id' => 30,
                'role_id' => 2,
            ),
            37 => 
            array (
                'permission_id' => 31,
                'role_id' => 1,
            ),
            38 => 
            array (
                'permission_id' => 31,
                'role_id' => 2,
            ),
            39 => 
            array (
                'permission_id' => 32,
                'role_id' => 1,
            ),
            40 => 
            array (
                'permission_id' => 32,
                'role_id' => 2,
            ),
            41 => 
            array (
                'permission_id' => 33,
                'role_id' => 1,
            ),
            42 => 
            array (
                'permission_id' => 33,
                'role_id' => 2,
            ),
            43 => 
            array (
                'permission_id' => 34,
                'role_id' => 1,
            ),
            44 => 
            array (
                'permission_id' => 34,
                'role_id' => 2,
            ),
            45 => 
            array (
                'permission_id' => 35,
                'role_id' => 1,
            ),
            46 => 
            array (
                'permission_id' => 35,
                'role_id' => 2,
            ),
            47 => 
            array (
                'permission_id' => 36,
                'role_id' => 1,
            ),
            48 => 
            array (
                'permission_id' => 36,
                'role_id' => 2,
            ),
            49 => 
            array (
                'permission_id' => 37,
                'role_id' => 1,
            ),
            50 => 
            array (
                'permission_id' => 37,
                'role_id' => 2,
            ),
            51 => 
            array (
                'permission_id' => 38,
                'role_id' => 1,
            ),
            52 => 
            array (
                'permission_id' => 38,
                'role_id' => 2,
            ),
            53 => 
            array (
                'permission_id' => 39,
                'role_id' => 1,
            ),
            54 => 
            array (
                'permission_id' => 39,
                'role_id' => 2,
            ),
            55 => 
            array (
                'permission_id' => 40,
                'role_id' => 1,
            ),
            56 => 
            array (
                'permission_id' => 40,
                'role_id' => 2,
            ),
            57 => 
            array (
                'permission_id' => 41,
                'role_id' => 1,
            ),
            58 => 
            array (
                'permission_id' => 41,
                'role_id' => 2,
            ),
            59 => 
            array (
                'permission_id' => 42,
                'role_id' => 1,
            ),
            60 => 
            array (
                'permission_id' => 42,
                'role_id' => 2,
            ),
            61 => 
            array (
                'permission_id' => 43,
                'role_id' => 1,
            ),
            62 => 
            array (
                'permission_id' => 43,
                'role_id' => 2,
            ),
            63 => 
            array (
                'permission_id' => 44,
                'role_id' => 1,
            ),
            64 => 
            array (
                'permission_id' => 44,
                'role_id' => 2,
            ),
            65 => 
            array (
                'permission_id' => 45,
                'role_id' => 1,
            ),
            66 => 
            array (
                'permission_id' => 45,
                'role_id' => 2,
            ),
            67 => 
            array (
                'permission_id' => 46,
                'role_id' => 1,
            ),
            68 => 
            array (
                'permission_id' => 46,
                'role_id' => 2,
            ),
            69 => 
            array (
                'permission_id' => 47,
                'role_id' => 1,
            ),
            70 => 
            array (
                'permission_id' => 47,
                'role_id' => 2,
            ),
            71 => 
            array (
                'permission_id' => 48,
                'role_id' => 1,
            ),
            72 => 
            array (
                'permission_id' => 48,
                'role_id' => 2,
            ),
            73 => 
            array (
                'permission_id' => 49,
                'role_id' => 1,
            ),
            74 => 
            array (
                'permission_id' => 49,
                'role_id' => 2,
            ),
            75 => 
            array (
                'permission_id' => 50,
                'role_id' => 1,
            ),
            76 => 
            array (
                'permission_id' => 50,
                'role_id' => 2,
            ),
            77 => 
            array (
                'permission_id' => 51,
                'role_id' => 1,
            ),
            78 => 
            array (
                'permission_id' => 51,
                'role_id' => 2,
            ),
            79 => 
            array (
                'permission_id' => 52,
                'role_id' => 1,
            ),
            80 => 
            array (
                'permission_id' => 52,
                'role_id' => 2,
            ),
            81 => 
            array (
                'permission_id' => 53,
                'role_id' => 1,
            ),
            82 => 
            array (
                'permission_id' => 53,
                'role_id' => 2,
            ),
            83 => 
            array (
                'permission_id' => 54,
                'role_id' => 1,
            ),
            84 => 
            array (
                'permission_id' => 54,
                'role_id' => 2,
            ),
            85 => 
            array (
                'permission_id' => 55,
                'role_id' => 1,
            ),
            86 => 
            array (
                'permission_id' => 55,
                'role_id' => 2,
            ),
            87 => 
            array (
                'permission_id' => 56,
                'role_id' => 1,
            ),
            88 => 
            array (
                'permission_id' => 56,
                'role_id' => 2,
            ),
            89 => 
            array (
                'permission_id' => 57,
                'role_id' => 1,
            ),
            90 => 
            array (
                'permission_id' => 57,
                'role_id' => 2,
            ),
            91 => 
            array (
                'permission_id' => 58,
                'role_id' => 1,
            ),
            92 => 
            array (
                'permission_id' => 58,
                'role_id' => 2,
            ),
            93 => 
            array (
                'permission_id' => 59,
                'role_id' => 1,
            ),
            94 => 
            array (
                'permission_id' => 59,
                'role_id' => 2,
            ),
            95 => 
            array (
                'permission_id' => 60,
                'role_id' => 1,
            ),
            96 => 
            array (
                'permission_id' => 60,
                'role_id' => 2,
            ),
            97 => 
            array (
                'permission_id' => 61,
                'role_id' => 1,
            ),
            98 => 
            array (
                'permission_id' => 61,
                'role_id' => 2,
            ),
            99 => 
            array (
                'permission_id' => 62,
                'role_id' => 1,
            ),
            100 => 
            array (
                'permission_id' => 62,
                'role_id' => 2,
            ),
            101 => 
            array (
                'permission_id' => 63,
                'role_id' => 1,
            ),
            102 => 
            array (
                'permission_id' => 63,
                'role_id' => 2,
            ),
            103 => 
            array (
                'permission_id' => 64,
                'role_id' => 1,
            ),
            104 => 
            array (
                'permission_id' => 64,
                'role_id' => 2,
            ),
            105 => 
            array (
                'permission_id' => 65,
                'role_id' => 1,
            ),
            106 => 
            array (
                'permission_id' => 65,
                'role_id' => 2,
            ),
            107 => 
            array (
                'permission_id' => 66,
                'role_id' => 1,
            ),
            108 => 
            array (
                'permission_id' => 66,
                'role_id' => 2,
            ),
            109 => 
            array (
                'permission_id' => 67,
                'role_id' => 1,
            ),
            110 => 
            array (
                'permission_id' => 67,
                'role_id' => 2,
            ),
            111 => 
            array (
                'permission_id' => 68,
                'role_id' => 1,
            ),
            112 => 
            array (
                'permission_id' => 68,
                'role_id' => 2,
            ),
            113 => 
            array (
                'permission_id' => 69,
                'role_id' => 1,
            ),
            114 => 
            array (
                'permission_id' => 69,
                'role_id' => 2,
            ),
            115 => 
            array (
                'permission_id' => 70,
                'role_id' => 1,
            ),
            116 => 
            array (
                'permission_id' => 70,
                'role_id' => 2,
            ),
        ));
        
        
    }
}