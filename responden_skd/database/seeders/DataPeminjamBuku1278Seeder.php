<?php

namespace Database\Seeders;

use App\Models\DataPeminjamBuku1278;
use Illuminate\Database\Seeder;

class DataPeminjamBuku1278Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DataPeminjamBuku1278::factory(1000)->create();
    }
}
