<?php

namespace Database\Seeders;

use App\Models\DaftarMitra;
use Illuminate\Database\Seeder;

class DaftarMitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DaftarMitra::factory(1000)->create();
    }
}
