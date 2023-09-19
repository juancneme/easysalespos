<?php

use Illuminate\Database\Seeder;

class PersonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('persons')->insert([
            'id' => '1',
            'typeperson_id' => '3',
            'typedocument_id' => '6',
            'numberdocument' => '830067468',
            'digitcheck' => '2',
            'socialreason' => 'EASYNET SAS',
            'firstname' => '',
            'othernames' => '',
            'lastname' => '',
            'otherlastname' => '',
            'birthdate' => '2001/01/01',
            'status' => '1',
        ]);

        // DB::table('persons')->insert([
        //     'id' => '2',
        //     'typeperson_id' => '3',
        //     'typedocument_id' => '6',
        //     'numberdocument' => '893003001',
        //     'digitcheck' => '2',
        //     'socialreason' => 'RENTABYTE PRUEBA 01',
        //     'firstname' => '',
        //     'othernames' => '',
        //     'lastname' => '',
        //     'otherlastname' => '',
        //     'birthdate' => '2001/01/01',
        //     'status' => '1',
        // ]);
        // DB::table('persons')->insert([
        //     'id' => '3',
        //     'typeperson_id' => '3',
        //     'typedocument_id' => '6',
        //     'numberdocument' => '893003002',
        //     'digitcheck' => '2',
        //     'socialreason' => 'RENTABYTE PRUEBA 02',
        //     'firstname' => '',
        //     'othernames' => '',
        //     'lastname' => '',
        //     'otherlastname' => '',
        //     'birthdate' => '2001/01/01',
        //     'status' => '1',
        // ]);
        // DB::table('persons')->insert([
        //     'id' => '4',
        //     'typeperson_id' => '3',
        //     'typedocument_id' => '6',
        //     'numberdocument' => '893003003',
        //     'digitcheck' => '2',
        //     'socialreason' => 'RENTABYTE PRUEBA 03',
        //     'firstname' => '',
        //     'othernames' => '',
        //     'lastname' => '',
        //     'otherlastname' => '',
        //     'birthdate' => '2001/01/01',
        //     'status' => '1',
        // ]);
        
        // DB::table('persons')->insert([
        //     'id' => '5',
        //     'typeperson_id' => '2',
        //     'typedocument_id' => '5',
        //     'numberdocument' => '79123005',
        //     'digitcheck' => '0',
        //     'socialreason' => '',
        //     'firstname' => 'Eduardo',
        //     'othernames' => '',
        //     'lastname' => 'Rojas',
        //     'otherlastname' => '',
        //     'birthdate' => '2001/01/01',
        //     'status' => '1',
        // ]);

        // DB::table('persons')->insert([
        //     'id' => '6',
        //     'typeperson_id' => '2',
        //     'typedocument_id' => '5',
        //     'numberdocument' => '79123006',
        //     'digitcheck' => '0',
        //     'socialreason' => '',
        //     'firstname' => 'Oscar',
        //     'othernames' => '',
        //     'lastname' => 'Fajardo',
        //     'otherlastname' => '',
        //     'birthdate' => '2001/01/01',
        //     'status' => '1',
        // ]);


        // DB::table('persons')->insert([
        //     'id' => '7',
        //     'typeperson_id' => '2',
        //     'typedocument_id' => '5',
        //     'numberdocument' => '79123007',
        //     'digitcheck' => '0',
        //     'socialreason' => '',
        //     'firstname' => 'Pablo',
        //     'othernames' => '',
        //     'lastname' => 'Neruda',
        //     'otherlastname' => '',
        //     'birthdate' => '2001/01/01',
        //     'status' => '1',
        // ]);

        // DB::table('persons')->insert([
        //     'id' => '8',
        //     'typeperson_id' => '2',
        //     'typedocument_id' => '5',
        //     'numberdocument' => '79123008',
        //     'digitcheck' => '0',
        //     'socialreason' => '',
        //     'firstname' => 'Luis',
        //     'othernames' => '',
        //     'lastname' => 'Fonsi',
        //     'otherlastname' => '',
        //     'birthdate' => '2001/01/01',
        //     'status' => '1',
        // ]);

        // DB::table('persons')->insert([
        //     'id' => '9',
        //     'typeperson_id' => '2',
        //     'typedocument_id' => '5',
        //     'numberdocument' => '79123009',
        //     'digitcheck' => '0',
        //     'socialreason' => '',
        //     'firstname' => 'Carlos ',
        //     'othernames' => '',
        //     'lastname' => 'Lopez',
        //     'otherlastname' => '',
        //     'birthdate' => '2001/01/01',
        //     'status' => '1',
        // ]);

        // DB::table('persons')->insert([
        //     'id' => '10',
        //     'typeperson_id' => '2',
        //     'typedocument_id' => '5',
        //     'numberdocument' => '79123010',
        //     'digitcheck' => '0',
        //     'socialreason' => '',
        //     'firstname' => 'Pedro',
        //     'othernames' => '',
        //     'lastname' => 'Nuñez',
        //     'otherlastname' => '',
        //     'birthdate' => '2001/01/01',
        //     'status' => '1',
        // ]);

        // DB::table('persons')->insert([
        //     'id' => '11',
        //     'typeperson_id' => '2',
        //     'typedocument_id' => '5',
        //     'numberdocument' => '79123011',
        //     'digitcheck' => '0',
        //     'socialreason' => '',
        //     'firstname' => 'Patricia',
        //     'othernames' => '',
        //     'lastname' => 'Sastoque',
        //     'otherlastname' => '',
        //     'birthdate' => '2001/01/01',
        //     'status' => '1',
        // ]);

        // DB::table('persons')->insert([
        //     'id' => '12',
        //     'typeperson_id' => '2',
        //     'typedocument_id' => '5',
        //     'numberdocument' => '79123012',
        //     'digitcheck' => '0',
        //     'socialreason' => '',
        //     'firstname' => 'Maria',
        //     'othernames' => '',
        //     'lastname' => 'Castañeda',
        //     'otherlastname' => '',
        //     'birthdate' => '2001/01/01',
        //     'status' => '1',
        // ]);

        // DB::table('persons')->insert([
        //     'id' => '13',
        //     'typeperson_id' => '2',
        //     'typedocument_id' => '5',
        //     'numberdocument' => '79123013',
        //     'digitcheck' => '0',
        //     'socialreason' => '',
        //     'firstname' => 'Marcos',
        //     'othernames' => '',
        //     'lastname' => 'Aldana',
        //     'otherlastname' => '',
        //     'birthdate' => '2001/01/01',
        //     'status' => '1',
        // ]);

        // DB::table('persons')->insert([
        //     'id' => '14',
        //     'typeperson_id' => '2',
        //     'typedocument_id' => '5',
        //     'numberdocument' => '79123014',
        //     'digitcheck' => '0',
        //     'socialreason' => '',
        //     'firstname' => 'Joaquin',
        //     'othernames' => '',
        //     'lastname' => 'Montenegro',
        //     'otherlastname' => '',
        //     'birthdate' => '2001/01/01',
        //     'status' => '1',
        // ]);

        // DB::table('persons')->insert([
        //     'id' => '15',
        //     'typeperson_id' => '2',
        //     'typedocument_id' => '5',
        //     'numberdocument' => '79123015',
        //     'digitcheck' => '0',
        //     'socialreason' => '',
        //     'firstname' => 'Paola',
        //     'othernames' => '',
        //     'lastname' => 'Parra',
        //     'otherlastname' => '',
        //     'birthdate' => '2001/01/01',
        //     'status' => '1',
        // ]);

        // DB::table('persons')->insert([
        //     'id' => '16',
        //     'typeperson_id' => '2',
        //     'typedocument_id' => '5',
        //     'numberdocument' => '79123016',
        //     'digitcheck' => '0',
        //     'socialreason' => '',
        //     'firstname' => 'Carolina',
        //     'othernames' => '',
        //     'lastname' => 'Leon',
        //     'otherlastname' => '',
        //     'birthdate' => '2001/01/01',
        //     'status' => '1',
        // ]);

        // DB::table('persons')->insert([
        //     'id' => '17',
        //     'typeperson_id' => '2',
        //     'typedocument_id' => '5',
        //     'numberdocument' => '79123017',
        //     'digitcheck' => '0',
        //     'socialreason' => '',
        //     'firstname' => 'Valentina',
        //     'othernames' => '',
        //     'lastname' => 'Jaramillo',
        //     'otherlastname' => '',
        //     'birthdate' => '2001/01/01',
        //     'status' => '1',
        // ]);

        // DB::table('persons')->insert([
        //     'id' => '18',
        //     'typeperson_id' => '3',
        //     'typedocument_id' => '6',
        //     'numberdocument' => '893003018',
        //     'digitcheck' => '2',
        //     'socialreason' => 'REGISTRO PARA EMPRESA SIN DISTRIBUIDOR',
        //     'firstname' => '',
        //     'othernames' => '',
        //     'lastname' => '',
        //     'otherlastname' => '',
        //     'birthdate' => '2001/01/01',
        //     'status' => '1',
        // ]);

        // DB::table('persons')->insert([
        //     'id' => '19',
        //     'typeperson_id' => '3',
        //     'typedocument_id' => '6',
        //     'numberdocument' => '893003019',
        //     'digitcheck' => '3',
        //     'socialreason' => 'RENTABYTE OTRA EMPRESA PRUEBAS',
        //     'firstname' => '',
        //     'othernames' => '',
        //     'lastname' => '',
        //     'otherlastname' => '',
        //     'birthdate' => '2001/01/01',
        //     'status' => '1',
        // ]);

    }
}
