<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id'=>'1',
            'contract_id' => '1',
            'name' => 'ASEO PERSONAL',
            'shortname' => 'Aseo',
            'image' => 'cate000001.png',
            'order' => '1',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '1',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'2',
            'contract_id' => '1',
            'name' => 'BELLEZA',
            'shortname' => 'Belleza',
            'image' => 'cate000002.png',
            'order' => '2',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '2',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'3',
            'contract_id' => '1',
            'name' => 'CARNE, POLLO Y PESCADO',
            'shortname' => 'Carnes',
            'image' => 'cate000003.png',
            'order' => '3',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '3',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'4',
            'contract_id' => '1',
            'name' => 'CHARCUTERÍA',
            'shortname' => 'Charcutería',
            'image' => 'cate000004.png',
            'order' => '4',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '4',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'5',
            'contract_id' => '1',
            'name' => 'DESPENSA',
            'shortname' => 'Despensa',
            'image' => 'cate000005.png',
            'order' => '5',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '5',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'6',
            'contract_id' => '1',
            'name' => 'LACTEOS, HUEVOS Y REFRIGERADOS ',
            'shortname' => 'Lacteos',
            'image' => 'cate000006.png',
            'order' => '6',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '6',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'7',
            'contract_id' => '1',
            'name' => 'PANADERIA Y PASTELERIA',
            'shortname' => 'Pan',
            'image' => 'cate000007.png',
            'order' => '7',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '7',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'8',
            'contract_id' => '1',
            'name' => 'PASABOCAS',
            'shortname' => 'Pasabocas',
            'image' => 'cate000008.png',
            'order' => '8',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '8',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'9',
            'contract_id' => '1',
            'name' => 'VINO LICORES Y CIGARRILLOS',
            'shortname' => 'Licores',
            'image' => 'cate000009.png',
            'order' => '9',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '9',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'17',
            'contract_id' => '1',
            'name' => 'VERDURAS',
            'shortname' => 'Verduras',
            'image' => 'cate000010.png',
            'order' => '17',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '17',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'18',
            'contract_id' => '1',
            'name' => 'FRUTAS',
            'shortname' => 'Frutas',
            'image' => 'cate000011.png',
            'order' => '18',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '18',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'19',
            'contract_id' => '1',
            'name' => 'FRUTAS Y VERDURAS',
            'shortname' => 'Fruver',
            'image' => 'cate000012.png',
            'order' => '19',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '19',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'20',
            'contract_id' => '1',
            'name' => 'RES',
            'shortname' => 'Res',
            'image' => 'cate000013.png',
            'order' => '20',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '20',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'21',
            'contract_id' => '1',
            'name' => 'POLLO',
            'shortname' => 'Pollo',
            'image' => 'cate000014.png',
            'order' => '21',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '21',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'22',
            'contract_id' => '1',
            'name' => 'PESCADO',
            'shortname' => 'Pescado',
            'image' => 'cate000015.png',
            'order' => '22',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '22',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'23',
            'contract_id' => '1',
            'name' => 'CERDO',
            'shortname' => 'Cerdo',
            'image' => 'cate000016.png',
            'order' => '23',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '23',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'24',
            'contract_id' => '1',
            'name' => 'QUESOS',
            'shortname' => 'Quesos',
            'image' => 'cate000017.png',
            'order' => '24',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '24',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'25',
            'contract_id' => '1',
            'name' => 'GRANOS',
            'shortname' => 'Granos',
            'image' => 'cate000018.png',
            'order' => '25',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '25',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'26',
            'contract_id' => '1',
            'name' => 'DULCES',
            'shortname' => 'Dulces',
            'image' => 'cate000019.png',
            'order' => '26',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '26',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'27',
            'contract_id' => '1',
            'name' => 'ENLATADOS',
            'shortname' => 'Enlatados',
            'image' => 'cate000020.png',
            'order' => '27',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '27',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'28',
            'contract_id' => '1',
            'name' => 'BEBIDAS',
            'shortname' => 'Bebidas',
            'image' => 'cate000021.png',
            'order' => '28',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '28',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'29',
            'contract_id' => '1',
            'name' => 'GASEOSAS',
            'shortname' => 'Gaseosas',
            'image' => 'cate000022.png',
            'order' => '29',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '29',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'30',
            'contract_id' => '1',
            'name' => 'CIGARRILLOS',
            'shortname' => 'Cigarrillos',
            'image' => 'cate000023.png',
            'order' => '30',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '30',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'31',
            'contract_id' => '1',
            'name' => 'MASCOTAS',
            'shortname' => 'Mascotas',
            'image' => 'cate000024.png',
            'order' => '31',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '31',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'32',
            'contract_id' => '1',
            'name' => 'ASEO HOGAR',
            'shortname' => 'AseoH',
            'image' => 'cate000025.png',
            'order' => '32',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '32',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'33',
            'contract_id' => '1',
            'name' => 'PLÁSTICOS',
            'shortname' => 'Plásticos',
            'image' => 'cate000026.png',
            'order' => '33',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '33',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'34',
            'contract_id' => '1',
            'name' => 'PAPELERÍA',
            'shortname' => 'Papelería',
            'image' => 'cate000027.png',
            'order' => '34',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '34',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'35',
            'contract_id' => '1',
            'name' => 'DROGUERÍA',
            'shortname' => 'Droguería',
            'image' => 'cate000028.png',
            'order' => '35',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '35',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'36',
            'contract_id' => '1',
            'name' => 'REVISTAS Y PERIÓDICOS',
            'shortname' => 'Impresos',
            'image' => 'cate000029.png',
            'order' => '36',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '36',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'37',
            'contract_id' => '1',
            'name' => 'PAQUETES',
            'shortname' => 'Paquetes',
            'image' => 'cate000030.png',
            'order' => '37',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '37',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'38',
            'contract_id' => '1',
            'name' => 'RECARGAS',
            'shortname' => 'Recargas',
            'image' => 'cate000031.png',
            'order' => '38',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '38',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'10',
            'contract_id' => '1',
            'name' => 'CONGELADOS',
            'shortname' => 'Congelados',
            'image' => 'cate000032.png',
            'order' => '10',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '10',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('categories')->insert([
            'id'=>'11',
            'contract_id' => '1',
            'name' => 'TECNOLOGÍA',
            'shortname' => 'Tecnología',
            'image' => 'cate000033.png',
            'order' => '11',
            'master_id' => '0',
            'status' => '1',
            'idowner' => '11',
            'typemodal' => '0',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
       
    }
}
