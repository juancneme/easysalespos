<?php

use Illuminate\Database\Seeder;

class ContractsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contracts')->insert([
            'id' => '1',
            'numbercontract' => '20200101',
            'person_id' => '1',
            'typecontract_id' => '142',
            'taxregime_id' => '43',
            'startdate' => '2018/01/01',
            'enddate' => '2019/12/31',
            'quantitystores' => '1',
            'quantityusers' => '2',
            'keyfisico' => 'TERJUGVXcjhmQWMvSlR1RWNCTUVqQT09',
            'keyvirtual' => 'ck9wK2JHd2s2ejlVQ0ZicWFEZFNndz09',
            'status' => '1',
        ]);
        
        // DB::table('contracts')->insert([
        //     'id' => '2',
        //     'numbercontract' => '5001001',
        //     'person_id' => '2',
        //     'typecontract_id' => '40',
        //     'taxregime_id' => '43',
        //     'startdate' => '2018/01/01',
        //     'enddate' => '2019/12/31',
        //     'quantitystores' => '2',
        //     'quantityusers' => '3',
        //     'status' => '1',
        // ]);
        
        // DB::table('contracts')->insert([
        //     'id' => '3',
        //     'numbercontract' => '5001002',
        //     'person_id' => '3',
        //     'typecontract_id' => '40',
        //     'taxregime_id' => '43',
        //     'startdate' => '2018/01/01',
        //     'enddate' => '2019/12/31',
        //     'quantitystores' => '1',
        //     'quantityusers' => '2',
        //     'status' => '1',
        // ]);

        // DB::table('contracts')->insert([
        //     'id' => '4',
        //     'numbercontract' => '5001003',
        //     'person_id' => '4',
        //     'typecontract_id' => '40',
        //     'taxregime_id' => '43',
        //     'startdate' => '2018/01/01',
        //     'enddate' => '2019/12/31',
        //     'quantitystores' => '1',
        //     'quantityusers' => '2',
        //     'status' => '1',
        // ]);
    }
}
