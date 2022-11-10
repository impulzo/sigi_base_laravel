<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'Support Technical',
                'email' => 'admin@impulzo.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$OcioynGhUhKRn8bpcv3oFe7IpmH3l6eRmGb5vgN.0WD.zg66rtAk2',
                'remember_token' => 'Hos5s7nunJyGCkK1EkvfBDOV2ledn6na1Z3WmfQOuHbPwVQ6P62PJ3XSFDSR',
                'settings' => NULL,
                'created_at' => '2022-11-09 13:21:00',
                'updated_at' => '2022-11-09 13:21:00',
            ),
        ));
        
        
    }
}