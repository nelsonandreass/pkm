<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Nelson Andreas',
            'nim'   => '2001552274',
            'email' => 'nelson@yahoo.com',
            'password' => '$2y$10$FPwJ6nNuMabb5tFN3l658.lXYxpdmPAVuxa5pq1dfH.vUs4ZFlGtC',
            'roles' => 'MAHASISWA'
        ]);
        DB::table('users')->insert([
            'name' => 'Dicky Angkasa',
            'nim'   => '2001552277',
            'email' => 'dicky@yahoo.com',
            'password' => '$2y$10$FPwJ6nNuMabb5tFN3l658.lXYxpdmPAVuxa5pq1dfH.vUs4ZFlGtC',
            'roles' => 'MAHASISWA'
        ]);
        DB::table('users')->insert([
            'name' => 'Bambang Surambang',
            'nim'   => '2001552222',
            'email' => 'bambang@yahoo.com',
            'password' => '$2y$10$FPwJ6nNuMabb5tFN3l658.lXYxpdmPAVuxa5pq1dfH.vUs4ZFlGtC',
            'roles' => 'MAHASISWA'
        ]);
        DB::table('users')->insert([
            'name' => 'Adit',
            'nim'   => '2001552221',
            'email' => 'adit@yahoo.com',
            'password' => '$2y$10$FPwJ6nNuMabb5tFN3l658.lXYxpdmPAVuxa5pq1dfH.vUs4ZFlGtC',
            'roles' => 'MAHASISWA'
        ]);
        DB::table('users')->insert([
            'name' => 'Ivan',
            'nim'   => '2001552223',
            'email' => 'ivan@yahoo.com',
            'password' => '$2y$10$FPwJ6nNuMabb5tFN3l658.lXYxpdmPAVuxa5pq1dfH.vUs4ZFlGtC',
            'roles' => 'MAHASISWA'
        ]);
        DB::table('users')->insert([
            'name' => 'Indrajani S.Kom., M.TI',
            'nim'   => 'D321',
            'email' => 'dosen@dosen.com',
            'password' => '$2y$10$FPwJ6nNuMabb5tFN3l658.lXYxpdmPAVuxa5pq1dfH.vUs4ZFlGtC',
            'roles' => 'DOSEN'
        ]);
        DB::table('users')->insert([
            'name' => 'Irma Kartika Wairooy, S.Kom, M.TI',
            'nim'   => 'D123',
            'email' => 'dosen2@dosen.com',
            'password' => '$2y$10$FPwJ6nNuMabb5tFN3l658.lXYxpdmPAVuxa5pq1dfH.vUs4ZFlGtC',
            'roles' => 'DOSEN'
        ]);
    }
}

