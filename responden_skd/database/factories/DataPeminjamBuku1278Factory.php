<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DataPeminjamBuku1278Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_peminjam' => $this->faker->name(),
            'asal_intansi' => $this->faker->company(),
            'judul_buku_dipinjam' => $this->faker->word(),
            'waktu_peminjaman' => $this->faker->date('Y-m-d'),
            'waktu_pengembalian' => $this->faker->date('Y-m-d'),
        ];
    }
}
