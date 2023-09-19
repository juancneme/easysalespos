<?php

use Illuminate\Database\Seeder;

class RoleModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_module')->insert([
            'role_id' => '1',   // ADMIN
            'module_id' => '1',   // Configuración
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '2',   // ADCONTRATO
            'module_id' => '1',   // Configuración
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                        
        DB::table('role_module')->insert([
            'role_id' => '6',   // ADTIENDA
            'module_id' => '1',   // Configuración
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        
        DB::table('role_module')->insert([
            'role_id' => '1',   // ADMIN
            'module_id' => '2',   // Listas
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                                
        
        DB::table('role_module')->insert([
            'role_id' => '1',   // ADMIN
            'module_id' => '3',   // Módulos
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                                
        
        DB::table('role_module')->insert([
            'role_id' => '1',   // ADMIN
            'module_id' => '4',   // Permisos Restringidos
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                                
        
        DB::table('role_module')->insert([
            'role_id' => '1',   // ADMIN
            'module_id' => '5',   // Roles
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                                
        
        DB::table('role_module')->insert([
            'role_id' => '1',   // ADMIN
            'module_id' => '6',   // Usuarios
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '2',   // ADCONTRATO
            'module_id' => '6',   // Usuarios
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                        
        DB::table('role_module')->insert([
            'role_id' => '6',   // ADTIENDA
            'module_id' => '6',   // Usuarios
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        
        DB::table('role_module')->insert([
            'role_id' => '1',   // ADMIN
            'module_id' => '7',   // Personas
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                                
        
        DB::table('role_module')->insert([
            'role_id' => '1',   // ADMIN
            'module_id' => '8',   // Fabricantes
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                                
        
        DB::table('role_module')->insert([
            'role_id' => '1',   // ADMIN
            'module_id' => '9',   // Productos
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                                
        
        DB::table('role_module')->insert([
            'role_id' => '1',   // ADMIN
            'module_id' => '10',   // Administración
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '2',   // ADCONTRATO
            'module_id' => '10',   // Administración
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '3',   // CAJERO
            'module_id' => '10',   // Administración
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                    
        DB::table('role_module')->insert([
            'role_id' => '6',   // ADTIENDA
            'module_id' => '10',   // Administración
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '7',   // ADTENDERO
            'module_id' => '10',   // Administración
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        
        DB::table('role_module')->insert([
            'role_id' => '1',   // ADMIN
            'module_id' => '11',   // Contratos
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '2',   // ADCONTRATO
            'module_id' => '11',   // Contratos
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                            
        
        DB::table('role_module')->insert([
            'role_id' => '1',   // ADMIN
            'module_id' => '12',   // Comercios
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '2',   // ADCONTRATO
            'module_id' => '12',   // Comercios
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                        
        DB::table('role_module')->insert([
            'role_id' => '6',   // ADTIENDA
            'module_id' => '12',   // Comercios
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '7',   // ADTENDERO
            'module_id' => '12',   // Comercios
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        
        DB::table('role_module')->insert([
            'role_id' => '1',   // ADMIN
            'module_id' => '13',   // Categorias
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                                
        
        DB::table('role_module')->insert([
            'role_id' => '1',   // ADMIN
            'module_id' => '14',   // Distribuidores
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '2',   // ADCONTRATO
            'module_id' => '14',   // Distribuidores
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                            
        
        DB::table('role_module')->insert([
            'role_id' => '1',   // ADMIN
            'module_id' => '15',   // Catálogos
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '2',   // ADCONTRATO
            'module_id' => '15',   // Catálogos
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                        
        DB::table('role_module')->insert([
            'role_id' => '6',   // ADTIENDA
            'module_id' => '15',   // Catálogos
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '7',   // ADTENDERO
            'module_id' => '15',   // Catálogos
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
                
        DB::table('role_module')->insert([
            'role_id' => '3',   // CAJERO
            'module_id' => '16',   // Operaciones
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '4',   // VENDEDOR
            'module_id' => '16',   // Operaciones
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                
        DB::table('role_module')->insert([
            'role_id' => '6',   // ADTIENDA
            'module_id' => '16',   // Operaciones
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '7',   // ADTENDERO
            'module_id' => '16',   // Operaciones
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
                
        DB::table('role_module')->insert([
            'role_id' => '3',   // CAJERO
            'module_id' => '17',   // PDVi - Ventas
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '4',   // VENDEDOR
            'module_id' => '17',   // PDVi - Ventas
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                    
        DB::table('role_module')->insert([
            'role_id' => '7',   // ADTENDERO
            'module_id' => '17',   // PDVi - Ventas
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
                
        DB::table('role_module')->insert([
            'role_id' => '3',   // CAJERO
            'module_id' => '18',   // Ingreso de Mecancia
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                        
        DB::table('role_module')->insert([
            'role_id' => '7',   // ADTENDERO
            'module_id' => '18',   // Ingreso de Mecancia
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
                                
                                
                                
                
        DB::table('role_module')->insert([
            'role_id' => '3',   // CAJERO
            'module_id' => '22',   // Entra/Salida Efectivo
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                        
        DB::table('role_module')->insert([
            'role_id' => '7',   // ADTENDERO
            'module_id' => '22',   // Entra/Salida Efectivo
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
                                
                
        DB::table('role_module')->insert([
            'role_id' => '3',   // CAJERO
            'module_id' => '29',   // Domicilios
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                    
        DB::table('role_module')->insert([
            'role_id' => '6',   // ADTIENDA
            'module_id' => '29',   // Domicilios
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '7',   // ADTENDERO
            'module_id' => '29',   // Domicilios
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
                            
        DB::table('role_module')->insert([
            'role_id' => '6',   // ADTIENDA
            'module_id' => '31',   // Inventario inicial
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '7',   // ADTENDERO
            'module_id' => '31',   // Inventario inicial
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
                            
        DB::table('role_module')->insert([
            'role_id' => '6',   // ADTIENDA
            'module_id' => '32',   // Control de inventario
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '7',   // ADTENDERO
            'module_id' => '32',   // Control de inventario
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
                
        DB::table('role_module')->insert([
            'role_id' => '3',   // CAJERO
            'module_id' => '33',   // Cuadre de caja
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                    
        DB::table('role_module')->insert([
            'role_id' => '6',   // ADTIENDA
            'module_id' => '33',   // Cuadre de caja
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '7',   // ADTENDERO
            'module_id' => '33',   // Cuadre de caja
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
                
        DB::table('role_module')->insert([
            'role_id' => '3',   // CAJERO
            'module_id' => '35',   // Bloquear Caja
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                        
        DB::table('role_module')->insert([
            'role_id' => '7',   // ADTENDERO
            'module_id' => '35',   // Bloquear Caja
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
                                
                                
        
        DB::table('role_module')->insert([
            'role_id' => '1',   // ADMIN
            'module_id' => '25',   // Admin de Servicios
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '2',   // ADCONTRATO
            'module_id' => '25',   // Admin de Servicios
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                            
                            
        DB::table('role_module')->insert([
            'role_id' => '6',   // ADTIENDA
            'module_id' => '26',   // Promociones
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '7',   // ADTENDERO
            'module_id' => '26',   // Promociones
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
                            
        DB::table('role_module')->insert([
            'role_id' => '6',   // ADTIENDA
            'module_id' => '27',   // Combos
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '7',   // ADTENDERO
            'module_id' => '27',   // Combos
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        
        DB::table('role_module')->insert([
            'role_id' => '1',   // ADMIN
            'module_id' => '30',   // Mensajeros
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '2',   // ADCONTRATO
            'module_id' => '30',   // Mensajeros
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '3',   // CAJERO
            'module_id' => '30',   // Mensajeros
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                    
        DB::table('role_module')->insert([
            'role_id' => '6',   // ADTIENDA
            'module_id' => '30',   // Mensajeros
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '7',   // ADTENDERO
            'module_id' => '30',   // Mensajeros
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
                                
        
        DB::table('role_module')->insert([
            'role_id' => '1',   // ADMIN
            'module_id' => '36',   // Catalogos Tipos de Negocio
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                                
        
        DB::table('role_module')->insert([
            'role_id' => '1',   // ADMIN
            'module_id' => '38',   // Reportes & Consultas
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '2',   // ADCONTRATO
            'module_id' => '38',   // Reportes & Consultas
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '3',   // CAJERO
            'module_id' => '38',   // Reportes & Consultas
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '4',   // VENDEDOR
            'module_id' => '38',   // Reportes & Consultas
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                
        DB::table('role_module')->insert([
            'role_id' => '6',   // ADTIENDA
            'module_id' => '38',   // Reportes & Consultas
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '7',   // ADTENDERO
            'module_id' => '38',   // Reportes & Consultas
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        
        DB::table('role_module')->insert([
            'role_id' => '1',   // ADMIN
            'module_id' => '39',   // Consulta Ventas
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '2',   // ADCONTRATO
            'module_id' => '39',   // Consulta Ventas
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '3',   // CAJERO
            'module_id' => '39',   // Consulta Ventas
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '4',   // VENDEDOR
            'module_id' => '39',   // Consulta Ventas
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                
        DB::table('role_module')->insert([
            'role_id' => '6',   // ADTIENDA
            'module_id' => '39',   // Consulta Ventas
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '7',   // ADTENDERO
            'module_id' => '39',   // Consulta Ventas
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
        
        
        DB::table('role_module')->insert([
            'role_id' => '1',   // ADMIN
            'module_id' => '40',   // Consulta Caja Efectivo
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '2',   // ADCONTRATO
            'module_id' => '40',   // Consulta Caja Efectivo
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '3',   // CAJERO
            'module_id' => '40',   // Consulta Caja Efectivo
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                    
        DB::table('role_module')->insert([
            'role_id' => '6',   // ADTIENDA
            'module_id' => '40',   // Consulta Caja Efectivo
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
            
        DB::table('role_module')->insert([
            'role_id' => '7',   // ADTENDERO
            'module_id' => '40',   // Consulta Caja Efectivo
            'permission_id' => '6',
            'created_at' => '2021-07-01 00:00:00',
            'updated_at' => '2021-07-01 00:00:00',
        ]);
                
    }
}
