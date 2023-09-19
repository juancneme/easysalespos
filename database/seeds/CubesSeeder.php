<?php

use Illuminate\Database\Seeder;

class CubesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cubes')->insert([
            'cube_id' => 1,
            'connection_id' => 2,
            'name' => 'RBPDV',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('cubes')->insert([
            'cube_id' => 2,
            'connection_id' => 3,
            'name' => 'VENTAS',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('cubes')->insert([
            'cube_id' => 3,
            'connection_id' => 4,
            'name' => 'VENTAS',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('cubes')->insert([
            'cube_id' => 4,
            'connection_id' => 5,
            'name' => 'Ventas',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('cubes')->insert([
            'cube_id' => 5,
            'connection_id' => 5,
            'name' => 'Monetarios',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
    }
}
