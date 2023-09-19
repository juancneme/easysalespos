<?php

use Illuminate\Database\Seeder;

class ListsciuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lists')->insert([
            'id' => '2000',
            'name' => 'Antioquia',
            'code' => 'COL05000',
            'idowner' => '20',
            'order' => '2',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2001',
            'name' => 'Atlantico',
            'code' => 'COL08000',
            'idowner' => '20',
            'order' => '3',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2002',
            'name' => 'Bogota, D.C.',
            'code' => 'COL11000',
            'idowner' => '20',
            'order' => '1',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2003',
            'name' => 'Bolivar',
            'code' => 'COL13000',
            'idowner' => '20',
            'order' => '4',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2004',
            'name' => 'Boyaca',
            'code' => 'COL15000',
            'idowner' => '20',
            'order' => '5',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2005',
            'name' => 'Caldas',
            'code' => 'COL17000',
            'idowner' => '20',
            'order' => '6',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2006',
            'name' => 'Caqueta',
            'code' => 'COL18000',
            'idowner' => '20',
            'order' => '7',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2007',
            'name' => 'Cauca',
            'code' => 'COL19000',
            'idowner' => '20',
            'order' => '8',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2008',
            'name' => 'Cesar',
            'code' => 'COL20000',
            'idowner' => '20',
            'order' => '9',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2009',
            'name' => 'Cordoba',
            'code' => 'COL23000',
            'idowner' => '20',
            'order' => '10',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2010',
            'name' => 'Cundinamarca',
            'code' => 'COL25000',
            'idowner' => '20',
            'order' => '11',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2011',
            'name' => 'Choco',
            'code' => 'COL27000',
            'idowner' => '20',
            'order' => '12',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2012',
            'name' => 'Huila',
            'code' => 'COL41000',
            'idowner' => '20',
            'order' => '13',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2013',
            'name' => 'La Guajira',
            'code' => 'COL44000',
            'idowner' => '20',
            'order' => '14',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2014',
            'name' => 'Magdalena',
            'code' => 'COL47000',
            'idowner' => '20',
            'order' => '15',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2015',
            'name' => 'Meta',
            'code' => 'COL50000',
            'idowner' => '20',
            'order' => '16',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2016',
            'name' => 'Nariño',
            'code' => 'COL52000',
            'idowner' => '20',
            'order' => '17',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2017',
            'name' => 'N. de Santander',
            'code' => 'COL54000',
            'idowner' => '20',
            'order' => '18',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2018',
            'name' => 'Quindio',
            'code' => 'COL63000',
            'idowner' => '20',
            'order' => '19',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2019',
            'name' => 'Risaralda',
            'code' => 'COL66000',
            'idowner' => '20',
            'order' => '20',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2020',
            'name' => 'Santander',
            'code' => 'COL68000',
            'idowner' => '20',
            'order' => '21',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2021',
            'name' => 'Sucre',
            'code' => 'COL70000',
            'idowner' => '20',
            'order' => '22',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2022',
            'name' => 'Tolima',
            'code' => 'COL73000',
            'idowner' => '20',
            'order' => '23',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2023',
            'name' => 'Valle de Cauca',
            'code' => 'COL76000',
            'idowner' => '20',
            'order' => '24',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2024',
            'name' => 'Arauca',
            'code' => 'COL81000',
            'idowner' => '20',
            'order' => '25',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2025',
            'name' => 'Casanare',
            'code' => 'COL85000',
            'idowner' => '20',
            'order' => '26',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2026',
            'name' => 'Putumayo',
            'code' => 'COL86000',
            'idowner' => '20',
            'order' => '27',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2027',
            'name' => 'San Andres',
            'code' => 'COL88000',
            'idowner' => '20',
            'order' => '28',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2028',
            'name' => 'Amazonas',
            'code' => 'COL91000',
            'idowner' => '20',
            'order' => '29',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2029',
            'name' => 'Guainia',
            'code' => 'COL94000',
            'idowner' => '20',
            'order' => '30',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2030',
            'name' => 'Guaviare',
            'code' => 'COL95000',
            'idowner' => '20',
            'order' => '31',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2031',
            'name' => 'Vaupes',
            'code' => 'COL97000',
            'idowner' => '20',
            'order' => '32',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2032',
            'name' => 'Vichada',
            'code' => 'COL99000',
            'idowner' => '20',
            'order' => '33',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2033',
            'name' => 'Medellin',
            'code' => 'COL05001',
            'idowner' => '21',
            'order' => '2',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2034',
            'name' => 'Abejorral',
            'code' => 'COL05002',
            'idowner' => '21',
            'order' => '3',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2035',
            'name' => 'Abriaqui',
            'code' => 'COL05004',
            'idowner' => '21',
            'order' => '4',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2036',
            'name' => 'Alejandria',
            'code' => 'COL05021',
            'idowner' => '21',
            'order' => '5',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2037',
            'name' => 'Amaga',
            'code' => 'COL05030',
            'idowner' => '21',
            'order' => '6',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2038',
            'name' => 'Amalfi',
            'code' => 'COL05031',
            'idowner' => '21',
            'order' => '7',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2039',
            'name' => 'Andes',
            'code' => 'COL05034',
            'idowner' => '21',
            'order' => '8',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2040',
            'name' => 'Angelopolis',
            'code' => 'COL05036',
            'idowner' => '21',
            'order' => '9',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2041',
            'name' => 'Angostura',
            'code' => 'COL05038',
            'idowner' => '21',
            'order' => '10',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2042',
            'name' => 'Anori',
            'code' => 'COL05040',
            'idowner' => '21',
            'order' => '11',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2043',
            'name' => 'Santafe de Antioquia',
            'code' => 'COL05042',
            'idowner' => '21',
            'order' => '12',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2044',
            'name' => 'Anza',
            'code' => 'COL05044',
            'idowner' => '21',
            'order' => '13',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2045',
            'name' => 'Apartado',
            'code' => 'COL05045',
            'idowner' => '21',
            'order' => '14',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2046',
            'name' => 'Arboletes',
            'code' => 'COL05051',
            'idowner' => '21',
            'order' => '15',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2047',
            'name' => 'Argelia',
            'code' => 'COL05055',
            'idowner' => '21',
            'order' => '16',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2048',
            'name' => 'Armenia',
            'code' => 'COL05059',
            'idowner' => '21',
            'order' => '17',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2049',
            'name' => 'Barbosa',
            'code' => 'COL05079',
            'idowner' => '21',
            'order' => '18',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2050',
            'name' => 'Belmira',
            'code' => 'COL05086',
            'idowner' => '21',
            'order' => '19',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2051',
            'name' => 'Bello',
            'code' => 'COL05088',
            'idowner' => '21',
            'order' => '20',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2052',
            'name' => 'Betania',
            'code' => 'COL05091',
            'idowner' => '21',
            'order' => '21',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2053',
            'name' => 'Betulia',
            'code' => 'COL05093',
            'idowner' => '21',
            'order' => '22',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2054',
            'name' => 'Ciudad Bolivar',
            'code' => 'COL05101',
            'idowner' => '21',
            'order' => '23',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2055',
            'name' => 'Briceño',
            'code' => 'COL05107',
            'idowner' => '21',
            'order' => '24',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2056',
            'name' => 'Buritica',
            'code' => 'COL05113',
            'idowner' => '21',
            'order' => '25',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2057',
            'name' => 'Caceres',
            'code' => 'COL05120',
            'idowner' => '21',
            'order' => '26',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2058',
            'name' => 'Caicedo',
            'code' => 'COL05125',
            'idowner' => '21',
            'order' => '27',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2059',
            'name' => 'Caldas',
            'code' => 'COL05129',
            'idowner' => '21',
            'order' => '28',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2060',
            'name' => 'Campamento',
            'code' => 'COL05134',
            'idowner' => '21',
            'order' => '29',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2061',
            'name' => 'Cañasgordas',
            'code' => 'COL05138',
            'idowner' => '21',
            'order' => '30',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2062',
            'name' => 'Caracoli',
            'code' => 'COL05142',
            'idowner' => '21',
            'order' => '31',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2063',
            'name' => 'Caramanta',
            'code' => 'COL05145',
            'idowner' => '21',
            'order' => '32',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2064',
            'name' => 'Carepa',
            'code' => 'COL05147',
            'idowner' => '21',
            'order' => '33',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2065',
            'name' => 'El Carmen de Viboral',
            'code' => 'COL05148',
            'idowner' => '21',
            'order' => '34',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2066',
            'name' => 'Carolina',
            'code' => 'COL05150',
            'idowner' => '21',
            'order' => '35',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2067',
            'name' => 'Caucasia',
            'code' => 'COL05154',
            'idowner' => '21',
            'order' => '36',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2068',
            'name' => 'Chigorodo',
            'code' => 'COL05172',
            'idowner' => '21',
            'order' => '37',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2069',
            'name' => 'Cisneros',
            'code' => 'COL05190',
            'idowner' => '21',
            'order' => '38',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2070',
            'name' => 'Cocorna',
            'code' => 'COL05197',
            'idowner' => '21',
            'order' => '39',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2071',
            'name' => 'Concepcion',
            'code' => 'COL05206',
            'idowner' => '21',
            'order' => '40',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2072',
            'name' => 'Concordia',
            'code' => 'COL05209',
            'idowner' => '21',
            'order' => '41',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2073',
            'name' => 'Copacabana',
            'code' => 'COL05212',
            'idowner' => '21',
            'order' => '42',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2074',
            'name' => 'Dabeiba',
            'code' => 'COL05234',
            'idowner' => '21',
            'order' => '43',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2075',
            'name' => 'Don Matias',
            'code' => 'COL05237',
            'idowner' => '21',
            'order' => '44',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2076',
            'name' => 'Ebejico',
            'code' => 'COL05240',
            'idowner' => '21',
            'order' => '45',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2077',
            'name' => 'El Bagre',
            'code' => 'COL05250',
            'idowner' => '21',
            'order' => '46',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2078',
            'name' => 'Entrerrios',
            'code' => 'COL05264',
            'idowner' => '21',
            'order' => '47',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2079',
            'name' => 'Envigado',
            'code' => 'COL05266',
            'idowner' => '21',
            'order' => '48',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2080',
            'name' => 'Fredonia',
            'code' => 'COL05282',
            'idowner' => '21',
            'order' => '49',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2081',
            'name' => 'Frontino',
            'code' => 'COL05284',
            'idowner' => '21',
            'order' => '50',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2082',
            'name' => 'Giraldo',
            'code' => 'COL05306',
            'idowner' => '21',
            'order' => '51',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2083',
            'name' => 'Girardota',
            'code' => 'COL05308',
            'idowner' => '21',
            'order' => '52',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2084',
            'name' => 'Gomez Plata',
            'code' => 'COL05310',
            'idowner' => '21',
            'order' => '53',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2085',
            'name' => 'Granada',
            'code' => 'COL05313',
            'idowner' => '21',
            'order' => '54',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2086',
            'name' => 'Guadalupe',
            'code' => 'COL05315',
            'idowner' => '21',
            'order' => '55',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2087',
            'name' => 'Guarne',
            'code' => 'COL05318',
            'idowner' => '21',
            'order' => '56',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2088',
            'name' => 'Guatape',
            'code' => 'COL05321',
            'idowner' => '21',
            'order' => '57',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2089',
            'name' => 'Heliconia',
            'code' => 'COL05347',
            'idowner' => '21',
            'order' => '58',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2090',
            'name' => 'Hispania',
            'code' => 'COL05353',
            'idowner' => '21',
            'order' => '59',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2091',
            'name' => 'Itagui',
            'code' => 'COL05360',
            'idowner' => '21',
            'order' => '60',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2092',
            'name' => 'Ituango',
            'code' => 'COL05361',
            'idowner' => '21',
            'order' => '61',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2093',
            'name' => 'Jardin',
            'code' => 'COL05364',
            'idowner' => '21',
            'order' => '62',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2094',
            'name' => 'Jerico',
            'code' => 'COL05368',
            'idowner' => '21',
            'order' => '63',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2095',
            'name' => 'La Ceja',
            'code' => 'COL05376',
            'idowner' => '21',
            'order' => '64',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2096',
            'name' => 'La Estrella',
            'code' => 'COL05380',
            'idowner' => '21',
            'order' => '65',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2097',
            'name' => 'La Pintada',
            'code' => 'COL05390',
            'idowner' => '21',
            'order' => '66',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2098',
            'name' => 'La Union',
            'code' => 'COL05400',
            'idowner' => '21',
            'order' => '67',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2099',
            'name' => 'Liborina',
            'code' => 'COL05411',
            'idowner' => '21',
            'order' => '68',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2100',
            'name' => 'Maceo',
            'code' => 'COL05425',
            'idowner' => '21',
            'order' => '69',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2101',
            'name' => 'Marinilla',
            'code' => 'COL05440',
            'idowner' => '21',
            'order' => '70',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2102',
            'name' => 'Montebello',
            'code' => 'COL05467',
            'idowner' => '21',
            'order' => '71',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2103',
            'name' => 'Murindo',
            'code' => 'COL05475',
            'idowner' => '21',
            'order' => '72',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2104',
            'name' => 'Mutata',
            'code' => 'COL05480',
            'idowner' => '21',
            'order' => '73',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2105',
            'name' => 'Nariño',
            'code' => 'COL05483',
            'idowner' => '21',
            'order' => '74',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2106',
            'name' => 'Necocli',
            'code' => 'COL05490',
            'idowner' => '21',
            'order' => '75',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2107',
            'name' => 'Nechi',
            'code' => 'COL05495',
            'idowner' => '21',
            'order' => '76',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2108',
            'name' => 'Olaya',
            'code' => 'COL05501',
            'idowner' => '21',
            'order' => '77',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2109',
            'name' => 'Peðol',
            'code' => 'COL05541',
            'idowner' => '21',
            'order' => '78',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2110',
            'name' => 'Peque',
            'code' => 'COL05543',
            'idowner' => '21',
            'order' => '79',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2111',
            'name' => 'Pueblorrico',
            'code' => 'COL05576',
            'idowner' => '21',
            'order' => '80',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2112',
            'name' => 'Puerto Berrio',
            'code' => 'COL05579',
            'idowner' => '21',
            'order' => '81',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2113',
            'name' => 'Puerto Nare',
            'code' => 'COL05585',
            'idowner' => '21',
            'order' => '82',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2114',
            'name' => 'Puerto Triunfo',
            'code' => 'COL05591',
            'idowner' => '21',
            'order' => '83',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2115',
            'name' => 'Remedios',
            'code' => 'COL05604',
            'idowner' => '21',
            'order' => '84',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2116',
            'name' => 'Retiro',
            'code' => 'COL05607',
            'idowner' => '21',
            'order' => '85',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2117',
            'name' => 'Rionegro',
            'code' => 'COL05615',
            'idowner' => '21',
            'order' => '86',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2118',
            'name' => 'Sabanalarga',
            'code' => 'COL05628',
            'idowner' => '21',
            'order' => '87',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2119',
            'name' => 'Sabaneta',
            'code' => 'COL05631',
            'idowner' => '21',
            'order' => '88',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2120',
            'name' => 'Salgar',
            'code' => 'COL05642',
            'idowner' => '21',
            'order' => '89',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2121',
            'name' => 'San Andres de Cuerquia',
            'code' => 'COL05647',
            'idowner' => '21',
            'order' => '90',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2122',
            'name' => 'San Carlos',
            'code' => 'COL05649',
            'idowner' => '21',
            'order' => '91',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2123',
            'name' => 'San Francisco',
            'code' => 'COL05652',
            'idowner' => '21',
            'order' => '92',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2124',
            'name' => 'San Jeronimo',
            'code' => 'COL05656',
            'idowner' => '21',
            'order' => '93',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2125',
            'name' => 'San Jose de la Montaña',
            'code' => 'COL05658',
            'idowner' => '21',
            'order' => '94',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2126',
            'name' => 'San Juan de Uraba',
            'code' => 'COL05659',
            'idowner' => '21',
            'order' => '95',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2127',
            'name' => 'San Luis',
            'code' => 'COL05660',
            'idowner' => '21',
            'order' => '96',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2128',
            'name' => 'San Pedro',
            'code' => 'COL05664',
            'idowner' => '21',
            'order' => '97',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2129',
            'name' => 'San Pedro de Uraba',
            'code' => 'COL05665',
            'idowner' => '21',
            'order' => '98',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2130',
            'name' => 'San Rafael',
            'code' => 'COL05667',
            'idowner' => '21',
            'order' => '99',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2131',
            'name' => 'San Roque',
            'code' => 'COL05670',
            'idowner' => '21',
            'order' => '100',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2132',
            'name' => 'San Vicente',
            'code' => 'COL05674',
            'idowner' => '21',
            'order' => '101',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2133',
            'name' => 'Santa Barbara',
            'code' => 'COL05679',
            'idowner' => '21',
            'order' => '102',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2134',
            'name' => 'Santa Rosa de Osos',
            'code' => 'COL05686',
            'idowner' => '21',
            'order' => '103',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2135',
            'name' => 'Santo Domingo',
            'code' => 'COL05690',
            'idowner' => '21',
            'order' => '104',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2136',
            'name' => 'El Santuario',
            'code' => 'COL05697',
            'idowner' => '21',
            'order' => '105',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2137',
            'name' => 'Segovia',
            'code' => 'COL05736',
            'idowner' => '21',
            'order' => '106',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2138',
            'name' => 'Sonson',
            'code' => 'COL05756',
            'idowner' => '21',
            'order' => '107',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2139',
            'name' => 'Sopetran',
            'code' => 'COL05761',
            'idowner' => '21',
            'order' => '108',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2140',
            'name' => 'Tamesis',
            'code' => 'COL05789',
            'idowner' => '21',
            'order' => '109',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2141',
            'name' => 'Taraza',
            'code' => 'COL05790',
            'idowner' => '21',
            'order' => '110',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2142',
            'name' => 'Tarso',
            'code' => 'COL05792',
            'idowner' => '21',
            'order' => '111',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2143',
            'name' => 'Titiribi',
            'code' => 'COL05809',
            'idowner' => '21',
            'order' => '112',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2144',
            'name' => 'Toledo',
            'code' => 'COL05819',
            'idowner' => '21',
            'order' => '113',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2145',
            'name' => 'Turbo',
            'code' => 'COL05837',
            'idowner' => '21',
            'order' => '114',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2146',
            'name' => 'Uramita',
            'code' => 'COL05842',
            'idowner' => '21',
            'order' => '115',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2147',
            'name' => 'Urrao',
            'code' => 'COL05847',
            'idowner' => '21',
            'order' => '116',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2148',
            'name' => 'Valdivia',
            'code' => 'COL05854',
            'idowner' => '21',
            'order' => '117',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2149',
            'name' => 'Valparaiso',
            'code' => 'COL05856',
            'idowner' => '21',
            'order' => '118',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2150',
            'name' => 'Vegachi',
            'code' => 'COL05858',
            'idowner' => '21',
            'order' => '119',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2151',
            'name' => 'Venecia',
            'code' => 'COL05861',
            'idowner' => '21',
            'order' => '120',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2152',
            'name' => 'Vigia de Fuerte',
            'code' => 'COL05873',
            'idowner' => '21',
            'order' => '121',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2153',
            'name' => 'Yali',
            'code' => 'COL05885',
            'idowner' => '21',
            'order' => '122',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2154',
            'name' => 'Yarumal',
            'code' => 'COL05887',
            'idowner' => '21',
            'order' => '123',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2155',
            'name' => 'Yolombo',
            'code' => 'COL05890',
            'idowner' => '21',
            'order' => '124',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2156',
            'name' => 'Yondo',
            'code' => 'COL05893',
            'idowner' => '21',
            'order' => '125',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2157',
            'name' => 'Zaragoza',
            'code' => 'COL05895',
            'idowner' => '21',
            'order' => '126',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2158',
            'name' => 'Barranquilla',
            'code' => 'COL08001',
            'idowner' => '21',
            'order' => '127',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2159',
            'name' => 'Baranoa',
            'code' => 'COL08078',
            'idowner' => '21',
            'order' => '128',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2160',
            'name' => 'Campo de la Cruz',
            'code' => 'COL08137',
            'idowner' => '21',
            'order' => '129',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2161',
            'name' => 'Candelaria',
            'code' => 'COL08141',
            'idowner' => '21',
            'order' => '130',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2162',
            'name' => 'Galapa',
            'code' => 'COL08296',
            'idowner' => '21',
            'order' => '131',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2163',
            'name' => 'Juan de Acosta',
            'code' => 'COL08372',
            'idowner' => '21',
            'order' => '132',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2164',
            'name' => 'Luruaco',
            'code' => 'COL08421',
            'idowner' => '21',
            'order' => '133',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2165',
            'name' => 'Malambo',
            'code' => 'COL08433',
            'idowner' => '21',
            'order' => '134',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2166',
            'name' => 'Manati',
            'code' => 'COL08436',
            'idowner' => '21',
            'order' => '135',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2167',
            'name' => 'Palmar de Varela',
            'code' => 'COL08520',
            'idowner' => '21',
            'order' => '136',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2168',
            'name' => 'Piojo',
            'code' => 'COL08549',
            'idowner' => '21',
            'order' => '137',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2169',
            'name' => 'Polonuevo',
            'code' => 'COL08558',
            'idowner' => '21',
            'order' => '138',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2170',
            'name' => 'Ponedera',
            'code' => 'COL08560',
            'idowner' => '21',
            'order' => '139',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2171',
            'name' => 'Puerto Colombia',
            'code' => 'COL08573',
            'idowner' => '21',
            'order' => '140',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2172',
            'name' => 'Repelon',
            'code' => 'COL08606',
            'idowner' => '21',
            'order' => '141',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2173',
            'name' => 'Sabanagrande',
            'code' => 'COL08634',
            'idowner' => '21',
            'order' => '142',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2174',
            'name' => 'Sabanalarga',
            'code' => 'COL08638',
            'idowner' => '21',
            'order' => '143',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2175',
            'name' => 'Santa Lucia',
            'code' => 'COL08675',
            'idowner' => '21',
            'order' => '144',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2176',
            'name' => 'Santo Tomas',
            'code' => 'COL08685',
            'idowner' => '21',
            'order' => '145',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2177',
            'name' => 'Soledad',
            'code' => 'COL08758',
            'idowner' => '21',
            'order' => '146',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2178',
            'name' => 'Suan',
            'code' => 'COL08770',
            'idowner' => '21',
            'order' => '147',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2179',
            'name' => 'Tubara',
            'code' => 'COL08832',
            'idowner' => '21',
            'order' => '148',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2180',
            'name' => 'Usiacuri',
            'code' => 'COL08849',
            'idowner' => '21',
            'order' => '149',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2181',
            'name' => 'Bogota, D.C.',
            'code' => 'COL11001',
            'idowner' => '21',
            'order' => '1',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2182',
            'name' => 'Cartagena',
            'code' => 'COL13001',
            'idowner' => '21',
            'order' => '150',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2183',
            'name' => 'Achi',
            'code' => 'COL13006',
            'idowner' => '21',
            'order' => '151',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2184',
            'name' => 'Altos de Rosario',
            'code' => 'COL13030',
            'idowner' => '21',
            'order' => '152',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2185',
            'name' => 'Arenal',
            'code' => 'COL13042',
            'idowner' => '21',
            'order' => '153',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2186',
            'name' => 'Arjona',
            'code' => 'COL13052',
            'idowner' => '21',
            'order' => '154',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2187',
            'name' => 'Arroyohondo',
            'code' => 'COL13062',
            'idowner' => '21',
            'order' => '155',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2188',
            'name' => 'Barranco de Loba',
            'code' => 'COL13074',
            'idowner' => '21',
            'order' => '156',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2189',
            'name' => 'Calamar',
            'code' => 'COL13140',
            'idowner' => '21',
            'order' => '157',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2190',
            'name' => 'Cantagallo',
            'code' => 'COL13160',
            'idowner' => '21',
            'order' => '158',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2191',
            'name' => 'Cicuco',
            'code' => 'COL13188',
            'idowner' => '21',
            'order' => '159',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2192',
            'name' => 'Cordoba',
            'code' => 'COL13212',
            'idowner' => '21',
            'order' => '160',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2193',
            'name' => 'Clemencia',
            'code' => 'COL13222',
            'idowner' => '21',
            'order' => '161',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2194',
            'name' => 'El Carmen de Bolivar',
            'code' => 'COL13244',
            'idowner' => '21',
            'order' => '162',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2195',
            'name' => 'El Guamo',
            'code' => 'COL13248',
            'idowner' => '21',
            'order' => '163',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2196',
            'name' => 'El Peñon',
            'code' => 'COL13268',
            'idowner' => '21',
            'order' => '164',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2197',
            'name' => 'Hatillo de Loba',
            'code' => 'COL13300',
            'idowner' => '21',
            'order' => '165',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2198',
            'name' => 'Magangue',
            'code' => 'COL13430',
            'idowner' => '21',
            'order' => '166',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2199',
            'name' => 'Mahates',
            'code' => 'COL13433',
            'idowner' => '21',
            'order' => '167',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2200',
            'name' => 'Margarita',
            'code' => 'COL13440',
            'idowner' => '21',
            'order' => '168',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2201',
            'name' => 'Maria la Baja',
            'code' => 'COL13442',
            'idowner' => '21',
            'order' => '169',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2202',
            'name' => 'Montecristo',
            'code' => 'COL13458',
            'idowner' => '21',
            'order' => '170',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2203',
            'name' => 'Mompos',
            'code' => 'COL13468',
            'idowner' => '21',
            'order' => '171',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2204',
            'name' => 'Norosi',
            'code' => 'COL13490',
            'idowner' => '21',
            'order' => '172',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2205',
            'name' => 'Morales',
            'code' => 'COL13473',
            'idowner' => '21',
            'order' => '173',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2206',
            'name' => 'Pinillos',
            'code' => 'COL13549',
            'idowner' => '21',
            'order' => '174',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2207',
            'name' => 'Regidor',
            'code' => 'COL13580',
            'idowner' => '21',
            'order' => '175',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2208',
            'name' => 'Rio Viejo',
            'code' => 'COL13600',
            'idowner' => '21',
            'order' => '176',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2209',
            'name' => 'San Cristobal',
            'code' => 'COL13620',
            'idowner' => '21',
            'order' => '177',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2210',
            'name' => 'San Estanislao',
            'code' => 'COL13647',
            'idowner' => '21',
            'order' => '178',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2211',
            'name' => 'San Fernando',
            'code' => 'COL13650',
            'idowner' => '21',
            'order' => '179',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2212',
            'name' => 'San Jacinto',
            'code' => 'COL13654',
            'idowner' => '21',
            'order' => '180',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2213',
            'name' => 'San Jacinto de Cauca',
            'code' => 'COL13655',
            'idowner' => '21',
            'order' => '181',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2214',
            'name' => 'San Juan Nepomuceno',
            'code' => 'COL13657',
            'idowner' => '21',
            'order' => '182',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2215',
            'name' => 'San Martin de Loba',
            'code' => 'COL13667',
            'idowner' => '21',
            'order' => '183',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2216',
            'name' => 'San Pablo',
            'code' => 'COL13670',
            'idowner' => '21',
            'order' => '184',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2217',
            'name' => 'Santa Catalina',
            'code' => 'COL13673',
            'idowner' => '21',
            'order' => '185',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2218',
            'name' => 'Santa Rosa',
            'code' => 'COL13683',
            'idowner' => '21',
            'order' => '186',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2219',
            'name' => 'Santa Rosa de Sur',
            'code' => 'COL13688',
            'idowner' => '21',
            'order' => '187',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2220',
            'name' => 'Simiti',
            'code' => 'COL13744',
            'idowner' => '21',
            'order' => '188',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2221',
            'name' => 'Soplaviento',
            'code' => 'COL13760',
            'idowner' => '21',
            'order' => '189',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2222',
            'name' => 'Talaigua Nuevo',
            'code' => 'COL13780',
            'idowner' => '21',
            'order' => '190',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2223',
            'name' => 'Tiquisio',
            'code' => 'COL13810',
            'idowner' => '21',
            'order' => '191',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2224',
            'name' => 'Turbaco',
            'code' => 'COL13836',
            'idowner' => '21',
            'order' => '192',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2225',
            'name' => 'Turbana',
            'code' => 'COL13838',
            'idowner' => '21',
            'order' => '193',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2226',
            'name' => 'Villanueva',
            'code' => 'COL13873',
            'idowner' => '21',
            'order' => '194',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2227',
            'name' => 'Zambrano',
            'code' => 'COL13894',
            'idowner' => '21',
            'order' => '195',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2228',
            'name' => 'Tunja',
            'code' => 'COL15001',
            'idowner' => '21',
            'order' => '196',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2229',
            'name' => 'Almeida',
            'code' => 'COL15022',
            'idowner' => '21',
            'order' => '197',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2230',
            'name' => 'Aquitania',
            'code' => 'COL15047',
            'idowner' => '21',
            'order' => '198',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2231',
            'name' => 'Arcabuco',
            'code' => 'COL15051',
            'idowner' => '21',
            'order' => '199',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2232',
            'name' => 'Belen',
            'code' => 'COL15087',
            'idowner' => '21',
            'order' => '200',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2233',
            'name' => 'Berbeo',
            'code' => 'COL15090',
            'idowner' => '21',
            'order' => '201',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2234',
            'name' => 'Beteitiva',
            'code' => 'COL15092',
            'idowner' => '21',
            'order' => '202',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2235',
            'name' => 'Boavita',
            'code' => 'COL15097',
            'idowner' => '21',
            'order' => '203',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2236',
            'name' => 'Boyaca',
            'code' => 'COL15104',
            'idowner' => '21',
            'order' => '204',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2237',
            'name' => 'Briceño',
            'code' => 'COL15106',
            'idowner' => '21',
            'order' => '205',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2238',
            'name' => 'Buenavista',
            'code' => 'COL15109',
            'idowner' => '21',
            'order' => '206',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2239',
            'name' => 'Busbanza',
            'code' => 'COL15114',
            'idowner' => '21',
            'order' => '207',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2240',
            'name' => 'Caldas',
            'code' => 'COL15131',
            'idowner' => '21',
            'order' => '208',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2241',
            'name' => 'Campohermoso',
            'code' => 'COL15135',
            'idowner' => '21',
            'order' => '209',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2242',
            'name' => 'Cerinza',
            'code' => 'COL15162',
            'idowner' => '21',
            'order' => '210',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2243',
            'name' => 'Chinavita',
            'code' => 'COL15172',
            'idowner' => '21',
            'order' => '211',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2244',
            'name' => 'Chiquinquira',
            'code' => 'COL15176',
            'idowner' => '21',
            'order' => '212',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2245',
            'name' => 'Chiscas',
            'code' => 'COL15180',
            'idowner' => '21',
            'order' => '213',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2246',
            'name' => 'Chita',
            'code' => 'COL15183',
            'idowner' => '21',
            'order' => '214',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2247',
            'name' => 'Chitaraque',
            'code' => 'COL15185',
            'idowner' => '21',
            'order' => '215',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2248',
            'name' => 'Chivata',
            'code' => 'COL15187',
            'idowner' => '21',
            'order' => '216',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2249',
            'name' => 'Cienega',
            'code' => 'COL15189',
            'idowner' => '21',
            'order' => '217',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2250',
            'name' => 'Combita',
            'code' => 'COL15204',
            'idowner' => '21',
            'order' => '218',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2251',
            'name' => 'Coper',
            'code' => 'COL15212',
            'idowner' => '21',
            'order' => '219',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2252',
            'name' => 'Corrales',
            'code' => 'COL15215',
            'idowner' => '21',
            'order' => '220',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2253',
            'name' => 'Covarachia',
            'code' => 'COL15218',
            'idowner' => '21',
            'order' => '221',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2254',
            'name' => 'Cubara',
            'code' => 'COL15223',
            'idowner' => '21',
            'order' => '222',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2255',
            'name' => 'Cucaita',
            'code' => 'COL15224',
            'idowner' => '21',
            'order' => '223',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2256',
            'name' => 'Cuitiva',
            'code' => 'COL15226',
            'idowner' => '21',
            'order' => '224',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2257',
            'name' => 'Chiquiza',
            'code' => 'COL15232',
            'idowner' => '21',
            'order' => '225',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2258',
            'name' => 'Chivor',
            'code' => 'COL15236',
            'idowner' => '21',
            'order' => '226',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2259',
            'name' => 'Duitama',
            'code' => 'COL15238',
            'idowner' => '21',
            'order' => '227',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2260',
            'name' => 'El Cocuy',
            'code' => 'COL15244',
            'idowner' => '21',
            'order' => '228',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2261',
            'name' => 'El Espino',
            'code' => 'COL15248',
            'idowner' => '21',
            'order' => '229',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2262',
            'name' => 'Firavitoba',
            'code' => 'COL15272',
            'idowner' => '21',
            'order' => '230',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2263',
            'name' => 'Floresta',
            'code' => 'COL15276',
            'idowner' => '21',
            'order' => '231',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2264',
            'name' => 'Gachantiva',
            'code' => 'COL15293',
            'idowner' => '21',
            'order' => '232',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2265',
            'name' => 'Gameza',
            'code' => 'COL15296',
            'idowner' => '21',
            'order' => '233',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2266',
            'name' => 'Garagoa',
            'code' => 'COL15299',
            'idowner' => '21',
            'order' => '234',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2267',
            'name' => 'Guacamayas',
            'code' => 'COL15317',
            'idowner' => '21',
            'order' => '235',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2268',
            'name' => 'Guateque',
            'code' => 'COL15322',
            'idowner' => '21',
            'order' => '236',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2269',
            'name' => 'Guayata',
            'code' => 'COL15325',
            'idowner' => '21',
            'order' => '237',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2270',
            'name' => 'Gsican',
            'code' => 'COL15332',
            'idowner' => '21',
            'order' => '238',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2271',
            'name' => 'Iza',
            'code' => 'COL15362',
            'idowner' => '21',
            'order' => '239',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2272',
            'name' => 'Jenesano',
            'code' => 'COL15367',
            'idowner' => '21',
            'order' => '240',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2273',
            'name' => 'Jerico',
            'code' => 'COL15368',
            'idowner' => '21',
            'order' => '241',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2274',
            'name' => 'Labranzagrande',
            'code' => 'COL15377',
            'idowner' => '21',
            'order' => '242',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2275',
            'name' => 'La Capilla',
            'code' => 'COL15380',
            'idowner' => '21',
            'order' => '243',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2276',
            'name' => 'La Victoria',
            'code' => 'COL15401',
            'idowner' => '21',
            'order' => '244',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2277',
            'name' => 'La Uvita',
            'code' => 'COL15403',
            'idowner' => '21',
            'order' => '245',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2278',
            'name' => 'Villa de Leyva',
            'code' => 'COL15407',
            'idowner' => '21',
            'order' => '246',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2279',
            'name' => 'Macanal',
            'code' => 'COL15425',
            'idowner' => '21',
            'order' => '247',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2280',
            'name' => 'Maripi',
            'code' => 'COL15442',
            'idowner' => '21',
            'order' => '248',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2281',
            'name' => 'Miraflores',
            'code' => 'COL15455',
            'idowner' => '21',
            'order' => '249',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2282',
            'name' => 'Mongua',
            'code' => 'COL15464',
            'idowner' => '21',
            'order' => '250',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2283',
            'name' => 'Mongui',
            'code' => 'COL15466',
            'idowner' => '21',
            'order' => '251',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2284',
            'name' => 'Moniquira',
            'code' => 'COL15469',
            'idowner' => '21',
            'order' => '252',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2285',
            'name' => 'Motavita',
            'code' => 'COL15476',
            'idowner' => '21',
            'order' => '253',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2286',
            'name' => 'Muzo',
            'code' => 'COL15480',
            'idowner' => '21',
            'order' => '254',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2287',
            'name' => 'Nobsa',
            'code' => 'COL15491',
            'idowner' => '21',
            'order' => '255',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2288',
            'name' => 'Nuevo Colon',
            'code' => 'COL15494',
            'idowner' => '21',
            'order' => '256',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2289',
            'name' => 'Oicata',
            'code' => 'COL15500',
            'idowner' => '21',
            'order' => '257',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2290',
            'name' => 'Otanche',
            'code' => 'COL15507',
            'idowner' => '21',
            'order' => '258',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2291',
            'name' => 'Pachavita',
            'code' => 'COL15511',
            'idowner' => '21',
            'order' => '259',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2292',
            'name' => 'Paez',
            'code' => 'COL15514',
            'idowner' => '21',
            'order' => '260',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2293',
            'name' => 'Paipa',
            'code' => 'COL15516',
            'idowner' => '21',
            'order' => '261',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2294',
            'name' => 'Pajarito',
            'code' => 'COL15518',
            'idowner' => '21',
            'order' => '262',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2295',
            'name' => 'Panqueba',
            'code' => 'COL15522',
            'idowner' => '21',
            'order' => '263',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2296',
            'name' => 'Pauna',
            'code' => 'COL15531',
            'idowner' => '21',
            'order' => '264',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2297',
            'name' => 'Paya',
            'code' => 'COL15533',
            'idowner' => '21',
            'order' => '265',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2298',
            'name' => 'Paz de Rio',
            'code' => 'COL15537',
            'idowner' => '21',
            'order' => '266',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2299',
            'name' => 'Pesca',
            'code' => 'COL15542',
            'idowner' => '21',
            'order' => '267',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2300',
            'name' => 'Pisba',
            'code' => 'COL15550',
            'idowner' => '21',
            'order' => '268',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2301',
            'name' => 'Puerto Boyaca',
            'code' => 'COL15572',
            'idowner' => '21',
            'order' => '269',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2302',
            'name' => 'Quipama',
            'code' => 'COL15580',
            'idowner' => '21',
            'order' => '270',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2303',
            'name' => 'Ramiriqui',
            'code' => 'COL15599',
            'idowner' => '21',
            'order' => '271',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2304',
            'name' => 'Raquira',
            'code' => 'COL15600',
            'idowner' => '21',
            'order' => '272',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2305',
            'name' => 'Rondon',
            'code' => 'COL15621',
            'idowner' => '21',
            'order' => '273',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2306',
            'name' => 'Saboya',
            'code' => 'COL15632',
            'idowner' => '21',
            'order' => '274',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2307',
            'name' => 'Sachica',
            'code' => 'COL15638',
            'idowner' => '21',
            'order' => '275',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2308',
            'name' => 'Samaca',
            'code' => 'COL15646',
            'idowner' => '21',
            'order' => '276',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2309',
            'name' => 'San Eduardo',
            'code' => 'COL15660',
            'idowner' => '21',
            'order' => '277',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2310',
            'name' => 'San Jose de Pare',
            'code' => 'COL15664',
            'idowner' => '21',
            'order' => '278',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2311',
            'name' => 'San Luis de Gaceno',
            'code' => 'COL15667',
            'idowner' => '21',
            'order' => '279',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2312',
            'name' => 'San Mateo',
            'code' => 'COL15673',
            'idowner' => '21',
            'order' => '280',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2313',
            'name' => 'San Miguel de Sema',
            'code' => 'COL15676',
            'idowner' => '21',
            'order' => '281',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2314',
            'name' => 'San Pablo de Borbur',
            'code' => 'COL15681',
            'idowner' => '21',
            'order' => '282',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2315',
            'name' => 'Santana',
            'code' => 'COL15686',
            'idowner' => '21',
            'order' => '283',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2316',
            'name' => 'Santa Maria',
            'code' => 'COL15690',
            'idowner' => '21',
            'order' => '284',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2317',
            'name' => 'Santa Rosa de Viterbo',
            'code' => 'COL15693',
            'idowner' => '21',
            'order' => '285',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2318',
            'name' => 'Santa Sofia',
            'code' => 'COL15696',
            'idowner' => '21',
            'order' => '286',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2319',
            'name' => 'Sativanorte',
            'code' => 'COL15720',
            'idowner' => '21',
            'order' => '287',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2320',
            'name' => 'Sativasur',
            'code' => 'COL15723',
            'idowner' => '21',
            'order' => '288',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2321',
            'name' => 'Siachoque',
            'code' => 'COL15740',
            'idowner' => '21',
            'order' => '289',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2322',
            'name' => 'Soata',
            'code' => 'COL15753',
            'idowner' => '21',
            'order' => '290',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2323',
            'name' => 'Socota',
            'code' => 'COL15755',
            'idowner' => '21',
            'order' => '291',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2324',
            'name' => 'Socha',
            'code' => 'COL15757',
            'idowner' => '21',
            'order' => '292',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2325',
            'name' => 'Sogamoso',
            'code' => 'COL15759',
            'idowner' => '21',
            'order' => '293',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2326',
            'name' => 'Somondoco',
            'code' => 'COL15761',
            'idowner' => '21',
            'order' => '294',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2327',
            'name' => 'Sora',
            'code' => 'COL15762',
            'idowner' => '21',
            'order' => '295',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2328',
            'name' => 'Sotaquira',
            'code' => 'COL15763',
            'idowner' => '21',
            'order' => '296',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2329',
            'name' => 'Soraca',
            'code' => 'COL15764',
            'idowner' => '21',
            'order' => '297',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2330',
            'name' => 'Susacon',
            'code' => 'COL15774',
            'idowner' => '21',
            'order' => '298',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2331',
            'name' => 'Sutamarchan',
            'code' => 'COL15776',
            'idowner' => '21',
            'order' => '299',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2332',
            'name' => 'Sutatenza',
            'code' => 'COL15778',
            'idowner' => '21',
            'order' => '300',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2333',
            'name' => 'Tasco',
            'code' => 'COL15790',
            'idowner' => '21',
            'order' => '301',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2334',
            'name' => 'Tenza',
            'code' => 'COL15798',
            'idowner' => '21',
            'order' => '302',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2335',
            'name' => 'Tibana',
            'code' => 'COL15804',
            'idowner' => '21',
            'order' => '303',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2336',
            'name' => 'Tibasosa',
            'code' => 'COL15806',
            'idowner' => '21',
            'order' => '304',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2337',
            'name' => 'Tinjaca',
            'code' => 'COL15808',
            'idowner' => '21',
            'order' => '305',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2338',
            'name' => 'Tipacoque',
            'code' => 'COL15810',
            'idowner' => '21',
            'order' => '306',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2339',
            'name' => 'Toca',
            'code' => 'COL15814',
            'idowner' => '21',
            'order' => '307',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2340',
            'name' => 'Togsi',
            'code' => 'COL15816',
            'idowner' => '21',
            'order' => '308',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2341',
            'name' => 'Topaga',
            'code' => 'COL15820',
            'idowner' => '21',
            'order' => '309',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2342',
            'name' => 'Tota',
            'code' => 'COL15822',
            'idowner' => '21',
            'order' => '310',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2343',
            'name' => 'Tunungua',
            'code' => 'COL15832',
            'idowner' => '21',
            'order' => '311',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2344',
            'name' => 'Turmeque',
            'code' => 'COL15835',
            'idowner' => '21',
            'order' => '312',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2345',
            'name' => 'Tuta',
            'code' => 'COL15837',
            'idowner' => '21',
            'order' => '313',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2346',
            'name' => 'Tutaza',
            'code' => 'COL15839',
            'idowner' => '21',
            'order' => '314',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2347',
            'name' => 'Umbita',
            'code' => 'COL15842',
            'idowner' => '21',
            'order' => '315',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2348',
            'name' => 'Ventaquemada',
            'code' => 'COL15861',
            'idowner' => '21',
            'order' => '316',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2349',
            'name' => 'Viracacha',
            'code' => 'COL15879',
            'idowner' => '21',
            'order' => '317',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2350',
            'name' => 'Zetaquira',
            'code' => 'COL15897',
            'idowner' => '21',
            'order' => '318',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2351',
            'name' => 'Manizales',
            'code' => 'COL17001',
            'idowner' => '21',
            'order' => '319',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2352',
            'name' => 'Aguadas',
            'code' => 'COL17013',
            'idowner' => '21',
            'order' => '320',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2353',
            'name' => 'Anserma',
            'code' => 'COL17042',
            'idowner' => '21',
            'order' => '321',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2354',
            'name' => 'Aranzazu',
            'code' => 'COL17050',
            'idowner' => '21',
            'order' => '322',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2355',
            'name' => 'Belalcazar',
            'code' => 'COL17088',
            'idowner' => '21',
            'order' => '323',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2356',
            'name' => 'Chinchina',
            'code' => 'COL17174',
            'idowner' => '21',
            'order' => '324',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2357',
            'name' => 'Filadelfia',
            'code' => 'COL17272',
            'idowner' => '21',
            'order' => '325',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2358',
            'name' => 'La Dorada',
            'code' => 'COL17380',
            'idowner' => '21',
            'order' => '326',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2359',
            'name' => 'La Merced',
            'code' => 'COL17388',
            'idowner' => '21',
            'order' => '327',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2360',
            'name' => 'Manzanares',
            'code' => 'COL17433',
            'idowner' => '21',
            'order' => '328',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2361',
            'name' => 'Marmato',
            'code' => 'COL17442',
            'idowner' => '21',
            'order' => '329',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2362',
            'name' => 'Marquetalia',
            'code' => 'COL17444',
            'idowner' => '21',
            'order' => '330',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2363',
            'name' => 'Marulanda',
            'code' => 'COL17446',
            'idowner' => '21',
            'order' => '331',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2364',
            'name' => 'Neira',
            'code' => 'COL17486',
            'idowner' => '21',
            'order' => '332',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2365',
            'name' => 'Norcasia',
            'code' => 'COL17495',
            'idowner' => '21',
            'order' => '333',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2366',
            'name' => 'Pacora',
            'code' => 'COL17513',
            'idowner' => '21',
            'order' => '334',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2367',
            'name' => 'Palestina',
            'code' => 'COL17524',
            'idowner' => '21',
            'order' => '335',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2368',
            'name' => 'Pensilvania',
            'code' => 'COL17541',
            'idowner' => '21',
            'order' => '336',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2369',
            'name' => 'Riosucio',
            'code' => 'COL17614',
            'idowner' => '21',
            'order' => '337',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2370',
            'name' => 'Risaralda',
            'code' => 'COL17616',
            'idowner' => '21',
            'order' => '338',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2371',
            'name' => 'Salamina',
            'code' => 'COL17653',
            'idowner' => '21',
            'order' => '339',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2372',
            'name' => 'Samana',
            'code' => 'COL17662',
            'idowner' => '21',
            'order' => '340',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2373',
            'name' => 'San Jose',
            'code' => 'COL17665',
            'idowner' => '21',
            'order' => '341',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2374',
            'name' => 'Supia',
            'code' => 'COL17777',
            'idowner' => '21',
            'order' => '342',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2375',
            'name' => 'Victoria',
            'code' => 'COL17867',
            'idowner' => '21',
            'order' => '343',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2376',
            'name' => 'Villamaria',
            'code' => 'COL17873',
            'idowner' => '21',
            'order' => '344',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2377',
            'name' => 'Viterbo',
            'code' => 'COL17877',
            'idowner' => '21',
            'order' => '345',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2378',
            'name' => 'Florencia',
            'code' => 'COL18001',
            'idowner' => '21',
            'order' => '346',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2379',
            'name' => 'Albania',
            'code' => 'COL18029',
            'idowner' => '21',
            'order' => '347',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2380',
            'name' => 'Belen de los Andaquies',
            'code' => 'COL18094',
            'idowner' => '21',
            'order' => '348',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2381',
            'name' => 'Cartagena de Chaira',
            'code' => 'COL18150',
            'idowner' => '21',
            'order' => '349',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2382',
            'name' => 'Curillo',
            'code' => 'COL18205',
            'idowner' => '21',
            'order' => '350',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2383',
            'name' => 'El Doncello',
            'code' => 'COL18247',
            'idowner' => '21',
            'order' => '351',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2384',
            'name' => 'El Paujil',
            'code' => 'COL18256',
            'idowner' => '21',
            'order' => '352',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2385',
            'name' => 'La Montañita',
            'code' => 'COL18410',
            'idowner' => '21',
            'order' => '353',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2386',
            'name' => 'Milan',
            'code' => 'COL18460',
            'idowner' => '21',
            'order' => '354',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2387',
            'name' => 'Morelia',
            'code' => 'COL18479',
            'idowner' => '21',
            'order' => '355',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2388',
            'name' => 'Puerto Rico',
            'code' => 'COL18592',
            'idowner' => '21',
            'order' => '356',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2389',
            'name' => 'San Jose de Fragua',
            'code' => 'COL18610',
            'idowner' => '21',
            'order' => '357',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2390',
            'name' => 'San Vicente de Caguan',
            'code' => 'COL18753',
            'idowner' => '21',
            'order' => '358',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2391',
            'name' => 'Solano',
            'code' => 'COL18756',
            'idowner' => '21',
            'order' => '359',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2392',
            'name' => 'Solita',
            'code' => 'COL18785',
            'idowner' => '21',
            'order' => '360',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2393',
            'name' => 'Valparaiso',
            'code' => 'COL18860',
            'idowner' => '21',
            'order' => '361',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2394',
            'name' => 'Popayan',
            'code' => 'COL19001',
            'idowner' => '21',
            'order' => '362',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2395',
            'name' => 'Almaguer',
            'code' => 'COL19022',
            'idowner' => '21',
            'order' => '363',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2396',
            'name' => 'Argelia',
            'code' => 'COL19050',
            'idowner' => '21',
            'order' => '364',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2397',
            'name' => 'Balboa',
            'code' => 'COL19075',
            'idowner' => '21',
            'order' => '365',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2398',
            'name' => 'Bolivar',
            'code' => 'COL19100',
            'idowner' => '21',
            'order' => '366',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2399',
            'name' => 'Buenos Aires',
            'code' => 'COL19110',
            'idowner' => '21',
            'order' => '367',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2400',
            'name' => 'Cajibio',
            'code' => 'COL19130',
            'idowner' => '21',
            'order' => '368',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2401',
            'name' => 'Caldono',
            'code' => 'COL19137',
            'idowner' => '21',
            'order' => '369',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2402',
            'name' => 'Caloto',
            'code' => 'COL19142',
            'idowner' => '21',
            'order' => '370',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2403',
            'name' => 'Corinto',
            'code' => 'COL19212',
            'idowner' => '21',
            'order' => '371',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2404',
            'name' => 'El Tambo',
            'code' => 'COL19256',
            'idowner' => '21',
            'order' => '372',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2405',
            'name' => 'Florencia',
            'code' => 'COL19290',
            'idowner' => '21',
            'order' => '373',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2406',
            'name' => 'Guachene',
            'code' => 'COL19300',
            'idowner' => '21',
            'order' => '374',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2407',
            'name' => 'Guapi',
            'code' => 'COL19318',
            'idowner' => '21',
            'order' => '375',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2408',
            'name' => 'Inza',
            'code' => 'COL19355',
            'idowner' => '21',
            'order' => '376',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2409',
            'name' => 'Jambalo',
            'code' => 'COL19364',
            'idowner' => '21',
            'order' => '377',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2410',
            'name' => 'La Sierra',
            'code' => 'COL19392',
            'idowner' => '21',
            'order' => '378',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2411',
            'name' => 'La Vega',
            'code' => 'COL19397',
            'idowner' => '21',
            'order' => '379',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2412',
            'name' => 'Lopez',
            'code' => 'COL19418',
            'idowner' => '21',
            'order' => '380',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2413',
            'name' => 'Mercaderes',
            'code' => 'COL19450',
            'idowner' => '21',
            'order' => '381',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2414',
            'name' => 'Miranda',
            'code' => 'COL19455',
            'idowner' => '21',
            'order' => '382',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2415',
            'name' => 'Morales',
            'code' => 'COL19473',
            'idowner' => '21',
            'order' => '383',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2416',
            'name' => 'Padilla',
            'code' => 'COL19513',
            'idowner' => '21',
            'order' => '384',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2417',
            'name' => 'Paez',
            'code' => 'COL19517',
            'idowner' => '21',
            'order' => '385',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2418',
            'name' => 'Patia',
            'code' => 'COL19532',
            'idowner' => '21',
            'order' => '386',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2419',
            'name' => 'Piamonte',
            'code' => 'COL19533',
            'idowner' => '21',
            'order' => '387',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2420',
            'name' => 'Piendamo',
            'code' => 'COL19548',
            'idowner' => '21',
            'order' => '388',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2421',
            'name' => 'Puerto Tejada',
            'code' => 'COL19573',
            'idowner' => '21',
            'order' => '389',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2422',
            'name' => 'Purace',
            'code' => 'COL19585',
            'idowner' => '21',
            'order' => '390',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2423',
            'name' => 'Rosas',
            'code' => 'COL19622',
            'idowner' => '21',
            'order' => '391',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2424',
            'name' => 'San Sebastian',
            'code' => 'COL19693',
            'idowner' => '21',
            'order' => '392',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2425',
            'name' => 'Santander de Quilichao',
            'code' => 'COL19698',
            'idowner' => '21',
            'order' => '393',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2426',
            'name' => 'Santa Rosa',
            'code' => 'COL19701',
            'idowner' => '21',
            'order' => '394',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2427',
            'name' => 'Silvia',
            'code' => 'COL19743',
            'idowner' => '21',
            'order' => '395',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2428',
            'name' => 'Sotara',
            'code' => 'COL19760',
            'idowner' => '21',
            'order' => '396',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2429',
            'name' => 'Suarez',
            'code' => 'COL19780',
            'idowner' => '21',
            'order' => '397',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2430',
            'name' => 'Sucre',
            'code' => 'COL19785',
            'idowner' => '21',
            'order' => '398',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2431',
            'name' => 'Timbio',
            'code' => 'COL19807',
            'idowner' => '21',
            'order' => '399',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2432',
            'name' => 'Timbiqui',
            'code' => 'COL19809',
            'idowner' => '21',
            'order' => '400',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2433',
            'name' => 'Toribio',
            'code' => 'COL19821',
            'idowner' => '21',
            'order' => '401',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2434',
            'name' => 'Totoro',
            'code' => 'COL19824',
            'idowner' => '21',
            'order' => '402',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2435',
            'name' => 'Villa Rica',
            'code' => 'COL19845',
            'idowner' => '21',
            'order' => '403',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2436',
            'name' => 'Valledupar',
            'code' => 'COL20001',
            'idowner' => '21',
            'order' => '404',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2437',
            'name' => 'Aguachica',
            'code' => 'COL20011',
            'idowner' => '21',
            'order' => '405',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2438',
            'name' => 'Agustin Codazzi',
            'code' => 'COL20013',
            'idowner' => '21',
            'order' => '406',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2439',
            'name' => 'Astrea',
            'code' => 'COL20032',
            'idowner' => '21',
            'order' => '407',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2440',
            'name' => 'Becerril',
            'code' => 'COL20045',
            'idowner' => '21',
            'order' => '408',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2441',
            'name' => 'Bosconia',
            'code' => 'COL20060',
            'idowner' => '21',
            'order' => '409',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2442',
            'name' => 'Chimichagua',
            'code' => 'COL20175',
            'idowner' => '21',
            'order' => '410',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2443',
            'name' => 'Chiriguana',
            'code' => 'COL20178',
            'idowner' => '21',
            'order' => '411',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2444',
            'name' => 'Curumani',
            'code' => 'COL20228',
            'idowner' => '21',
            'order' => '412',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2445',
            'name' => 'El Copey',
            'code' => 'COL20238',
            'idowner' => '21',
            'order' => '413',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2446',
            'name' => 'El Paso',
            'code' => 'COL20250',
            'idowner' => '21',
            'order' => '414',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2447',
            'name' => 'Gamarra',
            'code' => 'COL20295',
            'idowner' => '21',
            'order' => '415',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2448',
            'name' => 'Gonzalez',
            'code' => 'COL20310',
            'idowner' => '21',
            'order' => '416',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2449',
            'name' => 'La Gloria',
            'code' => 'COL20383',
            'idowner' => '21',
            'order' => '417',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2450',
            'name' => 'La Jagua de Ibirico',
            'code' => 'COL20400',
            'idowner' => '21',
            'order' => '418',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2451',
            'name' => 'Manaure',
            'code' => 'COL20443',
            'idowner' => '21',
            'order' => '419',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2452',
            'name' => 'Pailitas',
            'code' => 'COL20517',
            'idowner' => '21',
            'order' => '420',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2453',
            'name' => 'Pelaya',
            'code' => 'COL20550',
            'idowner' => '21',
            'order' => '421',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2454',
            'name' => 'Pueblo Bello',
            'code' => 'COL20570',
            'idowner' => '21',
            'order' => '422',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2455',
            'name' => 'Rio de Oro',
            'code' => 'COL20614',
            'idowner' => '21',
            'order' => '423',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2456',
            'name' => 'La Paz',
            'code' => 'COL20621',
            'idowner' => '21',
            'order' => '424',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2457',
            'name' => 'San Alberto',
            'code' => 'COL20710',
            'idowner' => '21',
            'order' => '425',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2458',
            'name' => 'San Diego',
            'code' => 'COL20750',
            'idowner' => '21',
            'order' => '426',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2459',
            'name' => 'San Martin',
            'code' => 'COL20770',
            'idowner' => '21',
            'order' => '427',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2460',
            'name' => 'Tamalameque',
            'code' => 'COL20787',
            'idowner' => '21',
            'order' => '428',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2461',
            'name' => 'Monteria',
            'code' => 'COL23001',
            'idowner' => '21',
            'order' => '429',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2462',
            'name' => 'Ayapel',
            'code' => 'COL23068',
            'idowner' => '21',
            'order' => '430',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2463',
            'name' => 'Buenavista',
            'code' => 'COL23079',
            'idowner' => '21',
            'order' => '431',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2464',
            'name' => 'Canalete',
            'code' => 'COL23090',
            'idowner' => '21',
            'order' => '432',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2465',
            'name' => 'Cerete',
            'code' => 'COL23162',
            'idowner' => '21',
            'order' => '433',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2466',
            'name' => 'Chima',
            'code' => 'COL23168',
            'idowner' => '21',
            'order' => '434',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2467',
            'name' => 'Chinu',
            'code' => 'COL23182',
            'idowner' => '21',
            'order' => '435',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2468',
            'name' => 'Cienaga de Oro',
            'code' => 'COL23189',
            'idowner' => '21',
            'order' => '436',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2469',
            'name' => 'Cotorra',
            'code' => 'COL23300',
            'idowner' => '21',
            'order' => '437',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2470',
            'name' => 'La Apartada',
            'code' => 'COL23350',
            'idowner' => '21',
            'order' => '438',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2471',
            'name' => 'Lorica',
            'code' => 'COL23417',
            'idowner' => '21',
            'order' => '439',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2472',
            'name' => 'Los Cordobas',
            'code' => 'COL23419',
            'idowner' => '21',
            'order' => '440',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2473',
            'name' => 'Momil',
            'code' => 'COL23464',
            'idowner' => '21',
            'order' => '441',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2474',
            'name' => 'Montelibano',
            'code' => 'COL23466',
            'idowner' => '21',
            'order' => '442',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2475',
            'name' => 'Moñitos',
            'code' => 'COL23500',
            'idowner' => '21',
            'order' => '443',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2476',
            'name' => 'Planeta Rica',
            'code' => 'COL23555',
            'idowner' => '21',
            'order' => '444',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2477',
            'name' => 'Pueblo Nuevo',
            'code' => 'COL23570',
            'idowner' => '21',
            'order' => '445',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2478',
            'name' => 'Puerto Escondido',
            'code' => 'COL23574',
            'idowner' => '21',
            'order' => '446',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2479',
            'name' => 'Puerto Libertador',
            'code' => 'COL23580',
            'idowner' => '21',
            'order' => '447',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2480',
            'name' => 'Purisima',
            'code' => 'COL23586',
            'idowner' => '21',
            'order' => '448',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2481',
            'name' => 'Sahagun',
            'code' => 'COL23660',
            'idowner' => '21',
            'order' => '449',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2482',
            'name' => 'San Andres Sotavento',
            'code' => 'COL23670',
            'idowner' => '21',
            'order' => '450',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2483',
            'name' => 'San Antero',
            'code' => 'COL23672',
            'idowner' => '21',
            'order' => '451',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2484',
            'name' => 'San Bernardo de Viento',
            'code' => 'COL23675',
            'idowner' => '21',
            'order' => '452',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2485',
            'name' => 'San Carlos',
            'code' => 'COL23678',
            'idowner' => '21',
            'order' => '453',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2486',
            'name' => 'San Pelayo',
            'code' => 'COL23686',
            'idowner' => '21',
            'order' => '454',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2487',
            'name' => 'Tierralta',
            'code' => 'COL23807',
            'idowner' => '21',
            'order' => '455',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2488',
            'name' => 'Valencia',
            'code' => 'COL23855',
            'idowner' => '21',
            'order' => '456',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2489',
            'name' => 'Agua de Dios',
            'code' => 'COL25001',
            'idowner' => '21',
            'order' => '457',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2490',
            'name' => 'Alban',
            'code' => 'COL25019',
            'idowner' => '21',
            'order' => '458',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2491',
            'name' => 'Anapoima',
            'code' => 'COL25035',
            'idowner' => '21',
            'order' => '459',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2492',
            'name' => 'Anolaima',
            'code' => 'COL25040',
            'idowner' => '21',
            'order' => '460',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2493',
            'name' => 'Arbelaez',
            'code' => 'COL25053',
            'idowner' => '21',
            'order' => '461',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2494',
            'name' => 'Beltran',
            'code' => 'COL25086',
            'idowner' => '21',
            'order' => '462',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2495',
            'name' => 'Bituima',
            'code' => 'COL25095',
            'idowner' => '21',
            'order' => '463',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2496',
            'name' => 'Bojaca',
            'code' => 'COL25099',
            'idowner' => '21',
            'order' => '464',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2497',
            'name' => 'Cabrera',
            'code' => 'COL25120',
            'idowner' => '21',
            'order' => '465',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2498',
            'name' => 'Cachipay',
            'code' => 'COL25123',
            'idowner' => '21',
            'order' => '466',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2499',
            'name' => 'Cajica',
            'code' => 'COL25126',
            'idowner' => '21',
            'order' => '467',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2500',
            'name' => 'Caparrapi',
            'code' => 'COL25148',
            'idowner' => '21',
            'order' => '468',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2501',
            'name' => 'Caqueza',
            'code' => 'COL25151',
            'idowner' => '21',
            'order' => '469',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2502',
            'name' => 'Carmen de Carupa',
            'code' => 'COL25154',
            'idowner' => '21',
            'order' => '470',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2503',
            'name' => 'Chaguani',
            'code' => 'COL25168',
            'idowner' => '21',
            'order' => '471',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2504',
            'name' => 'Chia',
            'code' => 'COL25175',
            'idowner' => '21',
            'order' => '472',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2505',
            'name' => 'Chipaque',
            'code' => 'COL25178',
            'idowner' => '21',
            'order' => '473',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2506',
            'name' => 'Choachi',
            'code' => 'COL25181',
            'idowner' => '21',
            'order' => '474',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2507',
            'name' => 'Choconta',
            'code' => 'COL25183',
            'idowner' => '21',
            'order' => '475',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2508',
            'name' => 'Cogua',
            'code' => 'COL25200',
            'idowner' => '21',
            'order' => '476',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2509',
            'name' => 'Cota',
            'code' => 'COL25214',
            'idowner' => '21',
            'order' => '477',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2510',
            'name' => 'Cucunuba',
            'code' => 'COL25224',
            'idowner' => '21',
            'order' => '478',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2511',
            'name' => 'El Colegio',
            'code' => 'COL25245',
            'idowner' => '21',
            'order' => '479',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2512',
            'name' => 'El Peñon',
            'code' => 'COL25258',
            'idowner' => '21',
            'order' => '480',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2513',
            'name' => 'El Rosal',
            'code' => 'COL25260',
            'idowner' => '21',
            'order' => '481',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2514',
            'name' => 'Facatativa',
            'code' => 'COL25269',
            'idowner' => '21',
            'order' => '482',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2515',
            'name' => 'Fomeque',
            'code' => 'COL25279',
            'idowner' => '21',
            'order' => '483',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2516',
            'name' => 'Fosca',
            'code' => 'COL25281',
            'idowner' => '21',
            'order' => '484',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2517',
            'name' => 'Funza',
            'code' => 'COL25286',
            'idowner' => '21',
            'order' => '485',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2518',
            'name' => 'Fuquene',
            'code' => 'COL25288',
            'idowner' => '21',
            'order' => '486',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2519',
            'name' => 'Fusagasuga',
            'code' => 'COL25290',
            'idowner' => '21',
            'order' => '487',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2520',
            'name' => 'Gachala',
            'code' => 'COL25293',
            'idowner' => '21',
            'order' => '488',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2521',
            'name' => 'Gachancipa',
            'code' => 'COL25295',
            'idowner' => '21',
            'order' => '489',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2522',
            'name' => 'Gacheta',
            'code' => 'COL25297',
            'idowner' => '21',
            'order' => '490',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2523',
            'name' => 'Gama',
            'code' => 'COL25299',
            'idowner' => '21',
            'order' => '491',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2524',
            'name' => 'Girardot',
            'code' => 'COL25307',
            'idowner' => '21',
            'order' => '492',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2525',
            'name' => 'Granada',
            'code' => 'COL25312',
            'idowner' => '21',
            'order' => '493',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2526',
            'name' => 'Guacheta',
            'code' => 'COL25317',
            'idowner' => '21',
            'order' => '494',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2527',
            'name' => 'Guaduas',
            'code' => 'COL25320',
            'idowner' => '21',
            'order' => '495',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2528',
            'name' => 'Guasca',
            'code' => 'COL25322',
            'idowner' => '21',
            'order' => '496',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2529',
            'name' => 'Guataqui',
            'code' => 'COL25324',
            'idowner' => '21',
            'order' => '497',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2530',
            'name' => 'Guatavita',
            'code' => 'COL25326',
            'idowner' => '21',
            'order' => '498',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2531',
            'name' => 'Guayabal de Siquima',
            'code' => 'COL25328',
            'idowner' => '21',
            'order' => '499',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2532',
            'name' => 'Guayabetal',
            'code' => 'COL25335',
            'idowner' => '21',
            'order' => '500',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2533',
            'name' => 'Gutierrez',
            'code' => 'COL25339',
            'idowner' => '21',
            'order' => '501',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2534',
            'name' => 'Jerusalen',
            'code' => 'COL25368',
            'idowner' => '21',
            'order' => '502',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2535',
            'name' => 'Junin',
            'code' => 'COL25372',
            'idowner' => '21',
            'order' => '503',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2536',
            'name' => 'La Calera',
            'code' => 'COL25377',
            'idowner' => '21',
            'order' => '504',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2537',
            'name' => 'La Mesa',
            'code' => 'COL25386',
            'idowner' => '21',
            'order' => '505',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2538',
            'name' => 'La Palma',
            'code' => 'COL25394',
            'idowner' => '21',
            'order' => '506',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2539',
            'name' => 'La Peña',
            'code' => 'COL25398',
            'idowner' => '21',
            'order' => '507',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2540',
            'name' => 'La Vega',
            'code' => 'COL25402',
            'idowner' => '21',
            'order' => '508',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2541',
            'name' => 'Lenguazaque',
            'code' => 'COL25407',
            'idowner' => '21',
            'order' => '509',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2542',
            'name' => 'Macheta',
            'code' => 'COL25426',
            'idowner' => '21',
            'order' => '510',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2543',
            'name' => 'Madrid',
            'code' => 'COL25430',
            'idowner' => '21',
            'order' => '511',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2544',
            'name' => 'Manta',
            'code' => 'COL25436',
            'idowner' => '21',
            'order' => '512',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2545',
            'name' => 'Medina',
            'code' => 'COL25438',
            'idowner' => '21',
            'order' => '513',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2546',
            'name' => 'Mosquera',
            'code' => 'COL25473',
            'idowner' => '21',
            'order' => '514',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2547',
            'name' => 'Nariño',
            'code' => 'COL25483',
            'idowner' => '21',
            'order' => '515',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2548',
            'name' => 'Nemocon',
            'code' => 'COL25486',
            'idowner' => '21',
            'order' => '516',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2549',
            'name' => 'Nilo',
            'code' => 'COL25488',
            'idowner' => '21',
            'order' => '517',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2550',
            'name' => 'Nimaima',
            'code' => 'COL25489',
            'idowner' => '21',
            'order' => '518',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2551',
            'name' => 'Nocaima',
            'code' => 'COL25491',
            'idowner' => '21',
            'order' => '519',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2552',
            'name' => 'Venecia',
            'code' => 'COL25506',
            'idowner' => '21',
            'order' => '520',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2553',
            'name' => 'Pacho',
            'code' => 'COL25513',
            'idowner' => '21',
            'order' => '521',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2554',
            'name' => 'Paime',
            'code' => 'COL25518',
            'idowner' => '21',
            'order' => '522',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2555',
            'name' => 'Pandi',
            'code' => 'COL25524',
            'idowner' => '21',
            'order' => '523',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2556',
            'name' => 'Paratebueno',
            'code' => 'COL25530',
            'idowner' => '21',
            'order' => '524',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2557',
            'name' => 'Pasca',
            'code' => 'COL25535',
            'idowner' => '21',
            'order' => '525',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2558',
            'name' => 'Puerto Salgar',
            'code' => 'COL25572',
            'idowner' => '21',
            'order' => '526',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2559',
            'name' => 'Puli',
            'code' => 'COL25580',
            'idowner' => '21',
            'order' => '527',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2560',
            'name' => 'Quebradanegra',
            'code' => 'COL25592',
            'idowner' => '21',
            'order' => '528',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2561',
            'name' => 'Quetame',
            'code' => 'COL25594',
            'idowner' => '21',
            'order' => '529',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2562',
            'name' => 'Quipile',
            'code' => 'COL25596',
            'idowner' => '21',
            'order' => '530',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2563',
            'name' => 'Apulo',
            'code' => 'COL25599',
            'idowner' => '21',
            'order' => '531',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2564',
            'name' => 'Ricaurte',
            'code' => 'COL25612',
            'idowner' => '21',
            'order' => '532',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2565',
            'name' => 'San Antonio de Tequendama',
            'code' => 'COL25645',
            'idowner' => '21',
            'order' => '533',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2566',
            'name' => 'San Bernardo',
            'code' => 'COL25649',
            'idowner' => '21',
            'order' => '534',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2567',
            'name' => 'San Cayetano',
            'code' => 'COL25653',
            'idowner' => '21',
            'order' => '535',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2568',
            'name' => 'San Francisco',
            'code' => 'COL25658',
            'idowner' => '21',
            'order' => '536',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2569',
            'name' => 'San Juan de Rio Seco',
            'code' => 'COL25662',
            'idowner' => '21',
            'order' => '537',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2570',
            'name' => 'Sasaima',
            'code' => 'COL25718',
            'idowner' => '21',
            'order' => '538',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2571',
            'name' => 'Sesquile',
            'code' => 'COL25736',
            'idowner' => '21',
            'order' => '539',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2572',
            'name' => 'Sibate',
            'code' => 'COL25740',
            'idowner' => '21',
            'order' => '540',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2573',
            'name' => 'Silvania',
            'code' => 'COL25743',
            'idowner' => '21',
            'order' => '541',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2574',
            'name' => 'Simijaca',
            'code' => 'COL25745',
            'idowner' => '21',
            'order' => '542',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2575',
            'name' => 'Soacha',
            'code' => 'COL25754',
            'idowner' => '21',
            'order' => '543',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2576',
            'name' => 'Sopo',
            'code' => 'COL25758',
            'idowner' => '21',
            'order' => '544',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2577',
            'name' => 'Subachoque',
            'code' => 'COL25769',
            'idowner' => '21',
            'order' => '545',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2578',
            'name' => 'Suesca',
            'code' => 'COL25772',
            'idowner' => '21',
            'order' => '546',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2579',
            'name' => 'Supata',
            'code' => 'COL25777',
            'idowner' => '21',
            'order' => '547',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2580',
            'name' => 'Susa',
            'code' => 'COL25779',
            'idowner' => '21',
            'order' => '548',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2581',
            'name' => 'Sutatausa',
            'code' => 'COL25781',
            'idowner' => '21',
            'order' => '549',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2582',
            'name' => 'Tabio',
            'code' => 'COL25785',
            'idowner' => '21',
            'order' => '550',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2583',
            'name' => 'Tausa',
            'code' => 'COL25793',
            'idowner' => '21',
            'order' => '551',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2584',
            'name' => 'Tena',
            'code' => 'COL25797',
            'idowner' => '21',
            'order' => '552',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2585',
            'name' => 'Tenjo',
            'code' => 'COL25799',
            'idowner' => '21',
            'order' => '553',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2586',
            'name' => 'Tibacuy',
            'code' => 'COL25805',
            'idowner' => '21',
            'order' => '554',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2587',
            'name' => 'Tibirita',
            'code' => 'COL25807',
            'idowner' => '21',
            'order' => '555',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2588',
            'name' => 'Tocaima',
            'code' => 'COL25815',
            'idowner' => '21',
            'order' => '556',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2589',
            'name' => 'Tocancipa',
            'code' => 'COL25817',
            'idowner' => '21',
            'order' => '557',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2590',
            'name' => 'Topaipi',
            'code' => 'COL25823',
            'idowner' => '21',
            'order' => '558',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2591',
            'name' => 'Ubala',
            'code' => 'COL25839',
            'idowner' => '21',
            'order' => '559',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2592',
            'name' => 'Ubaque',
            'code' => 'COL25841',
            'idowner' => '21',
            'order' => '560',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2593',
            'name' => 'Villa de San Diego de Ubate',
            'code' => 'COL25843',
            'idowner' => '21',
            'order' => '561',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2594',
            'name' => 'Une',
            'code' => 'COL25845',
            'idowner' => '21',
            'order' => '562',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2595',
            'name' => 'Utica',
            'code' => 'COL25851',
            'idowner' => '21',
            'order' => '563',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2596',
            'name' => 'Vergara',
            'code' => 'COL25862',
            'idowner' => '21',
            'order' => '564',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2597',
            'name' => 'Viani',
            'code' => 'COL25867',
            'idowner' => '21',
            'order' => '565',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2598',
            'name' => 'Villagomez',
            'code' => 'COL25871',
            'idowner' => '21',
            'order' => '566',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2599',
            'name' => 'Villapinzon',
            'code' => 'COL25873',
            'idowner' => '21',
            'order' => '567',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2600',
            'name' => 'Villeta',
            'code' => 'COL25875',
            'idowner' => '21',
            'order' => '568',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2601',
            'name' => 'Viota',
            'code' => 'COL25878',
            'idowner' => '21',
            'order' => '569',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2602',
            'name' => 'Yacopi',
            'code' => 'COL25885',
            'idowner' => '21',
            'order' => '570',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2603',
            'name' => 'Zipacon',
            'code' => 'COL25898',
            'idowner' => '21',
            'order' => '571',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2604',
            'name' => 'Zipaquira',
            'code' => 'COL25899',
            'idowner' => '21',
            'order' => '572',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2605',
            'name' => 'Quibdo',
            'code' => 'COL27001',
            'idowner' => '21',
            'order' => '573',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2606',
            'name' => 'Acandi',
            'code' => 'COL27006',
            'idowner' => '21',
            'order' => '574',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2607',
            'name' => 'Alto Baudo',
            'code' => 'COL27025',
            'idowner' => '21',
            'order' => '575',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2608',
            'name' => 'Atrato',
            'code' => 'COL27050',
            'idowner' => '21',
            'order' => '576',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2609',
            'name' => 'Bagado',
            'code' => 'COL27073',
            'idowner' => '21',
            'order' => '577',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2610',
            'name' => 'Bahia Solano',
            'code' => 'COL27075',
            'idowner' => '21',
            'order' => '578',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2611',
            'name' => 'Bajo Baudo',
            'code' => 'COL27077',
            'idowner' => '21',
            'order' => '579',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2612',
            'name' => 'Bojaya',
            'code' => 'COL27099',
            'idowner' => '21',
            'order' => '580',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2613',
            'name' => 'El Canton de San Pablo',
            'code' => 'COL27135',
            'idowner' => '21',
            'order' => '581',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2614',
            'name' => 'Carmen de Darien',
            'code' => 'COL27150',
            'idowner' => '21',
            'order' => '582',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2615',
            'name' => 'Certegui',
            'code' => 'COL27160',
            'idowner' => '21',
            'order' => '583',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2616',
            'name' => 'Condoto',
            'code' => 'COL27205',
            'idowner' => '21',
            'order' => '584',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2617',
            'name' => 'El Carmen de Atrato',
            'code' => 'COL27245',
            'idowner' => '21',
            'order' => '585',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2618',
            'name' => 'El Litoral de San Juan',
            'code' => 'COL27250',
            'idowner' => '21',
            'order' => '586',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2619',
            'name' => 'Istmina',
            'code' => 'COL27361',
            'idowner' => '21',
            'order' => '587',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2620',
            'name' => 'Jurado',
            'code' => 'COL27372',
            'idowner' => '21',
            'order' => '588',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2621',
            'name' => 'Lloro',
            'code' => 'COL27413',
            'idowner' => '21',
            'order' => '589',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2622',
            'name' => 'Medio Atrato',
            'code' => 'COL27425',
            'idowner' => '21',
            'order' => '590',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2623',
            'name' => 'Medio Baudo',
            'code' => 'COL27430',
            'idowner' => '21',
            'order' => '591',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2624',
            'name' => 'Medio San Juan',
            'code' => 'COL27450',
            'idowner' => '21',
            'order' => '592',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2625',
            'name' => 'Novita',
            'code' => 'COL27491',
            'idowner' => '21',
            'order' => '593',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2626',
            'name' => 'Nuqui',
            'code' => 'COL27495',
            'idowner' => '21',
            'order' => '594',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2627',
            'name' => 'Rio Iro',
            'code' => 'COL27580',
            'idowner' => '21',
            'order' => '595',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2628',
            'name' => 'Rio Quito',
            'code' => 'COL27600',
            'idowner' => '21',
            'order' => '596',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2629',
            'name' => 'Riosucio',
            'code' => 'COL27615',
            'idowner' => '21',
            'order' => '597',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2630',
            'name' => 'San Jose de Palmar',
            'code' => 'COL27660',
            'idowner' => '21',
            'order' => '598',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2631',
            'name' => 'Sipi',
            'code' => 'COL27745',
            'idowner' => '21',
            'order' => '599',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2632',
            'name' => 'Tado',
            'code' => 'COL27787',
            'idowner' => '21',
            'order' => '600',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2633',
            'name' => 'Unguia',
            'code' => 'COL27800',
            'idowner' => '21',
            'order' => '601',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2634',
            'name' => 'Union Panamericana',
            'code' => 'COL27810',
            'idowner' => '21',
            'order' => '602',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2635',
            'name' => 'Neiva',
            'code' => 'COL41001',
            'idowner' => '21',
            'order' => '603',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2636',
            'name' => 'Acevedo',
            'code' => 'COL41006',
            'idowner' => '21',
            'order' => '604',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2637',
            'name' => 'Agrado',
            'code' => 'COL41013',
            'idowner' => '21',
            'order' => '605',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2638',
            'name' => 'Aipe',
            'code' => 'COL41016',
            'idowner' => '21',
            'order' => '606',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2639',
            'name' => 'Algeciras',
            'code' => 'COL41020',
            'idowner' => '21',
            'order' => '607',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2640',
            'name' => 'Altamira',
            'code' => 'COL41026',
            'idowner' => '21',
            'order' => '608',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2641',
            'name' => 'Baraya',
            'code' => 'COL41078',
            'idowner' => '21',
            'order' => '609',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2642',
            'name' => 'Campoalegre',
            'code' => 'COL41132',
            'idowner' => '21',
            'order' => '610',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2643',
            'name' => 'Colombia',
            'code' => 'COL41206',
            'idowner' => '21',
            'order' => '611',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2644',
            'name' => 'Elias',
            'code' => 'COL41244',
            'idowner' => '21',
            'order' => '612',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2645',
            'name' => 'Garzon',
            'code' => 'COL41298',
            'idowner' => '21',
            'order' => '613',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2646',
            'name' => 'Gigante',
            'code' => 'COL41306',
            'idowner' => '21',
            'order' => '614',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2647',
            'name' => 'Guadalupe',
            'code' => 'COL41319',
            'idowner' => '21',
            'order' => '615',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2648',
            'name' => 'Hobo',
            'code' => 'COL41349',
            'idowner' => '21',
            'order' => '616',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2649',
            'name' => 'Iquira',
            'code' => 'COL41357',
            'idowner' => '21',
            'order' => '617',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2650',
            'name' => 'Isnos',
            'code' => 'COL41359',
            'idowner' => '21',
            'order' => '618',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2651',
            'name' => 'La Argentina',
            'code' => 'COL41378',
            'idowner' => '21',
            'order' => '619',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2652',
            'name' => 'La Plata',
            'code' => 'COL41396',
            'idowner' => '21',
            'order' => '620',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2653',
            'name' => 'Nataga',
            'code' => 'COL41483',
            'idowner' => '21',
            'order' => '621',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2654',
            'name' => 'Oporapa',
            'code' => 'COL41503',
            'idowner' => '21',
            'order' => '622',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2655',
            'name' => 'Paicol',
            'code' => 'COL41518',
            'idowner' => '21',
            'order' => '623',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2656',
            'name' => 'Palermo',
            'code' => 'COL41524',
            'idowner' => '21',
            'order' => '624',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2657',
            'name' => 'Palestina',
            'code' => 'COL41530',
            'idowner' => '21',
            'order' => '625',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2658',
            'name' => 'Pital',
            'code' => 'COL41548',
            'idowner' => '21',
            'order' => '626',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2659',
            'name' => 'Pitalito',
            'code' => 'COL41551',
            'idowner' => '21',
            'order' => '627',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2660',
            'name' => 'Rivera',
            'code' => 'COL41615',
            'idowner' => '21',
            'order' => '628',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2661',
            'name' => 'Saladoblanco',
            'code' => 'COL41660',
            'idowner' => '21',
            'order' => '629',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2662',
            'name' => 'San Agustin',
            'code' => 'COL41668',
            'idowner' => '21',
            'order' => '630',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2663',
            'name' => 'Santa Maria',
            'code' => 'COL41676',
            'idowner' => '21',
            'order' => '631',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2664',
            'name' => 'Suaza',
            'code' => 'COL41770',
            'idowner' => '21',
            'order' => '632',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2665',
            'name' => 'Tarqui',
            'code' => 'COL41791',
            'idowner' => '21',
            'order' => '633',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2666',
            'name' => 'Tesalia',
            'code' => 'COL41797',
            'idowner' => '21',
            'order' => '634',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2667',
            'name' => 'Tello',
            'code' => 'COL41799',
            'idowner' => '21',
            'order' => '635',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2668',
            'name' => 'Teruel',
            'code' => 'COL41801',
            'idowner' => '21',
            'order' => '636',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2669',
            'name' => 'Timana',
            'code' => 'COL41807',
            'idowner' => '21',
            'order' => '637',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2670',
            'name' => 'Villavieja',
            'code' => 'COL41872',
            'idowner' => '21',
            'order' => '638',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2671',
            'name' => 'Yaguara',
            'code' => 'COL41885',
            'idowner' => '21',
            'order' => '639',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2672',
            'name' => 'Riohacha',
            'code' => 'COL44001',
            'idowner' => '21',
            'order' => '640',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2673',
            'name' => 'Albania',
            'code' => 'COL44035',
            'idowner' => '21',
            'order' => '641',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2674',
            'name' => 'Barrancas',
            'code' => 'COL44078',
            'idowner' => '21',
            'order' => '642',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2675',
            'name' => 'Dibulla',
            'code' => 'COL44090',
            'idowner' => '21',
            'order' => '643',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2676',
            'name' => 'Distraccion',
            'code' => 'COL44098',
            'idowner' => '21',
            'order' => '644',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2677',
            'name' => 'El Molino',
            'code' => 'COL44110',
            'idowner' => '21',
            'order' => '645',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2678',
            'name' => 'Fonseca',
            'code' => 'COL44279',
            'idowner' => '21',
            'order' => '646',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2679',
            'name' => 'Hatonuevo',
            'code' => 'COL44378',
            'idowner' => '21',
            'order' => '647',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2680',
            'name' => 'La Jagua de Pilar',
            'code' => 'COL44420',
            'idowner' => '21',
            'order' => '648',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2681',
            'name' => 'Maicao',
            'code' => 'COL44430',
            'idowner' => '21',
            'order' => '649',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2682',
            'name' => 'Manaure',
            'code' => 'COL44560',
            'idowner' => '21',
            'order' => '650',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2683',
            'name' => 'San Juan de Cesar',
            'code' => 'COL44650',
            'idowner' => '21',
            'order' => '651',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2684',
            'name' => 'Uribia',
            'code' => 'COL44847',
            'idowner' => '21',
            'order' => '652',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2685',
            'name' => 'Urumita',
            'code' => 'COL44855',
            'idowner' => '21',
            'order' => '653',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2686',
            'name' => 'Villanueva',
            'code' => 'COL44874',
            'idowner' => '21',
            'order' => '654',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2687',
            'name' => 'Santa Marta',
            'code' => 'COL47001',
            'idowner' => '21',
            'order' => '655',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2688',
            'name' => 'Algarrobo',
            'code' => 'COL47030',
            'idowner' => '21',
            'order' => '656',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2689',
            'name' => 'Aracataca',
            'code' => 'COL47053',
            'idowner' => '21',
            'order' => '657',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2690',
            'name' => 'Ariguani',
            'code' => 'COL47058',
            'idowner' => '21',
            'order' => '658',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2691',
            'name' => 'Cerro San Antonio',
            'code' => 'COL47161',
            'idowner' => '21',
            'order' => '659',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2692',
            'name' => 'Chibolo',
            'code' => 'COL47170',
            'idowner' => '21',
            'order' => '660',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2693',
            'name' => 'Cienaga',
            'code' => 'COL47189',
            'idowner' => '21',
            'order' => '661',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2694',
            'name' => 'Concordia',
            'code' => 'COL47205',
            'idowner' => '21',
            'order' => '662',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2695',
            'name' => 'El Banco',
            'code' => 'COL47245',
            'idowner' => '21',
            'order' => '663',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2696',
            'name' => 'El Piñon',
            'code' => 'COL47258',
            'idowner' => '21',
            'order' => '664',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2697',
            'name' => 'El Reten',
            'code' => 'COL47268',
            'idowner' => '21',
            'order' => '665',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2698',
            'name' => 'Fundacion',
            'code' => 'COL47288',
            'idowner' => '21',
            'order' => '666',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2699',
            'name' => 'Guamal',
            'code' => 'COL47318',
            'idowner' => '21',
            'order' => '667',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2700',
            'name' => 'Nueva Granada',
            'code' => 'COL47460',
            'idowner' => '21',
            'order' => '668',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2701',
            'name' => 'Pedraza',
            'code' => 'COL47541',
            'idowner' => '21',
            'order' => '669',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2702',
            'name' => 'Pijiño de Carmen',
            'code' => 'COL47545',
            'idowner' => '21',
            'order' => '670',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2703',
            'name' => 'Pivijay',
            'code' => 'COL47551',
            'idowner' => '21',
            'order' => '671',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2704',
            'name' => 'Plato',
            'code' => 'COL47555',
            'idowner' => '21',
            'order' => '672',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2705',
            'name' => 'Puebloviejo',
            'code' => 'COL47570',
            'idowner' => '21',
            'order' => '673',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2706',
            'name' => 'Remolino',
            'code' => 'COL47605',
            'idowner' => '21',
            'order' => '674',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2707',
            'name' => 'Sabanas de San Angel',
            'code' => 'COL47660',
            'idowner' => '21',
            'order' => '675',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2708',
            'name' => 'Salamina',
            'code' => 'COL47675',
            'idowner' => '21',
            'order' => '676',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2709',
            'name' => 'San Sebastian de Buenavista',
            'code' => 'COL47692',
            'idowner' => '21',
            'order' => '677',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2710',
            'name' => 'San Zenon',
            'code' => 'COL47703',
            'idowner' => '21',
            'order' => '678',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2711',
            'name' => 'Santa Ana',
            'code' => 'COL47707',
            'idowner' => '21',
            'order' => '679',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2712',
            'name' => 'Santa Barbara de Pinto',
            'code' => 'COL47720',
            'idowner' => '21',
            'order' => '680',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2713',
            'name' => 'Sitionuevo',
            'code' => 'COL47745',
            'idowner' => '21',
            'order' => '681',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2714',
            'name' => 'Tenerife',
            'code' => 'COL47798',
            'idowner' => '21',
            'order' => '682',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2715',
            'name' => 'Zapayan',
            'code' => 'COL47960',
            'idowner' => '21',
            'order' => '683',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2716',
            'name' => 'Zona Bananera',
            'code' => 'COL47980',
            'idowner' => '21',
            'order' => '684',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2717',
            'name' => 'Villavicencio',
            'code' => 'COL50001',
            'idowner' => '21',
            'order' => '685',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2718',
            'name' => 'Acacias',
            'code' => 'COL50006',
            'idowner' => '21',
            'order' => '686',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2719',
            'name' => 'Barranca de Upia',
            'code' => 'COL50110',
            'idowner' => '21',
            'order' => '687',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2720',
            'name' => 'Cabuyaro',
            'code' => 'COL50124',
            'idowner' => '21',
            'order' => '688',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2721',
            'name' => 'Castilla La Nueva',
            'code' => 'COL50150',
            'idowner' => '21',
            'order' => '689',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2722',
            'name' => 'Cubarral',
            'code' => 'COL50223',
            'idowner' => '21',
            'order' => '690',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2723',
            'name' => 'Cumaral',
            'code' => 'COL50226',
            'idowner' => '21',
            'order' => '691',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2724',
            'name' => 'El Calvario',
            'code' => 'COL50245',
            'idowner' => '21',
            'order' => '692',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2725',
            'name' => 'El Castillo',
            'code' => 'COL50251',
            'idowner' => '21',
            'order' => '693',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2726',
            'name' => 'El Dorado',
            'code' => 'COL50270',
            'idowner' => '21',
            'order' => '694',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2727',
            'name' => 'Fuente de Oro',
            'code' => 'COL50287',
            'idowner' => '21',
            'order' => '695',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2728',
            'name' => 'Granada',
            'code' => 'COL50313',
            'idowner' => '21',
            'order' => '696',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2729',
            'name' => 'Guamal',
            'code' => 'COL50318',
            'idowner' => '21',
            'order' => '697',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2730',
            'name' => 'Mapiripan',
            'code' => 'COL50325',
            'idowner' => '21',
            'order' => '698',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2731',
            'name' => 'Mesetas',
            'code' => 'COL50330',
            'idowner' => '21',
            'order' => '699',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2732',
            'name' => 'La Macarena',
            'code' => 'COL50350',
            'idowner' => '21',
            'order' => '700',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2733',
            'name' => 'Uribe',
            'code' => 'COL50370',
            'idowner' => '21',
            'order' => '701',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2734',
            'name' => 'Lejanias',
            'code' => 'COL50400',
            'idowner' => '21',
            'order' => '702',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2735',
            'name' => 'Puerto Concordia',
            'code' => 'COL50450',
            'idowner' => '21',
            'order' => '703',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2736',
            'name' => 'Puerto Gaitan',
            'code' => 'COL50568',
            'idowner' => '21',
            'order' => '704',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2737',
            'name' => 'Puerto Lopez',
            'code' => 'COL50573',
            'idowner' => '21',
            'order' => '705',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2738',
            'name' => 'Puerto Lleras',
            'code' => 'COL50577',
            'idowner' => '21',
            'order' => '706',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2739',
            'name' => 'Puerto Rico',
            'code' => 'COL50590',
            'idowner' => '21',
            'order' => '707',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2740',
            'name' => 'Restrepo',
            'code' => 'COL50606',
            'idowner' => '21',
            'order' => '708',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2741',
            'name' => 'San Carlos de Guaroa',
            'code' => 'COL50680',
            'idowner' => '21',
            'order' => '709',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2742',
            'name' => 'San Juan de Arama',
            'code' => 'COL50683',
            'idowner' => '21',
            'order' => '710',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2743',
            'name' => 'San Juanito',
            'code' => 'COL50686',
            'idowner' => '21',
            'order' => '711',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2744',
            'name' => 'San Martin',
            'code' => 'COL50689',
            'idowner' => '21',
            'order' => '712',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2745',
            'name' => 'Vistahermosa',
            'code' => 'COL50711',
            'idowner' => '21',
            'order' => '713',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2746',
            'name' => 'Pasto',
            'code' => 'COL52001',
            'idowner' => '21',
            'order' => '714',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2747',
            'name' => 'Alban',
            'code' => 'COL52019',
            'idowner' => '21',
            'order' => '715',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2748',
            'name' => 'Aldana',
            'code' => 'COL52022',
            'idowner' => '21',
            'order' => '716',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2749',
            'name' => 'Ancuya',
            'code' => 'COL52036',
            'idowner' => '21',
            'order' => '717',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2750',
            'name' => 'Arboleda',
            'code' => 'COL52051',
            'idowner' => '21',
            'order' => '718',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2751',
            'name' => 'Barbacoas',
            'code' => 'COL52079',
            'idowner' => '21',
            'order' => '719',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2752',
            'name' => 'Belen',
            'code' => 'COL52083',
            'idowner' => '21',
            'order' => '720',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2753',
            'name' => 'Buesaco',
            'code' => 'COL52110',
            'idowner' => '21',
            'order' => '721',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2754',
            'name' => 'Colon',
            'code' => 'COL52203',
            'idowner' => '21',
            'order' => '722',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2755',
            'name' => 'Consaca',
            'code' => 'COL52207',
            'idowner' => '21',
            'order' => '723',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2756',
            'name' => 'Contadero',
            'code' => 'COL52210',
            'idowner' => '21',
            'order' => '724',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2757',
            'name' => 'Cordoba',
            'code' => 'COL52215',
            'idowner' => '21',
            'order' => '725',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2758',
            'name' => 'Cuaspud',
            'code' => 'COL52224',
            'idowner' => '21',
            'order' => '726',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2759',
            'name' => 'Cumbal',
            'code' => 'COL52227',
            'idowner' => '21',
            'order' => '727',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2760',
            'name' => 'Cumbitara',
            'code' => 'COL52233',
            'idowner' => '21',
            'order' => '728',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2761',
            'name' => 'Chachagsi',
            'code' => 'COL52240',
            'idowner' => '21',
            'order' => '729',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2762',
            'name' => 'El Charco',
            'code' => 'COL52250',
            'idowner' => '21',
            'order' => '730',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2763',
            'name' => 'El Peñol',
            'code' => 'COL52254',
            'idowner' => '21',
            'order' => '731',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2764',
            'name' => 'El Rosario',
            'code' => 'COL52256',
            'idowner' => '21',
            'order' => '732',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2765',
            'name' => 'El Tablon de Gomez',
            'code' => 'COL52258',
            'idowner' => '21',
            'order' => '733',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2766',
            'name' => 'El Tambo',
            'code' => 'COL52260',
            'idowner' => '21',
            'order' => '734',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2767',
            'name' => 'Funes',
            'code' => 'COL52287',
            'idowner' => '21',
            'order' => '735',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2768',
            'name' => 'Guachucal',
            'code' => 'COL52317',
            'idowner' => '21',
            'order' => '736',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2769',
            'name' => 'Guaitarilla',
            'code' => 'COL52320',
            'idowner' => '21',
            'order' => '737',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2770',
            'name' => 'Gualmatan',
            'code' => 'COL52323',
            'idowner' => '21',
            'order' => '738',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2771',
            'name' => 'Iles',
            'code' => 'COL52352',
            'idowner' => '21',
            'order' => '739',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2772',
            'name' => 'Imues',
            'code' => 'COL52354',
            'idowner' => '21',
            'order' => '740',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2773',
            'name' => 'Ipiales',
            'code' => 'COL52356',
            'idowner' => '21',
            'order' => '741',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2774',
            'name' => 'La Cruz',
            'code' => 'COL52378',
            'idowner' => '21',
            'order' => '742',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2775',
            'name' => 'La Florida',
            'code' => 'COL52381',
            'idowner' => '21',
            'order' => '743',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2776',
            'name' => 'La Llanada',
            'code' => 'COL52385',
            'idowner' => '21',
            'order' => '744',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2777',
            'name' => 'La Tola',
            'code' => 'COL52390',
            'idowner' => '21',
            'order' => '745',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2778',
            'name' => 'La Union',
            'code' => 'COL52399',
            'idowner' => '21',
            'order' => '746',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2779',
            'name' => 'Leiva',
            'code' => 'COL52405',
            'idowner' => '21',
            'order' => '747',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2780',
            'name' => 'Linares',
            'code' => 'COL52411',
            'idowner' => '21',
            'order' => '748',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2781',
            'name' => 'Los Andes',
            'code' => 'COL52418',
            'idowner' => '21',
            'order' => '749',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2782',
            'name' => 'Magsi',
            'code' => 'COL52427',
            'idowner' => '21',
            'order' => '750',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2783',
            'name' => 'Mallama',
            'code' => 'COL52435',
            'idowner' => '21',
            'order' => '751',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2784',
            'name' => 'Mosquera',
            'code' => 'COL52473',
            'idowner' => '21',
            'order' => '752',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2785',
            'name' => 'Nariño',
            'code' => 'COL52480',
            'idowner' => '21',
            'order' => '753',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2786',
            'name' => 'Olaya Herrera',
            'code' => 'COL52490',
            'idowner' => '21',
            'order' => '754',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2787',
            'name' => 'Ospina',
            'code' => 'COL52506',
            'idowner' => '21',
            'order' => '755',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2788',
            'name' => 'Francisco Pizarro',
            'code' => 'COL52520',
            'idowner' => '21',
            'order' => '756',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2789',
            'name' => 'Policarpa',
            'code' => 'COL52540',
            'idowner' => '21',
            'order' => '757',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2790',
            'name' => 'Potosi',
            'code' => 'COL52560',
            'idowner' => '21',
            'order' => '758',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2791',
            'name' => 'Providencia',
            'code' => 'COL52565',
            'idowner' => '21',
            'order' => '759',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2792',
            'name' => 'Puerres',
            'code' => 'COL52573',
            'idowner' => '21',
            'order' => '760',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2793',
            'name' => 'Pupiales',
            'code' => 'COL52585',
            'idowner' => '21',
            'order' => '761',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2794',
            'name' => 'Ricaurte',
            'code' => 'COL52612',
            'idowner' => '21',
            'order' => '762',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2795',
            'name' => 'Roberto Payan',
            'code' => 'COL52621',
            'idowner' => '21',
            'order' => '763',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2796',
            'name' => 'Samaniego',
            'code' => 'COL52678',
            'idowner' => '21',
            'order' => '764',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2797',
            'name' => 'Sandona',
            'code' => 'COL52683',
            'idowner' => '21',
            'order' => '765',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2798',
            'name' => 'San Bernardo',
            'code' => 'COL52685',
            'idowner' => '21',
            'order' => '766',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2799',
            'name' => 'San Lorenzo',
            'code' => 'COL52687',
            'idowner' => '21',
            'order' => '767',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2800',
            'name' => 'San Pablo',
            'code' => 'COL52693',
            'idowner' => '21',
            'order' => '768',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2801',
            'name' => 'San Pedro de Cartago',
            'code' => 'COL52694',
            'idowner' => '21',
            'order' => '769',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2802',
            'name' => 'Santa Barbara',
            'code' => 'COL52696',
            'idowner' => '21',
            'order' => '770',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2803',
            'name' => 'Santacruz',
            'code' => 'COL52699',
            'idowner' => '21',
            'order' => '771',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2804',
            'name' => 'Sapuyes',
            'code' => 'COL52720',
            'idowner' => '21',
            'order' => '772',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2805',
            'name' => 'Taminango',
            'code' => 'COL52786',
            'idowner' => '21',
            'order' => '773',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2806',
            'name' => 'Tangua',
            'code' => 'COL52788',
            'idowner' => '21',
            'order' => '774',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2807',
            'name' => 'San Andres de Tumaco',
            'code' => 'COL52835',
            'idowner' => '21',
            'order' => '775',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2808',
            'name' => 'Tuquerres',
            'code' => 'COL52838',
            'idowner' => '21',
            'order' => '776',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2809',
            'name' => 'Yacuanquer',
            'code' => 'COL52885',
            'idowner' => '21',
            'order' => '777',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2810',
            'name' => 'Cucuta',
            'code' => 'COL54001',
            'idowner' => '21',
            'order' => '778',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2811',
            'name' => 'Abrego',
            'code' => 'COL54003',
            'idowner' => '21',
            'order' => '779',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2812',
            'name' => 'Arboledas',
            'code' => 'COL54051',
            'idowner' => '21',
            'order' => '780',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2813',
            'name' => 'Bochalema',
            'code' => 'COL54099',
            'idowner' => '21',
            'order' => '781',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2814',
            'name' => 'Bucarasica',
            'code' => 'COL54109',
            'idowner' => '21',
            'order' => '782',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2815',
            'name' => 'Cacota',
            'code' => 'COL54125',
            'idowner' => '21',
            'order' => '783',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2816',
            'name' => 'Cachira',
            'code' => 'COL54128',
            'idowner' => '21',
            'order' => '784',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2817',
            'name' => 'Chinacota',
            'code' => 'COL54172',
            'idowner' => '21',
            'order' => '785',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2818',
            'name' => 'Chitaga',
            'code' => 'COL54174',
            'idowner' => '21',
            'order' => '786',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2819',
            'name' => 'Convencion',
            'code' => 'COL54206',
            'idowner' => '21',
            'order' => '787',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2820',
            'name' => 'Cucutilla',
            'code' => 'COL54223',
            'idowner' => '21',
            'order' => '788',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2821',
            'name' => 'Durania',
            'code' => 'COL54239',
            'idowner' => '21',
            'order' => '789',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2822',
            'name' => 'El Carmen',
            'code' => 'COL54245',
            'idowner' => '21',
            'order' => '790',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2823',
            'name' => 'El Tarra',
            'code' => 'COL54250',
            'idowner' => '21',
            'order' => '791',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2824',
            'name' => 'El Zulia',
            'code' => 'COL54261',
            'idowner' => '21',
            'order' => '792',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2825',
            'name' => 'Gramalote',
            'code' => 'COL54313',
            'idowner' => '21',
            'order' => '793',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2826',
            'name' => 'Hacari',
            'code' => 'COL54344',
            'idowner' => '21',
            'order' => '794',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2827',
            'name' => 'Herran',
            'code' => 'COL54347',
            'idowner' => '21',
            'order' => '795',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2828',
            'name' => 'Labateca',
            'code' => 'COL54377',
            'idowner' => '21',
            'order' => '796',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2829',
            'name' => 'La Esperanza',
            'code' => 'COL54385',
            'idowner' => '21',
            'order' => '797',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2830',
            'name' => 'La Playa',
            'code' => 'COL54398',
            'idowner' => '21',
            'order' => '798',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2831',
            'name' => 'Los Patios',
            'code' => 'COL54405',
            'idowner' => '21',
            'order' => '799',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2832',
            'name' => 'Lourdes',
            'code' => 'COL54418',
            'idowner' => '21',
            'order' => '800',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2833',
            'name' => 'Mutiscua',
            'code' => 'COL54480',
            'idowner' => '21',
            'order' => '801',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2834',
            'name' => 'Ocaña',
            'code' => 'COL54498',
            'idowner' => '21',
            'order' => '802',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2835',
            'name' => 'Pamplona',
            'code' => 'COL54518',
            'idowner' => '21',
            'order' => '803',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2836',
            'name' => 'Pamplonita',
            'code' => 'COL54520',
            'idowner' => '21',
            'order' => '804',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2837',
            'name' => 'Puerto Santander',
            'code' => 'COL54553',
            'idowner' => '21',
            'order' => '805',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2838',
            'name' => 'Ragonvalia',
            'code' => 'COL54599',
            'idowner' => '21',
            'order' => '806',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2839',
            'name' => 'Salazar',
            'code' => 'COL54660',
            'idowner' => '21',
            'order' => '807',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2840',
            'name' => 'San Calixto',
            'code' => 'COL54670',
            'idowner' => '21',
            'order' => '808',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2841',
            'name' => 'San Cayetano',
            'code' => 'COL54673',
            'idowner' => '21',
            'order' => '809',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2842',
            'name' => 'Santiago',
            'code' => 'COL54680',
            'idowner' => '21',
            'order' => '810',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2843',
            'name' => 'Sardinata',
            'code' => 'COL54720',
            'idowner' => '21',
            'order' => '811',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2844',
            'name' => 'Silos',
            'code' => 'COL54743',
            'idowner' => '21',
            'order' => '812',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2845',
            'name' => 'Teorama',
            'code' => 'COL54800',
            'idowner' => '21',
            'order' => '813',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2846',
            'name' => 'Tibu',
            'code' => 'COL54810',
            'idowner' => '21',
            'order' => '814',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2847',
            'name' => 'Toledo',
            'code' => 'COL54820',
            'idowner' => '21',
            'order' => '815',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2848',
            'name' => 'Villa Caro',
            'code' => 'COL54871',
            'idowner' => '21',
            'order' => '816',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2849',
            'name' => 'Villa de Rosario',
            'code' => 'COL54874',
            'idowner' => '21',
            'order' => '817',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2850',
            'name' => 'Armenia',
            'code' => 'COL63001',
            'idowner' => '21',
            'order' => '818',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2851',
            'name' => 'Buenavista',
            'code' => 'COL63111',
            'idowner' => '21',
            'order' => '819',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2852',
            'name' => 'Calarca',
            'code' => 'COL63130',
            'idowner' => '21',
            'order' => '820',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2853',
            'name' => 'Circasia',
            'code' => 'COL63190',
            'idowner' => '21',
            'order' => '821',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2854',
            'name' => 'Cordoba',
            'code' => 'COL63212',
            'idowner' => '21',
            'order' => '822',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2855',
            'name' => 'Filandia',
            'code' => 'COL63272',
            'idowner' => '21',
            'order' => '823',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2856',
            'name' => 'Genova',
            'code' => 'COL63302',
            'idowner' => '21',
            'order' => '824',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2857',
            'name' => 'La Tebaida',
            'code' => 'COL63401',
            'idowner' => '21',
            'order' => '825',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2858',
            'name' => 'Montenegro',
            'code' => 'COL63470',
            'idowner' => '21',
            'order' => '826',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2859',
            'name' => 'Pijao',
            'code' => 'COL63548',
            'idowner' => '21',
            'order' => '827',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2860',
            'name' => 'Quimbaya',
            'code' => 'COL63594',
            'idowner' => '21',
            'order' => '828',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2861',
            'name' => 'Salento',
            'code' => 'COL63690',
            'idowner' => '21',
            'order' => '829',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2862',
            'name' => 'Pereira',
            'code' => 'COL66001',
            'idowner' => '21',
            'order' => '830',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2863',
            'name' => 'Apia',
            'code' => 'COL66045',
            'idowner' => '21',
            'order' => '831',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2864',
            'name' => 'Balboa',
            'code' => 'COL66075',
            'idowner' => '21',
            'order' => '832',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2865',
            'name' => 'Belen de Umbria',
            'code' => 'COL66088',
            'idowner' => '21',
            'order' => '833',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2866',
            'name' => 'Dosquebradas',
            'code' => 'COL66170',
            'idowner' => '21',
            'order' => '834',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2867',
            'name' => 'Guatica',
            'code' => 'COL66318',
            'idowner' => '21',
            'order' => '835',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2868',
            'name' => 'La Celia',
            'code' => 'COL66383',
            'idowner' => '21',
            'order' => '836',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2869',
            'name' => 'La Virginia',
            'code' => 'COL66400',
            'idowner' => '21',
            'order' => '837',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2870',
            'name' => 'Marsella',
            'code' => 'COL66440',
            'idowner' => '21',
            'order' => '838',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2871',
            'name' => 'Mistrato',
            'code' => 'COL66456',
            'idowner' => '21',
            'order' => '839',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2872',
            'name' => 'Pueblo Rico',
            'code' => 'COL66572',
            'idowner' => '21',
            'order' => '840',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2873',
            'name' => 'Quinchia',
            'code' => 'COL66594',
            'idowner' => '21',
            'order' => '841',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2874',
            'name' => 'Santa Rosa de Cabal',
            'code' => 'COL66682',
            'idowner' => '21',
            'order' => '842',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2875',
            'name' => 'Santuario',
            'code' => 'COL66687',
            'idowner' => '21',
            'order' => '843',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2876',
            'name' => 'Bucaramanga',
            'code' => 'COL68001',
            'idowner' => '21',
            'order' => '844',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2877',
            'name' => 'Aguada',
            'code' => 'COL68013',
            'idowner' => '21',
            'order' => '845',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2878',
            'name' => 'Albania',
            'code' => 'COL68020',
            'idowner' => '21',
            'order' => '846',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2879',
            'name' => 'Aratoca',
            'code' => 'COL68051',
            'idowner' => '21',
            'order' => '847',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2880',
            'name' => 'Barbosa',
            'code' => 'COL68077',
            'idowner' => '21',
            'order' => '848',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2881',
            'name' => 'Barichara',
            'code' => 'COL68079',
            'idowner' => '21',
            'order' => '849',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2882',
            'name' => 'Barrancabermeja',
            'code' => 'COL68081',
            'idowner' => '21',
            'order' => '850',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2883',
            'name' => 'Betulia',
            'code' => 'COL68092',
            'idowner' => '21',
            'order' => '851',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2884',
            'name' => 'Bolivar',
            'code' => 'COL68101',
            'idowner' => '21',
            'order' => '852',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2885',
            'name' => 'Cabrera',
            'code' => 'COL68121',
            'idowner' => '21',
            'order' => '853',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2886',
            'name' => 'California',
            'code' => 'COL68132',
            'idowner' => '21',
            'order' => '854',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2887',
            'name' => 'Capitanejo',
            'code' => 'COL68147',
            'idowner' => '21',
            'order' => '855',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2888',
            'name' => 'Carcasi',
            'code' => 'COL68152',
            'idowner' => '21',
            'order' => '856',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2889',
            'name' => 'Cepita',
            'code' => 'COL68160',
            'idowner' => '21',
            'order' => '857',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2890',
            'name' => 'Cerrito',
            'code' => 'COL68162',
            'idowner' => '21',
            'order' => '858',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2891',
            'name' => 'Charala',
            'code' => 'COL68167',
            'idowner' => '21',
            'order' => '859',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2892',
            'name' => 'Charta',
            'code' => 'COL68169',
            'idowner' => '21',
            'order' => '860',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2893',
            'name' => 'Chima',
            'code' => 'COL68176',
            'idowner' => '21',
            'order' => '861',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2894',
            'name' => 'Chipata',
            'code' => 'COL68179',
            'idowner' => '21',
            'order' => '862',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2895',
            'name' => 'Cimitarra',
            'code' => 'COL68190',
            'idowner' => '21',
            'order' => '863',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2896',
            'name' => 'Concepcion',
            'code' => 'COL68207',
            'idowner' => '21',
            'order' => '864',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2897',
            'name' => 'Confines',
            'code' => 'COL68209',
            'idowner' => '21',
            'order' => '865',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2898',
            'name' => 'Contratacion',
            'code' => 'COL68211',
            'idowner' => '21',
            'order' => '866',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2899',
            'name' => 'Coromoro',
            'code' => 'COL68217',
            'idowner' => '21',
            'order' => '867',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2900',
            'name' => 'Curiti',
            'code' => 'COL68229',
            'idowner' => '21',
            'order' => '868',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2901',
            'name' => 'El Carmen de Chucuri',
            'code' => 'COL68235',
            'idowner' => '21',
            'order' => '869',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2902',
            'name' => 'El Guacamayo',
            'code' => 'COL68245',
            'idowner' => '21',
            'order' => '870',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2903',
            'name' => 'El Peñon',
            'code' => 'COL68250',
            'idowner' => '21',
            'order' => '871',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2904',
            'name' => 'El Playon',
            'code' => 'COL68255',
            'idowner' => '21',
            'order' => '872',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2905',
            'name' => 'Encino',
            'code' => 'COL68264',
            'idowner' => '21',
            'order' => '873',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2906',
            'name' => 'Enciso',
            'code' => 'COL68266',
            'idowner' => '21',
            'order' => '874',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2907',
            'name' => 'Florian',
            'code' => 'COL68271',
            'idowner' => '21',
            'order' => '875',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2908',
            'name' => 'Floridablanca',
            'code' => 'COL68276',
            'idowner' => '21',
            'order' => '876',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2909',
            'name' => 'Galan',
            'code' => 'COL68296',
            'idowner' => '21',
            'order' => '877',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2910',
            'name' => 'Gambita',
            'code' => 'COL68298',
            'idowner' => '21',
            'order' => '878',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2911',
            'name' => 'Giron',
            'code' => 'COL68307',
            'idowner' => '21',
            'order' => '879',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2912',
            'name' => 'Guaca',
            'code' => 'COL68318',
            'idowner' => '21',
            'order' => '880',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2913',
            'name' => 'Guadalupe',
            'code' => 'COL68320',
            'idowner' => '21',
            'order' => '881',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2914',
            'name' => 'Guapota',
            'code' => 'COL68322',
            'idowner' => '21',
            'order' => '882',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2915',
            'name' => 'Guavata',
            'code' => 'COL68324',
            'idowner' => '21',
            'order' => '883',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2916',
            'name' => 'Gsepsa',
            'code' => 'COL68327',
            'idowner' => '21',
            'order' => '884',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2917',
            'name' => 'Hato',
            'code' => 'COL68344',
            'idowner' => '21',
            'order' => '885',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2918',
            'name' => 'Jesus Maria',
            'code' => 'COL68368',
            'idowner' => '21',
            'order' => '886',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2919',
            'name' => 'Jordan',
            'code' => 'COL68370',
            'idowner' => '21',
            'order' => '887',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2920',
            'name' => 'La Belleza',
            'code' => 'COL68377',
            'idowner' => '21',
            'order' => '888',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2921',
            'name' => 'Landazuri',
            'code' => 'COL68385',
            'idowner' => '21',
            'order' => '889',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2922',
            'name' => 'La Paz',
            'code' => 'COL68397',
            'idowner' => '21',
            'order' => '890',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2923',
            'name' => 'Lebrija',
            'code' => 'COL68406',
            'idowner' => '21',
            'order' => '891',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2924',
            'name' => 'Los Santos',
            'code' => 'COL68418',
            'idowner' => '21',
            'order' => '892',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2925',
            'name' => 'Macaravita',
            'code' => 'COL68425',
            'idowner' => '21',
            'order' => '893',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2926',
            'name' => 'Malaga',
            'code' => 'COL68432',
            'idowner' => '21',
            'order' => '894',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2927',
            'name' => 'Matanza',
            'code' => 'COL68444',
            'idowner' => '21',
            'order' => '895',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2928',
            'name' => 'Mogotes',
            'code' => 'COL68464',
            'idowner' => '21',
            'order' => '896',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2929',
            'name' => 'Molagavita',
            'code' => 'COL68468',
            'idowner' => '21',
            'order' => '897',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2930',
            'name' => 'Ocamonte',
            'code' => 'COL68498',
            'idowner' => '21',
            'order' => '898',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2931',
            'name' => 'Oiba',
            'code' => 'COL68500',
            'idowner' => '21',
            'order' => '899',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2932',
            'name' => 'Onzaga',
            'code' => 'COL68502',
            'idowner' => '21',
            'order' => '900',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2933',
            'name' => 'Palmar',
            'code' => 'COL68522',
            'idowner' => '21',
            'order' => '901',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2934',
            'name' => 'Palmas de Socorro',
            'code' => 'COL68524',
            'idowner' => '21',
            'order' => '902',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2935',
            'name' => 'Paramo',
            'code' => 'COL68533',
            'idowner' => '21',
            'order' => '903',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2936',
            'name' => 'Piedecuesta',
            'code' => 'COL68547',
            'idowner' => '21',
            'order' => '904',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2937',
            'name' => 'Pinchote',
            'code' => 'COL68549',
            'idowner' => '21',
            'order' => '905',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2938',
            'name' => 'Puente Nacional',
            'code' => 'COL68572',
            'idowner' => '21',
            'order' => '906',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2939',
            'name' => 'Puerto Parra',
            'code' => 'COL68573',
            'idowner' => '21',
            'order' => '907',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2940',
            'name' => 'Puerto Wilches',
            'code' => 'COL68575',
            'idowner' => '21',
            'order' => '908',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2941',
            'name' => 'Rionegro',
            'code' => 'COL68615',
            'idowner' => '21',
            'order' => '909',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2942',
            'name' => 'Sabana de Torres',
            'code' => 'COL68655',
            'idowner' => '21',
            'order' => '910',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2943',
            'name' => 'San Andres',
            'code' => 'COL68669',
            'idowner' => '21',
            'order' => '911',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2944',
            'name' => 'San Benito',
            'code' => 'COL68673',
            'idowner' => '21',
            'order' => '912',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2945',
            'name' => 'San Gil',
            'code' => 'COL68679',
            'idowner' => '21',
            'order' => '913',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2946',
            'name' => 'San Joaquin',
            'code' => 'COL68682',
            'idowner' => '21',
            'order' => '914',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2947',
            'name' => 'San Jose de Miranda',
            'code' => 'COL68684',
            'idowner' => '21',
            'order' => '915',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2948',
            'name' => 'San Miguel',
            'code' => 'COL68686',
            'idowner' => '21',
            'order' => '916',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2949',
            'name' => 'San Vicente de Chucuri',
            'code' => 'COL68689',
            'idowner' => '21',
            'order' => '917',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2950',
            'name' => 'Santa Barbara',
            'code' => 'COL68705',
            'idowner' => '21',
            'order' => '918',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2951',
            'name' => 'Santa Helena de Opon',
            'code' => 'COL68720',
            'idowner' => '21',
            'order' => '919',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2952',
            'name' => 'Simacota',
            'code' => 'COL68745',
            'idowner' => '21',
            'order' => '920',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2953',
            'name' => 'Socorro',
            'code' => 'COL68755',
            'idowner' => '21',
            'order' => '921',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2954',
            'name' => 'Suaita',
            'code' => 'COL68770',
            'idowner' => '21',
            'order' => '922',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2955',
            'name' => 'Sucre',
            'code' => 'COL68773',
            'idowner' => '21',
            'order' => '923',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2956',
            'name' => 'Surata',
            'code' => 'COL68780',
            'idowner' => '21',
            'order' => '924',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2957',
            'name' => 'Tona',
            'code' => 'COL68820',
            'idowner' => '21',
            'order' => '925',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2958',
            'name' => 'Valle de San Jose',
            'code' => 'COL68855',
            'idowner' => '21',
            'order' => '926',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2959',
            'name' => 'Velez',
            'code' => 'COL68861',
            'idowner' => '21',
            'order' => '927',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2960',
            'name' => 'Vetas',
            'code' => 'COL68867',
            'idowner' => '21',
            'order' => '928',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2961',
            'name' => 'Villanueva',
            'code' => 'COL68872',
            'idowner' => '21',
            'order' => '929',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2962',
            'name' => 'Zapatoca',
            'code' => 'COL68895',
            'idowner' => '21',
            'order' => '930',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2963',
            'name' => 'Sincelejo',
            'code' => 'COL70001',
            'idowner' => '21',
            'order' => '931',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2964',
            'name' => 'Buenavista',
            'code' => 'COL70110',
            'idowner' => '21',
            'order' => '932',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2965',
            'name' => 'Caimito',
            'code' => 'COL70124',
            'idowner' => '21',
            'order' => '933',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2966',
            'name' => 'Coloso',
            'code' => 'COL70204',
            'idowner' => '21',
            'order' => '934',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2967',
            'name' => 'Corozal',
            'code' => 'COL70215',
            'idowner' => '21',
            'order' => '935',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2968',
            'name' => 'Coveñas',
            'code' => 'COL70221',
            'idowner' => '21',
            'order' => '936',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2969',
            'name' => 'Chalan',
            'code' => 'COL70230',
            'idowner' => '21',
            'order' => '937',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2970',
            'name' => 'El Roble',
            'code' => 'COL70233',
            'idowner' => '21',
            'order' => '938',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2971',
            'name' => 'Galeras',
            'code' => 'COL70235',
            'idowner' => '21',
            'order' => '939',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2972',
            'name' => 'Guaranda',
            'code' => 'COL70265',
            'idowner' => '21',
            'order' => '940',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2973',
            'name' => 'La Union',
            'code' => 'COL70400',
            'idowner' => '21',
            'order' => '941',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2974',
            'name' => 'Los Palmitos',
            'code' => 'COL70418',
            'idowner' => '21',
            'order' => '942',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2975',
            'name' => 'Majagual',
            'code' => 'COL70429',
            'idowner' => '21',
            'order' => '943',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2976',
            'name' => 'Morroa',
            'code' => 'COL70473',
            'idowner' => '21',
            'order' => '944',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2977',
            'name' => 'Ovejas',
            'code' => 'COL70508',
            'idowner' => '21',
            'order' => '945',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2978',
            'name' => 'Palmito',
            'code' => 'COL70523',
            'idowner' => '21',
            'order' => '946',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2979',
            'name' => 'Sampues',
            'code' => 'COL70670',
            'idowner' => '21',
            'order' => '947',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2980',
            'name' => 'San Benito Abad',
            'code' => 'COL70678',
            'idowner' => '21',
            'order' => '948',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2981',
            'name' => 'San Juan de Betulia',
            'code' => 'COL70702',
            'idowner' => '21',
            'order' => '949',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2982',
            'name' => 'San Marcos',
            'code' => 'COL70708',
            'idowner' => '21',
            'order' => '950',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2983',
            'name' => 'San Onofre',
            'code' => 'COL70713',
            'idowner' => '21',
            'order' => '951',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2984',
            'name' => 'San Pedro',
            'code' => 'COL70717',
            'idowner' => '21',
            'order' => '952',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2985',
            'name' => 'San Luis de Since',
            'code' => 'COL70742',
            'idowner' => '21',
            'order' => '953',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2986',
            'name' => 'Sucre',
            'code' => 'COL70771',
            'idowner' => '21',
            'order' => '954',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2987',
            'name' => 'Santiago de Tolu',
            'code' => 'COL70820',
            'idowner' => '21',
            'order' => '955',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2988',
            'name' => 'Tolu Viejo',
            'code' => 'COL70823',
            'idowner' => '21',
            'order' => '956',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2989',
            'name' => 'Ibague',
            'code' => 'COL73001',
            'idowner' => '21',
            'order' => '957',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2990',
            'name' => 'Alpujarra',
            'code' => 'COL73024',
            'idowner' => '21',
            'order' => '958',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2991',
            'name' => 'Alvarado',
            'code' => 'COL73026',
            'idowner' => '21',
            'order' => '959',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2992',
            'name' => 'Ambalema',
            'code' => 'COL73030',
            'idowner' => '21',
            'order' => '960',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2993',
            'name' => 'Anzoategui',
            'code' => 'COL73043',
            'idowner' => '21',
            'order' => '961',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2994',
            'name' => 'Armero',
            'code' => 'COL73055',
            'idowner' => '21',
            'order' => '962',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2995',
            'name' => 'Ataco',
            'code' => 'COL73067',
            'idowner' => '21',
            'order' => '963',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2996',
            'name' => 'Cajamarca',
            'code' => 'COL73124',
            'idowner' => '21',
            'order' => '964',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2997',
            'name' => 'Carmen de Apicala',
            'code' => 'COL73148',
            'idowner' => '21',
            'order' => '965',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2998',
            'name' => 'Casabianca',
            'code' => 'COL73152',
            'idowner' => '21',
            'order' => '966',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '2999',
            'name' => 'Chaparral',
            'code' => 'COL73168',
            'idowner' => '21',
            'order' => '967',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3000',
            'name' => 'Coello',
            'code' => 'COL73200',
            'idowner' => '21',
            'order' => '968',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3001',
            'name' => 'Coyaima',
            'code' => 'COL73217',
            'idowner' => '21',
            'order' => '969',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3002',
            'name' => 'Cunday',
            'code' => 'COL73226',
            'idowner' => '21',
            'order' => '970',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3003',
            'name' => 'Dolores',
            'code' => 'COL73236',
            'idowner' => '21',
            'order' => '971',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3004',
            'name' => 'Espinal',
            'code' => 'COL73268',
            'idowner' => '21',
            'order' => '972',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3005',
            'name' => 'Falan',
            'code' => 'COL73270',
            'idowner' => '21',
            'order' => '973',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3006',
            'name' => 'Flandes',
            'code' => 'COL73275',
            'idowner' => '21',
            'order' => '974',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3007',
            'name' => 'Fresno',
            'code' => 'COL73283',
            'idowner' => '21',
            'order' => '975',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3008',
            'name' => 'Guamo',
            'code' => 'COL73319',
            'idowner' => '21',
            'order' => '976',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3009',
            'name' => 'Herveo',
            'code' => 'COL73347',
            'idowner' => '21',
            'order' => '977',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3010',
            'name' => 'Honda',
            'code' => 'COL73349',
            'idowner' => '21',
            'order' => '978',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3011',
            'name' => 'Icononzo',
            'code' => 'COL73352',
            'idowner' => '21',
            'order' => '979',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3012',
            'name' => 'Lerida',
            'code' => 'COL73408',
            'idowner' => '21',
            'order' => '980',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3013',
            'name' => 'Libano',
            'code' => 'COL73411',
            'idowner' => '21',
            'order' => '981',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3014',
            'name' => 'Mariquita',
            'code' => 'COL73443',
            'idowner' => '21',
            'order' => '982',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3015',
            'name' => 'Melgar',
            'code' => 'COL73449',
            'idowner' => '21',
            'order' => '983',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3016',
            'name' => 'Murillo',
            'code' => 'COL73461',
            'idowner' => '21',
            'order' => '984',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3017',
            'name' => 'Natagaima',
            'code' => 'COL73483',
            'idowner' => '21',
            'order' => '985',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3018',
            'name' => 'Ortega',
            'code' => 'COL73504',
            'idowner' => '21',
            'order' => '986',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3019',
            'name' => 'Palocabildo',
            'code' => 'COL73520',
            'idowner' => '21',
            'order' => '987',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3020',
            'name' => 'Piedras',
            'code' => 'COL73547',
            'idowner' => '21',
            'order' => '988',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3021',
            'name' => 'Planadas',
            'code' => 'COL73555',
            'idowner' => '21',
            'order' => '989',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3022',
            'name' => 'Prado',
            'code' => 'COL73563',
            'idowner' => '21',
            'order' => '990',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3023',
            'name' => 'Purificacion',
            'code' => 'COL73585',
            'idowner' => '21',
            'order' => '991',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3024',
            'name' => 'Rioblanco',
            'code' => 'COL73616',
            'idowner' => '21',
            'order' => '992',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3025',
            'name' => 'Roncesvalles',
            'code' => 'COL73622',
            'idowner' => '21',
            'order' => '993',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3026',
            'name' => 'Rovira',
            'code' => 'COL73624',
            'idowner' => '21',
            'order' => '994',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3027',
            'name' => 'Saldaña',
            'code' => 'COL73671',
            'idowner' => '21',
            'order' => '995',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3028',
            'name' => 'San Antonio',
            'code' => 'COL73675',
            'idowner' => '21',
            'order' => '996',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3029',
            'name' => 'San Luis',
            'code' => 'COL73678',
            'idowner' => '21',
            'order' => '997',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3030',
            'name' => 'Santa Isabel',
            'code' => 'COL73686',
            'idowner' => '21',
            'order' => '998',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3031',
            'name' => 'Suarez',
            'code' => 'COL73770',
            'idowner' => '21',
            'order' => '999',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3032',
            'name' => 'Valle de San Juan',
            'code' => 'COL73854',
            'idowner' => '21',
            'order' => '1000',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3033',
            'name' => 'Venadillo',
            'code' => 'COL73861',
            'idowner' => '21',
            'order' => '1001',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3034',
            'name' => 'Villahermosa',
            'code' => 'COL73870',
            'idowner' => '21',
            'order' => '1002',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3035',
            'name' => 'Villarrica',
            'code' => 'COL73873',
            'idowner' => '21',
            'order' => '1003',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3036',
            'name' => 'Cali',
            'code' => 'COL76001',
            'idowner' => '21',
            'order' => '1004',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3037',
            'name' => 'Alcala',
            'code' => 'COL76020',
            'idowner' => '21',
            'order' => '1005',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3038',
            'name' => 'Andalucia',
            'code' => 'COL76036',
            'idowner' => '21',
            'order' => '1006',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3039',
            'name' => 'Ansermanuevo',
            'code' => 'COL76041',
            'idowner' => '21',
            'order' => '1007',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3040',
            'name' => 'Argelia',
            'code' => 'COL76054',
            'idowner' => '21',
            'order' => '1008',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3041',
            'name' => 'Bolivar',
            'code' => 'COL76100',
            'idowner' => '21',
            'order' => '1009',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3042',
            'name' => 'Buenaventura',
            'code' => 'COL76109',
            'idowner' => '21',
            'order' => '1010',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3043',
            'name' => 'Guadalajara de Buga',
            'code' => 'COL76111',
            'idowner' => '21',
            'order' => '1011',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3044',
            'name' => 'Bugalagrande',
            'code' => 'COL76113',
            'idowner' => '21',
            'order' => '1012',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3045',
            'name' => 'Caicedonia',
            'code' => 'COL76122',
            'idowner' => '21',
            'order' => '1013',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3046',
            'name' => 'Calima',
            'code' => 'COL76126',
            'idowner' => '21',
            'order' => '1014',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3047',
            'name' => 'Candelaria',
            'code' => 'COL76130',
            'idowner' => '21',
            'order' => '1015',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3048',
            'name' => 'Cartago',
            'code' => 'COL76147',
            'idowner' => '21',
            'order' => '1016',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3049',
            'name' => 'Dagua',
            'code' => 'COL76233',
            'idowner' => '21',
            'order' => '1017',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3050',
            'name' => 'El Aguila',
            'code' => 'COL76243',
            'idowner' => '21',
            'order' => '1018',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3051',
            'name' => 'El Cairo',
            'code' => 'COL76246',
            'idowner' => '21',
            'order' => '1019',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3052',
            'name' => 'El Cerrito',
            'code' => 'COL76248',
            'idowner' => '21',
            'order' => '1020',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3053',
            'name' => 'El Dovio',
            'code' => 'COL76250',
            'idowner' => '21',
            'order' => '1021',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3054',
            'name' => 'Florida',
            'code' => 'COL76275',
            'idowner' => '21',
            'order' => '1022',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3055',
            'name' => 'Ginebra',
            'code' => 'COL76306',
            'idowner' => '21',
            'order' => '1023',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3056',
            'name' => 'Guacari',
            'code' => 'COL76318',
            'idowner' => '21',
            'order' => '1024',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3057',
            'name' => 'Jamundi',
            'code' => 'COL76364',
            'idowner' => '21',
            'order' => '1025',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3058',
            'name' => 'La Cumbre',
            'code' => 'COL76377',
            'idowner' => '21',
            'order' => '1026',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3059',
            'name' => 'La Union',
            'code' => 'COL76400',
            'idowner' => '21',
            'order' => '1027',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3060',
            'name' => 'La Victoria',
            'code' => 'COL76403',
            'idowner' => '21',
            'order' => '1028',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3061',
            'name' => 'Obando',
            'code' => 'COL76497',
            'idowner' => '21',
            'order' => '1029',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3062',
            'name' => 'Palmira',
            'code' => 'COL76520',
            'idowner' => '21',
            'order' => '1030',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3063',
            'name' => 'Pradera',
            'code' => 'COL76563',
            'idowner' => '21',
            'order' => '1031',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3064',
            'name' => 'Restrepo',
            'code' => 'COL76606',
            'idowner' => '21',
            'order' => '1032',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3065',
            'name' => 'Riofrio',
            'code' => 'COL76616',
            'idowner' => '21',
            'order' => '1033',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3066',
            'name' => 'Roldanillo',
            'code' => 'COL76622',
            'idowner' => '21',
            'order' => '1034',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3067',
            'name' => 'San Pedro',
            'code' => 'COL76670',
            'idowner' => '21',
            'order' => '1035',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3068',
            'name' => 'Sevilla',
            'code' => 'COL76736',
            'idowner' => '21',
            'order' => '1036',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3069',
            'name' => 'Toro',
            'code' => 'COL76823',
            'idowner' => '21',
            'order' => '1037',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3070',
            'name' => 'Trujillo',
            'code' => 'COL76828',
            'idowner' => '21',
            'order' => '1038',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3071',
            'name' => 'Tulua',
            'code' => 'COL76834',
            'idowner' => '21',
            'order' => '1039',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3072',
            'name' => 'Ulloa',
            'code' => 'COL76845',
            'idowner' => '21',
            'order' => '1040',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3073',
            'name' => 'Versalles',
            'code' => 'COL76863',
            'idowner' => '21',
            'order' => '1041',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3074',
            'name' => 'Vijes',
            'code' => 'COL76869',
            'idowner' => '21',
            'order' => '1042',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3075',
            'name' => 'Yotoco',
            'code' => 'COL76890',
            'idowner' => '21',
            'order' => '1043',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3076',
            'name' => 'Yumbo',
            'code' => 'COL76892',
            'idowner' => '21',
            'order' => '1044',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3077',
            'name' => 'Zarzal',
            'code' => 'COL76895',
            'idowner' => '21',
            'order' => '1045',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3078',
            'name' => 'Arauca',
            'code' => 'COL81001',
            'idowner' => '21',
            'order' => '1046',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3079',
            'name' => 'Arauquita',
            'code' => 'COL81065',
            'idowner' => '21',
            'order' => '1047',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3080',
            'name' => 'Cravo Norte',
            'code' => 'COL81220',
            'idowner' => '21',
            'order' => '1048',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3081',
            'name' => 'Fortul',
            'code' => 'COL81300',
            'idowner' => '21',
            'order' => '1049',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3082',
            'name' => 'Puerto Rondon',
            'code' => 'COL81591',
            'idowner' => '21',
            'order' => '1050',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3083',
            'name' => 'Saravena',
            'code' => 'COL81736',
            'idowner' => '21',
            'order' => '1051',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3084',
            'name' => 'Tame',
            'code' => 'COL81794',
            'idowner' => '21',
            'order' => '1052',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3085',
            'name' => 'Yopal',
            'code' => 'COL85001',
            'idowner' => '21',
            'order' => '1053',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3086',
            'name' => 'Aguazul',
            'code' => 'COL85010',
            'idowner' => '21',
            'order' => '1054',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3087',
            'name' => 'Chameza',
            'code' => 'COL85015',
            'idowner' => '21',
            'order' => '1055',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3088',
            'name' => 'Hato Corozal',
            'code' => 'COL85125',
            'idowner' => '21',
            'order' => '1056',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3089',
            'name' => 'La Salina',
            'code' => 'COL85136',
            'idowner' => '21',
            'order' => '1057',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3090',
            'name' => 'Mani',
            'code' => 'COL85139',
            'idowner' => '21',
            'order' => '1058',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3091',
            'name' => 'Monterrey',
            'code' => 'COL85162',
            'idowner' => '21',
            'order' => '1059',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3092',
            'name' => 'Nunchia',
            'code' => 'COL85225',
            'idowner' => '21',
            'order' => '1060',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3093',
            'name' => 'Orocue',
            'code' => 'COL85230',
            'idowner' => '21',
            'order' => '1061',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3094',
            'name' => 'Paz de Ariporo',
            'code' => 'COL85250',
            'idowner' => '21',
            'order' => '1062',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3095',
            'name' => 'Pore',
            'code' => 'COL85263',
            'idowner' => '21',
            'order' => '1063',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3096',
            'name' => 'Recetor',
            'code' => 'COL85279',
            'idowner' => '21',
            'order' => '1064',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3097',
            'name' => 'Sabanalarga',
            'code' => 'COL85300',
            'idowner' => '21',
            'order' => '1065',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3098',
            'name' => 'Sacama',
            'code' => 'COL85315',
            'idowner' => '21',
            'order' => '1066',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3099',
            'name' => 'San Luis de Palenque',
            'code' => 'COL85325',
            'idowner' => '21',
            'order' => '1067',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3100',
            'name' => 'Tamara',
            'code' => 'COL85400',
            'idowner' => '21',
            'order' => '1068',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3101',
            'name' => 'Tauramena',
            'code' => 'COL85410',
            'idowner' => '21',
            'order' => '1069',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3102',
            'name' => 'Trinidad',
            'code' => 'COL85430',
            'idowner' => '21',
            'order' => '1070',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3103',
            'name' => 'Villanueva',
            'code' => 'COL85440',
            'idowner' => '21',
            'order' => '1071',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3104',
            'name' => 'Mocoa',
            'code' => 'COL86001',
            'idowner' => '21',
            'order' => '1072',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3105',
            'name' => 'Colon',
            'code' => 'COL86219',
            'idowner' => '21',
            'order' => '1073',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3106',
            'name' => 'Orito',
            'code' => 'COL86320',
            'idowner' => '21',
            'order' => '1074',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3107',
            'name' => 'Puerto Asis',
            'code' => 'COL86568',
            'idowner' => '21',
            'order' => '1075',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3108',
            'name' => 'Puerto Caicedo',
            'code' => 'COL86569',
            'idowner' => '21',
            'order' => '1076',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3109',
            'name' => 'Puerto Guzman',
            'code' => 'COL86571',
            'idowner' => '21',
            'order' => '1077',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3110',
            'name' => 'Leguizamo',
            'code' => 'COL86573',
            'idowner' => '21',
            'order' => '1078',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3111',
            'name' => 'Sibundoy',
            'code' => 'COL86749',
            'idowner' => '21',
            'order' => '1079',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3112',
            'name' => 'San Francisco',
            'code' => 'COL86755',
            'idowner' => '21',
            'order' => '1080',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3113',
            'name' => 'San Miguel',
            'code' => 'COL86757',
            'idowner' => '21',
            'order' => '1081',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3114',
            'name' => 'Santiago',
            'code' => 'COL86760',
            'idowner' => '21',
            'order' => '1082',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3115',
            'name' => 'Valle de Guamuez',
            'code' => 'COL86865',
            'idowner' => '21',
            'order' => '1083',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3116',
            'name' => 'Villagarzon',
            'code' => 'COL86885',
            'idowner' => '21',
            'order' => '1084',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3117',
            'name' => 'San Andres',
            'code' => 'COL88001',
            'idowner' => '21',
            'order' => '1085',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3118',
            'name' => 'Providencia',
            'code' => 'COL88564',
            'idowner' => '21',
            'order' => '1086',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3119',
            'name' => 'Leticia',
            'code' => 'COL91001',
            'idowner' => '21',
            'order' => '1087',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3120',
            'name' => 'El Encanto',
            'code' => 'COL91263',
            'idowner' => '21',
            'order' => '1088',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3121',
            'name' => 'La Chorrera',
            'code' => 'COL91405',
            'idowner' => '21',
            'order' => '1089',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3122',
            'name' => 'La Pedrera',
            'code' => 'COL91407',
            'idowner' => '21',
            'order' => '1090',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3123',
            'name' => 'La Victoria',
            'code' => 'COL91430',
            'idowner' => '21',
            'order' => '1091',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3124',
            'name' => 'Miriti - Parana',
            'code' => 'COL91460',
            'idowner' => '21',
            'order' => '1092',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3125',
            'name' => 'Puerto Alegria',
            'code' => 'COL91530',
            'idowner' => '21',
            'order' => '1093',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3126',
            'name' => 'Puerto Arica',
            'code' => 'COL91536',
            'idowner' => '21',
            'order' => '1094',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3127',
            'name' => 'Puerto Nariño',
            'code' => 'COL91540',
            'idowner' => '21',
            'order' => '1095',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3128',
            'name' => 'Puerto Santander',
            'code' => 'COL91669',
            'idowner' => '21',
            'order' => '1096',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3129',
            'name' => 'Tarapaca',
            'code' => 'COL91798',
            'idowner' => '21',
            'order' => '1097',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3130',
            'name' => 'Inirida',
            'code' => 'COL94001',
            'idowner' => '21',
            'order' => '1098',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3131',
            'name' => 'Barranco Minas',
            'code' => 'COL94343',
            'idowner' => '21',
            'order' => '1099',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3132',
            'name' => 'Mapiripana',
            'code' => 'COL94663',
            'idowner' => '21',
            'order' => '1100',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3133',
            'name' => 'San Felipe',
            'code' => 'COL94883',
            'idowner' => '21',
            'order' => '1101',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3134',
            'name' => 'Puerto Colombia',
            'code' => 'COL94884',
            'idowner' => '21',
            'order' => '1102',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3135',
            'name' => 'La Guadalupe',
            'code' => 'COL94885',
            'idowner' => '21',
            'order' => '1103',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3136',
            'name' => 'Cacahual',
            'code' => 'COL94886',
            'idowner' => '21',
            'order' => '1104',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3137',
            'name' => 'Pana Pana',
            'code' => 'COL94887',
            'idowner' => '21',
            'order' => '1105',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3138',
            'name' => 'Morichal',
            'code' => 'COL94888',
            'idowner' => '21',
            'order' => '1106',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3139',
            'name' => 'San Jose de Guaviare',
            'code' => 'COL95001',
            'idowner' => '21',
            'order' => '1107',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3140',
            'name' => 'Calamar',
            'code' => 'COL95015',
            'idowner' => '21',
            'order' => '1108',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3141',
            'name' => 'El Retorno',
            'code' => 'COL95025',
            'idowner' => '21',
            'order' => '1109',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3142',
            'name' => 'Miraflores',
            'code' => 'COL95200',
            'idowner' => '21',
            'order' => '1110',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3143',
            'name' => 'Mitu',
            'code' => 'COL97001',
            'idowner' => '21',
            'order' => '1111',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3144',
            'name' => 'Caruru',
            'code' => 'COL97161',
            'idowner' => '21',
            'order' => '1112',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3145',
            'name' => 'Pacoa',
            'code' => 'COL97511',
            'idowner' => '21',
            'order' => '1113',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3146',
            'name' => 'Taraira',
            'code' => 'COL97666',
            'idowner' => '21',
            'order' => '1114',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3147',
            'name' => 'Papunaua',
            'code' => 'COL97777',
            'idowner' => '21',
            'order' => '1115',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3148',
            'name' => 'Yavarate',
            'code' => 'COL97889',
            'idowner' => '21',
            'order' => '1116',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3149',
            'name' => 'Puerto Carreño',
            'code' => 'COL99001',
            'idowner' => '21',
            'order' => '1117',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3150',
            'name' => 'La Primavera',
            'code' => 'COL99524',
            'idowner' => '21',
            'order' => '1118',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3151',
            'name' => 'Santa Rosalia',
            'code' => 'COL99624',
            'idowner' => '21',
            'order' => '1119',
            'status' => '1',
        ]);

        DB::table('lists')->insert([
            'id' => '3152',
            'name' => 'Cumaribo',
            'code' => 'COL99773',
            'idowner' => '21',
            'order' => '1120',
            'status' => '1',
        ]);

    }
}
