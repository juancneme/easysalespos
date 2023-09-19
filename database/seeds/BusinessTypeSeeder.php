<?php

use Illuminate\Database\Seeder;

class BusinessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_type')->insert([
            'id' => 1,
            'name' => 'Ferretería',
            'catalog_id' => '1004',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
       ]);
       
       DB::table('business_type')->insert([
            'id' => 2,
            'name' => 'Mascotas',
            'catalog_id' => '1006',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
       ]);
       
       DB::table('business_type')->insert([
            'id' => 3,
            'name' => 'Panadería',
            'catalog_id' => '1005',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
       ]);
       
       DB::table('business_type')->insert([
            'id' => 4,
            'name' => 'Papelería',
            'catalog_id' => '1008',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
       ]);
       
       DB::table('business_type')->insert([
            'id' => 5,
            'name' => 'Salsamentaría',
            'catalog_id' => '1003',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
       ]);
       
       DB::table('business_type')->insert([
            'id' => 6,
            'name' => 'Tecnología',
            'catalog_id' => '1007',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
       ]);
       
       DB::table('business_type')->insert([
            'id' => 7,
            'name' => 'Tienda de Barrio (Abarrotes)',
            'catalog_id' => '1001',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
       ]);
       
    }
}
