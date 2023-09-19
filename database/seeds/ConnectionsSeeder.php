<?php

use Illuminate\Database\Seeder;

class ConnectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('connections')->insert([
            'connection_id' => 2,
            'name' => 'SQL SSAS',
            'url' => 'http://192.168.16.127:8080/reportes/msmdpump.dll',
            'class' => '\\App\\Models\\Olap\\MsOlapDao',
            'cube' => 'CUBORBPDV',
            'user' => null,
            'password' => null,
            'status' => 0,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('connections')->insert([
            'connection_id' => 3,
            'name' => 'Pentaho',
            'url' => 'http://192.168.16.46:8080/mondrian-rest/',
            'class' => '\\App\\Models\\Olap\\PentahoOlapDao',
            'cube' => 'infogen',
            'user' => 'admin',
            'password' => 'admin',
            'status' => 0,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('connections')->insert([
            'connection_id' => 4,
            'name' => 'Pentaho',
            'url' => 'http://192.168.16.46:8080/mondrian-rest/',
            'class' => '\\App\\Models\\Olap\\PentahoOlapDao',
            'cube' => 'infoven',
            'user' => 'admin',
            'password' => 'admin',
            'status' => 0,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('connections')->insert([
            'connection_id' => 5,
            'name' => 'Pentaho SIR',
            'url' => 'http://192.168.16.46:8080/mondrian-rest/',
            'class' => '\\App\\Models\\Olap\\PentahoOlapDao',
            'cube' => 'infosir',
            'user' => 'admin',
            'password' => 'admin',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
    }
}
