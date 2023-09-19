<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'id' => '1',
            'name' => 'view',
            'display_name' => 'Ver',
            'description' => 'Ver',
            'public' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('permissions')->insert([
            'id' => '2',
            'name' => 'edit',
            'display_name' => 'Editar',
            'description' => 'Editar',
            'public' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('permissions')->insert([
            'id' => '3',
            'name' => 'add',
            'display_name' => 'Adicionar',
            'description' => 'Adicionar',
            'public' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('permissions')->insert([
            'id' => '4',
            'name' => 'delete',
            'display_name' => 'Borrar',
            'description' => 'Borrar',
            'public' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('permissions')->insert([
            'id' => '5',
            'name' => 'search',
            'display_name' => 'Buscar',
            'description' => 'Buscar',
            'public' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('permissions')->insert([
            'id' => '6',
            'name' => 'access',
            'display_name' => 'Accesar',
            'description' => 'Accesar',
            'public' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('permissions')->insert([
            'id' => '7',
            'name' => 'add-contracts',
            'display_name' => 'Adicionar Contrato',
            'description' => 'Adicionar Contrato',
            'public' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('permissions')->insert([
            'id' => '8',
            'name' => 'edit-contracts',
            'display_name' => 'Editar Contrato',
            'description' => 'Editar Contrato',
            'public' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('permissions')->insert([
            'id' => '9',
            'name' => 'delete-contracts',
            'display_name' => 'Borrar Contrato',
            'description' => 'Borrar Contrato',
            'public' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('permissions')->insert([
            'id' => '10',
            'name' => 'add-companies',
            'display_name' => 'Adicionar Comercio',
            'description' => 'Adicionar Comercio',
            'public' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('permissions')->insert([
            'id' => '11',
            'name' => 'delete-companies',
            'display_name' => 'Borrar Comercios',
            'description' => 'Borrar comercios',
            'public' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('permissions')->insert([
            'id' => '12',
            'name' => 'delete-sales',
            'display_name' => 'Borrar Ventas',
            'description' => 'Borrar Ventas',
            'public' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                                                
    }
}
