<?php

use Illuminate\Database\Seeder;

class SuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('suppliers')->insert([
            'id' => '1',
            'person_id' => '1',
            'name' => 'SIN PROVEEDOR ASIGNADO',
            'shortname' => 'SPA',
            'image' => 'supl000000.png',
            'order' => '1',
            'status' => '1',
            'contract_id' => '1',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        // DB::table('suppliers')->insert([
        //     'id' => '2',
        //     'person_id' => '18',
        //     'name' => 'Distribuidoras Unidas de Colombia',
        //     'shortname' => 'Dist.Unidos',
        //     'image' => 'supl000000.png',
        //     'order' => '2',
        //     'status' => '1',
        //     'contract_id' => '1',
        //     'created_at' => date('Y-m-d H:m:s'),
        //     'updated_at' => date('Y-m-d H:m:s')
        // ]);

        // DB::table('suppliers')->insert([
        //     'id' => '3',
        //     'person_id' => '18',
        //     'name' => 'Distribuidor 3',
        //     'shortname' => 'Distribuidor 3',
        //     'image' => 'supl000000.png',
        //     'order' => '3',
        //     'status' => '1',
        //     'contract_id' => '1',
        //     'created_at' => date('Y-m-d H:m:s'),
        //     'updated_at' => date('Y-m-d H:m:s')
        // ]);

        // DB::table('suppliers')->insert([
        //     'id' => '4',
        //     'person_id' => '18',
        //     'name' => 'Distribuidor 4',
        //     'shortname' => 'Distribuidor 4',
        //     'image' => 'supl000000.png',
        //     'order' => '4',
        //     'status' => '1',
        //     'contract_id' => '1',
        //     'created_at' => date('Y-m-d H:m:s'),
        //     'updated_at' => date('Y-m-d H:m:s')
        // ]);

        // DB::table('suppliers')->insert([
        //     'id' => '5',
        //     'person_id' => '18',
        //     'name' => 'Distribuidor 5',
        //     'shortname' => 'Distribuidor 5',
        //     'image' => 'supl000000.png',
        //     'order' => '5',
        //     'status' => '1',
        //     'contract_id' => '1',
        //     'created_at' => date('Y-m-d H:m:s'),
        //     'updated_at' => date('Y-m-d H:m:s')
        // ]);

        // DB::table('suppliers')->insert([
        //     'id' => '6',
        //     'person_id' => '18',
        //     'name' => 'Distribuidor 6',
        //     'shortname' => 'Distribuidor 6',
        //     'image' => 'supl000000.png',
        //     'order' => '6',
        //     'status' => '1',
        //     'contract_id' => '1',
        //     'created_at' => date('Y-m-d H:m:s'),
        //     'updated_at' => date('Y-m-d H:m:s')
        // ]);

        // DB::table('suppliers')->insert([
        //     'id' => '7',
        //     'person_id' => '18',
        //     'name' => 'Distribuidor 7',
        //     'shortname' => 'Distribuidor 7',
        //     'image' => 'supl000000.png',
        //     'order' => '7',
        //     'status' => '1',
        //     'contract_id' => '1',
        //     'created_at' => date('Y-m-d H:m:s'),
        //     'updated_at' => date('Y-m-d H:m:s')
        // ]);

        // DB::table('suppliers')->insert([
        //     'id' => '8',
        //     'person_id' => '18',
        //     'name' => 'Distribuidor 8',
        //     'shortname' => 'Distribuidor 8',
        //     'image' => 'supl000000.png',
        //     'order' => '8',
        //     'status' => '1',
        //     'contract_id' => '1',
        //     'created_at' => date('Y-m-d H:m:s'),
        //     'updated_at' => date('Y-m-d H:m:s')
        // ]);

        // DB::table('suppliers')->insert([
        //     'id' => '9',
        //     'person_id' => '18',
        //     'name' => 'Distribuidor 9',
        //     'shortname' => 'Distribuidor 9',
        //     'image' => 'supl000000.png',
        //     'order' => '9',
        //     'status' => '1',
        //     'contract_id' => '1',
        //     'created_at' => date('Y-m-d H:m:s'),
        //     'updated_at' => date('Y-m-d H:m:s')
        // ]);

    }
}
