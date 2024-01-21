<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test_staf',
            'email' => 'staf@example.com',
            'password' => bcrypt('staf'),
            'role' => 'staf'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'canafi',
            'email' => 'canafi@gmail.com',
            'password' => bcrypt('canafi'),
            'role' => 'admin'
        ]);
        // \App\Models\barang::factory()->create([
        //     'nama_barang' => 'meja belajar',
        //     'stok' => '100',
        //     'harga' => '100000',
        //     'images' => 'satu.jpg',
        //     'id_kategori' => '1'
        // ]);
        \App\Models\kategori::factory()->create([
            'nama_kategori' => 'furniture',
        ]);
        \App\Models\kategori::factory()->create([
            'nama_kategori' => 'hiasan',
        ]);
        \App\Models\Satuan::factory()->create([
            'nama_satuan' => 'pcs',
        ]);
        \App\Models\Satuan::factory()->create([
            'nama_satuan' => 'set',
        ]);
        \App\Models\Supplier::factory()->create([
            'nama_supplier' => 'cv.ayodia',
            'no_telp' => '087123123456',
            'email' => 'ayodia@gmail.com',
            'alamat' => 'Rembang'

        ]);
        \App\Models\Supplier::factory()->create([
            'nama_supplier' => 'cv.jepara',
            'no_telp' => '087123123456',
            'email' => 'jepara@gmail.com',
            'alamat' => 'jepara'

        ]);
    }
}
