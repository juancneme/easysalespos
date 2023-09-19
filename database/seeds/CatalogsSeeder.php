<?php

use Illuminate\Database\Seeder;

class CatalogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catalogs')->insert([ 
            'id' => '1000',
            'contract_id' => '1',
            'name' => 'CATALOGO MASTER',
            'description' => 'Catalogo Generico de Productos',
            'typecatalog_id' => '103',
            'type' => '1',
            'status' => '',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        // DB::table('catalogs')->insert([ 
        //     'id' => '2000',
        //     'contract_id' => '2',
        //     'name' => 'CAT001',
        //     'description' => 'Catalogo de ventas 001',
        //     'typecatalog_id' => '105',
        //     'status' => '',
        //     'created_at' => date('Y-m-d H:m:s'),
        //     'updated_at' => date('Y-m-d H:m:s')
        // ]);

        // DB::table('catalogs')->insert([ 
        //     'id' => '3000',
        //     'contract_id' => '3',
        //     'name' => 'MICATALOGO',
        //     'description' => 'Catalogo de productos MiTienda',
        //     'typecatalog_id' => '105',
        //     'status' => '',
        //     'created_at' => date('Y-m-d H:m:s'),
        //     'updated_at' => date('Y-m-d H:m:s')
        // ]);

        // DB::table('catalogs')->insert([ 
        //     'id' => '4000',
        //     'contract_id' => '4',
        //     'name' => 'MICATALOGO',
        //     'description' => 'Catalogo de productos Mi Ranchito',
        //     'typecatalog_id' => '105',
        //     'status' => '',
        //     'created_at' => date('Y-m-d H:m:s'),
        //     'updated_at' => date('Y-m-d H:m:s')
        // ]);

    }
}
