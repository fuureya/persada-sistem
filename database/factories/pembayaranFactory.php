<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class pembayaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "tanggal_bayar" => $this->faker->dateTime(),
            "nama_siswa" => $this->faker->name(),
            "nis" => $this->faker->randomNumber(8, true),
            "kelas" => "XII TKJ",
            "uang_pembangunan" => $this->faker->numberBetween(50000, 750000),
            "uang_spp" => $this->faker->numberBetween(50000, 150000),
            "uang_lab" => $this->faker->numberBetween(25000, 50000),
            "semester_ganjil" => $this->faker->numberBetween(50000, 150000),
            "semester_genap" => $this->faker->numberBetween(50000, 150000),
            "uang_psg" => $this->faker->numberBetween(50000, 150000),
            "uang_uas" => $this->faker->numberBetween(50000, 150000),
            "tunggakan" => $this->faker->numberBetween(50000, 150000),
            "keterangan" => $this->faker->sentence(3)
        ];
    }
}
