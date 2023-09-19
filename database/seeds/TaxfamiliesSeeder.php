<?php

use Illuminate\Database\Seeder;

class TaxfamiliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taxfamilies')->insert([
            'id' => 1,
            'name' => 'Cuidado de mascotas',
            'taxsegments_id' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 2,
            'name' => 'Comida/bebidas PET',
            'taxsegments_id' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 3,
            'name' => 'Cuidado de mascotas/comida variada Packs',
            'taxsegments_id' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 4,
            'name' => 'Los productos de limpieza.',
            'taxsegments_id' => 2,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 5,
            'name' => 'Plagas de insectos/Control/alergeno',
            'taxsegments_id' => 2,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 6,
            'name' => 'Productos de limpieza/higiene variedad Packs',
            'taxsegments_id' => 2,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 7,
            'name' => 'Suministros de higiene y limpieza',
            'taxsegments_id' => 2,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 8,
            'name' => 'Los productos de gestión de residuos',
            'taxsegments_id' => 2,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 9,
            'name' => 'Frutas / Verduras / Frutos secos / Semillas Preparado / Procesado',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 10,
            'name' => 'Mariscos',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 11,
            'name' => 'Leche / Mantequilla / Crema / Yogur / Queso / Huevos / Sustitutos',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 12,
            'name' => 'Aceites / Grasas Comestibles',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 13,
            'name' => 'Productos de Confitería / Productos edulcorantes',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 14,
            'name' => 'Condimentos / Conservantes / Extractos',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 15,
            'name' => 'Pan / Productos de Panadería',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 16,
            'name' => 'Preparados / Conservados',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 17,
            'name' => 'Bebidas',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 18,
            'name' => 'Tabaco / Accesorios de fumar',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 19,
            'name' => 'Cereales / Granos / Legumbres',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 20,
            'name' => 'Alimentos / Bebidas Packs / Tabaco Variedades',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 21,
            'name' => 'Carnes/Carne de ave',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 22,
            'name' => 'Frutas - Preparado / sin transformar (frescos)',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 23,
            'name' => 'Verduras (no Leaf) - No Preparado / sin transformar (frescos)',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 24,
            'name' => 'Frutas - Preparado / No procesado (congelado)',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 25,
            'name' => 'Verduras - Preparado / No procesado (congelado)',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 26,
            'name' => 'Las frutas - no preparadas / bruto (Larga conservación)',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 27,
            'name' => 'Verduras - no preparadas / bruto (Larga conservación)',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 28,
            'name' => 'Frutos secos / Semillas - No Preparado / No procesado (perecederos)',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 29,
            'name' => 'Frutos secos / Semillas - No Preparado / no procesados ??(Larga conservación)',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 30,
            'name' => 'Hoja Verduras - Preparado / sin transformar (frescos)',
            'taxsegments_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 31,
            'name' => 'Productos para la piel',
            'taxsegments_id' => 4,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 32,
            'name' => 'Productos para el cabello',
            'taxsegments_id' => 4,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 33,
            'name' => 'Cosméticos y fragancias',
            'taxsegments_id' => 4,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 34,
            'name' => 'Productos de higiene personal',
            'taxsegments_id' => 4,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 35,
            'name' => 'Productos para el cuerpo',
            'taxsegments_id' => 4,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 36,
            'name' => 'Belleza/Cuidado Personal/higiene variedad Packs',
            'taxsegments_id' => 4,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 37,
            'name' => 'Intimidad personal',
            'taxsegments_id' => 4,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 38,
            'name' => 'Impreso/textual/Materiales de referencia',
            'taxsegments_id' => 5,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 39,
            'name' => 'Instrumentos musicales y accesorios',
            'taxsegments_id' => 6,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 40,
            'name' => 'Tarjetas de felicitación de envoltura de regalo/suministros/ocasión',
            'taxsegments_id' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 41,
            'name' => 'Papelería/Maquinaria de oficina',
            'taxsegments_id' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 42,
            'name' => 'Papelería/Maquinaria de oficina/ocasión suministros diversos Packs',
            'taxsegments_id' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 43,
            'name' => 'Calzado',
            'taxsegments_id' => 8,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 44,
            'name' => 'Accesorios personales',
            'taxsegments_id' => 9,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 45,
            'name' => 'Ordenadores/Video Juegos',
            'taxsegments_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 46,
            'name' => 'Comunicaciones',
            'taxsegments_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 47,
            'name' => 'Ropa',
            'taxsegments_id' => 12,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 48,
            'name' => 'Equipo Audio Visual',
            'taxsegments_id' => 13,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 49,
            'name' => 'Fotografía/óptica',
            'taxsegments_id' => 13,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 50,
            'name' => 'Electrónica del automóvil',
            'taxsegments_id' => 13,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 51,
            'name' => 'Medios audiovisuales',
            'taxsegments_id' => 13,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 52,
            'name' => 'Audio/Visual Fotografía variedad Packs',
            'taxsegments_id' => 13,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 53,
            'name' => 'Artes/artesanía/suministros de bordado',
            'taxsegments_id' => 14,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 54,
            'name' => 'Equipamiento deportivo',
            'taxsegments_id' => 15,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 55,
            'name' => 'Bebé deportistas/transporte',
            'taxsegments_id' => 15,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 56,
            'name' => 'Ectrodomésticos Principales',
            'taxsegments_id' => 16,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 57,
            'name' => 'Pequeños electrodomésticos',
            'taxsegments_id' => 16,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 58,
            'name' => 'Mercancía de cocina',
            'taxsegments_id' => 17,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 59,
            'name' => 'Camping',
            'taxsegments_id' => 18,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 60,
            'name' => 'Hogar/Muebles de oficina',
            'taxsegments_id' => 19,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 61,
            'name' => 'Muebles de tela/textil',
            'taxsegments_id' => 19,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 62,
            'name' => 'Muebles ornamentales',
            'taxsegments_id' => 19,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 63,
            'name' => 'Muebles de bebé',
            'taxsegments_id' => 19,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 64,
            'name' => 'Accesorios Automoción y mantenimiento',
            'taxsegments_id' => 20,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 65,
            'name' => 'Coches y motos',
            'taxsegments_id' => 20,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 66,
            'name' => 'Conexión eléctrica/distribución',
            'taxsegments_id' => 21,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 67,
            'name' => 'Aparatos de alumbrado eléctrico.',
            'taxsegments_id' => 21,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 68,
            'name' => 'Cableado eléctrico y cableado',
            'taxsegments_id' => 21,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 69,
            'name' => 'Componentes de comunicación electrónica',
            'taxsegments_id' => 21,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 70,
            'name' => 'Hardware eléctrico general',
            'taxsegments_id' => 21,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 71,
            'name' => 'Fontanería/calefacción/ventilación/aire acondicionado',
            'taxsegments_id' => 22,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 72,
            'name' => 'Herramientas/equipos - Mano',
            'taxsegments_id' => 23,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 73,
            'name' => 'Jardín de césped/suministros',
            'taxsegments_id' => 24,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 74,
            'name' => 'Las herramientas/equipos - alimentación',
            'taxsegments_id' => 25,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 75,
            'name' => 'Productos para la construcción',
            'taxsegments_id' => 26,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 76,
            'name' => 'Almacenaje de Herramientas / Ayudas para Talleres',
            'taxsegments_id' => 27,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 77,
            'name' => 'Juguetes y Juegos',
            'taxsegments_id' => 28,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 78,
            'name' => 'Servicio proporcionado productos de juego',
            'taxsegments_id' => 28,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 79,
            'name' => 'Combustibles y aditivos de combustible',
            'taxsegments_id' => 29,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 80,
            'name' => 'Almacenamiento/transferencia de combustible',
            'taxsegments_id' => 29,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 81,
            'name' => 'Los gases no utilizados como combustibles',
            'taxsegments_id' => 29,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 82,
            'name' => 'Lubricantes/compuestos protectores',
            'taxsegments_id' => 30,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 83,
            'name' => 'Lubricantes/Almacenamiento/transferencia de compuestos protectores',
            'taxsegments_id' => 30,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 84,
            'name' => 'Variedad de lubricantes Packs',
            'taxsegments_id' => 30,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 85,
            'name' => 'Animales vivos',
            'taxsegments_id' => 31,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 86,
            'name' => 'Seguridad personal',
            'taxsegments_id' => 32,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 87,
            'name' => 'Seguridad/vigilancia ambiental',
            'taxsegments_id' => 32,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 88,
            'name' => 'Home/Business/Seguridad/vigilancia de seguridad',
            'taxsegments_id' => 32,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 89,
            'name' => 'Seguridad/Seguridad/vigilancia variedad Packs',
            'taxsegments_id' => 32,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 90,
            'name' => 'Seguridad para bebé/Seguridad/vigilancia',
            'taxsegments_id' => 32,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 91,
            'name' => 'Frascos de almacenamiento/cilindros/Barriles (vacío).',
            'taxsegments_id' => 33,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 92,
            'name' => 'Cajas de almacenamiento/transporte/cajas/bandejas (vacío).',
            'taxsegments_id' => 33,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 93,
            'name' => 'Contenedores de transporte/almacenamiento (vacío)',
            'taxsegments_id' => 33,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 94,
            'name' => 'Ayudas de transporte/almacenamiento',
            'taxsegments_id' => 33,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 95,
            'name' => 'Flores cortadas',
            'taxsegments_id' => 34,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 96,
            'name' => 'Cortar verdes',
            'taxsegments_id' => 34,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 97,
            'name' => 'Las plantas vivas (género a través G)',
            'taxsegments_id' => 34,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 98,
            'name' => 'Las plantas vivas (género H thru Z)',
            'taxsegments_id' => 34,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 99,
            'name' => 'Bombillas/cormos o rizomas y tubérculos',
            'taxsegments_id' => 34,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 100,
            'name' => 'Variedad de plantas Packs',
            'taxsegments_id' => 34,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 101,
            'name' => 'Semillas/esporas',
            'taxsegments_id' => 34,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 102,
            'name' => 'Arbustos y árboles',
            'taxsegments_id' => 34,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 103,
            'name' => 'Verduras/Hongos plantas',
            'taxsegments_id' => 34,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 104,
            'name' => 'Ramos',
            'taxsegments_id' => 34,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);

       DB::table('taxfamilies')->insert([
            'id' => 105,
            'name' => 'Plantas - Listas para crecer',
            'taxsegments_id' => 34,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
       ]);
       
    }
}
