<?php

namespace App\Services;

class ProdukService
{
    public function getAllProduk(): array
    {
        return [
            ['nama' => 'Mie Gacoan', 'kategori' => 'Makanan', 'harga' => 10000, 'stok' => 100],
            ['nama' => 'Le Mineral', 'kategori' => 'Minuman', 'harga' => 5000, 'stok' => 0],
            ['nama' => 'Susu', 'kategori' => 'Minuman', 'harga' => 12000, 'stok' => 45],
            ['nama' => 'Sampoo', 'kategori' => 'Kebutuhan Rumah', 'harga' => 7000, 'stok' => 0],
            ['nama' => 'roti', 'kategori' => 'Makanan', 'harga' => 8000, 'stok' => 30],
        ];
    }

    
    public function getProdukByKategori(string $kategori): array
    {
        return array_values(array_filter(
            $this->getAllProduk(),
            fn ($produk) => strtolower($produk['kategori']) === strtolower($kategori)
        ));
    }

        public function getTersedia(): array
    {
        return array_values(array_filter(
            $this->getAllProduk(),
            fn ($produk) => $produk['stok'] > 0
        ));
    }

    
    public function getByHargaDiAtas(int $harga): array
    {
        return array_values(array_filter(
            $this->getAllProduk(),
            fn ($produk) => $produk['harga'] > $harga
        ));
    }


    public function getJumlahProduk(): int
    {
        return count($this->getAllProduk());
    }

    
    public function getStokTerbanyak(): array
    {
        $produk = $this->getAllProduk();
        usort($produk, fn ($a, $b) => $b['stok'] <=> $a['stok']);
        return $produk[0] ?? [];
    }
}