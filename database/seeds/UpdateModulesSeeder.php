<?php

use Illuminate\Database\Seeder;

class UpdateModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
//        DB::update("update modules set icon_id = (select id from lists where name = 'fa-gears') where name = 'Configuracion'");
        
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-gears') where name = 'Configuracion'"); 
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-list') where name = 'Listas'"); 
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-arrows-alt') where name = 'Modulos'"); 
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-universal-access') where name = 'Permisos'"); 
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-reddit-alien') where name = 'Roles'"); 
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-user') where name = 'Usuarios'"); 
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-male') where name = 'Personas'"); 
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-industry') where name = 'Fabricantes'"); 
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-list-alt') where name = 'Productos'"); 
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-tachometer') where name = 'Administracion'"); 
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-book') where name = 'Contratos'"); 
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-building-o') where name = 'Compañias'"); 
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-bars') where name = 'Categorias'"); 
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-truck') where name = 'Distribuidores'"); 
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-indent') where name = 'Catalogos'"); 
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-arrows') where name = 'Operaciones'"); 
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-usd') where name = 'PDVi'"); 
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-cart-arrow-down') where name = 'Pedidos - Formulacion'"); 
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-cube') where name = 'Gestion y Control'"); 
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-cube') where name = 'Gestion (NEW)'"); 
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-address-card-o') where name = 'Pedidos - Seleccion'"); 
        DB::update("update modules set icon_id = (select id from lists where name = 'fa-address-card-o') where name = 'Pedido - Confirmacion'"); 
       
    }
}
