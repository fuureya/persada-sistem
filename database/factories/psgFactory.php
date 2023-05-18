<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class psgFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "tanggal" => $this->faker->dateTime(),
            "kode" => $this->faker->name(),
            "uraian" => $this->faker->words(10, true),
            "penerimaan" => $this->faker->numberBetween(50000, 150000),
            "pengeluaran" => $this->faker->numberBetween(5000, 1500000),
            "saldo" => $this->faker->numberBetween(5000, 1500000)
        ];
    }
}
