<?php

use Illuminate\Database\Seeder;

class ConfigurationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configurations')->insert([
            'name' => 'Paginacion',
            'description' => 'Número de registros por página',
            'key' => 'pagination',
            'value' => '50',
            'created_at' => \Carbon\Carbon::now(),
            'created_by' => 1
        ]);
        
        DB::table('configurations')->insert([
            'name' => 'Correo de salida',
            'description' => 'Correo de salida',
            'key' => 'emailFrom',
            'value' => 'info@gh2group.com.co',
            'created_at' => \Carbon\Carbon::now(),
            'created_by' => 1
        ]);
        
        DB::table('configurations')->insert([
            'name' => 'Nombre del emisor del correo',
            'description' => 'Nombre del emisor del correo',
            'key' => 'emailFromName',
            'value' => 'GestionArte',
            'created_at' => \Carbon\Carbon::now(),
            'created_by' => 1
        ]);
    }
}
