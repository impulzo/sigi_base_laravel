<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('states')->delete();
        
        \DB::table('states')->insert(array (
            0 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 1,
                'name' => 'Aguascalientes',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            1 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 2,
                'name' => 'Baja California Sur',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            2 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 3,
                'name' => 'Baja California',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            3 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 4,
                'name' => 'Campeche',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            4 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 5,
                'name' => 'Chiapas',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            5 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 6,
                'name' => 'Chihuahua',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            6 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 7,
                'name' => 'Ciudad de México',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            7 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 8,
                'name' => 'Coahuila de Zaragoza',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            8 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 9,
                'name' => 'Colima',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            9 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 10,
                'name' => 'Durango',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            10 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 11,
                'name' => 'Guanajuato',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            11 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 12,
                'name' => 'Guerrero',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            12 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 13,
                'name' => 'Hidalgo',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            13 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 14,
                'name' => 'Jalisco',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            14 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 15,
                'name' => 'México',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            15 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 16,
                'name' => 'Michoacán de Ocampo',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            16 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 17,
                'name' => 'Morelos',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            17 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 18,
                'name' => 'Nayarit',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            18 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 19,
                'name' => 'Nuevo León',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            19 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 20,
                'name' => 'Oaxaca',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            20 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 21,
                'name' => 'Puebla',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            21 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 22,
                'name' => 'Querétaro',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            22 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 23,
                'name' => 'Quintana Roo',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            23 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 24,
                'name' => 'San Luis Potosí',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            24 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 25,
                'name' => 'Sinaloa',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            25 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 26,
                'name' => 'Sonora',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            26 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 27,
                'name' => 'Tabasco',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            27 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 28,
                'name' => 'Tamaulipas',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            28 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 29,
                'name' => 'Tlaxcala',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            29 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 30,
                'name' => 'Veracruz de Ignacio de la Llave',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            30 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 31,
                'name' => 'Yucatán',
                'updated_at' => '2023-10-02 22:20:17',
            ),
            31 => 
            array (
                'country_id' => 1,
                'created_at' => '2023-10-02 22:20:17',
                'deleted_at' => NULL,
                'id' => 32,
                'name' => 'Zacatecas',
                'updated_at' => '2023-10-02 22:20:17',
            ),
        ));
        
        
    }
}