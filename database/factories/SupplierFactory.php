<?php

namespace Database\Factories;


use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Supplier::class;

    public function definition(): array
    {
        return [
            'nama_supplier' => fake()->company(),
            'no_telp' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'alamat' => fake()->address(),
            // tambahkan kolom lain sesuai kebutuhan
        ];
    }
}
