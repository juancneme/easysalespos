<?php

use Illuminate\Database\Seeder;

class TaxclassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taxclasses')->insert([
            'id' => 1,
            'name' => 'Bienestar Pet/higiene',
            'taxfamilies_id' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 2,
            'name' => 'Suplementos Nutricionales Pet',
            'taxfamilies_id' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 3,
            'name' => 'Accesorios para mascotas',
            'taxfamilies_id' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 4,
            'name' => 'Cuidado de mascotas Packs variedad',
            'taxfamilies_id' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 5,
            'name' => 'Bebidas Pet',
            'taxfamilies_id' => 2,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 6,
            'name' => 'Alimento para mascotas',
            'taxfamilies_id' => 2,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 7,
            'name' => 'Variedad de bebidas/alimentos para mascotas Packs',
            'taxfamilies_id' => 2,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 8,
            'name' => 'Cuidado de mascotas/comida variada Packs',
            'taxfamilies_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 9,
            'name' => 'Ambientadores/desodorantes',
            'taxfamilies_id' => 4,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 10,
            'name' => 'Limpiadores',
            'taxfamilies_id' => 4,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 11,
            'name' => 'Servicio de lavandería',
            'taxfamilies_id' => 4,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 12,
            'name' => 'Cuidado de superficie',
            'taxfamilies_id' => 4,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 13,
            'name' => 'Diversos paquetes de limpieza',
            'taxfamilies_id' => 4,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 14,
            'name' => 'Plagas de insectos/Control/alergeno',
            'taxfamilies_id' => 5,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 15,
            'name' => 'Productos de limpieza/higiene variedad Packs',
            'taxfamilies_id' => 6,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 16,
            'name' => 'Suministros de productos dispensadores',
            'taxfamilies_id' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 17,
            'name' => 'Los productos de almacenamiento de residuos',
            'taxfamilies_id' => 8,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 18,
            'name' => 'Frutos secos / Semillas - Preparado / Procesado',
            'taxfamilies_id' => 9,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 19,
            'name' => 'Frutas / frutos secos / semillas Combinación',
            'taxfamilies_id' => 9,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 20,
            'name' => 'Fruta - Preparado / Procesado',
            'taxfamilies_id' => 9,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 21,
            'name' => 'Verduras - Preparado / Procesado',
            'taxfamilies_id' => 9,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 22,
            'name' => 'Frutas / Verduras / Frutos secos / Semillas Surtidos',
            'taxfamilies_id' => 9,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 23,
            'name' => 'Pescado - Preparado / No procesado',
            'taxfamilies_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 24,
            'name' => 'Mariscos Preparado / No procesado',
            'taxfamilies_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 25,
            'name' => 'Plantas acuáticas Preparado / No procesado',
            'taxfamilies_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 26,
            'name' => 'Pescado - Preparado / Procesado',
            'taxfamilies_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 27,
            'name' => 'Invertebrados acuáticos - Preparado / procesados',
            'taxfamilies_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 28,
            'name' => 'Mariscos Preparado / Procesado',
            'taxfamilies_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 29,
            'name' => 'Plantas acuáticas Preparado / Procesado',
            'taxfamilies_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 30,
            'name' => 'Los invertebrados acuáticos - No Preparado / no procesados',
            'taxfamilies_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 31,
            'name' => 'Paquetes de marisco Variedades',
            'taxfamilies_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 32,
            'name' => 'Invertebrados acuáticos / Pescado / Mariscos / Mariscos Combinación',
            'taxfamilies_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 33,
            'name' => 'Leche / sustitutos de la leche',
            'taxfamilies_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 34,
            'name' => 'Sustitutos Queso / queso',
            'taxfamilies_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 35,
            'name' => 'Mantequilla / sucedáneos de la mantequilla',
            'taxfamilies_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 36,
            'name' => 'Sustitutos Crema / Crema',
            'taxfamilies_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 37,
            'name' => 'Yogur Yogur / Sustitutos',
            'taxfamilies_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 38,
            'name' => 'Leche / Mantequilla / Crema / Yogur / Queso / Packs Huevos / Sustitutos Variedades',
            'taxfamilies_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 39,
            'name' => 'Huevos / Huevos extractos (Proceso Industrial)',
            'taxfamilies_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 40,
            'name' => 'Huevos / Sustitutos de huevos',
            'taxfamilies_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 41,
            'name' => 'Derivados lácteos / subproductos',
            'taxfamilies_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 42,
            'name' => 'Productos Quark',
            'taxfamilies_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 43,
            'name' => 'Aceites comestibles',
            'taxfamilies_id' => 12,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 44,
            'name' => 'Grasas comestibles',
            'taxfamilies_id' => 12,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 45,
            'name' => 'Aceites / Grasas Surtidos',
            'taxfamilies_id' => 12,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 46,
            'name' => 'Azúcares / Productos sustituto del azúcar',
            'taxfamilies_id' => 13,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 47,
            'name' => 'Productos de confitería',
            'taxfamilies_id' => 13,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 48,
            'name' => 'Productos de Confitería / Productos edulcorantes paquetes de Variedades',
            'taxfamilies_id' => 13,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 49,
            'name' => 'Hierbas / Especias / Extractos',
            'taxfamilies_id' => 14,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 50,
            'name' => 'Vinagres / Vinos de cocina',
            'taxfamilies_id' => 14,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 51,
            'name' => 'Salsas / Untar / Mojar / Condimentos',
            'taxfamilies_id' => 14,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 52,
            'name' => 'Encurtidos / Condimentos / Chutneys / Aceitunas',
            'taxfamilies_id' => 14,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 53,
            'name' => 'Condimentos / Conservantes / Extractos Packs',
            'taxfamilies_id' => 14,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 54,
            'name' => 'Mezclas para hornear / cocinar / Suministros',
            'taxfamilies_id' => 15,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 55,
            'name' => 'Pan de molde',
            'taxfamilies_id' => 15,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 56,
            'name' => 'Productos dulces de Panadería ',
            'taxfamilies_id' => 15,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 57,
            'name' => 'Galletas / Cookies',
            'taxfamilies_id' => 15,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 58,
            'name' => 'Productos de panadería salados',
            'taxfamilies_id' => 15,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 59,
            'name' => 'Pan / Productos de Panadería Packs',
            'taxfamilies_id' => 15,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 60,
            'name' => 'Sopas preparadas',
            'taxfamilies_id' => 16,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 61,
            'name' => 'Aperitivos',
            'taxfamilies_id' => 16,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 62,
            'name' => 'Postres / Salsas Postre / Ingredientes',
            'taxfamilies_id' => 16,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 63,
            'name' => 'pastas dulces',
            'taxfamilies_id' => 16,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 64,
            'name' => 'Sandwiches / Panecillos / Tortillas',
            'taxfamilies_id' => 16,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 65,
            'name' => 'Pasta / Tallarines',
            'taxfamilies_id' => 16,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 66,
            'name' => 'Bebés / Niños - Alimentos / Bebidas',
            'taxfamilies_id' => 16,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 67,
            'name' => 'Productos a base de verduras / Comidas',
            'taxfamilies_id' => 16,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 68,
            'name' => 'Productos a base de cereales / Comidas',
            'taxfamilies_id' => 16,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 69,
            'name' => 'Productos a base de masa / Comidas',
            'taxfamilies_id' => 16,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 70,
            'name' => 'Packs variedad de alimentos Preparados / Conservados',
            'taxfamilies_id' => 16,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 71,
            'name' => 'Lácteos / Productos a base de huevo / Comidas',
            'taxfamilies_id' => 16,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 72,
            'name' => 'Sustitutos de la carne',
            'taxfamilies_id' => 16,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 73,
            'name' => 'Comidas de combinación ya hechas',
            'taxfamilies_id' => 16,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 74,
            'name' => 'Café / Té / Sustitutos',
            'taxfamilies_id' => 17,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 75,
            'name' => 'Bebidas alcohólicas',
            'taxfamilies_id' => 17,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 76,
            'name' => 'Bebidas no Alcohólicas - Listo para Beber',
            'taxfamilies_id' => 17,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 77,
            'name' => 'Bebidas no Alcohólicas - No Listo para Beber',
            'taxfamilies_id' => 17,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 78,
            'name' => 'Paquetes de Bebidas Variedad',
            'taxfamilies_id' => 17,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 79,
            'name' => 'Productos de Tabaco / Accesorios de fumar',
            'taxfamilies_id' => 18,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 80,
            'name' => 'Cereales / Harinas',
            'taxfamilies_id' => 19,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 81,
            'name' => 'Cereales Procesados',
            'taxfamilies_id' => 19,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 82,
            'name' => 'Cereales / Granos / Legumbres paquetes de productos de variedad',
            'taxfamilies_id' => 19,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 83,
            'name' => 'Alimentos / Bebidas Packs / Tabaco Variedades',
            'taxfamilies_id' => 20,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 84,
            'name' => 'Carne / Carne de Ave - Preparado / Procesado',
            'taxfamilies_id' => 21,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 85,
            'name' => 'Carne / Carne de Ave - No Preparado / No procesado',
            'taxfamilies_id' => 21,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 86,
            'name' => 'Carne / Carne de Ave Salchichas - Preparado / Procesado',
            'taxfamilies_id' => 21,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 87,
            'name' => 'Frutas ácidas',
            'taxfamilies_id' => 22,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 88,
            'name' => 'Plátanos',
            'taxfamilies_id' => 22,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 89,
            'name' => 'Frutas con semilla',
            'taxfamilies_id' => 22,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 90,
            'name' => 'Fruta de piedra',
            'taxfamilies_id' => 22,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 91,
            'name' => 'Bayas / fruta pequeña',
            'taxfamilies_id' => 22,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 92,
            'name' => 'Piñas',
            'taxfamilies_id' => 22,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 93,
            'name' => 'El kiwi',
            'taxfamilies_id' => 22,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 94,
            'name' => 'Anona',
            'taxfamilies_id' => 22,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 95,
            'name' => 'Aguacates',
            'taxfamilies_id' => 22,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 96,
            'name' => 'Caqui',
            'taxfamilies_id' => 22,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 97,
            'name' => 'Fruta de la pasión',
            'taxfamilies_id' => 22,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 98,
            'name' => 'papayas',
            'taxfamilies_id' => 22,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 99,
            'name' => 'pitayas',
            'taxfamilies_id' => 22,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 100,
            'name' => 'Varios de frutas',
            'taxfamilies_id' => 22,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 101,
            'name' => 'Frutas no procesadas - Packs no preparadas / (fresca) Variedad',
            'taxfamilies_id' => 22,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 102,
            'name' => 'Hortalizas de raíz / tubérculo',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 103,
            'name' => 'Hortalizas de bulbo',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 104,
            'name' => 'Tomates',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 105,
            'name' => 'Pimientos',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 106,
            'name' => 'Solanáceas / Otros',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 107,
            'name' => 'Pepinos',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 108,
            'name' => 'Cucurbitáceas de piel comestible -',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 109,
            'name' => 'Melones',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 110,
            'name' => 'Cucurbitáceas de piel no comestible -',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 111,
            'name' => 'Hortalizas, otras',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 112,
            'name' => 'Hortalizas del género Brassica',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 113,
            'name' => 'Hierbas',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 114,
            'name' => 'Frijoles (con vaina)',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 115,
            'name' => 'Guisantes (con vaina)',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 116,
            'name' => 'Verduras madre',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 117,
            'name' => 'Hongos',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 118,
            'name' => 'Verduras - Packs no procesados ??no preparadas / (fresca) Variedad',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 119,
            'name' => 'Verduras micro',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 120,
            'name' => 'Flores comestibles',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 121,
            'name' => 'Verduras del Mar de las mareas',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 122,
            'name' => 'Garbanzos',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 123,
            'name' => 'suculento',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 124,
            'name' => 'Helechos',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 125,
            'name' => 'zapote',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 126,
            'name' => 'Caña de azucar',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 127,
            'name' => 'juncias',
            'taxfamilies_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 128,
            'name' => 'Frutas - Preparado / No procesado (congelado)',
            'taxfamilies_id' => 24,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 129,
            'name' => 'Verduras - Preparado / No procesado (congelado)',
            'taxfamilies_id' => 25,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 130,
            'name' => 'Las frutas - no preparadas / bruto (Larga conservación)',
            'taxfamilies_id' => 26,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 131,
            'name' => 'Verduras - no preparadas / bruto (Larga conservación)',
            'taxfamilies_id' => 27,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 132,
            'name' => 'Frutos secos / Semillas - No Preparado / No procesado (perecederos)',
            'taxfamilies_id' => 28,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 133,
            'name' => 'Frutos secos / Semillas - No Preparado / no procesados ??(Larga conservación)',
            'taxfamilies_id' => 29,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 134,
            'name' => 'Hojas de achicoria',
            'taxfamilies_id' => 30,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 135,
            'name' => 'Lechuga de cabeza',
            'taxfamilies_id' => 30,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 136,
            'name' => 'Sueltos Verdes de la ensalada de la hoja / multilama',
            'taxfamilies_id' => 30,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 137,
            'name' => 'Verdes individuales hoja de ensalada',
            'taxfamilies_id' => 30,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 138,
            'name' => 'Espinacas (frescas)',
            'taxfamilies_id' => 30,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 139,
            'name' => 'Las verduras de hoja - Packs no preparadas / Variedades sin procesar',
            'taxfamilies_id' => 30,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 140,
            'name' => 'Lechuga de vástago',
            'taxfamilies_id' => 30,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 141,
            'name' => 'Cuidado de la piel',
            'taxfamilies_id' => 31,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 142,
            'name' => 'Los productos de bronceado de la piel',
            'taxfamilies_id' => 31,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 143,
            'name' => 'Lavado del cuerpo',
            'taxfamilies_id' => 31,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 144,
            'name' => 'Productos para la piel variedad Packs',
            'taxfamilies_id' => 31,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 145,
            'name' => 'Hair Removal/productos de enmascarar',
            'taxfamilies_id' => 32,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 146,
            'name' => 'Los productos de cuidado del cabello',
            'taxfamilies_id' => 32,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 147,
            'name' => 'Productos para el cabello variedad Packs',
            'taxfamilies_id' => 32,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 148,
            'name' => 'Productos cosméticos',
            'taxfamilies_id' => 33,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 149,
            'name' => 'Productos para el cuidado de uñas y cosméticos',
            'taxfamilies_id' => 33,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 150,
            'name' => 'Fragancias',
            'taxfamilies_id' => 33,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 151,
            'name' => 'Cosméticos y fragancias diferentes packs',
            'taxfamilies_id' => 33,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 152,
            'name' => 'La aromaterapia',
            'taxfamilies_id' => 33,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 153,
            'name' => 'La higiene personal en general',
            'taxfamilies_id' => 34,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 154,
            'name' => 'Higiene Femenina/Enfermería',
            'taxfamilies_id' => 34,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 155,
            'name' => 'Incontinencia de adultos',
            'taxfamilies_id' => 34,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 156,
            'name' => 'La higiene oral',
            'taxfamilies_id' => 34,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 157,
            'name' => 'Productos de higiene personal variedad Packs',
            'taxfamilies_id' => 34,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 158,
            'name' => 'Pañales y accesorios',
            'taxfamilies_id' => 34,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 159,
            'name' => 'Masaje corporal/Tonificación',
            'taxfamilies_id' => 35,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 160,
            'name' => 'Belleza/Cuidado Personal/higiene variedad Packs',
            'taxfamilies_id' => 36,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 161,
            'name' => 'Juguetes sexuales/sida',
            'taxfamilies_id' => 37,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 162,
            'name' => 'Impreso/textual/Materiales de referencia diferentes packs',
            'taxfamilies_id' => 38,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 163,
            'name' => 'Libros',
            'taxfamilies_id' => 38,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 164,
            'name' => 'Publicaciones periódicas',
            'taxfamilies_id' => 38,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 165,
            'name' => 'Mapas',
            'taxfamilies_id' => 38,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 166,
            'name' => 'Instrumentos Musicales (sin alimentación)',
            'taxfamilies_id' => 39,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 167,
            'name' => 'Instrumentos Musicales (alimentado)',
            'taxfamilies_id' => 39,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 168,
            'name' => 'Accesorios para instrumentos musicales',
            'taxfamilies_id' => 39,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 169,
            'name' => 'Instrumentos musicales/accesorios diversos Packs',
            'taxfamilies_id' => 39,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 170,
            'name' => 'Envoltura de regalo/accesorios',
            'taxfamilies_id' => 40,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 171,
            'name' => 'Tarjetas de Felicitación/envoltura de regalo/ocasión suministros diversos Packs',
            'taxfamilies_id' => 40,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 172,
            'name' => 'Tarjetas de Felicitación/invitaciones',
            'taxfamilies_id' => 40,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 173,
            'name' => 'Suministros de ocasión',
            'taxfamilies_id' => 40,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 174,
            'name' => 'Escritura/diseño implementa/sida',
            'taxfamilies_id' => 41,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 175,
            'name' => 'Maquinaria de oficina',
            'taxfamilies_id' => 41,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 176,
            'name' => 'Planificación organizacional papelería',
            'taxfamilies_id' => 41,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 177,
            'name' => 'Postal/Equipo de envasado/sida/accesorios',
            'taxfamilies_id' => 41,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 178,
            'name' => 'Equipo de presentación',
            'taxfamilies_id' => 41,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 179,
            'name' => 'Papelería Adhesivos/aglutinantes/Fijaciones',
            'taxfamilies_id' => 41,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 180,
            'name' => 'Cortadores de papelería/recortadores',
            'taxfamilies_id' => 41,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 181,
            'name' => 'Papelería Almacenamiento/presentación',
            'taxfamilies_id' => 41,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 182,
            'name' => 'Papelería/Maquinaria de oficina diversos Packs',
            'taxfamilies_id' => 41,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 183,
            'name' => 'Papelería Papel/Tarjeta/película',
            'taxfamilies_id' => 41,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 184,
            'name' => 'Papelería/Maquinaria de oficina/ocasión suministros diversos Packs',
            'taxfamilies_id' => 42,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 185,
            'name' => 'Calzado deportivo',
            'taxfamilies_id' => 43,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 186,
            'name' => 'Accesorios para calzado',
            'taxfamilies_id' => 43,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 187,
            'name' => 'Calzado de uso general',
            'taxfamilies_id' => 43,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 188,
            'name' => 'Calzado para interiores',
            'taxfamilies_id' => 43,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 189,
            'name' => 'Seguridad / Calzado de protección.',
            'taxfamilies_id' => 43,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 190,
            'name' => 'Joyas',
            'taxfamilies_id' => 44,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 191,
            'name' => 'Porteadores personales/accesorios',
            'taxfamilies_id' => 44,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 192,
            'name' => 'Relojes',
            'taxfamilies_id' => 44,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 193,
            'name' => 'Variedad de accesorios personales Packs',
            'taxfamilies_id' => 44,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 194,
            'name' => 'Equipo/accesorios video del juego',
            'taxfamilies_id' => 45,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 195,
            'name' => 'Componentes del equipo',
            'taxfamilies_id' => 45,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 196,
            'name' => 'Ordenadores (unidades)',
            'taxfamilies_id' => 45,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 197,
            'name' => 'Ordenador/Software Video Juegos',
            'taxfamilies_id' => 45,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 198,
            'name' => 'Equipos',
            'taxfamilies_id' => 45,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 199,
            'name' => 'Juego de ordenador/Vídeo/Control de dispositivos de entrada',
            'taxfamilies_id' => 45,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 200,
            'name' => 'Periféricos de ordenador/Video Juegos',
            'taxfamilies_id' => 45,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 201,
            'name' => 'Equipo El equipo de networking',
            'taxfamilies_id' => 45,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 202,
            'name' => 'Los ordenadores/Video Juegos Diversos Packs',
            'taxfamilies_id' => 45,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 203,
            'name' => 'Consolas de Video Juegos',
            'taxfamilies_id' => 45,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 204,
            'name' => 'Accesorios de comunicación',
            'taxfamilies_id' => 46,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 205,
            'name' => 'Dispositivos de comunicación fija',
            'taxfamilies_id' => 46,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 206,
            'name' => 'Los dispositivos de comunicación móvil/servicios',
            'taxfamilies_id' => 46,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 207,
            'name' => 'Variedad de paquetes de comunicación',
            'taxfamilies_id' => 46,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 208,
            'name' => 'Carteles',
            'taxfamilies_id' => 46,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 209,
            'name' => 'Accesorios de ropa',
            'taxfamilies_id' => 47,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 210,
            'name' => 'Desgaste de cuerpo completo',
            'taxfamilies_id' => 47,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 211,
            'name' => 'El cuerpo inferior desgaste/Bottoms',
            'taxfamilies_id' => 47,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 212,
            'name' => 'Ropa de cama',
            'taxfamilies_id' => 47,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 213,
            'name' => 'Ropa deportiva',
            'taxfamilies_id' => 47,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 214,
            'name' => 'Ropa interior',
            'taxfamilies_id' => 47,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 215,
            'name' => 'Desgaste en la parte superior del cuerpo/Tops',
            'taxfamilies_id' => 47,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 216,
            'name' => 'Ropa de protección',
            'taxfamilies_id' => 47,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 217,
            'name' => 'Diversos paquetes de ropa',
            'taxfamilies_id' => 47,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 218,
            'name' => 'Televisores',
            'taxfamilies_id' => 48,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 219,
            'name' => 'Grabación/reproducción de vídeo',
            'taxfamilies_id' => 48,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 220,
            'name' => 'Audio/Vídeo portátil',
            'taxfamilies_id' => 48,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 221,
            'name' => 'Equipos de Audio en casa',
            'taxfamilies_id' => 48,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 222,
            'name' => 'Accesorios de audio visuales',
            'taxfamilies_id' => 48,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 223,
            'name' => 'Equipo Audio Visual variedad Packs',
            'taxfamilies_id' => 48,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 224,
            'name' => 'Receptor de vídeo/Instalación.',
            'taxfamilies_id' => 48,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 225,
            'name' => 'Fotografía',
            'taxfamilies_id' => 49,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 226,
            'name' => 'Óptica',
            'taxfamilies_id' => 49,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 227,
            'name' => 'Impresión de fotografía/Equipo Sala oscura',
            'taxfamilies_id' => 49,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 228,
            'name' => 'Fotografía/óptica variedad Packs',
            'taxfamilies_id' => 49,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 229,
            'name' => 'Alquiler de vídeo/navegación',
            'taxfamilies_id' => 50,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 230,
            'name' => 'Car Audio',
            'taxfamilies_id' => 50,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 231,
            'name' => 'En la electrónica del automóvil variedad Packs',
            'taxfamilies_id' => 50,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 232,
            'name' => 'Contenido multimedia digital o pregrabadas',
            'taxfamilies_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 233,
            'name' => 'Medios grabables',
            'taxfamilies_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 234,
            'name' => 'Audio/Visual Fotografía variedad Packs',
            'taxfamilies_id' => 52,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 235,
            'name' => 'Artistas de pintura y dibujo de suministros',
            'taxfamilies_id' => 53,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 236,
            'name' => 'Aerografía suministros',
            'taxfamilies_id' => 53,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 237,
            'name' => 'Escultores/suministros de artesanía cerámica',
            'taxfamilies_id' => 53,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 238,
            'name' => 'Costura/Fabricación de juguetes suministros de artesanía',
            'taxfamilies_id' => 53,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 239,
            'name' => 'Suministros de artesanía de joyería',
            'taxfamilies_id' => 53,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 240,
            'name' => 'Suministros de Artesanía de cestería',
            'taxfamilies_id' => 53,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 241,
            'name' => 'Papel/Card Making suministros de artesanía',
            'taxfamilies_id' => 53,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 242,
            'name' => 'Vidrieras/Esmaltado/marquetería suministros de artesanía',
            'taxfamilies_id' => 53,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 243,
            'name' => 'Candle/jabón artesanal suministros',
            'taxfamilies_id' => 53,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 244,
            'name' => 'La quema de madera/grabado suministros de artesanía',
            'taxfamilies_id' => 53,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 245,
            'name' => 'Impresión suministros de artesanía',
            'taxfamilies_id' => 53,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 246,
            'name' => 'Spinning/tejido suministros de artesanía',
            'taxfamilies_id' => 53,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 247,
            'name' => 'Artes y oficios diversos Packs',
            'taxfamilies_id' => 53,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 248,
            'name' => 'Vía/Field Equipamiento deportivo',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 249,
            'name' => 'Los balones deportivos/puck/Shuttlecocks/Frisbees/Boomerangs',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 250,
            'name' => 'Equipos de deportes de raqueta',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 251,
            'name' => 'Deportes Los murciélagos/Palos/clubes/Tacos/mazas',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 252,
            'name' => 'La nieve/hielo deportes de equipo',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 253,
            'name' => 'Senderismo y Montañismo deportes de equipo',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 254,
            'name' => 'Equipos de deportes de combate',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 255,
            'name' => 'Ciclo Equipamiento deportivo',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 256,
            'name' => 'Fitness Personal Equipamiento deportivo',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 257,
            'name' => 'Gimnasia Deportes de equipo',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 258,
            'name' => 'Kiting/Paracaidismo Equipamiento deportivo',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 259,
            'name' => 'Monopatín scooter/Equipamiento deportivo',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 260,
            'name' => 'Natación, surf o buceo y submarinismo Equipamiento deportivo',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 261,
            'name' => 'Tablas de deportes',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 262,
            'name' => 'Deportes de equipo de destino',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 263,
            'name' => 'Armas de Fuego, equipos deportivos',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 264,
            'name' => 'Deportes caza Sida',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 265,
            'name' => 'Watercraft equipamiento deportivo (sin alimentación)',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 266,
            'name' => 'Accesorios de Equipamiento deportivo',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 267,
            'name' => 'Equipo de protección personal de deportes',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 268,
            'name' => 'Pesca/pesca Equipamiento deportivo',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 269,
            'name' => 'Variedad packs de equipamiento deportivo',
            'taxfamilies_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 270,
            'name' => 'Bebé deportistas/transporte',
            'taxfamilies_id' => 55,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 271,
            'name' => 'Eliminación de residuos/compactación electrodomésticos',
            'taxfamilies_id' => 56,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 272,
            'name' => 'Aparatos de refrigeración/congelación',
            'taxfamilies_id' => 56,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 273,
            'name' => 'Los principales aparatos de cocina',
            'taxfamilies_id' => 56,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 274,
            'name' => 'Aparatos de calentamiento',
            'taxfamilies_id' => 56,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 275,
            'name' => 'Los principales electrodomésticos de lavado',
            'taxfamilies_id' => 56,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 276,
            'name' => 'Cocina los electrodomésticos de lavado',
            'taxfamilies_id' => 56,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 277,
            'name' => 'Los principales dispensadores de agua',
            'taxfamilies_id' => 56,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 278,
            'name' => 'Una pequeña cocina/Aparatos de calefacción',
            'taxfamilies_id' => 57,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 279,
            'name' => 'Aparatos de preparación de alimentos y/o Bebidas',
            'taxfamilies_id' => 57,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 280,
            'name' => 'Aparatos de cuidados de lavandería',
            'taxfamilies_id' => 57,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 281,
            'name' => 'Aparatos de limpieza',
            'taxfamilies_id' => 57,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 282,
            'name' => 'Dispensadores de agua pequeña',
            'taxfamilies_id' => 57,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 283,
            'name' => 'Aparatos de control de aire portátil',
            'taxfamilies_id' => 57,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 284,
            'name' => 'Almacenaje de cocina',
            'taxfamilies_id' => 58,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 285,
            'name' => 'Equipo de bebidas/agua',
            'taxfamilies_id' => 58,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 286,
            'name' => 'Equipo de medición de alimentos',
            'taxfamilies_id' => 58,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 287,
            'name' => 'Utensilios de cocina/Bakeware',
            'taxfamilies_id' => 58,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 288,
            'name' => 'Servicio de vajilla/comer/beber el equipo',
            'taxfamilies_id' => 58,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 289,
            'name' => 'Equipos de Preparación de alimentos',
            'taxfamilies_id' => 58,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 290,
            'name' => 'Cocina variedad de mercancías Packs',
            'taxfamilies_id' => 58,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 291,
            'name' => 'Presentación de alimentos y/o Bebidas Accesorios',
            'taxfamilies_id' => 58,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 292,
            'name' => 'Los recipientes de comida desechables',
            'taxfamilies_id' => 58,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 293,
            'name' => 'Vajilla para bebé',
            'taxfamilies_id' => 58,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 294,
            'name' => 'Comercios/estructuras meteorológicas',
            'taxfamilies_id' => 59,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 295,
            'name' => 'Equipo de iluminación y calefacción camping',
            'taxfamilies_id' => 59,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 296,
            'name' => 'Muebles/muebles de camping',
            'taxfamilies_id' => 59,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 297,
            'name' => 'Camping cocinar/comer/beber el equipo',
            'taxfamilies_id' => 59,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 298,
            'name' => 'Camping equipamiento sanitario/lavado',
            'taxfamilies_id' => 59,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 299,
            'name' => 'Camping variedad Packs',
            'taxfamilies_id' => 59,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 300,
            'name' => 'Hogar/oficina/Mostrar muebles de almacenamiento/pantallas',
            'taxfamilies_id' => 60,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 301,
            'name' => 'Hogar/Asientos de oficina',
            'taxfamilies_id' => 60,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 302,
            'name' => 'Hogar/oficina/Tablas de escritorios',
            'taxfamilies_id' => 60,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 303,
            'name' => 'Hogar camas/Colchones',
            'taxfamilies_id' => 60,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 304,
            'name' => 'Hogar/Muebles de oficina diversos Packs',
            'taxfamilies_id' => 60,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 305,
            'name' => 'Hogar/Accesorios de muebles de oficina',
            'taxfamilies_id' => 60,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 306,
            'name' => 'Soportes para displays',
            'taxfamilies_id' => 60,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 307,
            'name' => 'Hogar/Oficina muebles de tela/textil',
            'taxfamilies_id' => 61,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 308,
            'name' => 'Ropa de cama',
            'taxfamilies_id' => 61,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 309,
            'name' => 'Tejido/Textil mobiliario variedad Packs',
            'taxfamilies_id' => 61,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 310,
            'name' => 'Adornos',
            'taxfamilies_id' => 62,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 311,
            'name' => 'Fotografías/espejos/fotogramas',
            'taxfamilies_id' => 62,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 312,
            'name' => 'Relojes',
            'taxfamilies_id' => 62,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 313,
            'name' => 'Muebles ornamentales variedad Packs',
            'taxfamilies_id' => 62,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 314,
            'name' => 'Banners/Banderas decorativas',
            'taxfamilies_id' => 62,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 315,
            'name' => 'Bebé Muebles Sanitarios',
            'taxfamilies_id' => 63,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 316,
            'name' => 'Bebé hogar camas/Colchones',
            'taxfamilies_id' => 63,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 317,
            'name' => 'Hogar de asientos para bebé',
            'taxfamilies_id' => 63,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 318,
            'name' => 'Reparación de carrocería de automóviles',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 319,
            'name' => 'Gestión de carga automotriz',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 320,
            'name' => 'Apariencia de Automoción Productos químicos',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 321,
            'name' => 'Automotive Performance Chemicals',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 322,
            'name' => 'Líquido de transmisión automotriz',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 323,
            'name' => 'Mantenimiento/Reparación automotriz',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 324,
            'name' => 'Seguridad Automotriz',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 325,
            'name' => 'Accesorios interiores automotores - Asientos',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 326,
            'name' => 'Accesorios Interiores de automóviles - Organización',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 327,
            'name' => 'Accesorios interiores de automoción: comodidad.',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 328,
            'name' => 'Accesorios Interiores de automóviles - Protección solar',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 329,
            'name' => 'Accesorios Interiores de automóviles - Dirección',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 330,
            'name' => 'Accesorios Interiores de automóviles - pavimentos interiores',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 331,
            'name' => 'Accesorios Interiores de automóviles - Interior Dash',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 332,
            'name' => 'Accesorios - Decoración de Interiores de automóviles',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 333,
            'name' => 'Automoción - Accesorios exteriores Estribos/pasos',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 334,
            'name' => 'Automoción - Accesorios exteriores parrillas / Parachoques',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 335,
            'name' => 'Automoción - Accesorios exteriores/Escudos deflectores',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 336,
            'name' => 'Accesorios exterior de automoción - Cubiertas/protección',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 337,
            'name' => 'La apariencia exterior de automoción Accesorios',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 338,
            'name' => 'Ruedas/neumáticos de automóviles',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 339,
            'name' => 'Neumáticos/Ruedas Accesorios de automoción',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 340,
            'name' => 'Apariencia de automoción/Accesorios fragancia',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 341,
            'name' => 'Automoción/Enganche de remolque',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 342,
            'name' => 'Automoción/Enganche de remolque - Eléctrico',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 343,
            'name' => 'Accesorios de remolque remolques/automoción',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 344,
            'name' => 'Malacates/Cabrestante Accesorios Automoción',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 345,
            'name' => 'Automoción Productos anti-robo',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 346,
            'name' => 'Limpiadores/limpiador de piezas de automoción',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 347,
            'name' => 'Automoción Bujías/Bujías/ inyectores',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 348,
            'name' => 'Filtros automotrices',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 349,
            'name' => 'Automoción/luces de xenón',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 350,
            'name' => 'Los conjuntos de luces de automoción',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 351,
            'name' => 'Iluminación decorativa de automoción',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 352,
            'name' => 'El automóvil eléctrico',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 353,
            'name' => 'Manejo de fluidos automotores Accesorios',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 354,
            'name' => 'Los elementos de cambio de líquido de automoción',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 355,
            'name' => 'Automoción líquido lavaparabrisas',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 356,
            'name' => 'Las baterías de automoción',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 357,
            'name' => 'Anticongelante automotriz',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 358,
            'name' => 'Frenos automotriz',
            'taxfamilies_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 359,
            'name' => 'Coches',
            'taxfamilies_id' => 65,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 360,
            'name' => 'Motocicletas y vehículos todo terreno/ Utilidad vehículos tareas',
            'taxfamilies_id' => 65,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 361,
            'name' => 'Conexión eléctrica',
            'taxfamilies_id' => 66,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 362,
            'name' => 'Distribución eléctrica',
            'taxfamilies_id' => 66,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 363,
            'name' => 'Baterías y cargadores',
            'taxfamilies_id' => 66,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 364,
            'name' => 'Componentes de control de iluminación eléctrica',
            'taxfamilies_id' => 67,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 365,
            'name' => 'Accesorios de iluminación eléctrica',
            'taxfamilies_id' => 67,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 366,
            'name' => 'Lámparas eléctricas/Bombillas/Iluminación',
            'taxfamilies_id' => 67,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 367,
            'name' => 'Alumbrado Eléctrico Portátil',
            'taxfamilies_id' => 67,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 368,
            'name' => 'Cableado/Gestión/Control de cableado',
            'taxfamilies_id' => 68,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 369,
            'name' => 'Cables eléctricos',
            'taxfamilies_id' => 68,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 370,
            'name' => 'Cableado eléctrico',
            'taxfamilies_id' => 68,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 371,
            'name' => 'Componentes de comunicación electrónica',
            'taxfamilies_id' => 69,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 372,
            'name' => 'Hardware eléctrico general',
            'taxfamilies_id' => 70,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 373,
            'name' => 'Porcelana sanitaria',
            'taxfamilies_id' => 71,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 374,
            'name' => 'Accesorios de Baño',
            'taxfamilies_id' => 71,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 375,
            'name' => 'Almacenamiento/tratamiento de agua',
            'taxfamilies_id' => 71,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 376,
            'name' => 'Equipo de calefacción',
            'taxfamilies_id' => 71,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 377,
            'name' => 'Acondicionador de aire/refrigeración/ventilación',
            'taxfamilies_id' => 71,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 378,
            'name' => 'Tuberías de calefacción/ventilación/aire acondicionado variedad Packs',
            'taxfamilies_id' => 71,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 379,
            'name' => 'Suministro de gas/agua',
            'taxfamilies_id' => 71,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 380,
            'name' => 'El equipo de Aguas y Saneamiento',
            'taxfamilies_id' => 71,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 381,
            'name' => 'Dispositivos antirretorno',
            'taxfamilies_id' => 71,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 382,
            'name' => 'Medir/Nivelación/marcar herramientas',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 383,
            'name' => 'Herramientas de yeso',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 384,
            'name' => 'Albañilería/vidrio/Herramientas de mosaico',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 385,
            'name' => 'Transporte/Elevación/equipo de escalada',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 386,
            'name' => 'Demolición/extracción',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 387,
            'name' => 'Grapadoras/clavadoras/Herramientas de remachado',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 388,
            'name' => 'Destornilladores',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 389,
            'name' => 'Alicates/pinzas/Herramientas de corte de metal',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 390,
            'name' => 'Vicios/Abrazaderas',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 391,
            'name' => 'Amoladoras/Afilalápices/raspadores',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 392,
            'name' => 'Taladros - No impulsado',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 393,
            'name' => 'Punzones/puñetazos/Nailsets',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 394,
            'name' => 'Cuchillas - No impulsado',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 395,
            'name' => 'Los escoplos/Gubias',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 396,
            'name' => 'Martillos y mazas/Hachas/yunques',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 397,
            'name' => 'Llaves Las llaves/claves/',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 398,
            'name' => 'Sierras - No impulsado',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 399,
            'name' => 'Planos/Forjadores/archivos/Escofinas',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 400,
            'name' => 'Herramientas del tubo/tubo',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 401,
            'name' => 'Grifos de subprocesos/muere, no impulsado',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 402,
            'name' => 'Las herramientas/equipos - Mano variedad Packs',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 403,
            'name' => 'Embudos',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 404,
            'name' => 'Herramientas neumáticas',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 405,
            'name' => 'Los quemadores de gas o antorchas',
            'taxfamilies_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 406,
            'name' => 'Jardín de césped/piscinas y estanques de agua/Características y ornamentos',
            'taxfamilies_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 407,
            'name' => 'Jardín de césped/tratamientos químicos',
            'taxfamilies_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 408,
            'name' => 'Césped/Muebles/Muebles de jardín',
            'taxfamilies_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 409,
            'name' => 'Jardín de césped/Equipos de riego',
            'taxfamilies_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 410,
            'name' => 'Césped y Jardín de Esgrima',
            'taxfamilies_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 411,
            'name' => 'Jardín de césped/eliminación de residuos',
            'taxfamilies_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 412,
            'name' => 'Jardín de césped/Cocinar/Aparatos de calefacción',
            'taxfamilies_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 413,
            'name' => 'Jardín de césped/Power Tools',
            'taxfamilies_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 414,
            'name' => 'Jardín de césped/estructuras al aire libre',
            'taxfamilies_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 415,
            'name' => 'Césped/Jardín de observación y vigilancia meteorológica',
            'taxfamilies_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 416,
            'name' => 'Césped/Equipo de jardinería',
            'taxfamilies_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 417,
            'name' => 'Jardín de césped/Herramientas de mano',
            'taxfamilies_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 418,
            'name' => 'Jardín de césped/Equipo de diagnóstico Pruebas',
            'taxfamilies_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 419,
            'name' => 'Jardín de césped/suelo/Enmiendas del suelo',
            'taxfamilies_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 420,
            'name' => 'Iluminación de jardín césped/',
            'taxfamilies_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 421,
            'name' => 'Césped/Jardín repelentes de animales/elementos disuasivos',
            'taxfamilies_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 422,
            'name' => 'Jardín de césped/Accesorios/Plantas Florales',
            'taxfamilies_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 423,
            'name' => 'Jardín de césped/azulejos',
            'taxfamilies_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 424,
            'name' => 'Power Tools - Elevación/Equipo de manipulación',
            'taxfamilies_id' => 74,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 425,
            'name' => 'Power Tools variedad Packs',
            'taxfamilies_id' => 74,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 426,
            'name' => 'Power Tools - parado/Banco-top',
            'taxfamilies_id' => 74,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 427,
            'name' => 'Herramientas eléctricas portátiles de mano -',
            'taxfamilies_id' => 74,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 428,
            'name' => 'Revestimientos de pared/techo',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 429,
            'name' => 'Pisos',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 430,
            'name' => 'Aislamiento',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 431,
            'name' => 'Pintura',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 432,
            'name' => 'Building Products variedad Packs',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 433,
            'name' => 'Asfalto u hormigón y albañilería',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 434,
            'name' => 'Componentes estructurales/conjuntos',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 435,
            'name' => 'Madera aserrada/madera/panel de yeso',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 436,
            'name' => 'Partes de la ventana/accesorios',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 437,
            'name' => 'Molduras/elementos de carpintería/Escaleras',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 438,
            'name' => 'Puertas',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 439,
            'name' => 'Hardware de la puerta',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 440,
            'name' => 'Cristal',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 441,
            'name' => 'Canalones/drenaje',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 442,
            'name' => 'Decking/barandilla',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 443,
            'name' => 'Techos',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 444,
            'name' => 'Abrasivos',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 445,
            'name' => 'Sujetadores de fijación/Hardware',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 446,
            'name' => 'Piezas y accesorios de cortina',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 447,
            'name' => 'De selladores y adhesivos/rellenos',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 448,
            'name' => 'Windows',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 449,
            'name' => 'Siding/guarnición exterior',
            'taxfamilies_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 450,
            'name' => 'Almacenamiento de herramienta',
            'taxfamilies_id' => 76,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 451,
            'name' => 'Taller ayuda',
            'taxfamilies_id' => 76,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 452,
            'name' => 'Juegos de tablero/cartas/Puzzles',
            'taxfamilies_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 453,
            'name' => 'Muñecas y muñecos/figuras de acción/juguetes blandos',
            'taxfamilies_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 454,
            'name' => 'Muñecas y muñecos/figuras de acción/Soft Toys Accesorios',
            'taxfamilies_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 455,
            'name' => 'Desarrollo/Juguetes educativos',
            'taxfamilies_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 456,
            'name' => 'Fancy Dress vestuario/accesorios',
            'taxfamilies_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 457,
            'name' => 'Juguetes musicales',
            'taxfamilies_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 458,
            'name' => 'Juegos de interior/exterior/Estructuras de juegos',
            'taxfamilies_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 459,
            'name' => 'Juegos de mesa',
            'taxfamilies_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 460,
            'name' => 'Juguetes y Juegos Diversos Packs',
            'taxfamilies_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 461,
            'name' => 'Juguetes - Ride-on',
            'taxfamilies_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 462,
            'name' => 'Vehículos de juguete - Non-ride',
            'taxfamilies_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 463,
            'name' => 'Juego de Rol Juguetes',
            'taxfamilies_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 464,
            'name' => 'Servicio proporcionado productos de juego',
            'taxfamilies_id' => 78,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 465,
            'name' => 'Los combustibles/Sida Contacto',
            'taxfamilies_id' => 79,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 466,
            'name' => 'Aditivos de combustible',
            'taxfamilies_id' => 79,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 467,
            'name' => 'Los combustibles y aditivos de combustible variedad Packs',
            'taxfamilies_id' => 79,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 468,
            'name' => 'Las bombas de combustible',
            'taxfamilies_id' => 80,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 469,
            'name' => 'Almacenamiento de combustible',
            'taxfamilies_id' => 80,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 470,
            'name' => 'Los gases técnicos',
            'taxfamilies_id' => 81,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 471,
            'name' => 'Productos de lubricación',
            'taxfamilies_id' => 82,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 472,
            'name' => 'Compuestos protectores',
            'taxfamilies_id' => 82,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 473,
            'name' => 'Lubricantes/compuestos protectores variedad Packs',
            'taxfamilies_id' => 82,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 474,
            'name' => 'Las bombas de aceite lubricante y/o fluidos.',
            'taxfamilies_id' => 83,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 475,
            'name' => 'Almacenamiento de lubricantes y compuestos protectores',
            'taxfamilies_id' => 83,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 476,
            'name' => 'Variedad de lubricantes Packs',
            'taxfamilies_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 477,
            'name' => 'Los invertebrados',
            'taxfamilies_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 478,
            'name' => 'Vertebrados',
            'taxfamilies_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 479,
            'name' => 'Los dispositivos de seguridad personal',
            'taxfamilies_id' => 86,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 480,
            'name' => 'Fire/Químico Ambiental de los productos de seguridad',
            'taxfamilies_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 481,
            'name' => 'Desastres naturales o climáticos productos de seguridad',
            'taxfamilies_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 482,
            'name' => 'Sistemas de alarma',
            'taxfamilies_id' => 88,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 483,
            'name' => 'Puerta/Ventana/Productos de Seguridad perimetral',
            'taxfamilies_id' => 88,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 484,
            'name' => 'Home/Business Extintores',
            'taxfamilies_id' => 88,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 485,
            'name' => 'Home/Business Equipo de Vigilancia',
            'taxfamilies_id' => 88,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 486,
            'name' => 'Caja fuerte',
            'taxfamilies_id' => 88,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 487,
            'name' => 'Home/Business Seguridad/Seguridad/vigilancia variedad Packs',
            'taxfamilies_id' => 88,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 488,
            'name' => 'El control de la muchedumbre',
            'taxfamilies_id' => 88,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 489,
            'name' => 'Seguridad/Seguridad/vigilancia variedad Packs',
            'taxfamilies_id' => 89,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 490,
            'name' => 'Bebé Seguridad/Seguridad/vigilancia',
            'taxfamilies_id' => 90,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 491,
            'name' => 'Frascos de almacenamiento/cilindros (vacío).',
            'taxfamilies_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 492,
            'name' => 'Barriles de almacenamiento/tambores (vacío)',
            'taxfamilies_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 493,
            'name' => 'Cajas de almacenamiento/transporte/cajas/bandejas (vacío).',
            'taxfamilies_id' => 92,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 494,
            'name' => 'Los contenedores a granel (vacío)',
            'taxfamilies_id' => 93,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 495,
            'name' => 'Manejo de la plataforma admite/Convertidores',
            'taxfamilies_id' => 94,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 496,
            'name' => 'Agapanthus - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 497,
            'name' => 'Alchemilla - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 498,
            'name' => 'Alstroemeria - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 499,
            'name' => 'Anémona - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 500,
            'name' => 'El Anturio - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 501,
            'name' => 'Antirrino - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 502,
            'name' => 'Aster - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 503,
            'name' => 'Bouvardia - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 504,
            'name' => 'Celosía - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 505,
            'name' => 'Chamelaucium - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 506,
            'name' => 'Crisantemo - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 507,
            'name' => 'Cymbidium - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 508,
            'name' => 'Las flores cortadas variedad Packs',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 509,
            'name' => 'Dalia - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 510,
            'name' => 'Delphinium - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 511,
            'name' => 'Dianthus - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 512,
            'name' => 'Eryngium - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 513,
            'name' => 'Eustoma - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 514,
            'name' => 'Fresia - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 515,
            'name' => 'Gerbera - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 516,
            'name' => 'Gladiolus - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 517,
            'name' => 'Gypsophila - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 518,
            'name' => 'Helianthus - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 519,
            'name' => 'Hippeastrum - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 520,
            'name' => 'Hyacinthus - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 521,
            'name' => 'Hydrangea - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 522,
            'name' => 'Hypericum - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 523,
            'name' => 'Ilex - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 524,
            'name' => 'Iris - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 525,
            'name' => 'Lilium - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 526,
            'name' => 'Limonium - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 527,
            'name' => 'Matthiola - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 528,
            'name' => 'Narciso - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 529,
            'name' => 'Ornithogalum - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 530,
            'name' => 'Las Flores cortadas Otras',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 531,
            'name' => 'Paeonia - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 532,
            'name' => 'Phalaenopsis - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 533,
            'name' => 'Phlox - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 534,
            'name' => 'Pittosporum - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 535,
            'name' => 'Ranúnculos - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 536,
            'name' => 'Rosa - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 537,
            'name' => 'Solidago - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 538,
            'name' => 'Strelitzia - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 539,
            'name' => 'Syringa - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 540,
            'name' => 'Tanacetum - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 541,
            'name' => 'Trachelium - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 542,
            'name' => 'Tulipa - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 543,
            'name' => 'Vanda - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 544,
            'name' => 'Veronica - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 545,
            'name' => 'Viburnum - Flores',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 546,
            'name' => 'Zantedeschia Flores cortadas',
            'taxfamilies_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 547,
            'name' => 'Agapanthus - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 548,
            'name' => 'Corte de Anthurium verdes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 549,
            'name' => 'Cortar los espárragos verdes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 550,
            'name' => 'Aspidistra - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 551,
            'name' => 'Astilbe Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 552,
            'name' => 'Brassica - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 553,
            'name' => 'Carthamus - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 554,
            'name' => 'Corylus - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 555,
            'name' => 'Crocosmia - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 556,
            'name' => 'Cucumis - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 557,
            'name' => 'Cucurbita - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 558,
            'name' => 'Follajes variedad Packs',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 559,
            'name' => 'Dracaena - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 560,
            'name' => 'Corte de eucaliptos verdes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 561,
            'name' => 'Eupatorium - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 562,
            'name' => 'Fatsia Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 563,
            'name' => 'Gomphocarpus - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 564,
            'name' => 'Hydrangea - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 565,
            'name' => 'Ilex - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 566,
            'name' => 'Leucadendron - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 567,
            'name' => 'Lilium - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 568,
            'name' => 'Matthiola - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 569,
            'name' => 'Monstera - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 570,
            'name' => 'Otros follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 571,
            'name' => 'Cortar césped Panicum',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 572,
            'name' => 'Physalis - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 573,
            'name' => 'Pittosporum - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 574,
            'name' => 'Quercus - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 575,
            'name' => 'Rosa - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 576,
            'name' => 'Ruscus - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 577,
            'name' => 'Salix - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 578,
            'name' => 'Setaria - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 579,
            'name' => 'Strelitzia - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 580,
            'name' => 'Symphoricarpos - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 581,
            'name' => 'Syringa - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 582,
            'name' => 'Thlaspi - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 583,
            'name' => 'Viburnum - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 584,
            'name' => 'Zantedeschia - Follajes',
            'taxfamilies_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 585,
            'name' => 'Aechmea - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 586,
            'name' => 'Aeonium - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 587,
            'name' => 'Agapanthus - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 588,
            'name' => 'Alocasia - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 589,
            'name' => 'Aloe - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 590,
            'name' => 'Alstroemeria - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 591,
            'name' => 'Anémona - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 592,
            'name' => 'Angelonia - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 593,
            'name' => 'Anisodontea - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 594,
            'name' => 'Anthurium plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 595,
            'name' => 'Antirrino - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 596,
            'name' => 'Argyranthemum - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 597,
            'name' => 'Armeria - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 598,
            'name' => 'Aster - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 599,
            'name' => 'Astilbe plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 600,
            'name' => 'Aubrieta - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 601,
            'name' => 'Begonia - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 602,
            'name' => 'Bellis - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 603,
            'name' => 'Bidens - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 604,
            'name' => 'Bugambilias - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 605,
            'name' => 'Brachyscome - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 606,
            'name' => 'Brassica - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 607,
            'name' => 'Bromelia - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 608,
            'name' => 'Brugmansia - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 609,
            'name' => 'Calathea - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 610,
            'name' => 'Calibrachoa - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 611,
            'name' => 'Calocephalus - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 612,
            'name' => 'Campanula - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 613,
            'name' => 'Canna - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 614,
            'name' => 'Celosía - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 615,
            'name' => 'Chamaedorea - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 616,
            'name' => 'Chlorophytum plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 617,
            'name' => 'Crisantemo - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 618,
            'name' => 'Clivia - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 619,
            'name' => 'Cocos - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 620,
            'name' => 'Codiaeum - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 621,
            'name' => 'Cordyline - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 622,
            'name' => 'Coreopsis - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 623,
            'name' => 'Cortaderia - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 624,
            'name' => 'Cosmos - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 625,
            'name' => 'Cuphea - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 626,
            'name' => 'Cupressus - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 627,
            'name' => 'Cúrcuma - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 628,
            'name' => 'Cycas - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 629,
            'name' => 'Cyclamen - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 630,
            'name' => 'Cymbidium - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 631,
            'name' => 'Cyperus - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 632,
            'name' => 'Dalia - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 633,
            'name' => 'Delphinium - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 634,
            'name' => 'Dendrobium - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 635,
            'name' => 'Dianthus - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 636,
            'name' => 'Dicentra plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 637,
            'name' => 'Dieffenbachia - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 638,
            'name' => 'Dorotheanthus - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 639,
            'name' => 'Dracaena - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 640,
            'name' => 'Dypsis - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 641,
            'name' => 'Echeveria - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 642,
            'name' => 'Equinácea - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 643,
            'name' => 'Epipremnum plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 644,
            'name' => 'Euphorbia - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 645,
            'name' => 'Euryops - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 646,
            'name' => 'Fargesia - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 647,
            'name' => 'Felicia - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 648,
            'name' => 'Festuca - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 649,
            'name' => 'Fittonia - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 650,
            'name' => 'Fuchsia - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 651,
            'name' => 'Gardenia - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 652,
            'name' => 'Gaura - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 653,
            'name' => 'Gazania - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 654,
            'name' => 'Gentiana - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 655,
            'name' => 'Gerbera - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 656,
            'name' => 'Guzmania - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 657,
            'name' => 'Gypsophila - Plantas vivas',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 658,
            'name' => 'Plantas vivas ficus',
            'taxfamilies_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 659,
            'name' => 'Hedera - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 660,
            'name' => 'Helianthus - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 661,
            'name' => 'Helichrysum - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 662,
            'name' => 'Heliotropium - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 663,
            'name' => 'Helleborus - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 664,
            'name' => 'Heuchera - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 665,
            'name' => 'Hibiscus - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 666,
            'name' => 'Hippeastrum - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 667,
            'name' => 'Hordeum - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 668,
            'name' => 'Hosta - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 669,
            'name' => 'plantas vivas Howea',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 670,
            'name' => 'Hyacinthus - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 671,
            'name' => 'Hydrangea - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 672,
            'name' => 'Impatiens - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 673,
            'name' => 'Jasminum - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 674,
            'name' => 'Kalanchoe - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 675,
            'name' => 'Lantana - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 676,
            'name' => 'Leucanthemum - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 677,
            'name' => 'Lewisia - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 678,
            'name' => 'Lilium - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 679,
            'name' => 'Lithodora - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 680,
            'name' => 'Live Packs de Variedades Vegetales',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 681,
            'name' => 'plantas vivas Livistona',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 682,
            'name' => 'Lobelia - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 683,
            'name' => 'Lotus - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 684,
            'name' => 'Lupinus - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 685,
            'name' => 'Mandevilla - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 686,
            'name' => 'Medinilla - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 687,
            'name' => 'Miltonia - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 688,
            'name' => 'Muscari - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 689,
            'name' => 'Myosotis - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 690,
            'name' => 'Narciso - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 691,
            'name' => 'Nephrolepis - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 692,
            'name' => 'Nolina - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 693,
            'name' => 'Nymphaea - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 694,
            'name' => 'Oncidium - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 695,
            'name' => 'Orquídea - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 696,
            'name' => 'Ornithogalum - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 697,
            'name' => 'Osteospermum plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 698,
            'name' => 'Las plantas vivas Otros',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 699,
            'name' => 'El Pachira - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 700,
            'name' => 'Paeonia - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 701,
            'name' => 'Papaver - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 702,
            'name' => 'Paphiopedilum - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 703,
            'name' => 'Pelargonium - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 704,
            'name' => 'Pennisetum - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 705,
            'name' => 'Petunia - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 706,
            'name' => 'Phalaenopsis - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 707,
            'name' => 'Phlox plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 708,
            'name' => 'Phoenix - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 709,
            'name' => 'Platycodon - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 710,
            'name' => 'Plectranthus plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 711,
            'name' => 'Portulaca - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 712,
            'name' => 'Primula - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 713,
            'name' => 'Ranúnculos - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 714,
            'name' => 'Rhipsalidopsis - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 715,
            'name' => 'Rhododendron - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 716,
            'name' => 'Rosa - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 717,
            'name' => 'Saintpaulia - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 718,
            'name' => 'Salvia - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 719,
            'name' => 'plantas vivas Sansevieria',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 720,
            'name' => 'Sanvitalia - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 721,
            'name' => 'Saxifraga plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 722,
            'name' => 'Schefflera - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 723,
            'name' => 'Schlumbergera - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 724,
            'name' => 'Sedum - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 725,
            'name' => 'Sempervivum - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 726,
            'name' => 'Senecio - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 727,
            'name' => 'Sinningia plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 728,
            'name' => 'Solanum - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 729,
            'name' => 'Spathiphyllum plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 730,
            'name' => 'Stephanotis - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 731,
            'name' => 'Sutera - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 732,
            'name' => 'Tagetes - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 733,
            'name' => 'Tillandsia - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 734,
            'name' => 'Tulipa - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 735,
            'name' => 'Vanda - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 736,
            'name' => 'Verbena - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 737,
            'name' => 'Viola - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 738,
            'name' => 'Vriesea - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 739,
            'name' => 'XBurrageara - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 740,
            'name' => 'XCitrofortunella - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 741,
            'name' => 'Yuca - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 742,
            'name' => 'Zamioculcas - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 743,
            'name' => 'Zantedeschia - Plantas vivas',
            'taxfamilies_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 744,
            'name' => 'Bombillas/cormos o rizomas y tubérculos',
            'taxfamilies_id' => 99,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 745,
            'name' => 'Variedad de plantas Packs',
            'taxfamilies_id' => 100,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 746,
            'name' => 'Las semillas/esporas',
            'taxfamilies_id' => 101,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 747,
            'name' => 'Los arbustos y árboles',
            'taxfamilies_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 748,
            'name' => 'Verduras/Hongos plantas',
            'taxfamilies_id' => 103,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 749,
            'name' => 'Ramos',
            'taxfamilies_id' => 104,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxclasses')->insert([
            'id' => 750,
            'name' => 'Plantas - Listo para crecer',
            'taxfamilies_id' => 105,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

    }
}
