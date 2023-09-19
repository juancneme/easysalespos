<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => '1',
            'name' => 'admin',
            'display_name' => 'Administrador',
            'description' => 'Administrador General del Sistema',
            'adminlevel_id' => '174',
            'module_id' => '11',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('roles')->insert([
            'id' => '2',
            'name' => 'adcontrato',
            'display_name' => 'Administrador de Contrato',
            'description' => 'Administrador de Contrato',
            'adminlevel_id' => '174',
            'module_id' => '11',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('roles')->insert([
            'id' => '3',
            'name' => 'cajero',
            'display_name' => 'Cajero',
            'description' => 'Vendedor PDVi',
            'adminlevel_id' => '174',
            'module_id' => '17',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('roles')->insert([
            'id' => '4',
            'name' => 'vendedor',
            'display_name' => 'Vendedor',
            'description' => 'Cajero PDVi',
            'adminlevel_id' => '174',
            'module_id' => '17',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('roles')->insert([
            'id' => '5',
            'name' => 'consultas',
            'display_name' => 'Consultas',
            'description' => 'Consultas PDVi',
            'adminlevel_id' => '174',
            'module_id' => '11',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('roles')->insert([
            'id' => '6',
            'name' => 'adtienda',
            'display_name' => 'Administrador Tienda',
            'description' => 'Administrador Tienda',
            'adminlevel_id' => '174',
            'module_id' => '15',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('roles')->insert([
            'id' => '7',
            'name' => 'adtendero',
            'display_name' => 'Administrador Tendero',
            'description' => 'Administrador Tendero',
            'adminlevel_id' => '174',
            'module_id' => '17',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                
    }
}
