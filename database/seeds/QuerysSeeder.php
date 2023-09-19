<?php

use Illuminate\Database\Seeder;

class QuerysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('querys')->insert([
            'query_id' => 1,
            'parent_id' => 0,
            'cube_id' => 5,
            'name' => 'Total Ventas',
            'query' => 'SELECT NON EMPTY {[Measures].[Valor Ventas]} ON COLUMNS,   NON EMPTY {[dEmpresas].[@empresa]} ON ROWS FROM  [Ventas] WHERE ([dTiempo.amd].[@fechaInicial] : [dTiempo.amd].[@fechaFinal])',
            'configuration' => '{"Titulo": "Total Ventas", "icono": "fa-dollar", "color": "red"}',
            'parameters' => '@empresa,@fechaInicial,@fechaFinal',
            'level' => 0,
            'next' => 0,
            'position' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('querys')->insert([
            'query_id' => 2,
            'parent_id' => 1,
            'cube_id' => 5,
            'name' => 'Ventas por taxonomia',
            'query' => null,
            'configuration' => '{"Titulo": "Ventas por Empresa", "icono": "fa-building", "color": "#FF7B00"}',
            'parameters' => '',
            'level' => 1,
            'next' => 0,
            'position' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('querys')->insert([
            'query_id' => 3,
            'parent_id' => 2,
            'cube_id' => 5,
            'name' => 'Ventas por segmento',
            'query' => 'WITH MEMBER [dTiempo.amd].[RangoFechas] AS Aggregate({[dTiempo.amd].[@fechaInicial]:[dTiempo.amd].[@fechaFinal]}) MEMBER [Measures].[Nombre] AS [dProductos].[Segmento].CurrentMember.PROPERTIES("MEMBER_CAPTION") SELECT NON EMPTY {[Measures].[Nombre], [Measures].[Valor Ventas], [Measures].[Valor al costo], [Measures].[Margen bruto], [Measures].[Descuentos], [Measures].[Comisiones]} ON COLUMNS,  NON EMPTY {[dProductos].[Segmento].MEMBERS} ON ROWS FROM  [Ventas] WHERE ([dEmpresas].[@empresa], [dTiempo.amd].[RangoFechas])',
            'configuration' => '{ "Titulo": "Ventas por segmento", "Subtitulo": "Ventas por Empresa", "Tipo": "dual", "TipoComponente": "highcharts", "TipoGrafica": "column", "GraficaGrupo": false, "icono": "fa-dollar" } ',
            'parameters' => '@empresa,@fechaInicial,@fechaFinal',
            'level' => 2,
            'next' => 4,
            'position' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('querys')->insert([
            'query_id' => 4,
            'parent_id' => 3,
            'cube_id' => 5,
            'name' => 'Ventas por familia',
            'query' => 'WITH MEMBER [dTiempo.amd].[RangoFechas] AS Aggregate({[dTiempo.amd].[@fechaInicial]:[dTiempo.amd].[@fechaFinal]}) MEMBER [Measures].[Nombre] AS [dProductos].[Familia].CurrentMember.PROPERTIES("MEMBER_CAPTION") SELECT NON EMPTY {[Measures].[Nombre], [Measures].[Valor Ventas], [Measures].[Valor al costo], [Measures].[Margen bruto], [Measures].[Descuentos], [Measures].[Comisiones]} ON COLUMNS, NON EMPTY {[dProductos].[@param3].children} ON ROWS FROM [Ventas] WHERE ([Empresa].[@empresa], [dTiempo.amd].[RangoFechas])',
            'configuration' => '{ "Titulo": "Ventas por Familia", "Subtitulo": "Ventas por Familia", "Tipo": "dual", "TipoComponente": "highcharts", "TipoGrafica": "column", "GraficaGrupo": false, "icono": "fa-dollar" } ',
            'parameters' => '@empresa,@fechaInicial,@fechaFinal,@param3',
            'level' => 3,
            'next' => 5,
            'position' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('querys')->insert([
            'query_id' => 5,
            'parent_id' => 4,
            'cube_id' => 5,
            'name' => 'Ventas por clase',
            'query' => 'WITH MEMBER [dTiempo.amd].[RangoFechas] AS Aggregate({[dTiempo.amd].[@fechaInicial]:[dTiempo.amd].[@fechaFinal]}) MEMBER [Measures].[Nombre] AS [dProductos].[Clase].CurrentMember.PROPERTIES("MEMBER_CAPTION") SELECT NON EMPTY {[Measures].[Nombre], [Measures].[Valor Ventas], [Measures].[Valor al costo], [Measures].[Margen bruto], [Measures].[Descuentos], [Measures].[Comisiones]} ON COLUMNS, NON EMPTY {[dProductos].[@param3] .[@param4].children} ON ROWS FROM [Ventas] WHERE ([Empresa].[@empresa], [dTiempo.amd].[RangoFechas])',
            'configuration' => '{ "Titulo": "Ventas por clase", "Subtitulo": "Ventas por clase", "Tipo": "dual", "TipoComponente": "highcharts", "TipoGrafica": "column", "GraficaGrupo": false, "icono": "fa-dollar" }',
            'parameters' => '@empresa,@fechaInicial,@fechaFinal,@param3,@param4',
            'level' => 4,
            'next' => 6,
            'position' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('querys')->insert([
            'query_id' => 6,
            'parent_id' => 5,
            'cube_id' => 5,
            'name' => 'Ventas por categoría',
            'query' => 'WITH MEMBER [dTiempo.amd].[RangoFechas] AS Aggregate({[dTiempo.amd].[@fechaInicial]:[dTiempo.amd].[@fechaFinal]})  MEMBER [Measures].[Nombre] AS [dProductos].[Categoria].CurrentMember.PROPERTIES("MEMBER_CAPTION") SELECT NON EMPTY {[Measures].[Nombre], [Measures].[Valor Ventas], [Measures].[Valor al costo], [Measures].[Margen bruto], [Measures].[Descuentos], [Measures].[Comisiones]} ON COLUMNS, NON EMPTY {[dProductos].[@param3].[@param4].[@param5].children} ON ROWS FROM [Ventas] WHERE ([Empresa].[@empresa], [dTiempo.amd].[RangoFechas])',
            'configuration' => '{"Titulo": "Ventas por categoria", "Subtitulo": "Ventas por clase", "Tipo": "dual", "TipoComponente": "highcharts", "TipoGrafica": "column", "GraficaGrupo": false, "icono": "fa-dollar"}',
            'parameters' => '@empresa,@fechaInicial,@fechaFinal,@param3,@param4,@param5',
            'level' => 5,
            'next' => 7,
            'position' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('querys')->insert([
            'query_id' => 7,
            'parent_id' => 6,
            'cube_id' => 5,
            'name' => 'Ventas por producto',
            'query' => 'WITH MEMBER [dTiempo.amd].[RangoFechas] AS Aggregate({[dTiempo.amd].[@fechaInicial]:[dTiempo.amd].[@fechaFinal]}) MEMBER [Measures].[Nombre] AS [dProductos].[Producto].CurrentMember.PROPERTIES("MEMBER_CAPTION") SELECT NON EMPTY {[Measures].[Nombre],      [Measures].[Unidades Vendidas], [Measures].[Valor Ventas], [Measures].[Valor al costo], [Measures].[Margen bruto], [Measures].[Descuentos], [Measures].[Comisiones], [Measures].[Total facturas]} ON COLUMNS, NON EMPTY {[dProductos].[@param3].[@param4].[@param5].[@param6].children} ON ROWS FROM [Ventas] WHERE ([Empresa].[@empresa], [dTiempo.amd].[RangoFechas])',
            'configuration' => '{"Titulo": "Ventas por Productos", "Subtitulo": "Ventas por clase", "Tipo": "dual", "TipoComponente": "highcharts", "TipoGrafica": "column", "GraficaGrupo": false, "icono": "fa-dollar"}',
            'parameters' => '@empresa,@fechaInicial,@fechaFinal,@param3,@param4,@param5,@param6',
            'level' => 6,
            'next' => 8,
            'position' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('querys')->insert([
            'query_id' => 8,
            'parent_id' => 7,
            'cube_id' => 5,
            'name' => 'Tendencia por producto por dias',
            'query' => 'WITH MEMBER [dTiempo.amd].[RangoFechas] AS Aggregate({[dTiempo.amd].[@fechaInicial]:[dTiempo.amd].[@fechaFinal]}) SET [~COLUMNS] AS {[dTiempo].[Dia].Members} SET [~ROWS] AS {[dProductos].[@param3].[@param4].[@param5].[@param6].[@param7]} SELECT NON EMPTY  crossJoin([~COLUMNS], {[Measures].[Valor Ventas]}) ON COLUMNS, NON EMPTY [~ROWS] ON ROWS FROM [Ventas] where ([Empresa].[@empresa], [dTiempo.amd].[RangoFechas])',
            'configuration' => '{"Titulo": "Tendencia producto por dia", "Subtitulo": "Ventas por clase", "Tipo": "dual", "TipoComponente": "highcharts", "TipoGrafica": "line", "GraficaGrupo": false, "icono": "fa-dollar"}',
            'parameters' => '@empresa,@fechaInicial,@fechaFinal,@param3,@param4,@param5,@param6,@param7',
            'level' => 7,
            'next' => 9,
            'position' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('querys')->insert([
            'query_id' => 9,
            'parent_id' => 8,
            'cube_id' => 5,
            'name' => 'Participación ventas por semana',
            'query' => 'WITH MEMBER [dTiempo.amd].[RangoFechas] AS Aggregate({[dTiempo.amd].[2019-01-01]:[dTiempo.amd].[2019-01-30]}) SET [~COLUMNS] AS {[dTiempo.Semanas].[Semana].Members} SET [~ROWS] AS {[dProductos].[@param3].[@param4].[@param5].[@param6].[@param7]} SELECT NON EMPTY CrossJoin([~COLUMNS], {[Measures].[Valor Ventas]}) ON COLUMNS, NON EMPTY [~ROWS] ON ROWS FROM [Ventas] WHERE ([Empresa].[@empresa], [dTiempo.amd].[RangoFechas])',
            'configuration' => '{"Titulo": "Participación producto", "Subtitulo": "Ventas por semana", "Tipo": "dual", "TipoComponente": "highcharts", "TipoGrafica": "bar", "GraficaGrupo": false, "icono": "fa-dollar"}',
            'parameters' => '@empresa,@fechaInicial,@fechaFinal,@param3,@param4,@param5,@param6,@param7',
            'level' => 8,
            'next' => 0,
            'position' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('querys')->insert([
            'query_id' => 10,
            'parent_id' => 1,
            'cube_id' => 5,
            'name' => 'Localización',
            'query' => null,
            'configuration' => '{"Titulo": "Localización", "icono": "fa-building"}',
            'parameters' => '',
            'level' => 1,
            'next' => 0,
            'position' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('querys')->insert([
            'query_id' => 11,
            'parent_id' => 10,
            'cube_id' => 5,
            'name' => 'Ventas por país',
            'query' => 'WITH MEMBER [dTiempo.amd].[RangoFechas] AS Aggregate({[dTiempo.amd].[@fechaInicial]:[dTiempo.amd].[@fechaFinal]})   MEMBER [Measures].[Nombre] AS   [dTiendas].[Pais].CurrentMember.PROPERTIES("MEMBER_CAPTION")  SELECT NON EMPTY {[Measures].[Nombre], [Measures].[Valor Ventas], [Measures].[Valor al costo], [Measures].[Margen bruto], [Measures].[Descuentos], [Measures].[Comisiones]} ON COLUMNS,  NON EMPTY {[dTiendas].[Pais].MEMBERS} ON ROWS FROM  [Ventas] WHERE ([dEmpresas].[@empresa], [dTiempo.amd].[RangoFechas])',
            'configuration' => '{ "Titulo": "Ventas por país", "Subtitulo": "Total comercios", "Tipo": "dual", "TipoComponente": "highcharts", "TipoGrafica": "column", "GraficaGrupo": false, "icono": "fa-dollar" } ',
            'parameters' => '@empresa,@fechaInicial,@fechaFinal',
            'level' => 2,
            'next' => 12,
            'position' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('querys')->insert([
            'query_id' => 12,
            'parent_id' => 11,
            'cube_id' => 5,
            'name' => 'Ventas por departamentos',
            'query' => 'WITH MEMBER [dTiempo.amd].[RangoFechas] AS Aggregate({[dTiempo.amd].[@fechaInicial]:[dTiempo.amd].[@fechaFinal]})   MEMBER [Measures].[Departamento] AS   [dTiendas].[Departamento].CurrentMember.PROPERTIES("MEMBER_CAPTION")   SELECT NON EMPTY {[Measures].[Departamento], [Measures].[Valor Ventas], [Measures].[Valor al costo], [Measures].[Margen bruto], [Measures].[Descuentos], [Measures].[Comisiones]} ON COLUMNS,  NON EMPTY {[dTiendas].[@param3].children} ON ROWS FROM  [Ventas] WHERE ([dEmpresas].[@empresa], [dTiempo.amd].[RangoFechas])',
            'configuration' => '{ "Titulo": "Ventas por departamento", "Subtitulo": "Total comercios", "Tipo": "dual", "TipoComponente": "highcharts", "TipoGrafica": "column", "GraficaGrupo": false, "icono": "fa-dollar" } ',
            'parameters' => '@empresa,@fechaInicial,@fechaFinal,@param3',
            'level' => 3,
            'next' => 13,
            'position' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('querys')->insert([
            'query_id' => 13,
            'parent_id' => 12,
            'cube_id' => 5,
            'name' => 'Ventas por ciudad',
            'query' => 'WITH MEMBER [dTiempo.amd].[RangoFechas] AS Aggregate({[dTiempo.amd].[@fechaInicial]:[dTiempo.amd].[@fechaFinal]}) MEMBER [Measures].[Ciudad] AS  [dTiendas].[Ciudad].CurrentMember.PROPERTIES("MEMBER_CAPTION")   SELECT NON EMPTY {[Measures].[Ciudad], [Measures].[Valor Ventas], [Measures].[Valor al costo], [Measures].[Margen bruto], [Measures].[Descuentos], [Measures].[Comisiones]} ON COLUMNS,  NON EMPTY {[dTiendas].[@param3].[@param4].children} ON ROWS FROM  [Ventas] WHERE ([dEmpresas].[@empresa], [dTiempo.amd].[RangoFechas])',
            'configuration' => '{ "Titulo": "Ventas por Ciudad", "Subtitulo": "Valores", "Tipo": "dual", "TipoComponente": "highcharts", "TipoGrafica": "column", "GraficaGrupo": false, "icono": "fa-dollar" }',
            'parameters' => '@empresa,@fechaInicial,@fechaFinal,@param3,@param4',
            'level' => 4,
            'next' => 14,
            'position' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('querys')->insert([
            'query_id' => 14,
            'parent_id' => 13,
            'cube_id' => 5,
            'name' => 'Ventas por Comercio',
            'query' => 'WITH MEMBER [dTiempo.amd].[RangoFechas] AS Aggregate({[dTiempo.amd].[@fechaInicial]:[dTiempo.amd].[@fechaFinal]})   MEMBER [Measures].[Comercio] AS   [dTiendas].[Comercio].CurrentMember.PROPERTIES("MEMBER_CAPTION")   SELECT NON EMPTY {[Measures].[Comercio], [Measures].[Valor Ventas], [Measures].[Valor al costo], [Measures].[Margen bruto], [Measures].[Descuentos], [Measures].[Comisiones]} ON COLUMNS,  NON EMPTY {[dTiendas].[@param3].[@param4].[@param5].children} ON  ROWS FROM [Ventas] WHERE ([dEmpresas].[@empresa], [dTiempo.amd].[RangoFechas])',
            'configuration' => '{"Titulo": "Ventas por Comercio", "Subtitulo": "Valores", "Tipo": "dual", "TipoComponente": "highcharts", "TipoGrafica": "column", "GraficaGrupo": false, "icono": "fa-dollar"}',
            'parameters' => '@empresa,@fechaInicial,@fechaFinal,@param3,@param4,@param5',
            'level' => 5,
            'next' => 15,
            'position' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('querys')->insert([
            'query_id' => 15,
            'parent_id' => 14,
            'cube_id' => 5,
            'name' => 'Ventas por producto top 20 Comercio',
            'query' => 'WITH MEMBER [dTiempo.amd].[RangoFechas] AS Aggregate({[dTiempo.amd].[@fechaInicial]:[dTiempo.amd].[@fechaFinal]})  MEMBER [Measures].[Producto] AS  [dProductos].[Producto].CurrentMember.PROPERTIES("MEMBER_CAPTION")   SET [~ROWS] AS {[dProductos].[Producto].Members} member [Measures].[PorcMargen] as (([Measures].[Margen bruto] / [Measures].[Valor Ventas]) * 100) select NON EMPTY {[Measures].[Producto],[Measures].[unidades Vendidas], [Measures].[valor Ventas], [Measures].[Margen bruto], [Measures].[PorcMargen]} ON COLUMNS, NON EMPTY topcount ([~ROWS], 20, [Measures].[Valor Ventas]) ON ROWS FROM [Ventas]  WHERE ([Empresa].[@empresa], [dTiempo.amd].[RangoFechas],[dTiendas].[@param3].[@param4].[@param5].[@param6])',
            'configuration' => '{"Titulo": "Ventas por producto Comercio", "Subtitulo": "Top 20", "Tipo": "dual", "TipoComponente": "highcharts", "TipoGrafica": "column", "GraficaGrupo": false, "icono": "fa-dollar"}',
            'parameters' => '@empresa,@fechaInicial,@fechaFinal,@param3,@param4,@param5,@param6',
            'level' => 6,
            'next' => 16,
            'position' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('querys')->insert([
            'query_id' => 16,
            'parent_id' => 15,
            'cube_id' => 5,
            'name' => 'Tendencia producto Comercio',
            'query' => 'WITH MEMBER [dTiempo.amd].[RangoFechas] AS Aggregate({[dTiempo.amd].[@fechaInicial]:[dTiempo.amd].[@fechaFinal]}) SET [~COLUMNS] AS {[dTiempo].[Dia].Members} SET [~ROWS] AS {[Producto].[@param7]} SELECT NON EMPTY  crossJoin([~COLUMNS], {[Measures].[Valor Ventas]}) ON COLUMNS, NON EMPTY [~ROWS] ON ROWS FROM [Ventas] where ([Comercio].[@param6], [dTiempo.amd].[RangoFechas])',
            'configuration' => '{"Titulo": "Tendencia producto Comercio", "Subtitulo": "Producto top 20", "Tipo": "dual", "TipoComponente": "highcharts", "TipoGrafica": "line", "GraficaGrupo": false, "icono": "fa-dollar"}',
            'parameters' => '@empresa,@fechaInicial,@fechaFinal,@param3,@param4,@param5,@param6,@param7',
            'level' => 7,
            'next' => 0,
            'position' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('querys')->insert([
            'query_id' => 17,
            'parent_id' => 1,
            'cube_id' => 5,
            'name' => 'Top 20 clientes empresa',
            'query' => null,
            'configuration' => '{"Titulo": "Top 20 clientes empresa", "icono": "fa-building"}',
            'parameters' => '',
            'level' => 1,
            'next' => 0,
            'position' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('querys')->insert([
            'query_id' => 18,
            'parent_id' => 17,
            'cube_id' => 5,
            'name' => 'Mejores 20 clientes',
            'query' => 'WITH MEMBER [dTiempo.amd].[RangoFechas] AS Aggregate({[dTiempo.amd].[@fechaInicial]:[dTiempo.amd].[@fechaFinal]}) MEMBER [Measures].[Nombre cliente] AS [dClientes].[Cliente].CurrentMember.PROPERTIES("MEMBER_CAPTION") SET [~ROWS] AS {[dClientes].[Cliente].Members} member [Measures].[PorcMargen] as (([Measures].[Margen bruto] / [Measures].[Valor Ventas]) * 100) select NON EMPTY {[Measures].[Nombre cliente],[Measures].[unidades Vendidas], [Measures].[valor Ventas], [Measures].[Margen bruto], [Measures].[PorcMargen]} ON COLUMNS, NON EMPTY topcount ([~ROWS], 15, [Measures].[Valor Ventas]) ON ROWS from [Ventas] where ([Empresa].[@empresa],[dTiempo.amd].[RangoFechas])',
            'configuration' => '{"Titulo": "Ventas por producto Comercio", "Subtitulo": "Top 20", "Tipo": "dual", "TipoComponente": "highcharts", "TipoGrafica": "bar", "GraficaGrupo": false, "icono": "fa-dollar"}',
            'parameters' => '@empresa,@fechaInicial,@fechaFinal',
            'level' => 2,
            'next' => 19,
            'position' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('querys')->insert([
            'query_id' => 19,
            'parent_id' => 18,
            'cube_id' => 5,
            'name' => 'Tendencia compra cliente',
            'query' => 'WITH MEMBER [dTiempo.amd].[RangoFechas] AS Aggregate({[dTiempo.amd].[@fechaInicial]:[dTiempo.amd].[@fechaFinal]}) SET [~COLUMNS] AS {[dTiempo].[Dia].Members} SET [~ROWS] AS {[Cliente].[@param3]} SELECT NON EMPTY crossJoin([~COLUMNS], {[Measures].[Valor Ventas]}) ON COLUMNS, NON EMPTY [~ROWS] ON ROWS FROM [Ventas] where ([Empresa].[@empresa], [dTiempo.amd].[RangoFechas])',
            'configuration' => '{"Titulo": "Tendencia compra cliente", "Subtitulo": "Producto top 20", "Tipo": "dual", "TipoComponente": "highcharts", "TipoGrafica": "line", "GraficaGrupo": false, "icono": "fa-dollar"}',
            'parameters' => '@empresa,@fechaInicial,@fechaFinal,@param3',
            'level' => 3,
            'next' => 20,
            'position' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('querys')->insert([
            'query_id' => 20,
            'parent_id' => 19,
            'cube_id' => 5,
            'name' => 'Productos con 40% de sus compras',
            'query' => 'WITH MEMBER [dTiempo.amd].[RangoFechas] AS Aggregate({[dTiempo.amd].[@fechaInicial]:[dTiempo.amd].[@fechaFinal]})  MEMBER [Measures].[Producto] AS [dProductos].[Producto].CurrentMember.PROPERTIES("MEMBER_CAPTION")  SET [~ROWS] AS {[dProductos].[Producto].Members} member [Measures].[PorcMargen] as (([Measures].[Margen bruto] / [Measures].[Valor Ventas]) * 100)  SELECT  {[Measures].[Producto],[Measures].[unidades Vendidas], [Measures].[valor Ventas], [Measures].[Margen bruto], [Measures].[PorcMargen]} ON COLUMNS, Filter (toppercent([~ROWS],  40, [Measures].[Valor Ventas]),[Measures].[Valor Ventas] > 0)  ON ROWS  from [Ventas] WHERE ([Empresa].[@empresa], [dTiempo.amd].[RangoFechas], [Cliente].[@param3])',
            'configuration' => '{"Titulo": "40% de sus compras", "Subtitulo": "", "Tipo": "dual", "TipoComponente": "highcharts", "TipoGrafica": "column", "GraficaGrupo": false, "icono": "fa-dollar"}',
            'parameters' => '@empresa,@fechaInicial,@fechaFinal,@param3',
            'level' => 4,
            'next' => 21,
            'position' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('querys')->insert([
            'query_id' => 21,
            'parent_id' => 20,
            'cube_id' => 5,
            'name' => 'Productos con 60% restante',
            'query' => 'WITH MEMBER [dTiempo.amd].[RangoFechas] AS Aggregate({[dTiempo.amd].[@fechaInicial]:[dTiempo.amd].[@fechaFinal]})  MEMBER [Measures].[Producto] AS [dProductos].[Producto].CurrentMember.PROPERTIES("MEMBER_CAPTION")  SET [~ROWS] AS {[dProductos].[Producto].Members} member [Measures].[PorcMargen] as (([Measures].[Margen bruto] / [Measures].[Valor Ventas]) * 100)  SELECT  {[Measures].[Producto],[Measures].[unidades Vendidas], [Measures].[valor Ventas], [Measures].[Margen bruto], [Measures].[PorcMargen]} ON COLUMNS, Filter (bottompercent([~ROWS],  59.999, [Measures].[Valor Ventas]),[Measures].[Valor Ventas] > 0)  ON ROWS  from [Ventas] WHERE ([Empresa].[@empresa], [dTiempo.amd].[RangoFechas], [Cliente].[@param3])',
            'configuration' => '{"Titulo": "60% resto de sus compras", "Subtitulo": "", "Tipo": "dual", "TipoComponente": "highcharts", "TipoGrafica": "column", "GraficaGrupo": false, "icono": "fa-dollar"}',
            'parameters' => '@empresa,@fechaInicial,@fechaFinal,@param3',
            'level' => 5,
            'next' => 0,
            'position' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
    }
}
