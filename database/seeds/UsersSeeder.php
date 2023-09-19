<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'contract_id' => '1',
            'person_id' => '1',
            'name' => 'admin',
            'email' => 'admin@m.com',
            'password' => '$2y$10$mxinH4KcH.Nv6rhrdhj03egus35m.9GjN3zhmish/RaUvvFI.64B6',
            'image' => 'user000000.png',
            'status' => '1',
        ]);

        // DB::table('users')->insert([
        //     'id' => '5',
        //     'contract_id' => '2',
        //     'person_id' => '5',
        //     'name' => 'erojas',
        //     'email' => 'erojas@m.com',
        //     'password' => '$2y$10$snSZ2oQA2OsZqBbv28ZEGeYPH6Fy/LzVyitE78eA/8AFO8uwq7ZGG',
        //     'image' => 'user000000.png',
        //     'status' => '1',
        // ]);

        // DB::table('users')->insert([
        //     'id' => '6',
        //     'contract_id' => '3',
        //     'person_id' => '6',
        //     'name' => 'oscatf',
        //     'email' => 'oscarf@m.com',
        //     'password' => '$2y$10$snSZ2oQA2OsZqBbv28ZEGeYPH6Fy/LzVyitE78eA/8AFO8uwq7ZGG',
        //     'image' => 'user000000.png',
        //     'status' => '1',
        // ]);

        // DB::table('users')->insert([
        //     'id' => '4',
        //     'contract_id' => '4',
        //     'person_id' => '8',
        //     'name' => 'luisf',
        //     'email' => 'luisf@m.com',
        //     'password' => '$2y$10$snSZ2oQA2OsZqBbv28ZEGeYPH6Fy/LzVyitE78eA/8AFO8uwq7ZGG',
        //     'image' => 'user000000.png',
        //     'status' => '1',
        // ]);

        // DB::table('users')->insert([
        //     'id' => '7',
        //     'contract_id' => '4',
        //     'person_id' => '9',
        //     'name' => 'carlosl',
        //     'email' => 'carlosl@m.com',
        //     'password' => '$2y$10$snSZ2oQA2OsZqBbv28ZEGeYPH6Fy/LzVyitE78eA/8AFO8uwq7ZGG',
        //     'image' => 'user000000.png',
        //     'status' => '1',
        // ]);

        // DB::table('users')->insert([
        //     'id' => '8',
        //     'contract_id' => '2',
        //     'person_id' => '7',
        //     'name' => 'pedron',
        //     'email' => 'pedron@m.com',
        //     'password' => '$2y$10$snSZ2oQA2OsZqBbv28ZEGeYPH6Fy/LzVyitE78eA/8AFO8uwq7ZGG',
        //     'image' => 'user000000.png',
        //     'status' => '1',
        // ]);

        // DB::table('users')->insert([
        //     'id' => '9',
        //     'contract_id' => '3',
        //     'person_id' => '11',
        //     'name' => 'patricias',
        //     'email' => 'patricias@m.com',
        //     'password' => '$2y$10$gBVOUxDCqRnDqrARCoTbieirFwY4P2w70w8tMrsRLnhEyawkvbqSy',
        //     'image' => 'user000000.png',
        //     'status' => '1',
        // ]);

        // DB::table('users')->insert([
        //     'id' => '2',
        //     'contract_id' => '3',
        //     'person_id' => '12',
        //     'name' => 'mariac',
        //     'email' => 'mariac@m.com',
        //     'password' => '$2y$10$nTTvxrfNvTAduHfKbNL5.OHkQ18SHSjmZCutJC3azmzOB.SMyH92u',
        //     'image' => 'user000000.png',
        //     'status' => '1',
        // ]);

        // DB::table('users')->insert([
        //     'id' => '3',
        //     'contract_id' => '2',
        //     'person_id' => '13',
        //     'name' => 'marcoa',
        //     'email' => 'marcoa@m.com',
        //     'password' => '$2y$10$snSZ2oQA2OsZqBbv28ZEGeYPH6Fy/LzVyitE78eA/8AFO8uwq7ZGG',
        //     'image' => 'user000000.png',
        //     'status' => '1',
        // ]);

        // DB::table('users')->insert([
        //     'id' => '10',
        //     'contract_id' => '4',
        //     'person_id' => '15',
        //     'name' => 'paolap',
        //     'email' => 'paolap@m.com',
        //     'password' => '$2y$10$FUUy.ycEpYA5w6uo6jvX3OMfmBBmeqViBJt1dkN.tNzww71FwUMZS',
        //     'image' => 'user000000.png',
        //     'status' => '1',
        // ]);

        // DB::table('users')->insert([
        //     'id' => '11',
        //     'contract_id' => '2',
        //     'person_id' => '17',
        //     'name' => 'valej',
        //     'email' => 'valej@m.com',
        //     'password' => '$2y$10$MzYFRS9xQWmWdQ/DHW1bxOFoaFHpmz8velMkeq6Ry9OtHx9eV6DUa',
        //     'image' => 'user000000.png',
        //     'status' => '1',
        // ]);

        // DB::table('users')->insert([
        //     'id' => '12',
        //     'contract_id' => '2',
        //     'person_id' => '14',
        //     'name' => 'jmontenegro',
        //     'email' => 'jmontenegro@m.com',
        //     'password' => '$2y$10$MzYFRS9xQWmWdQ/DHW1bxOFoaFHpmz8velMkeq6Ry9OtHx9eV6DUa',
        //     'image' => 'user000000.png',
        //     'status' => '1',
        // ]);

    }
}
