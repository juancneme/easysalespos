<?php

use Illuminate\Database\Seeder;

class TaxcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taxcategories')->insert([
            'id' => 1,
            'name' => 'Fruta - No Preparado / No procesado (congelado)',
            'taxclasses_id' => 128,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2,
            'name' => 'Fruta - No Preparado / No procesado (Larga conservación)',
            'taxclasses_id' => 130,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3,
            'name' => 'Verduras - Preparado / No procesado (congelado)',
            'taxclasses_id' => 129,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 4,
            'name' => 'Verduras - no preparadas / bruto (Larga conservación)',
            'taxclasses_id' => 131,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 5,
            'name' => 'Frutos secos / Semillas - No Preparado / No procesado (perecederos)',
            'taxclasses_id' => 132,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 6,
            'name' => 'Frutos secos / Semillas - No Preparado / no procesados ??(Larga conservación)',
            'taxclasses_id' => 133,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 7,
            'name' => 'Pescado - Preparado / Procesado (perecederos)',
            'taxclasses_id' => 26,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 8,
            'name' => 'Pescado - Preparado / Procesado (congelado)',
            'taxclasses_id' => 26,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 9,
            'name' => 'Pescado - Preparado / Procesado (Larga conservación)',
            'taxclasses_id' => 26,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 10,
            'name' => 'Mariscos - No Preparado / No procesado (perecederos)',
            'taxclasses_id' => 24,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 11,
            'name' => 'Mariscos - No Preparado / No procesado (congelado)',
            'taxclasses_id' => 24,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 12,
            'name' => 'Mariscos - No Preparado / No procesado (Larga conservación)',
            'taxclasses_id' => 24,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 13,
            'name' => 'Leche / Leche en Polvo (perecederos)',
            'taxclasses_id' => 33,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 14,
            'name' => 'Leche / Leche en Polvo (Larga conservación)',
            'taxclasses_id' => 33,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 15,
            'name' => 'Leche / Leche en Polvo (congelado)',
            'taxclasses_id' => 33,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 16,
            'name' => 'Sustitutos Queso / queso (perecederos)',
            'taxclasses_id' => 34,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 17,
            'name' => 'Sustitutos Queso / queso (Larga conservación)',
            'taxclasses_id' => 34,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 18,
            'name' => 'Sustitutos Queso / queso (congelado)',
            'taxclasses_id' => 34,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 19,
            'name' => 'Aceites Comestibles - Vegetal o Planta (Larga conservación)',
            'taxclasses_id' => 43,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 20,
            'name' => 'Grasas Comestibles - Animal (perecederos)',
            'taxclasses_id' => 44,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 21,
            'name' => 'Grasas Comestibles - Vegetable / Plant (Larga conservación)',
            'taxclasses_id' => 44,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 22,
            'name' => 'El azúcar / sustitutos del azúcar (Larga conservación)',
            'taxclasses_id' => 46,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 23,
            'name' => 'Jarabe / Melaza / Melaza (Larga conservación)',
            'taxclasses_id' => 46,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 24,
            'name' => 'Chocolate y chocolate / caramelo de azúcar Combinaciones - Confitería',
            'taxclasses_id' => 47,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 25,
            'name' => 'Caramelo de azúcar / Sustitutos de azúcar de caramelo confitería',
            'taxclasses_id' => 47,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 26,
            'name' => 'Hierbas / Especias (perecederos)',
            'taxclasses_id' => 49,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 27,
            'name' => 'Hierbas / Especias (Larga conservación)',
            'taxclasses_id' => 49,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 28,
            'name' => 'Macerador Extractos / Sal / Jugo (Larga conservación)',
            'taxclasses_id' => 49,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 29,
            'name' => 'vinagres',
            'taxclasses_id' => 50,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 30,
            'name' => 'cocinar Vinos',
            'taxclasses_id' => 50,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 31,
            'name' => 'Otras salsas / Condimentos / salado Ingredientes / Salados para Untar / adobos (perecederos)',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 32,
            'name' => 'Salsas - Cocción (perecederos)',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 33,
            'name' => 'Salsas - Cocción (congelado)',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 34,
            'name' => 'Salsas - Cocción (Larga conservación)',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 35,
            'name' => 'Pate (perecederos)',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 36,
            'name' => 'Mezclas para hornear / Cocina (perecederos)',
            'taxclasses_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 37,
            'name' => 'Suministros de cocción / cocina (perecederos)',
            'taxclasses_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 38,
            'name' => 'Bebés / Niños - Alimentos Especializados (Larga conservación)',
            'taxclasses_id' => 66,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 39,
            'name' => 'Bebés / Niños - Especializados bebidas (Larga conservación)',
            'taxclasses_id' => 66,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 40,
            'name' => 'Café - Frijoles / Tierra',
            'taxclasses_id' => 74,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 41,
            'name' => 'Café - Listo para Beber',
            'taxclasses_id' => 74,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 42,
            'name' => 'Café - Instant',
            'taxclasses_id' => 74,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 43,
            'name' => 'Té - bolsita / A granel',
            'taxclasses_id' => 74,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 44,
            'name' => 'Té - Instantánea',
            'taxclasses_id' => 74,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 45,
            'name' => 'Té - Listo para Beber',
            'taxclasses_id' => 74,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 46,
            'name' => 'Infusiones de Hierbas y de Frutas - En bolsita / A granel',
            'taxclasses_id' => 74,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 47,
            'name' => 'Tabaco - La masticación / Tabaco',
            'taxclasses_id' => 79,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 48,
            'name' => 'Las plantas acuáticas Preparado / No procesado (perecederos)',
            'taxclasses_id' => 25,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 49,
            'name' => 'Las plantas acuáticas Preparado / No procesado (congelado)',
            'taxclasses_id' => 25,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 50,
            'name' => 'Las plantas acuáticas Preparado / No procesado (Larga conservación)',
            'taxclasses_id' => 25,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 51,
            'name' => 'Hace kits de alcohol',
            'taxclasses_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 52,
            'name' => 'Haciendo suministros de alcohol',
            'taxclasses_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 53,
            'name' => 'Bebidas Alcohólicas Pre-mezcladas',
            'taxclasses_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 54,
            'name' => 'Los invertebrados acuáticos - Preparado / Procesado (congelado)',
            'taxclasses_id' => 27,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 55,
            'name' => 'Los invertebrados acuáticos - Preparado / Procesado (perecederos)',
            'taxclasses_id' => 27,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 56,
            'name' => 'Los invertebrados acuáticos - Preparado / Procesado (Larga conservación)',
            'taxclasses_id' => 27,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 57,
            'name' => 'Los invertebrados acuáticos - No Preparado / No procesado (congelado)',
            'taxclasses_id' => 30,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 58,
            'name' => 'Los invertebrados acuáticos - No Preparado / No procesado (perecederos)',
            'taxclasses_id' => 30,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 59,
            'name' => 'Los invertebrados acuáticos - No Preparado / No procesado (Larga conservación)',
            'taxclasses_id' => 30,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 60,
            'name' => 'Las plantas acuáticas Preparado / Procesado (congelado)',
            'taxclasses_id' => 29,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 61,
            'name' => 'Las plantas acuáticas Preparado / Procesado (perecederos)',
            'taxclasses_id' => 29,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 62,
            'name' => 'Las plantas acuáticas Preparado / Procesado (Larga conservación)',
            'taxclasses_id' => 29,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 63,
            'name' => 'Mezclas para hornear / Cocina (congelados)',
            'taxclasses_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 64,
            'name' => 'Mezclas para hornear / Horno (Larga conservación)',
            'taxclasses_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 65,
            'name' => 'Suministros de cocción / cocina (congelado)',
            'taxclasses_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 66,
            'name' => 'Suministros de cocción / cocina (Larga conservación)',
            'taxclasses_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 67,
            'name' => 'cerveza',
            'taxclasses_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 68,
            'name' => 'Galletas / Cookies (perecederos)',
            'taxclasses_id' => 57,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 69,
            'name' => 'Galletas / cookies (Larga conservación)',
            'taxclasses_id' => 57,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 70,
            'name' => 'Pan (congelado)',
            'taxclasses_id' => 55,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 71,
            'name' => 'Pan (perecederos)',
            'taxclasses_id' => 55,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 72,
            'name' => 'Pan (Larga conservación)',
            'taxclasses_id' => 55,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 73,
            'name' => 'Panes Secos (Larga conservación)',
            'taxclasses_id' => 57,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 74,
            'name' => 'Mantequilla / Mantequilla y Sustitutos (congelado)',
            'taxclasses_id' => 35,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 75,
            'name' => 'Mantequilla / Mantequilla y Sustitutos (Perecedero)',
            'taxclasses_id' => 35,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 76,
            'name' => 'Mantequilla / Mantequilla y Sustitutos (Larga conservación)',
            'taxclasses_id' => 35,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 77,
            'name' => 'Pasteles - Dulce (congelado)',
            'taxclasses_id' => 56,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 78,
            'name' => 'Pasteles - Dulce (perecederos)',
            'taxclasses_id' => 56,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 79,
            'name' => 'Pasteles - Dulce (Larga conservación)',
            'taxclasses_id' => 56,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 80,
            'name' => 'Chips / patatas fritas / mezclas de snack - Natural / extruido (Larga conservación)',
            'taxclasses_id' => 61,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 81,
            'name' => 'Chocolate / Cacao / Malta - No Listo para Beber',
            'taxclasses_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 82,
            'name' => 'Chocolate / Cacao / Malta - Listo para Beber',
            'taxclasses_id' => 76,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 83,
            'name' => 'Salsas picantes / condimentos (Larga conservación)',
            'taxclasses_id' => 52,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 84,
            'name' => 'Manzana / pera de Bebidas Alcohólicas - Espumoso',
            'taxclasses_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 85,
            'name' => 'cigarrillos',
            'taxclasses_id' => 79,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 86,
            'name' => 'cigarros',
            'taxclasses_id' => 79,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 87,
            'name' => 'Para untar a base de confitería (Larga conservación)',
            'taxclasses_id' => 63,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 88,
            'name' => 'Los sustitutos de crema / nata (congelado)',
            'taxclasses_id' => 36,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 89,
            'name' => 'Los sustitutos de crema / nata (perecederos)',
            'taxclasses_id' => 36,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 90,
            'name' => 'Crema / Crema y Sustitutos (Larga conservación)',
            'taxclasses_id' => 36,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 91,
            'name' => 'Las bebidas Lácteos / Lácteos sustitutos Basado - Listo para Beber (perecederos)',
            'taxclasses_id' => 76,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 92,
            'name' => 'Bebidas a Base de Lácteos / Sustitutos Lácteos - Listo para beber (Larga conservación)',
            'taxclasses_id' => 76,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 93,
            'name' => 'Salsas Postre / Decoraciones / Rellenos (congelados)',
            'taxclasses_id' => 62,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 94,
            'name' => 'Salsas Postre / Decoraciones / Rellenos (perecederos)',
            'taxclasses_id' => 62,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 95,
            'name' => 'Salsas Postre / Ingredientes / Rellenos (Larga conservación)',
            'taxclasses_id' => 62,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 96,
            'name' => 'Postres (congelado)',
            'taxclasses_id' => 62,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 97,
            'name' => 'Postres (perecederos)',
            'taxclasses_id' => 62,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 98,
            'name' => 'Vendajes / Dips (perecederos)',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 99,
            'name' => 'Vendajes / Dips (Larga conservación)',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 100,
            'name' => 'Las bebidas con sabor - Listo para Beber',
            'taxclasses_id' => 76,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 101,
            'name' => 'Las bebidas con sabor - No Listo para Beber',
            'taxclasses_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 102,
            'name' => 'Harina - Cereal / Pulso (Larga conservación)',
            'taxclasses_id' => 80,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 103,
            'name' => 'Fruta - Preparado / Procesado (congelado)',
            'taxclasses_id' => 20,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 104,
            'name' => 'Fruta - Preparado / Procesado (perecederos)',
            'taxclasses_id' => 20,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 105,
            'name' => 'Fruta - Preparado / Procesado (Larga conservación)',
            'taxclasses_id' => 20,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 106,
            'name' => 'Frutas / frutos secos / Semillas - Mezclas Preparado / Procesado (Larga conservación)',
            'taxclasses_id' => 19,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 107,
            'name' => 'Infusiones de Hierbas y de Frutas - Instantánea',
            'taxclasses_id' => 74,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 108,
            'name' => 'Granos / Cereales - No listo para comer - (Larga conservación)',
            'taxclasses_id' => 80,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 109,
            'name' => 'Hierbas / Especias (congelados)',
            'taxclasses_id' => 49,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 110,
            'name' => 'Miel (Larga conservación)',
            'taxclasses_id' => 63,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 111,
            'name' => 'hielo',
            'taxclasses_id' => 76,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 112,
            'name' => 'Helado / Postres Helados (Congelado)',
            'taxclasses_id' => 62,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 113,
            'name' => 'Helado / Postres Helados (Larga conservación)',
            'taxclasses_id' => 62,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 114,
            'name' => 'Mermeladas / Mermeladas (Larga conservación)',
            'taxclasses_id' => 63,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 115,
            'name' => 'Jugo de frutas - Listo para Beber (perecederos)',
            'taxclasses_id' => 76,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 116,
            'name' => 'Jugo de frutas - Listo para Beber (Larga conservación)',
            'taxclasses_id' => 76,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 117,
            'name' => 'Jugos de frutas - Listo para Beber (perecederos)',
            'taxclasses_id' => 76,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 118,
            'name' => 'El jugo de frutas Bebidas - Listo para Beber (Larga conservación)',
            'taxclasses_id' => 76,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 119,
            'name' => 'licores',
            'taxclasses_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 120,
            'name' => 'El agua envasada',
            'taxclasses_id' => 76,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 121,
            'name' => 'Frutos secos / Semillas - Preparado / Procesado (perecederos)',
            'taxclasses_id' => 18,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 122,
            'name' => 'Frutos secos / Semillas - Preparado / Procesado (Larga conservación)',
            'taxclasses_id' => 18,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 123,
            'name' => 'Aceitunas (perecederos)',
            'taxclasses_id' => 52,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 124,
            'name' => 'Aceitunas (Larga conservación)',
            'taxclasses_id' => 52,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 125,
            'name' => 'Pasta / Tallarines - Listo para comer (perecederos)',
            'taxclasses_id' => 65,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 126,
            'name' => 'Pasta / Tallarines - Listo para comer (Larga conservación)',
            'taxclasses_id' => 65,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 127,
            'name' => 'Pasta / Tallarines - No Listo Para Comer (Larga conservación)',
            'taxclasses_id' => 65,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 128,
            'name' => 'Vegetales en escabeche',
            'taxclasses_id' => 52,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 129,
            'name' => 'Tartas / Empanadas - Sweet (congelados)',
            'taxclasses_id' => 56,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 130,
            'name' => 'Tartas / Empanadas - Sweet (perecederos)',
            'taxclasses_id' => 56,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 131,
            'name' => 'Tartas / Empanadas - Dulce (Larga conservación)',
            'taxclasses_id' => 56,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 132,
            'name' => 'Tartas / Empanadas / Pizzas / Quiches - Salado (congelados)',
            'taxclasses_id' => 58,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 133,
            'name' => 'Tartas / Empanadas / Pizzas / Quiches - Salado (perecederos)',
            'taxclasses_id' => 58,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 134,
            'name' => 'Tartas / Empanadas / Pizzas / Quiches - Salado (Larga conservación)',
            'taxclasses_id' => 58,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 135,
            'name' => 'Palomitas de maíz (Larga conservación)',
            'taxclasses_id' => 61,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 136,
            'name' => 'Sándwiches / Lleno Rollos / Wraps (congelado)',
            'taxclasses_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 137,
            'name' => 'Sándwiches / Lleno Rollos / Wraps (perecederos)',
            'taxclasses_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 138,
            'name' => 'Mariscos Preparado / Procesado (congelado)',
            'taxclasses_id' => 28,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 139,
            'name' => 'Mariscos Preparado / Procesado (perecederos)',
            'taxclasses_id' => 28,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 140,
            'name' => 'Mariscos Preparado / Procesado (Larga conservación)',
            'taxclasses_id' => 28,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 141,
            'name' => 'Sopas - Preparado (congelados)',
            'taxclasses_id' => 60,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 142,
            'name' => 'Sopas - Preparado (perecederos)',
            'taxclasses_id' => 60,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 143,
            'name' => 'Sopas - Preparado (Larga conservación)',
            'taxclasses_id' => 60,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 144,
            'name' => 'Espíritu',
            'taxclasses_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 145,
            'name' => 'Las bebidas deportivas - Rehidratación (No listo para beber)',
            'taxclasses_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 146,
            'name' => 'Las bebidas deportivas - Rehidratación (listo para beber)',
            'taxclasses_id' => 76,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 147,
            'name' => 'Estimulantes / Bebidas de Energía - Listo para Beber',
            'taxclasses_id' => 76,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 148,
            'name' => 'Tabaco - Loose',
            'taxclasses_id' => 79,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 149,
            'name' => 'Tabaco - Sólido',
            'taxclasses_id' => 79,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 150,
            'name' => 'Verduras - Preparado / Procesado (congelado)',
            'taxclasses_id' => 21,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 151,
            'name' => 'Verduras - Preparado / Procesado (perecederos)',
            'taxclasses_id' => 21,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 152,
            'name' => 'Verduras - Preparado / Procesado (Larga conservación)',
            'taxclasses_id' => 21,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 153,
            'name' => 'Vino - Fortificado',
            'taxclasses_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 154,
            'name' => 'Vino - Espumoso',
            'taxclasses_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 155,
            'name' => 'Vino - Still',
            'taxclasses_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 156,
            'name' => 'Yogur / Yogur y Sustitutos (congelado)',
            'taxclasses_id' => 37,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 157,
            'name' => 'Yogur / Yogur y Sustitutos (Perecedero)',
            'taxclasses_id' => 37,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 158,
            'name' => 'Yogur / Yogur y Sustitutos (Larga conservación)',
            'taxclasses_id' => 37,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 159,
            'name' => 'Otras salsas / Condimentos / salado Ingredientes / Salados para Untar / adobos (Larga conservaci',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 160,
            'name' => 'Pescado - Preparado / No procesado (congelado)',
            'taxclasses_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 161,
            'name' => 'Pescado - Preparado / No procesado (perecederos)',
            'taxclasses_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 162,
            'name' => 'Pescado - Preparado / No procesado (Larga conservación)',
            'taxclasses_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 163,
            'name' => 'Cereales Productos - Listo para comer (Larga conservación)',
            'taxclasses_id' => 81,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 164,
            'name' => 'Cereales productos - No Listo Para Comer (Larga conservación)',
            'taxclasses_id' => 81,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 165,
            'name' => 'Productos de cereales - Listo para comer (perecederos)',
            'taxclasses_id' => 81,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 166,
            'name' => 'Cereales / barritas de muesli',
            'taxclasses_id' => 81,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 167,
            'name' => 'Productos a base de verduras / Comidas - Listo para comer (Larga conservación)',
            'taxclasses_id' => 67,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 168,
            'name' => 'Productos a base de verduras / Comidas - Listo para comer (perecederos)',
            'taxclasses_id' => 67,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 169,
            'name' => 'Productos vegetales a base / Comidas - No listo para comer (perecederos)',
            'taxclasses_id' => 67,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 170,
            'name' => 'Productos vegetales a base / Comidas - No listo para comer (congelados)',
            'taxclasses_id' => 67,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 171,
            'name' => 'Productos del reino vegetal / Comidas Basado - No Listo Para Comer (Larga conservación)',
            'taxclasses_id' => 67,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 172,
            'name' => 'Productos a base de cereales / Comidas - Listo para comer - Salado (perecederos)',
            'taxclasses_id' => 68,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 173,
            'name' => 'Productos a base de cereales / Comidas - Listo para comer - Salado (Larga conservación)',
            'taxclasses_id' => 68,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 174,
            'name' => 'Grano / productos de comidas a base - No listo para comer - Salado (perecederos)',
            'taxclasses_id' => 68,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 175,
            'name' => 'Grano / productos de comidas a base - No listo para comer - Salado (congelado)',
            'taxclasses_id' => 68,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 176,
            'name' => 'Grano / productos de comidas a base - No listo para comer - Salado (Larga conservación)',
            'taxclasses_id' => 68,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 177,
            'name' => 'Productos a base de masa / Comidas - Listo para comer - Salado (perecederos)',
            'taxclasses_id' => 69,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 178,
            'name' => 'Productos a base de masa / Comidas - Listo para comer - Salado (Larga conservación)',
            'taxclasses_id' => 69,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 179,
            'name' => 'Productos / masa comidas a base - No listo para comer - Salado (perecederos)',
            'taxclasses_id' => 69,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 180,
            'name' => 'Productos / masa comidas a base - No listo para comer - Salado (congelado)',
            'taxclasses_id' => 69,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 181,
            'name' => 'Productos / masa comidas a base - No listo para comer - Salado (Larga conservación)',
            'taxclasses_id' => 69,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 182,
            'name' => 'Artículos de fumar',
            'taxclasses_id' => 79,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 183,
            'name' => 'Galletas / Cookies (congelados)',
            'taxclasses_id' => 57,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 184,
            'name' => 'Panes Secos (congelado)',
            'taxclasses_id' => 57,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 185,
            'name' => 'Pate (Larga conservación)',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 186,
            'name' => 'Jugo de frutas - No listo para beber (congelado)',
            'taxclasses_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 187,
            'name' => 'Jugo de frutas - No listo para beber (Larga conservación)',
            'taxclasses_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 188,
            'name' => 'Fruit Juice Drinks - No listo para beber (Larga conservación)',
            'taxclasses_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 189,
            'name' => 'Bebidas a Base de Lácteos / Sustitutos Lácteos - No listo para beber (Larga conservación)',
            'taxclasses_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 190,
            'name' => 'Bebidas Energéticas / Estimulantes - No Listo para Beber',
            'taxclasses_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 191,
            'name' => 'Postres (Larga conservación)',
            'taxclasses_id' => 62,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 192,
            'name' => 'Infusiones Hierbas y de Frutas - Listo para Beber',
            'taxclasses_id' => 74,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 193,
            'name' => 'Granos / Cereal - No listo para comer - (congelados)',
            'taxclasses_id' => 80,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 194,
            'name' => 'Granos / Cereal - No listo para comer - (perecederos)',
            'taxclasses_id' => 80,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 195,
            'name' => 'Granos / cereales - Listo para comer - (perecederos)',
            'taxclasses_id' => 80,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 196,
            'name' => 'Pasta / Tallarines - No listo para comer (perecederos)',
            'taxclasses_id' => 65,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 197,
            'name' => 'Pasta / Tallarines - No listo para comer (congelados)',
            'taxclasses_id' => 65,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 198,
            'name' => 'Granos / cereales - Listo para comer - (Larga conservación)',
            'taxclasses_id' => 80,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 199,
            'name' => 'Tampones - Higiene Femenina',
            'taxclasses_id' => 154,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 200,
            'name' => 'La incontinencia en adultos: Consumibles',
            'taxclasses_id' => 155,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 201,
            'name' => 'Cuidados para después de afeitarse',
            'taxclasses_id' => 141,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 202,
            'name' => 'Anti-SIDA spot (sin alimentación)',
            'taxclasses_id' => 141,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 203,
            'name' => 'Aditivos para el baño',
            'taxclasses_id' => 143,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 204,
            'name' => 'Productos de iluminación/Blanqueamiento',
            'taxclasses_id' => 145,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 205,
            'name' => 'Limpieza/Lavado/Soap - Cuerpo',
            'taxclasses_id' => 143,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 206,
            'name' => 'Limpiadores/Removedores de cosméticos (sin alimentación)',
            'taxclasses_id' => 141,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 207,
            'name' => 'Uñas - Limpiadores Removedores / Cosméticos',
            'taxclasses_id' => 149,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 208,
            'name' => 'Accesorios de limpieza/lavado - Personal',
            'taxclasses_id' => 143,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 209,
            'name' => 'Productos de algodón',
            'taxclasses_id' => 153,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 210,
            'name' => 'Dentadura/ortodoncia - Cuidado',
            'taxclasses_id' => 156,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 211,
            'name' => 'Limpieza de prótesis/ortodoncia',
            'taxclasses_id' => 156,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 212,
            'name' => 'Los antitranspirantes y desodorantes',
            'taxclasses_id' => 153,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 213,
            'name' => 'Depilación Depilación/(sin alimentación)',
            'taxclasses_id' => 145,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 214,
            'name' => 'Ear/Cuidado Nasal',
            'taxclasses_id' => 153,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 215,
            'name' => 'Exfoliantes/máscaras',
            'taxclasses_id' => 141,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 216,
            'name' => 'Cabello - Falso',
            'taxclasses_id' => 146,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 217,
            'name' => 'Higiene Femenina - Accesorios',
            'taxclasses_id' => 154,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 218,
            'name' => 'Color de cabello',
            'taxclasses_id' => 146,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 219,
            'name' => 'acondicionador de cabello/Tratamiento',
            'taxclasses_id' => 146,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 220,
            'name' => 'Cabello - Permanente',
            'taxclasses_id' => 146,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 221,
            'name' => 'Depilación/afeitado - Accesorios',
            'taxclasses_id' => 145,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 222,
            'name' => 'Eliminación del vello - Cuidado',
            'taxclasses_id' => 145,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 223,
            'name' => 'El bronceado sin sol - tópica (sin alimentación)',
            'taxclasses_id' => 142,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 224,
            'name' => 'Cuidado de la piel/productos hidratantes',
            'taxclasses_id' => 141,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 225,
            'name' => 'Uñas - Sida (sin alimentación)',
            'taxclasses_id' => 149,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 226,
            'name' => 'Clavos - Falso',
            'taxclasses_id' => 149,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 227,
            'name' => 'Cosméticos - clavos',
            'taxclasses_id' => 149,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 228,
            'name' => 'Clavos - Tratamientos',
            'taxclasses_id' => 149,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 229,
            'name' => 'Accesorios de higiene de enfermería',
            'taxclasses_id' => 154,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 230,
            'name' => 'Cuidado bucal - Accesorios',
            'taxclasses_id' => 156,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 231,
            'name' => 'Fragancias',
            'taxclasses_id' => 150,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 232,
            'name' => 'Champú de cabello',
            'taxclasses_id' => 146,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 233,
            'name' => 'cuchillas de afeitado',
            'taxclasses_id' => 145,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 234,
            'name' => 'navajas de afeitar - desechable (sin alimentación)',
            'taxclasses_id' => 145,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 235,
            'name' => 'Los productos de protección solar',
            'taxclasses_id' => 142,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 236,
            'name' => 'Piel polvo secado',
            'taxclasses_id' => 141,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 237,
            'name' => 'Papel higiénico',
            'taxclasses_id' => 153,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 238,
            'name' => 'Toallas higiénicas femeninas/desfibrilación',
            'taxclasses_id' => 154,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 239,
            'name' => 'Sida cosméticos/accesorios',
            'taxclasses_id' => 148,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 240,
            'name' => 'Cabello - Accesorios',
            'taxclasses_id' => 146,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 241,
            'name' => 'Cabello - Estilos (sin alimentación)',
            'taxclasses_id' => 146,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 242,
            'name' => 'Limpieza Dental',
            'taxclasses_id' => 156,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 243,
            'name' => 'Cuidado bucal - Sida (sin alimentación)',
            'taxclasses_id' => 156,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 244,
            'name' => 'Uñas - Accesorios (sin alimentación)',
            'taxclasses_id' => 149,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 245,
            'name' => 'Productos para el Acelerador de bronceado',
            'taxclasses_id' => 142,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 246,
            'name' => 'Accesorios de limpieza',
            'taxclasses_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 247,
            'name' => 'Limpieza de zapatos/Cuidado preparativos',
            'taxclasses_id' => 186,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 248,
            'name' => 'Ambientadores/desodorantes (sin alimentación)',
            'taxclasses_id' => 9,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 249,
            'name' => 'Limpiadores de superficies',
            'taxclasses_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 250,
            'name' => 'Limpieza y cuidado del plato - Automático',
            'taxclasses_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 251,
            'name' => '/Control de plagas de insectos, barreras/trampas',
            'taxclasses_id' => 14,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 252,
            'name' => 'Tratamientos de drenaje/Pipe Unblockers',
            'taxclasses_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 253,
            'name' => 'Los detergentes para ropa',
            'taxclasses_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 254,
            'name' => 'Los productos de limpieza de WC',
            'taxclasses_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 255,
            'name' => 'Servicio de lavandería Cuidado del color',
            'taxclasses_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 256,
            'name' => 'Tintes de color/zapata',
            'taxclasses_id' => 186,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 257,
            'name' => 'Calzado - piezas de recambio y accesorios',
            'taxclasses_id' => 186,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 258,
            'name' => 'Cuidado/Protección de superficie',
            'taxclasses_id' => 12,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 259,
            'name' => 'Plaguicidas/insecticidas/Rodenticidas',
            'taxclasses_id' => 14,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 260,
            'name' => 'No repelentes personales',
            'taxclasses_id' => 14,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 261,
            'name' => 'Molde/removedores de moho',
            'taxclasses_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 262,
            'name' => 'Desinfectantes',
            'taxclasses_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 263,
            'name' => 'Desincrustadores',
            'taxclasses_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 264,
            'name' => 'Quitamanchas',
            'taxclasses_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 265,
            'name' => 'Servicio de lavandería Servicio de tintorería',
            'taxclasses_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 266,
            'name' => 'Proteccion y cuidado para loza',
            'taxclasses_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 267,
            'name' => 'Los ablandadores de agua',
            'taxclasses_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 268,
            'name' => 'Toallas de papel',
            'taxclasses_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 269,
            'name' => 'Almohadillas de incontinencia de adultos',
            'taxclasses_id' => 155,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 270,
            'name' => 'Higiene Femenina - Tazas',
            'taxclasses_id' => 154,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 271,
            'name' => 'Higiene Femenina Panty Liners',
            'taxclasses_id' => 154,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 272,
            'name' => 'Toners/astringentes',
            'taxclasses_id' => 141,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 273,
            'name' => 'Pañuelos tisú facial (desechables)',
            'taxclasses_id' => 153,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 274,
            'name' => 'Piel aclaración',
            'taxclasses_id' => 148,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 275,
            'name' => 'Alimentación de bebés - vajillas',
            'taxclasses_id' => 293,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 276,
            'name' => 'Alimentación de bebés - Botellas',
            'taxclasses_id' => 293,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 277,
            'name' => 'Accesorios de alimentación para bebés',
            'taxclasses_id' => 293,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 278,
            'name' => 'Alimentación de bebés Sida (sin alimentación)',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 279,
            'name' => 'Pañales (desechables)',
            'taxclasses_id' => 158,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 280,
            'name' => 'Bebé inserta/desfibrilación',
            'taxclasses_id' => 158,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 281,
            'name' => 'Pañales Accesorios',
            'taxclasses_id' => 158,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 282,
            'name' => 'Productos de seguridad para el baño del bebé',
            'taxclasses_id' => 315,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 283,
            'name' => 'Cambiador de bebé',
            'taxclasses_id' => 315,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 284,
            'name' => 'Baby Carrier',
            'taxclasses_id' => 270,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 285,
            'name' => 'Protección de seguridad del bebé (sin alimentación)',
            'taxclasses_id' => 490,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 286,
            'name' => 'Productos de higiene para bebés',
            'taxclasses_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 287,
            'name' => 'Bebidas Pet (congelado)',
            'taxclasses_id' => 5,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 288,
            'name' => 'Alimento para mascotas (congelado)',
            'taxclasses_id' => 6,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 289,
            'name' => 'Pet Grooming Sida',
            'taxclasses_id' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 290,
            'name' => 'Pet/Higiene Protección sanitaria',
            'taxclasses_id' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 291,
            'name' => 'Suplementos Nutricionales Pet',
            'taxclasses_id' => 2,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 292,
            'name' => 'Tratamiento de parásitos Pet',
            'taxclasses_id' => 2,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 293,
            'name' => ' Ayuda / accesorios para acuarios (no accionados)',
            'taxclasses_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 294,
            'name' => 'Los alimentos perecederos (PET)',
            'taxclasses_id' => 6,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 295,
            'name' => 'Alimento para mascotas (Estantería estable)',
            'taxclasses_id' => 6,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 296,
            'name' => 'Bebidas Pet (Perecederos)',
            'taxclasses_id' => 5,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 297,
            'name' => 'Bebidas Pet (Estantería estable)',
            'taxclasses_id' => 5,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 298,
            'name' => 'Lejía',
            'taxclasses_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 299,
            'name' => 'Cosméticos - cutis',
            'taxclasses_id' => 148,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 300,
            'name' => 'Cosméticos - Ojos',
            'taxclasses_id' => 148,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 301,
            'name' => 'Cosméticos - labios',
            'taxclasses_id' => 148,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 302,
            'name' => 'Preparados para el afeitado',
            'taxclasses_id' => 145,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 303,
            'name' => 'Respiración/Enjuagues Ambientadores',
            'taxclasses_id' => 156,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 304,
            'name' => 'Cadena/Vínculos',
            'taxclasses_id' => 284,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 305,
            'name' => 'Tijeras de cocina',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 306,
            'name' => 'Herramientas Firelighting / cerillas.',
            'taxclasses_id' => 465,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 307,
            'name' => 'Baterías',
            'taxclasses_id' => 363,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 308,
            'name' => 'Convertidores/Variadores/reguladores/Transformadores',
            'taxclasses_id' => 362,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 309,
            'name' => 'Cargadores',
            'taxclasses_id' => 363,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 310,
            'name' => 'Fusibles',
            'taxclasses_id' => 362,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 311,
            'name' => 'Tapones',
            'taxclasses_id' => 361,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 312,
            'name' => 'Las bombillas/tubos/Diodos luminosos',
            'taxclasses_id' => 366,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 313,
            'name' => 'Utensilios de cocina (desechables)',
            'taxclasses_id' => 287,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 314,
            'name' => 'Velas',
            'taxclasses_id' => 310,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 315,
            'name' => 'Kit Removedor de Scratch/reparaciones',
            'taxclasses_id' => 12,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 316,
            'name' => 'Filtros de papel',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 317,
            'name' => 'Cabello - Sida (sin alimentación)',
            'taxclasses_id' => 146,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 318,
            'name' => 'Personal/masaje de calentamiento (sin alimentación)',
            'taxclasses_id' => 159,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 319,
            'name' => 'Tonificación corporal reafirmante/productos (alimentación)',
            'taxclasses_id' => 159,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 320,
            'name' => ' Caja para mascotas/Ropa de cama (desechables)',
            'taxclasses_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 321,
            'name' => 'Toallitas - Personal',
            'taxclasses_id' => 143,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 322,
            'name' => 'Grasas Comestibles - Animal (Larga conservación)',
            'taxclasses_id' => 44,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 323,
            'name' => 'Bebés / Niños - Fórmula (Larga conservación)',
            'taxclasses_id' => 66,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 324,
            'name' => 'Pate (congelado)',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 325,
            'name' => 'Otras salsas / Condimentos / salado Ingredientes / Salados para Untar / adobos (congelado)',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 326,
            'name' => 'Stock líquido / Huesos (Larga conservación)',
            'taxclasses_id' => 49,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 327,
            'name' => 'Stock líquido / Huesos (perecederos)',
            'taxclasses_id' => 49,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 328,
            'name' => 'Stock líquido / Huesos (congelado)',
            'taxclasses_id' => 49,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 329,
            'name' => 'Los esmaltes de alimentos (Larga conservación)',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 330,
            'name' => 'Vestuarios / Mojar (congelados)',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 331,
            'name' => 'Cigarrillos de hierbas - No Tabaco',
            'taxclasses_id' => 79,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 332,
            'name' => 'Grasas Comestibles - Vegetable / Plant (perecederos)',
            'taxclasses_id' => 44,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 333,
            'name' => 'Chutneys / condimentos (congelados)',
            'taxclasses_id' => 52,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 334,
            'name' => 'Chutneys / condimentos (perecederos)',
            'taxclasses_id' => 52,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 335,
            'name' => 'No de uva fermentado Bebidas Alcohólicas - Still',
            'taxclasses_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 336,
            'name' => 'Cordiales alcohólicas / jarabes',
            'taxclasses_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 337,
            'name' => 'Alimentos / Bebidas Packs / Tabaco Variedades',
            'taxclasses_id' => 83,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 338,
            'name' => 'Paquetes de Bebidas Alcohólicas Variedades',
            'taxclasses_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 339,
            'name' => 'Café / Té / Sustitutos Variety Packs',
            'taxclasses_id' => 74,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 340,
            'name' => 'Bebidas no Alcohólicas Surtidos - No Listo para Beber',
            'taxclasses_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 341,
            'name' => 'Bebidas no Alcohólicas Surtidos - Listo para Beber',
            'taxclasses_id' => 76,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 342,
            'name' => 'Mezclas para hornear / cocinar / Suministros Surtidos',
            'taxclasses_id' => 54,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 343,
            'name' => 'Galletas / cookies Variety Packs',
            'taxclasses_id' => 57,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 344,
            'name' => 'Packs dulce Productos de Panadería',
            'taxclasses_id' => 56,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 345,
            'name' => 'Pan / Productos de Panadería Packs',
            'taxclasses_id' => 59,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 346,
            'name' => 'Granos / Packs Harina de variedades',
            'taxclasses_id' => 80,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 347,
            'name' => 'Cereales Procesados ??Surtidos',
            'taxclasses_id' => 81,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 348,
            'name' => 'Cereales / Granos / Legumbres paquetes de productos de variedad',
            'taxclasses_id' => 82,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 349,
            'name' => 'Paquetes de Productos de Confitería Variedades',
            'taxclasses_id' => 47,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 350,
            'name' => 'Azúcares / Sustitutos de Azúcar paquetes de productos de variedad',
            'taxclasses_id' => 46,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 351,
            'name' => 'Frutas / frutos secos / Semillas de combinación Surtidos',
            'taxclasses_id' => 19,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 352,
            'name' => 'Frutas / Verduras / Frutos secos / Semillas Surtidos',
            'taxclasses_id' => 22,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 353,
            'name' => 'Leche / Mantequilla / Crema / Yogur / Queso / Packs Huevos / Sustitutos Variedades',
            'taxclasses_id' => 38,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 354,
            'name' => 'Grasas Comestibles Surtidos',
            'taxclasses_id' => 44,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 355,
            'name' => 'Aceites / Grasas Surtidos',
            'taxclasses_id' => 45,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 356,
            'name' => 'Bebé / niño - Alimentos / Bebidas Variety Packs',
            'taxclasses_id' => 66,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 357,
            'name' => 'Postres / Packs Postre Ingredientes Variedades',
            'taxclasses_id' => 62,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 358,
            'name' => 'Paquetes de aperitivos Variedades',
            'taxclasses_id' => 61,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 359,
            'name' => 'Packs variedad de alimentos Preparados / Conservados',
            'taxclasses_id' => 70,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 360,
            'name' => 'Paquetes de marisco Variedades',
            'taxclasses_id' => 31,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 361,
            'name' => 'Hierbas / Especias / Extractos Packs',
            'taxclasses_id' => 49,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 362,
            'name' => 'Encurtidos / Packs condimentos / Chutneys / Aceitunas de la variedad',
            'taxclasses_id' => 52,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 363,
            'name' => 'Salsas / Untar / Mojar / Condimentos Variety Packs',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 364,
            'name' => 'Vinagre / Cocina paquetes de Vinos Variedades',
            'taxclasses_id' => 50,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 365,
            'name' => 'Condimentos / Conservantes / Extractos Packs',
            'taxclasses_id' => 53,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 366,
            'name' => 'Productos Tabaco / Accesorios Paquetes de Variedades',
            'taxclasses_id' => 79,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 367,
            'name' => 'Untar Dulces Surtidos',
            'taxclasses_id' => 63,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 368,
            'name' => 'Productos de Confitería / Productos edulcorantes paquetes de Variedades',
            'taxclasses_id' => 48,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 369,
            'name' => 'Paquetes de Bebidas Variedad',
            'taxclasses_id' => 78,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 370,
            'name' => 'Los invertebrados acuáticos / Pescado / Mariscos / Mariscos Mezclas - Preparado / Procesado (con',
            'taxclasses_id' => 32,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 371,
            'name' => 'Los invertebrados acuáticos / Pescado / Mariscos / Mariscos Mezclas - Preparado / Procesado (per',
            'taxclasses_id' => 32,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 372,
            'name' => 'Los invertebrados acuáticos / Pescado / Mariscos / Mariscos Mezclas - Preparado / Procesado (Lar',
            'taxclasses_id' => 32,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 373,
            'name' => 'Los invertebrados acuáticos / Pescado / Mariscos / Mariscos Mezclas - No Preparado / No procesad',
            'taxclasses_id' => 32,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 374,
            'name' => 'Los invertebrados acuáticos / Pescado / Mariscos / Mariscos Mezclas - No Preparado / No procesad',
            'taxclasses_id' => 32,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 375,
            'name' => 'Los invertebrados acuáticos / Pescado / Mariscos / Mariscos Mezclas - No Preparado / No procesad',
            'taxclasses_id' => 32,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 376,
            'name' => 'Baby Control de seguridad (sin alimentación)',
            'taxclasses_id' => 490,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 377,
            'name' => 'Vajilla desechable',
            'taxclasses_id' => 288,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 378,
            'name' => 'Plato de mano - Limpieza y cuidado',
            'taxclasses_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 379,
            'name' => 'Entrenamiento de la mascota/Control del SIDA/accesorios (sin alimentación)',
            'taxclasses_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 380,
            'name' => 'Juguetes de Pet (sin alimentación)',
            'taxclasses_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 381,
            'name' => 'Dispensadores de bebidas/alimentos para mascotas (sin alimentación)',
            'taxclasses_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 382,
            'name' => 'Traje de mascotas',
            'taxclasses_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 383,
            'name' => 'Entrenamiento de la mascota/Control del SIDA/accesorios (alimentado)',
            'taxclasses_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 384,
            'name' => 'Cuidado de mascotas Packs variedad',
            'taxclasses_id' => 4,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 385,
            'name' => 'Cuidado de mascotas/comida variada Packs',
            'taxclasses_id' => 8,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 386,
            'name' => ' Ayuda / accesorios para acuarios (accionados)',
            'taxclasses_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 387,
            'name' => 'Bienestar Pet/higiene variedad Packs',
            'taxclasses_id' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 388,
            'name' => 'Suplementos Nutricionales diversos envases PET',
            'taxclasses_id' => 2,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 389,
            'name' => 'Variedad de accesorios envases PET',
            'taxclasses_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 390,
            'name' => 'Alimento para mascotas/Drink dispensador (alimentado)',
            'taxclasses_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 391,
            'name' => 'Juguetes de Pet (impulsado)',
            'taxclasses_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 392,
            'name' => ' Caja para mascotas/Ropa de cama (no desechables)',
            'taxclasses_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 393,
            'name' => 'Variedad de bebidas/alimentos para mascotas Packs',
            'taxclasses_id' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 394,
            'name' => 'Plagas de insectos/Control/alergeno variedad Packs',
            'taxclasses_id' => 14,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 395,
            'name' => 'Belleza/Cuidado Personal/higiene variedad Packs',
            'taxclasses_id' => 160,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 396,
            'name' => 'Masaje corporal/Tonificación variedad Packs',
            'taxclasses_id' => 159,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 397,
            'name' => 'Variedad de productos cosméticos Packs',
            'taxclasses_id' => 148,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 398,
            'name' => 'Productos para el Cuidado de Uñas/cosméticos variedad Packs',
            'taxclasses_id' => 149,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 399,
            'name' => 'Cosméticos y fragancias diferentes packs',
            'taxclasses_id' => 151,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 400,
            'name' => 'Productos para el cabello variedad Packs',
            'taxclasses_id' => 147,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 401,
            'name' => 'Los productos de cuidado del cabello variedad Packs',
            'taxclasses_id' => 146,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 402,
            'name' => 'Cabello - Styling (impulsado)',
            'taxclasses_id' => 146,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 403,
            'name' => 'Espejos - Cuidado Personal',
            'taxclasses_id' => 145,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 404,
            'name' => 'Hair Removal/productos de enmascarar paquetes variedad',
            'taxclasses_id' => 145,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 405,
            'name' => 'Bolsas de comida desechables',
            'taxclasses_id' => 284,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 406,
            'name' => 'Envuelva los alimentos desechables',
            'taxclasses_id' => 284,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 407,
            'name' => 'Productos de limpieza/higiene variedad Packs',
            'taxclasses_id' => 15,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 408,
            'name' => 'Ambientadores/desodorantes (impulsado)',
            'taxclasses_id' => 9,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 409,
            'name' => 'Ambientadores/desodorantes variedad Packs',
            'taxclasses_id' => 9,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 410,
            'name' => 'Limpiadores variedad Packs',
            'taxclasses_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 411,
            'name' => 'Servicio de lavandería variedad Packs',
            'taxclasses_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 412,
            'name' => 'Accesorios para calzado variedad Packs',
            'taxclasses_id' => 186,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 413,
            'name' => 'Cuidado de superficie diferentes packs',
            'taxclasses_id' => 12,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 414,
            'name' => 'Diversos paquetes de limpieza',
            'taxclasses_id' => 13,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 415,
            'name' => 'Los combustibles/Contacto Sida variedad Packs',
            'taxclasses_id' => 465,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 416,
            'name' => 'Diversos paquetes de pilas y cargadores',
            'taxclasses_id' => 363,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 417,
            'name' => 'Incontinencia de adultos - Ropa interior (desechables)',
            'taxclasses_id' => 155,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 418,
            'name' => 'Incontinencia de adultos - Ropa interior (no desechables)',
            'taxclasses_id' => 155,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 419,
            'name' => 'Productos de higiene personal variedad Packs',
            'taxclasses_id' => 157,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 420,
            'name' => 'Incontinencia adultos variedad Packs',
            'taxclasses_id' => 155,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 421,
            'name' => 'Higiene Femenina/Enfermería variedad Packs',
            'taxclasses_id' => 154,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 422,
            'name' => 'La higiene personal en general variedad Packs',
            'taxclasses_id' => 153,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 423,
            'name' => 'La higiene oral variedad Packs',
            'taxclasses_id' => 156,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 424,
            'name' => 'Productos para la piel variedad Packs',
            'taxclasses_id' => 144,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 425,
            'name' => 'Cara de Refrigeración/cuerpo señores',
            'taxclasses_id' => 141,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 426,
            'name' => 'Variedad de paquetes para el cuidado de la piel',
            'taxclasses_id' => 141,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 427,
            'name' => 'Cuerpo lavado variedad Packs',
            'taxclasses_id' => 143,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 428,
            'name' => 'Los productos de bronceado de la piel variedad Packs',
            'taxclasses_id' => 142,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 429,
            'name' => 'Alimentación de bebés - Tetas',
            'taxclasses_id' => 293,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 430,
            'name' => 'Pañales (no desechable)',
            'taxclasses_id' => 158,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 431,
            'name' => 'navajas de afeitar - No desechable (sin alimentación)',
            'taxclasses_id' => 145,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 432,
            'name' => 'El bronceado sin sol - Oral (sin alimentación)',
            'taxclasses_id' => 142,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 433,
            'name' => 'Alimentación de bebés - Baberos',
            'taxclasses_id' => 216,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 434,
            'name' => 'Otros accesorios para mascotas',
            'taxclasses_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 435,
            'name' => 'Otros suplementos nutricionales Pet',
            'taxclasses_id' => 2,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 436,
            'name' => 'Bienestar Pet/Higiene Otros',
            'taxclasses_id' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 437,
            'name' => 'Tela ambientadores',
            'taxclasses_id' => 9,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 438,
            'name' => 'Protectores de tela',
            'taxclasses_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 439,
            'name' => 'Acabado de tela/almidón',
            'taxclasses_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 440,
            'name' => 'Potenciadores de detergente de lavandería y lejías',
            'taxclasses_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 441,
            'name' => 'Suavizantes/Acondicionadores',
            'taxclasses_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 442,
            'name' => 'Ambientadores/desodorantes Otros',
            'taxclasses_id' => 9,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 443,
            'name' => 'Otros limpiadores',
            'taxclasses_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 444,
            'name' => 'Servicio de lavandería Otros',
            'taxclasses_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 445,
            'name' => 'Otros Cuidados de superficie',
            'taxclasses_id' => 12,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 446,
            'name' => 'Plagas de insectos/Control/alergeno Otros',
            'taxclasses_id' => 14,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 447,
            'name' => 'Masaje corporal/Tonificación - piezas de recambio',
            'taxclasses_id' => 159,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 448,
            'name' => 'Calentamiento personales/Masajear (impulsado)',
            'taxclasses_id' => 159,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 449,
            'name' => 'Masaje corporal Tonificación/Otros',
            'taxclasses_id' => 159,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 450,
            'name' => 'Pinturas/cosméticos brilla/reluce',
            'taxclasses_id' => 148,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 451,
            'name' => 'Mama/Hip pads Enhancer',
            'taxclasses_id' => 148,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 452,
            'name' => 'Tatuajes/Patrones/Stick-en joyas, Temporal',
            'taxclasses_id' => 148,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 453,
            'name' => 'Pestañas - Falso',
            'taxclasses_id' => 148,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 454,
            'name' => 'Uñas - Accesorios (alimentado)',
            'taxclasses_id' => 149,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 455,
            'name' => 'Productos para el cuidado de uñas y Cosméticos - piezas de recambio',
            'taxclasses_id' => 149,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 456,
            'name' => 'Difusores de Aceite (sin alimentación)',
            'taxclasses_id' => 152,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 457,
            'name' => 'Difusores de aceite (encendido)',
            'taxclasses_id' => 152,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 458,
            'name' => 'Los aceites esenciales',
            'taxclasses_id' => 152,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 459,
            'name' => 'Cojines de aromaterapia',
            'taxclasses_id' => 152,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 460,
            'name' => 'Los aceites de base/soporte',
            'taxclasses_id' => 152,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 461,
            'name' => 'Diversos paquetes de aromaterapia',
            'taxclasses_id' => 152,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 462,
            'name' => 'Otros productos cosméticos',
            'taxclasses_id' => 148,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 463,
            'name' => 'Cosméticos Productos para el Cuidado de Uñas/Otros',
            'taxclasses_id' => 149,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 464,
            'name' => 'Otros aromaterapia',
            'taxclasses_id' => 152,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 465,
            'name' => 'Uñas - Sida (alimentado)',
            'taxclasses_id' => 149,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 466,
            'name' => 'Cuidado bucal - Sida (alimentado)',
            'taxclasses_id' => 156,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 467,
            'name' => 'La higiene oral - piezas de recambio',
            'taxclasses_id' => 156,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 468,
            'name' => 'La higiene oral Otros',
            'taxclasses_id' => 156,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 469,
            'name' => 'Incontinencia de adultos Otros',
            'taxclasses_id' => 155,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 470,
            'name' => 'La Enfermería Higiene Femenina/Otros',
            'taxclasses_id' => 154,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 471,
            'name' => 'La higiene personal en general otros',
            'taxclasses_id' => 153,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 472,
            'name' => 'Trona de bebé',
            'taxclasses_id' => 317,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 473,
            'name' => 'Baby Play Pens/antros',
            'taxclasses_id' => 490,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 474,
            'name' => 'Cunas Cuna/cama/cuna',
            'taxclasses_id' => 316,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 475,
            'name' => 'Colchón de cuna de bebé',
            'taxclasses_id' => 316,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 476,
            'name' => 'Vigilar la seguridad del bebé (alimentación)',
            'taxclasses_id' => 490,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 477,
            'name' => 'Baby Car/asientos elevadores',
            'taxclasses_id' => 325,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 478,
            'name' => 'Cochecitos / Cochecitos / Cochecitos',
            'taxclasses_id' => 270,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 479,
            'name' => 'Cuna para bebé o cesta de la compra - Viajes',
            'taxclasses_id' => 270,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 480,
            'name' => 'Transporte de cunas para bebé/cestas/cunas',
            'taxclasses_id' => 270,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 481,
            'name' => 'Arneses de bebé/riendas',
            'taxclasses_id' => 490,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 482,
            'name' => 'La Pram/Cochecito/Cochecito Accesorios',
            'taxclasses_id' => 270,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 483,
            'name' => 'Cunas de bebé rebotando/balancín asientos (sin alimentación)',
            'taxclasses_id' => 317,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 484,
            'name' => 'Cunas de bebé rebotando/balancín Asientos (alimentado)',
            'taxclasses_id' => 317,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 485,
            'name' => 'Puerta del bebé porteros',
            'taxclasses_id' => 270,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 486,
            'name' => 'Columpios para bebé',
            'taxclasses_id' => 270,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 487,
            'name' => 'Los andadores',
            'taxclasses_id' => 270,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 488,
            'name' => 'Bebé deportistas/transporte Otros',
            'taxclasses_id' => 270,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 489,
            'name' => 'Anti-SIDA spot (impulsado)',
            'taxclasses_id' => 141,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 490,
            'name' => 'Bañera/masajes tonificantes',
            'taxclasses_id' => 159,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 491,
            'name' => 'Limpiadores Removedores/Cosmética (impulsado)',
            'taxclasses_id' => 141,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 492,
            'name' => 'El bronceado sin sol (impulsado)',
            'taxclasses_id' => 142,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 493,
            'name' => 'Cuidado de la piel - piezas de recambio',
            'taxclasses_id' => 141,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 494,
            'name' => 'Los productos de bronceado de la piel - piezas de recambio',
            'taxclasses_id' => 142,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 495,
            'name' => 'Cuidado de la piel Otros',
            'taxclasses_id' => 141,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 496,
            'name' => 'Cuerpo lavado Otros',
            'taxclasses_id' => 143,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 497,
            'name' => 'Otros productos de bronceado de la piel',
            'taxclasses_id' => 142,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 498,
            'name' => 'Alimentación de bebés Ayuda(alimentado)',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 499,
            'name' => 'Bebé orinales/asientos de formación',
            'taxclasses_id' => 315,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 500,
            'name' => 'Alfombrillas para cambiar pañales',
            'taxclasses_id' => 315,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 501,
            'name' => 'Alimentación de bebés - piezas de recambio',
            'taxclasses_id' => 293,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 502,
            'name' => 'Alimentación de bebés Otros',
            'taxclasses_id' => 293,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 503,
            'name' => 'Baño del bebé/sillas baño/bañera cunas',
            'taxclasses_id' => 315,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 504,
            'name' => 'Cabello - Sida (alimentado)',
            'taxclasses_id' => 146,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 505,
            'name' => 'Rizadores de pelo/rodillos',
            'taxclasses_id' => 146,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 506,
            'name' => 'Depilación Depilación/(impulsado)',
            'taxclasses_id' => 145,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 507,
            'name' => ' navajas de afeitar (impulsado)',
            'taxclasses_id' => 145,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 508,
            'name' => 'Hair Removal/productos de enmascarar - piezas de recambio',
            'taxclasses_id' => 145,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 509,
            'name' => 'Los productos de cuidado del cabello - piezas de recambio',
            'taxclasses_id' => 146,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 510,
            'name' => 'Otros productos para el cuidado del cabello',
            'taxclasses_id' => 146,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 511,
            'name' => 'Hair Removal/productos de enmascarar otros',
            'taxclasses_id' => 145,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 512,
            'name' => 'Contenido eBook digital',
            'taxclasses_id' => 163,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 513,
            'name' => 'Libros impresos/Composiciones',
            'taxclasses_id' => 163,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 514,
            'name' => 'Contenido Periódico digital',
            'taxclasses_id' => 164,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 515,
            'name' => 'Publicaciones impresas',
            'taxclasses_id' => 164,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 516,
            'name' => 'Brasswind Instrumentos Musicales (sin alimentación)',
            'taxclasses_id' => 166,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 517,
            'name' => 'Teclados/pianos (sin alimentación)',
            'taxclasses_id' => 166,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 518,
            'name' => 'Instrumentos musicales de percusión (sin alimentación)',
            'taxclasses_id' => 166,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 519,
            'name' => 'Instrumentos musicales de cuerda (sin alimentación)',
            'taxclasses_id' => 166,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 520,
            'name' => 'Instrumentos musicales de viento (sin alimentación)',
            'taxclasses_id' => 166,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 521,
            'name' => 'Brasswind Instrumentos Musicales (alimentado)',
            'taxclasses_id' => 167,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 522,
            'name' => 'Instrumento musical Sida (alimentado)',
            'taxclasses_id' => 167,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 523,
            'name' => 'Teclados/pianos (impulsado)',
            'taxclasses_id' => 167,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 524,
            'name' => 'Instrumentos musicales de percusión (impulsado)',
            'taxclasses_id' => 167,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 525,
            'name' => 'Instrumentos musicales de cuerda (impulsado)',
            'taxclasses_id' => 167,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 526,
            'name' => 'Instrumentos musicales de viento (impulsado)',
            'taxclasses_id' => 167,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 527,
            'name' => 'El Calzado deportivo - Uso General',
            'taxclasses_id' => 185,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 528,
            'name' => 'El Calzado deportivo - especialista',
            'taxclasses_id' => 185,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 529,
            'name' => 'Inserciones de calzado',
            'taxclasses_id' => 186,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 530,
            'name' => 'Botas - Uso General',
            'taxclasses_id' => 187,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 531,
            'name' => 'Zapatos - Uso General',
            'taxclasses_id' => 187,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 532,
            'name' => 'Interior - calzado calzados completamente cerrados.',
            'taxclasses_id' => 188,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 533,
            'name' => 'Interior - calzado calzados parcialmente cerrados',
            'taxclasses_id' => 188,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 534,
            'name' => 'Seguridad/Fundas de protección',
            'taxclasses_id' => 189,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 535,
            'name' => 'Cubrezapatos de Protección/Seguridad',
            'taxclasses_id' => 189,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 536,
            'name' => 'Seguridad/zapatos protectores',
            'taxclasses_id' => 189,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 537,
            'name' => 'Tobilleras',
            'taxclasses_id' => 190,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 538,
            'name' => 'Pulseras',
            'taxclasses_id' => 190,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 539,
            'name' => 'Broches',
            'taxclasses_id' => 190,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 540,
            'name' => 'Cuff Links',
            'taxclasses_id' => 190,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 541,
            'name' => 'Aretes/piercing Joyería',
            'taxclasses_id' => 190,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 542,
            'name' => 'Cajas/bolsas de joyería',
            'taxclasses_id' => 190,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 543,
            'name' => 'Piezas de Recambio de joyería',
            'taxclasses_id' => 190,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 544,
            'name' => 'Collares/Necklets',
            'taxclasses_id' => 190,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 545,
            'name' => 'Colgantes',
            'taxclasses_id' => 190,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 546,
            'name' => 'Anillos',
            'taxclasses_id' => 190,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 547,
            'name' => 'Tiaras',
            'taxclasses_id' => 190,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 548,
            'name' => 'Bolsos de Cuerpo/bolsas de cintura',
            'taxclasses_id' => 191,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 549,
            'name' => 'Maletines',
            'taxclasses_id' => 191,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 550,
            'name' => 'Bolsos/bolsas de hombro',
            'taxclasses_id' => 191,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 551,
            'name' => 'Equipaje bolsas/Personal/sombrillas Accesorios',
            'taxclasses_id' => 191,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 552,
            'name' => 'Maletas de equipaje/transportistas/prendas de vestir',
            'taxclasses_id' => 191,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 553,
            'name' => 'Mochilas/Mochilas/Holdalls',
            'taxclasses_id' => 191,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 554,
            'name' => 'Carrito de compras bolsas',
            'taxclasses_id' => 191,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 555,
            'name' => 'Paraguas - Personal',
            'taxclasses_id' => 191,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 556,
            'name' => 'Billeteros y monederos/viaje portadocumentos',
            'taxclasses_id' => 191,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 557,
            'name' => 'Ver los accesorios/Repuestos',
            'taxclasses_id' => 192,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 558,
            'name' => 'Relojes',
            'taxclasses_id' => 192,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 559,
            'name' => 'Los casos de juego de ordenador/vídeo/operadoras',
            'taxclasses_id' => 194,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 560,
            'name' => 'Equipo/Video Juego los productos de limpieza.',
            'taxclasses_id' => 194,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 561,
            'name' => 'Los puertos de acoplamiento del ordenador/cunas',
            'taxclasses_id' => 194,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 562,
            'name' => 'Los filtros/cubiertas (electrónicos)',
            'taxclasses_id' => 194,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 563,
            'name' => 'Juego de ordenador/vídeo productos de seguridad',
            'taxclasses_id' => 194,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 564,
            'name' => 'Equipo de kits de herramientas/Herramientas',
            'taxclasses_id' => 194,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 565,
            'name' => 'Mats/descansa - Informática',
            'taxclasses_id' => 194,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 566,
            'name' => 'Asistente de Datos personales/Organizador Lápiz',
            'taxclasses_id' => 194,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 567,
            'name' => 'Lectores de tarjeta',
            'taxclasses_id' => 194,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 568,
            'name' => 'Carcasa del ordenador/Caja Accesorios',
            'taxclasses_id' => 194,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 569,
            'name' => 'Carcasa del ordenador/caja',
            'taxclasses_id' => 195,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 570,
            'name' => 'Componentes de PC - piezas de recambio y accesorios',
            'taxclasses_id' => 195,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 571,
            'name' => 'Otros componentes del ordenador',
            'taxclasses_id' => 195,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 572,
            'name' => 'Componentes del equipo variedad Packs',
            'taxclasses_id' => 195,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 573,
            'name' => 'Refrigeración del equipo',
            'taxclasses_id' => 195,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 574,
            'name' => 'La memoria del equipo',
            'taxclasses_id' => 195,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 575,
            'name' => 'Las placas base del ordenador',
            'taxclasses_id' => 195,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 576,
            'name' => 'Las fuentes de alimentación del equipo',
            'taxclasses_id' => 194,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 577,
            'name' => 'Los procesadores del ordenador',
            'taxclasses_id' => 195,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 578,
            'name' => 'Las placas de expansión/Cards',
            'taxclasses_id' => 195,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 579,
            'name' => 'Unidades ópticas - Lectura/Escritura',
            'taxclasses_id' => 196,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 580,
            'name' => 'Unidades ópticas: Sólo lectura',
            'taxclasses_id' => 196,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 581,
            'name' => 'Las unidades de ordenador - piezas de recambio y accesorios',
            'taxclasses_id' => 196,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 582,
            'name' => 'Otras unidades del ordenador',
            'taxclasses_id' => 196,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 583,
            'name' => 'Las unidades de ordenador variedad Packs',
            'taxclasses_id' => 196,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 584,
            'name' => 'Unidades de disquete',
            'taxclasses_id' => 196,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 585,
            'name' => 'Unidades de disco duro',
            'taxclasses_id' => 196,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 586,
            'name' => 'Unidades intercambiables',
            'taxclasses_id' => 196,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 587,
            'name' => 'Unidades de cinta/Streamers',
            'taxclasses_id' => 196,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 588,
            'name' => 'Unidades de disco ZIP/JAZ',
            'taxclasses_id' => 196,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 589,
            'name' => 'Ordenador/Software de Juegos Video Juegos',
            'taxclasses_id' => 197,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 590,
            'name' => 'Los programas informáticos (no juegos)',
            'taxclasses_id' => 197,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 591,
            'name' => 'Ordenador/Software Video Juegos Otros',
            'taxclasses_id' => 197,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 592,
            'name' => 'Ordenador/Software del Videojuego variedad Packs',
            'taxclasses_id' => 197,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 593,
            'name' => 'Equipos - piezas de recambio y accesorios',
            'taxclasses_id' => 198,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 594,
            'name' => 'Otros equipos',
            'taxclasses_id' => 198,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 595,
            'name' => 'Organizadores electrónicos',
            'taxclasses_id' => 198,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 596,
            'name' => 'Los ordenadores personales - Desktop/terminal de Internet',
            'taxclasses_id' => 198,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 597,
            'name' => 'Ordenadores personales - Portátil',
            'taxclasses_id' => 198,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 598,
            'name' => 'Asistentes digitales personales',
            'taxclasses_id' => 198,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 599,
            'name' => 'Servidores',
            'taxclasses_id' => 198,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 600,
            'name' => 'Ordenador/Dispositivos de control de videojuegos',
            'taxclasses_id' => 199,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 601,
            'name' => 'Equipo Tabletas gráficas',
            'taxclasses_id' => 199,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 602,
            'name' => 'Los teclados de ordenador',
            'taxclasses_id' => 199,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 603,
            'name' => 'Equipo Dispositivos de señalización.',
            'taxclasses_id' => 199,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 604,
            'name' => 'Control de juego de ordenador/vídeo/Dispositivos de entrada - piezas de recambio y accesorios',
            'taxclasses_id' => 199,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 605,
            'name' => 'Ordenador/Monitores de Video Juegos',
            'taxclasses_id' => 200,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 606,
            'name' => 'Altavoces de ordenador/Mini altavoces',
            'taxclasses_id' => 200,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 607,
            'name' => 'Periféricos de ordenador/Video Juegos - piezas de recambio y accesorios',
            'taxclasses_id' => 200,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 608,
            'name' => 'Los consumibles de la impresora',
            'taxclasses_id' => 200,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 609,
            'name' => 'Impresoras',
            'taxclasses_id' => 200,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 610,
            'name' => 'Sistemas de proyección',
            'taxclasses_id' => 200,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 611,
            'name' => 'Escáneres',
            'taxclasses_id' => 200,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 612,
            'name' => 'Cámaras web',
            'taxclasses_id' => 200,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 613,
            'name' => 'Los firewalls',
            'taxclasses_id' => 201,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 614,
            'name' => 'Pasarelas',
            'taxclasses_id' => 201,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 615,
            'name' => 'Módems',
            'taxclasses_id' => 201,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 616,
            'name' => 'Los puntos de acceso a la red',
            'taxclasses_id' => 201,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 617,
            'name' => 'Red/USB Hubs',
            'taxclasses_id' => 201,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 618,
            'name' => 'Las tarjetas de interfaz de red',
            'taxclasses_id' => 201,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 619,
            'name' => 'Los enrutadores de red',
            'taxclasses_id' => 201,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 620,
            'name' => 'Los conmutadores de red',
            'taxclasses_id' => 201,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 621,
            'name' => 'Otros equipos de redes informáticas',
            'taxclasses_id' => 201,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 622,
            'name' => 'Equipo El equipo de networking variedad Packs',
            'taxclasses_id' => 201,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 623,
            'name' => 'Equipo El equipo de Networking - piezas de recambio y accesorios',
            'taxclasses_id' => 201,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 624,
            'name' => 'Los repetidores',
            'taxclasses_id' => 201,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 625,
            'name' => 'Muestra el ID de llamada',
            'taxclasses_id' => 204,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 626,
            'name' => 'Los soportes de los teléfonos',
            'taxclasses_id' => 204,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 627,
            'name' => 'Fundas para teléfonos móviles',
            'taxclasses_id' => 204,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 628,
            'name' => 'Las comunicaciones de Manos libres/auriculares',
            'taxclasses_id' => 204,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 629,
            'name' => 'Salpicaderos de teléfono móvil',
            'taxclasses_id' => 204,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 630,
            'name' => 'Protectores de radiación del teléfono móvil',
            'taxclasses_id' => 204,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 631,
            'name' => 'Contestadores automáticos',
            'taxclasses_id' => 205,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 632,
            'name' => 'Los sistemas de conferencia',
            'taxclasses_id' => 205,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 633,
            'name' => 'Máquinas de fax',
            'taxclasses_id' => 205,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 634,
            'name' => 'Comunicaciones fijas de pre-pago vales/tarjetas de llamada',
            'taxclasses_id' => 205,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 635,
            'name' => 'Intercomunicadores',
            'taxclasses_id' => 205,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 636,
            'name' => 'Centralitas telefónicas',
            'taxclasses_id' => 205,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 637,
            'name' => 'Teléfonos',
            'taxclasses_id' => 205,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 638,
            'name' => 'Conjuntos de radio de comunicación.',
            'taxclasses_id' => 206,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 639,
            'name' => 'Los equipos GPS - Comunicaciones Móviles',
            'taxclasses_id' => 206,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 640,
            'name' => 'Software GPS - Comunicaciones Móviles',
            'taxclasses_id' => 206,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 641,
            'name' => 'Teléfono móvil Pre-pago vales/Cards',
            'taxclasses_id' => 206,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 642,
            'name' => 'Tarjetas SIM de telefonía móvil/adaptadores de tarjeta SIM',
            'taxclasses_id' => 206,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 643,
            'name' => 'El software del teléfono móvil',
            'taxclasses_id' => 206,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 644,
            'name' => 'Los teléfonos móviles y smartphones',
            'taxclasses_id' => 206,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 645,
            'name' => 'Los buscapersonas',
            'taxclasses_id' => 206,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 646,
            'name' => 'Radios de dos vías',
            'taxclasses_id' => 206,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 647,
            'name' => 'Envoltura de regalo',
            'taxclasses_id' => 170,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 648,
            'name' => 'Envoltura de regalo/Otros accesorios',
            'taxclasses_id' => 170,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 649,
            'name' => 'Envoltura de regalo Accesorios',
            'taxclasses_id' => 170,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 650,
            'name' => 'Envoltura de regalo/accesorios diversos Packs',
            'taxclasses_id' => 170,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 651,
            'name' => 'Tarjetas de Felicitación/envoltura de regalo/ocasión suministros diversos Packs',
            'taxclasses_id' => 171,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 652,
            'name' => 'Mostrar los Titulares de Tarjeta de felicitación',
            'taxclasses_id' => 172,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 653,
            'name' => 'Tarjetas de Felicitación/Invitaciones Otros',
            'taxclasses_id' => 172,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 654,
            'name' => 'Tarjetas de Felicitación/invitaciones variedad Packs',
            'taxclasses_id' => 172,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 655,
            'name' => 'Tarjetas de Felicitación/invitaciones',
            'taxclasses_id' => 172,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 656,
            'name' => 'Invitación electrodos/Notelets',
            'taxclasses_id' => 172,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 657,
            'name' => 'Postales',
            'taxclasses_id' => 172,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 658,
            'name' => 'Globos',
            'taxclasses_id' => 173,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 659,
            'name' => 'Confeti',
            'taxclasses_id' => 173,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 660,
            'name' => 'Fuegos artificiales',
            'taxclasses_id' => 173,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 661,
            'name' => 'Otros suministros de ocasión',
            'taxclasses_id' => 173,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 662,
            'name' => 'Ocasión suministros diversos Packs',
            'taxclasses_id' => 173,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 663,
            'name' => 'Parte Galletas',
            'taxclasses_id' => 173,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 664,
            'name' => 'Gorros de fiesta',
            'taxclasses_id' => 173,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 665,
            'name' => 'Parte Poppers',
            'taxclasses_id' => 173,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 666,
            'name' => 'Pinatas',
            'taxclasses_id' => 173,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 667,
            'name' => 'Las serpentinas/cadenas de papel',
            'taxclasses_id' => 173,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 668,
            'name' => 'Tinta',
            'taxclasses_id' => 174,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 669,
            'name' => 'Sida corrección',
            'taxclasses_id' => 174,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 670,
            'name' => 'Escritura/diseño implementa/Sida Otros',
            'taxclasses_id' => 174,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 671,
            'name' => 'Utensilios de escritura - piezas de recambio',
            'taxclasses_id' => 174,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 672,
            'name' => 'Escritura/diseño implementa/Sida variedad Packs',
            'taxclasses_id' => 174,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 673,
            'name' => 'Medir/Equipo geométrica (Papelería)',
            'taxclasses_id' => 174,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 674,
            'name' => 'Sacapuntas (sin alimentación)',
            'taxclasses_id' => 174,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 675,
            'name' => 'Sacapuntas (impulsado)',
            'taxclasses_id' => 174,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 676,
            'name' => 'Lápices (Papelería)',
            'taxclasses_id' => 174,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 677,
            'name' => 'Plumas (Papelería)',
            'taxclasses_id' => 174,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 678,
            'name' => 'Galerías de símbolos (Papelería)',
            'taxclasses_id' => 174,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 679,
            'name' => 'Equipo de sellado (sin alimentación)',
            'taxclasses_id' => 177,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 680,
            'name' => 'Calculadoras y conversores de moneda (impulsado)',
            'taxclasses_id' => 175,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 681,
            'name' => 'Dinero en Efectivo/Registros (alimentado)',
            'taxclasses_id' => 175,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 682,
            'name' => 'Etiquetadoras postal',
            'taxclasses_id' => 177,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 683,
            'name' => 'Máquina laminadora ingredientes',
            'taxclasses_id' => 175,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 684,
            'name' => 'Máquinas de laminado (impulsado)',
            'taxclasses_id' => 175,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 685,
            'name' => 'Maquinaria de oficina Otros',
            'taxclasses_id' => 175,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 686,
            'name' => 'Maquinaria de oficina diversos Packs',
            'taxclasses_id' => 175,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 687,
            'name' => 'Consumibles de fotocopiadoras',
            'taxclasses_id' => 175,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 688,
            'name' => 'Fotocopiadoras',
            'taxclasses_id' => 175,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 689,
            'name' => 'Las máquinas de escribir (sin alimentación)',
            'taxclasses_id' => 175,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 690,
            'name' => 'Las máquinas de escribir (impulsado)',
            'taxclasses_id' => 175,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 691,
            'name' => 'Calendarios y Planificadores',
            'taxclasses_id' => 176,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 692,
            'name' => 'Información de contacto Libros/desfibrilación',
            'taxclasses_id' => 176,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 693,
            'name' => 'Otros artículos de papelería de planificación organizativa',
            'taxclasses_id' => 176,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 694,
            'name' => 'Planificación organizacional Papelería - piezas de recambio y accesorios',
            'taxclasses_id' => 176,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 695,
            'name' => 'Planificación organizacional papelería variedad Packs',
            'taxclasses_id' => 176,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 696,
            'name' => 'Organizadores personales/diarios (sin alimentación)',
            'taxclasses_id' => 176,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 697,
            'name' => 'Sobres/Mailers',
            'taxclasses_id' => 177,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 698,
            'name' => 'Las máquinas de franquear',
            'taxclasses_id' => 177,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 699,
            'name' => 'Carta/Carpetas/ensobradoras selladoras',
            'taxclasses_id' => 177,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 700,
            'name' => 'Abrecartas (sin alimentación)',
            'taxclasses_id' => 177,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 701,
            'name' => 'Abrecartas (impulsado)',
            'taxclasses_id' => 177,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 702,
            'name' => 'Tubos/cajas postales',
            'taxclasses_id' => 177,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 703,
            'name' => 'Básculas Postal (sin alimentación)',
            'taxclasses_id' => 177,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 704,
            'name' => 'Básculas Postal (impulsado)',
            'taxclasses_id' => 177,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 705,
            'name' => 'Postal/embalaje accesorios',
            'taxclasses_id' => 177,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 706,
            'name' => 'Postal/Equipo de envasado/sida y otros accesorios',
            'taxclasses_id' => 177,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 707,
            'name' => 'Postal/Equipo de envasado/sida/accesorios diversos Packs',
            'taxclasses_id' => 177,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 708,
            'name' => 'Embalajes postales/envoltura',
            'taxclasses_id' => 177,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 709,
            'name' => 'Flip-chart Stands',
            'taxclasses_id' => 178,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 710,
            'name' => 'Los punteros (sin alimentación)',
            'taxclasses_id' => 178,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 711,
            'name' => 'Los punteros (alimentado)',
            'taxclasses_id' => 178,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 712,
            'name' => 'Tarjetas de presentación (sin alimentación)',
            'taxclasses_id' => 178,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 713,
            'name' => 'Otros equipos de presentación',
            'taxclasses_id' => 178,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 714,
            'name' => 'Presentación equipos accesorios',
            'taxclasses_id' => 178,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 715,
            'name' => 'Equipo de presentación diferentes packs',
            'taxclasses_id' => 178,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 716,
            'name' => 'Accesorios de encuadernado',
            'taxclasses_id' => 179,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 717,
            'name' => 'Máquinas de encuadernación (sin alimentación)',
            'taxclasses_id' => 179,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 718,
            'name' => 'Máquinas de encuadernación (impulsado)',
            'taxclasses_id' => 179,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 719,
            'name' => 'Sujetadores de papelería',
            'taxclasses_id' => 179,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 720,
            'name' => 'Papelería pegamentos',
            'taxclasses_id' => 179,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 721,
            'name' => 'Papelería sujetadores adhesivos/aglutinantes/Otros',
            'taxclasses_id' => 179,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 722,
            'name' => 'Papelería Adhesivos/aglutinantes/Fijaciones variedad Packs',
            'taxclasses_id' => 179,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 723,
            'name' => 'Papelería removedores de grapas',
            'taxclasses_id' => 179,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 724,
            'name' => 'Papelería grapadoras (sin alimentación)',
            'taxclasses_id' => 179,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 725,
            'name' => 'Papelería grapadoras (alimentado)',
            'taxclasses_id' => 179,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 726,
            'name' => 'Guillotinas de papel/recortadores',
            'taxclasses_id' => 180,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 727,
            'name' => 'Papel/Tarjeta - Sin imprimir',
            'taxclasses_id' => 183,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 728,
            'name' => 'Formularios de negocios/Papel - pre-impresos',
            'taxclasses_id' => 183,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 729,
            'name' => 'Cortadores de papelería/Trimmers, otros',
            'taxclasses_id' => 180,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 730,
            'name' => 'Cortadores de papelería/recortadores variedad Packs',
            'taxclasses_id' => 180,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 731,
            'name' => 'Las trituradoras de papel (sin alimentación)',
            'taxclasses_id' => 180,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 732,
            'name' => 'Agujero Perforadoras de papel (sin alimentación)',
            'taxclasses_id' => 180,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 733,
            'name' => 'Perforadoras de papel con agujeros (impulsado)',
            'taxclasses_id' => 180,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 734,
            'name' => 'Etiquetas/Cupones/Entradas',
            'taxclasses_id' => 183,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 735,
            'name' => 'Transparencias/acetatos',
            'taxclasses_id' => 183,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 736,
            'name' => 'Cajas/dinero en efectivo',
            'taxclasses_id' => 181,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 737,
            'name' => 'Papelería archivos/carpetas/monederos',
            'taxclasses_id' => 181,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 738,
            'name' => 'Papelería tema Almacenamiento/Accesorios de escritorio',
            'taxclasses_id' => 181,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 739,
            'name' => 'Papelería Almacenamiento/Presentación de otros',
            'taxclasses_id' => 181,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 740,
            'name' => 'Papelería - Presentación/almacenamiento de piezas de repuesto y accesorios',
            'taxclasses_id' => 181,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 741,
            'name' => 'Papelería Almacenamiento/Presentación variedad Packs',
            'taxclasses_id' => 181,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 742,
            'name' => 'Papelería/Maquinaria de oficina diversos Packs',
            'taxclasses_id' => 182,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 743,
            'name' => 'Las correas/Llaves/Cummerbunds',
            'taxclasses_id' => 209,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 744,
            'name' => 'Pañuelos',
            'taxclasses_id' => 209,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 745,
            'name' => 'Handwear',
            'taxclasses_id' => 209,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 746,
            'name' => 'Sombreros',
            'taxclasses_id' => 209,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 747,
            'name' => 'Neckwear',
            'taxclasses_id' => 209,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 748,
            'name' => 'Adorno de Ropa/Accesorios florales/insignias y hebillas.',
            'taxclasses_id' => 209,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 749,
            'name' => 'Monos/Bodysuits',
            'taxclasses_id' => 210,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 750,
            'name' => 'Vestidos',
            'taxclasses_id' => 210,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 751,
            'name' => 'Faldas',
            'taxclasses_id' => 211,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 752,
            'name' => 'Pantalones/Shorts',
            'taxclasses_id' => 211,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 753,
            'name' => 'Batas',
            'taxclasses_id' => 212,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 754,
            'name' => 'Los vestidos de noche/camisas',
            'taxclasses_id' => 212,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 755,
            'name' => 'Dormir Sombreros',
            'taxclasses_id' => 212,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 756,
            'name' => 'Dormir Pantalones/Shorts',
            'taxclasses_id' => 212,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 757,
            'name' => 'Ropa deportiva - Desgaste de cuerpo completo',
            'taxclasses_id' => 213,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 758,
            'name' => 'Ropa deportiva - Menor desgaste del cuerpo',
            'taxclasses_id' => 213,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 759,
            'name' => 'Ropa deportiva - Desgaste en la parte superior del cuerpo',
            'taxclasses_id' => 213,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 760,
            'name' => 'Bras/Vascos/corsés',
            'taxclasses_id' => 214,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 761,
            'name' => 'Ropa interior del cuerpo completo',
            'taxclasses_id' => 214,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 762,
            'name' => 'Pantalones/escritos/Calzón',
            'taxclasses_id' => 214,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 763,
            'name' => 'Calcetines',
            'taxclasses_id' => 214,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 764,
            'name' => 'Camisetas/Chemises/Camisoles',
            'taxclasses_id' => 214,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 765,
            'name' => 'Chaquetas Chaquetas//Cardigans y chalecos.',
            'taxclasses_id' => 215,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 766,
            'name' => 'Chompas/Jerseys',
            'taxclasses_id' => 215,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 767,
            'name' => 'Camisas/Blusas/camisas Polo/T-shirts',
            'taxclasses_id' => 215,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 768,
            'name' => 'Variedad de accesorios Packs de ropa',
            'taxclasses_id' => 209,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 769,
            'name' => 'Desgaste corporal completa variedad Packs',
            'taxclasses_id' => 210,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 770,
            'name' => 'El cuerpo inferior desgaste/Bottoms variedad Packs',
            'taxclasses_id' => 211,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 771,
            'name' => 'Dormir variedad Packs',
            'taxclasses_id' => 212,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 772,
            'name' => 'Ropa deportiva variedad Packs',
            'taxclasses_id' => 213,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 773,
            'name' => 'Variedad Packs de ropa interior',
            'taxclasses_id' => 214,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 774,
            'name' => 'Desgaste en la parte superior del cuerpo/Tops variedad Packs',
            'taxclasses_id' => 215,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 775,
            'name' => 'Equipo/Video Juego Otros accesorios',
            'taxclasses_id' => 194,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 776,
            'name' => 'Equipo/accesorios video del juego variedad Packs',
            'taxclasses_id' => 194,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 777,
            'name' => 'Juego de ordenador/Vídeo/Control de otros dispositivos de entrada',
            'taxclasses_id' => 199,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 778,
            'name' => 'Control de juego de ordenador/vídeo/Dispositivos de entrada diferentes packs',
            'taxclasses_id' => 199,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 779,
            'name' => 'Equipo/Video Juego otros periféricos',
            'taxclasses_id' => 200,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 780,
            'name' => 'Periféricos de ordenador/Video Juego variedad Packs',
            'taxclasses_id' => 200,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 781,
            'name' => 'Los ordenadores/Video Juegos Diversos Packs',
            'taxclasses_id' => 202,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 782,
            'name' => 'Otros instrumentos musicales (sin alimentación)',
            'taxclasses_id' => 166,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 783,
            'name' => 'Otros instrumentos musicales (impulsado)',
            'taxclasses_id' => 167,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 784,
            'name' => 'Otros accesorios de comunicación',
            'taxclasses_id' => 204,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 785,
            'name' => 'Variedad de accesorios Paquetes de comunicación',
            'taxclasses_id' => 204,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 786,
            'name' => 'Variedad de paquetes de comunicación',
            'taxclasses_id' => 207,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 787,
            'name' => 'Otros dispositivos de comunicación fija',
            'taxclasses_id' => 205,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 788,
            'name' => 'Dispositivos de comunicación fija variedad Packs',
            'taxclasses_id' => 205,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 789,
            'name' => 'Los dispositivos de comunicación móvil/Otros servicios',
            'taxclasses_id' => 206,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 790,
            'name' => 'Los dispositivos de comunicaciones móviles y servicios diversos Packs',
            'taxclasses_id' => 206,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 791,
            'name' => 'Otras joyas',
            'taxclasses_id' => 190,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 792,
            'name' => 'Variedad de joyería Packs',
            'taxclasses_id' => 190,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 793,
            'name' => 'Variedad de accesorios personales Packs',
            'taxclasses_id' => 193,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 794,
            'name' => 'Bolsas personales/Equipaje/sombrillas Otros',
            'taxclasses_id' => 191,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 795,
            'name' => 'Bolsas personales/Equipaje/sombrillas variedad Packs',
            'taxclasses_id' => 191,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 796,
            'name' => 'Relojes Otros',
            'taxclasses_id' => 192,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 797,
            'name' => 'Protección de desgaste de cuerpo completo',
            'taxclasses_id' => 216,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 798,
            'name' => 'Handwear protectora',
            'taxclasses_id' => 216,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 799,
            'name' => 'Desgaste de la parte inferior del cuerpo de protección',
            'taxclasses_id' => 216,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 800,
            'name' => 'Protección de desgaste en la parte superior del cuerpo',
            'taxclasses_id' => 216,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 801,
            'name' => 'Televisores',
            'taxclasses_id' => 218,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 802,
            'name' => 'Combinaciones de televisión',
            'taxclasses_id' => 218,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 803,
            'name' => 'Televisores: en la mano',
            'taxclasses_id' => 218,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 804,
            'name' => 'Televisores variedad Packs',
            'taxclasses_id' => 218,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 805,
            'name' => 'Televisores - piezas de recambio y accesorios',
            'taxclasses_id' => 218,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 806,
            'name' => 'Otros televisores',
            'taxclasses_id' => 218,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 807,
            'name' => 'Videocámaras',
            'taxclasses_id' => 219,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 808,
            'name' => 'Los reproductores/grabadores de DVD',
            'taxclasses_id' => 219,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 809,
            'name' => 'Reproductores/grabadores de combinación',
            'taxclasses_id' => 219,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 810,
            'name' => 'Set-top Box',
            'taxclasses_id' => 224,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 811,
            'name' => 'Video Grabadoras de disco duro',
            'taxclasses_id' => 219,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 812,
            'name' => 'Antenas',
            'taxclasses_id' => 224,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 813,
            'name' => 'Reproductores/grabadores de vídeo casete',
            'taxclasses_id' => 219,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 814,
            'name' => 'Grabación/reproducción de vídeo diferentes packs',
            'taxclasses_id' => 219,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 815,
            'name' => 'Grabación/reproducción de video - piezas de recambio y accesorios',
            'taxclasses_id' => 219,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 816,
            'name' => 'Reproductores de CD portátiles',
            'taxclasses_id' => 220,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 817,
            'name' => 'Reproductores de MD portátil',
            'taxclasses_id' => 220,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 818,
            'name' => 'Reproductores de MP3 portátiles',
            'taxclasses_id' => 220,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 819,
            'name' => 'Los reproductores de casetes de audio portátil',
            'taxclasses_id' => 220,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 820,
            'name' => 'Reproductores de DVD portátiles',
            'taxclasses_id' => 220,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 821,
            'name' => 'Reproductores de vídeo digital portátil',
            'taxclasses_id' => 220,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 822,
            'name' => 'Radios portátiles',
            'taxclasses_id' => 220,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 823,
            'name' => 'Radio-grabadores portátiles',
            'taxclasses_id' => 220,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 824,
            'name' => 'Radio reloj',
            'taxclasses_id' => 220,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 825,
            'name' => 'Dictáfonos',
            'taxclasses_id' => 220,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 826,
            'name' => 'Variedad de Audio/Vídeo portátil Packs',
            'taxclasses_id' => 220,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 827,
            'name' => 'Audio/Vídeo portátil - piezas de recambio y accesorios',
            'taxclasses_id' => 220,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 828,
            'name' => 'Otros de Audio/Vídeo portátil',
            'taxclasses_id' => 220,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 829,
            'name' => 'Home Audio/preamplificadores amplificadores',
            'taxclasses_id' => 221,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 830,
            'name' => 'Sistemas de sonido estéreo',
            'taxclasses_id' => 221,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 831,
            'name' => 'Los sistemas de cine en casa',
            'taxclasses_id' => 221,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 832,
            'name' => 'Las platinas de cassette de audio doméstico',
            'taxclasses_id' => 221,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 833,
            'name' => 'Inicio cubiertas de CD de audio',
            'taxclasses_id' => 221,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 834,
            'name' => 'Home Audio MD',
            'taxclasses_id' => 221,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 835,
            'name' => 'Home Audio Altavoces - Individuales',
            'taxclasses_id' => 221,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 836,
            'name' => 'Los sistemas de altavoces de audio en casa',
            'taxclasses_id' => 221,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 837,
            'name' => 'Home Audio sintonizadores/receptores/RADIOS',
            'taxclasses_id' => 221,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 838,
            'name' => 'Giradiscos de vinilo -',
            'taxclasses_id' => 221,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 839,
            'name' => 'Jukeboxes de audio doméstico',
            'taxclasses_id' => 221,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 840,
            'name' => 'Home Audio Sistemas de Karaoke',
            'taxclasses_id' => 221,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 841,
            'name' => 'Home Audio/Visual mezcladores',
            'taxclasses_id' => 221,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 842,
            'name' => 'Equipo de efectos de audio en casa',
            'taxclasses_id' => 221,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 843,
            'name' => 'Tocadiscos - CD',
            'taxclasses_id' => 221,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 844,
            'name' => 'Equipos de Audio en casa variedad Packs',
            'taxclasses_id' => 221,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 845,
            'name' => 'Equipos de Audio en casa - piezas de recambio y accesorios',
            'taxclasses_id' => 221,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 846,
            'name' => 'Otros equipos de audio en casa',
            'taxclasses_id' => 221,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 847,
            'name' => 'Casetes de audio grabables.',
            'taxclasses_id' => 233,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 848,
            'name' => 'grabable de CD/MD',
            'taxclasses_id' => 233,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 849,
            'name' => 'DVD grabable.',
            'taxclasses_id' => 233,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 850,
            'name' => 'Las tarjetas de memoria',
            'taxclasses_id' => 233,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 851,
            'name' => 'Casetes de vídeo - grabable',
            'taxclasses_id' => 233,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 852,
            'name' => 'Disquetes',
            'taxclasses_id' => 233,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 853,
            'name' => 'Variedad de soportes grabables Packs',
            'taxclasses_id' => 233,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 854,
            'name' => 'Otros medios grabables',
            'taxclasses_id' => 233,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 855,
            'name' => 'CD/MD - pre-grabado',
            'taxclasses_id' => 232,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 856,
            'name' => 'DVD - pre-grabados',
            'taxclasses_id' => 232,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 857,
            'name' => 'Pre-grabado de vinilo',
            'taxclasses_id' => 232,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 858,
            'name' => 'Casetes de vídeo - pre-grabado',
            'taxclasses_id' => 232,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 859,
            'name' => 'Casetes de audio - pre-grabado',
            'taxclasses_id' => 232,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 860,
            'name' => 'La variedad de medios pre-grabados Packs',
            'taxclasses_id' => 232,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 861,
            'name' => 'Otros medios pre-grabado',
            'taxclasses_id' => 232,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 862,
            'name' => 'Los auriculares de audio',
            'taxclasses_id' => 222,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 863,
            'name' => 'Amplificadores de señal',
            'taxclasses_id' => 222,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 864,
            'name' => 'Enlaces de televisión inalámbrica',
            'taxclasses_id' => 222,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 865,
            'name' => 'Los controles remotos universales',
            'taxclasses_id' => 222,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 866,
            'name' => 'Cajas de conmutadores',
            'taxclasses_id' => 222,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 867,
            'name' => 'Casetes de convertidor',
            'taxclasses_id' => 222,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 868,
            'name' => 'Micrófonos',
            'taxclasses_id' => 222,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 869,
            'name' => 'Soportes Audiovisuales/escuadras',
            'taxclasses_id' => 222,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 870,
            'name' => 'Cajas/bolsas de audio visuales/Casos/monederos',
            'taxclasses_id' => 222,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 871,
            'name' => 'Televisión Internet Packs',
            'taxclasses_id' => 222,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 872,
            'name' => 'Los productos de limpieza de Audio Visuales',
            'taxclasses_id' => 222,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 873,
            'name' => 'Variedad de accesorios de audio visuales Packs',
            'taxclasses_id' => 222,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 874,
            'name' => 'Accesorios Audiovisuales - piezas de recambio',
            'taxclasses_id' => 222,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 875,
            'name' => 'Otros accesorios de audio visuales',
            'taxclasses_id' => 222,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 876,
            'name' => 'Equipo Audio Visual variedad Packs',
            'taxclasses_id' => 223,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 877,
            'name' => 'Las cámaras analógicas',
            'taxclasses_id' => 225,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 878,
            'name' => 'Cámaras digitales',
            'taxclasses_id' => 225,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 879,
            'name' => 'Cámaras desechables',
            'taxclasses_id' => 225,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 880,
            'name' => 'Los flashes de cámaras',
            'taxclasses_id' => 225,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 881,
            'name' => 'Película fotográfica',
            'taxclasses_id' => 225,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 882,
            'name' => 'Lentes intercambiables',
            'taxclasses_id' => 225,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 883,
            'name' => 'Los proyectores de diapositivas fotográficas',
            'taxclasses_id' => 225,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 884,
            'name' => 'Diapositivas fotográficas',
            'taxclasses_id' => 225,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 885,
            'name' => 'Fotografía - piezas de recambio y accesorios',
            'taxclasses_id' => 225,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 886,
            'name' => 'Álbumes de fotografías/cubos',
            'taxclasses_id' => 225,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 887,
            'name' => 'Diversos paquetes de fotografía',
            'taxclasses_id' => 225,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 888,
            'name' => 'Fotografía Otros',
            'taxclasses_id' => 225,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 889,
            'name' => 'Prismáticos',
            'taxclasses_id' => 226,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 890,
            'name' => 'Monoculares/Telescopios',
            'taxclasses_id' => 226,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 891,
            'name' => 'Microscopios',
            'taxclasses_id' => 226,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 892,
            'name' => 'Variedad de óptica Packs',
            'taxclasses_id' => 226,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 893,
            'name' => 'Óptica - piezas de recambio y accesorios',
            'taxclasses_id' => 226,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 894,
            'name' => 'Otra óptica',
            'taxclasses_id' => 226,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 895,
            'name' => 'Fotografía desarrollar productos químicos',
            'taxclasses_id' => 227,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 896,
            'name' => 'Fotografía ampliadores',
            'taxclasses_id' => 227,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 897,
            'name' => 'El papel fotográfico.',
            'taxclasses_id' => 227,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 898,
            'name' => 'Equipos de Secado de fotografía',
            'taxclasses_id' => 227,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 899,
            'name' => 'Habitación oscura Safelights fotografía',
            'taxclasses_id' => 227,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 900,
            'name' => 'Fotografía habitación oscura Tanks/Bandejas/tambores',
            'taxclasses_id' => 227,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 901,
            'name' => 'Impresión de fotografía/habitación oscura variedad packs de equipamiento',
            'taxclasses_id' => 227,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 902,
            'name' => 'Impresión de fotografía/habitación oscura - Equipo de piezas de repuesto y accesorios',
            'taxclasses_id' => 227,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 903,
            'name' => 'Impresión de fotografía/habitación oscura otros equipos',
            'taxclasses_id' => 227,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 904,
            'name' => 'Alquiler de equipos de navegación',
            'taxclasses_id' => 229,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 905,
            'name' => 'Alquiler de monitores de vídeo',
            'taxclasses_id' => 229,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 906,
            'name' => 'Reproductores de DVD para el coche',
            'taxclasses_id' => 229,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 907,
            'name' => 'Alquiler de reproductores de vídeo',
            'taxclasses_id' => 229,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 908,
            'name' => 'Alquiler de equipo de recepción de vídeo',
            'taxclasses_id' => 229,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 909,
            'name' => 'Car Video/variedad Packs de navegación',
            'taxclasses_id' => 229,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 910,
            'name' => 'Alquiler de vídeo/Navegación - piezas de recambio y accesorios',
            'taxclasses_id' => 229,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 911,
            'name' => 'Alquiler de vídeo/Navegación Otro',
            'taxclasses_id' => 229,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 912,
            'name' => 'Las unidades principales de audio para coche',
            'taxclasses_id' => 230,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 913,
            'name' => 'Sintonizadores/receptores de audio para coche',
            'taxclasses_id' => 230,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 914,
            'name' => 'Alquiler de reproductores de CD de audio/cambiadores',
            'taxclasses_id' => 230,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 915,
            'name' => 'Car Audio Reproductores MD/cambiadores',
            'taxclasses_id' => 230,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 916,
            'name' => 'Altavoces de audio para coche',
            'taxclasses_id' => 230,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 917,
            'name' => 'Amplificadores de audio para coche',
            'taxclasses_id' => 230,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 918,
            'name' => 'Antenas Car Audio',
            'taxclasses_id' => 230,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 919,
            'name' => 'Variedad de paquetes de audio para coche',
            'taxclasses_id' => 230,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 920,
            'name' => 'Car Audio - piezas de recambio y accesorios',
            'taxclasses_id' => 230,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 921,
            'name' => 'Otros audio para coche',
            'taxclasses_id' => 230,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 922,
            'name' => 'Artistas/PINCELES APLICADORES',
            'taxclasses_id' => 235,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 923,
            'name' => 'Artistas Pinturas y colorantes',
            'taxclasses_id' => 235,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 924,
            'name' => 'Artistas pasteles/Charcoal/lápices de colores',
            'taxclasses_id' => 235,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 925,
            'name' => 'Artistas pintando los agentes de superficie',
            'taxclasses_id' => 235,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 926,
            'name' => 'Lienzo de artistas/placas de prellenado',
            'taxclasses_id' => 235,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 927,
            'name' => 'Paletas de artistas',
            'taxclasses_id' => 235,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 928,
            'name' => 'Artistas atriles',
            'taxclasses_id' => 235,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 929,
            'name' => 'Artistas Accesorios',
            'taxclasses_id' => 235,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 930,
            'name' => 'Suministros de arte arena',
            'taxclasses_id' => 235,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 931,
            'name' => 'Artistas de pintura y dibujo variedad Packs de consumibles',
            'taxclasses_id' => 235,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 932,
            'name' => 'Artistas de pintura y dibujo Otros consumibles',
            'taxclasses_id' => 235,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 933,
            'name' => 'Aerógrafos (impulsado)',
            'taxclasses_id' => 236,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 934,
            'name' => 'Equipo aerografía - piezas de recambio y accesorios',
            'taxclasses_id' => 236,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 935,
            'name' => 'Aerografía suministros diversos Packs',
            'taxclasses_id' => 236,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 936,
            'name' => 'Aerografía suministra otros',
            'taxclasses_id' => 236,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 937,
            'name' => 'Escultores/Materiales de artesanía cerámica',
            'taxclasses_id' => 237,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 938,
            'name' => 'Escultores herramientas (sin alimentación)',
            'taxclasses_id' => 237,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 939,
            'name' => 'Escultores herramientas (alimentado)',
            'taxclasses_id' => 237,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 940,
            'name' => 'Hornos (alimentado)',
            'taxclasses_id' => 237,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 941,
            'name' => 'Ruedas de cerámica (impulsado)',
            'taxclasses_id' => 237,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 942,
            'name' => 'Ruedas de cerámica (sin alimentación)',
            'taxclasses_id' => 237,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 943,
            'name' => 'Escultores/artesanía cerámica suministros diversos Packs',
            'taxclasses_id' => 237,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 944,
            'name' => 'Escultores/cerámica artesanal otros consumibles',
            'taxclasses_id' => 237,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 945,
            'name' => 'Costura tejidos/textiles',
            'taxclasses_id' => 238,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 946,
            'name' => 'Puntilla/Cintas/Cables/trenzas',
            'taxclasses_id' => 238,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 947,
            'name' => 'Hilos de costura',
            'taxclasses_id' => 238,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 948,
            'name' => 'Costura de mano/Máquinas herramientas',
            'taxclasses_id' => 238,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 949,
            'name' => 'El equipo de marcado de bordado',
            'taxclasses_id' => 238,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 950,
            'name' => 'Máquinas de tejer y coser (sin alimentación)',
            'taxclasses_id' => 238,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 951,
            'name' => 'Máquinas de tejer y coser (impulsado)',
            'taxclasses_id' => 238,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 952,
            'name' => 'Sujetadores de bordado',
            'taxclasses_id' => 238,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 953,
            'name' => 'Fabricación de juguetes Accesorios',
            'taxclasses_id' => 238,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 954,
            'name' => 'Almacenamiento de bordado',
            'taxclasses_id' => 238,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 955,
            'name' => 'Plantillas de bordado',
            'taxclasses_id' => 238,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 956,
            'name' => 'Costura Accesorios',
            'taxclasses_id' => 238,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 957,
            'name' => 'Costura/Fabricación de juguetes artesanales variedad de suministros Packs',
            'taxclasses_id' => 238,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 958,
            'name' => 'Costura/Fabricación de juguetes artesanales de otros suministros',
            'taxclasses_id' => 238,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 959,
            'name' => 'Materiales artesanales de joyería',
            'taxclasses_id' => 239,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 960,
            'name' => 'Accesorios de joyería artesanal',
            'taxclasses_id' => 239,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 961,
            'name' => 'Joyas artesanales variedad de suministros Packs',
            'taxclasses_id' => 239,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 962,
            'name' => 'Joyas artesanales otros consumibles',
            'taxclasses_id' => 239,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 963,
            'name' => 'Materiales artesanales de cestería',
            'taxclasses_id' => 240,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 964,
            'name' => 'Herramientas artesanales de cestería (sin alimentación)',
            'taxclasses_id' => 240,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 965,
            'name' => 'Accesorios artesanales de cestería',
            'taxclasses_id' => 240,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 966,
            'name' => 'Artesanía de cestería suministros diversos Packs',
            'taxclasses_id' => 240,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 967,
            'name' => 'La cestería artesanía otros consumibles',
            'taxclasses_id' => 240,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 968,
            'name' => 'Herramientas de papel artesanal (sin alimentación)',
            'taxclasses_id' => 241,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 969,
            'name' => 'Papel/Tarjeta haciendo accesorios artesanales',
            'taxclasses_id' => 241,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 970,
            'name' => 'Papel Artesanal/Card Making suministros diversos Packs',
            'taxclasses_id' => 241,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 971,
            'name' => 'Papel Artesanal/Card Making suministra otros',
            'taxclasses_id' => 241,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 972,
            'name' => 'Vidrieras/Esmaltado/marquetería materiales artesanales',
            'taxclasses_id' => 242,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 973,
            'name' => 'Vidrieras Herramientas artesanas (impulsado)',
            'taxclasses_id' => 242,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 974,
            'name' => 'Vidrieras/Esmaltado/marquetería artesanal variedad Packs de consumibles',
            'taxclasses_id' => 242,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 975,
            'name' => 'Vidrieras/Esmaltado/marquetería artesanal otros consumibles',
            'taxclasses_id' => 242,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 976,
            'name' => 'Candle/jabón artesanal materiales',
            'taxclasses_id' => 243,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 977,
            'name' => 'Candle/jabón artesanal moldes',
            'taxclasses_id' => 243,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 978,
            'name' => 'Candle/jabón artesanal herramientas (sin alimentación)',
            'taxclasses_id' => 243,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 979,
            'name' => 'Candle/jabón artesanal herramientas (alimentado)',
            'taxclasses_id' => 243,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 980,
            'name' => 'Candle/jabón artesanal suministra variedad Packs',
            'taxclasses_id' => 243,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 981,
            'name' => 'Candle/jabón artesanal suministra otros',
            'taxclasses_id' => 243,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 982,
            'name' => 'La quema de madera/grabado herramientas artesanales (impulsado)',
            'taxclasses_id' => 244,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 983,
            'name' => 'La quema de madera/grabado herramientas artesanales (sin alimentación)',
            'taxclasses_id' => 244,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 984,
            'name' => 'La quema de madera/grabado Craft - piezas de recambio y accesorios',
            'taxclasses_id' => 244,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 985,
            'name' => 'La quema de madera/grabado otros suministros de artesanía',
            'taxclasses_id' => 244,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 986,
            'name' => 'Herramientas artesanales de impresión',
            'taxclasses_id' => 245,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 987,
            'name' => 'Imprenta (con alimentación)',
            'taxclasses_id' => 245,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 988,
            'name' => 'Prensa de impresión (sin alimentación)',
            'taxclasses_id' => 245,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 989,
            'name' => 'Impresión suministros artesanales variedad Packs',
            'taxclasses_id' => 245,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 990,
            'name' => 'Otros suministros de Artesanía de impresión',
            'taxclasses_id' => 245,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 991,
            'name' => 'Spinning/Telares (impulsado)',
            'taxclasses_id' => 246,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 992,
            'name' => 'Spinning/Telares (sin alimentación)',
            'taxclasses_id' => 246,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 993,
            'name' => 'Spinning/tejiendo fibras/hilados',
            'taxclasses_id' => 246,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 994,
            'name' => 'Spinning/tejido artesanal - piezas de recambio y accesorios',
            'taxclasses_id' => 246,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 995,
            'name' => 'Spinning/tejido artesanal otros consumibles',
            'taxclasses_id' => 246,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 996,
            'name' => 'Spinning/tejido artesanal variedad Packs de consumibles',
            'taxclasses_id' => 246,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 997,
            'name' => 'Artes y oficios diversos Packs',
            'taxclasses_id' => 247,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 998,
            'name' => 'Rechazar bolsas',
            'taxclasses_id' => 17,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 999,
            'name' => 'Tirar los equipos deportivos',
            'taxclasses_id' => 248,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1000,
            'name' => 'Ejecutar equipos deportivos',
            'taxclasses_id' => 248,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1001,
            'name' => 'Saltar deportes de equipo',
            'taxclasses_id' => 248,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1002,
            'name' => 'Vía/campo variedad packs de equipamiento deportivo',
            'taxclasses_id' => 248,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1003,
            'name' => 'Vía/Campo Otros equipos deportivos',
            'taxclasses_id' => 248,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1004,
            'name' => 'Pelotas de deportes',
            'taxclasses_id' => 249,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1005,
            'name' => 'Puck',
            'taxclasses_id' => 249,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1006,
            'name' => 'Shuttlecocks',
            'taxclasses_id' => 249,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1007,
            'name' => 'Frisbees',
            'taxclasses_id' => 249,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1008,
            'name' => 'Bumeranes',
            'taxclasses_id' => 249,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1009,
            'name' => 'Los balones deportivos/puck/Shuttlecocks/Frisbees/Boomerangs variedad Packs',
            'taxclasses_id' => 249,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1010,
            'name' => 'Los balones deportivos/puck/Shuttlecocks/Frisbees/Boomerangs Otros',
            'taxclasses_id' => 249,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1011,
            'name' => 'Las raquetas',
            'taxclasses_id' => 250,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1012,
            'name' => 'Deportes de Raqueta - piezas de recambio y accesorios',
            'taxclasses_id' => 250,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1013,
            'name' => 'Deportes de Raqueta variedad packs de equipamiento',
            'taxclasses_id' => 250,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1014,
            'name' => 'Deportes Los murciélagos/Palos/clubes',
            'taxclasses_id' => 251,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1015,
            'name' => 'Deportes Los murciélagos/Palos/Clubes Otros',
            'taxclasses_id' => 251,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1016,
            'name' => 'Trineos',
            'taxclasses_id' => 252,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1017,
            'name' => 'Esquís/placas de esquí/Snow boards',
            'taxclasses_id' => 252,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1018,
            'name' => 'Piedras de curling',
            'taxclasses_id' => 252,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1019,
            'name' => 'La nieve/hielo deportes de equipo - piezas de recambio y accesorios',
            'taxclasses_id' => 252,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1020,
            'name' => 'La nieve/hielo variedad packs de equipamiento deportivo',
            'taxclasses_id' => 252,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1021,
            'name' => 'La nieve/hielo Otros equipos deportivos',
            'taxclasses_id' => 252,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1022,
            'name' => 'Senderismo y Montañismo deportes de equipo',
            'taxclasses_id' => 253,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1023,
            'name' => 'Senderismo y Montañismo otros equipos deportivos',
            'taxclasses_id' => 253,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1024,
            'name' => 'Punzonado/Kicking ayudas para formación',
            'taxclasses_id' => 254,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1025,
            'name' => 'Artes marciales deportes de equipo',
            'taxclasses_id' => 254,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1026,
            'name' => 'Equipos de deportes de combate diferentes packs',
            'taxclasses_id' => 254,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1027,
            'name' => 'Ciclos (sin alimentación)',
            'taxclasses_id' => 255,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1028,
            'name' => 'Ciclos - piezas de repuesto',
            'taxclasses_id' => 255,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1029,
            'name' => 'Ciclo variedad packs de equipamiento deportivo',
            'taxclasses_id' => 255,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1030,
            'name' => 'Ciclo otros equipos deportivos',
            'taxclasses_id' => 255,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1031,
            'name' => 'Las máquinas de ejercicio (impulsado)',
            'taxclasses_id' => 256,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1032,
            'name' => 'Las máquinas de ejercicio (sin alimentación)',
            'taxclasses_id' => 256,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1033,
            'name' => 'Pesas/tonto-campanas',
            'taxclasses_id' => 256,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1034,
            'name' => 'Gimnasio Accesorios',
            'taxclasses_id' => 256,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1035,
            'name' => 'Supervisa el ejercicio de deportes',
            'taxclasses_id' => 256,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1036,
            'name' => 'Personales de Fitness Deportes de equipo - piezas de recambio y accesorios',
            'taxclasses_id' => 256,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1037,
            'name' => 'Entrenamiento Personal variedad packs de equipamiento deportivo',
            'taxclasses_id' => 256,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1038,
            'name' => 'Otros equipos deportivos de fitness personal',
            'taxclasses_id' => 256,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1039,
            'name' => 'Gimnasia Rítmica',
            'taxclasses_id' => 257,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1040,
            'name' => 'Aparatos de gimnasia',
            'taxclasses_id' => 257,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1041,
            'name' => 'Gimnasia Deportes de equipo variedad Packs',
            'taxclasses_id' => 257,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1042,
            'name' => 'Gimnasia Deportes de equipo Otros',
            'taxclasses_id' => 257,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1043,
            'name' => 'Las cometas',
            'taxclasses_id' => 258,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1044,
            'name' => 'Los paracaídas',
            'taxclasses_id' => 258,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1045,
            'name' => 'Kiting/placas de Paracaidismo/Buggies (sin alimentación)',
            'taxclasses_id' => 258,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1046,
            'name' => 'Kiting/Paracaidismo Equipamiento deportivo - piezas de recambio y accesorios',
            'taxclasses_id' => 258,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1047,
            'name' => 'Kiting/Paracaidismo variedad packs de equipamiento deportivo',
            'taxclasses_id' => 258,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1048,
            'name' => 'Kiting/Paracaidismo otros equipos deportivos',
            'taxclasses_id' => 258,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1049,
            'name' => 'Monopatines (sin alimentación)',
            'taxclasses_id' => 259,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1050,
            'name' => 'Skateboarding deportes de equipo - piezas de recambio y accesorios',
            'taxclasses_id' => 259,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1051,
            'name' => 'Monopatín scooter/variedad packs de equipamiento deportivo',
            'taxclasses_id' => 259,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1052,
            'name' => 'Monopatín scooter/Otros equipos deportivos',
            'taxclasses_id' => 259,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1053,
            'name' => 'Esquíes/Boards (Deportes Acuáticos)',
            'taxclasses_id' => 260,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1054,
            'name' => 'Esquíes/Boards (Deportes Acuáticos) - piezas de recambio y accesorios',
            'taxclasses_id' => 260,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1055,
            'name' => 'Ayudas para la formación de natación',
            'taxclasses_id' => 260,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1056,
            'name' => 'Equipo de buceo',
            'taxclasses_id' => 260,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1057,
            'name' => 'Natación, surf o buceo y submarinismo Equipamiento deportivo - piezas de recambio y accesorios',
            'taxclasses_id' => 260,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1058,
            'name' => 'Natación, surf o buceo y submarinismo Equipamiento deportivo variedad Packs',
            'taxclasses_id' => 260,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1059,
            'name' => 'Natación, surf y otros deportes de equipo de buceo',
            'taxclasses_id' => 260,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1060,
            'name' => 'Tablas de deportes',
            'taxclasses_id' => 261,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1061,
            'name' => 'Otras tablas de deportes',
            'taxclasses_id' => 261,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1062,
            'name' => 'Dardos',
            'taxclasses_id' => 262,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1063,
            'name' => 'Los arcos',
            'taxclasses_id' => 262,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1064,
            'name' => 'Flechas',
            'taxclasses_id' => 262,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1065,
            'name' => 'Objetivos (alimentado)',
            'taxclasses_id' => 262,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1066,
            'name' => 'Objetivos (sin alimentación)',
            'taxclasses_id' => 262,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1067,
            'name' => 'Deportes de equipo de destino - piezas de recambio y accesorios',
            'taxclasses_id' => 262,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1068,
            'name' => 'Objetivo variedad packs de equipamiento deportivo',
            'taxclasses_id' => 262,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1069,
            'name' => 'Otros Equipos Deportivos Destino',
            'taxclasses_id' => 262,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1070,
            'name' => 'Revólveres y pistolas',
            'taxclasses_id' => 263,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1071,
            'name' => 'Rifles',
            'taxclasses_id' => 263,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1072,
            'name' => 'Escopetas',
            'taxclasses_id' => 263,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1073,
            'name' => 'Pistolas de aire comprimido',
            'taxclasses_id' => 263,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1074,
            'name' => 'Armas de Fuego, Municiones',
            'taxclasses_id' => 263,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1075,
            'name' => 'Armas de fuego deportivas - piezas de recambio y accesorios',
            'taxclasses_id' => 263,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1076,
            'name' => 'Armas de fuego deportivas diferentes packs de equipamiento',
            'taxclasses_id' => 263,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1077,
            'name' => 'Armas de Fuego otros equipos deportivos',
            'taxclasses_id' => 263,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1078,
            'name' => 'Juego/Señuelos Decoys/llamantes',
            'taxclasses_id' => 264,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1079,
            'name' => 'Campo de caza equipo vestidor',
            'taxclasses_id' => 264,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1080,
            'name' => 'Deportes caza Ayudavariedad Packs',
            'taxclasses_id' => 264,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1081,
            'name' => 'Deportes caza AyudaOtros',
            'taxclasses_id' => 264,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1082,
            'name' => 'Watercraft (sin alimentación)',
            'taxclasses_id' => 265,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1083,
            'name' => 'Watercraft - piezas de recambio y Accesorios (sin alimentación)',
            'taxclasses_id' => 265,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1084,
            'name' => 'Watercraft Equipamiento deportivo variedad Packs (sin alimentación)',
            'taxclasses_id' => 265,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1085,
            'name' => 'Otros equipos deportivos de embarcaciones (sin alimentación)',
            'taxclasses_id' => 265,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1086,
            'name' => 'Equipamiento deportivo bolsas/Casos/tapas',
            'taxclasses_id' => 266,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1087,
            'name' => 'Objetivos deportivos/redes/cajas',
            'taxclasses_id' => 266,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1088,
            'name' => 'Objetivos deportivos/Redes Accesorios',
            'taxclasses_id' => 266,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1089,
            'name' => 'El equipo de marcado de deportes',
            'taxclasses_id' => 266,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1090,
            'name' => 'Deportes/pasadores de destino/Bolos tocones',
            'taxclasses_id' => 266,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1091,
            'name' => 'Deportes de equipo de racks de almacenamiento/titulares',
            'taxclasses_id' => 266,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1092,
            'name' => 'Deportes Equipo de puntuación (sin alimentación)',
            'taxclasses_id' => 266,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1093,
            'name' => 'Deportes/Alfombras alfombras',
            'taxclasses_id' => 266,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1094,
            'name' => 'Variedad de accesorios packs de equipamiento deportivo',
            'taxclasses_id' => 266,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1095,
            'name' => 'Equipos deportivos Otros accesorios',
            'taxclasses_id' => 266,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1096,
            'name' => 'Los protectores bucales, protectores de deportes',
            'taxclasses_id' => 267,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1097,
            'name' => 'Deportes Gafas de protección ocular o máscaras',
            'taxclasses_id' => 267,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1098,
            'name' => 'Deportes Cuerpo Protector Acolchado/protecciones',
            'taxclasses_id' => 267,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1099,
            'name' => 'Las correas de soporte protector de deportes',
            'taxclasses_id' => 267,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1100,
            'name' => 'Equipo de Protección Personal Deportes variedad Packs',
            'taxclasses_id' => 267,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1101,
            'name' => 'Otros equipos de protección personal de deportes',
            'taxclasses_id' => 267,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1102,
            'name' => 'Cañas de pesca/polacos',
            'taxclasses_id' => 268,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1103,
            'name' => 'Carretes de pesca',
            'taxclasses_id' => 268,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1104,
            'name' => 'Cebo de pesca/vuela',
            'taxclasses_id' => 268,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1105,
            'name' => 'Anzuelos de pesca',
            'taxclasses_id' => 268,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1106,
            'name' => 'Flota de Pesca',
            'taxclasses_id' => 268,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1107,
            'name' => 'Redes de Pesca',
            'taxclasses_id' => 268,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1108,
            'name' => 'La línea de la pesca/Gut',
            'taxclasses_id' => 268,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1109,
            'name' => 'Caña de Pescar Accesorios',
            'taxclasses_id' => 268,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1110,
            'name' => 'Pesca/Pesca variedad packs de equipamiento deportivo',
            'taxclasses_id' => 268,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1111,
            'name' => 'Pesca/Pesca Otros equipos deportivos',
            'taxclasses_id' => 268,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1112,
            'name' => 'Compactadores de basura',
            'taxclasses_id' => 271,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1113,
            'name' => 'Los eliminadores de desechos de alimentos',
            'taxclasses_id' => 271,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1114,
            'name' => 'Eliminación de residuos/compactación otros electrodomésticos',
            'taxclasses_id' => 271,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1115,
            'name' => 'Eliminación de residuos de aparatos de compactación/piezas de repuesto y accesorios',
            'taxclasses_id' => 271,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1116,
            'name' => 'Máquinas de hielo',
            'taxclasses_id' => 272,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1117,
            'name' => 'Enfriadores de vino',
            'taxclasses_id' => 272,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1118,
            'name' => 'Los enfriadores/calentadores',
            'taxclasses_id' => 272,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1119,
            'name' => 'Otros aparatos de refrigeración/congelación',
            'taxclasses_id' => 272,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1120,
            'name' => 'Aparatos de refrigeración/Congelación de recambios/accesorios',
            'taxclasses_id' => 272,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1121,
            'name' => 'Microondas',
            'taxclasses_id' => 273,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1122,
            'name' => 'Hornillos/anafe',
            'taxclasses_id' => 273,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1123,
            'name' => 'Los hornos de microondas',
            'taxclasses_id' => 273,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1124,
            'name' => 'Los principales aparatos de cocina Otros',
            'taxclasses_id' => 273,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1125,
            'name' => 'Los principales aparatos de cocción de piezas de recambio y accesorios',
            'taxclasses_id' => 273,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1126,
            'name' => 'Cajones de calentamiento',
            'taxclasses_id' => 274,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1127,
            'name' => 'Hostess carros (alimentado)',
            'taxclasses_id' => 274,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1128,
            'name' => 'Otros dispositivos de calentamiento',
            'taxclasses_id' => 274,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1129,
            'name' => 'Aparatos de calentamiento de las piezas de repuesto y accesorios',
            'taxclasses_id' => 274,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1130,
            'name' => 'Lavadoras',
            'taxclasses_id' => 275,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1131,
            'name' => 'Combinación de lavadoras y secadoras de ropa',
            'taxclasses_id' => 275,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1132,
            'name' => 'Los principales electrodomésticos de lavado Otros',
            'taxclasses_id' => 275,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1133,
            'name' => 'Los principales electrodomésticos de lavado de piezas de recambio y accesorios',
            'taxclasses_id' => 275,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1134,
            'name' => 'Lavavajillas',
            'taxclasses_id' => 276,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1135,
            'name' => 'Cocina Otros electrodomésticos de lavado',
            'taxclasses_id' => 276,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1136,
            'name' => 'Cocina los electrodomésticos de lavado de piezas de recambio y accesorios',
            'taxclasses_id' => 276,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1137,
            'name' => 'Tostadoras',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1138,
            'name' => 'Tostador Microondas',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1139,
            'name' => 'Parrillas (impulsado)',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1140,
            'name' => 'Sandwicheras y aparatos para gofres',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1141,
            'name' => 'Pancake/Fabricantes de anillos',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1142,
            'name' => 'Raclettes (impulsado)',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1143,
            'name' => 'Restaurantes-asadores/Tostadores (impulsado)',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1144,
            'name' => 'Las ollas eléctricas de cocción lenta/ollas calientes',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1145,
            'name' => 'Ollas a presión',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1146,
            'name' => 'Ollas de arroz/vapor',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1147,
            'name' => 'Multi-cocinas',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1148,
            'name' => 'Pasta Cookers',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1149,
            'name' => 'Cocinas de huevo',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1150,
            'name' => 'Freidoras',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1151,
            'name' => 'Trabajos (impulsado)',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1152,
            'name' => 'Breadmakers',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1153,
            'name' => 'Máquinas de palomitas',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1154,
            'name' => 'Pizzería',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1155,
            'name' => 'Fondues (alimentado)',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1156,
            'name' => 'Los Tajines (impulsado)',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1157,
            'name' => 'Los Comensales mexicanos (impulsado)',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1158,
            'name' => 'Paella Makers',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1159,
            'name' => 'Piedras calientes (impulsado)',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1160,
            'name' => 'Los aparatos de cocina de diversos Packs',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1161,
            'name' => 'Cuchillas (alimentado)',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1162,
            'name' => 'Abrelatas (impulsado)',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1163,
            'name' => 'Afilador de cuchillas (impulsado)',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1164,
            'name' => 'Selladores de vacío (impulsado)',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1165,
            'name' => 'Picadoras de carne/Mincers (impulsado)',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1166,
            'name' => 'Ralladores (impulsado)',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1167,
            'name' => 'Molinillos de café (impulsado)',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1168,
            'name' => 'Licuadoras (impulsado)',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1169,
            'name' => 'Fabricantes de bebidas calientes',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1170,
            'name' => 'Teteras (impulsado)',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1171,
            'name' => 'Heladeras (impulsado)',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1172,
            'name' => 'Fabricantes de yogur',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1173,
            'name' => 'Fabricantes de mantequilla (impulsado)',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1174,
            'name' => 'Fabricantes de bebidas carbonatadas',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1175,
            'name' => 'Dehydrators (impulsado)',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1176,
            'name' => 'Máquinas Candyfloss',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1177,
            'name' => 'Aparatos de preparación de alimentos y/o Bebidas Otros',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1178,
            'name' => 'Aparatos de preparación de alimentos y/o bebidas de recambios/accesorios',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1179,
            'name' => 'Aparatos de alimentos y/o Bebidas variedad Packs',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1180,
            'name' => 'Plancha de ropa (impulsado)',
            'taxclasses_id' => 280,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1181,
            'name' => 'Tabla de planchar (impulsado)',
            'taxclasses_id' => 280,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1182,
            'name' => 'Prensas de ropa',
            'taxclasses_id' => 280,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1183,
            'name' => 'Otros aparatos de cuidados de lavandería',
            'taxclasses_id' => 280,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1184,
            'name' => 'Aparatos de lavado de piezas de recambio y accesorios',
            'taxclasses_id' => 280,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1185,
            'name' => 'Aspiradoras',
            'taxclasses_id' => 281,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1186,
            'name' => 'Barredoras (alimentado)',
            'taxclasses_id' => 281,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1187,
            'name' => 'Enceradoras/champú limpiador',
            'taxclasses_id' => 281,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1188,
            'name' => 'Limpiadoras de vapor',
            'taxclasses_id' => 281,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1189,
            'name' => 'Otros aparatos de limpieza',
            'taxclasses_id' => 281,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1190,
            'name' => 'Aparatos de limpieza de piezas de recambio y accesorios',
            'taxclasses_id' => 281,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1191,
            'name' => 'Pequeños electrodomésticos de cocina Otros',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1192,
            'name' => 'Los aparatos de cocina de pequeñas piezas de recambio y accesorios',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1193,
            'name' => 'Comercios',
            'taxclasses_id' => 294,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1194,
            'name' => 'Estructuras meteorológicas/comercio extensiones',
            'taxclasses_id' => 294,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1195,
            'name' => 'Tratamientos de la carpa/Kits de reparación',
            'taxclasses_id' => 294,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1196,
            'name' => 'Comercio Accesorios',
            'taxclasses_id' => 294,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1197,
            'name' => 'Carpas y otras estructuras meteorológicas',
            'taxclasses_id' => 294,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1198,
            'name' => 'Comercios/estructuras meteorológicas variedad Packs',
            'taxclasses_id' => 294,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1199,
            'name' => 'Calentadores de carpa',
            'taxclasses_id' => 295,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1200,
            'name' => 'Camping linternas',
            'taxclasses_id' => 295,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1201,
            'name' => 'Camping otros equipos de iluminación y calefacción',
            'taxclasses_id' => 295,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1202,
            'name' => 'Equipo de iluminación y calefacción Camping variedad Packs',
            'taxclasses_id' => 295,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1203,
            'name' => 'Camping camas o colchonetas',
            'taxclasses_id' => 296,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1204,
            'name' => 'Sacos de dormir',
            'taxclasses_id' => 296,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1205,
            'name' => 'Asientos de camping',
            'taxclasses_id' => 296,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1206,
            'name' => 'Almacenamiento de camping',
            'taxclasses_id' => 296,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1207,
            'name' => 'Mesas camping',
            'taxclasses_id' => 296,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1208,
            'name' => 'Camping Muebles Muebles/Otros',
            'taxclasses_id' => 296,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1209,
            'name' => 'Camping muebles/Muebles variedad Packs',
            'taxclasses_id' => 296,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1210,
            'name' => 'Hornillos de camping/parrillas/Hornos',
            'taxclasses_id' => 297,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1211,
            'name' => 'Camping Equipo De Agua',
            'taxclasses_id' => 297,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1212,
            'name' => 'Camping Cool cajas/bolsas (sin alimentación)',
            'taxclasses_id' => 297,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1213,
            'name' => 'Camping utensilios de cocina',
            'taxclasses_id' => 297,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1214,
            'name' => 'Camping cocinar/comer/beber - Equipo de piezas de repuesto y accesorios',
            'taxclasses_id' => 297,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1215,
            'name' => 'Camping cocinar/comer/beber otros equipos',
            'taxclasses_id' => 297,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1216,
            'name' => 'Camping cocinar/comer/beber variedad packs de equipamiento',
            'taxclasses_id' => 297,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1217,
            'name' => 'Camping inodoros (sin alimentación)',
            'taxclasses_id' => 298,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1218,
            'name' => 'Duchas de camping',
            'taxclasses_id' => 298,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1219,
            'name' => 'Camping equipamiento sanitario/Lavado - piezas de recambio y accesorios',
            'taxclasses_id' => 298,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1220,
            'name' => 'Camping equipamiento sanitario/Lavado de otros',
            'taxclasses_id' => 298,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1221,
            'name' => 'Camping equipamiento sanitario/Lavado variedad Packs',
            'taxclasses_id' => 298,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1222,
            'name' => 'Camping variedad Packs',
            'taxclasses_id' => 299,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1223,
            'name' => 'Diversos paquetes de ropa',
            'taxclasses_id' => 217,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1224,
            'name' => 'Impreso/textual/Materiales de referencia diferentes packs',
            'taxclasses_id' => 162,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1225,
            'name' => 'Cajones',
            'taxclasses_id' => 300,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1226,
            'name' => 'Hogar/oficina/Armarios roperos',
            'taxclasses_id' => 300,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1227,
            'name' => 'Cocina estanterías de almacenamiento/pedestales/titulares/dispensadores',
            'taxclasses_id' => 284,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1228,
            'name' => 'Contenedores de almacenamiento de alimentos y/o Bebidas',
            'taxclasses_id' => 284,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1229,
            'name' => 'Almacenaje de cocina variedad Packs',
            'taxclasses_id' => 284,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1230,
            'name' => 'Almacenaje de cocina Otros',
            'taxclasses_id' => 284,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1231,
            'name' => 'Rechazar / Papeleras',
            'taxclasses_id' => 17,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1232,
            'name' => 'Filtros de agua/cartuchos de filtros de agua',
            'taxclasses_id' => 285,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1233,
            'name' => 'Decoraciones de bebidas/accesorios (no comestibles)',
            'taxclasses_id' => 291,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1234,
            'name' => 'Hervidores de agua (sin alimentación)',
            'taxclasses_id' => 285,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1235,
            'name' => 'Tapones de botella/Pourers',
            'taxclasses_id' => 285,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1236,
            'name' => 'Teteras/Cafetieres',
            'taxclasses_id' => 285,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1237,
            'name' => 'Agitadores de cócteles',
            'taxclasses_id' => 285,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1238,
            'name' => 'Amoladoras/Licuadoras/Picahielo (sin alimentación)',
            'taxclasses_id' => 285,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1239,
            'name' => 'Agua/bebidas diferentes packs de equipamiento',
            'taxclasses_id' => 285,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1240,
            'name' => 'Agua/bebidas otros equipos',
            'taxclasses_id' => 285,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1241,
            'name' => 'Temporizadores de cocina (sin alimentación)',
            'taxclasses_id' => 286,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1242,
            'name' => 'Equipo de medición de volumen de alimentos',
            'taxclasses_id' => 286,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1243,
            'name' => 'Termómetros para la industria alimentaria',
            'taxclasses_id' => 286,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1244,
            'name' => 'Equipo de medición diversos paquetes de alimentos',
            'taxclasses_id' => 286,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1245,
            'name' => 'Otros equipos de medición de alimentos',
            'taxclasses_id' => 286,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1246,
            'name' => 'Báscula de cocina (sin alimentación)',
            'taxclasses_id' => 286,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1247,
            'name' => 'Hob ollas o sartenes',
            'taxclasses_id' => 287,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1248,
            'name' => 'Cribas/coladores/Coladeras',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1249,
            'name' => 'Cortar en rodajas/Cuchillos',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1250,
            'name' => 'Mincers/Choppers/Ricers/fabricantes de pasta (sin alimentación)',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1251,
            'name' => 'Adornos de pastelería/pasteles/accesorios (no comestibles)',
            'taxclasses_id' => 291,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1252,
            'name' => 'Bakeware/Ovenware/Grillware (no desechable)',
            'taxclasses_id' => 287,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1253,
            'name' => 'Utensilios de cocina/Bakeware variedad Packs',
            'taxclasses_id' => 287,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1254,
            'name' => 'Utensilios de cocina/Bakeware Otros',
            'taxclasses_id' => 287,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1255,
            'name' => 'Las placas (no desechables)',
            'taxclasses_id' => 288,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1256,
            'name' => 'Tazones (no desechables)',
            'taxclasses_id' => 288,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1257,
            'name' => 'Tazas o vasos (no desechable)',
            'taxclasses_id' => 288,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1258,
            'name' => 'Cuchillería (no desechables)',
            'taxclasses_id' => 288,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1259,
            'name' => 'Servir/Vasos',
            'taxclasses_id' => 288,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1260,
            'name' => 'Sirviendo jarras/Lanzadores/decantadores',
            'taxclasses_id' => 288,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1261,
            'name' => 'Bandejas de servir',
            'taxclasses_id' => 288,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1262,
            'name' => 'Sirviendo alimentos carros (sin alimentación)',
            'taxclasses_id' => 288,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1263,
            'name' => 'Calentadores de alimentos y/o bebidas (sin alimentación)',
            'taxclasses_id' => 288,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1264,
            'name' => 'Vino de hielo/cubos',
            'taxclasses_id' => 288,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1265,
            'name' => 'Sal y pimienta/Especias Mills (sin alimentación)',
            'taxclasses_id' => 288,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1266,
            'name' => 'Puestos de comida/muestra',
            'taxclasses_id' => 288,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1267,
            'name' => 'Servir/comer/beber vajilla variedad Packs',
            'taxclasses_id' => 288,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1268,
            'name' => 'Servir/comer/beber vajilla Otros',
            'taxclasses_id' => 288,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1269,
            'name' => 'Cuchillos de cocina/Cleavers',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1270,
            'name' => 'Corers/Peelers',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1271,
            'name' => 'Espátulas/Palas/Cucharas',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1272,
            'name' => 'Pinzas y tenazas/Mazas/Mashers/levantaclaras',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1273,
            'name' => 'Cocina/cuchillas cortadoras/ralladores',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1274,
            'name' => 'Pasadores de rodadura',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1275,
            'name' => 'Los pinchos o se atasca.',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1276,
            'name' => 'Los abresurcos - cocina',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1277,
            'name' => 'Herramientas de Cocina multifunción',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1278,
            'name' => 'El equipo de preparación de alimentos variedad Packs',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1279,
            'name' => 'Otros equipos de preparación de alimentos',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1280,
            'name' => 'Cocina variedad de mercancías Packs',
            'taxclasses_id' => 290,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1281,
            'name' => 'Hogar/Oficina Estanterías',
            'taxclasses_id' => 300,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1282,
            'name' => 'Archivadores',
            'taxclasses_id' => 300,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1283,
            'name' => 'Unidades de entretenimiento Universal',
            'taxclasses_id' => 300,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1284,
            'name' => 'Hogar/Oficina cajas/cestas',
            'taxclasses_id' => 300,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1285,
            'name' => 'Guías/soportes de almacenamiento',
            'taxclasses_id' => 300,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1286,
            'name' => 'Los organizadores del hogar/Tidies',
            'taxclasses_id' => 300,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1287,
            'name' => 'Hogar/Oficina particiones/pantallas',
            'taxclasses_id' => 300,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1288,
            'name' => 'Hogar/oficina/pantalla de almacenamiento/pantallas diferentes packs de muebles',
            'taxclasses_id' => 300,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1289,
            'name' => 'Sillas de oficina/hogar/deposiciones (alimentado)',
            'taxclasses_id' => 301,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1290,
            'name' => 'Sillas de oficina/hogar/deposiciones (sin alimentación)',
            'taxclasses_id' => 301,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1291,
            'name' => 'Hogar/Oficina sofás (alimentado)',
            'taxclasses_id' => 301,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1292,
            'name' => 'Hogar/Oficina sofás (sin alimentación)',
            'taxclasses_id' => 301,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1293,
            'name' => 'Hogar/Oficina sofá camas',
            'taxclasses_id' => 301,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1294,
            'name' => 'Bolsas de Frijoles/Pouffes/Otomanos',
            'taxclasses_id' => 301,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1295,
            'name' => 'Asientos inflables',
            'taxclasses_id' => 301,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1296,
            'name' => 'Hogar/Oficina reposapiés',
            'taxclasses_id' => 301,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1297,
            'name' => 'Hogar/Oficina paquetes variedad de asientos',
            'taxclasses_id' => 301,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1298,
            'name' => 'Hogar/Oficina Otros asientos',
            'taxclasses_id' => 301,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1299,
            'name' => 'Hogar/mesas de oficina',
            'taxclasses_id' => 302,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1300,
            'name' => 'Hogar/escritorios de oficina y estaciones de trabajo',
            'taxclasses_id' => 302,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1301,
            'name' => 'Hogar/Oficina Mesas Redondas/Otros',
            'taxclasses_id' => 302,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1302,
            'name' => 'Hogar/mesas de oficina/Escritorios variedad Packs',
            'taxclasses_id' => 302,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1303,
            'name' => 'Hogar marcos de cama/canapés',
            'taxclasses_id' => 303,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1304,
            'name' => 'Hogar camas ajustables (impulsado)',
            'taxclasses_id' => 303,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1305,
            'name' => 'Hogar camas ajustables (no motorizado)',
            'taxclasses_id' => 303,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1306,
            'name' => 'Colchones hogar',
            'taxclasses_id' => 303,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1307,
            'name' => 'Hogar/camas hinchables camas de agua',
            'taxclasses_id' => 303,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1308,
            'name' => 'Hogar camas/Colchones Otros',
            'taxclasses_id' => 303,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1309,
            'name' => 'Hogar camas/Colchones variedad Packs',
            'taxclasses_id' => 303,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1310,
            'name' => 'Cortinas',
            'taxclasses_id' => 307,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1311,
            'name' => 'Las persianas de la ventana',
            'taxclasses_id' => 307,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1312,
            'name' => 'Mobiliario cubiertas/Paños - desmontables',
            'taxclasses_id' => 307,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1313,
            'name' => 'Cojines',
            'taxclasses_id' => 307,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1314,
            'name' => 'Alfombras mobiliario/Mats - desmontables',
            'taxclasses_id' => 307,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1315,
            'name' => 'Tejido/Textil toallas',
            'taxclasses_id' => 307,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1316,
            'name' => 'Hogar/oficina/textil tejido mobiliario variedad Packs',
            'taxclasses_id' => 307,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1317,
            'name' => 'Hogar/oficina Muebles textil tejido/Otros',
            'taxclasses_id' => 307,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1318,
            'name' => 'Edredones y colchas/colchón acolchado',
            'taxclasses_id' => 308,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1319,
            'name' => 'Fundas de edredón',
            'taxclasses_id' => 308,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1320,
            'name' => 'Mantas/Lanzamientos (sin alimentación)',
            'taxclasses_id' => 308,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1321,
            'name' => 'Almohadas',
            'taxclasses_id' => 308,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1322,
            'name' => 'Fundas de almohadas',
            'taxclasses_id' => 308,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1323,
            'name' => 'Sábanas/faldillas',
            'taxclasses_id' => 308,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1324,
            'name' => 'Colchones y almohadas y edredón protectores',
            'taxclasses_id' => 308,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1325,
            'name' => 'Sus arriates Packs',
            'taxclasses_id' => 308,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1326,
            'name' => 'Otras Camas',
            'taxclasses_id' => 308,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1327,
            'name' => 'Adornos',
            'taxclasses_id' => 310,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1328,
            'name' => 'Artificiales flores/plantas/árboles',
            'taxclasses_id' => 310,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1329,
            'name' => 'Floreros',
            'taxclasses_id' => 310,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1330,
            'name' => 'Imanes decorativos/Adhesivos/Ventana se aferra',
            'taxclasses_id' => 310,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1331,
            'name' => 'Sun/Dream Receptors/Windchimes',
            'taxclasses_id' => 310,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1332,
            'name' => 'Decoraciones de temporada (sin alimentación)',
            'taxclasses_id' => 310,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1333,
            'name' => 'Decoraciones de temporada (impulsado)',
            'taxclasses_id' => 310,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1334,
            'name' => 'Adornos diversos Packs',
            'taxclasses_id' => 310,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1335,
            'name' => 'Pinturas',
            'taxclasses_id' => 311,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1336,
            'name' => 'Carteles/impresiones',
            'taxclasses_id' => 311,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1337,
            'name' => 'Fotografías',
            'taxclasses_id' => 311,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1338,
            'name' => 'Espejos',
            'taxclasses_id' => 311,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1339,
            'name' => 'Los marcos de imagen',
            'taxclasses_id' => 311,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1340,
            'name' => 'Fotografías/espejos/Marcos variedad Packs',
            'taxclasses_id' => 311,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1341,
            'name' => 'Imagen de marcos, espejos y otros',
            'taxclasses_id' => 311,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1342,
            'name' => 'Portavelas/accesorios',
            'taxclasses_id' => 310,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1343,
            'name' => 'Relojes',
            'taxclasses_id' => 312,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1344,
            'name' => 'Enaguas/enaguas/patina',
            'taxclasses_id' => 214,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1345,
            'name' => 'Pantyhose/medias',
            'taxclasses_id' => 214,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1346,
            'name' => 'Tirantes/ligueros',
            'taxclasses_id' => 214,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1347,
            'name' => 'Revestimientos de paredes - Rollos',
            'taxclasses_id' => 428,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1348,
            'name' => 'Revestimientos de paredes - Azulejos',
            'taxclasses_id' => 428,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1349,
            'name' => 'Cubriendo los accesorios de pared/techo',
            'taxclasses_id' => 428,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1350,
            'name' => 'Revestimientos de paredes - Hojas/Panels/losas',
            'taxclasses_id' => 428,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1351,
            'name' => 'Otros Revestimientos de pared/techo',
            'taxclasses_id' => 428,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1352,
            'name' => 'Revestimientos de pared/techo variedad Packs',
            'taxclasses_id' => 428,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1353,
            'name' => 'Pisos - cerámicas y azulejos de porcelana',
            'taxclasses_id' => 429,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1354,
            'name' => 'Accesorios pavimentos',
            'taxclasses_id' => 429,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1355,
            'name' => 'Pisos - Alfombra',
            'taxclasses_id' => 429,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1356,
            'name' => 'Suelos de madera maciza',
            'taxclasses_id' => 429,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1357,
            'name' => 'Pisos - pvc/caucho/Linóleo',
            'taxclasses_id' => 429,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1358,
            'name' => 'Pisos - Cork/Bamboo',
            'taxclasses_id' => 429,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1359,
            'name' => 'Suelos de mármol/piedra',
            'taxclasses_id' => 429,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1360,
            'name' => 'Pisos - Laminado',
            'taxclasses_id' => 429,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1361,
            'name' => 'Otros suelos',
            'taxclasses_id' => 429,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1362,
            'name' => 'Pisos variedad Packs',
            'taxclasses_id' => 429,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1363,
            'name' => 'Aislamiento - Batts/Rollos/mantas',
            'taxclasses_id' => 430,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1364,
            'name' => 'Aislamiento - junta de espuma rígida (interior)',
            'taxclasses_id' => 430,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1365,
            'name' => 'Aislamiento de espuma por pulverización/Relleno suelto',
            'taxclasses_id' => 430,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1366,
            'name' => 'Aislamiento de otros',
            'taxclasses_id' => 430,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1367,
            'name' => 'Aislamiento variedad Packs',
            'taxclasses_id' => 430,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1368,
            'name' => 'Pinturas de propósito especial',
            'taxclasses_id' => 431,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1369,
            'name' => 'Acabado en madera o tratamientos y revestimientos',
            'taxclasses_id' => 431,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1370,
            'name' => 'Pintura de piezas de recambio',
            'taxclasses_id' => 383,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1371,
            'name' => 'El Polvo de Hojas Hojas/caída',
            'taxclasses_id' => 431,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1372,
            'name' => 'Removedores de pintura/Barniz/limpiadores',
            'taxclasses_id' => 431,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1373,
            'name' => 'Pintura variedad Packs',
            'taxclasses_id' => 431,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1374,
            'name' => 'Otra pintura',
            'taxclasses_id' => 431,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1375,
            'name' => 'Building Products variedad Packs',
            'taxclasses_id' => 432,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1376,
            'name' => 'Escaleras prefabricadas -',
            'taxclasses_id' => 437,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1377,
            'name' => 'Puestos Newel',
            'taxclasses_id' => 437,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1378,
            'name' => 'Entresuelo/Buhardilla escaleras',
            'taxclasses_id' => 439,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1379,
            'name' => 'Stone - Stone terminadoras',
            'taxclasses_id' => 433,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1380,
            'name' => 'Agregado',
            'taxclasses_id' => 433,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1381,
            'name' => 'Mezclas de hormigón',
            'taxclasses_id' => 433,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1382,
            'name' => 'Brick/bloque',
            'taxclasses_id' => 433,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1383,
            'name' => 'Cemento',
            'taxclasses_id' => 433,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1384,
            'name' => 'De estuco.',
            'taxclasses_id' => 433,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1385,
            'name' => 'Las mezclas de yeso',
            'taxclasses_id' => 433,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1386,
            'name' => 'Cal (DIY)',
            'taxclasses_id' => 433,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1387,
            'name' => 'Columnas (estructural)',
            'taxclasses_id' => 434,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1388,
            'name' => 'Suplementos/espaciadores',
            'taxclasses_id' => 429,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1389,
            'name' => 'Vigas de piso',
            'taxclasses_id' => 434,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1390,
            'name' => 'I-vigas',
            'taxclasses_id' => 434,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1391,
            'name' => 'Hardwood Lumber (Dimensión/Estructurales)',
            'taxclasses_id' => 435,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1392,
            'name' => 'Madera blanda (Dimensión/Estructurales)',
            'taxclasses_id' => 435,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1393,
            'name' => 'Engineered Wood (Dimensión/Estructurales)',
            'taxclasses_id' => 435,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1394,
            'name' => 'Madera contrachapada/OSB',
            'taxclasses_id' => 435,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1395,
            'name' => 'Yeso/Junta de cemento',
            'taxclasses_id' => 435,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1396,
            'name' => 'Windows - Unidades de combinación - Madera',
            'taxclasses_id' => 448,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1397,
            'name' => 'Marcos de ventana',
            'taxclasses_id' => 436,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1398,
            'name' => 'Claraboyas - Sin madera',
            'taxclasses_id' => 448,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1399,
            'name' => 'Ventana de la película',
            'taxclasses_id' => 436,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1400,
            'name' => 'Cierres de ventanas/tornillos',
            'taxclasses_id' => 436,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1401,
            'name' => 'Pantallas de ventana',
            'taxclasses_id' => 436,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1402,
            'name' => 'Toldos - Powered',
            'taxclasses_id' => 436,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1403,
            'name' => 'Controles de ventana',
            'taxclasses_id' => 436,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1404,
            'name' => 'Windows - Storm',
            'taxclasses_id' => 448,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1405,
            'name' => 'Pozos de ventana',
            'taxclasses_id' => 436,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1406,
            'name' => 'Los saldos de la ventana',
            'taxclasses_id' => 436,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1407,
            'name' => 'en el interior de las puertas',
            'taxclasses_id' => 438,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1408,
            'name' => 'puertas de garaje',
            'taxclasses_id' => 438,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1409,
            'name' => 'Puertas - Patio',
            'taxclasses_id' => 438,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1410,
            'name' => 'Puertas - Exterior',
            'taxclasses_id' => 438,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1411,
            'name' => 'Placas para puertas',
            'taxclasses_id' => 439,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1412,
            'name' => 'Empuñaduras de puerta/mandos/palancas',
            'taxclasses_id' => 439,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1413,
            'name' => 'Cierrapuertas',
            'taxclasses_id' => 439,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1414,
            'name' => 'Tiempo puerta eliminadores',
            'taxclasses_id' => 439,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1415,
            'name' => 'Colgajos perro/gato',
            'taxclasses_id' => 438,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1416,
            'name' => 'Los buzones',
            'taxclasses_id' => 439,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1417,
            'name' => 'Casa - Identificación de números/letras',
            'taxclasses_id' => 439,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1418,
            'name' => 'Empujadores, accionados de la puerta',
            'taxclasses_id' => 439,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1419,
            'name' => 'Cristal',
            'taxclasses_id' => 440,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1420,
            'name' => 'Bidé',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1421,
            'name' => 'Aseos',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1422,
            'name' => 'Urinarios',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1423,
            'name' => 'Orinal particiones',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1424,
            'name' => 'Wc/Orinal cisternas',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1425,
            'name' => 'Bañera/ducha módulos',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1426,
            'name' => 'Lavabos y fregaderos',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1427,
            'name' => 'Combinaciones de Base/disipador',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1428,
            'name' => 'bañeras de inmersión',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1429,
            'name' => 'Bañeras: bañeras (tinas calientes/SPA)',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1430,
            'name' => 'Cabinas de Ducha/Suites',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1431,
            'name' => 'Ducha Pans/Bandejas',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1432,
            'name' => 'Bañera/ducha puertas',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1433,
            'name' => 'Bañera/ducha los paneles de protección',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1434,
            'name' => 'Grifos/TAPS',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1435,
            'name' => 'Cabezales de ducha',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1436,
            'name' => 'Lavabo/fregadero pedestales',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1437,
            'name' => 'Baños',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1438,
            'name' => 'Maceradoras',
            'taxclasses_id' => 380,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1439,
            'name' => 'Porcelana sanitaria - piezas de recambio y accesorios',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1440,
            'name' => 'Porcelana sanitaria variedad Packs',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1441,
            'name' => 'Ducha Thermo Alarmas',
            'taxclasses_id' => 374,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1442,
            'name' => 'Ascensores de baño',
            'taxclasses_id' => 374,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1443,
            'name' => 'Accesorios de Baño variedad Packs',
            'taxclasses_id' => 374,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1444,
            'name' => 'Tanques de agua',
            'taxclasses_id' => 375,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1445,
            'name' => 'Los tratamientos en agua (DIY)',
            'taxclasses_id' => 375,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1446,
            'name' => 'Los inhibidores de la escala',
            'taxclasses_id' => 375,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1447,
            'name' => 'Almacenamiento de agua/Tratamiento - accesorios/Repuestos',
            'taxclasses_id' => 375,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1448,
            'name' => 'Almacenamiento de agua/Tratamiento variedad Packs',
            'taxclasses_id' => 375,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1449,
            'name' => 'Controles del sistema de calefacción',
            'taxclasses_id' => 376,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1450,
            'name' => 'Los radiadores',
            'taxclasses_id' => 376,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1451,
            'name' => 'Calentadores de inmersión',
            'taxclasses_id' => 376,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1452,
            'name' => 'Calderas domésticas/hornos y calentadores de agua de depósito',
            'taxclasses_id' => 376,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1453,
            'name' => 'Calefacción central de piezas de recambio y accesorios',
            'taxclasses_id' => 376,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1454,
            'name' => 'Equipo de calefacción variedad Packs',
            'taxclasses_id' => 376,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1455,
            'name' => 'Piezas y accesorios de drenaje del césped',
            'taxclasses_id' => 441,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1456,
            'name' => 'Canalones/drenaje variedad Packs',
            'taxclasses_id' => 441,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1457,
            'name' => 'Canalones piezas/accesorios',
            'taxclasses_id' => 441,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1458,
            'name' => 'Canalones/drenaje Otros',
            'taxclasses_id' => 441,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1459,
            'name' => 'Piezas de barandilla de cubierta',
            'taxclasses_id' => 442,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1460,
            'name' => 'Decking - Composite',
            'taxclasses_id' => 442,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1461,
            'name' => 'Decking Accesorios',
            'taxclasses_id' => 442,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1462,
            'name' => 'Sistemas de barandilla de cubierta - Composite',
            'taxclasses_id' => 442,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1463,
            'name' => 'Los sistemas de drenaje de cubierta',
            'taxclasses_id' => 442,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1464,
            'name' => 'Decking/Baranda Otros',
            'taxclasses_id' => 442,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1465,
            'name' => 'Decking/Baranda variedad Packs',
            'taxclasses_id' => 442,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1466,
            'name' => 'Revestimiento exterior Siding',
            'taxclasses_id' => 449,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1467,
            'name' => 'Tejas/Pizarras/Zóster/batidos',
            'taxclasses_id' => 443,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1468,
            'name' => 'Techado de rollo',
            'taxclasses_id' => 443,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1469,
            'name' => 'Los paneles o losas impermeabilización',
            'taxclasses_id' => 443,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1470,
            'name' => 'Las membranas de impermeabilización',
            'taxclasses_id' => 443,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1471,
            'name' => 'Revestimientos de techo',
            'taxclasses_id' => 443,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1472,
            'name' => 'Ventilación de techo/intermitente/Trim bobinas',
            'taxclasses_id' => 443,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1473,
            'name' => 'Otros techado',
            'taxclasses_id' => 443,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1474,
            'name' => 'Techumbre variedad Packs',
            'taxclasses_id' => 443,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1475,
            'name' => 'Tapón de cuerpo/parche',
            'taxclasses_id' => 318,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1476,
            'name' => 'Relleno de Scratch/reparación de plásticos preparados (industria automotriz)',
            'taxclasses_id' => 318,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1477,
            'name' => 'Los reductores/Retarders (industria automotriz)',
            'taxclasses_id' => 318,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1478,
            'name' => 'Sustitución Moldura/Embellecedores (industria automotriz)',
            'taxclasses_id' => 318,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1479,
            'name' => 'El burlete (industria automotriz)',
            'taxclasses_id' => 318,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1480,
            'name' => 'Pin Striping (industria automotriz)',
            'taxclasses_id' => 318,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1481,
            'name' => 'Equipos de fijación de carga (industria automotriz)',
            'taxclasses_id' => 319,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1482,
            'name' => 'Los racks de equipos/transportistas (industria automotriz)',
            'taxclasses_id' => 319,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1483,
            'name' => 'Extensores/parachoques Packs (industria automotriz)',
            'taxclasses_id' => 319,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1484,
            'name' => 'Rampas de servicio del vehículo/ascensores (industria automotriz)',
            'taxclasses_id' => 323,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1485,
            'name' => 'Cajas de almacenamiento interior/Bandejas/cestas (industria automotriz)',
            'taxclasses_id' => 319,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1486,
            'name' => 'Gestión de la carga en otros (industria automotriz)',
            'taxclasses_id' => 319,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1487,
            'name' => 'Preparación del parabrisas de coche (industria automotriz)',
            'taxclasses_id' => 320,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1488,
            'name' => 'Cuidado de los neumáticos de coche - Limpiadores/Espumas/brilla',
            'taxclasses_id' => 320,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1489,
            'name' => 'Coche Body Care - Lava/Ceras/Protectores Removedores/',
            'taxclasses_id' => 320,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1490,
            'name' => 'Rueda del coche cuidado - Limpiadores/brilla',
            'taxclasses_id' => 320,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1491,
            'name' => 'Apariencia de otros productos químicos (industria automotriz)',
            'taxclasses_id' => 320,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1492,
            'name' => 'Productos químicos diversos paquetes de apariencia (industria automotriz)',
            'taxclasses_id' => 320,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1493,
            'name' => 'Limpiadores de freno',
            'taxclasses_id' => 321,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1494,
            'name' => 'Carburador/aerosoles estrangulador',
            'taxclasses_id' => 321,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1495,
            'name' => 'Limpiador de carburador/Piezas Dip',
            'taxclasses_id' => 321,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1496,
            'name' => 'Motor de control de la contaminación/desengrasantes',
            'taxclasses_id' => 321,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1497,
            'name' => 'El líquido de la transmisión',
            'taxclasses_id' => 322,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1498,
            'name' => 'Líquido de la transmisión',
            'taxclasses_id' => 322,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1499,
            'name' => 'El líquido de la transmisión variedad Packs',
            'taxclasses_id' => 322,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1500,
            'name' => 'Reparación de escape/silenciador',
            'taxclasses_id' => 323,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1501,
            'name' => 'Depósito de combustible/Línea/Kits de reparación',
            'taxclasses_id' => 323,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1502,
            'name' => 'Radiador/Kits de reparación',
            'taxclasses_id' => 323,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1503,
            'name' => 'Retrovisor/Kits de reparación',
            'taxclasses_id' => 323,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1504,
            'name' => 'Desempañador de luneta y kits de reparación',
            'taxclasses_id' => 323,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1505,
            'name' => 'Y Kits de reparación de vidrio',
            'taxclasses_id' => 323,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1506,
            'name' => 'Otros de reparación/mantenimiento',
            'taxclasses_id' => 323,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1507,
            'name' => 'Combustible de emergencia Sida',
            'taxclasses_id' => 324,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1508,
            'name' => 'Back-up/sensores de alarmas',
            'taxclasses_id' => 324,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1509,
            'name' => 'Luces de emergencia (industria automotriz)',
            'taxclasses_id' => 349,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1510,
            'name' => 'Signos de advertencia/Triángulos (industria automotriz)',
            'taxclasses_id' => 324,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1511,
            'name' => 'Lado Carretera Kits de emergencia',
            'taxclasses_id' => 324,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1512,
            'name' => 'Otra de seguridad (industria automotriz)',
            'taxclasses_id' => 324,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1513,
            'name' => 'Variedad de paquetes de seguridad (industria automotriz)',
            'taxclasses_id' => 324,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1514,
            'name' => 'Los asientos (industria automotriz)',
            'taxclasses_id' => 325,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1515,
            'name' => 'Fundas de asiento (industria automotriz)',
            'taxclasses_id' => 325,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1516,
            'name' => 'Cojines de asiento (industria automotriz)',
            'taxclasses_id' => 325,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1517,
            'name' => 'Los cinturones de seguridad/extensores',
            'taxclasses_id' => 325,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1518,
            'name' => 'Almohadillas de cinturón',
            'taxclasses_id' => 325,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1519,
            'name' => 'Cabeza/Cuello, cojines (industria automotriz)',
            'taxclasses_id' => 325,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1520,
            'name' => 'Asiento/Accesorios de hardware (industria automotriz)',
            'taxclasses_id' => 325,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1521,
            'name' => 'Consolas (industria automotriz)',
            'taxclasses_id' => 326,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1522,
            'name' => 'Cestas y bolsas de basura (industria automotriz)',
            'taxclasses_id' => 326,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1523,
            'name' => 'Almacenamiento interior Otros (industria automotriz)',
            'taxclasses_id' => 326,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1524,
            'name' => 'Los ceniceros (industria automotriz)',
            'taxclasses_id' => 327,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1525,
            'name' => 'Relojes (industria automotriz)',
            'taxclasses_id' => 327,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1526,
            'name' => 'Barras de ropa (industria automotriz)',
            'taxclasses_id' => 327,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1527,
            'name' => 'Brújulas (industria automotriz)',
            'taxclasses_id' => 327,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1528,
            'name' => 'Portavasos (industria automotriz)',
            'taxclasses_id' => 327,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1529,
            'name' => 'Llaveros (industria automotriz)',
            'taxclasses_id' => 327,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1530,
            'name' => 'Snack/Beber bandejas (industria automotriz)',
            'taxclasses_id' => 327,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1531,
            'name' => 'Luces de mapa (industria automotriz)',
            'taxclasses_id' => 327,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1532,
            'name' => 'Los termómetros (industria automotriz)',
            'taxclasses_id' => 327,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1533,
            'name' => 'Unidades de combinación de accesorios interiores (industria automotriz)',
            'taxclasses_id' => 327,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1534,
            'name' => 'Ventiladores (industria automotriz)',
            'taxclasses_id' => 327,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1535,
            'name' => 'Unidades de refrigeración/calentador (industria automotriz)',
            'taxclasses_id' => 327,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1536,
            'name' => 'Tonos de parabrisas',
            'taxclasses_id' => 328,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1537,
            'name' => 'Los matices de la ventana',
            'taxclasses_id' => 328,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1538,
            'name' => 'Viseras de ventanas/puertas',
            'taxclasses_id' => 328,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1539,
            'name' => 'Ruedas de dirección',
            'taxclasses_id' => 329,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1540,
            'name' => 'Las cubiertas de las ruedas de dirección',
            'taxclasses_id' => 329,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1541,
            'name' => 'Volante/Accesorios de hardware',
            'taxclasses_id' => 329,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1542,
            'name' => 'Alfombra de sustitución (industria automotriz)',
            'taxclasses_id' => 330,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1543,
            'name' => 'Pasos de puerta/Kick Placas (industria automotriz)',
            'taxclasses_id' => 330,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1544,
            'name' => 'Alfombrillas (industria automotriz)',
            'taxclasses_id' => 330,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1545,
            'name' => 'Revestimiento interior de carga/bandejas (industria automotriz)',
            'taxclasses_id' => 330,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1546,
            'name' => 'Otros pavimentos interiores (industria automotriz)',
            'taxclasses_id' => 330,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1547,
            'name' => 'Dash Juegos de tapizado',
            'taxclasses_id' => 331,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1548,
            'name' => 'Dash Mats/tapas',
            'taxclasses_id' => 331,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1549,
            'name' => 'Molduras y paneles de instrumentos',
            'taxclasses_id' => 331,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1550,
            'name' => 'Calibres de interiores (industria automotriz)',
            'taxclasses_id' => 332,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1551,
            'name' => 'Mandos de cambio/manijas (industria automotriz)',
            'taxclasses_id' => 332,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1552,
            'name' => 'Botas/Cambiador Kits (industria automotriz)',
            'taxclasses_id' => 332,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1553,
            'name' => 'Cubiertas del pedal/juegos (industria automotriz)',
            'taxclasses_id' => 332,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1554,
            'name' => 'Accesorios decorativos Perillas y botones.',
            'taxclasses_id' => 332,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1555,
            'name' => 'Manijas decorativas/Gira',
            'taxclasses_id' => 332,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1556,
            'name' => 'Accesorios decorativos/Hardware (industria automotriz)',
            'taxclasses_id' => 332,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1557,
            'name' => 'Revestimientos/Kits (industria automotriz)',
            'taxclasses_id' => 332,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1558,
            'name' => 'Accesorios interiores - Variedad decorativa Packs (industria automotriz)',
            'taxclasses_id' => 332,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1559,
            'name' => 'Accesorios interiores - Otros decorativos (industria automotriz)',
            'taxclasses_id' => 332,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1560,
            'name' => 'Estribos (industria automotriz)',
            'taxclasses_id' => 333,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1561,
            'name' => 'Nerf/Paso Barras (industria automotriz)',
            'taxclasses_id' => 333,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1562,
            'name' => 'Pasos/Cast extruido (industria automotriz)',
            'taxclasses_id' => 333,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1563,
            'name' => 'Los paragolpes',
            'taxclasses_id' => 334,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1564,
            'name' => 'Cepillo / Protecciones de rejilla',
            'taxclasses_id' => 334,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1565,
            'name' => 'Empujar/A Bares (industria automotriz)',
            'taxclasses_id' => 334,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1566,
            'name' => 'Decorativas/parrillas personalizadas',
            'taxclasses_id' => 334,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1567,
            'name' => 'Inserciones de rejilla',
            'taxclasses_id' => 334,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1568,
            'name' => 'Los patines',
            'taxclasses_id' => 334,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1569,
            'name' => 'Bug/capó escudos (industria automotriz)',
            'taxclasses_id' => 335,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1570,
            'name' => 'Parabrisas delantero visores',
            'taxclasses_id' => 335,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1571,
            'name' => 'Deflector de ventanilla lateral/visores',
            'taxclasses_id' => 335,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1572,
            'name' => 'Ventana trasera/Deflector de techo viseras (industria automotriz)',
            'taxclasses_id' => 335,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1573,
            'name' => 'Deflectores de techo solar',
            'taxclasses_id' => 335,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1574,
            'name' => 'El carenado de la cabina',
            'taxclasses_id' => 335,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1575,
            'name' => 'Protectores contra salpicaduras/Faldillas',
            'taxclasses_id' => 336,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1576,
            'name' => 'Cubiertas del vehículo',
            'taxclasses_id' => 336,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1577,
            'name' => 'Los guardias de la puerta (industria automotriz)',
            'taxclasses_id' => 336,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1578,
            'name' => 'Las cubiertas de las lentes (industria automotriz)',
            'taxclasses_id' => 336,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1579,
            'name' => 'Bastidor de matrícula/protectores',
            'taxclasses_id' => 336,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1580,
            'name' => 'Placas decorativas -',
            'taxclasses_id' => 336,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1581,
            'name' => 'Cubiertas del neumático de repuesto',
            'taxclasses_id' => 336,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1582,
            'name' => 'Películas de protección de pintura (industria automotriz)',
            'taxclasses_id' => 336,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1583,
            'name' => 'Carretilla/Kits de hardware',
            'taxclasses_id' => 336,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1584,
            'name' => 'Tops/Skins - piezas de recambio y Accesorios (industria automotriz)',
            'taxclasses_id' => 336,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1585,
            'name' => 'Cubiertas de protección/otros (industria automotriz)',
            'taxclasses_id' => 336,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1586,
            'name' => 'Los techos solares/Moonroofs/T-tops (industria automotriz)',
            'taxclasses_id' => 337,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1587,
            'name' => 'Palas/rejillas (industria automotriz)',
            'taxclasses_id' => 337,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1588,
            'name' => 'Alas y alerones (industria automotriz)',
            'taxclasses_id' => 337,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1589,
            'name' => 'Las láminas (industria automotriz)',
            'taxclasses_id' => 337,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1590,
            'name' => 'Los guardabarros/guardabarros bengalas',
            'taxclasses_id' => 337,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1591,
            'name' => 'Las molduras de la ventana lateral/cubiertas (industria automotriz)',
            'taxclasses_id' => 337,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1592,
            'name' => 'Carcasas personalizadas',
            'taxclasses_id' => 337,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1593,
            'name' => 'Lente/luz de las molduras (industria automotriz)',
            'taxclasses_id' => 337,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1594,
            'name' => 'Emblemas/Graphics - decorativo (industria automotriz)',
            'taxclasses_id' => 337,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1595,
            'name' => 'Aspecto exterior de otros accesorios (industria automotriz)',
            'taxclasses_id' => 337,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1596,
            'name' => 'Aspecto exterior de la variedad de accesorios Packs',
            'taxclasses_id' => 337,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1597,
            'name' => 'Los neumáticos',
            'taxclasses_id' => 338,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1598,
            'name' => 'Ruedas',
            'taxclasses_id' => 338,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1599,
            'name' => 'Bombas de neumáticos (industria automotriz)',
            'taxclasses_id' => 339,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1600,
            'name' => 'Compresores de aire (industria automotriz)',
            'taxclasses_id' => 339,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1601,
            'name' => 'Los kits de reparación de neumáticos plana',
            'taxclasses_id' => 339,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1602,
            'name' => 'Tornillería de la rueda',
            'taxclasses_id' => 339,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1603,
            'name' => 'Infladores de neumáticos - Química (industria automotriz)',
            'taxclasses_id' => 339,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1604,
            'name' => 'Las cubiertas de las ruedas',
            'taxclasses_id' => 339,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1605,
            'name' => 'Simuladores de freno de disco',
            'taxclasses_id' => 339,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1606,
            'name' => 'Belleza/anillos embellecedores',
            'taxclasses_id' => 339,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1607,
            'name' => 'Sistemas de lavado - Powered (industria automotriz)',
            'taxclasses_id' => 340,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1608,
            'name' => 'Buffers/Máquinas de pulido (industria automotriz)',
            'taxclasses_id' => 340,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1609,
            'name' => 'Aspecto/Fragancia Otros accesorios',
            'taxclasses_id' => 340,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1610,
            'name' => 'Aspecto/Fragancia Variedad de accesorios Packs (industria automotriz)',
            'taxclasses_id' => 340,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1611,
            'name' => 'Los enganches (industria automotriz)',
            'taxclasses_id' => 341,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1612,
            'name' => 'Tornillería de enganche/conjuntos (industria automotriz)',
            'taxclasses_id' => 341,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1613,
            'name' => 'Los tubos receptores/collares (industria automotriz)',
            'taxclasses_id' => 341,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1614,
            'name' => 'Adaptadores de enganche (industria automotriz)',
            'taxclasses_id' => 341,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1615,
            'name' => 'Pasadores/Clips - Enganche (industria automotriz)',
            'taxclasses_id' => 341,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1616,
            'name' => 'Cuerdas de remolque/tiras (industria automotriz)',
            'taxclasses_id' => 341,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1617,
            'name' => 'Ganchos de remolque (industria automotriz)',
            'taxclasses_id' => 341,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1618,
            'name' => 'Barras de remolque (industria automotriz)',
            'taxclasses_id' => 341,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1619,
            'name' => 'Accesorios de bloqueo de remolque',
            'taxclasses_id' => 341,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1620,
            'name' => 'Cubiertas de enganche (industria automotriz)',
            'taxclasses_id' => 341,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1621,
            'name' => 'Pasos del enganche (industria automotriz)',
            'taxclasses_id' => 341,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1622,
            'name' => 'Espejos de remolque (industria automotriz)',
            'taxclasses_id' => 341,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1623,
            'name' => 'Las cadenas de seguridad/Cables - Remolque (industria automotriz)',
            'taxclasses_id' => 341,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1624,
            'name' => 'Las bolas de remolque/enganche (industria automotriz)',
            'taxclasses_id' => 341,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1625,
            'name' => 'Barras de tiro/bola de remolque montajes (industria automotriz)',
            'taxclasses_id' => 341,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1626,
            'name' => 'Componentes de remolcado - Heavy Duty',
            'taxclasses_id' => 341,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1627,
            'name' => 'Enganche de remolque/Otros',
            'taxclasses_id' => 341,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1628,
            'name' => 'Enganche de remolque/variedad Packs',
            'taxclasses_id' => 341,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1629,
            'name' => 'Conectores - Remolque',
            'taxclasses_id' => 342,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1630,
            'name' => 'Controles de freno',
            'taxclasses_id' => 342,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1631,
            'name' => 'Módulos de potencia',
            'taxclasses_id' => 342,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1632,
            'name' => 'Adaptadores y convertidores de cableado',
            'taxclasses_id' => 342,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1633,
            'name' => 'Kits de cableado/mazos de cables',
            'taxclasses_id' => 342,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1634,
            'name' => 'Luces de remolque',
            'taxclasses_id' => 342,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1635,
            'name' => 'El remolque/enganche eléctrico - Otros',
            'taxclasses_id' => 342,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1636,
            'name' => 'Enganche/remolque - Eléctrico variedad Packs',
            'taxclasses_id' => 342,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1637,
            'name' => 'Tomas de remolque/Stands',
            'taxclasses_id' => 343,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1638,
            'name' => 'Acopladores - Remolque (industria automotriz)',
            'taxclasses_id' => 343,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1639,
            'name' => 'Los frenos del remolque',
            'taxclasses_id' => 343,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1640,
            'name' => 'Protectores de cojinete de rueda',
            'taxclasses_id' => 343,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1641,
            'name' => 'Las luces del remolque/reflectores',
            'taxclasses_id' => 343,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1642,
            'name' => 'Dispositivos de nivelación (industria automotriz)',
            'taxclasses_id' => 343,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1643,
            'name' => 'Remolques',
            'taxclasses_id' => 343,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1644,
            'name' => 'Hardware de remolque',
            'taxclasses_id' => 343,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1645,
            'name' => 'Variedad de accesorios de remolque remolque/Packs',
            'taxclasses_id' => 343,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1646,
            'name' => 'Remolque/Otros accesorios de remolque',
            'taxclasses_id' => 343,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1647,
            'name' => 'Cabrestantes (industria automotriz)',
            'taxclasses_id' => 344,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1648,
            'name' => 'Piezas/componentes de malacate',
            'taxclasses_id' => 344,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1649,
            'name' => 'Malacate malacate/Otros Accesorios (industria automotriz)',
            'taxclasses_id' => 344,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1650,
            'name' => 'Malacate malacate/Variedad de accesorios Packs',
            'taxclasses_id' => 344,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1651,
            'name' => 'Alarmas de coches/Anti-jacking alarmas',
            'taxclasses_id' => 345,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1652,
            'name' => 'Dispositivos de seguimiento',
            'taxclasses_id' => 345,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1653,
            'name' => 'Otros productos anti-robo',
            'taxclasses_id' => 345,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1654,
            'name' => 'Variedad de productos Anti-robo Packs',
            'taxclasses_id' => 345,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1655,
            'name' => 'Las escobillas del limpiaparabrisas',
            'taxclasses_id' => 346,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1656,
            'name' => 'Recargas de escobilla',
            'taxclasses_id' => 346,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1657,
            'name' => 'Limpiadores/otras piezas del limpiaparabrisas',
            'taxclasses_id' => 346,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1658,
            'name' => 'Limpiadores/piezas del limpiaparabrisas variedad Packs',
            'taxclasses_id' => 346,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1659,
            'name' => 'Bujías Otros',
            'taxclasses_id' => 347,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1660,
            'name' => 'Bujías variedad Packs',
            'taxclasses_id' => 347,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1661,
            'name' => 'Filtros de aire (industria automotriz)',
            'taxclasses_id' => 348,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1662,
            'name' => 'Los filtros de la transmisión (industria automotriz)',
            'taxclasses_id' => 348,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1663,
            'name' => 'Accesorios de filtro (industria automotriz)',
            'taxclasses_id' => 348,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1664,
            'name' => 'El rendimiento del filtro/Kits de accesorios (industria automotriz)',
            'taxclasses_id' => 348,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1665,
            'name' => 'Otros filtros (industria automotriz)',
            'taxclasses_id' => 348,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1666,
            'name' => 'Variedad de filtros de paquetes (industria automotriz)',
            'taxclasses_id' => 348,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1667,
            'name' => 'Faros (industria automotriz)',
            'taxclasses_id' => 349,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1668,
            'name' => 'Bombillas de repuesto',
            'taxclasses_id' => 349,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1669,
            'name' => 'Faros antiniebla (industria automotriz)',
            'taxclasses_id' => 349,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1670,
            'name' => 'Luces de retroceso (industria automotriz)',
            'taxclasses_id' => 349,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1671,
            'name' => 'Luces de conducción',
            'taxclasses_id' => 349,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1672,
            'name' => 'Holgura/marcador/luces de marcha (industria automotriz)',
            'taxclasses_id' => 349,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1673,
            'name' => 'Las luces de la sirena',
            'taxclasses_id' => 349,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1674,
            'name' => 'Stop/giro/luces traseras',
            'taxclasses_id' => 349,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1675,
            'name' => 'Lentes de recambio (industria automotriz)',
            'taxclasses_id' => 349,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1676,
            'name' => 'Los reflectores (industria automotriz)',
            'taxclasses_id' => 349,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1677,
            'name' => 'Lámparas de luces/otros (industria automotriz)',
            'taxclasses_id' => 349,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1678,
            'name' => 'Lámparas de luces/variedad Packs (industria automotriz)',
            'taxclasses_id' => 349,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1679,
            'name' => 'Asambleas - Faro',
            'taxclasses_id' => 350,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1680,
            'name' => 'Los conjuntos de luces traseras -',
            'taxclasses_id' => 350,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1681,
            'name' => 'Otros conjuntos de luz (industria automotriz)',
            'taxclasses_id' => 350,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1682,
            'name' => 'Iluminación Under-Car',
            'taxclasses_id' => 351,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1683,
            'name' => 'Iluminación estroboscópica (industria automotriz)',
            'taxclasses_id' => 351,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1684,
            'name' => 'Iluminación de acento (industria automotriz)',
            'taxclasses_id' => 351,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1685,
            'name' => 'Otros iluminación decorativa (industria automotriz)',
            'taxclasses_id' => 351,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1686,
            'name' => 'La iluminación decorativa variedad Packs (industria automotriz)',
            'taxclasses_id' => 351,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1687,
            'name' => 'Fusibles (industria automotriz)',
            'taxclasses_id' => 352,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1688,
            'name' => 'Sockets/Pigtails (industria automotriz)',
            'taxclasses_id' => 352,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1689,
            'name' => 'Tubo flexible/haz de cables (industria automotriz)',
            'taxclasses_id' => 352,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1690,
            'name' => 'Los encendedores de cigarrillos/adaptadores (industria automotriz)',
            'taxclasses_id' => 352,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1691,
            'name' => 'Variedad Pack eléctrico (industria automotriz)',
            'taxclasses_id' => 352,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1692,
            'name' => 'Otro eléctrico (industria automotriz)',
            'taxclasses_id' => 352,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1693,
            'name' => 'Llaves de filtro (industria automotriz)',
            'taxclasses_id' => 353,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1694,
            'name' => 'Los tapones de drenaje (industria automotriz)',
            'taxclasses_id' => 353,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1695,
            'name' => 'Los kits de cambio de líquido/accesorios',
            'taxclasses_id' => 353,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1696,
            'name' => 'Mezcladores de líquidos (industria automotriz)',
            'taxclasses_id' => 353,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1697,
            'name' => 'El manejo de fluidos/Accesorios Otros (industria automotriz)',
            'taxclasses_id' => 353,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1698,
            'name' => 'Variedad de accesorios/Fluid Management Packs (industria automotriz)',
            'taxclasses_id' => 353,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1699,
            'name' => 'Alfombrillas de aceite (industria automotriz)',
            'taxclasses_id' => 354,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1700,
            'name' => 'Cambio de líquido de otros elementos (industria automotriz)',
            'taxclasses_id' => 354,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1701,
            'name' => 'Los elementos de cambio de líquido de la variedad de los paquetes (industria automotriz)',
            'taxclasses_id' => 354,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1702,
            'name' => 'Los brazos del limpiaparabrisas (industria automotriz)',
            'taxclasses_id' => 346,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1703,
            'name' => 'Limpia botas (industria automotriz)',
            'taxclasses_id' => 346,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1704,
            'name' => 'Los motores de limpiaparabrisas',
            'taxclasses_id' => 346,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1705,
            'name' => 'Los motores de limpiaparabrisas (núcleos).',
            'taxclasses_id' => 346,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1706,
            'name' => 'Las boquillas del limpiaparabrisas',
            'taxclasses_id' => 346,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1707,
            'name' => 'Bombas de limpiaparabrisas',
            'taxclasses_id' => 346,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1708,
            'name' => 'Los tubos/mangueras del limpiaparabrisas',
            'taxclasses_id' => 346,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1709,
            'name' => 'Otros componentes del limpiaparabrisas',
            'taxclasses_id' => 346,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1710,
            'name' => 'Componentes del limpiaparabrisas variedad Packs',
            'taxclasses_id' => 346,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1711,
            'name' => 'Papel de lija',
            'taxclasses_id' => 444,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1712,
            'name' => 'Almohadillas abrasivas/lana de acero',
            'taxclasses_id' => 444,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1713,
            'name' => 'Hojas de lija/',
            'taxclasses_id' => 444,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1714,
            'name' => 'Los minerales abrasivos',
            'taxclasses_id' => 444,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1715,
            'name' => 'Otros abrasivos',
            'taxclasses_id' => 444,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1716,
            'name' => 'Variedad de abrasivos Packs',
            'taxclasses_id' => 444,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1717,
            'name' => 'Los tensores (fijaciones/fijaciones)',
            'taxclasses_id' => 445,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1718,
            'name' => 'Anillos/pasacables',
            'taxclasses_id' => 445,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1719,
            'name' => 'Cuerdas/Cables/cadenas (fijaciones/fijaciones)',
            'taxclasses_id' => 445,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1720,
            'name' => 'Resortes',
            'taxclasses_id' => 445,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1721,
            'name' => 'Rodamientos/casquillos',
            'taxclasses_id' => 445,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1722,
            'name' => 'Los ganchos de fijación/(sujetadores)',
            'taxclasses_id' => 445,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1723,
            'name' => 'Los tubos',
            'taxclasses_id' => 445,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1724,
            'name' => 'Los anclajes/enchufes de pared (fijaciones/fijaciones)',
            'taxclasses_id' => 445,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1725,
            'name' => 'Las arandelas de fijación/(sujetadores)',
            'taxclasses_id' => 445,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1726,
            'name' => 'Los tornillos',
            'taxclasses_id' => 445,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1727,
            'name' => 'Clavos/pasadores de fijación/(sujetadores)',
            'taxclasses_id' => 445,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1728,
            'name' => 'Grapas de fijación/(sujetadores)',
            'taxclasses_id' => 445,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1729,
            'name' => 'Las tuercas de fijación/(sujetadores)',
            'taxclasses_id' => 445,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1730,
            'name' => 'Pernos y varillas roscadas',
            'taxclasses_id' => 445,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1731,
            'name' => 'Soportes/Llaves',
            'taxclasses_id' => 445,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1732,
            'name' => 'Las capturas (fijaciones/fijaciones)',
            'taxclasses_id' => 445,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1733,
            'name' => 'Remaches de fijación/(sujetadores)',
            'taxclasses_id' => 445,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1734,
            'name' => 'Las bisagras de la puerta.',
            'taxclasses_id' => 439,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1735,
            'name' => 'Sujetadores de fijación/Hardware',
            'taxclasses_id' => 445,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1736,
            'name' => 'Sujetadores de fijación/Paquetes variedad de hardware',
            'taxclasses_id' => 445,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1737,
            'name' => 'Los polacos/varillas de cortina',
            'taxclasses_id' => 446,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1738,
            'name' => 'Pistas de cortina',
            'taxclasses_id' => 446,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1739,
            'name' => 'Ganchos de cortina/anillos',
            'taxclasses_id' => 446,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1740,
            'name' => 'Soportes de varilla de cortina',
            'taxclasses_id' => 446,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1741,
            'name' => 'Otras piezas y accesorios de cortina',
            'taxclasses_id' => 446,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1742,
            'name' => 'Piezas y accesorios de cortina variedad Packs',
            'taxclasses_id' => 446,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1743,
            'name' => 'La lechada',
            'taxclasses_id' => 447,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1744,
            'name' => 'Sellantes',
            'taxclasses_id' => 447,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1745,
            'name' => 'Los rellenos',
            'taxclasses_id' => 447,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1746,
            'name' => 'Cinta (DIY)',
            'taxclasses_id' => 447,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1747,
            'name' => 'Pegamento adhesivo/',
            'taxclasses_id' => 447,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1748,
            'name' => 'El calafateo',
            'taxclasses_id' => 447,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1749,
            'name' => 'Rellenos de selladores y adhesivos/Otros',
            'taxclasses_id' => 447,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1750,
            'name' => 'Rellenos de selladores y adhesivos/variedad Packs',
            'taxclasses_id' => 447,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1751,
            'name' => 'Piscina/estanque/Característica del agua depósitos/camisas',
            'taxclasses_id' => 406,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1752,
            'name' => 'Jardín de Agua Características',
            'taxclasses_id' => 406,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1753,
            'name' => 'Piscina/estanque/Característica del agua filtros (alimentado)',
            'taxclasses_id' => 406,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1754,
            'name' => 'Estanque de agua/Feature Foggers',
            'taxclasses_id' => 406,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1755,
            'name' => 'Piscina/estanque/Agua clarificadores/esterilizadores ultravioleta característica',
            'taxclasses_id' => 406,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1756,
            'name' => 'Pond/Característica del agua perlizadores',
            'taxclasses_id' => 406,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1757,
            'name' => 'Característica de agua/piscina/tratamientos químicos',
            'taxclasses_id' => 407,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1758,
            'name' => 'Piscina/estanque/tubos de drenaje de agua',
            'taxclasses_id' => 406,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1759,
            'name' => 'Piscina/estanque/Característica del agua cubiertas protectoras',
            'taxclasses_id' => 406,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1760,
            'name' => 'Jardín de césped/piscinas y estanques de agua/variedad características Packs',
            'taxclasses_id' => 406,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1761,
            'name' => 'Jardín de césped/piscinas y estanques de agua/Otras funciones',
            'taxclasses_id' => 406,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1762,
            'name' => 'Weed-Killer/ herbicidas.',
            'taxclasses_id' => 407,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1763,
            'name' => 'Plant/Fertilizante/Food',
            'taxclasses_id' => 407,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1764,
            'name' => 'El pajote',
            'taxclasses_id' => 419,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1765,
            'name' => 'Mantillo',
            'taxclasses_id' => 419,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1766,
            'name' => 'Equipo de pruebas de suelo/agua (impulsado)',
            'taxclasses_id' => 418,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1767,
            'name' => 'Equipo de pruebas de suelo/agua (sin alimentación)',
            'taxclasses_id' => 418,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1768,
            'name' => 'Jardín de césped/variedad de tratamientos químicos/Packs',
            'taxclasses_id' => 407,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1769,
            'name' => 'Jardín de césped/Otros tratamientos químicos',
            'taxclasses_id' => 407,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1770,
            'name' => 'Sillas de jardín',
            'taxclasses_id' => 408,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1771,
            'name' => 'Tumbonas de jardín',
            'taxclasses_id' => 408,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1772,
            'name' => 'Mesas de jardín',
            'taxclasses_id' => 408,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1773,
            'name' => 'Reposapiés de jardín',
            'taxclasses_id' => 408,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1774,
            'name' => 'Bancos de jardín',
            'taxclasses_id' => 408,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1775,
            'name' => 'Balancín de jardín bancos',
            'taxclasses_id' => 408,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1776,
            'name' => 'Hamacas',
            'taxclasses_id' => 408,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1777,
            'name' => 'Muebles de jardín de césped/piezas de repuesto y accesorios',
            'taxclasses_id' => 408,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1778,
            'name' => 'Muebles de jardín de césped/variedad Packs',
            'taxclasses_id' => 408,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1779,
            'name' => 'Muebles de jardín de césped/Otros',
            'taxclasses_id' => 408,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1780,
            'name' => 'Las mangueras',
            'taxclasses_id' => 409,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1781,
            'name' => 'Los conectores de manguera',
            'taxclasses_id' => 409,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1782,
            'name' => 'Almacenamiento de tubos estacionario',
            'taxclasses_id' => 409,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1783,
            'name' => 'Almacenamiento de manguera - Móvil',
            'taxclasses_id' => 409,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1784,
            'name' => 'Rociadores/Pulverizadores/Señores (el extremo de la manguera)',
            'taxclasses_id' => 409,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1785,
            'name' => 'Sistemas de riego',
            'taxclasses_id' => 409,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1786,
            'name' => 'Regaderas',
            'taxclasses_id' => 409,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1787,
            'name' => 'Fuentes de almacenamiento de agua para el jardín',
            'taxclasses_id' => 409,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1788,
            'name' => 'Rociadores/Pulverizadores/Señores (mano)',
            'taxclasses_id' => 409,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1789,
            'name' => 'Rociadores/Pulverizadores/Señores (impulsado)',
            'taxclasses_id' => 409,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1790,
            'name' => 'Jardín de césped/Equipos de riego variedad Packs',
            'taxclasses_id' => 409,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1791,
            'name' => 'Jardín de césped/piezas de sustitución de los equipos de riego',
            'taxclasses_id' => 409,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1792,
            'name' => 'Jardín de césped/Otros Equipos de riego',
            'taxclasses_id' => 409,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1793,
            'name' => 'Temporizadores de riego/Controladores',
            'taxclasses_id' => 409,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1794,
            'name' => 'Paneles de valla/boards',
            'taxclasses_id' => 410,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1795,
            'name' => 'Postes/Guías',
            'taxclasses_id' => 410,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1796,
            'name' => 'Estancias de cerco/Llaves',
            'taxclasses_id' => 410,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1797,
            'name' => 'Jardín de las fronteras o bordes',
            'taxclasses_id' => 410,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1798,
            'name' => 'Fence Net/Mesh',
            'taxclasses_id' => 410,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1799,
            'name' => 'Cerco Eléctrico/Radio vallas',
            'taxclasses_id' => 410,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1800,
            'name' => 'La espaldera',
            'taxclasses_id' => 410,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1801,
            'name' => 'Navaja/cercas de alambre de púas',
            'taxclasses_id' => 410,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1802,
            'name' => 'Puertas (sin alimentación)',
            'taxclasses_id' => 410,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1803,
            'name' => 'Gates (alimentado)',
            'taxclasses_id' => 410,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1804,
            'name' => 'Césped y Jardín de Esgrima variedad Packs',
            'taxclasses_id' => 410,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1805,
            'name' => 'Césped y Jardín de Esgrima Otros',
            'taxclasses_id' => 410,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1806,
            'name' => 'Bombillas/cormos o rizomas y tubérculos',
            'taxclasses_id' => 744,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1807,
            'name' => 'Las semillas/esporas',
            'taxclasses_id' => 746,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1808,
            'name' => 'Variedad de plantas Packs',
            'taxclasses_id' => 745,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1809,
            'name' => 'Abono/Lombricultura bandejas',
            'taxclasses_id' => 411,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1810,
            'name' => 'Eliminación de residuos de jardín césped/Otros',
            'taxclasses_id' => 411,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1811,
            'name' => 'Los titulares de la planta',
            'taxclasses_id' => 408,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1812,
            'name' => 'Papeleras de exterior',
            'taxclasses_id' => 411,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1813,
            'name' => 'Jardín/Característica del agua ornamentos',
            'taxclasses_id' => 406,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1814,
            'name' => 'Unidades de visualización de jardín',
            'taxclasses_id' => 408,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1815,
            'name' => 'Marquesinas y toldos (césped/jardín)',
            'taxclasses_id' => 408,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1816,
            'name' => 'Calentadores externos (alimentación)',
            'taxclasses_id' => 412,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1817,
            'name' => 'Los calentadores al aire libre (sin alimentación)',
            'taxclasses_id' => 412,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1818,
            'name' => 'Barbacoas (impulsado)',
            'taxclasses_id' => 412,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1819,
            'name' => 'Barbacoas (sin alimentación)',
            'taxclasses_id' => 412,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1820,
            'name' => 'Barbacoa (Islas de césped/jardín)',
            'taxclasses_id' => 412,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1821,
            'name' => 'Difusores/cajones (césped/jardín)',
            'taxclasses_id' => 412,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1822,
            'name' => 'Césped/Jardín/Aparatos de calefacción cocina variedad Packs',
            'taxclasses_id' => 412,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1823,
            'name' => 'Jardín de césped/cocción y otros aparatos de calefacción',
            'taxclasses_id' => 412,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1824,
            'name' => 'Césped/Jardín/Aparatos de calefacción cocción de piezas de recambio y accesorios',
            'taxclasses_id' => 412,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1825,
            'name' => 'Las aspiradoras de jardín/sopladores',
            'taxclasses_id' => 413,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1826,
            'name' => 'Lanzadores de nieve (impulsado)',
            'taxclasses_id' => 413,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1827,
            'name' => 'Sajadores césped/Perlizadores (impulsado)',
            'taxclasses_id' => 413,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1828,
            'name' => 'Trituradoras Trituradoras/Mulchers (impulsado)',
            'taxclasses_id' => 413,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1829,
            'name' => 'Jardín de césped/equipos accesorios',
            'taxclasses_id' => 416,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1830,
            'name' => 'Cortadoras de césped/Rakers (impulsado)',
            'taxclasses_id' => 416,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1831,
            'name' => 'Cortadores de cepillo/cadena/Trimmers Edgers (impulsado)',
            'taxclasses_id' => 413,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1832,
            'name' => 'Las motosierras (alimentado)',
            'taxclasses_id' => 413,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1833,
            'name' => 'Los sinfines de la tierra (alimentación)',
            'taxclasses_id' => 413,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1834,
            'name' => 'Divisores de registro (impulsado)',
            'taxclasses_id' => 413,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1835,
            'name' => 'Desmenuzadoras/extractores (impulsado)',
            'taxclasses_id' => 413,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1836,
            'name' => 'Tampers (impulsado)',
            'taxclasses_id' => 413,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1837,
            'name' => 'Los cultivadores/macollas/Rotary azadas (impulsado)',
            'taxclasses_id' => 413,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1838,
            'name' => 'Las arandelas de presión (alimentación)',
            'taxclasses_id' => 413,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1839,
            'name' => 'Carros de jardín (con alimentación)',
            'taxclasses_id' => 416,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1840,
            'name' => 'Césped barridos/esparcidores (sin alimentación)',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1841,
            'name' => 'Tijeras de podar (sin alimentación)',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1842,
            'name' => 'Podadoras',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1843,
            'name' => 'Pruners/Secateurs',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1844,
            'name' => 'Ejes',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1845,
            'name' => 'Hoces y guadañas/Snaths',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1846,
            'name' => 'Mauls',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1847,
            'name' => 'Harrows',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1848,
            'name' => 'Cortadoras de césped/Rakers (sin alimentación)',
            'taxclasses_id' => 416,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1849,
            'name' => 'Azadas',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1850,
            'name' => 'Edgers (sin alimentación)',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1851,
            'name' => 'Palas/Picas',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1852,
            'name' => 'Las horquillas (césped/jardín)',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1853,
            'name' => 'Jardín de césped/paletas',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1854,
            'name' => 'Aireadores de césped (sin alimentación)',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1855,
            'name' => 'Rodillos de césped (sin alimentación)',
            'taxclasses_id' => 416,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1856,
            'name' => 'Tampers (sin alimentación)',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1857,
            'name' => 'Tamices de césped/(JARDÍN)',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1858,
            'name' => 'Los cultivadores/macollos (sin alimentación)',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1859,
            'name' => 'Las sembradoras de la bombilla',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1860,
            'name' => 'Rastrillos',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1861,
            'name' => 'Los incineradores de jardín',
            'taxclasses_id' => 411,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1862,
            'name' => 'Quemadores de malezas (impulsado)',
            'taxclasses_id' => 413,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1863,
            'name' => 'Jardín de césped/Herramientas Eléctricas, piezas de recambio y accesorios',
            'taxclasses_id' => 413,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1864,
            'name' => 'Bolsas de césped',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1865,
            'name' => 'Carros de jardín (sin alimentación)',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1866,
            'name' => 'Arrancadores de semillas',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1867,
            'name' => 'Jardín Kneelers/Asientos',
            'taxclasses_id' => 408,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1868,
            'name' => 'Jardín Power Tools variedad Packs',
            'taxclasses_id' => 413,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1869,
            'name' => 'Otras herramientas de jardín',
            'taxclasses_id' => 413,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1870,
            'name' => 'Invernaderos (completo)',
            'taxclasses_id' => 414,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1871,
            'name' => 'Cobertizos',
            'taxclasses_id' => 414,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1872,
            'name' => 'Cenadores',
            'taxclasses_id' => 414,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1873,
            'name' => 'Arbours/Bowers',
            'taxclasses_id' => 414,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1874,
            'name' => 'Los Conservatorios',
            'taxclasses_id' => 414,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1875,
            'name' => 'Pagodas (césped/jardín)',
            'taxclasses_id' => 414,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1876,
            'name' => 'Carpas',
            'taxclasses_id' => 408,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1877,
            'name' => 'Jardín de césped/otras estructuras al aire libre',
            'taxclasses_id' => 414,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1878,
            'name' => 'Jardín de césped/estructuras al aire libre de piezas de recambio y accesorios',
            'taxclasses_id' => 414,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1879,
            'name' => 'Marcos frío/difusores/Cloches',
            'taxclasses_id' => 414,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1880,
            'name' => 'Detectores de rayos - Powered',
            'taxclasses_id' => 481,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1881,
            'name' => 'Anemómetros - No impulsado',
            'taxclasses_id' => 415,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1882,
            'name' => 'Psicrómetros - Powered',
            'taxclasses_id' => 415,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1883,
            'name' => 'Pyranometers/Solarimeters - Powered',
            'taxclasses_id' => 415,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1884,
            'name' => 'Evaporimeters/Atmometers - Powered',
            'taxclasses_id' => 415,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1885,
            'name' => 'Equipo de grabación Sunshine - Powered',
            'taxclasses_id' => 415,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1886,
            'name' => 'Luxómetros - Powered',
            'taxclasses_id' => 415,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1887,
            'name' => 'Los higrómetros - Sin tracción',
            'taxclasses_id' => 415,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1888,
            'name' => 'Termómetros - Jardín - No impulsado',
            'taxclasses_id' => 415,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1889,
            'name' => 'Los barómetros - No impulsado',
            'taxclasses_id' => 415,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1890,
            'name' => 'Barógrafos - No impulsado',
            'taxclasses_id' => 415,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1891,
            'name' => 'Combinación de medición meteorológica/equipo de monitoreo - No impulsado',
            'taxclasses_id' => 415,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1892,
            'name' => 'Calcetines/Viento Veletas',
            'taxclasses_id' => 415,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1893,
            'name' => 'Pluviometros - No impulsado',
            'taxclasses_id' => 415,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1894,
            'name' => 'Césped/Jardín de Observación y Vigilancia Meteorológica de recambios/accesorios',
            'taxclasses_id' => 415,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1895,
            'name' => 'Césped/Jardín de Observación y Vigilancia Meteorológica Otros',
            'taxclasses_id' => 415,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1896,
            'name' => 'Césped/Jardín de observación y vigilancia meteorológica variedad Packs',
            'taxclasses_id' => 415,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1897,
            'name' => 'Divisores/Brújula (DIY)',
            'taxclasses_id' => 382,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1898,
            'name' => 'Los gobernantes (DIY)',
            'taxclasses_id' => 382,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1899,
            'name' => 'Las medidas de longitud de cinta (DIY)',
            'taxclasses_id' => 382,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1900,
            'name' => 'Los micrómetros',
            'taxclasses_id' => 382,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1901,
            'name' => 'Ruedas de medición',
            'taxclasses_id' => 382,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1902,
            'name' => 'Estribos (DIY)',
            'taxclasses_id' => 382,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1903,
            'name' => 'Cuadrados (DIY)',
            'taxclasses_id' => 382,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1904,
            'name' => 'Niveles',
            'taxclasses_id' => 382,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1905,
            'name' => 'Plumb Bobs',
            'taxclasses_id' => 382,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1906,
            'name' => 'Bancos de trabajo',
            'taxclasses_id' => 451,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1907,
            'name' => 'Vio caballos/Caballetes',
            'taxclasses_id' => 451,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1908,
            'name' => 'Andamios/plataformas',
            'taxclasses_id' => 385,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1909,
            'name' => 'Putty/cuchillas de panel',
            'taxclasses_id' => 383,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1910,
            'name' => 'Combinación de herramientas de corte (sin alimentación)',
            'taxclasses_id' => 389,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1911,
            'name' => 'Tubo/Tubo Cortadores - No impulsado',
            'taxclasses_id' => 400,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1912,
            'name' => 'Perno/Cadena de cuchillas',
            'taxclasses_id' => 389,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1913,
            'name' => 'Cortadores de alambre',
            'taxclasses_id' => 389,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1914,
            'name' => 'Cortadores/Cortadoras - Baldosas (sin alimentación)',
            'taxclasses_id' => 384,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1915,
            'name' => 'Cortadores - Vidrio (sin alimentación)',
            'taxclasses_id' => 384,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1916,
            'name' => 'Tijeras/cizallas/Cortadoras - Hoja de Metal (sin alimentación)',
            'taxclasses_id' => 389,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1917,
            'name' => 'Punzones',
            'taxclasses_id' => 393,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1918,
            'name' => 'Los cinceles',
            'taxclasses_id' => 395,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1919,
            'name' => 'Nailsets/Avellanadores',
            'taxclasses_id' => 393,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1920,
            'name' => 'Punzones',
            'taxclasses_id' => 393,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1921,
            'name' => 'Estrías',
            'taxclasses_id' => 395,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1922,
            'name' => 'Cuchillas - sin alimentación (Hobby/Utilidad)',
            'taxclasses_id' => 394,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1923,
            'name' => 'Extractores de uñas',
            'taxclasses_id' => 386,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1924,
            'name' => 'Las carretillas de mano - No impulsado',
            'taxclasses_id' => 385,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1925,
            'name' => 'Carretillas de mano/plataformas rodantes',
            'taxclasses_id' => 385,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1926,
            'name' => 'Elevadores de aspiración',
            'taxclasses_id' => 385,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1927,
            'name' => 'Palancas/barretas',
            'taxclasses_id' => 386,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1928,
            'name' => 'Martillos (DIY)',
            'taxclasses_id' => 396,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1929,
            'name' => 'Martillos y mazas/escotillas de recambios/accesorios',
            'taxclasses_id' => 396,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1930,
            'name' => 'Grapar/Nail Gun - No impulsado',
            'taxclasses_id' => 387,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1931,
            'name' => 'Remachadora martillo - no impulsado',
            'taxclasses_id' => 387,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1932,
            'name' => 'Herramientas de remachado',
            'taxclasses_id' => 387,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1933,
            'name' => 'Clavar/grapado/herramienta de fijación Sustitución Pars/accesorios',
            'taxclasses_id' => 387,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1934,
            'name' => 'Llaves Llaves/',
            'taxclasses_id' => 397,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1935,
            'name' => 'Llaves Las llaves/claves/piezas de repuesto y accesorios',
            'taxclasses_id' => 397,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1936,
            'name' => 'Destornilladores - No impulsado',
            'taxclasses_id' => 388,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1937,
            'name' => 'Juegos de destornilladores',
            'taxclasses_id' => 388,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1938,
            'name' => 'Alicates/pinzas/ganchos',
            'taxclasses_id' => 389,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1939,
            'name' => 'Archivos',
            'taxclasses_id' => 399,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1940,
            'name' => 'Escofinas',
            'taxclasses_id' => 399,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1941,
            'name' => 'Las abrazaderas',
            'taxclasses_id' => 390,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1942,
            'name' => 'Prensas',
            'taxclasses_id' => 390,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1943,
            'name' => 'Vicios/abrazaderas de recambios/accesorios',
            'taxclasses_id' => 390,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1944,
            'name' => 'Trituradoras (sin alimentación)',
            'taxclasses_id' => 391,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1945,
            'name' => 'Honing Guías',
            'taxclasses_id' => 391,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1946,
            'name' => 'Afiladores de herramienta (sin alimentación)',
            'taxclasses_id' => 391,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1947,
            'name' => 'Taladros - No impulsado',
            'taxclasses_id' => 392,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1948,
            'name' => 'Perforación de piezas de repuesto y accesorios',
            'taxclasses_id' => 392,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1949,
            'name' => 'Rascadores',
            'taxclasses_id' => 391,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1950,
            'name' => 'Planos',
            'taxclasses_id' => 399,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1951,
            'name' => 'Herramientas de formación de superficie',
            'taxclasses_id' => 399,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1952,
            'name' => 'Herramienta de conformado superficial ingredientes',
            'taxclasses_id' => 399,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1953,
            'name' => 'Smoothers/Flotadores',
            'taxclasses_id' => 384,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1954,
            'name' => 'Curvadoras de tubos',
            'taxclasses_id' => 400,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1955,
            'name' => 'Flaring Tools',
            'taxclasses_id' => 400,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1956,
            'name' => 'Muere (sin alimentación)',
            'taxclasses_id' => 401,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1957,
            'name' => 'Tap/Troquel',
            'taxclasses_id' => 401,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1958,
            'name' => 'Yunques (DIY)',
            'taxclasses_id' => 396,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1959,
            'name' => 'Compresores de aire - Portátil',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1960,
            'name' => 'Los extractores de tornillos',
            'taxclasses_id' => 386,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1961,
            'name' => 'La tuerca splitters',
            'taxclasses_id' => 386,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1962,
            'name' => 'Los sinfines de drenaje - No impulsado',
            'taxclasses_id' => 400,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1963,
            'name' => 'Los émbolos',
            'taxclasses_id' => 380,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1964,
            'name' => 'Soportes de rodillos',
            'taxclasses_id' => 451,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1965,
            'name' => 'Los Halcones de yeso',
            'taxclasses_id' => 383,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1966,
            'name' => 'Lápices o crayones (DIY)',
            'taxclasses_id' => 382,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1967,
            'name' => 'Carros de herramientas',
            'taxclasses_id' => 450,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1968,
            'name' => 'Paletas de albañilería',
            'taxclasses_id' => 384,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1969,
            'name' => 'Sierras húmedo / Azulejo/Cortadores de vidrio',
            'taxclasses_id' => 426,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1970,
            'name' => 'Sierras de cinta - plato',
            'taxclasses_id' => 426,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1971,
            'name' => 'Amoladoras de banco',
            'taxclasses_id' => 426,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1972,
            'name' => 'Sierras de mesa - plato',
            'taxclasses_id' => 426,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1973,
            'name' => 'Desplácese sierras - plato',
            'taxclasses_id' => 426,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1974,
            'name' => 'Sierras de brazo radial',
            'taxclasses_id' => 426,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1975,
            'name' => 'Bench Jointers',
            'taxclasses_id' => 426,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1976,
            'name' => 'Tornos - estacionario (alimentado)',
            'taxclasses_id' => 426,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1977,
            'name' => 'Power Tools - plato - piezas de recambio y accesorios',
            'taxclasses_id' => 426,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1978,
            'name' => 'Lijadoras de disco',
            'taxclasses_id' => 426,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1979,
            'name' => 'Lijadoras de husillo',
            'taxclasses_id' => 426,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1980,
            'name' => 'Combinación Sanders - disco/cinta',
            'taxclasses_id' => 426,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1981,
            'name' => 'Las prensas del taladro/Mortajadoras',
            'taxclasses_id' => 426,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1982,
            'name' => 'Superficie/espesor cepilladoras - Portátil',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1983,
            'name' => 'Jointer cepilladoras - Portátil',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1984,
            'name' => 'Distancia/medidores lineales (impulsado)',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1985,
            'name' => 'Medidas de ángulo (impulsado)',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1986,
            'name' => 'Los niveles láser',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1987,
            'name' => 'Recortadores laminado',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1988,
            'name' => 'Sierras de mesa - Portátil',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1989,
            'name' => 'Sierra caladora',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1990,
            'name' => 'Sierras de calar - Powered',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1991,
            'name' => 'Cortadoras/cizallas - Metal (impulsado)',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1992,
            'name' => 'Cortadores de espuma - Powered',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1993,
            'name' => 'Roscadoras',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1994,
            'name' => 'Cortadores de tubo (impulsado)',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1995,
            'name' => 'Las sierras de rotación',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1996,
            'name' => 'Tubo - Non Threaders Powered',
            'taxclasses_id' => 400,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1997,
            'name' => 'Los escoplos (impulsado)',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1998,
            'name' => 'Amoladoras angulares',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 1999,
            'name' => 'Herramientas de corte',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2000,
            'name' => 'Recto/Die Grinders',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2001,
            'name' => 'Rectificadoras de Superficie',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2002,
            'name' => 'Soldadura/soldadura soldadores',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2003,
            'name' => 'Soldadores de arco',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2004,
            'name' => 'Taladro/Controladores (alimentado)',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2005,
            'name' => 'Destornilladores/Herramientas Rotativas',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2006,
            'name' => 'Controladores de impacto',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2007,
            'name' => 'Llaves de impacto',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2008,
            'name' => 'Pistolas de tornillo',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2009,
            'name' => 'ejercicios de combinación (alimentado)',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2010,
            'name' => 'Taladros percutores',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2011,
            'name' => 'Martillos perforadores',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2012,
            'name' => 'Pistolas de calor',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2013,
            'name' => 'Pistolas de engrase (impulsado)',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2014,
            'name' => 'Pistolas de calafateo (impulsado)',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2015,
            'name' => 'Grapadoras (alimentado)',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2016,
            'name' => 'Las pistolas de clavos (impulsado)',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2017,
            'name' => 'Lijadoras de banda - plato',
            'taxclasses_id' => 426,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2018,
            'name' => 'Lijadoras de acabado',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2019,
            'name' => 'Detalle Sanders',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2020,
            'name' => 'Armario de herramientas',
            'taxclasses_id' => 450,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2021,
            'name' => 'Cajas de herramientas/Casos',
            'taxclasses_id' => 450,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2022,
            'name' => 'Herramienta/Carrybags monederos',
            'taxclasses_id' => 450,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2023,
            'name' => 'Cinturones de herramientas/Fundas/bolsas',
            'taxclasses_id' => 450,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2024,
            'name' => 'Malacates/Cabrestantes',
            'taxclasses_id' => 424,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2025,
            'name' => 'Power Tools - Elevación/Equipo de manipulación de piezas de recambio y accesorios',
            'taxclasses_id' => 424,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2026,
            'name' => 'Las herramientas/equipos - Alimentación variedad Packs',
            'taxclasses_id' => 425,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2027,
            'name' => 'En la electrónica del automóvil variedad Packs',
            'taxclasses_id' => 231,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2028,
            'name' => 'Fotografía/óptica variedad Packs',
            'taxclasses_id' => 228,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2029,
            'name' => 'Variedad packs de equipamiento deportivo',
            'taxclasses_id' => 269,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2030,
            'name' => 'No de uva fermentado Bebidas Alcohólicas - Espumoso',
            'taxclasses_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2031,
            'name' => 'Gama Cocinas u (horno/fogones/Hornillos combinadas).',
            'taxclasses_id' => 273,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2032,
            'name' => 'Los Hornos de vapor',
            'taxclasses_id' => 273,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2033,
            'name' => 'Spin/secadoras',
            'taxclasses_id' => 275,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2034,
            'name' => 'Refrigeradores',
            'taxclasses_id' => 272,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2035,
            'name' => 'Refrigerador/Freezer',
            'taxclasses_id' => 272,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2036,
            'name' => 'Congeladores',
            'taxclasses_id' => 272,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2037,
            'name' => 'Ropa protectora Accesorios',
            'taxclasses_id' => 216,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2038,
            'name' => 'Ropa protectora variedad Packs',
            'taxclasses_id' => 216,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2039,
            'name' => 'Ropa deportiva - Handwear',
            'taxclasses_id' => 213,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2040,
            'name' => 'Ropa deportiva - Sombreros',
            'taxclasses_id' => 213,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2041,
            'name' => 'Calcetería deportiva',
            'taxclasses_id' => 213,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2042,
            'name' => 'Enfriadores de Bebidas Otros',
            'taxclasses_id' => 272,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2043,
            'name' => 'Limpiadores de zapata/Pulidoras',
            'taxclasses_id' => 281,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2044,
            'name' => 'Dispensadores de agua - independiente',
            'taxclasses_id' => 277,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2045,
            'name' => 'Dispensadores de agua - Tablero',
            'taxclasses_id' => 282,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2046,
            'name' => 'Los arbustos y árboles',
            'taxclasses_id' => 747,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2047,
            'name' => 'Discos dobles - pre-grabado',
            'taxclasses_id' => 232,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2048,
            'name' => 'Cepilladoras de superficie - plato',
            'taxclasses_id' => 426,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2049,
            'name' => 'Jointer cepilladoras - plato',
            'taxclasses_id' => 426,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2050,
            'name' => 'Los routers',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2051,
            'name' => 'Sierras de ingletes - Portátil',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2052,
            'name' => 'Vaciar los sinfines (alimentado)',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2053,
            'name' => 'Lijadoras de banda - Portátil',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2054,
            'name' => 'Sopletes/soldadura',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2055,
            'name' => 'Forjadores - plato',
            'taxclasses_id' => 426,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2056,
            'name' => 'Herramientas eléctricas portátiles de mano - piezas de recambio y accesorios',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2057,
            'name' => 'Power Tools - equipo de levante y manejo Otros',
            'taxclasses_id' => 424,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2058,
            'name' => 'Herramientas eléctricas portátiles de mano - Otros',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2059,
            'name' => 'Power Tools - Otros estacionaria',
            'taxclasses_id' => 426,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2060,
            'name' => 'Ambientadores - Powered (industria automotriz)',
            'taxclasses_id' => 340,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2061,
            'name' => 'Ambientadores - sin alimentación (industria automotriz)',
            'taxclasses_id' => 340,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2062,
            'name' => 'Dispositivos de bloqueo',
            'taxclasses_id' => 345,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2063,
            'name' => 'Rascadores de hielo (industria automotriz)',
            'taxclasses_id' => 340,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2064,
            'name' => 'Bocinas y sirenas (industria automotriz)',
            'taxclasses_id' => 352,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2065,
            'name' => 'Reflectores (industria automotriz)',
            'taxclasses_id' => 349,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2066,
            'name' => 'Piezas de repuesto y accesorios de seguridad (industria automotriz)',
            'taxclasses_id' => 324,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2067,
            'name' => 'Otras reparaciones de la carrocería (industria automotriz)',
            'taxclasses_id' => 318,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2068,
            'name' => 'Filtros - Líquido (industria automotriz)',
            'taxclasses_id' => 348,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2069,
            'name' => 'Bujías',
            'taxclasses_id' => 347,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2070,
            'name' => 'Líquido lavaparabrisas (industria automotriz)',
            'taxclasses_id' => 355,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2071,
            'name' => 'Compuesto de pulido',
            'taxclasses_id' => 444,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2072,
            'name' => 'Piso Screeds',
            'taxclasses_id' => 444,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2073,
            'name' => 'Accesorios pista/varilla de cortina',
            'taxclasses_id' => 446,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2074,
            'name' => 'Papelería/Maquinaria de oficina/ocasión suministros diversos Packs',
            'taxclasses_id' => 184,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2075,
            'name' => 'Camping vajilla',
            'taxclasses_id' => 297,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2076,
            'name' => 'Los espejos (industria automotriz)',
            'taxclasses_id' => 324,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2077,
            'name' => 'Limpiador de piezas eléctricas (industria automotriz)',
            'taxclasses_id' => 321,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2078,
            'name' => 'Lupas',
            'taxclasses_id' => 226,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2079,
            'name' => 'Audio/Visual Fotografía variedad Packs',
            'taxclasses_id' => 234,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2080,
            'name' => 'Punzones/puñetazos/Nailsets variedad Packs',
            'taxclasses_id' => 393,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2081,
            'name' => 'Los dispositivos de comunicaciones móviles y servicios - piezas de recambio',
            'taxclasses_id' => 206,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2082,
            'name' => 'Los escoplos/Gubias variedad Packs',
            'taxclasses_id' => 395,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2083,
            'name' => 'Mazas (DIY)',
            'taxclasses_id' => 396,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2084,
            'name' => 'Hachas (DIY)',
            'taxclasses_id' => 396,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2085,
            'name' => 'Hogar/oficina/Mostrar otros muebles de almacenamiento',
            'taxclasses_id' => 300,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2086,
            'name' => 'Martillos y mazas/Hachas variedad Packs (DIY)',
            'taxclasses_id' => 396,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2087,
            'name' => 'Llaves Las llaves/claves/variedad Packs',
            'taxclasses_id' => 397,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2088,
            'name' => 'Llaves Llaves/establece',
            'taxclasses_id' => 397,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2089,
            'name' => 'Llaves - Extensiones de trinquete/asideros',
            'taxclasses_id' => 397,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2090,
            'name' => 'Sierras - No impulsado',
            'taxclasses_id' => 398,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2091,
            'name' => 'Hojas de sierra - No impulsado',
            'taxclasses_id' => 398,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2092,
            'name' => 'Sierras - mano - piezas de recambio y accesorios',
            'taxclasses_id' => 398,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2093,
            'name' => 'Planos/Forjadores/archivos/Escofinas variedad Packs',
            'taxclasses_id' => 399,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2094,
            'name' => 'Taps (sin alimentación)',
            'taxclasses_id' => 401,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2095,
            'name' => 'Tejido/Textil mobiliario variedad Packs',
            'taxclasses_id' => 309,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2096,
            'name' => 'Hogar/Muebles de oficina diversos Packs',
            'taxclasses_id' => 304,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2097,
            'name' => 'Muebles ornamentales variedad Packs',
            'taxclasses_id' => 313,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2098,
            'name' => 'Consolas de Video Juegos - no portátiles',
            'taxclasses_id' => 203,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2099,
            'name' => 'Consolas de Video Juegos - Portátil',
            'taxclasses_id' => 203,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2100,
            'name' => 'Consolas de Video Juegos - piezas de recambio',
            'taxclasses_id' => 203,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2101,
            'name' => 'Escaleras',
            'taxclasses_id' => 385,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2102,
            'name' => 'Transporte/Elevación/equipo de escalada de piezas de recambio y accesorios',
            'taxclasses_id' => 385,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2103,
            'name' => 'Cuchillas - Sin alimentación de piezas de recambio y accesorios',
            'taxclasses_id' => 394,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2104,
            'name' => 'Las hojas de las cuchillas - No Motorizado (Hobby/Utilidad)',
            'taxclasses_id' => 394,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2105,
            'name' => 'Destornilladores Otros',
            'taxclasses_id' => 388,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2106,
            'name' => 'Destornilladores de recambios/accesorios',
            'taxclasses_id' => 388,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2107,
            'name' => 'Llaves hexagonales',
            'taxclasses_id' => 397,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2108,
            'name' => 'Reparación de carrocería de automóviles diferentes packs',
            'taxclasses_id' => 318,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2109,
            'name' => 'Limpiador salpicadero',
            'taxclasses_id' => 346,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2110,
            'name' => 'Rodillos de césped (con alimentación)',
            'taxclasses_id' => 416,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2111,
            'name' => 'Los sinfines de tierra (sin alimentación)',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2112,
            'name' => 'Pruners (impulsado)',
            'taxclasses_id' => 413,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2113,
            'name' => 'Buscadores de orificio posterior (sin alimentación)',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2114,
            'name' => 'Barras de excavación',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2115,
            'name' => 'Verduras/Hongos',
            'taxclasses_id' => 748,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2116,
            'name' => 'Variedad de sembradoras - Caja/pot',
            'taxclasses_id' => 422,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2117,
            'name' => 'Bombas de agua para el jardín',
            'taxclasses_id' => 409,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2118,
            'name' => 'Fauna/Flora túneles',
            'taxclasses_id' => 414,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2119,
            'name' => 'Buscadores de orificio posterior (impulsado)',
            'taxclasses_id' => 413,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2120,
            'name' => 'Cuñas',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2121,
            'name' => 'Picks',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2122,
            'name' => 'Herramientas de mano jardín césped/piezas de repuesto y accesorios',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2123,
            'name' => 'Jardín de césped/Otras herramientas de mano',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2124,
            'name' => 'Jardín de césped/Herramientas de mano variedad Packs',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2125,
            'name' => 'Aplicadores/alimentadores (sin alimentación)',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2126,
            'name' => 'Bolsa de hierba de los soportes o titulares',
            'taxclasses_id' => 417,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2127,
            'name' => 'Aplicadores/alimentadores (alimentado)',
            'taxclasses_id' => 413,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2128,
            'name' => 'Cortasetos (impulsado)',
            'taxclasses_id' => 413,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2129,
            'name' => 'Jardín de césped/Otros equipos',
            'taxclasses_id' => 416,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2130,
            'name' => 'Jardín de césped/variedad de equipos Packs',
            'taxclasses_id' => 416,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2131,
            'name' => 'Imprimaciones pinturas/hogar',
            'taxclasses_id' => 431,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2132,
            'name' => 'Herramientas de cobertura de pared/techo - Powered',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2133,
            'name' => 'Jardín de césped/Equipo de diagnóstico pruebas Otros',
            'taxclasses_id' => 418,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2134,
            'name' => 'Jardín de césped/Equipo de diagnóstico Pruebas de piezas de repuesto y accesorios',
            'taxclasses_id' => 418,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2135,
            'name' => 'Marcos de invernadero',
            'taxclasses_id' => 414,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2136,
            'name' => 'Jardín de césped/estructuras al aire libre variedad Packs',
            'taxclasses_id' => 414,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2137,
            'name' => 'Piedra - Piedras de construcción',
            'taxclasses_id' => 433,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2138,
            'name' => 'El yeso de París (agente)',
            'taxclasses_id' => 433,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2139,
            'name' => 'Arena (DIY)',
            'taxclasses_id' => 433,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2140,
            'name' => 'Parches de asfalto u hormigón',
            'taxclasses_id' => 433,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2141,
            'name' => 'Agentes adhesivos de hormigón',
            'taxclasses_id' => 433,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2142,
            'name' => 'Los colorantes y tintes concretos',
            'taxclasses_id' => 433,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2143,
            'name' => 'Aire arrastrar los agentes concretos',
            'taxclasses_id' => 433,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2144,
            'name' => 'Las mezclas de mortero',
            'taxclasses_id' => 433,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2145,
            'name' => 'Asfalto u hormigón y albañilería variedad Packs',
            'taxclasses_id' => 433,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2146,
            'name' => 'Asfalto u hormigón y albañilería Otros',
            'taxclasses_id' => 433,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2147,
            'name' => 'Umbrales de puerta',
            'taxclasses_id' => 439,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2148,
            'name' => 'Llaves',
            'taxclasses_id' => 439,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2149,
            'name' => 'Tormenta/Puerta de pantalla Hardware de repuesto',
            'taxclasses_id' => 439,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2150,
            'name' => 'Otro hardware de la puerta',
            'taxclasses_id' => 439,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2151,
            'name' => 'Variedad de paquetes de hardware de la puerta',
            'taxclasses_id' => 439,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2152,
            'name' => 'Puertas - Tormenta/combinación de pantalla',
            'taxclasses_id' => 438,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2153,
            'name' => 'Puertas - Tablero (sótano)',
            'taxclasses_id' => 438,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2154,
            'name' => 'Otras puertas',
            'taxclasses_id' => 438,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2155,
            'name' => 'Puertas variedad Packs',
            'taxclasses_id' => 438,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2156,
            'name' => 'Los Glass Block (Grid Systems)',
            'taxclasses_id' => 440,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2157,
            'name' => 'Inserciones de Vidrio Decorativo',
            'taxclasses_id' => 440,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2158,
            'name' => 'Las vigas (estructural)',
            'taxclasses_id' => 435,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2159,
            'name' => 'Madera aserrada/madera/panel de yeso Otros',
            'taxclasses_id' => 435,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2160,
            'name' => 'Madera aserrada/madera/panel de yeso variedad Packs',
            'taxclasses_id' => 435,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2161,
            'name' => 'Molduras de madera - No',
            'taxclasses_id' => 437,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2162,
            'name' => 'Molduras de madera -',
            'taxclasses_id' => 437,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2163,
            'name' => 'Elementos de carpintería - adornos',
            'taxclasses_id' => 437,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2164,
            'name' => 'Componentes estructurales/Conjuntos Otros',
            'taxclasses_id' => 434,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2165,
            'name' => 'Componentes estructurales/conjuntos de piezas de recambio y accesorios',
            'taxclasses_id' => 434,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2166,
            'name' => 'Partes de la ventana/accesorios diversos Packs',
            'taxclasses_id' => 436,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2167,
            'name' => 'Windows - unidades individuales - Madera',
            'taxclasses_id' => 448,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2168,
            'name' => 'Salidas Drop (canalones/drenaje)',
            'taxclasses_id' => 441,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2169,
            'name' => 'Piezas y Accesorios boca abajo',
            'taxclasses_id' => 441,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2170,
            'name' => 'Barandilla de escalera de madera - Sistemas',
            'taxclasses_id' => 442,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2171,
            'name' => 'Barandilla de escalera de madera -no de sistemas',
            'taxclasses_id' => 442,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2172,
            'name' => 'La balaustrada/sistemas de baranda de madera - No',
            'taxclasses_id' => 442,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2173,
            'name' => 'La balaustrada/barandilla de madera - Sistemas',
            'taxclasses_id' => 442,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2174,
            'name' => 'Embellecedor exterior - Ménsulas/frontones',
            'taxclasses_id' => 449,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2175,
            'name' => 'Persianas',
            'taxclasses_id' => 436,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2176,
            'name' => 'Embellecedor exterior - Carillas',
            'taxclasses_id' => 449,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2177,
            'name' => 'techado de paja',
            'taxclasses_id' => 443,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2178,
            'name' => 'Accesorios de techos',
            'taxclasses_id' => 443,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2179,
            'name' => 'Revestimientos de techo - Panneling/Tiles',
            'taxclasses_id' => 428,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2180,
            'name' => 'Los sistemas Grid de techo',
            'taxclasses_id' => 428,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2181,
            'name' => 'Acondicionadores de aire/refrigeradores - Fijo',
            'taxclasses_id' => 377,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2182,
            'name' => 'Acondicionador de aire/refrigeración/ventilación de Piezas de reemplazo de equipos/accesorios',
            'taxclasses_id' => 377,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2183,
            'name' => 'Acondicionador de aire/refrigeración/ventilación variedad packs de equipamiento',
            'taxclasses_id' => 377,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2184,
            'name' => 'Ionizadores/Purificadores de aire - Fijo',
            'taxclasses_id' => 377,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2185,
            'name' => 'Deshumidificadores de aire - Fijo',
            'taxclasses_id' => 377,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2186,
            'name' => 'Calefactores de aire - Portátil',
            'taxclasses_id' => 283,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2187,
            'name' => 'Humidificadores de aire - Fijo',
            'taxclasses_id' => 377,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2188,
            'name' => 'Tuberías de calefacción/ventilación/aire acondicionado variedad Packs',
            'taxclasses_id' => 378,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2189,
            'name' => 'Ventiladores de techo',
            'taxclasses_id' => 377,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2190,
            'name' => 'Boosters de conducto',
            'taxclasses_id' => 377,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2191,
            'name' => 'Conductos',
            'taxclasses_id' => 377,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2192,
            'name' => 'Ventiladores - Extractor',
            'taxclasses_id' => 377,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2193,
            'name' => 'Los termostatos',
            'taxclasses_id' => 376,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2194,
            'name' => 'Los sistemas de calefacción por suelo radiante',
            'taxclasses_id' => 376,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2195,
            'name' => 'Desincrustadores de (DIY)',
            'taxclasses_id' => 375,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2196,
            'name' => 'Los ablandadores de agua (DIY)',
            'taxclasses_id' => 375,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2197,
            'name' => 'Medidores de agua',
            'taxclasses_id' => 375,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2198,
            'name' => 'Las máquinas y sistemas de filtración de agua',
            'taxclasses_id' => 375,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2199,
            'name' => 'Tubos y conectores de tubos',
            'taxclasses_id' => 379,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2200,
            'name' => 'Tubos y Tubos Válvulas/accesorios',
            'taxclasses_id' => 379,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2201,
            'name' => 'Tiras de seguridad ducha',
            'taxclasses_id' => 374,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2202,
            'name' => 'Asientos de baño',
            'taxclasses_id' => 374,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2203,
            'name' => 'Las agarraderas',
            'taxclasses_id' => 374,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2204,
            'name' => 'Bañera/ducha módulos - bañera',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2205,
            'name' => 'Baño/ducha Caddies - Fijo',
            'taxclasses_id' => 374,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2206,
            'name' => 'Toalleros/anillos/ganchos - Fijo',
            'taxclasses_id' => 374,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2207,
            'name' => 'Loción/soap/higienizador dispensadores',
            'taxclasses_id' => 374,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2208,
            'name' => 'Ducha Spas',
            'taxclasses_id' => 373,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2209,
            'name' => 'Los tanques sépticos',
            'taxclasses_id' => 380,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2210,
            'name' => 'Tubos y tuberías',
            'taxclasses_id' => 379,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2211,
            'name' => 'Bombas',
            'taxclasses_id' => 379,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2212,
            'name' => 'Tubos y tuberías - accesorios/Repuestos',
            'taxclasses_id' => 379,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2213,
            'name' => 'Los tubos de alimentación/tubos variedad Packs',
            'taxclasses_id' => 379,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2214,
            'name' => 'Wc asientos/tapas',
            'taxclasses_id' => 374,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2215,
            'name' => 'Equipos de aire acondicionado - Multifunción - Fijo',
            'taxclasses_id' => 377,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2216,
            'name' => 'Ventiladores de escape/ventana',
            'taxclasses_id' => 377,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2217,
            'name' => 'Luchar contra otros equipos deportivos',
            'taxclasses_id' => 254,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2218,
            'name' => 'Deportes de Raqueta otros equipos',
            'taxclasses_id' => 250,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2219,
            'name' => 'Esgrima Deportes de equipo (encendido)',
            'taxclasses_id' => 254,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2220,
            'name' => 'Calentadores de agua camping',
            'taxclasses_id' => 295,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2221,
            'name' => 'Camping inodoros (alimentado)',
            'taxclasses_id' => 298,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2222,
            'name' => 'Relojes - piezas de recambio',
            'taxclasses_id' => 312,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2223,
            'name' => 'Tractores de jardín',
            'taxclasses_id' => 416,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2224,
            'name' => 'Libros de audio',
            'taxclasses_id' => 163,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2225,
            'name' => 'Revistas de audio',
            'taxclasses_id' => 164,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2226,
            'name' => 'Los mapas impresos',
            'taxclasses_id' => 165,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2227,
            'name' => 'Mapas electrónicos',
            'taxclasses_id' => 165,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2228,
            'name' => 'Libros variedad Packs',
            'taxclasses_id' => 163,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2229,
            'name' => 'Revistas variedad Packs',
            'taxclasses_id' => 164,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2230,
            'name' => 'Los fungicidas',
            'taxclasses_id' => 407,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2231,
            'name' => 'Jardín de césped/suelo/Enmiendas del suelo otros',
            'taxclasses_id' => 419,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2232,
            'name' => 'Deportes Equipo de puntuación (impulsado)',
            'taxclasses_id' => 266,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2233,
            'name' => 'Esgrima Deportes de equipo (sin alimentación)',
            'taxclasses_id' => 254,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2234,
            'name' => 'Ropa deportiva - Neckwear',
            'taxclasses_id' => 213,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2235,
            'name' => 'Ropa deportiva - Correas',
            'taxclasses_id' => 213,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2236,
            'name' => 'Ropa deportiva - insignias y hebillas.',
            'taxclasses_id' => 213,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2237,
            'name' => 'Instrumento musical Brasswind Accesorios (sin alimentación)',
            'taxclasses_id' => 168,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2238,
            'name' => 'Teclado/Piano Accesorios (alimentado)',
            'taxclasses_id' => 168,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2239,
            'name' => 'Instrumento musical de percusión Accesorios (sin alimentación)',
            'taxclasses_id' => 168,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2240,
            'name' => 'Cadena de Accesorios para instrumentos musicales (sin alimentación)',
            'taxclasses_id' => 168,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2241,
            'name' => 'Accesorios de instrumentos musicales de viento (sin alimentación)',
            'taxclasses_id' => 168,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2242,
            'name' => 'Estuches para instrumentos musicales/bolsas/tapas',
            'taxclasses_id' => 168,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2243,
            'name' => 'Los productos de limpieza de instrumentos musicales',
            'taxclasses_id' => 168,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2244,
            'name' => 'Metronomes/sintonizadores (alimentado)',
            'taxclasses_id' => 168,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2245,
            'name' => 'Tenedores de instrumentos musicales/pedestales/Salterios',
            'taxclasses_id' => 168,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2246,
            'name' => 'Metronomes/sintonizadores (sin alimentación)',
            'taxclasses_id' => 168,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2247,
            'name' => 'Instrumentos musicales/accesorios diversos Packs',
            'taxclasses_id' => 169,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2248,
            'name' => 'Variedad de accesorios para instrumentos musicales Packs',
            'taxclasses_id' => 168,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2249,
            'name' => 'Otros accesorios para instrumentos musicales',
            'taxclasses_id' => 168,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2250,
            'name' => 'Hogar/oficina/Tablas de escritorios - Piezas y componentes de repuesto',
            'taxclasses_id' => 302,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2251,
            'name' => 'Hogar camas - Piezas y componentes de repuesto',
            'taxclasses_id' => 303,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2252,
            'name' => 'Hogar/sillas de oficina - Piezas y componentes de repuesto',
            'taxclasses_id' => 301,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2253,
            'name' => 'Hogar/oficina/almacenamiento de muebles - Visualización de piezas y componentes de repuesto',
            'taxclasses_id' => 300,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2254,
            'name' => 'Taller ayuda a piezas de repuesto y accesorios',
            'taxclasses_id' => 451,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2255,
            'name' => 'Taller ayuda a otros',
            'taxclasses_id' => 451,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2256,
            'name' => 'Otro almacenamiento de herramienta',
            'taxclasses_id' => 450,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2257,
            'name' => 'Almacenamiento de herramienta variedad Packs',
            'taxclasses_id' => 450,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2258,
            'name' => 'Sticky Notes/cubos de papel',
            'taxclasses_id' => 176,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2259,
            'name' => 'Las trituradoras de papel (con alimentación)',
            'taxclasses_id' => 180,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2260,
            'name' => 'Papelería Papel/Tarjeta/Film Otros',
            'taxclasses_id' => 183,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2261,
            'name' => 'Papelería Papel/Tarjeta/variedad de películas Packs',
            'taxclasses_id' => 183,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2262,
            'name' => 'Disco de fiscales titulares (industria automotriz)',
            'taxclasses_id' => 326,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2263,
            'name' => 'Sustitución de abrasivos Parts-Accessories',
            'taxclasses_id' => 444,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2264,
            'name' => 'Tapas de libros',
            'taxclasses_id' => 181,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2265,
            'name' => 'Papelería cintas adhesivas',
            'taxclasses_id' => 179,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2266,
            'name' => 'Fragancia/Apariencia de automoción - accesorios/Repuestos',
            'taxclasses_id' => 340,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2267,
            'name' => 'Portadores de almacenamiento exterior/bolsas (industria automotriz)',
            'taxclasses_id' => 319,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2268,
            'name' => 'Productos anti-robo de piezas de recambio y accesorios',
            'taxclasses_id' => 345,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2269,
            'name' => 'Gestión de carga - piezas de recambio y accesorios',
            'taxclasses_id' => 319,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2270,
            'name' => 'El automóvil eléctrico - piezas de recambio y accesorios',
            'taxclasses_id' => 352,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2271,
            'name' => 'Interruptores de automoción',
            'taxclasses_id' => 352,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2272,
            'name' => 'Juegos de mesa (sin alimentación)',
            'taxclasses_id' => 452,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2273,
            'name' => 'Juegos de tablero (motorizado)',
            'taxclasses_id' => 452,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2274,
            'name' => 'Juegos de tablero/cartas/Puzzles - accesorios/Repuestos',
            'taxclasses_id' => 452,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2275,
            'name' => 'Juegos de Puzzles/tarjetas/Otros',
            'taxclasses_id' => 452,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2276,
            'name' => 'Juegos de tablero/cartas/paquetes variedad Puzzles',
            'taxclasses_id' => 452,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2277,
            'name' => 'Juegos de cartas (sin alimentación)',
            'taxclasses_id' => 452,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2278,
            'name' => 'Juegos de cartas (impulsado)',
            'taxclasses_id' => 452,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2279,
            'name' => 'Puzzles (sin alimentación)',
            'taxclasses_id' => 452,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2280,
            'name' => 'Puzzles (alimentado)',
            'taxclasses_id' => 452,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2281,
            'name' => 'Muñecas y Juguetes blandos (sin alimentación)',
            'taxclasses_id' => 453,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2282,
            'name' => 'Muñecas y Juguetes blandos (impulsado)',
            'taxclasses_id' => 453,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2283,
            'name' => 'Muñecas y muñecos y peluches Otros',
            'taxclasses_id' => 453,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2284,
            'name' => 'Los títeres',
            'taxclasses_id' => 453,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2285,
            'name' => 'Dolls Belleza / Cosméticos Accesorios',
            'taxclasses_id' => 454,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2286,
            'name' => 'Dolls edificios/Configuración',
            'taxclasses_id' => 454,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2287,
            'name' => 'Ropa de muñecas',
            'taxclasses_id' => 454,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2288,
            'name' => 'Muebles de muñecas',
            'taxclasses_id' => 454,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2289,
            'name' => 'Muñecas y muñecos y peluches Otros accesorios',
            'taxclasses_id' => 454,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2290,
            'name' => 'Muñecas y muñecos y juguetes blandos Variedad de accesorios Packs',
            'taxclasses_id' => 454,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2291,
            'name' => 'Teatros de títeres',
            'taxclasses_id' => 454,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2292,
            'name' => 'Bebé/bebés juguetes de estimulación (sin alimentación)',
            'taxclasses_id' => 455,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2293,
            'name' => 'Bebé Lactante/juguetes de estimulación (impulsado)',
            'taxclasses_id' => 455,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2294,
            'name' => 'Baño/piscina juguetes de agua',
            'taxclasses_id' => 455,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2295,
            'name' => 'Comunicación Juguetes (sin alimentación)',
            'taxclasses_id' => 455,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2296,
            'name' => 'Comunicación juguetes (alimentado)',
            'taxclasses_id' => 455,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2297,
            'name' => 'Equipos de juguete',
            'taxclasses_id' => 455,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2298,
            'name' => 'Otros juguetes educativos/Desarrollo',
            'taxclasses_id' => 455,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2299,
            'name' => 'Desarrollo/juguetes educativos diversos Packs',
            'taxclasses_id' => 455,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2300,
            'name' => 'Empujar/tirar-a lo largo de los juguetes (sin alimentación)',
            'taxclasses_id' => 455,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2301,
            'name' => 'Empujar/tirar-a lo largo de los juguetes (alimentado)',
            'taxclasses_id' => 455,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2302,
            'name' => 'Juguetes científicos (sin alimentación)',
            'taxclasses_id' => 455,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2303,
            'name' => 'Juguetes científicos (impulsado)',
            'taxclasses_id' => 455,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2304,
            'name' => 'Peonzas/Yo-Yos',
            'taxclasses_id' => 455,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2305,
            'name' => 'Bloques de construcción de juguete (sin alimentación)',
            'taxclasses_id' => 455,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2306,
            'name' => 'Bloques de construcción de juguete (impulsado)',
            'taxclasses_id' => 455,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2307,
            'name' => 'La construcción del modelo de juguete (sin alimentación)',
            'taxclasses_id' => 455,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2308,
            'name' => 'La construcción del modelo de juguete (impulsado)',
            'taxclasses_id' => 455,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2309,
            'name' => 'Ver los juguetes (sin alimentación)',
            'taxclasses_id' => 455,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2310,
            'name' => 'Ver los juguetes (alimentado)',
            'taxclasses_id' => 455,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2311,
            'name' => 'Disfraces Disfraces',
            'taxclasses_id' => 456,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2312,
            'name' => 'Disfraces Disfraces Accesorios/Otros',
            'taxclasses_id' => 456,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2313,
            'name' => 'Fancy Dress vestuario/accesorios diversos Packs',
            'taxclasses_id' => 456,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2314,
            'name' => 'Disfraces Accesorios (sin alimentación)',
            'taxclasses_id' => 456,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2315,
            'name' => 'Disfraces Accesorios (alimentado)',
            'taxclasses_id' => 456,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2316,
            'name' => 'Juguetes musicales (sin alimentación)',
            'taxclasses_id' => 457,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2317,
            'name' => 'Juguetes musicales (impulsado)',
            'taxclasses_id' => 457,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2318,
            'name' => 'Juguetes musicales otros',
            'taxclasses_id' => 457,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2319,
            'name' => 'Juegos de exterior/Estructuras de juegos Otros',
            'taxclasses_id' => 458,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2320,
            'name' => 'Juegos de interior/exterior',
            'taxclasses_id' => 458,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2321,
            'name' => 'Estructuras de juegos al aire libre',
            'taxclasses_id' => 458,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2322,
            'name' => 'Juegos de mesa (sin alimentación)',
            'taxclasses_id' => 459,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2323,
            'name' => 'Juegos de mesa (alimentado)',
            'taxclasses_id' => 459,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2324,
            'name' => 'Otros juegos de mesa',
            'taxclasses_id' => 459,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2325,
            'name' => 'Juguetes y Juegos Diversos Packs',
            'taxclasses_id' => 460,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2326,
            'name' => 'Juguetes - Ride-on (no motorizado)',
            'taxclasses_id' => 461,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2327,
            'name' => 'Juguetes - Ride-on (encendido)',
            'taxclasses_id' => 461,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2328,
            'name' => 'Juguetes - Ride-on otros',
            'taxclasses_id' => 461,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2329,
            'name' => 'Coche/Tren establece (sin alimentación)',
            'taxclasses_id' => 462,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2330,
            'name' => 'Coche/Tren establece (impulsado)',
            'taxclasses_id' => 462,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2331,
            'name' => 'Coche/Tren Set - piezas de recambio y accesorios',
            'taxclasses_id' => 462,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2332,
            'name' => 'Vehículos de juguete - Non-ride (sin alimentación)',
            'taxclasses_id' => 462,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2333,
            'name' => 'Vehículos de juguete - Non-ride (alimentado)',
            'taxclasses_id' => 462,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2334,
            'name' => 'Vehículos de juguete - Non-ride Otros',
            'taxclasses_id' => 462,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2335,
            'name' => 'Vehículos de juguete - Non-ride variedad Packs',
            'taxclasses_id' => 462,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2336,
            'name' => 'Mantas (alimentado)',
            'taxclasses_id' => 308,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2337,
            'name' => 'Camping Tratamientos de purificación de agua',
            'taxclasses_id' => 297,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2338,
            'name' => 'Hogar/oficina/armarios Vitrinas',
            'taxclasses_id' => 300,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2339,
            'name' => 'Bolsos de aseo/Tocador casos',
            'taxclasses_id' => 191,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2340,
            'name' => 'Afiladores de cuchillos de cocina (sin alimentación)',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2341,
            'name' => 'Tablemats - no tejido textil/No',
            'taxclasses_id' => 288,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2342,
            'name' => 'Megáfonos',
            'taxclasses_id' => 222,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2343,
            'name' => 'Los reproductores de casetes de audio para coche/cambiadores',
            'taxclasses_id' => 230,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2344,
            'name' => 'Alfombrillas de escritorio',
            'taxclasses_id' => 174,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2345,
            'name' => 'Álbumes de fotografías - piezas de recambio y accesorios',
            'taxclasses_id' => 225,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2346,
            'name' => 'Kits de análisis de agua domésticos',
            'taxclasses_id' => 285,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2347,
            'name' => 'Almacenaje de cocina - piezas de recambio y accesorios',
            'taxclasses_id' => 284,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2348,
            'name' => 'Anillos de servilleta',
            'taxclasses_id' => 288,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2349,
            'name' => 'Los generadores',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2350,
            'name' => 'Pistolas de pegamento - Powered',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2351,
            'name' => 'Cemento/mortero Máquinas de mezcla',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2352,
            'name' => 'Lámparas de exterior/Linternas LINTERNAS/- Powered',
            'taxclasses_id' => 420,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2353,
            'name' => 'Lámparas de exterior/Linternas LINTERNAS/- No impulsado',
            'taxclasses_id' => 420,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2354,
            'name' => 'Iluminación de jardín césped/piezas de repuesto y accesorios',
            'taxclasses_id' => 420,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2355,
            'name' => 'Iluminación de jardín césped/Otros',
            'taxclasses_id' => 420,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2356,
            'name' => 'Paraguas y sombrillas',
            'taxclasses_id' => 408,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2357,
            'name' => 'Planta soporta/Apuestas',
            'taxclasses_id' => 422,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2358,
            'name' => 'Carretillas - Powered',
            'taxclasses_id' => 424,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2359,
            'name' => 'Sierras circulares',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2360,
            'name' => 'Los productos a base de huevo / Comidas - No listo para comer (congelados)',
            'taxclasses_id' => 71,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2361,
            'name' => 'Los productos a base de huevo / Comidas - No listo para comer (perecederos)',
            'taxclasses_id' => 71,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2362,
            'name' => 'Productos de Huevo / Comidas Basado - No Listo Para Comer (Larga conservación)',
            'taxclasses_id' => 71,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2363,
            'name' => 'De Lácteos / Huevos Productos a base / Comidas - Listo para comer (perecederos)',
            'taxclasses_id' => 71,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2364,
            'name' => 'De Lácteos / Huevos Productos a base / Comidas - Listo para comer (Larga conservación)',
            'taxclasses_id' => 71,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2365,
            'name' => 'Los dispositivos multifuncionales',
            'taxclasses_id' => 175,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2366,
            'name' => 'Los compresores de aire estacionarios -',
            'taxclasses_id' => 426,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2367,
            'name' => 'Sierras de cinta - Portátil',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2368,
            'name' => 'Las baterías (industria automotriz)',
            'taxclasses_id' => 356,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2369,
            'name' => 'Los accesorios de la batería (industria automotriz)',
            'taxclasses_id' => 356,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2370,
            'name' => 'Anticongelantes/Refrigerantes (industria automotriz)',
            'taxclasses_id' => 357,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2371,
            'name' => 'Inmovilizadores (industria automotriz)',
            'taxclasses_id' => 345,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2372,
            'name' => 'Lijadoras de disco - Portable',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2373,
            'name' => 'Pinceles aplicadores/automoción',
            'taxclasses_id' => 340,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2374,
            'name' => 'Juego de Rol - Cocina Juguetes',
            'taxclasses_id' => 463,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2375,
            'name' => 'Juegos de vasos',
            'taxclasses_id' => 397,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2376,
            'name' => 'Suministros de piscina',
            'taxclasses_id' => 406,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2377,
            'name' => 'Agarre de estante camisa/papel contact',
            'taxclasses_id' => 305,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2378,
            'name' => 'Aditivos de combustible',
            'taxclasses_id' => 466,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2379,
            'name' => 'Bombas de combustible (sin alimentación)',
            'taxclasses_id' => 468,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2380,
            'name' => 'Bombas de combustible (alimentado)',
            'taxclasses_id' => 468,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2381,
            'name' => 'Botellas de gas combustible/bidones (vacío).',
            'taxclasses_id' => 469,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2382,
            'name' => 'Los combustibles y aditivos de combustible variedad Packs',
            'taxclasses_id' => 467,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2383,
            'name' => 'Los combustibles líquidos',
            'taxclasses_id' => 465,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2384,
            'name' => 'Combustibles gaseosos',
            'taxclasses_id' => 465,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2385,
            'name' => 'Los combustibles de gel',
            'taxclasses_id' => 465,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2386,
            'name' => 'Los combustibles sólidos',
            'taxclasses_id' => 465,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2387,
            'name' => 'Aceites lubricantes/líquidos',
            'taxclasses_id' => 471,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2388,
            'name' => 'Grasas Lubricantes',
            'taxclasses_id' => 471,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2389,
            'name' => 'Ceras de lubricación',
            'taxclasses_id' => 471,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2390,
            'name' => 'Variedad de productos lubricantes Packs',
            'taxclasses_id' => 471,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2391,
            'name' => 'Anticongelantes/refrigerantes',
            'taxclasses_id' => 472,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2392,
            'name' => 'Anti-corrosivos',
            'taxclasses_id' => 472,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2393,
            'name' => 'Compuestos protectores variedad Packs',
            'taxclasses_id' => 472,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2394,
            'name' => 'Contenedores/dispensadores de lubricante (vacío)',
            'taxclasses_id' => 475,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2395,
            'name' => 'Recipientes de drenaje',
            'taxclasses_id' => 475,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2396,
            'name' => 'Almacenamiento de lubricantes y compuestos protectores variedad Packs',
            'taxclasses_id' => 475,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2397,
            'name' => 'Aceite lubricante líquido/bombas (sin alimentación)',
            'taxclasses_id' => 474,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2398,
            'name' => 'Aceite lubricante líquido/Bombas (alimentado)',
            'taxclasses_id' => 474,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2399,
            'name' => 'Lubricantes/compuestos protectores variedad Packs',
            'taxclasses_id' => 473,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2400,
            'name' => 'Windows - revestido de madera de unidades individuales.',
            'taxclasses_id' => 448,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2401,
            'name' => 'Windows - unidades individuales -no la madera',
            'taxclasses_id' => 448,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2402,
            'name' => 'Windows - Unidades de combinación de madera - No',
            'taxclasses_id' => 448,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2403,
            'name' => 'Windows - Unidades de combinación - revestido de madera',
            'taxclasses_id' => 448,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2404,
            'name' => 'Los tragaluces tubulares -',
            'taxclasses_id' => 448,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2405,
            'name' => 'Claraboyas - revestido de madera',
            'taxclasses_id' => 448,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2406,
            'name' => 'Windows - Otros',
            'taxclasses_id' => 448,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2407,
            'name' => 'Toldos - No impulsado',
            'taxclasses_id' => 436,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2408,
            'name' => 'Partes de la ventana/Otros accesorios',
            'taxclasses_id' => 436,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2409,
            'name' => 'Windows - Sustitución - guillotina no madereros',
            'taxclasses_id' => 436,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2410,
            'name' => 'Windows - Sustitución Sash - Madera',
            'taxclasses_id' => 436,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2411,
            'name' => 'Windows - Bay/Bow - Madera',
            'taxclasses_id' => 448,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2412,
            'name' => 'Windows - Bay/Bow - No Madereros',
            'taxclasses_id' => 448,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2413,
            'name' => 'Windows - Bay/Bow - revestido de madera',
            'taxclasses_id' => 448,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2414,
            'name' => 'Los operadores de la ventana',
            'taxclasses_id' => 436,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2415,
            'name' => 'Las botellas o recipientes de combustible líquido (vacío)',
            'taxclasses_id' => 469,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2416,
            'name' => 'Combinación de medición meteorológica/equipo de monitoreo - Powered',
            'taxclasses_id' => 415,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2417,
            'name' => 'Acondicionadores de aire - Portátil',
            'taxclasses_id' => 283,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2418,
            'name' => 'Anemómetros - Powered',
            'taxclasses_id' => 415,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2419,
            'name' => 'Termómetros - Jardín - Powered',
            'taxclasses_id' => 415,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2420,
            'name' => 'Pluviometros - Powered',
            'taxclasses_id' => 415,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2421,
            'name' => 'Antiadhesivo Productos',
            'taxclasses_id' => 472,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2422,
            'name' => 'Campanas de cocina',
            'taxclasses_id' => 273,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2423,
            'name' => 'Los higrómetros - Powered',
            'taxclasses_id' => 415,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2424,
            'name' => 'Humidificadores de aire - Portátil',
            'taxclasses_id' => 283,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2425,
            'name' => 'Deshumidificadores de aire - Portátil (alimentación)',
            'taxclasses_id' => 283,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2426,
            'name' => 'Ionizadores de aire - Portátil',
            'taxclasses_id' => 283,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2427,
            'name' => 'Refrigeradores de aire - Portátil',
            'taxclasses_id' => 283,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2428,
            'name' => 'Dispositivos de control de aire - Multifunción - Portátil',
            'taxclasses_id' => 283,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2429,
            'name' => 'Purificadores de aire - Portátil',
            'taxclasses_id' => 283,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2430,
            'name' => 'Ventiladores - Portable',
            'taxclasses_id' => 283,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2431,
            'name' => 'Barreras de Aislamiento radiante/escudos térmicos',
            'taxclasses_id' => 430,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2432,
            'name' => 'Aislamiento - junta rígida (exterior)',
            'taxclasses_id' => 430,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2433,
            'name' => 'Soportes/anclajes de aislamiento',
            'taxclasses_id' => 430,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2434,
            'name' => 'Junta blanda',
            'taxclasses_id' => 435,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2435,
            'name' => 'Variedad de lubricantes Packs',
            'taxclasses_id' => 476,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2436,
            'name' => 'Trituradores de hielo/Ice Cube Makers (alimentado)',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2437,
            'name' => 'Cookie Guns (alimentado)',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2438,
            'name' => 'Bandejas de calentamiento (impulsado)',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2439,
            'name' => 'Brillo de hojas/planta Cleaner',
            'taxclasses_id' => 407,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2440,
            'name' => 'Mail/Post/jardín de césped (cuadros)',
            'taxclasses_id' => 408,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2441,
            'name' => 'Animales/Scarers disuasivos (césped/jardín)',
            'taxclasses_id' => 421,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2442,
            'name' => 'Temporizadores de cocina (con alimentación)',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2443,
            'name' => 'Accesorios/Planta floral (césped/jardín)',
            'taxclasses_id' => 422,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2444,
            'name' => 'Estanterías de jardín/Encimeras',
            'taxclasses_id' => 408,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2445,
            'name' => 'Eliminación de residuos de jardín césped/piezas de repuesto y accesorios',
            'taxclasses_id' => 411,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2446,
            'name' => 'Calentadores de invernadero/ventiladores',
            'taxclasses_id' => 412,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2447,
            'name' => 'Pisos - Engineered Wood',
            'taxclasses_id' => 429,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2448,
            'name' => 'Tijeras de papelería',
            'taxclasses_id' => 180,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2449,
            'name' => 'Artistas tableros de dibujo',
            'taxclasses_id' => 235,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2450,
            'name' => 'Las alarmas del cuerpo',
            'taxclasses_id' => 479,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2451,
            'name' => 'Silbatos de emergencia',
            'taxclasses_id' => 479,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2452,
            'name' => 'Llavero de alarmas',
            'taxclasses_id' => 479,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2453,
            'name' => 'El equipaje personal alarmas',
            'taxclasses_id' => 479,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2454,
            'name' => 'Seguridad Personal bengalas/señales',
            'taxclasses_id' => 479,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2455,
            'name' => 'Luces de seguridad personal',
            'taxclasses_id' => 479,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2456,
            'name' => 'Sprays de autodefensa',
            'taxclasses_id' => 479,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2457,
            'name' => 'Pistolas',
            'taxclasses_id' => 479,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2458,
            'name' => 'Webcams inalámbrica portátil (Vigilancia inversa)',
            'taxclasses_id' => 479,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2459,
            'name' => 'Los dispositivos de seguridad personal variedad Packs',
            'taxclasses_id' => 479,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2460,
            'name' => 'Supresores o retardantes de fuego',
            'taxclasses_id' => 480,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2461,
            'name' => 'Rampas de evacuación de incendios/escaleras',
            'taxclasses_id' => 480,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2462,
            'name' => 'Las alarmas de incendios públicos',
            'taxclasses_id' => 480,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2463,
            'name' => 'Campanas de humos/Respiradores',
            'taxclasses_id' => 480,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2464,
            'name' => 'Incendio/ambiental Productos químicos diversos paquetes de seguridad',
            'taxclasses_id' => 480,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2465,
            'name' => 'Aire/niebla Cuernos',
            'taxclasses_id' => 481,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2466,
            'name' => 'Lifebelts/Life-Jackets/Lifesuits',
            'taxclasses_id' => 481,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2467,
            'name' => 'Las balsas salvavidas/Life-Buoys/Cojines de flotación',
            'taxclasses_id' => 481,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2468,
            'name' => 'Pararrayos/accesorios',
            'taxclasses_id' => 481,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2469,
            'name' => 'Sacos de arena/protectores de inundaciones',
            'taxclasses_id' => 481,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2470,
            'name' => 'Refugios de tormenta',
            'taxclasses_id' => 481,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2471,
            'name' => 'Los transpondedores',
            'taxclasses_id' => 481,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2472,
            'name' => 'Desastres naturales o climáticos diversos paquetes de productos de seguridad',
            'taxclasses_id' => 481,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2473,
            'name' => 'Alarmas antirrobo',
            'taxclasses_id' => 482,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2474,
            'name' => 'Gas/detectores de humo/calor',
            'taxclasses_id' => 482,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2475,
            'name' => 'Sistemas de seguridad de control de acceso',
            'taxclasses_id' => 483,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2476,
            'name' => 'Puerta ventana/puerta/tornillos/bloqueos/Keys',
            'taxclasses_id' => 483,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2477,
            'name' => 'Las cadenas de la puerta',
            'taxclasses_id' => 483,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2478,
            'name' => 'Puerta/portón visores',
            'taxclasses_id' => 483,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2479,
            'name' => 'Puertas/Rejas de seguridad',
            'taxclasses_id' => 483,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2480,
            'name' => 'Ventana rejas protectoras/Panels/Persianas',
            'taxclasses_id' => 483,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2481,
            'name' => 'Puerta/Ventana/Productos de seguridad perimetral variedad Packs',
            'taxclasses_id' => 483,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2482,
            'name' => 'Mantas ignífugas',
            'taxclasses_id' => 484,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2483,
            'name' => 'Extintores de incendios - Presurizado',
            'taxclasses_id' => 484,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2484,
            'name' => 'Mangueras contra incendios',
            'taxclasses_id' => 484,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2485,
            'name' => 'Home/Business Extintores variedad Packs',
            'taxclasses_id' => 484,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2486,
            'name' => 'Escuchas/Equipo de depuración',
            'taxclasses_id' => 485,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2487,
            'name' => 'Luz/Movimiento/sensores de sonido',
            'taxclasses_id' => 485,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2488,
            'name' => 'Luces de seguridad',
            'taxclasses_id' => 485,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2489,
            'name' => 'Cámaras de vigilancia o grabadores de vídeo',
            'taxclasses_id' => 485,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2490,
            'name' => 'Home/Business Equipo de Vigilancia variedad Packs',
            'taxclasses_id' => 485,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2491,
            'name' => 'Caja fuerte',
            'taxclasses_id' => 486,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2492,
            'name' => 'Home/Business Seguridad/Seguridad/vigilancia variedad Packs',
            'taxclasses_id' => 487,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2493,
            'name' => 'Seguridad/Seguridad/vigilancia variedad Packs',
            'taxclasses_id' => 489,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2494,
            'name' => 'Los polacos/pilotes/varillas',
            'taxclasses_id' => 435,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2495,
            'name' => 'Escalera de piezas de recambio y accesorios',
            'taxclasses_id' => 437,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2496,
            'name' => 'La preparación de alimentos cepillos/Bombas de aceite/Baster',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2497,
            'name' => 'Tazas de huevo',
            'taxclasses_id' => 288,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2498,
            'name' => 'Jambas (Molduras/elementos de carpintería)',
            'taxclasses_id' => 437,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2499,
            'name' => 'Embudos de alimentos',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2500,
            'name' => 'Modelar Moldes de alimentos',
            'taxclasses_id' => 291,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2501,
            'name' => 'Molduras/elementos de carpintería/Escaleras Otros',
            'taxclasses_id' => 437,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2502,
            'name' => 'Molduras/elementos de carpintería/Escaleras variedad Packs',
            'taxclasses_id' => 437,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2503,
            'name' => 'Cookie Pistolas/comida decorando las jeringuillas (sin alimentación)',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2504,
            'name' => 'Cappuccino tarrinas de nata (sin alimentación)',
            'taxclasses_id' => 285,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2505,
            'name' => 'Parte cuernos/sopladores',
            'taxclasses_id' => 173,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2506,
            'name' => 'Ruedas giratorias para mobiliario/pad/diapositivas',
            'taxclasses_id' => 305,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2507,
            'name' => 'Pedestales de equipo/admite',
            'taxclasses_id' => 194,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2508,
            'name' => 'Muñecas de peinado Cabezas (sin alimentación)',
            'taxclasses_id' => 454,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2509,
            'name' => 'Muñecas de peinado Cabezas (alimentado)',
            'taxclasses_id' => 454,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2510,
            'name' => 'Juguetes - Montado de accesorios',
            'taxclasses_id' => 461,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2511,
            'name' => 'Tableros de dibujo/accesorios de juguete',
            'taxclasses_id' => 455,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2512,
            'name' => 'Practical Jokes',
            'taxclasses_id' => 452,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2513,
            'name' => 'Pasta adhesiva/Removedores de cola',
            'taxclasses_id' => 179,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2514,
            'name' => 'Proyectores',
            'taxclasses_id' => 178,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2515,
            'name' => 'Insectos',
            'taxclasses_id' => 477,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2516,
            'name' => 'Arácnidos (Arañas y Escorpiones)',
            'taxclasses_id' => 477,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2517,
            'name' => 'Anélidos (Gusanos)',
            'taxclasses_id' => 477,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2518,
            'name' => 'Los moluscos',
            'taxclasses_id' => 477,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2519,
            'name' => 'Crustáceos',
            'taxclasses_id' => 477,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2520,
            'name' => 'Las esponjas',
            'taxclasses_id' => 477,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2521,
            'name' => 'Las estrellas de mar o erizos de mar',
            'taxclasses_id' => 477,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2522,
            'name' => 'Aguavivas',
            'taxclasses_id' => 477,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2523,
            'name' => 'Coral/anémona de mar',
            'taxclasses_id' => 477,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2524,
            'name' => 'Los roedores',
            'taxclasses_id' => 478,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2525,
            'name' => 'Los peces',
            'taxclasses_id' => 478,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2526,
            'name' => 'Las aves',
            'taxclasses_id' => 478,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2527,
            'name' => 'Anfibios',
            'taxclasses_id' => 478,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2528,
            'name' => 'Los primates',
            'taxclasses_id' => 478,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2529,
            'name' => 'Felina (gatos)',
            'taxclasses_id' => 478,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2530,
            'name' => '(ganado bovino)',
            'taxclasses_id' => 478,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2531,
            'name' => 'Ganado caprino (cabras)',
            'taxclasses_id' => 478,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2532,
            'name' => 'Equino (caballos o burros)',
            'taxclasses_id' => 478,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2533,
            'name' => 'Porcinos (cerdos)',
            'taxclasses_id' => 478,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2534,
            'name' => 'Ovino (ovejas)',
            'taxclasses_id' => 478,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2535,
            'name' => 'Los Reptiles',
            'taxclasses_id' => 478,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2536,
            'name' => 'Los marsupiales',
            'taxclasses_id' => 478,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2537,
            'name' => 'Los lagomorfos (liebres y conejos)',
            'taxclasses_id' => 478,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2538,
            'name' => 'Los cetáceos (ballenas y delfines y marsopas)',
            'taxclasses_id' => 478,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2539,
            'name' => 'Botella/Puede aislantes',
            'taxclasses_id' => 285,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2540,
            'name' => 'Accesorios de puerta',
            'taxclasses_id' => 438,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2541,
            'name' => 'Supervivencia de emergencia mantas y sacos de dormir',
            'taxclasses_id' => 479,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2542,
            'name' => 'Sistemas de alarma de recambios/accesorios',
            'taxclasses_id' => 482,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2543,
            'name' => 'Sal de roca/hielo derritiéndose Productos',
            'taxclasses_id' => 481,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2544,
            'name' => 'Otros invertebrados',
            'taxclasses_id' => 477,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2545,
            'name' => 'Otros vertebrados',
            'taxclasses_id' => 478,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2546,
            'name' => 'Chimeneas/Chimenea rodea/Mantels',
            'taxclasses_id' => 376,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2547,
            'name' => 'Calentadores de agua Tankless',
            'taxclasses_id' => 376,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2548,
            'name' => 'Trampas de basura',
            'taxclasses_id' => 380,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2549,
            'name' => 'Los balastos y arrancadores',
            'taxclasses_id' => 364,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2550,
            'name' => 'Adaptadores (eléctrico)',
            'taxclasses_id' => 362,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2551,
            'name' => 'Placas de pared (eléctrico)',
            'taxclasses_id' => 372,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2552,
            'name' => 'Cables eléctricos',
            'taxclasses_id' => 370,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2553,
            'name' => 'Malla de tierra/PEGADO',
            'taxclasses_id' => 372,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2554,
            'name' => 'Los cables de alimentación/extensión',
            'taxclasses_id' => 372,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2555,
            'name' => 'Campanas/campanas/zumbadores',
            'taxclasses_id' => 439,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2556,
            'name' => 'Hembra/hembra/Salidas',
            'taxclasses_id' => 361,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2557,
            'name' => 'Splitters',
            'taxclasses_id' => 362,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2558,
            'name' => 'Relés/contactores',
            'taxclasses_id' => 362,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2559,
            'name' => 'Cable/Cable extractores',
            'taxclasses_id' => 372,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2560,
            'name' => 'Conexión eléctrica variedad Packs',
            'taxclasses_id' => 361,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2561,
            'name' => 'Conectores (eléctrico)',
            'taxclasses_id' => 361,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2562,
            'name' => 'Embarrados/rutas para autobús',
            'taxclasses_id' => 362,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2563,
            'name' => 'Los disyuntores',
            'taxclasses_id' => 362,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2564,
            'name' => 'Distribución eléctrica/Adaptadores Accesorios',
            'taxclasses_id' => 362,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2565,
            'name' => 'Cajas/Placas de distribución',
            'taxclasses_id' => 362,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2566,
            'name' => 'Supresores de sobretensión/protectores',
            'taxclasses_id' => 362,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2567,
            'name' => 'Interruptores',
            'taxclasses_id' => 362,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2568,
            'name' => 'Bloques de terminales apilables',
            'taxclasses_id' => 362,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2569,
            'name' => 'Multímetros',
            'taxclasses_id' => 372,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2570,
            'name' => 'Condensadores',
            'taxclasses_id' => 362,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2571,
            'name' => 'Canino (perros)',
            'taxclasses_id' => 478,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2572,
            'name' => 'Asfalto/hormigón/mampostería de piezas de recambio y accesorios',
            'taxclasses_id' => 433,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2573,
            'name' => 'Portalámparas',
            'taxclasses_id' => 364,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2574,
            'name' => 'Atenuadores',
            'taxclasses_id' => 364,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2575,
            'name' => 'Las lámparas',
            'taxclasses_id' => 365,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2576,
            'name' => 'Candelabros y bases',
            'taxclasses_id' => 365,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2577,
            'name' => 'Soportes de luz/accesorios',
            'taxclasses_id' => 365,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2578,
            'name' => 'Cambiadores de la bombilla',
            'taxclasses_id' => 365,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2579,
            'name' => 'Iluminación - Fijo',
            'taxclasses_id' => 366,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2580,
            'name' => 'Iluminación de fibra óptica',
            'taxclasses_id' => 366,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2581,
            'name' => 'lámparas de pie',
            'taxclasses_id' => 366,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2582,
            'name' => 'Linternas/linternas',
            'taxclasses_id' => 367,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2583,
            'name' => 'Linternas eléctricas - Portátil',
            'taxclasses_id' => 367,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2584,
            'name' => 'Cuerdas y luces de cadena',
            'taxclasses_id' => 366,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2585,
            'name' => 'Las herramientas/equipos - Mano variedad Packs',
            'taxclasses_id' => 402,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2586,
            'name' => 'Conducto/Cable/Cable/conductos canaletas',
            'taxclasses_id' => 368,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2587,
            'name' => 'Marcadores de cable',
            'taxclasses_id' => 368,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2588,
            'name' => 'Bobinas de cable/Extractores',
            'taxclasses_id' => 368,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2589,
            'name' => 'Cableado Cableado/Protección/envoltura',
            'taxclasses_id' => 368,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2590,
            'name' => 'Abrazaderas de cable/virolas/Vínculos',
            'taxclasses_id' => 368,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2591,
            'name' => 'Aplicadores de pintura - Powered',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2592,
            'name' => 'Aplicadores de pintura - No impulsado',
            'taxclasses_id' => 383,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2593,
            'name' => 'Los aditivos/reforzadores de pintura',
            'taxclasses_id' => 431,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2594,
            'name' => 'La aplicación de pintura Accesorios',
            'taxclasses_id' => 383,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2595,
            'name' => 'Preservadores/Conservantes',
            'taxclasses_id' => 431,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2596,
            'name' => 'Herramientas de congelación de tubos',
            'taxclasses_id' => 400,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2597,
            'name' => 'Vigas de techo',
            'taxclasses_id' => 434,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2598,
            'name' => 'Racores de conducto',
            'taxclasses_id' => 368,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2599,
            'name' => 'Conjuntos de circuitos/circuitos integrados',
            'taxclasses_id' => 371,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2600,
            'name' => 'Componentes discretos',
            'taxclasses_id' => 371,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2601,
            'name' => 'Circuito electrónico Accesorios',
            'taxclasses_id' => 371,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2602,
            'name' => 'Las cubiertas de drenaje (canalones/drenaje)',
            'taxclasses_id' => 441,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2603,
            'name' => 'Luz de extensión - Portátil',
            'taxclasses_id' => 367,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2604,
            'name' => 'Sujetadores de fijación/Accesorios de hardware',
            'taxclasses_id' => 445,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2605,
            'name' => 'Herramientas de cobertura de pared/techo - No impulsado',
            'taxclasses_id' => 383,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2606,
            'name' => 'Gate/sistemas de apertura de puerta de garaje',
            'taxclasses_id' => 438,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2607,
            'name' => 'Marca de Cable Accesorios',
            'taxclasses_id' => 368,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2608,
            'name' => 'Utensilios de cocina/Bakeware accesorios/Repuestos',
            'taxclasses_id' => 287,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2609,
            'name' => 'Ingredientes Typewriter',
            'taxclasses_id' => 175,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2610,
            'name' => 'Consumibles de la máquina de fax',
            'taxclasses_id' => 205,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2611,
            'name' => 'Césped y Jardín de Esgrima Accesorios',
            'taxclasses_id' => 410,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2612,
            'name' => 'Las poleas y correas de transmisión',
            'taxclasses_id' => 385,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2613,
            'name' => 'Bayetas para teléfono',
            'taxclasses_id' => 204,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2614,
            'name' => 'Dispositivos de comunicación fija Accesorios',
            'taxclasses_id' => 205,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2615,
            'name' => 'Multi-uso/Universal temporizadores eléctricos/Controladores',
            'taxclasses_id' => 362,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2616,
            'name' => 'Juegos de ordenador/vídeo de almacenamiento masivo',
            'taxclasses_id' => 195,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2617,
            'name' => 'Juego de Rol - Servicio de limpieza y jardinería y bricolaje Juguetes',
            'taxclasses_id' => 463,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2618,
            'name' => 'Juego de Rol - Compras/Office/Business Juguetes',
            'taxclasses_id' => 463,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2619,
            'name' => 'Bolígrafos digitales',
            'taxclasses_id' => 199,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2620,
            'name' => 'Recortar las pinturas',
            'taxclasses_id' => 431,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2621,
            'name' => 'Holdbacks cortina',
            'taxclasses_id' => 446,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2622,
            'name' => 'Fabricantes de bebidas congeladas afeitadoras/hielo (alimentado)',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2623,
            'name' => 'Fuentes de chocolate (impulsado)',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2624,
            'name' => 'Botella de vino/Abresurcos (alimentado)',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2625,
            'name' => 'Ornamento Accesorios',
            'taxclasses_id' => 310,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2626,
            'name' => 'Sal/pimentero',
            'taxclasses_id' => 288,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2627,
            'name' => 'Harina/azúcar Shakers',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2628,
            'name' => 'Báscula de cocina (con alimentación)',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2629,
            'name' => 'Controlar los dispositivos portátiles de aire piezas de repuesto y accesorios',
            'taxclasses_id' => 283,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2630,
            'name' => 'Marcos de fotos digitales',
            'taxclasses_id' => 225,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2631,
            'name' => 'Recipientes de preparación de alimentos',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2632,
            'name' => 'Las bombas (sin alimentación)',
            'taxclasses_id' => 266,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2633,
            'name' => 'Bombas ( Powered)',
            'taxclasses_id' => 266,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2634,
            'name' => 'Rodillos de perrito caliente',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2635,
            'name' => 'Embellecedor exterior Siding - Accesorios',
            'taxclasses_id' => 449,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2636,
            'name' => 'Los tamices de manchas de pintura',
            'taxclasses_id' => 431,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2637,
            'name' => 'Marcar tizas/Líneas de cadena',
            'taxclasses_id' => 382,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2638,
            'name' => 'Hogar/PINCELES APLICADORES/rodillos',
            'taxclasses_id' => 431,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2639,
            'name' => 'Espejos convexos exteriores',
            'taxclasses_id' => 485,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2640,
            'name' => 'Altavoces portátiles',
            'taxclasses_id' => 220,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2641,
            'name' => 'Las emisoras digitales personales/Trackers',
            'taxclasses_id' => 206,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2642,
            'name' => 'Accesorios de ordenador de juguete',
            'taxclasses_id' => 455,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2643,
            'name' => 'Materiales de Artesanía de espuma',
            'taxclasses_id' => 238,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2644,
            'name' => 'Los embudos (DIY)',
            'taxclasses_id' => 403,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2645,
            'name' => 'Cepillos de alambre',
            'taxclasses_id' => 444,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2646,
            'name' => 'Calibradores cónico',
            'taxclasses_id' => 382,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2647,
            'name' => 'Habitación calentadores',
            'taxclasses_id' => 376,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2648,
            'name' => 'Biscuit carpinteros',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2649,
            'name' => 'Adornos de jardín/placas',
            'taxclasses_id' => 408,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2650,
            'name' => 'Auto reparación de orugas/Creepers',
            'taxclasses_id' => 323,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2651,
            'name' => 'Listones',
            'taxclasses_id' => 435,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2652,
            'name' => 'Protectores de esquina',
            'taxclasses_id' => 428,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2653,
            'name' => 'Paños de taller/Trapos',
            'taxclasses_id' => 451,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2654,
            'name' => 'Papel de enmascarar pintura/Cine',
            'taxclasses_id' => 431,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2655,
            'name' => 'Barricada cintas de seguridad',
            'taxclasses_id' => 481,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2656,
            'name' => 'Convertidores analógico/digital',
            'taxclasses_id' => 222,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2657,
            'name' => 'Bálsamos labiales',
            'taxclasses_id' => 141,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2658,
            'name' => 'Coche detectores de radar',
            'taxclasses_id' => 229,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2659,
            'name' => 'Tapa de tierra/Paisajismo/Telas de mullido',
            'taxclasses_id' => 419,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2660,
            'name' => 'Decorativo (Faux) Equipo de pintura',
            'taxclasses_id' => 431,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2661,
            'name' => 'Embellecedor exterior - bordeando/apuntalamiento',
            'taxclasses_id' => 449,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2662,
            'name' => 'Mobile Home General/Equipos de configuración',
            'taxclasses_id' => 434,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2663,
            'name' => 'Aislamiento - Tubo quedando/envoltura',
            'taxclasses_id' => 430,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2664,
            'name' => 'Amplificadores de distribución de visual',
            'taxclasses_id' => 222,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2665,
            'name' => 'Bloque de bajo ruido (LNB) transformadores',
            'taxclasses_id' => 224,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2666,
            'name' => 'Receptor de vídeo/accesorios para su instalación.',
            'taxclasses_id' => 224,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2667,
            'name' => 'Receptor de vídeo/variedad de paquetes de instalación',
            'taxclasses_id' => 224,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2668,
            'name' => 'DECT (Digital Enhanced Cordless Telecommunications) repetidores',
            'taxclasses_id' => 204,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2669,
            'name' => 'Equipo/Video Juego de auriculares',
            'taxclasses_id' => 194,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2670,
            'name' => 'Testers electrónicos',
            'taxclasses_id' => 372,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2671,
            'name' => 'Tocadiscos universal',
            'taxclasses_id' => 300,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2672,
            'name' => 'Sistemas de Etiquetado audiovisual',
            'taxclasses_id' => 222,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2673,
            'name' => 'Auriculares de comunicación piezas de recambio y accesorios',
            'taxclasses_id' => 204,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2674,
            'name' => 'Amortiguadores de vibración/amortiguadores',
            'taxclasses_id' => 222,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2675,
            'name' => 'Las estaciones de acoplamiento de MP3.',
            'taxclasses_id' => 222,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2676,
            'name' => 'Grabadores de tarjetas de memoria',
            'taxclasses_id' => 219,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2677,
            'name' => 'Coche Antenas GPS',
            'taxclasses_id' => 229,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2678,
            'name' => 'Accesorios de flash de la cámara',
            'taxclasses_id' => 225,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2679,
            'name' => 'Diapositivas fotográficas - piezas de recambio y accesorios',
            'taxclasses_id' => 225,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2680,
            'name' => 'Almacenamiento de diapositivas fotográficas',
            'taxclasses_id' => 225,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2681,
            'name' => 'Pistola de flash de estudio fotográfico',
            'taxclasses_id' => 225,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2682,
            'name' => 'Los cables del ordenador',
            'taxclasses_id' => 369,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2683,
            'name' => 'Filtros de cámara fotográfica',
            'taxclasses_id' => 225,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2684,
            'name' => 'Llaveros',
            'taxclasses_id' => 191,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2685,
            'name' => 'Cables de audio visuales',
            'taxclasses_id' => 369,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2686,
            'name' => 'Cables para telecomunicaciones',
            'taxclasses_id' => 369,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2687,
            'name' => 'Instalación de los cables de satélite',
            'taxclasses_id' => 369,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2688,
            'name' => 'Recepción de satélite accesorios',
            'taxclasses_id' => 224,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2689,
            'name' => 'Los refrigerantes de aire acondicionado',
            'taxclasses_id' => 323,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2690,
            'name' => 'Bolsas de aspirador',
            'taxclasses_id' => 281,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2691,
            'name' => 'Accesorios para consolas',
            'taxclasses_id' => 203,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2692,
            'name' => 'Cajas de Batería',
            'taxclasses_id' => 363,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2693,
            'name' => 'Portátil FM (Frecuencia modulada) transmisores',
            'taxclasses_id' => 220,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2694,
            'name' => 'Tablas de proyección',
            'taxclasses_id' => 178,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2695,
            'name' => 'Carne de vacuno - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2696,
            'name' => 'Bisonte / búfalo - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2697,
            'name' => 'Pollo - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2698,
            'name' => 'Ciervos, aparte de Corzo - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2699,
            'name' => 'Duck - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2700,
            'name' => 'Rana - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2701,
            'name' => 'Cabra - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2702,
            'name' => 'Caballo - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2703,
            'name' => 'Caracol de tierra - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2704,
            'name' => 'Llama / alpaca - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2705,
            'name' => 'Mezclas de Carne / Carne de Ave: Carne Alternativa - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2706,
            'name' => 'Avestruz - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2707,
            'name' => 'Faisán - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2708,
            'name' => 'Cerdo - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2709,
            'name' => 'Conejo - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2710,
            'name' => 'Carne Alternativa / Carne de Ave Especies - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2711,
            'name' => 'Turquía - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2712,
            'name' => 'Ternera - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2713,
            'name' => 'Carne de vacuno - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2714,
            'name' => 'Bisonte / búfalo - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2715,
            'name' => 'Pollo - Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2716,
            'name' => 'Ciervos, aparte de Corzo - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2717,
            'name' => 'Duck - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2718,
            'name' => 'Rana - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2719,
            'name' => 'Cabra - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2720,
            'name' => 'Caballo - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2721,
            'name' => 'Caracol de tierra - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2722,
            'name' => 'Llama / alpaca - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2723,
            'name' => 'Mezclas de Carne - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2724,
            'name' => 'Avestruz - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2725,
            'name' => 'Faisán - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2726,
            'name' => 'Cerdo - Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2727,
            'name' => 'Conejo - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2728,
            'name' => 'Carne Alternativa / Carne de Ave Especies - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2729,
            'name' => 'Turquía - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2730,
            'name' => 'Ternera - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2731,
            'name' => 'La tolva de aire Pistolas pulverizadoras/',
            'taxclasses_id' => 431,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2732,
            'name' => 'Tablas de enrutador',
            'taxclasses_id' => 451,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2733,
            'name' => 'Portable de Megafonía Sistemas de música',
            'taxclasses_id' => 220,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2734,
            'name' => 'Audiogramas',
            'taxclasses_id' => 219,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2735,
            'name' => 'Activa la iluminación de efecto de sonido',
            'taxclasses_id' => 222,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2736,
            'name' => 'Hogar/Oficina de contadores de la barra',
            'taxclasses_id' => 300,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2737,
            'name' => 'Barredoras (sin alimentación)',
            'taxclasses_id' => 281,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2738,
            'name' => 'Rangefinders',
            'taxclasses_id' => 266,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2739,
            'name' => 'Las tarjetas de regalo electrónicas',
            'taxclasses_id' => 172,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2740,
            'name' => 'Scooters (alimentado)',
            'taxclasses_id' => 259,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2741,
            'name' => 'Ciclos (alimentado)',
            'taxclasses_id' => 255,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2742,
            'name' => 'Banners/Banderas decorativas',
            'taxclasses_id' => 314,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2743,
            'name' => 'Bolsas de transporte personal (desechables)',
            'taxclasses_id' => 191,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2744,
            'name' => 'Los calzos en las ruedas (industria automotriz)',
            'taxclasses_id' => 319,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2745,
            'name' => 'Rampas de gestión de carga/rampa de accesorios (industria automotriz)',
            'taxclasses_id' => 319,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2746,
            'name' => 'Banderas de advertencia/Marca personal (industria automotriz)',
            'taxclasses_id' => 324,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2747,
            'name' => 'Manguera protectora puentes (industria automotriz)',
            'taxclasses_id' => 324,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2748,
            'name' => 'Caramelo / Manzanas del caramelo',
            'taxclasses_id' => 61,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2749,
            'name' => 'Sustitutos de la carne (congelada)',
            'taxclasses_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2750,
            'name' => 'Sustitutos de la carne (perecederos)',
            'taxclasses_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2751,
            'name' => 'Sustitutos de la carne (Larga conservación)',
            'taxclasses_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2752,
            'name' => 'Productos a Base de Lácteos / Comidas - No Listo Para Comer / Beber (perecederos)',
            'taxclasses_id' => 71,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2753,
            'name' => 'Productos a Base de Lácteos / Comidas - No Listo Para Comer / Beber (congelados)',
            'taxclasses_id' => 71,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2754,
            'name' => 'Car Audio subwoofers',
            'taxclasses_id' => 230,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2755,
            'name' => 'Los sistemas de antena de satélite/terrestre',
            'taxclasses_id' => 224,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2756,
            'name' => 'Estación vapor planchado',
            'taxclasses_id' => 280,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2757,
            'name' => 'Internet USB Stick',
            'taxclasses_id' => 201,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2758,
            'name' => 'Carne Alternativa / Carne de Ave Salchichas - Preparado / Procesado',
            'taxclasses_id' => 86,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2759,
            'name' => 'Salchichas de Vaca - Preparado / Procesado',
            'taxclasses_id' => 86,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2760,
            'name' => 'Las salchichas de pollo - Preparado / Procesado',
            'taxclasses_id' => 86,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2761,
            'name' => 'Cordero / cordero Salchichas - Preparado / Procesado',
            'taxclasses_id' => 86,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2762,
            'name' => 'Mezclas de Salchichas - Preparado / Procesado',
            'taxclasses_id' => 86,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2763,
            'name' => 'Turquía Salchichas - Preparadas / procesados',
            'taxclasses_id' => 86,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2764,
            'name' => 'Ternera Salchichas - Preparadas / procesados',
            'taxclasses_id' => 86,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2765,
            'name' => 'Centro de Cuidado bucal - Cepillo limpiador//Almacenamiento (alimentado)',
            'taxclasses_id' => 156,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2766,
            'name' => 'Salchichas de Cerdo - Preparado / Procesado',
            'taxclasses_id' => 86,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2767,
            'name' => 'Receptores de audio/visual',
            'taxclasses_id' => 224,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2768,
            'name' => 'Almacenamiento de fotos móvil',
            'taxclasses_id' => 225,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2769,
            'name' => 'Editor de vídeo',
            'taxclasses_id' => 194,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2770,
            'name' => 'Barriles de almacenamiento/Keg (vacío)',
            'taxclasses_id' => 492,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2771,
            'name' => 'Los bidones de almacenamiento (vacío)',
            'taxclasses_id' => 492,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2772,
            'name' => 'Cajas de almacenamiento/transporte (vacío)',
            'taxclasses_id' => 493,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2773,
            'name' => 'Cajas de almacenamiento/transporte (vacío)',
            'taxclasses_id' => 493,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2774,
            'name' => 'Bandejas de almacenamiento/transporte (vacío)',
            'taxclasses_id' => 493,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2775,
            'name' => 'Frascos de almacenamiento (vacío)',
            'taxclasses_id' => 491,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2776,
            'name' => 'Los cilindros de almacenamiento portátil (vacío)',
            'taxclasses_id' => 491,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2777,
            'name' => 'Tanques de almacenamiento/transporte (vacío)',
            'taxclasses_id' => 494,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2778,
            'name' => 'Palets',
            'taxclasses_id' => 495,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2779,
            'name' => 'Plataformas rodantes de transporte',
            'taxclasses_id' => 495,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2780,
            'name' => 'Hojas de patinaje',
            'taxclasses_id' => 495,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2781,
            'name' => 'Convertidores de palet/fotogramas',
            'taxclasses_id' => 495,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2782,
            'name' => 'Los racks',
            'taxclasses_id' => 495,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2783,
            'name' => 'Océano Contenedores Intermodales (vacío)',
            'taxclasses_id' => 494,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2784,
            'name' => 'Contenedores de Carga de aire (vacío)',
            'taxclasses_id' => 494,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2785,
            'name' => 'Contenedores a granel flexible (vacío)',
            'taxclasses_id' => 494,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2786,
            'name' => 'Los recipientes intermedios para graneles rígido (vacío)',
            'taxclasses_id' => 494,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2787,
            'name' => 'Kits de prueba de retorno',
            'taxclasses_id' => 381,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2788,
            'name' => 'Los disyuntores de vacío',
            'taxclasses_id' => 381,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2789,
            'name' => 'El dispositivo antirretorno piezas y accesorios',
            'taxclasses_id' => 381,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2790,
            'name' => 'Contraflujo Preventers',
            'taxclasses_id' => 381,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2791,
            'name' => 'Tubos y Tubos bridas',
            'taxclasses_id' => 379,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2792,
            'name' => 'Parte beber fuentes (impulsado)',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2793,
            'name' => 'Buscadores de espárrago/detectores/sensores',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2794,
            'name' => 'Fishfinders',
            'taxclasses_id' => 268,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2795,
            'name' => 'Chartplotters Electrónica Marina',
            'taxclasses_id' => 481,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2796,
            'name' => 'Software de navegación marina',
            'taxclasses_id' => 481,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2797,
            'name' => 'Los sistemas de radar de navegación marina',
            'taxclasses_id' => 481,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2798,
            'name' => 'Estaciones de Energía Solar',
            'taxclasses_id' => 376,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2799,
            'name' => 'pomelos',
            'taxclasses_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2800,
            'name' => 'Los pomelos',
            'taxclasses_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2801,
            'name' => 'miel Pomelos',
            'taxclasses_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2802,
            'name' => 'sweeties',
            'taxclasses_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2803,
            'name' => 'Minneolas y otros Tangelos',
            'taxclasses_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2804,
            'name' => 'ugli',
            'taxclasses_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2805,
            'name' => 'Limones',
            'taxclasses_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2806,
            'name' => 'Limas mexicanas',
            'taxclasses_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2807,
            'name' => 'Limas',
            'taxclasses_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2808,
            'name' => 'Limequats',
            'taxclasses_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2809,
            'name' => 'clementinas',
            'taxclasses_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2810,
            'name' => 'las mandarinas Satsuma',
            'taxclasses_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2811,
            'name' => 'tangerinas',
            'taxclasses_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2812,
            'name' => 'Naranjas',
            'taxclasses_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2813,
            'name' => 'Libros de ejercicios',
            'taxclasses_id' => 183,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2814,
            'name' => 'Guantes',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2815,
            'name' => 'Los plátanos de apple',
            'taxclasses_id' => 88,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2816,
            'name' => 'plátanos del bebé',
            'taxclasses_id' => 88,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2817,
            'name' => 'Plátanos',
            'taxclasses_id' => 88,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2818,
            'name' => 'Los plátanos de plátano',
            'taxclasses_id' => 88,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2819,
            'name' => 'rojo plátanos',
            'taxclasses_id' => 88,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2820,
            'name' => 'Manzanas',
            'taxclasses_id' => 89,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2821,
            'name' => 'nísperos japoneses',
            'taxclasses_id' => 89,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2822,
            'name' => 'nashi',
            'taxclasses_id' => 89,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2823,
            'name' => 'Peras',
            'taxclasses_id' => 89,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2824,
            'name' => 'albaricoques',
            'taxclasses_id' => 90,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2825,
            'name' => 'Guindas',
            'taxclasses_id' => 90,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2826,
            'name' => 'Sin tallo / cerezas dulces',
            'taxclasses_id' => 90,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2827,
            'name' => 'damsons',
            'taxclasses_id' => 90,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2828,
            'name' => 'mirabelles',
            'taxclasses_id' => 90,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2829,
            'name' => 'nectarinas',
            'taxclasses_id' => 90,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2830,
            'name' => 'Duraznos',
            'taxclasses_id' => 90,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2831,
            'name' => 'Greengages',
            'taxclasses_id' => 90,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2832,
            'name' => 'Las ciruelas japonesas',
            'taxclasses_id' => 90,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2833,
            'name' => 'plumcots',
            'taxclasses_id' => 90,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2834,
            'name' => 'Los híbridos frutas de hueso',
            'taxclasses_id' => 90,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2835,
            'name' => 'ciruelas',
            'taxclasses_id' => 90,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2836,
            'name' => 'Las uvas de mesa',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2837,
            'name' => 'Fresas',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2838,
            'name' => 'Fresas de madera',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2839,
            'name' => 'Moras',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2840,
            'name' => 'Boysenberries',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2841,
            'name' => 'Mora de los pantanos',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2842,
            'name' => 'Frambuesas',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2843,
            'name' => 'arándanos',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2844,
            'name' => 'Arandanos',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2845,
            'name' => 'Arándanos agrios',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2846,
            'name' => 'grosellas',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2847,
            'name' => 'Jostaberries',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2848,
            'name' => 'Piñas',
            'taxclasses_id' => 92,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2849,
            'name' => 'El kiwi',
            'taxclasses_id' => 93,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2850,
            'name' => 'Kiwiberries',
            'taxclasses_id' => 93,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2851,
            'name' => 'chirimoya',
            'taxclasses_id' => 94,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2852,
            'name' => 'Manzanas de azúcar',
            'taxclasses_id' => 94,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2853,
            'name' => 'Bullock Corazones',
            'taxclasses_id' => 94,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2854,
            'name' => 'Guanábana',
            'taxclasses_id' => 94,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2855,
            'name' => 'Frutas del caqui / de Sharon',
            'taxclasses_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2856,
            'name' => 'América del caqui',
            'taxclasses_id' => 96,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2857,
            'name' => 'Barbadines',
            'taxclasses_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2858,
            'name' => 'curubas',
            'taxclasses_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2859,
            'name' => 'granadilla',
            'taxclasses_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2860,
            'name' => 'Maracujas amarillo',
            'taxclasses_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2861,
            'name' => 'púrpura Maracujas',
            'taxclasses_id' => 97,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2862,
            'name' => 'papayas Formosa',
            'taxclasses_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2863,
            'name' => 'babacos',
            'taxclasses_id' => 98,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2864,
            'name' => 'dragonfruits amarillo',
            'taxclasses_id' => 99,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2865,
            'name' => 'dulce Pitayas',
            'taxclasses_id' => 99,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2866,
            'name' => 'fechas',
            'taxclasses_id' => 100,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2867,
            'name' => 'higos',
            'taxclasses_id' => 100,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2868,
            'name' => 'carambola',
            'taxclasses_id' => 100,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2869,
            'name' => 'bilimbi',
            'taxclasses_id' => 100,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2870,
            'name' => 'Lichis (Litchi)',
            'taxclasses_id' => 100,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2871,
            'name' => 'Cabo grosellas',
            'taxclasses_id' => 100,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2872,
            'name' => 'rambután',
            'taxclasses_id' => 100,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2873,
            'name' => 'Tunales (Barbary figuras)',
            'taxclasses_id' => 100,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2874,
            'name' => 'mangostán',
            'taxclasses_id' => 100,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2875,
            'name' => 'mangos',
            'taxclasses_id' => 100,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2876,
            'name' => 'Las granadas',
            'taxclasses_id' => 100,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2877,
            'name' => 'Las guayabas',
            'taxclasses_id' => 100,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2878,
            'name' => 'durian',
            'taxclasses_id' => 100,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2879,
            'name' => 'las frutas de pan',
            'taxclasses_id' => 100,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2880,
            'name' => 'jackfruits',
            'taxclasses_id' => 100,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2881,
            'name' => 'Frijoles / cera franceses',
            'taxclasses_id' => 114,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2882,
            'name' => 'Judías verdes',
            'taxclasses_id' => 114,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2883,
            'name' => 'Habas',
            'taxclasses_id' => 114,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2884,
            'name' => 'canavalia',
            'taxclasses_id' => 114,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2885,
            'name' => 'Habas',
            'taxclasses_id' => 114,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2886,
            'name' => 'Chícharos',
            'taxclasses_id' => 115,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2887,
            'name' => 'Guisantes',
            'taxclasses_id' => 115,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2888,
            'name' => 'algarrobas',
            'taxclasses_id' => 111,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2889,
            'name' => 'Coliflor',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2890,
            'name' => 'Brócoli',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2891,
            'name' => 'Coles de Bruselas',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2892,
            'name' => 'Coles rojas',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2893,
            'name' => 'Coles blancas',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2894,
            'name' => 'Savoy Coles',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2895,
            'name' => 'Ajo',
            'taxclasses_id' => 103,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2896,
            'name' => 'El ajo elefante',
            'taxclasses_id' => 103,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2897,
            'name' => 'Primavera (o español) Cebollas',
            'taxclasses_id' => 103,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2898,
            'name' => 'Cebollas',
            'taxclasses_id' => 103,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2899,
            'name' => 'Kurrat',
            'taxclasses_id' => 103,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2900,
            'name' => 'chalotes',
            'taxclasses_id' => 103,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2901,
            'name' => 'Pepinos',
            'taxclasses_id' => 107,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2902,
            'name' => 'calabacines',
            'taxclasses_id' => 108,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2903,
            'name' => 'Setas de cardo',
            'taxclasses_id' => 117,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2904,
            'name' => 'morillas',
            'taxclasses_id' => 117,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2905,
            'name' => 'rebozuelos',
            'taxclasses_id' => 117,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2906,
            'name' => 'Setas shiitake',
            'taxclasses_id' => 117,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2907,
            'name' => 'Cep',
            'taxclasses_id' => 117,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2908,
            'name' => 'trufas',
            'taxclasses_id' => 117,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2909,
            'name' => 'sandías',
            'taxclasses_id' => 109,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2910,
            'name' => 'Calabazas / calabaza de invierno',
            'taxclasses_id' => 110,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2911,
            'name' => 'ramsons',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2912,
            'name' => 'Albahaca',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2913,
            'name' => 'Santa albahaca',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2914,
            'name' => 'Americana albahaca',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2915,
            'name' => 'La artemisa',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2916,
            'name' => 'Satureja hortensis',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2917,
            'name' => 'Satureja Montana',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2918,
            'name' => 'Borraja',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2919,
            'name' => 'Berro',
            'taxclasses_id' => 137,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2920,
            'name' => 'eneldo',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2921,
            'name' => 'Arcángel',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2922,
            'name' => 'Estragón',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2923,
            'name' => 'Hinojo (subespecie dulce)',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2924,
            'name' => 'Perifollo',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2925,
            'name' => 'Cilantro',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2926,
            'name' => 'El mastuerzo',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2927,
            'name' => 'Alcaravea',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2928,
            'name' => 'lovage',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2929,
            'name' => 'Laurel',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2930,
            'name' => 'Mejorana',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2931,
            'name' => 'pot mejorana',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2932,
            'name' => 'Bálsamo',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2933,
            'name' => 'Menta',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2934,
            'name' => 'manzana menta',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2935,
            'name' => 'Menta verde',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2936,
            'name' => 'dulce Cicely',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2937,
            'name' => 'Orégano',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2938,
            'name' => 'Perejil italiano',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2939,
            'name' => 'Raiz de PEREJIL',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2940,
            'name' => 'Burnet Saxifraga',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2941,
            'name' => 'Romero',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2942,
            'name' => 'cebollino',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2943,
            'name' => 'El tomillo común',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2944,
            'name' => 'Tomillo limón',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2945,
            'name' => 'Hisopo',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2946,
            'name' => 'Verbena de limón',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2947,
            'name' => 'La lechuga de cabeza (Butterhead)',
            'taxclasses_id' => 135,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2948,
            'name' => 'Romaine (Cos) Lechuga',
            'taxclasses_id' => 135,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2949,
            'name' => 'corderos lechuga',
            'taxclasses_id' => 137,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2950,
            'name' => 'Cohete',
            'taxclasses_id' => 137,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2951,
            'name' => 'Diente Diente de león Verdes / de León',
            'taxclasses_id' => 137,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2952,
            'name' => 'Alazán',
            'taxclasses_id' => 137,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2953,
            'name' => 'espinaca',
            'taxclasses_id' => 138,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2954,
            'name' => 'Verdolaga',
            'taxclasses_id' => 137,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2955,
            'name' => 'Witloof (endivia)',
            'taxclasses_id' => 134,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2956,
            'name' => 'achicoria Rosso',
            'taxclasses_id' => 134,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2957,
            'name' => 'Pan de Azucar',
            'taxclasses_id' => 134,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2958,
            'name' => 'Endivia (Crespo)',
            'taxclasses_id' => 134,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2959,
            'name' => 'Alargadas pimientos dulces (puntas)',
            'taxclasses_id' => 105,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2960,
            'name' => 'Pimientos picantes',
            'taxclasses_id' => 105,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2961,
            'name' => 'Patatas',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2962,
            'name' => 'Taro',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2963,
            'name' => 'Mandioca',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2964,
            'name' => 'lila Tiquisque',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2965,
            'name' => 'blanco Tiquisque',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2966,
            'name' => 'Patatas dulces',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2967,
            'name' => 'Batatas',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2968,
            'name' => 'jengibre',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2969,
            'name' => 'Rábanos',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2970,
            'name' => 'Los rábanos negros',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2971,
            'name' => 'Los nabos de mayo',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2972,
            'name' => 'grelos',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2973,
            'name' => 'Los nabos suecos (Rutabagas)',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2974,
            'name' => 'Teltow nabos',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2975,
            'name' => 'Nabos',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2976,
            'name' => 'Raíz de remolacha',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2977,
            'name' => 'Zanahorias',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2978,
            'name' => 'apionabos',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2979,
            'name' => 'Rábano picante',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2980,
            'name' => 'Alcachofas de Jerusalem',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2981,
            'name' => 'chirivía',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2982,
            'name' => 'raíz del perejil',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2983,
            'name' => 'berenjenas',
            'taxclasses_id' => 106,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2984,
            'name' => 'espárragos',
            'taxclasses_id' => 116,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2985,
            'name' => 'Alcachofas',
            'taxclasses_id' => 116,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2986,
            'name' => 'Apio',
            'taxclasses_id' => 116,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2987,
            'name' => 'Puerro',
            'taxclasses_id' => 116,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2988,
            'name' => 'Ruibarbo',
            'taxclasses_id' => 116,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2989,
            'name' => 'Cardos',
            'taxclasses_id' => 116,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2990,
            'name' => 'palmito',
            'taxclasses_id' => 116,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2991,
            'name' => 'Brotes de bambú',
            'taxclasses_id' => 116,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2992,
            'name' => 'Las coles chinas',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2993,
            'name' => 'col rizada',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2994,
            'name' => 'Pak Choi',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2995,
            'name' => 'Colinabo',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2996,
            'name' => 'Maíz dulce',
            'taxclasses_id' => 111,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2997,
            'name' => 'Okra',
            'taxclasses_id' => 111,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2998,
            'name' => 'Endivia (hoja ancha)',
            'taxclasses_id' => 134,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 2999,
            'name' => 'Seta cultivada común (Agaricus)',
            'taxclasses_id' => 117,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3000,
            'name' => 'Frijoles yardlong',
            'taxclasses_id' => 114,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3001,
            'name' => 'La hierba de limón',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3002,
            'name' => 'feijoas',
            'taxclasses_id' => 100,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3003,
            'name' => 'Los tomates cherry - Oblong',
            'taxclasses_id' => 104,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3004,
            'name' => 'Los tomates cherry - Ronda',
            'taxclasses_id' => 104,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3005,
            'name' => 'Tomates - Oblong',
            'taxclasses_id' => 104,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3006,
            'name' => 'Tomates - acanalado',
            'taxclasses_id' => 104,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3007,
            'name' => 'Tomates - Ronda',
            'taxclasses_id' => 104,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3008,
            'name' => 'Paquetes de tomates de variedades',
            'taxclasses_id' => 104,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3009,
            'name' => 'Los aguacates Finger',
            'taxclasses_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3010,
            'name' => 'Los aguacates - Pebbled Peel (Hass-Tipo)',
            'taxclasses_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3011,
            'name' => 'Los aguacates - Peel Smooth',
            'taxclasses_id' => 95,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3012,
            'name' => 'Verduras - Packs no procesados ??no preparadas / (fresca) Variedad',
            'taxclasses_id' => 118,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3013,
            'name' => 'Las frutas no procesadas - Packs no preparadas / (fresca) Variedad',
            'taxclasses_id' => 101,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3014,
            'name' => 'Membrillos',
            'taxclasses_id' => 89,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3015,
            'name' => 'Cuadrados pimientos dulces (Blunt)',
            'taxclasses_id' => 105,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3016,
            'name' => 'Cuadrados se estrecha pimientos dulces (PEG superior)',
            'taxclasses_id' => 105,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3017,
            'name' => 'Pimientos aplastados (tomate Pimientos)',
            'taxclasses_id' => 105,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3018,
            'name' => 'Grosellas rojas',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3019,
            'name' => 'grosellas negras',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3020,
            'name' => 'Paquetes de pimienta Variedades',
            'taxclasses_id' => 105,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3021,
            'name' => 'romanesco',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3022,
            'name' => 'col puntiaguda',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3023,
            'name' => 'Perejil (Crespo)',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3024,
            'name' => 'Perejil (plana)',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3025,
            'name' => 'scorzonera',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3026,
            'name' => 'Test de pantalla (cosméticos)',
            'taxclasses_id' => 148,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3027,
            'name' => 'Dentro de la Shell Los huevos recién puestos',
            'taxclasses_id' => 39,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3028,
            'name' => 'En Shell-A cuadros / sucio de los huevos',
            'taxclasses_id' => 39,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3029,
            'name' => 'Extractos huevos',
            'taxclasses_id' => 39,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3030,
            'name' => 'En la Tabla Shell Eggs',
            'taxclasses_id' => 40,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3031,
            'name' => 'Los huevos cocinados de forma individual',
            'taxclasses_id' => 40,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3032,
            'name' => 'Huevos Productos / Sustitutos',
            'taxclasses_id' => 40,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3033,
            'name' => 'huevos Imitaciones',
            'taxclasses_id' => 40,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3034,
            'name' => 'Extractos / Condimentos / potenciadores del sabor (Larga conservación)',
            'taxclasses_id' => 49,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3035,
            'name' => 'Dispensadores para productos de higiene y limpieza',
            'taxclasses_id' => 16,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3036,
            'name' => 'Sopas preparadas - Surtidos',
            'taxclasses_id' => 60,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3037,
            'name' => 'Sandwiches / Panecillos / Packs Wraps Variedades',
            'taxclasses_id' => 64,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3038,
            'name' => 'Leche de soja o arroz Maker',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3039,
            'name' => 'Pasta / Tallarines Variety Packs',
            'taxclasses_id' => 65,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3040,
            'name' => 'Desinfección de gabinete',
            'taxclasses_id' => 281,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3041,
            'name' => 'Productos a base de verduras / Comidas Surtidos',
            'taxclasses_id' => 67,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3042,
            'name' => 'Productos a base de masa / Comidas Surtidos',
            'taxclasses_id' => 69,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3043,
            'name' => 'Signos, preimpreso',
            'taxclasses_id' => 208,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3044,
            'name' => 'Los signos, sin imprimir',
            'taxclasses_id' => 208,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3045,
            'name' => 'Signos, Combinación',
            'taxclasses_id' => 208,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3046,
            'name' => 'Firmar los titulares',
            'taxclasses_id' => 208,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3047,
            'name' => 'Señal - accesorio o pieza de repuesto',
            'taxclasses_id' => 208,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3048,
            'name' => 'Productos a base de granos / Comidas Surtidos',
            'taxclasses_id' => 68,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3049,
            'name' => 'De Lácteos / Huevos Productos a base de Comidas / Surtidos',
            'taxclasses_id' => 71,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3050,
            'name' => 'Paquetes de sustitutos de la carne Variedades',
            'taxclasses_id' => 72,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3051,
            'name' => 'Los postes',
            'taxclasses_id' => 488,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3052,
            'name' => 'Secadores de mano',
            'taxclasses_id' => 374,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3053,
            'name' => 'Tratamientos de alimentos',
            'taxclasses_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3054,
            'name' => 'Desinfectantes para',
            'taxclasses_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3055,
            'name' => 'Juego de ordenador/Vídeo Digital - Software para juegos',
            'taxclasses_id' => 197,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3056,
            'name' => 'Los programas informáticos (no juegos) - Digital',
            'taxclasses_id' => 197,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3057,
            'name' => 'Software GPS - Mobile Communications - Digital',
            'taxclasses_id' => 206,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3058,
            'name' => 'Teléfono móvil de Software - Digital',
            'taxclasses_id' => 206,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3059,
            'name' => 'Música - Digital',
            'taxclasses_id' => 232,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3060,
            'name' => '(Audio Digital - Non-Music)',
            'taxclasses_id' => 232,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3061,
            'name' => 'Películas - Digital',
            'taxclasses_id' => 232,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3062,
            'name' => 'Vídeo (Non-Movies) - Digital',
            'taxclasses_id' => 232,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3063,
            'name' => 'Tonos de timbre - Digital',
            'taxclasses_id' => 232,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3064,
            'name' => 'Programas de Televisión: Digital',
            'taxclasses_id' => 232,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3065,
            'name' => 'Gráficos - Digital',
            'taxclasses_id' => 232,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3066,
            'name' => 'Accesorios de penetración (impulsado)',
            'taxclasses_id' => 161,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3067,
            'name' => 'Accesorios de penetración (sin alimentación)',
            'taxclasses_id' => 161,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3068,
            'name' => 'Dispositivos de succión (impulsado)',
            'taxclasses_id' => 161,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3069,
            'name' => 'Dispositivos de succión (sin alimentación)',
            'taxclasses_id' => 161,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3070,
            'name' => 'Cereales - No listo para comer (congelados)',
            'taxclasses_id' => 81,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3071,
            'name' => 'Jugo de vegetales - Listo para Beber (perecederos)',
            'taxclasses_id' => 76,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3072,
            'name' => 'Jugo de vegetales - Listo para Beber (Larga conservación)',
            'taxclasses_id' => 76,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3073,
            'name' => 'Jugo de vegetales - No listo para beber (congelado)',
            'taxclasses_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3074,
            'name' => 'Jugo de vegetales - No listo para beber (Larga conservación)',
            'taxclasses_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3075,
            'name' => 'Las bebidas de jugo de verduras - Listo para Beber (perecederos)',
            'taxclasses_id' => 76,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3076,
            'name' => 'Jugo de Verduras Bebidas - Listo para Beber (Larga conservación)',
            'taxclasses_id' => 76,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3077,
            'name' => 'Jugo de Verduras Bebidas - No listo para beber (Larga conservación)',
            'taxclasses_id' => 77,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3078,
            'name' => 'Pistolas de calafateo (sin tracción)',
            'taxclasses_id' => 384,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3079,
            'name' => 'Las plantas de semillero - Listo para comer',
            'taxclasses_id' => 119,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3080,
            'name' => 'Coles',
            'taxclasses_id' => 119,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3081,
            'name' => 'Flores comestibles',
            'taxclasses_id' => 120,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3082,
            'name' => 'Verduras del Mar de las mareas Otros',
            'taxclasses_id' => 121,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3083,
            'name' => 'haya Setas',
            'taxclasses_id' => 117,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3084,
            'name' => 'enokitake',
            'taxclasses_id' => 117,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3085,
            'name' => 'eryngii',
            'taxclasses_id' => 117,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3086,
            'name' => 'Las setas silvestres (Otro)',
            'taxclasses_id' => 117,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3087,
            'name' => 'Lechuga iceberg',
            'taxclasses_id' => 135,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3088,
            'name' => 'Hojas sueltas / Multileaf Lechuga Otros',
            'taxclasses_id' => 136,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3089,
            'name' => 'Hojas del bebé',
            'taxclasses_id' => 137,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3090,
            'name' => 'Copos de nieve',
            'taxclasses_id' => 115,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3091,
            'name' => 'Garbanzos',
            'taxclasses_id' => 122,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3092,
            'name' => 'Hinojo (subespecies azoricum)',
            'taxclasses_id' => 116,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3093,
            'name' => 'Bebés / Niños - Alimentos Especializados (congelado)',
            'taxclasses_id' => 66,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3094,
            'name' => 'Monitores de aire',
            'taxclasses_id' => 377,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3095,
            'name' => 'Hidratantes After-Sun',
            'taxclasses_id' => 141,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3096,
            'name' => 'Los ordenadores personales - Tabletas/lectores E-Book',
            'taxclasses_id' => 198,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3097,
            'name' => 'Detectores de metales',
            'taxclasses_id' => 427,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3098,
            'name' => 'Cordero - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3099,
            'name' => 'Cordero - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3100,
            'name' => 'Wild Boar - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3101,
            'name' => 'Hare - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3102,
            'name' => 'Antelope - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3103,
            'name' => 'Beefalo / cattalo - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3104,
            'name' => 'Elk / Wapiti - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3105,
            'name' => 'Moose / Elk - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3106,
            'name' => 'Búfalo de agua - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3107,
            'name' => 'Reno / caribú - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3108,
            'name' => 'Emu - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3109,
            'name' => 'Ganso - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3110,
            'name' => 'Las aves de Guinea - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3111,
            'name' => 'Codorniz - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3112,
            'name' => 'Rea - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3113,
            'name' => 'Banqueta / paloma - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3114,
            'name' => 'Cordero - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3115,
            'name' => 'Cordero - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3116,
            'name' => 'Wild Boar - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3117,
            'name' => 'Hare - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3118,
            'name' => 'Antelope - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3119,
            'name' => 'Beefalo / cattalo - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3120,
            'name' => 'Elk / Wapiti - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3121,
            'name' => 'Moose / Elk - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3122,
            'name' => 'Búfalo de agua - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3123,
            'name' => 'Reno / caribú - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3124,
            'name' => 'Emu - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3125,
            'name' => 'Ganso - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3126,
            'name' => 'Las aves de Guinea - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3127,
            'name' => 'Codorniz - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3128,
            'name' => 'Rea - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3129,
            'name' => 'Banqueta / paloma - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3130,
            'name' => 'Sucedáneos del café - Regular (no instantánea)',
            'taxclasses_id' => 74,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3131,
            'name' => 'Sucedáneos del café instantáneo -',
            'taxclasses_id' => 74,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3132,
            'name' => 'Sucedáneos del café - Listo para Beber',
            'taxclasses_id' => 74,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3133,
            'name' => 'Chew de hierbas / Tabaco - No Tabaco',
            'taxclasses_id' => 79,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3134,
            'name' => 'Las adiciones de sopa (congelado)',
            'taxclasses_id' => 60,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3135,
            'name' => 'Las adiciones de sopa (perecederos)',
            'taxclasses_id' => 60,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3136,
            'name' => 'Las adiciones de sopa (Larga conservación)',
            'taxclasses_id' => 60,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3137,
            'name' => 'Mayonesa / Mayonesa Sustitutos (congelado)',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3138,
            'name' => 'Mayonesa / Mayonesa Sustitutos (perecederos)',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3139,
            'name' => 'Mayonesa / Mayonesa Sustitutos (Larga conservación)',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3140,
            'name' => 'Mostaza (congelado)',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3141,
            'name' => 'Mostaza (perecederos)',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3142,
            'name' => 'Mostaza (Larga conservación)',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3143,
            'name' => 'Salsa de tomate / salsa de tomate y Sustitutos (congelado)',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3144,
            'name' => 'Salsa de tomate / salsa de tomate y Sustitutos (Perecedero)',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3145,
            'name' => 'Salsa de tomate / salsa de tomate y Sustitutos (Larga conservación)',
            'taxclasses_id' => 51,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3146,
            'name' => 'Manzana / pera de Bebidas Alcohólicas - Still',
            'taxclasses_id' => 75,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3147,
            'name' => 'Limpiador de filtro de polvo-aire.',
            'taxclasses_id' => 348,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3148,
            'name' => 'Limpiador de filtro de escape',
            'taxclasses_id' => 348,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3149,
            'name' => 'Soporte de pantalla',
            'taxclasses_id' => 306,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3150,
            'name' => 'Los recipientes de comida desechables',
            'taxclasses_id' => 292,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3151,
            'name' => 'Recipientes de alimentos diversos envases desechables',
            'taxclasses_id' => 292,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3152,
            'name' => 'Otros contenedores de alimentos desechables',
            'taxclasses_id' => 292,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3153,
            'name' => 'Anís',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3154,
            'name' => 'arracacha',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3155,
            'name' => 'Frijoles (con alas)',
            'taxclasses_id' => 114,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3156,
            'name' => 'Maíz (India)',
            'taxclasses_id' => 111,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3157,
            'name' => 'Manzanas silvestres',
            'taxclasses_id' => 89,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3158,
            'name' => 'Gai Choy (hojas de mostaza)',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3159,
            'name' => 'calabazas',
            'taxclasses_id' => 110,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3160,
            'name' => 'mostaza negro',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3161,
            'name' => 'Verdes (Texas Mostaza)',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3162,
            'name' => 'Orangelos',
            'taxclasses_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3163,
            'name' => 'jícama frijol',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3164,
            'name' => 'Naranja china',
            'taxclasses_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3165,
            'name' => 'moras',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3166,
            'name' => 'Madrona',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3167,
            'name' => 'otros Melones',
            'taxclasses_id' => 109,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3168,
            'name' => 'El melón amargo',
            'taxclasses_id' => 108,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3169,
            'name' => 'Melón (cuernos)',
            'taxclasses_id' => 109,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3170,
            'name' => 'nombre mapuey',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3171,
            'name' => 'La espinaca de agua / Ong Choy',
            'taxclasses_id' => 138,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3172,
            'name' => 'Sabio',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3173,
            'name' => 'Bayas Saskatoon',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3174,
            'name' => 'Squash (Calabaza)',
            'taxclasses_id' => 108,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3175,
            'name' => 'Squash (Choko)',
            'taxclasses_id' => 108,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3176,
            'name' => 'Squash (OPO)',
            'taxclasses_id' => 108,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3177,
            'name' => 'tomate de árbol',
            'taxclasses_id' => 106,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3178,
            'name' => 'Tamarindo',
            'taxclasses_id' => 114,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3179,
            'name' => 'Aloe vera',
            'taxclasses_id' => 123,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3180,
            'name' => 'Helechos (Canela)',
            'taxclasses_id' => 124,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3181,
            'name' => 'Helechos (Real)',
            'taxclasses_id' => 124,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3182,
            'name' => 'Gobo Raíz / bardana',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3183,
            'name' => 'Raíz de loto',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3184,
            'name' => 'mamey',
            'taxclasses_id' => 125,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3185,
            'name' => 'Okra (chino)',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3186,
            'name' => 'Salsifí',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3187,
            'name' => 'sapotillo',
            'taxclasses_id' => 125,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3188,
            'name' => 'Zapote (Negro)',
            'taxclasses_id' => 125,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3189,
            'name' => 'Zapote (blanco)',
            'taxclasses_id' => 125,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3190,
            'name' => 'Caña de azúcar',
            'taxclasses_id' => 126,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3191,
            'name' => 'Castañas de agua',
            'taxclasses_id' => 127,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3192,
            'name' => 'Motocicletas',
            'taxclasses_id' => 360,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3193,
            'name' => 'Automóviles y camionetas y vehículos utilitarios deportivos y camionetas',
            'taxclasses_id' => 359,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3194,
            'name' => 'Kit de limpieza interior del coche',
            'taxclasses_id' => 320,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3195,
            'name' => 'Protecciones de aparcamiento',
            'taxclasses_id' => 324,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3196,
            'name' => 'Llanta',
            'taxclasses_id' => 339,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3197,
            'name' => 'Pintura automotriz',
            'taxclasses_id' => 320,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3198,
            'name' => 'Inyectores de combustible',
            'taxclasses_id' => 347,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3199,
            'name' => 'Las bujías',
            'taxclasses_id' => 347,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3200,
            'name' => 'Variedad de bujías Packs',
            'taxclasses_id' => 347,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3201,
            'name' => 'Motor de arranque',
            'taxclasses_id' => 356,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3202,
            'name' => 'Batería auxiliar',
            'taxclasses_id' => 356,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3203,
            'name' => 'Pastillas de freno/forro',
            'taxclasses_id' => 358,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3204,
            'name' => 'Disco de freno',
            'taxclasses_id' => 358,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3205,
            'name' => 'Clip del disco de freno',
            'taxclasses_id' => 358,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3206,
            'name' => 'Kit de frenos de tambor',
            'taxclasses_id' => 358,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3207,
            'name' => 'Otras piezas para sistemas de frenos',
            'taxclasses_id' => 358,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3208,
            'name' => 'Tambor de freno/piezas del tambor de freno',
            'taxclasses_id' => 358,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3209,
            'name' => 'Chicle',
            'taxclasses_id' => 47,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3210,
            'name' => 'Scooter (sin alimentación)',
            'taxclasses_id' => 255,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3211,
            'name' => 'Dispositivo anti-robo de ciclo',
            'taxclasses_id' => 255,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3212,
            'name' => 'Corzo - Preparado / Procesado',
            'taxclasses_id' => 84,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3213,
            'name' => 'Corzo - No Preparado / No procesado',
            'taxclasses_id' => 85,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3214,
            'name' => 'Figuras de Acción (sin alimentación)',
            'taxclasses_id' => 453,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3215,
            'name' => 'Figuras de Acción (alimentado)',
            'taxclasses_id' => 453,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3216,
            'name' => 'Figura de acción Accesorios',
            'taxclasses_id' => 454,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3217,
            'name' => 'Las unidades flash USB y unidades de memoria flash',
            'taxclasses_id' => 233,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3218,
            'name' => 'Las herramientas de la chimenea',
            'taxclasses_id' => 376,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3219,
            'name' => 'Rejillas de chimenea',
            'taxclasses_id' => 376,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3220,
            'name' => 'Pantallas de chimenea',
            'taxclasses_id' => 376,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3221,
            'name' => 'Chimenea de almacenamiento de combustible',
            'taxclasses_id' => 376,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3222,
            'name' => 'Montajes de GPS para automóviles y cunas',
            'taxclasses_id' => 229,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3223,
            'name' => 'Puerta/puerta de garaje de piezas de recambio y accesorios',
            'taxclasses_id' => 438,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3224,
            'name' => 'Los ordenadores personales - Todo-en-uno',
            'taxclasses_id' => 198,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3225,
            'name' => 'Tarjetas de presentación (con alimentación)',
            'taxclasses_id' => 178,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3226,
            'name' => 'Gas de dióxido de carbono',
            'taxclasses_id' => 470,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3227,
            'name' => 'Gas nitrógeno.',
            'taxclasses_id' => 470,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3228,
            'name' => 'El gas óxido nitroso',
            'taxclasses_id' => 470,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3229,
            'name' => 'Los gases técnicos Otros',
            'taxclasses_id' => 470,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3230,
            'name' => 'El gas de helio',
            'taxclasses_id' => 470,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3231,
            'name' => 'Níspero',
            'taxclasses_id' => 89,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3232,
            'name' => 'Ya pera (Shandong)',
            'taxclasses_id' => 89,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3233,
            'name' => 'Arrurruz',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3234,
            'name' => 'Rábano blanco (daikon)',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3235,
            'name' => 'Nabo perifollo bulboso',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3236,
            'name' => 'Batavia',
            'taxclasses_id' => 135,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3237,
            'name' => 'Hin Choy',
            'taxclasses_id' => 138,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3238,
            'name' => 'Achicoria (Redloof)',
            'taxclasses_id' => 134,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3239,
            'name' => 'La achicoria común',
            'taxclasses_id' => 134,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3240,
            'name' => 'puntarelle',
            'taxclasses_id' => 134,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3241,
            'name' => 'Lollo Bionda',
            'taxclasses_id' => 136,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3242,
            'name' => 'Lollo Rosso',
            'taxclasses_id' => 136,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3243,
            'name' => 'lechuga hoja de roble',
            'taxclasses_id' => 136,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3244,
            'name' => 'Nueva Zelanda-Espinacas',
            'taxclasses_id' => 138,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3245,
            'name' => 'Las verduras de hoja - Packs no preparadas / Variedades sin procesar',
            'taxclasses_id' => 139,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3246,
            'name' => 'Bayas de Goji',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3247,
            'name' => 'Los híbridos de bayas',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3248,
            'name' => 'El arándano rojo',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3249,
            'name' => 'Las bayas de saúco',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3250,
            'name' => 'Otros Annona',
            'taxclasses_id' => 94,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3251,
            'name' => 'jambolan',
            'taxclasses_id' => 100,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3252,
            'name' => 'Longan (dragones de ojos)',
            'taxclasses_id' => 100,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3253,
            'name' => 'Salak (Serpiente de la fruta)',
            'taxclasses_id' => 100,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3254,
            'name' => 'Casia',
            'taxclasses_id' => 100,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3255,
            'name' => 'Limes indias',
            'taxclasses_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3256,
            'name' => 'King Mandarinas',
            'taxclasses_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3257,
            'name' => 'Mediterráneo (willowleaf) Mandarinas',
            'taxclasses_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3258,
            'name' => 'Los híbridos de mandarina',
            'taxclasses_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3259,
            'name' => 'tangor',
            'taxclasses_id' => 87,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3260,
            'name' => 'Paraguaya',
            'taxclasses_id' => 90,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3261,
            'name' => 'mizuna',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3262,
            'name' => 'Bimi y Otros Brassica se reproduce entre sí',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3263,
            'name' => 'Choi Sum',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3264,
            'name' => 'tatsoi',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3265,
            'name' => 'pepinillos',
            'taxclasses_id' => 107,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3266,
            'name' => 'pepino torcida',
            'taxclasses_id' => 107,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3267,
            'name' => 'Tomatillos',
            'taxclasses_id' => 106,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3268,
            'name' => 'Antroewa',
            'taxclasses_id' => 106,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3269,
            'name' => 'Pepino',
            'taxclasses_id' => 106,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3270,
            'name' => 'lentejas',
            'taxclasses_id' => 115,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3271,
            'name' => 'guisante con alas',
            'taxclasses_id' => 115,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3272,
            'name' => 'Variety Pack hierbas',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3273,
            'name' => 'Hojas de apio',
            'taxclasses_id' => 113,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3274,
            'name' => 'mar Kale',
            'taxclasses_id' => 121,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3275,
            'name' => 'lavanda de mar',
            'taxclasses_id' => 121,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3276,
            'name' => 'glasswort',
            'taxclasses_id' => 121,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3277,
            'name' => 'agretti',
            'taxclasses_id' => 121,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3278,
            'name' => 'Agapanthus - Flores',
            'taxclasses_id' => 496,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3279,
            'name' => 'Alchemilla Mollis - Flores',
            'taxclasses_id' => 497,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3280,
            'name' => 'Alstroemeria - Flores',
            'taxclasses_id' => 498,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3281,
            'name' => 'Anemone coronaria - Flores',
            'taxclasses_id' => 499,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3282,
            'name' => 'El Anturio - Flores',
            'taxclasses_id' => 500,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3283,
            'name' => 'Antirrino Majus - Flores',
            'taxclasses_id' => 501,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3284,
            'name' => 'Aster - Flores',
            'taxclasses_id' => 502,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3285,
            'name' => 'Bouvardia - Flores',
            'taxclasses_id' => 503,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3286,
            'name' => 'Celosia Argentea - Flores',
            'taxclasses_id' => 504,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3287,
            'name' => 'Chamelaucium otros - Flores',
            'taxclasses_id' => 505,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3288,
            'name' => 'Chamelaucium Uncinatum - Flores',
            'taxclasses_id' => 505,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3289,
            'name' => 'Crisantemo - Flores',
            'taxclasses_id' => 506,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3290,
            'name' => 'Cymbidium - Flores',
            'taxclasses_id' => 507,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3291,
            'name' => 'Las flores cortadas variedad Packs',
            'taxclasses_id' => 508,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3292,
            'name' => 'Dalia - Flores',
            'taxclasses_id' => 509,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3293,
            'name' => 'Delphinium - Flores',
            'taxclasses_id' => 510,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3294,
            'name' => 'Dianthus barbatus - Flores',
            'taxclasses_id' => 511,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3295,
            'name' => 'Dianthus otros - Flores',
            'taxclasses_id' => 511,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3296,
            'name' => 'Eryngium - Flores',
            'taxclasses_id' => 512,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3297,
            'name' => 'Eustoma Russellianum - Flores',
            'taxclasses_id' => 513,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3298,
            'name' => 'Fresia - Flores',
            'taxclasses_id' => 514,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3299,
            'name' => 'Gerbera - Flores',
            'taxclasses_id' => 515,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3300,
            'name' => 'Gladiolus - Flores',
            'taxclasses_id' => 516,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3301,
            'name' => 'Gypsophila paniculata - Flores',
            'taxclasses_id' => 517,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3302,
            'name' => 'Helianthus Annuus - Flores',
            'taxclasses_id' => 518,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3303,
            'name' => 'Hippeastrum - Flores',
            'taxclasses_id' => 519,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3304,
            'name' => 'Hyacinthus Orientalis - Flores',
            'taxclasses_id' => 520,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3305,
            'name' => 'Hydrangea macrophylla - Flores',
            'taxclasses_id' => 521,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3306,
            'name' => 'Hypericum Androsaemum - Flores',
            'taxclasses_id' => 522,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3307,
            'name' => 'Hypericum otros - Flores',
            'taxclasses_id' => 522,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3308,
            'name' => 'Hypericum x inodorum - Flores',
            'taxclasses_id' => 522,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3309,
            'name' => 'Ilex Verticillata - Flores',
            'taxclasses_id' => 523,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3310,
            'name' => 'Iris - Flores',
            'taxclasses_id' => 524,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3311,
            'name' => 'Lilium Longiflorum - Flores',
            'taxclasses_id' => 525,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3312,
            'name' => 'Lilium otros - Flores',
            'taxclasses_id' => 525,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3313,
            'name' => 'Limonium otros - Flores',
            'taxclasses_id' => 526,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3314,
            'name' => 'Limonium Sinuatum - Flores',
            'taxclasses_id' => 526,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3315,
            'name' => 'Matthiola incana - Flores',
            'taxclasses_id' => 527,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3316,
            'name' => 'Narciso - Flores',
            'taxclasses_id' => 528,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3317,
            'name' => 'Ornithogalum Saundersiae - Flores',
            'taxclasses_id' => 529,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3318,
            'name' => 'Las Flores cortadas Otras',
            'taxclasses_id' => 530,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3319,
            'name' => 'Paeonia - Flores',
            'taxclasses_id' => 531,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3320,
            'name' => 'Phalaenopsis - Flores',
            'taxclasses_id' => 532,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3321,
            'name' => 'Phlox - Flores',
            'taxclasses_id' => 533,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3322,
            'name' => 'Pittosporum - Flores',
            'taxclasses_id' => 534,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3323,
            'name' => 'Ranunculus Asiaticus - Flores',
            'taxclasses_id' => 535,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3324,
            'name' => 'Ranúnculos otros - Flores',
            'taxclasses_id' => 535,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3325,
            'name' => 'Rosa - Flores',
            'taxclasses_id' => 536,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3326,
            'name' => 'Solidago - Flores',
            'taxclasses_id' => 537,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3327,
            'name' => 'Strelitzia reginae - Flores',
            'taxclasses_id' => 538,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3328,
            'name' => 'Syringa vulgaris - Flores',
            'taxclasses_id' => 539,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3329,
            'name' => 'Tanacetum Parthenium - Flores',
            'taxclasses_id' => 540,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3330,
            'name' => 'Trachelium Caeruleum - Flores',
            'taxclasses_id' => 541,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3331,
            'name' => 'Tulipa - Flores',
            'taxclasses_id' => 542,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3332,
            'name' => 'Vanda - Flores',
            'taxclasses_id' => 543,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3333,
            'name' => 'Veronica - Flores',
            'taxclasses_id' => 544,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3334,
            'name' => 'Viburnum Opulus - Flores',
            'taxclasses_id' => 545,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3335,
            'name' => 'Zantedeschia Aethiopica - Flores',
            'taxclasses_id' => 546,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3336,
            'name' => 'Otros - Zantedeschia Flores cortadas',
            'taxclasses_id' => 546,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3337,
            'name' => 'Agapanthus - Follajes',
            'taxclasses_id' => 547,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3338,
            'name' => 'Corte de Anthurium verdes',
            'taxclasses_id' => 548,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3339,
            'name' => 'Asparagus setaceus - Follajes',
            'taxclasses_id' => 549,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3340,
            'name' => 'Asparagus Umbellatus - Follajes',
            'taxclasses_id' => 549,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3341,
            'name' => 'Aspidistra Elatior - Follajes',
            'taxclasses_id' => 550,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3342,
            'name' => 'Otros - Astilbe Follajes',
            'taxclasses_id' => 551,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3343,
            'name' => 'Brassica oleracea - Follajes',
            'taxclasses_id' => 552,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3344,
            'name' => 'Carthamus tinctorius - Follajes',
            'taxclasses_id' => 553,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3345,
            'name' => 'Corylus Avellana - Follajes',
            'taxclasses_id' => 554,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3346,
            'name' => 'Crocosmia - Follajes',
            'taxclasses_id' => 555,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3347,
            'name' => 'Cucumis - Follajes',
            'taxclasses_id' => 556,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3348,
            'name' => 'Cucurbita maxima - Follajes',
            'taxclasses_id' => 557,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3349,
            'name' => 'Cucurbita otros - Follajes',
            'taxclasses_id' => 557,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3350,
            'name' => 'Cucurbita pepo - Follajes',
            'taxclasses_id' => 557,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3351,
            'name' => 'Cortar paquetes variedad verde',
            'taxclasses_id' => 558,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3352,
            'name' => 'Dracaena Sandiariana - Follajes',
            'taxclasses_id' => 559,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3353,
            'name' => 'Eucalyptus Cinerea - Follajes',
            'taxclasses_id' => 560,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3354,
            'name' => 'Eupatorium Rugosum - Follajes',
            'taxclasses_id' => 561,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3355,
            'name' => 'Fatsia Japonica - Follajes',
            'taxclasses_id' => 562,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3356,
            'name' => 'Gomphocarpus Fruticosus - Follajes',
            'taxclasses_id' => 563,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3357,
            'name' => 'Hydrangea macrophylla - Follajes',
            'taxclasses_id' => 564,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3358,
            'name' => 'Ilex Verticillata - Follajes',
            'taxclasses_id' => 565,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3359,
            'name' => 'Leucadendron - Follajes',
            'taxclasses_id' => 566,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3360,
            'name' => 'Lilium - Follajes',
            'taxclasses_id' => 567,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3361,
            'name' => 'Matthiola incana - Follajes',
            'taxclasses_id' => 568,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3362,
            'name' => 'Monstera - Follajes',
            'taxclasses_id' => 569,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3363,
            'name' => 'Otros follajes',
            'taxclasses_id' => 570,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3364,
            'name' => ' Cortar césped Panicum',
            'taxclasses_id' => 571,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3365,
            'name' => 'Physalis Alkekengi - Follajes',
            'taxclasses_id' => 572,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3366,
            'name' => 'Pittosporum - Follajes',
            'taxclasses_id' => 573,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3367,
            'name' => 'Quercus rubra - Follajes',
            'taxclasses_id' => 574,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3368,
            'name' => 'Rosa Rose/Hip - Follajes',
            'taxclasses_id' => 575,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3369,
            'name' => 'Ruscus Hypophyllum - Follajes',
            'taxclasses_id' => 576,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3370,
            'name' => 'Salix - Follajes',
            'taxclasses_id' => 577,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3371,
            'name' => 'Setaria Italica - Follajes',
            'taxclasses_id' => 578,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3372,
            'name' => 'Strelitzia reginae - Follajes',
            'taxclasses_id' => 579,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3373,
            'name' => 'Symphoricarpos - Follajes',
            'taxclasses_id' => 580,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3374,
            'name' => 'Syringa vulgaris - Follajes',
            'taxclasses_id' => 581,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3375,
            'name' => 'Thlaspi - Follajes',
            'taxclasses_id' => 582,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3376,
            'name' => 'Viburnum Opulus - Follajes',
            'taxclasses_id' => 583,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3377,
            'name' => 'Zantedeschia Aethiopica - Follajes',
            'taxclasses_id' => 584,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3378,
            'name' => 'Aechmea - Plantas vivas',
            'taxclasses_id' => 585,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3379,
            'name' => 'Aeonium arboreum - Plantas vivas',
            'taxclasses_id' => 586,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3380,
            'name' => 'Agapanthus - Plantas vivas',
            'taxclasses_id' => 587,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3381,
            'name' => 'Alocasia - Plantas vivas',
            'taxclasses_id' => 588,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3382,
            'name' => 'Aloe - Plantas vivas',
            'taxclasses_id' => 589,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3383,
            'name' => 'Alstroemeria - Plantas vivas',
            'taxclasses_id' => 590,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3384,
            'name' => 'Anemone Hupehensis - Plantas vivas',
            'taxclasses_id' => 591,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3385,
            'name' => 'Angelonia - Plantas vivas',
            'taxclasses_id' => 592,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3386,
            'name' => 'Anisodontea Capensis - Plantas vivas',
            'taxclasses_id' => 593,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3387,
            'name' => 'Anthurium plantas vivas',
            'taxclasses_id' => 594,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3388,
            'name' => 'Antirrino Majus - Plantas vivas',
            'taxclasses_id' => 595,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3389,
            'name' => 'Argyranthemum Frutescens - Plantas vivas',
            'taxclasses_id' => 596,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3390,
            'name' => 'Armeria Maritima - Plantas vivas',
            'taxclasses_id' => 597,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3391,
            'name' => 'Aster - Plantas vivas',
            'taxclasses_id' => 598,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3392,
            'name' => 'Astilbe plantas vivas',
            'taxclasses_id' => 599,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3393,
            'name' => 'Aubrieta Gracilis - Plantas vivas',
            'taxclasses_id' => 600,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3394,
            'name' => 'Begonia - Plantas vivas',
            'taxclasses_id' => 601,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3395,
            'name' => 'Bellis perennis - Plantas vivas',
            'taxclasses_id' => 602,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3396,
            'name' => 'Bidens - Plantas vivas',
            'taxclasses_id' => 603,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3397,
            'name' => 'Bugambilias - Plantas vivas',
            'taxclasses_id' => 604,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3398,
            'name' => 'Brachyscome Multifida - Plantas vivas',
            'taxclasses_id' => 605,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3399,
            'name' => 'Brassica - Plantas vivas',
            'taxclasses_id' => 606,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3400,
            'name' => 'Bromelia - Plantas vivas',
            'taxclasses_id' => 607,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3401,
            'name' => 'Brugmansia - Plantas vivas',
            'taxclasses_id' => 608,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3402,
            'name' => 'Calathea - Plantas vivas',
            'taxclasses_id' => 609,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3403,
            'name' => 'Calibrachoa - Plantas vivas',
            'taxclasses_id' => 610,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3404,
            'name' => 'Calocephalus Brownii - Plantas vivas',
            'taxclasses_id' => 611,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3405,
            'name' => 'Campanula Portenschlagiana - Plantas vivas',
            'taxclasses_id' => 612,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3406,
            'name' => 'Canna - Plantas vivas',
            'taxclasses_id' => 613,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3407,
            'name' => 'Celosía - Plantas vivas',
            'taxclasses_id' => 614,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3408,
            'name' => 'Chamaedorea elegans - Plantas vivas',
            'taxclasses_id' => 615,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3409,
            'name' => 'Chlorophytum Comosum - Plantas vivas',
            'taxclasses_id' => 616,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3410,
            'name' => 'Crisantemo - Plantas vivas',
            'taxclasses_id' => 617,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3411,
            'name' => 'Clivia Miniata - Plantas vivas',
            'taxclasses_id' => 618,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3412,
            'name' => 'Cocos nucifera - Plantas vivas',
            'taxclasses_id' => 619,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3413,
            'name' => 'Codiaeum variegatum - Plantas vivas',
            'taxclasses_id' => 620,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3414,
            'name' => 'plantas vivas Cordyline Australis.',
            'taxclasses_id' => 621,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3415,
            'name' => 'Coreopsis grandiflora - Plantas vivas',
            'taxclasses_id' => 622,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3416,
            'name' => 'Cortaderia selloana - Plantas vivas',
            'taxclasses_id' => 623,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3417,
            'name' => 'Cosmos bipinnatus - Plantas vivas',
            'taxclasses_id' => 624,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3418,
            'name' => 'Cuphea hyssopifolia - Plantas vivas',
            'taxclasses_id' => 625,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3419,
            'name' => 'Cupressus macrocarpa - Plantas vivas',
            'taxclasses_id' => 626,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3420,
            'name' => 'Curcuma Alismatifolia - Plantas vivas',
            'taxclasses_id' => 627,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3421,
            'name' => 'Cycas revoluta - Plantas vivas',
            'taxclasses_id' => 628,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3422,
            'name' => 'Cyclamen persicum - Plantas vivas',
            'taxclasses_id' => 629,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3423,
            'name' => 'Cymbidium - Plantas vivas',
            'taxclasses_id' => 630,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3424,
            'name' => 'Cyperus Alternifolius - Plantas vivas',
            'taxclasses_id' => 631,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3425,
            'name' => 'Dalia - Plantas vivas',
            'taxclasses_id' => 632,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3426,
            'name' => 'Delphinium - Plantas vivas',
            'taxclasses_id' => 633,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3427,
            'name' => 'Dendrobium nobile - Plantas vivas',
            'taxclasses_id' => 634,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3428,
            'name' => 'Dianthus - Plantas vivas',
            'taxclasses_id' => 635,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3429,
            'name' => 'Dicentra spectabilis - Plantas vivas',
            'taxclasses_id' => 636,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3430,
            'name' => 'Dieffenbachia - Plantas vivas',
            'taxclasses_id' => 637,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3431,
            'name' => 'Dorotheanthus Bellidiformis - Plantas vivas',
            'taxclasses_id' => 638,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3432,
            'name' => 'Dracaena Marginata - Plantas vivas',
            'taxclasses_id' => 639,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3433,
            'name' => 'Dypsis lutescens - Plantas vivas',
            'taxclasses_id' => 640,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3434,
            'name' => 'Echeveria - Plantas vivas',
            'taxclasses_id' => 641,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3435,
            'name' => 'Echinacea Purpurea - Plantas vivas',
            'taxclasses_id' => 642,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3436,
            'name' => 'Epipremnum Pinnatum - Plantas vivas',
            'taxclasses_id' => 643,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3437,
            'name' => 'Euphorbia pulcherrima plantas vivas',
            'taxclasses_id' => 644,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3438,
            'name' => 'Euryops - Plantas vivas',
            'taxclasses_id' => 645,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3439,
            'name' => 'Fargesia Murieliae - Plantas vivas',
            'taxclasses_id' => 646,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3440,
            'name' => 'Felicia Amelloides - Plantas vivas',
            'taxclasses_id' => 647,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3441,
            'name' => 'Festuca glauca - Plantas vivas',
            'taxclasses_id' => 648,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3442,
            'name' => 'Fittonia - Plantas vivas',
            'taxclasses_id' => 649,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3443,
            'name' => 'Fuchsia - Plantas vivas',
            'taxclasses_id' => 650,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3444,
            'name' => 'Gardenia Jasminoides - Plantas vivas',
            'taxclasses_id' => 651,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3445,
            'name' => 'Gaura Lindheimeri - Plantas vivas',
            'taxclasses_id' => 652,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3446,
            'name' => 'Gazania - Plantas vivas',
            'taxclasses_id' => 653,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3447,
            'name' => 'Gentiana - Plantas vivas',
            'taxclasses_id' => 654,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3448,
            'name' => 'Gerbera - Plantas vivas',
            'taxclasses_id' => 655,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3449,
            'name' => 'Guzmania - Plantas vivas',
            'taxclasses_id' => 656,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3450,
            'name' => 'Gypsophila Muralis - Plantas vivas',
            'taxclasses_id' => 657,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3451,
            'name' => 'Ficus benjamina - Plantas vivas',
            'taxclasses_id' => 658,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3452,
            'name' => 'Hedera helix - Plantas vivas',
            'taxclasses_id' => 659,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3453,
            'name' => 'Helianthus Annuus - Plantas vivas',
            'taxclasses_id' => 660,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3454,
            'name' => 'Helichrysum Petiolare - Plantas vivas',
            'taxclasses_id' => 661,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3455,
            'name' => 'Heliotropium - Plantas vivas',
            'taxclasses_id' => 662,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3456,
            'name' => 'Helleborus Niger - Plantas vivas',
            'taxclasses_id' => 663,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3457,
            'name' => 'Heuchera - Plantas vivas',
            'taxclasses_id' => 664,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3458,
            'name' => 'Hibiscus Rosa-Sinensis - Plantas vivas',
            'taxclasses_id' => 665,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3459,
            'name' => 'Hippeastrum - Plantas vivas',
            'taxclasses_id' => 666,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3460,
            'name' => 'Hordeum - Plantas vivas',
            'taxclasses_id' => 667,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3461,
            'name' => 'Hosta - Plantas vivas',
            'taxclasses_id' => 668,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3462,
            'name' => 'plantas vivas Howea Forsteriana',
            'taxclasses_id' => 669,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3463,
            'name' => 'Hyacinthus Orientalis - Plantas vivas',
            'taxclasses_id' => 670,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3464,
            'name' => 'Hydrangea macrophylla - Plantas vivas',
            'taxclasses_id' => 671,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3465,
            'name' => 'Impatiens - Plantas vivas',
            'taxclasses_id' => 672,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3466,
            'name' => 'Jasminum Polyanthum - Plantas vivas',
            'taxclasses_id' => 673,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3467,
            'name' => 'Kalanchoe Blossfeldiana - Plantas vivas',
            'taxclasses_id' => 674,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3468,
            'name' => 'Lantana camara - Plantas vivas',
            'taxclasses_id' => 675,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3469,
            'name' => 'Leucanthemum - Plantas vivas',
            'taxclasses_id' => 676,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3470,
            'name' => 'Lewisia cotyledon - Plantas vivas',
            'taxclasses_id' => 677,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3471,
            'name' => 'Lilium - Plantas vivas',
            'taxclasses_id' => 678,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3472,
            'name' => 'Lithodora Diffusa - Plantas vivas',
            'taxclasses_id' => 679,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3473,
            'name' => 'Live Packs de Variedades Vegetales',
            'taxclasses_id' => 680,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3474,
            'name' => 'Plantas vivas Livistona Rotundifolia -',
            'taxclasses_id' => 681,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3475,
            'name' => 'Lobelia Erinus - Plantas vivas',
            'taxclasses_id' => 682,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3476,
            'name' => 'Lotus corniculatus - Plantas vivas',
            'taxclasses_id' => 683,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3477,
            'name' => 'Lupinus - Plantas vivas',
            'taxclasses_id' => 684,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3478,
            'name' => 'Mandevilla - Plantas vivas',
            'taxclasses_id' => 685,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3479,
            'name' => 'Medinilla Magnifica - Plantas vivas',
            'taxclasses_id' => 686,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3480,
            'name' => 'Miltonia - Plantas vivas',
            'taxclasses_id' => 687,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3481,
            'name' => 'Muscari - Plantas vivas',
            'taxclasses_id' => 688,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3482,
            'name' => 'Myosotis sylvatica - Plantas vivas',
            'taxclasses_id' => 689,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3483,
            'name' => 'Narciso - Plantas vivas',
            'taxclasses_id' => 690,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3484,
            'name' => 'Nephrolepis Exaltata - Plantas vivas',
            'taxclasses_id' => 691,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3485,
            'name' => 'Nolina Recurvata - Plantas vivas',
            'taxclasses_id' => 692,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3486,
            'name' => 'Nymphaea - Plantas vivas',
            'taxclasses_id' => 693,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3487,
            'name' => 'Oncidium - Plantas vivas',
            'taxclasses_id' => 694,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3488,
            'name' => 'Orquídea - Plantas vivas',
            'taxclasses_id' => 695,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3489,
            'name' => 'Ornithogalum Thyrsoides - Plantas vivas',
            'taxclasses_id' => 696,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3490,
            'name' => 'Osteospermum plantas vivas',
            'taxclasses_id' => 697,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3491,
            'name' => 'Suculentas y cactus, plantas vivas Otros',
            'taxclasses_id' => 698,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3492,
            'name' => 'Los helechos - Plantas vivas Otros',
            'taxclasses_id' => 698,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3493,
            'name' => 'Hierbas - Plantas vivas Otros',
            'taxclasses_id' => 698,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3494,
            'name' => 'Hierbas - Plantas vivas Otros',
            'taxclasses_id' => 698,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3495,
            'name' => 'Las plantas vivas Otros',
            'taxclasses_id' => 698,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3496,
            'name' => 'Plantas de agua - Plantas vivas Otros',
            'taxclasses_id' => 698,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3497,
            'name' => 'plantas vivas Pachira aquatica',
            'taxclasses_id' => 699,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3498,
            'name' => 'Paeonia - Plantas vivas',
            'taxclasses_id' => 700,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3499,
            'name' => 'Papaver Nudicaule - Plantas vivas',
            'taxclasses_id' => 701,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3500,
            'name' => 'Paphiopedilum - Plantas vivas',
            'taxclasses_id' => 702,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3501,
            'name' => 'Pelargonium - Plantas vivas',
            'taxclasses_id' => 703,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3502,
            'name' => 'Pennisetum - Plantas vivas',
            'taxclasses_id' => 704,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3503,
            'name' => 'Petunia - Plantas vivas',
            'taxclasses_id' => 705,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3504,
            'name' => 'Phalaenopsis - Plantas vivas',
            'taxclasses_id' => 706,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3505,
            'name' => 'Phlox plantas vivas',
            'taxclasses_id' => 707,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3506,
            'name' => 'Phoenix Roebelenii - Plantas vivas',
            'taxclasses_id' => 708,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3507,
            'name' => 'Platycodon Grandiflorus - Plantas vivas',
            'taxclasses_id' => 709,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3508,
            'name' => 'Plectranthus plantas vivas',
            'taxclasses_id' => 710,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3509,
            'name' => 'Portulaca - Plantas vivas',
            'taxclasses_id' => 711,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3510,
            'name' => 'Primula - Plantas vivas',
            'taxclasses_id' => 712,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3511,
            'name' => 'Ranúnculos - Plantas vivas',
            'taxclasses_id' => 713,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3512,
            'name' => 'Rhipsalidopsis - Plantas vivas',
            'taxclasses_id' => 714,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3513,
            'name' => 'Rhododendron - Plantas vivas',
            'taxclasses_id' => 715,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3514,
            'name' => 'Saintpaulia - Plantas vivas',
            'taxclasses_id' => 717,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3515,
            'name' => 'Salvia Nemorosa - Plantas vivas',
            'taxclasses_id' => 718,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3516,
            'name' => 'plantas vivas Sansevieria Cylindrica',
            'taxclasses_id' => 719,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3517,
            'name' => 'Sanvitalia Procumbens - Plantas vivas',
            'taxclasses_id' => 720,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3518,
            'name' => 'Saxifraga plantas vivas',
            'taxclasses_id' => 721,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3519,
            'name' => 'Schefflera Arboricola - Plantas vivas',
            'taxclasses_id' => 722,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3520,
            'name' => 'Schlumbergera - Plantas vivas',
            'taxclasses_id' => 723,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3521,
            'name' => 'Sedum - Plantas vivas',
            'taxclasses_id' => 724,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3522,
            'name' => 'Sempervivum - Plantas vivas',
            'taxclasses_id' => 725,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3523,
            'name' => 'Senecio Maritima - Plantas vivas',
            'taxclasses_id' => 726,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3524,
            'name' => 'Sinningia plantas vivas',
            'taxclasses_id' => 727,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3525,
            'name' => 'Solanum Rantonnetii - Plantas vivas',
            'taxclasses_id' => 728,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3526,
            'name' => 'Spathiphyllum plantas vivas',
            'taxclasses_id' => 729,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3527,
            'name' => 'Stephanotis Floribunda - Plantas vivas',
            'taxclasses_id' => 730,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3528,
            'name' => 'Sutera Cordata - Plantas vivas',
            'taxclasses_id' => 731,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3529,
            'name' => 'Tagetes - Plantas vivas',
            'taxclasses_id' => 732,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3530,
            'name' => 'Tillandsia Cyanea - Plantas vivas',
            'taxclasses_id' => 733,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3531,
            'name' => 'Tulipa - Plantas vivas',
            'taxclasses_id' => 734,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3532,
            'name' => 'Vanda - Plantas vivas',
            'taxclasses_id' => 735,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3533,
            'name' => 'Verbena - Plantas vivas',
            'taxclasses_id' => 736,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3534,
            'name' => 'Viola - Plantas vivas',
            'taxclasses_id' => 737,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3535,
            'name' => 'Vriesea - Plantas vivas',
            'taxclasses_id' => 738,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3536,
            'name' => 'Xburrageara - Plantas vivas',
            'taxclasses_id' => 739,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3537,
            'name' => 'Xcitrofortunella Microcarpa - Plantas vivas',
            'taxclasses_id' => 740,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3538,
            'name' => 'Yuca - Plantas vivas',
            'taxclasses_id' => 741,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3539,
            'name' => 'Zamioculcas Zamiifolia - Plantas vivas',
            'taxclasses_id' => 742,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3540,
            'name' => 'Zantedeschia - Plantas vivas',
            'taxclasses_id' => 743,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3541,
            'name' => 'Rosa - Plantas vivas',
            'taxclasses_id' => 716,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3542,
            'name' => 'Subproductos lácteos',
            'taxclasses_id' => 41,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3543,
            'name' => 'Cigarrillos electrónicos',
            'taxclasses_id' => 79,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3544,
            'name' => 'Accesorios de cigarrillos electrónicos',
            'taxclasses_id' => 79,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3545,
            'name' => 'Encimeras de granito/',
            'taxclasses_id' => 300,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3546,
            'name' => 'Césped/Jardín / insecticidas pesticidas',
            'taxclasses_id' => 407,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3547,
            'name' => 'Reguladores de crecimiento de plantas',
            'taxclasses_id' => 407,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3548,
            'name' => 'Protección de semillas/ mordientes',
            'taxclasses_id' => 407,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3549,
            'name' => 'Combinación de cocina de fusión/mezcla/picado electrodomésticos',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3550,
            'name' => 'Cocina Slicing Electrodomésticos',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3551,
            'name' => 'Picado de aparatos de cocina',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3552,
            'name' => 'Aparatos de mezcla de cocina',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3553,
            'name' => 'Aparatos de cocina fusión',
            'taxclasses_id' => 279,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3554,
            'name' => 'Pastel Pastel / Maker',
            'taxclasses_id' => 278,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3555,
            'name' => 'Fumadores - Cocinar (alimentado)',
            'taxclasses_id' => 412,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3556,
            'name' => 'Fumadores - Cocinar (sin alimentación)',
            'taxclasses_id' => 412,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3557,
            'name' => 'Relojes inteligentes',
            'taxclasses_id' => 198,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3558,
            'name' => 'Grabador de vídeo personal',
            'taxclasses_id' => 194,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3559,
            'name' => 'Voz, teclado y ratón (KVM) interruptor',
            'taxclasses_id' => 200,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3560,
            'name' => 'Doodles / Puffs',
            'taxclasses_id' => 61,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3561,
            'name' => 'Palillos de la sal / Mini Pretzels',
            'taxclasses_id' => 61,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3562,
            'name' => 'Ready-Made comidas de combinación - No Listo Para Comer (congelado)',
            'taxclasses_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3563,
            'name' => 'Las comidas ya preparadas combinados - No Listo Para Comer (perecederos)',
            'taxclasses_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3564,
            'name' => 'Las comidas de combinación ya hecho - No Listo Para Comer (Larga conservación)',
            'taxclasses_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3565,
            'name' => 'Las comidas de combinación ya hechas - Listo para comer (perecederos)',
            'taxclasses_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3566,
            'name' => 'Las comidas de combinación ya hechas - Listo para comer (Larga conservación)',
            'taxclasses_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3567,
            'name' => 'Las comidas de combinación ya hechas - Listo para comer Surtidos',
            'taxclasses_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3568,
            'name' => 'Ready-Made comidas de combinación - No listo para comer Surtidos',
            'taxclasses_id' => 73,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3569,
            'name' => 'Lotería y tarjetas de rascar',
            'taxclasses_id' => 464,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3570,
            'name' => 'Quark productos (congelado)',
            'taxclasses_id' => 42,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3571,
            'name' => 'Quark productos (perecederos)',
            'taxclasses_id' => 42,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3572,
            'name' => 'Quark productos (Larga conservación)',
            'taxclasses_id' => 42,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3573,
            'name' => 'Bayas de Acai',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3574,
            'name' => 'Naranjilla / Lulo',
            'taxclasses_id' => 106,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3575,
            'name' => 'celtuce',
            'taxclasses_id' => 140,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3576,
            'name' => 'Ramos de rosas',
            'taxclasses_id' => 749,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3577,
            'name' => 'Ramos de clavel',
            'taxclasses_id' => 749,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3578,
            'name' => 'Clavel miniatura Bouquets',
            'taxclasses_id' => 749,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3579,
            'name' => 'Lily Ramos',
            'taxclasses_id' => 749,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3580,
            'name' => 'Pompon Crisantemo Bouquets',
            'taxclasses_id' => 749,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3581,
            'name' => 'Alstroemeria Bouquets',
            'taxclasses_id' => 749,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3582,
            'name' => 'Ramos de flores tropicales.',
            'taxclasses_id' => 749,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3583,
            'name' => 'Ramos mixtos',
            'taxclasses_id' => 749,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3584,
            'name' => 'Otros ramos',
            'taxclasses_id' => 749,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3585,
            'name' => 'Los vehículos todo terreno (ATVs)',
            'taxclasses_id' => 360,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3586,
            'name' => 'Tareas de utilidad de vehículos (UTV)/ Off-Road Vehículos Recreacionales (ROVs)',
            'taxclasses_id' => 360,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3587,
            'name' => 'Plantas - Listo para crecer',
            'taxclasses_id' => 750,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3588,
            'name' => 'Medidor de presión de neumáticos',
            'taxclasses_id' => 339,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3589,
            'name' => 'Medidor de humedad (suelos)',
            'taxclasses_id' => 382,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3590,
            'name' => 'Detector de fugas térmicas',
            'taxclasses_id' => 382,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3591,
            'name' => 'Extractor de polea (mano)',
            'taxclasses_id' => 385,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3592,
            'name' => 'Extractor de polea (impulsado)',
            'taxclasses_id' => 424,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3593,
            'name' => 'Juego de alicates',
            'taxclasses_id' => 389,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3594,
            'name' => 'Fórceps (DIY)',
            'taxclasses_id' => 389,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3595,
            'name' => 'Pistolas de líquido',
            'taxclasses_id' => 404,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3596,
            'name' => 'Las antorchas de gas',
            'taxclasses_id' => 405,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3597,
            'name' => 'Antorchas de soldadura',
            'taxclasses_id' => 405,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3598,
            'name' => 'Grava',
            'taxclasses_id' => 419,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3599,
            'name' => 'Tejuelas de madera - suelo exterior',
            'taxclasses_id' => 423,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3600,
            'name' => 'Mosaicos - suelo exterior',
            'taxclasses_id' => 423,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3601,
            'name' => 'Esmerile azulejos - suelo exterior',
            'taxclasses_id' => 423,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3602,
            'name' => 'Baldosas de piedra natural - suelo exterior',
            'taxclasses_id' => 423,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3603,
            'name' => 'Otros títulos: suelo exterior',
            'taxclasses_id' => 423,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3604,
            'name' => 'Piedras de afrontamiento',
            'taxclasses_id' => 428,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3605,
            'name' => 'Alféizar de ventana',
            'taxclasses_id' => 436,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3606,
            'name' => 'Plancha sobre la cinta de cantear/Bandas',
            'taxclasses_id' => 437,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3607,
            'name' => 'Rieles de montaje.',
            'taxclasses_id' => 445,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3608,
            'name' => 'Bebé Muebles Sanitarios variedad Pack',
            'taxclasses_id' => 315,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3609,
            'name' => 'Bebé Muebles Sanitarios - piezas de recambio',
            'taxclasses_id' => 315,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3610,
            'name' => 'Bebé Muebles Sanitarios - Otros',
            'taxclasses_id' => 315,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3611,
            'name' => 'Deshumidificador de aire - Portátil (sin tracción)',
            'taxclasses_id' => 283,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3612,
            'name' => 'Bebé cubiertos (no desechable)',
            'taxclasses_id' => 289,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3613,
            'name' => 'Variedad de vajilla bebé Packs',
            'taxclasses_id' => 293,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3614,
            'name' => 'Bebé hogar camas/Colchones variedad Pack',
            'taxclasses_id' => 316,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3615,
            'name' => 'Bebé hogar camas/Colchones - piezas de recambio',
            'taxclasses_id' => 316,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3616,
            'name' => 'Bebé hogar camas/Colchones - Otros',
            'taxclasses_id' => 316,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3617,
            'name' => 'Variedad de asientos para bebé hogar Pack',
            'taxclasses_id' => 317,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3618,
            'name' => 'Hogar de asientos para bebé - piezas de recambio',
            'taxclasses_id' => 317,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3619,
            'name' => 'Hogar de asientos para bebé - Otros',
            'taxclasses_id' => 317,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3620,
            'name' => 'Bebé deportistas/Transporte variedad Pack',
            'taxclasses_id' => 270,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3621,
            'name' => 'Bebé deportistas/Transporte - piezas de recambio',
            'taxclasses_id' => 270,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3622,
            'name' => 'Accesorios interiores automotores - Asientos variedad Packs',
            'taxclasses_id' => 325,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3623,
            'name' => 'Variedad de productos de almacenamiento de residuos de envases',
            'taxclasses_id' => 17,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3624,
            'name' => 'Los productos de almacenamiento de residuos - piezas de recambio',
            'taxclasses_id' => 17,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3625,
            'name' => 'Almacenamiento de residuos - Otros productos',
            'taxclasses_id' => 17,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3626,
            'name' => 'Bebé Seguridad/Seguridad/vigilancia - Otros',
            'taxclasses_id' => 490,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3627,
            'name' => 'Pañales y otros accesorios',
            'taxclasses_id' => 158,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3628,
            'name' => 'Pañales/accesorios diversos Packs',
            'taxclasses_id' => 158,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3629,
            'name' => 'Gai Lan',
            'taxclasses_id' => 112,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3630,
            'name' => 'fiddlehead Ferns',
            'taxclasses_id' => 124,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3631,
            'name' => 'Black Eyed Peas',
            'taxclasses_id' => 115,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3632,
            'name' => 'Los no Neteado Melones del cantalupo',
            'taxclasses_id' => 109,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3633,
            'name' => 'Los melones de invierno o melones inodoros',
            'taxclasses_id' => 109,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3634,
            'name' => 'neteado melones',
            'taxclasses_id' => 109,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3635,
            'name' => 'Conomon Melones',
            'taxclasses_id' => 109,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3636,
            'name' => 'pepino armenio',
            'taxclasses_id' => 109,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3637,
            'name' => 'Mumes',
            'taxclasses_id' => 90,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3638,
            'name' => 'Bayas Cinco Flavor',
            'taxclasses_id' => 91,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3639,
            'name' => 'Ginseng',
            'taxclasses_id' => 102,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3640,
            'name' => 'Frijoles adzuki',
            'taxclasses_id' => 114,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3641,
            'name' => 'Los tallos de la patata dulce',
            'taxclasses_id' => 116,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3642,
            'name' => 'Las setas de Lingzhi',
            'taxclasses_id' => 117,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3643,
            'name' => 'Mermeladas / Mermeladas / pastas de frutas (perecederos)',
            'taxclasses_id' => 63,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3644,
            'name' => 'Cables de puente',
            'taxclasses_id' => 339,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3645,
            'name' => 'Titular de neumáticos',
            'taxclasses_id' => 339,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxcategories')->insert([
            'id' => 3646,
            'name' => 'Ropa deportiva - Otros',
            'taxclasses_id' => 213,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

    }
}
