<?php

use Illuminate\Database\Seeder;

class ContractsPersonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::insert("insert into contracts_persons (contract_id, person_id, type_user)
            Select contract_id, person_id, 'user' as type_user from users
            union
            Select contract_id, person_id, 'comp' as type_user from companies
            union
            Select id as contract_is, person_id, 'cont' as type_user from contracts"
        );
        
    }
}
