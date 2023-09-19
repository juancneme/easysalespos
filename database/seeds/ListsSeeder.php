<?php

use Illuminate\Database\Seeder;

class ListsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lists')->insert([
            'id' => '1',
            'name' => 'Tipo Persona',
            'code' => '',
            'idowner' => '1',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '2',
            'name' => 'Persona Natural',
            'code' => '',
            'idowner' => '1',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '3',
            'name' => 'Persona Jurídica',
            'code' => '',
            'idowner' => '1',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '4',
            'name' => 'Tipo Documento',
            'code' => '',
            'idowner' => '4',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '5',
            'name' => 'Cedula de Ciudadanía',
            'code' => 'CC',
            'idowner' => '4',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '6',
            'name' => 'Numero de Identificación Tributario',
            'code' => 'NIT',
            'idowner' => '4',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '7',
            'name' => 'Tarjeta de Identidad',
            'code' => 'TI',
            'idowner' => '4',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '8',
            'name' => 'Cedula de Extranjeria',
            'code' => 'CE',
            'idowner' => '4',
            'order' => '4',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '9',
            'name' => 'Pasaporte',
            'code' => 'PS',
            'idowner' => '4',
            'order' => '5',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '11',
            'name' => 'Estados Turno',
            'code' => '',
            'idowner' => '11',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '12',
            'name' => 'Bloqueado',
            'code' => '',
            'idowner' => '11',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '14',
            'name' => 'Abierto',
            'code' => '',
            'idowner' => '11',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '15',
            'name' => 'Cerrado',
            'code' => '',
            'idowner' => '11',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '16',
            'name' => 'Tipos de Afectación',
            'code' => '',
            'idowner' => '16',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '17',
            'name' => 'Débito',
            'code' => 'DB',
            'idowner' => '16',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '18',
            'name' => 'Crédito',
            'code' => 'CR',
            'idowner' => '16',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '19',
            'name' => 'Países',
            'code' => '',
            'idowner' => '19',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '20',
            'name' => 'Departamentos',
            'code' => '',
            'idowner' => '20',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '21',
            'name' => 'Municipios',
            'code' => '',
            'idowner' => '21',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '22',
            'name' => 'Tipos Ubicaciones',
            'code' => '',
            'idowner' => '22',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '23',
            'name' => 'Personal',
            'code' => '',
            'idowner' => '22',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '24',
            'name' => 'Laboral',
            'code' => '',
            'idowner' => '22',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '25',
            'name' => 'Otro',
            'code' => '',
            'idowner' => '22',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '26',
            'name' => 'Tipos eMail',
            'code' => '',
            'idowner' => '26',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '27',
            'name' => 'Laboral',
            'code' => '',
            'idowner' => '26',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '28',
            'name' => 'Personal',
            'code' => '',
            'idowner' => '26',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '29',
            'name' => 'Otro',
            'code' => '',
            'idowner' => '26',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '30',
            'name' => 'Tipos Telefonos',
            'code' => '',
            'idowner' => '30',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '31',
            'name' => 'Fijo',
            'code' => '',
            'idowner' => '30',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '32',
            'name' => 'Movil',
            'code' => '',
            'idowner' => '30',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '33',
            'name' => 'Personal',
            'code' => '',
            'idowner' => '30',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '34',
            'name' => 'Oficina',
            'code' => '',
            'idowner' => '30',
            'order' => '4',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '35',
            'name' => 'Otro',
            'code' => '',
            'idowner' => '30',
            'order' => '5',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '36',
            'name' => 'Tipo Contacto',
            'code' => '',
            'idowner' => '35',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '37',
            'name' => 'eMail',
            'code' => '',
            'idowner' => '35',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '38',
            'name' => 'Phone',
            'code' => '',
            'idowner' => '35',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '42',
            'name' => 'Tipo de régimen/impuestos',
            'code' => '',
            'idowner' => '42',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '43',
            'name' => 'Régimen simplificado',
            'code' => '',
            'idowner' => '42',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '44',
            'name' => 'Régimen comun',
            'code' => '',
            'idowner' => '42',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '45',
            'name' => 'Régimen no contribuyente',
            'code' => '',
            'idowner' => '42',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '46',
            'name' => 'Tipo de comercio',
            'code' => '',
            'idowner' => '46',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '47',
            'name' => 'Comercio con tendero único',
            'code' => 'DES',
            'idowner' => '46',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '48',
            'name' => 'Comercio con vendedores',
            'code' => 'DES',
            'idowner' => '46',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '49',
            'name' => 'Comercio solo vendedores',
            'code' => 'CEN',
            'idowner' => '46',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '50',
            'name' => 'Tipo Opción Menu',
            'code' => '',
            'idowner' => '50',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '51',
            'name' => 'Agrupador de Opciones',
            'code' => '',
            'idowner' => '50',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '52',
            'name' => 'Opción de Lanzador Modulo',
            'code' => '',
            'idowner' => '50',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '53',
            'name' => 'Unidades de Venta',
            'code' => '',
            'idowner' => '53',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '54',
            'name' => 'Unidad',
            'code' => '1|Un|Un|1',
            'idowner' => '53',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '55',
            'name' => 'Peso (libra)',
            'code' => '2|Lib|g|500',
            'idowner' => '53',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '101',
            'name' => 'Servicios',
            'code' => '4',
            'idowner' => '53',
            'order' => '4',
            'status' => '0',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '129',
            'name' => 'Peso (Kilo)',
            'code' => '3|Kil|g|1000',
            'idowner' => '53',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '56',
            'name' => 'Grupo Menu',
            'code' => '',
            'idowner' => '56',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '57',
            'name' => 'management',
            'code' => '',
            'idowner' => '56',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '58',
            'name' => 'admin',
            'code' => '',
            'idowner' => '56',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '59',
            'name' => 'transaction',
            'code' => '',
            'idowner' => '56',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '163',
            'name' => 'sir',
            'code' => '',
            'idowner' => '56',
            'order' => '4',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '60',
            'name' => 'Tipo Operación',
            'code' => '',
            'idowner' => '60',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '61',
            'name' => 'Venta',
            'code' => '',
            'idowner' => '60',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '62',
            'name' => 'Compra - Formulación',
            'code' => '',
            'idowner' => '60',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '63',
            'name' => 'Pagos',
            'code' => '',
            'idowner' => '60',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '64',
            'name' => 'Compra - Pedido',
            'code' => '',
            'idowner' => '60',
            'order' => '4',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '65',
            'name' => 'Compra Productos',
            'code' => '',
            'idowner' => '60',
            'order' => '5',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '66',
            'name' => 'Operación 6',
            'code' => '',
            'idowner' => '60',
            'order' => '6',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '67',
            'name' => 'Operación 7',
            'code' => '',
            'idowner' => '60',
            'order' => '7',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '68',
            'name' => 'Operación 8',
            'code' => '',
            'idowner' => '60',
            'order' => '8',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '69',
            'name' => 'Operación 9',
            'code' => '',
            'idowner' => '60',
            'order' => '9',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '70',
            'name' => 'Iconos',
            'code' => '',
            'idowner' => '70',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '71',
            'name' => 'Estado Solicitud Pedido',
            'code' => '',
            'idowner' => '71',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '72',
            'name' => 'Activo',
            'code' => '',
            'idowner' => '71',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '73',
            'name' => 'En Proceso',
            'code' => '',
            'idowner' => '71',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '74',
            'name' => 'Procesado',
            'code' => '',
            'idowner' => '71',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '75',
            'name' => 'Estado Pedido',
            'code' => '',
            'idowner' => '75',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '76',
            'name' => 'Activo',
            'code' => '',
            'idowner' => '75',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '77',
            'name' => 'En Proveedor',
            'code' => '',
            'idowner' => '75',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '78',
            'name' => 'En Alistamiento',
            'code' => '',
            'idowner' => '75',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '79',
            'name' => 'En Tránsito',
            'code' => '',
            'idowner' => '75',
            'order' => '4',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '80',
            'name' => 'Recibido',
            'code' => '',
            'idowner' => '75',
            'order' => '5',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '81',
            'name' => 'Cancelado',
            'code' => '',
            'idowner' => '75',
            'order' => '6',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '82',
            'name' => 'Sexos',
            'code' => '',
            'idowner' => '82',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '83',
            'name' => 'Femenino',
            'code' => '',
            'idowner' => '82',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '84',
            'name' => 'Masculino',
            'code' => '',
            'idowner' => '82',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '189',
            'name' => 'Otro',
            'code' => '',
            'idowner' => '82',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '85',
            'name' => 'Estado Civil',
            'code' => '',
            'idowner' => '85',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '86',
            'name' => 'Soltero(a)',
            'code' => '',
            'idowner' => '85',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '87',
            'name' => 'Casado(a)',
            'code' => '',
            'idowner' => '85',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '88',
            'name' => 'Separado(a)',
            'code' => '',
            'idowner' => '85',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '89',
            'name' => 'Divorciado(a)',
            'code' => '',
            'idowner' => '85',
            'order' => '4',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '90',
            'name' => 'Union Libre',
            'code' => '',
            'idowner' => '85',
            'order' => '6',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '179',
            'name' => 'Viudo(a)',
            'code' => '',
            'idowner' => '85',
            'order' => '5',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '91',
            'name' => 'Medios de Pago',
            'code' => '',
            'idowner' => '91',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '92',
            'name' => 'Pago Efectivo',
            'code' => '1',
            'idowner' => '91',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '93',
            'name' => 'Tarjeta Crédito',
            'code' => '1',
            'idowner' => '91',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '94',
            'name' => 'Tarjeta Débito',
            'code' => '1',
            'idowner' => '91',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '107',
            'name' => 'Fiado Electrónico',
            'code' => '1|3',
            'idowner' => '91',
            'order' => '4',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '108',
            'name' => 'Pagos Ipagos',
            'code' => '3',
            'idowner' => '91',
            'order' => '5',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '147',
            'name' => 'Contra Entrega',
            'code' => '2|3',
            'idowner' => '91',
            'order' => '6',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '148',
            'name' => 'Billetera QR',
            'code' => '2',
            'idowner' => '91',
            'order' => '7',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '149',
            'name' => 'Transfer Bancarias',
            'code' => '1|2',
            'idowner' => '91',
            'order' => '7',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '194',
            'name' => 'Credito Local',
            'code' => '2',
            'idowner' => '91',
            'order' => '7',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '95',
            'name' => 'Documentos Contrato',
            'code' => '',
            'idowner' => '95',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '96',
            'name' => 'Cédula de Ciudadanía',
            'code' => 'CC',
            'idowner' => '95',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '97',
            'name' => 'RUT',
            'code' => 'RUT',
            'idowner' => '95',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '98',
            'name' => 'CÁMARA Y COMERCIO',
            'code' => 'CC',
            'idowner' => '95',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '99',
            'name' => 'CERTIFICACIÓN BANCARIA',
            'code' => 'CB',
            'idowner' => '95',
            'order' => '4',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '100',
            'name' => 'OTROS DOCUMENTOS',
            'code' => 'OT',
            'idowner' => '95',
            'order' => '5',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '102',
            'name' => 'TIPOS CATALOGOS',
            'code' => '',
            'idowner' => '102',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '103',
            'name' => 'MASTER PRODUCTOS',
            'code' => '',
            'idowner' => '102',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '104',
            'name' => 'MASTER SERVICIOS',
            'code' => '',
            'idowner' => '102',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '105',
            'name' => 'TIENDAS',
            'code' => '',
            'idowner' => '102',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '106',
            'name' => 'SEMILLA',
            'code' => '',
            'idowner' => '102',
            'order' => '4',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '109',
            'name' => 'SERVICIOS EXTERNOS',
            'code' => '',
            'idowner' => '109',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '110',
            'name' => 'Multimarca',
            'code' => '',
            'idowner' => '109',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '111',
            'name' => 'Mercado Pago',
            'code' => '',
            'idowner' => '109',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '112',
            'name' => 'Siste Credito',
            'code' => '',
            'idowner' => '109',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '113',
            'name' => 'Mensajeros',
            'code' => '',
            'idowner' => '109',
            'order' => '4',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '114',
            'name' => 'STATUS PAID',
            'code' => '',
            'idowner' => '114',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '115',
            'name' => 'created',
            'code' => '',
            'idowner' => '114',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '116',
            'name' => 'in_process',
            'code' => '',
            'idowner' => '114',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '117',
            'name' => 'approved',
            'code' => '',
            'idowner' => '114',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '118',
            'name' => 'rejected',
            'code' => '',
            'idowner' => '114',
            'order' => '4',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '119',
            'name' => 'Tipo de Vehículo',
            'code' => '',
            'idowner' => '119',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '120',
            'name' => 'Caminando',
            'code' => '1',
            'idowner' => '119',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '121',
            'name' => 'Moto',
            'code' => '3',
            'idowner' => '119',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '122',
            'name' => 'Vehículo Partícular',
            'code' => '3',
            'idowner' => '119',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '123',
            'name' => 'Bicicleta',
            'code' => '2',
            'idowner' => '119',
            'order' => '4',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '124',
            'name' => 'Mensajería',
            'code' => '',
            'idowner' => '124',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '125',
            'name' => 'Mensajeros Comercio',
            'code' => '',
            'idowner' => '124',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '126',
            'name' => 'Mensajeros Urbanos',
            'code' => '',
            'idowner' => '124',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '130',
            'name' => 'Estado domicilio',
            'code' => '',
            'idowner' => '130',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '131',
            'name' => 'En alistamiento',
            'code' => '',
            'idowner' => '130',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '132',
            'name' => 'Preparado',
            'code' => '',
            'idowner' => '130',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '133',
            'name' => 'Asignado',
            'code' => '',
            'idowner' => '130',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '134',
            'name' => 'En tránsito',
            'code' => '',
            'idowner' => '130',
            'order' => '4',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '135',
            'name' => 'Entregado',
            'code' => '',
            'idowner' => '130',
            'order' => '5',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '136',
            'name' => 'Rechazado',
            'code' => '',
            'idowner' => '130',
            'order' => '6',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '140',
            'name' => 'Tipos Contratos',
            'code' => '',
            'idowner' => '140',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '141',
            'name' => 'Administracion PDV Plataforma',
            'code' => '',
            'idowner' => '140',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '142',
            'name' => 'Operación PDV Masivo Centralizado',
            'code' => '',
            'idowner' => '140',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '143',
            'name' => 'Operación PDV Masivo Descentralizado',
            'code' => '',
            'idowner' => '140',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '144',
            'name' => 'Tipos Ventas',
            'code' => '',
            'idowner' => '144',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '145',
            'name' => 'Físico',
            'code' => 'f',
            'idowner' => '144',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '146',
            'name' => 'Virtual',
            'code' => 'v',
            'idowner' => '144',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '150',
            'name' => 'Denominaciones',
            'code' => '',
            'idowner' => '150',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '151',
            'name' => 'Billete 100 mil',
            'code' => '100000',
            'idowner' => '150',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '152',
            'name' => 'Billete de 50 mil',
            'code' => '50000',
            'idowner' => '150',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '153',
            'name' => 'Billete de 20 mil',
            'code' => '20000',
            'idowner' => '150',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '154',
            'name' => 'Billete de 10 mil',
            'code' => '10000',
            'idowner' => '150',
            'order' => '4',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '155',
            'name' => 'Billete de 5 mil',
            'code' => '5000',
            'idowner' => '150',
            'order' => '5',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '156',
            'name' => 'Billete de 2 mil',
            'code' => '2000',
            'idowner' => '150',
            'order' => '6',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '157',
            'name' => 'Billete de mil',
            'code' => '1000',
            'idowner' => '150',
            'order' => '7',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '158',
            'name' => 'Moneda de mil',
            'code' => '1000',
            'idowner' => '150',
            'order' => '8',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '159',
            'name' => 'Moneda de 500',
            'code' => '500',
            'idowner' => '150',
            'order' => '9',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '160',
            'name' => 'Moneda de 200',
            'code' => '200',
            'idowner' => '150',
            'order' => '10',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '161',
            'name' => 'Moneda de 100',
            'code' => '100',
            'idowner' => '150',
            'order' => '11',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '162',
            'name' => 'Moneda de 50',
            'code' => '50',
            'idowner' => '150',
            'order' => '12',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '170',
            'name' => 'Niveles Administrativos',
            'code' => '',
            'idowner' => '170',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '171',
            'name' => 'Dirección',
            'code' => '',
            'idowner' => '170',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '172',
            'name' => 'Administración',
            'code' => '',
            'idowner' => '170',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '173',
            'name' => 'Control',
            'code' => '',
            'idowner' => '170',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '174',
            'name' => 'Operación',
            'code' => '',
            'idowner' => '170',
            'order' => '4',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '175',
            'name' => 'Tipos Productos Ventas',
            'code' => '',
            'idowner' => '175',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '176',
            'name' => 'Combo',
            'code' => '',
            'idowner' => '175',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '177',
            'name' => 'Promoción',
            'code' => '',
            'idowner' => '175',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '178',
            'name' => 'Producto',
            'code' => '',
            'idowner' => '175',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '180',
            'name' => 'Areas Funcionales',
            'code' => '',
            'idowner' => '180',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '181',
            'name' => 'Compras',
            'code' => '',
            'idowner' => '180',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '182',
            'name' => 'Ventas',
            'code' => '',
            'idowner' => '180',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '183',
            'name' => 'Inventarios',
            'code' => '',
            'idowner' => '180',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '184',
            'name' => 'Hechos Monetarios',
            'code' => '',
            'idowner' => '180',
            'order' => '4',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '185',
            'name' => 'Contabilidad y Finanzas',
            'code' => '',
            'idowner' => '180',
            'order' => '5',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '186',
            'name' => 'Recursos Humanos',
            'code' => '',
            'idowner' => '180',
            'order' => '6',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '187',
            'name' => 'Producción',
            'code' => '',
            'idowner' => '180',
            'order' => '7',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '188',
            'name' => 'Planeación',
            'code' => '',
            'idowner' => '180',
            'order' => '8',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '190',
            'name' => 'Estados de ventas',
            'code' => '',
            'idowner' => '190',
            'order' => '0',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '191',
            'name' => 'En Espera',
            'code' => '',
            'idowner' => '190',
            'order' => '1',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '192',
            'name' => 'Efectuada',
            'code' => '',
            'idowner' => '190',
            'order' => '2',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '193',
            'name' => 'Rechazada',
            'code' => '',
            'idowner' => '190',
            'order' => '3',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        DB::table('lists')->insert([
            'id' => '195',
            'name' => 'En Proceso',
            'code' => ' ',
            'idowner' => '190',
            'order' => '4',
            'status' => '1',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
               
    }
}