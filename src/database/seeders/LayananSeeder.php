<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $layanans = [
            [
                'nama' => 'Facial Glow Up',
                'harga' => 150000,
                'deskripsi' => 'Perawatan wajah untuk mencerahkan dan menyegarkan kulit.',
            ],
            [
                'nama' => 'Hair Spa',
                'harga' => 180000,
                'deskripsi' => 'Perawatan rambut agar sehat dan berkilau.',
            ],
            [
                'nama' => 'Manicure & Pedicure',
                'harga' => 120000,
                'deskripsi' => 'Perawatan kuku tangan dan kaki agar bersih dan cantik.',
            ],
            [
                'nama' => 'Totok Wajah',
                'harga' => 90000,
                'deskripsi' => 'Pijat refleksi pada wajah untuk relaksasi dan sirkulasi darah.',
            ],
            [
                'nama' => 'Makeup Wisuda',
                'harga' => 250000,
                'deskripsi' => 'Riasan profesional untuk hari wisuda yang istimewa.',
            ],
        ];

        foreach ($layanans as $layanan) {
            Layanan::create($layanan);
        }
    }
}
