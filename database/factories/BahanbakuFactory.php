<?php

namespace Database\Factories;

use App\Models\Supplier;
use App\Models\BahanBaku;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\bahanbaku>
 */
class BahanbakuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = BahanBaku::class;

    public function definition(): array
    {
        $supplier = Supplier::factory()->create();

        return [
            'nama_bahan' => $this->faker->word,
            'id_supplier' => $supplier->id,
            'deskripsi' => $this->faker->sentence,
            'stok' => $this->faker->numberBetween(0, 100),
            'stok_aman' => $this->faker->numberBetween(50, 100),
            'harga' => $this->faker->randomNumber(5),
            'images' => 'barang-images/image.jpg', // Ganti baris ini dengan baris berikut:
            // 'images' => $this->faker->image('barang-images/', 400, 300, null, false),
            // Perhatikan bahwa direktori 'path/to/images' harus sudah ada dan dapat ditulis.
        ];
    }
}
