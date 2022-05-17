<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataInventaris>
 */
class DataInventarisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition()
    {
        return [
            'nama_barang'             => $this->faker->words(mt_rand(1, 8), true),
            'serial_number_barang'    => $this->faker->unique()->ean13(),
            'tanggal_pembelian'       => $this->faker->dateTimeBetween('-5 years', 'now'),
            'harga_barang'            => $this->faker->randomNumber(mt_rand(4, 8), true),
            'nama_pengguna_barang'    => $this->faker->name(mt_rand(2, 8), true)
        ];
    }
}
