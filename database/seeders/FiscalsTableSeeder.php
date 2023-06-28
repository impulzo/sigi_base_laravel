<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FiscalsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('fiscals')->delete();
        
        \DB::table('fiscals')->insert(array (
            0 => 
            array (
                'certificate' => NULL,
                'created_at' => NULL,
                'fiscal_regime' => NULL,
                'id' => 1,
                'name' => NULL,
                'user' => "test.invoice@gmail.com",
                'password' => "12345678a",
                'private_key' => NULL,
                'private_key_password' => NULL,
                'rfc' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}