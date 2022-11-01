<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pegawais')->insert([
            'nama' => 'Irgi Fahlevi',
            'jeniskelamin' => 'Laki-laki',
            'umur' => '22',
            'notelpon' => '085716302939',
            'alamat' => 'Jl. Padurenan 3, No. 21'
        ]);
    }
}
