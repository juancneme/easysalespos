<?php

use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->insert([
            'role_id' => '5',   // CONSULTAS
            'permission_id' => '2',   // edit
        ]);
                
                        
        DB::table('permission_role')->insert([
            'role_id' => '5',   // CONSULTAS
            'permission_id' => '3',   // add
        ]);
                
                        
        DB::table('permission_role')->insert([
            'role_id' => '5',   // CONSULTAS
            'permission_id' => '4',   // delete
        ]);
                
                                
                                
            
        DB::table('permission_role')->insert([
            'role_id' => '2',   // ADCONTRATO
            'permission_id' => '7',   // add-contracts
        ]);
                            
            
        DB::table('permission_role')->insert([
            'role_id' => '2',   // ADCONTRATO
            'permission_id' => '8',   // edit-contracts
        ]);
                            
            
        DB::table('permission_role')->insert([
            'role_id' => '2',   // ADCONTRATO
            'permission_id' => '9',   // delete-contracts
        ]);
                            
                            
        DB::table('permission_role')->insert([
            'role_id' => '6',   // ADTIENDA
            'permission_id' => '10',   // add-companies
        ]);
            
                            
        DB::table('permission_role')->insert([
            'role_id' => '6',   // ADTIENDA
            'permission_id' => '11',   // delete-companies
        ]);
            
            
        DB::table('permission_role')->insert([
            'role_id' => '2',   // ADCONTRATO
            'permission_id' => '12',   // delete-sales
        ]);
                        
        DB::table('permission_role')->insert([
            'role_id' => '6',   // ADTIENDA
            'permission_id' => '12',   // delete-sales
        ]);
                                                
    }
}
