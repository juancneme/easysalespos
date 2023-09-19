<?php

use Illuminate\Database\Seeder;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('modules')->insert([
               'id' => 1,
               'name' => 'Configuración',
               'group_name' => '',
               'page_name' => '',
               'icon_id' => 4142,
               'typelabel_id' => 51,
               'idowner' => 0,
               'order' => 1,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 2,
               'name' => 'Listas',
               'group_name' => 'management',
               'page_name' => 'lists',
               'icon_id' => 4413,
               'typelabel_id' => 52,
               'idowner' => 1,
               'order' => 1,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 3,
               'name' => 'Módulos',
               'group_name' => 'management',
               'page_name' => 'modules',
               'icon_id' => 4510,
               'typelabel_id' => 52,
               'idowner' => 1,
               'order' => 2,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 4,
               'name' => 'Permisos Restringidos',
               'group_name' => 'management',
               'page_name' => 'permissions',
               'icon_id' => 4418,
               'typelabel_id' => 52,
               'idowner' => 1,
               'order' => 3,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 5,
               'name' => 'Roles',
               'group_name' => 'management',
               'page_name' => 'roles',
               'icon_id' => 4726,
               'typelabel_id' => 52,
               'idowner' => 1,
               'order' => 4,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 6,
               'name' => 'Usuarios',
               'group_name' => 'management',
               'page_name' => 'users',
               'icon_id' => 4728,
               'typelabel_id' => 52,
               'idowner' => 1,
               'order' => 5,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 7,
               'name' => 'Personas',
               'group_name' => 'management',
               'page_name' => 'persons',
               'icon_id' => 4720,
               'typelabel_id' => 52,
               'idowner' => 1,
               'order' => 6,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 8,
               'name' => 'Fabricantes',
               'group_name' => 'management',
               'page_name' => 'manufacturers',
               'icon_id' => 4376,
               'typelabel_id' => 52,
               'idowner' => 1,
               'order' => 7,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 9,
               'name' => 'Productos',
               'group_name' => 'management',
               'page_name' => 'products',
               'icon_id' => 4212,
               'typelabel_id' => 52,
               'idowner' => 1,
               'order' => 8,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 10,
               'name' => 'Administración',
               'group_name' => '',
               'page_name' => '',
               'icon_id' => 4171,
               'typelabel_id' => 51,
               'idowner' => 0,
               'order' => 2,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 11,
               'name' => 'Contratos',
               'group_name' => 'management',
               'page_name' => 'contracts',
               'icon_id' => 4344,
               'typelabel_id' => 52,
               'idowner' => 10,
               'order' => 1,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 12,
               'name' => 'Comercios',
               'group_name' => 'management',
               'page_name' => 'companies',
               'icon_id' => 4575,
               'typelabel_id' => 52,
               'idowner' => 10,
               'order' => 2,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 13,
               'name' => 'Categorias',
               'group_name' => 'management',
               'page_name' => 'categories',
               'icon_id' => 4276,
               'typelabel_id' => 52,
               'idowner' => 10,
               'order' => 3,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 14,
               'name' => 'Distribuidores',
               'group_name' => 'management',
               'page_name' => 'suppliers',
               'icon_id' => 4698,
               'typelabel_id' => 52,
               'idowner' => 10,
               'order' => 4,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 15,
               'name' => 'Catálogos',
               'group_name' => 'management',
               'page_name' => 'catalogs',
               'icon_id' => 4655,
               'typelabel_id' => 52,
               'idowner' => 10,
               'order' => 5,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 16,
               'name' => 'Operaciones',
               'group_name' => '',
               'page_name' => '',
               'icon_id' => 4041,
               'typelabel_id' => 51,
               'idowner' => 0,
               'order' => 3,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 17,
               'name' => 'PDVi - Ventas',
               'group_name' => 'management',
               'page_name' => 'pdvi',
               'icon_id' => 4576,
               'typelabel_id' => 52,
               'idowner' => 16,
               'order' => 1,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 18,
               'name' => 'Ingreso de Mercancia',
               'group_name' => 'management',
               'page_name' => 'shopping',
               'icon_id' => 4457,
               'typelabel_id' => 52,
               'idowner' => 16,
               'order' => 2,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 19,
               'name' => 'Pedidos - Formulacion',
               'group_name' => 'management',
               'page_name' => 'formulationorders',
               'icon_id' => 4206,
               'typelabel_id' => 52,
               'idowner' => 16,
               'order' => 3,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 20,
               'name' => 'Pedidos - Seleccion',
               'group_name' => 'management',
               'page_name' => 'makeorder',
               'icon_id' => 4086,
               'typelabel_id' => 52,
               'idowner' => 16,
               'order' => 4,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 21,
               'name' => 'Pedidos - Confirmacion',
               'group_name' => 'management',
               'page_name' => 'orderssuppliers',
               'icon_id' => 4086,
               'typelabel_id' => 52,
               'idowner' => 16,
               'order' => 5,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 22,
               'name' => 'Entra/Salida Efectivo',
               'group_name' => 'management',
               'page_name' => 'cashinputoutput',
               'icon_id' => 4231,
               'typelabel_id' => 52,
               'idowner' => 16,
               'order' => 6,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 28,
               'name' => 'Recaudos Fiado Electrónico',
               'group_name' => 'management',
               'page_name' => 'sistecreditpay',
               'icon_id' => 4719,
               'typelabel_id' => 52,
               'idowner' => 16,
               'order' => 7,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 29,
               'name' => 'Domicilios',
               'group_name' => 'management',
               'page_name' => 'deliveries',
               'icon_id' => 4431,
               'typelabel_id' => 52,
               'idowner' => 16,
               'order' => 8,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 31,
               'name' => 'Inventario inicial',
               'group_name' => 'management',
               'page_name' => 'inventory',
               'icon_id' => 4026,
               'typelabel_id' => 52,
               'idowner' => 16,
               'order' => 9,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 32,
               'name' => 'Control de inventario',
               'group_name' => 'management',
               'page_name' => 'maintenance',
               'icon_id' => 4443,
               'typelabel_id' => 52,
               'idowner' => 16,
               'order' => 10,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 33,
               'name' => 'Cuadre de caja',
               'group_name' => 'management',
               'page_name' => 'balancesheet',
               'icon_id' => 4138,
               'typelabel_id' => 52,
               'idowner' => 16,
               'order' => 12,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 35,
               'name' => 'Bloquear Caja',
               'group_name' => 'management',
               'page_name' => 'balancesheet/closeTurn',
               'icon_id' => 4418,
               'typelabel_id' => 52,
               'idowner' => 16,
               'order' => 11,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 23,
               'name' => 'Servicios',
               'group_name' => '',
               'page_name' => '',
               'icon_id' => 4593,
               'typelabel_id' => 51,
               'idowner' => 16,
               'order' => 13,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 24,
               'name' => 'Servicios Multimarca',
               'group_name' => 'management',
               'page_name' => 'service',
               'icon_id' => 4046,
               'typelabel_id' => 52,
               'idowner' => 23,
               'order' => 1,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 25,
               'name' => 'Admin de Servicios',
               'group_name' => 'management',
               'page_name' => 'servicecredentials',
               'icon_id' => 4515,
               'typelabel_id' => 52,
               'idowner' => 10,
               'order' => 6,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 26,
               'name' => 'Promociones',
               'group_name' => 'management',
               'page_name' => 'promotion',
               'icon_id' => 4135,
               'typelabel_id' => 52,
               'idowner' => 10,
               'order' => 7,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 27,
               'name' => 'Combos',
               'group_name' => 'management',
               'page_name' => 'combination',
               'icon_id' => 4574,
               'typelabel_id' => 52,
               'idowner' => 10,
               'order' => 8,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 30,
               'name' => 'Mensajeros',
               'group_name' => 'management',
               'page_name' => 'couriers',
               'icon_id' => 4461,
               'typelabel_id' => 52,
               'idowner' => 10,
               'order' => 9,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 34,
               'name' => 'Super pagos',
               'group_name' => 'management',
               'page_name' => 'superpagos',
               'icon_id' => 4375,
               'typelabel_id' => 52,
               'idowner' => 10,
               'order' => 10,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 36,
               'name' => 'Catalogos Tipos de Negocio',
               'group_name' => 'management',
               'page_name' => 'typebusiness',
               'icon_id' => 4457,
               'typelabel_id' => 52,
               'idowner' => 10,
               'order' => 11,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 38,
               'name' => 'Reportes & Consultas',
               'group_name' => '',
               'page_name' => '',
               'icon_id' => 4407,
               'typelabel_id' => 51,
               'idowner' => 0,
               'order' => 4,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 39,
               'name' => 'Consulta Ventas',
               'group_name' => 'management',
               'page_name' => 'sales',
               'icon_id' => 4055,
               'typelabel_id' => 52,
               'idowner' => 38,
               'order' => 1,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 40,
               'name' => 'Consulta Caja Efectivo',
               'group_name' => 'management',
               'page_name' => 'balance',
               'icon_id' => 4719,
               'typelabel_id' => 52,
               'idowner' => 38,
               'order' => 2,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 41,
               'name' => 'Gestion y Control',
               'group_name' => '',
               'page_name' => '',
               'icon_id' => 4496,
               'typelabel_id' => 51,
               'idowner' => 38,
               'order' => 3,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 42,
               'name' => 'SIR',
               'group_name' => 'sir',
               'page_name' => 'sir',
               'icon_id' => 4496,
               'typelabel_id' => 52,
               'idowner' => 41,
               'order' => 1,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
          
          DB::table('modules')->insert([
               'id' => 43,
               'name' => 'Gestion (NEW)',
               'group_name' => 'management',
               'page_name' => 'gestion',
               'icon_id' => 4273,
               'typelabel_id' => 52,
               'idowner' => 41,
               'order' => 2,
               'status' => 1,
               'created_at' => '2021-07-01 00:00:00',
               'updated_at' => '2021-07-01 00:00:00',
          ]);
                         
     }
}
