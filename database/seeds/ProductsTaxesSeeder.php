<?php

use Illuminate\Database\Seeder;

class ProductsTaxesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products_taxes')->insert([
            'id' => '1',
            'name' => 'IVA 19%',
            'value' => '19.0',
            'status' => '1',
        ]);
        DB::table('products_taxes')->insert([
            'id' => '2',
            'name' => 'IVA 14%',
            'value' => '14.0',
            'status' => '1',
        ]);
        DB::table('products_taxes')->insert([
            'id' => '3',
            'name' => 'IVA 5%',
            'value' => '0',
            'status' => '1',
        ]);
        DB::table('products_taxes')->insert([
            'id' => '4',
            'name' => 'SIN IVA',
            'value' => '0',
            'status' => '1',
        ]);
    }
}
