<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
        	'name' => 'Undangan',
        ]);

        DB::table('kategoris')->insert([
        	'name' => 'Pengumuman',
        ]);

        DB::table('kategoris')->insert([
        	'name' => 'Nota Dinas',
        ]);

        DB::table('kategoris')->insert([
        	'name' => 'Pemberitahuan',
        ]);
    }
}
